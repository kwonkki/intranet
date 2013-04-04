<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// Skin Settings Load
function amina_set_view($str) {

	$set = array();

	list($set[view_head], $set[view_1vs1]) = explode("|",$str);

	return $set;
}

?>