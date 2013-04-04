<?
include_once("./_common.php");

echo "<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'>";

$ment = $amina[cmt_good_txt];
if(!$ment) $ment = "공감";

if (!$is_member) 
    alert_close("회원만 가능합니다.");

if (!($bo_table && $wr_id)) 
    alert_close("값이 제대로 넘어오지 않았습니다.");

$row = sql_fetch(" select count(*) as cnt from {$g4[write_prefix]}{$bo_table} ", FALSE);
if (!$row[cnt])
    alert_close("존재하는 게시판이 아닙니다.");

if($good != "good")
    alert_close("이 게시판은 {$ment} 기능만 가능합니다.");

if($write[wr_9] == "lock" || $write[wr_9] == "shingo")
    alert_close("블라인드 처리된 글은 {$ment}할 수 없습니다.");

if($write[mb_id] == $member[mb_id])
	alert_close("자신의 댓글에는 {$ment}할 수 없습니다.");

if (!$amina[cmt_good])
	alert_close("이 게시판은 {$ment} 기능을 사용하지 않습니다.");

$sql = " select bg_flag from $g4[board_good_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and mb_id = '$member[mb_id]' and bg_flag in ('good', 'nogood') ";
$row = sql_fetch($sql);
if ($row[bg_flag]) {
	if ($row[bg_flag] == "good")
		$status = $ment;
	else
		$status = "비추천";
        
	echo "<script type='text/javascript'>alert('이미 \'$status\' 하신 댓글 입니다.');</script>";

} else {
	// 추천(찬성), 비추천(반대) 카운트 증가
	sql_query(" update {$g4[write_prefix]}{$bo_table} set wr_{$good} = wr_{$good} + 1 where wr_id = '$wr_id' ");

	// 내역 생성
	sql_query(" insert $g4[board_good_table] set bo_table = '$bo_table', wr_id = '$wr_id', mb_id = '$member[mb_id]', bg_flag = '$good', bg_datetime = '$g4[time_ymdhis]' ");

	if ($good == "good") 
		$status = $ment;
	else 
		$status = "비추천";

	if($amina[limit_date] > 0) $chk_limit = date("Y-m-d H:i:s", $g4['server_time'] - ( $amina[limit_date] * 24 * 3600 ));

	if(($member[mb_id] == $write[mb_id] && $amina[limit_cmt]) || ($chk_limit && $write[wr_datetime] < $chk_limit)) { 
		;
	} else {
		$good_point = $amina[cmt_good_point];
		$good_msg = "$board[bo_subject] {$wr_id} - {$amina[cmt_good_txt]} 했습니다.";
		$good_repoint = $amina[cmt_good_repoint];
		$good_remsg = "$board[bo_subject] {$wr_id} - {$amina[cmt_good_txt]} 점수를 받았습니다.";

		if($good_point)
			insert_point($member[mb_id], $good_point, $good_msg, $bo_table, $wr_id, $member[mb_id].'@'.$good);

		if($write[mb_id] && $good_repoint)
			insert_point($write[mb_id], $good_repoint, $good_remsg, $bo_table, $wr_id, $member[mb_id].'@'.$good.'_re');

	}

	echo "<script type='text/javascript'> alert('이 댓글을 \'$status\' 하셨습니다.');</script>";
}

?>
<script type="text/javascript"> window.close(); </script>