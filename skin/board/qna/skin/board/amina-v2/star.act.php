<?
include_once("./_common.php");

echo "<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'>";

if (!$is_member) 
	alert_close("회원만 가능합니다.");

if ($amina[star] != '2')
    alert_close("이 게시판은 회원별점 기능을 사용하지 않습니다.");

if (!$bo_table || !$wr_id) 
    alert_close("값이 제대로 넘어오지 않았습니다.");

$row = sql_fetch(" select count(*) as cnt from {$g4[write_prefix]}{$bo_table} ", FALSE);
if (!$row[cnt])
    alert_close("존재하는 게시판이 아닙니다.");

if($write[wr_9] == "lock" || $write[wr_9] == "shingo")
    alert_close("블라인드 처리된 글은 회원별점을 줄 수 없습니다.");

$sql = " select bg_flag, bg_star from $g4[board_table]_star where bo_table = '$bo_table' and wr_id = '$wr_id' and mb_id = '$member[mb_id]' and bg_flag = 'star' ";
$row = sql_fetch($sql);
if($row[bg_flag]) {
	echo "<script type='text/javascript'>alert('이미 {$row[bg_star]}점의 별점을 주셨습니다.');</script>";
} else {
	// 내역 생성
	sql_query(" insert $g4[board_table]_star set bo_table = '$bo_table', wr_id = '$wr_id', mb_id = '$member[mb_id]', bg_flag = 'star', bg_datetime = '$g4[time_ymdhis]', bg_star = '$star' ");

	// 전체 추천 점수 계산하기
	$row = sql_fetch(" select SUM(bg_star) as score, COUNT(bg_star) as people from $g4[board_table]_star where bo_table = '$bo_table' and wr_id = '$wr_id' and bg_flag = 'star' ");

	//별점값 정리
	$wr_7 = $row[score]."|".$row[people];

	// 재계산된 별점 넣기
	sql_query(" update {$g4[write_prefix]}{$bo_table} set wr_7 = '$wr_7' where wr_id = '$wr_id' ");

	//포인트 주기
	if($amina[limit_date] > 0) $chk_limit = date("Y-m-d H:i:s", $g4['server_time'] - ( $amina[limit_date] * 24 * 3600 ));

	if(($member[mb_id] == $write[mb_id] && $amina[limit_cmt]) || ($chk_limit && $write[wr_datetime] < $chk_limit)) { 
		;
	} else {
		$amina_point = $amina[star_point];
		$amina_repoint = $amina[star_repoint];
		$amina_msg = "$board[bo_subject] {$wr_id} 글에 별점을 주었습니다.";
		$amina_remsg = "$board[bo_subject] {$wr_id} 글이 별점을 받았습니다.";

		if($amina_point)
			insert_point($member[mb_id], $amina_point, $amina_msg, $bo_table, $wr_id, $member[mb_id].'@star');

		if($write[mb_id] && $amina_repoint)
			insert_point($write[mb_id], $amina_repoint, $amina_remsg, $bo_table, $wr_id, $member[mb_id].'@star_re');

	}

	echo "<script type='text/javascript'> alert('별점으로 {$star}점을 주셨습니다.');</script>";
}


?>
<script type="text/javascript"> window.close(); </script>