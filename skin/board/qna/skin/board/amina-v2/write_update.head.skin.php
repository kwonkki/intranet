<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

//글등록 제한..
if (!$is_admin && $amina[limit_post_cnt] > 0 && $w != "u") {
	if($amina[limit_post] == '1') {
		 $chk_time = date("Y-m-d 00:00:01", $g4['server_time']); //오늘 00시 00분 01초 기준 
		 $row = sql_fetch(" select count(*) as cnt from $write_table where wr_is_comment = 0 and mb_id = '$member[mb_id]' and wr_datetime >= '$chk_time' "); 
		 if($row[cnt] > $amina[limit_post_cnt]) alert("이 게시판은 회원당 하루 최대 {$amina[limit_post_cnt]}개 글만 등록할 수 있습니다. "); 
	} else if ($amina[limit_post] == '2') {
		 $row = sql_fetch(" select count(*) as cnt from $write_table where wr_is_comment = 0 and mb_id = '$member[mb_id]' "); 
		 if($row[cnt] > $amina[limit_post_cnt]) alert("이 게시판은 회원당 최대 {$amina[limit_post_cnt]}개 글만 등록할 수 있습니다. "); 
	}
}

//포인트 걸기..
if($amina[cmt_choice] && $choice_point) { 
	if(!$member[mb_id]) 
		alert("회원만 포인트를 거실 수 있습니다.");

	if(!is_numeric($choice_point))
		alert("숫자만 포인트로 걸실 수 있습니다.");

	if($choice_point < 0)
		alert("0 또는 양수만 포인트로 걸실 수 있습니다.");

    if($choice_point > $member[mb_point])
        alert('보유포인트보다 포인트를 더 많이 거실 수 없습니다.');
}

?>
