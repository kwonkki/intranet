<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// Skin Settings Load
function amina_set_list($str) {

	$set = array();

	list($set[list_thumb_w], $set[list_thumb_h], $set[list_thumb_no], $set[list_thumb_icon], $set[list_thumb_cut], $set[subj_len], $set[subj_align], $set[subj_cate], $set[conts_len], $set[info_location], $set[info_align], $set[info_name], $set[info_cate], $set[info_star], $set[info_date], $set[info_hit], $set[info_good], $set[info_nogood], $set[info_cmt], $set[info_date_type], $set[info_choice], $set[info_choice_txt], $set[info_nochoice_txt], $set[info_point]) = explode("|",$str);

	return $set;
}

?>