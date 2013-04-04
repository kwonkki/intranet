<?
include_once("./_common.php");

echo "<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'>";

$ment = $amina[cmt_choice_txt];
if(!$ment) $ment = "채택";

if(!$amina[cmt_choice])
    alert_close("이 게시판은 댓글 {$ment} 기능을 사용하지 않습니다.");

if (!$is_member) 
    alert_close("회원만 댓글 {$ment}이 가능합니다.");

if (!($bo_table && $wr_id))
    alert_close("값이 제대로 넘어오지 않았습니다.");

$row = sql_fetch(" select count(*) as cnt from {$g4[write_prefix]}{$bo_table} ", FALSE);
if (!$row[cnt])
    alert_close("존재하는 게시판이 아닙니다.");

if($write[wr_is_comment] != '1')
    alert_close("댓글만 {$ment} 가능합니다.");

if($write[wr_9] == "lock" || $write[wr_9] == "shingo")
    alert_close("블라인드 처리된 글은 {$ment}할 수 없습니다.");

//원글가져오기
$wr = sql_fetch(" select * from $write_table where wr_id = '$write[wr_parent]' ");
if(!$wr[wr_id])
    alert_close("원글이 존재하지 않습니다.");

if($member[mb_id] != $wr[mb_id])
    alert_close("글쓴이만 댓글 {$ment}이 가능합니다.");

if($write[mb_id] == $wr[mb_id] || $write[mb_id] == $member[mb_id])
    alert_close("자신의 댓글은 {$ment}할 수 없습니다.");

//아이및 및 댓글채택 정보
$wr_icon = amina_array_icon($wr[wr_5]);

if($wr_icon[choice])
    alert_close("이미 댓글을 {$ment} 하셨습니다.");

//아이템 및 댓글채택
$cmt_icon = amina_array_icon($write[wr_5]);

if($cmt_icon[choice])
    alert_close("이미 {$ment}된 댓글입니다.");

// 포인트 계산
$choice_point = (int)$wr_icon[choice_point];
$return_point = $choice_point * ($amina[cmt_choice_return] / 100);
$return_point = (int)$return_point;

// 포인트 적립
if($write[mb_id] && $choice_point > 0) {
	insert_point($write[mb_id], $choice_point, "$board[bo_subject] $wr_id {$ment} 포인트 적립", $bo_table, $wr_id, '@choice_cmt');
}

// 포인트 환수
if($wr[mb_id] && $return_point > 0) {
	insert_point($wr[mb_id], $return_point, "$board[bo_subject] $wr_id {$ment} 지급 포인트 환수", $bo_table, $wr_id, '@choice_return');
}

// 댓글 업데이트
$cmt_up = $cmt_icon[level]."|".$cmt_icon[mobile]."|".$cmt_icon[post_icon]."|<choice>|".$wr_icon[choice_point]."|".$wr[mb_id]."|".$cmt_icon[post_cool]."|".$cmt_icon[post_mb_icon];
sql_query(" update $write_table set wr_5 = '$cmt_up' where wr_id = '$write[wr_id]' ");

// 원글 업데이트
$org_up = $wr_icon[level]."|".$wr_icon[mobile]."|".$wr_icon[post_icon]."|<choice>|".$wr_icon[choice_point]."|".$write[mb_id]."|".$wr_icon[post_cool]."|".$cmt_icon[post_mb_icon];
sql_query(" update $write_table set wr_5 = '$org_up' where wr_id = '$wr[wr_id]' ");

// 회원 아이디와 메세지가 있으면 쪽지 보내기
if($write[mb_id]) {
	$recv_id = $write[mb_id]; // 받는 사람 아이디
    $send_id = $member[mb_id]; // 보내는 사람
	$send_msg = "[".$board[bo_subject]."] 게시판에 있는 [".$wr[wr_subject]."] 제목의 글에 달린 회원님의 댓글이 {$ment}되었습니다. ";

	//쪽지 번호 뽑기
    $tmp_row = sql_fetch(" select max(me_id) as max_me_id from {$g4['memo_table']} ");
    $me_id = $tmp_row['max_me_id'] + 1;
        
	// 쪽지 INSERT
    $sql = " insert into {$g4['memo_table']} ( me_id, me_recv_mb_id, me_send_mb_id, me_send_datetime, me_memo ) values ( '$me_id', '$recv_id', '$send_id', '$g4[time_ymdhis]', '$send_msg' ) ";
    sql_query($sql);
}


echo "<script type='text/javascript'> alert('이 댓글을 \'$ment\' 하셨습니다.');</script>";

?>

<script type="text/javascript"> window.close(); </script>