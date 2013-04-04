<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// Skin Settings Load
function amina_set_list($str) {

	$set = array();

	list($set[list_num], $set[list_qa], $set[list_cate], $set[list_cate_view], $set[list_photo], $set[list_name], $set[list_name_align], $set[list_date], $set[list_date_type], $set[list_cmt], $set[list_cmt_txt], $set[list_hit], $set[list_good], $set[list_nogood], $set[list_star], $set[list_thumb_w], $set[list_thumb_h], $set[list_thumb_no], $set[list_thumb_icon], $set[list_thumb_cut], $set[list_choice], $set[list_choice_txt], $set[list_nochoice_txt], $set[list_point]) = explode("|",$str);

	return $set;
}

?>