<?php
include_once("./_common.php");

//작성자 아이디 찾기
$row_id = sql_fetch(" select mb_id from $g4[write_prefix]$bo_table where wr_id = '$id' "); 
$e_mbid = $row_id[mb_id];

if($e_mbid == $member[mb_id]){ 	//본인 게시물만 수정되게
  if($mode == "drop"){

	if($e_date == null) $e_date = $s_date;
	if($s_time == "00:00") $s_time = "01:00";
	if($e_time == "00:00") $e_time = "01:00";
	$sql = "update $g4[write_prefix]$bo_table set 
	wr_1 = '$s_date',
	wr_2 = '$e_date', 
	wr_4 = '$s_time',
	wr_5 = '$e_time' 
	where wr_id = '$id'";
	sql_query($sql);

  }else if($mode == "resize"){	

	if($e_date == null) $e_date = $s_date;
	if($e_time == "00:00") $e_time = "01:00";
	$sql = "update $g4[write_prefix]$bo_table set 
	wr_2 = '$e_date',
	wr_5 = '$e_time' 
	where wr_id = '$id'";
	sql_query($sql);
  }
}
?>
