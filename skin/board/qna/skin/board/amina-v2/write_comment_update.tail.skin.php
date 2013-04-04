<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$g4[path]/lib/amina.lib.write.skin.php");

//자신의 글과 특정일 이후에 등록된 코멘트에 대한 포인트 등록 불가 설정
if($w == "c") {
	if($amina[limit_date] > 0) $chk_comment = date("Y-m-d H:i:s", $g4['server_time'] - ( $amina[limit_date] * 24 * 3600 ));
	if(($wr[mb_id] == $mb_id && $amina[limit_cmt]) || ($chk_comment && $wr[wr_datetime] < $chk_comment)) { 
		if (!delete_point($member[mb_id], $bo_table, $comment_id, '코멘트'))
		    insert_point($member[mb_id], $board[bo_comment_point] * (-1), "$board[bo_subject] {$write[wr_parent]}-{$comment_id} 코멘트삭제");
	}
}

//아이콘($wr_5) 값 정리하기..
if ($w == "cu") {
	$icon = amina_array_icon($wr_cmt[wr_5]);
	$wr_5 = $icon[level]."|".$post_mobile."|".$post_icon."|".$icon[choice]."|".$icon[choice_point]."|".$icon[choice_mb]."|".$post_cool."|".$post_icon_mb;
	$wr_9 = $wr_cmt[wr_9];
} else {
	$wr_5 = xp_level($member[mb_id])."|".$post_mobile."|".$post_icon."|".$icon[choice]."|".$icon[choice_point]."|".$icon[choice_mb]."|".$post_cool."|".$post_icon_mb;
	$wr_9 = 0;
}

// 익명댓글
if($amina[nameless_cmt]) {
	$wr_rename = $amina[nameless_head]."".amina_nameless_tail($amina[nameless_tail]);
	$cmt_no_str = "wr_name = '$wr_rename', mb_id = '', wr_email = '', wr_homepage = '', ";
}

sql_query(" update $write_table set $cmt_no_str wr_9 = '$wr_9', wr_5 = '$wr_5' where wr_id = '$comment_id' ");

// xp 정보 업데이트
if($w != 'cu' && $member[mb_id]) check_xp($member[mb_id]);

//이동 별도 지정시
if($go_url) goto_url($go_url."&go_url=".urlencode($go_url));

?>
