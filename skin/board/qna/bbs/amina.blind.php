<?
include_once("./_common.php");

echo "<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'>";

if (!$is_member) 
    alert_close("회원만 신고가 가능합니다.");

if (!($bo_table && $wr_id)) 
    alert_close("값이 제대로 넘어오지 않았습니다.");

$row = sql_fetch(" select count(*) as cnt from {$g4[write_prefix]}{$bo_table} ", FALSE);
if (!$row[cnt]) 
    alert_close("존재하는 게시판이 아닙니다.");

if($write[mb_id] == $member[mb_id]) 
    alert_close("자신의 글은 신고할 수 없습니다.");

if(!$is_admin && is_admin($write[mb_id])) 
    alert_close("관리자 글은 신고할 수 없습니다.");

//관리자만 가능한 기능
if(!$is_admin) {
	if(!$amina[shingo] || !is_numeric($amina[shingo]) || $amina[shingo] < 1)
	    alert_close("이 게시판은 신고 기능을 사용하지 않습니다.");

	if(strstr($write[wr_option], "secret")) 
		alert_close("비밀글은 신고할 수 없습니다.");
	
	if(is_admin($write[mb_id])) 
	    alert_close("관리자 글은 신고할 수 없습니다.");
	
	if($act) 
	    alert_close("블라인드글 관리는 관리자만 가능합니다.");
}

//신고 상태 보기
$shingo = trim($write[wr_9]);

if($write[wr_is_comment] == 0) {
	$wr_ment = "[".$board[bo_subject]."] 게시판에 있는 [".$write[wr_subject]."] 제목의 회원님의 글";
} else {
	//원글 제목 가져오기
	$org = sql_fetch(" select wr_subject from $write_table where wr_id = '$write[wr_parent]' ");
	$wr_ment = "[".$board[bo_subject]."] 게시판에 있는 [".$org[wr_subject]."] 제목의 글에 달린 회원님의 댓글";
}

if($act == "lock") {

	if($shingo == "lock") 
	    alert_close("이미 블라인드 처리하신 글입니다.");
	
	if($shingo == "shingo") 
	    alert_close("이미 신고누적으로 블라인드 처리된 글입니다.");
	
	//신고카운트 LOCK으로 변경
	sql_query(" update $write_table set wr_9 = 'lock' where wr_id = '$wr_id' ");

	//쪽지
	$send_msg = $wr_ment."이 관리자에 의해 블라인드 처리되었음을 알려드립니다.";

	echo "<script type='text/javascript'> alert('관리자 직권으로 블라인드 처리하셨습니다.');</script>";

} else if($act == "unlock") {

	//신고카운트 초기화 변경
	sql_query(" update $write_table set wr_9 = '0' where wr_id = '$wr_id' ");

	//기존 신고내역 삭제
	sql_query(" delete from $g4[board_table]_blind where bo_table = '$bo_table' and wr_id = '$wr_id' ");

	//쪽지
	$send_msg = $wr_ment."에 대한 블라인드 처리가 해제되었음을 알려드립니다.";

	echo "<script type='text/javascript'> alert('블라인드 처리를 해제하셨습니다.');</script>";

} else {

	if($shingo == "lock") 
	    alert_close("관리자에 의해 블라인드 처리된 글은 신고할 수 없습니다.");
	
	if($shingo == "shingo") 
	    alert_close("신고누적으로 블라인드 처리된 글은 신고할 수 없습니다.");
	
	//신고여부
	$sql = " select flag from $g4[board_table]_blind where bo_table = '$bo_table' and wr_id = '$wr_id' and mb_id = '$member[mb_id]' ";
	$row = sql_fetch($sql);
	if($row[flag]) {
		echo "<script type='text/javascript'> alert('이미 신고하신 글입니다.');</script>";
	} else {
		if($shingo <= 0) $shingo = 0;
		$shingo = $shingo + 1;
		if($shingo >= $amina[shingo]) $shingo = "shingo";

		//신고카운트 증가
		sql_query(" update $write_table set wr_9 = '$shingo' where wr_id = '$wr_id' ");

		//내역 생성
		sql_query(" insert $g4[board_table]_blind set bo_table = '$bo_table', wr_id = '$wr_id', mb_id = '$member[mb_id]', flag = 'shingo', datetime = '$g4[time_ymdhis]', ip = '$_SERVER[REMOTE_ADDR]' ");

		//쪽지
		if($shingo == "shingo") {
			$send_msg = $wr_ment."이 신고누적으로 블라인드 처리가 되었음을 알려드립니다.";
		}

		echo "<script type='text/javascript'> alert('이 글을 신고하셨습니다.');</script>";
	}
}

// 회원 아이디와 메세지가 있으면 쪽지 보내기
if($write[mb_id] && $send_msg) {
	$recv_id = $write[mb_id]; // 받는 사람 아이디
    $send_id = $member[mb_id]; // 보내는 사람

	//쪽지 번호 뽑기
    $tmp_row = sql_fetch(" select max(me_id) as max_me_id from {$g4['memo_table']} ");
    $me_id = $tmp_row['max_me_id'] + 1;
        
	// 쪽지 INSERT
    $sql = " insert into {$g4['memo_table']} ( me_id, me_recv_mb_id, me_send_mb_id, me_send_datetime, me_memo ) values ( '$me_id', '$recv_id', '$send_id', '$g4[time_ymdhis]', '$send_msg' ) ";
    sql_query($sql);
}

?>

<script type="text/javascript"> window.close(); </script>