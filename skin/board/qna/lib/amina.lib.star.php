<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// AMINA Skin Common Lib - Copyright (c) 2012 AMINA - http://amina.co.kr
//
// only for AMINA Star Skin
//-------------------------------------------------------------------------------------

// 별점 구하기
function amina_array_star($wr_7){
	$set = array();
	list($set[score], $set[people]) = explode("|", $wr_7);
	return $set;
}

function amina_star_mark($star_color='gold', $star_set, $type=''){
	global $board_skin_path;

	$star = amina_array_star($star_set);

	if(!is_numeric($star[score]) || !is_numeric($star[people])) {
		$star[socre] = 0;
		$star[people] = 0;
	} 

	$score = 0;
	if($star[people] > 0) $score = $star[score] / $star[people];

	$score = round($score,1);
	$point = round($score) * 10;

	switch($type) {
		case 'l'	: $size = "l"; $width = "100"; $height = "25"; break;
		case 'm'	: $size = "m"; $width = "70"; $height = "12"; break;
		case 's'	: $size = "s"; $width = "55"; $height = "10"; break;
		default		: $size = "s"; $width = "55"; $height = "10"; break;
	}

	$alt = number_format($score, 1)."점 / ".number_format($star[people], 0)."명";
	$star = "<div class='star_{$size}'><div class='mask' style='width:{$point}%'><img src='{$board_skin_path}/img/star/star_{$star_color}_{$size}.png' width='{$width}' height='{$height}' border=0 title=' {$alt} ' style='cursor:pointer;'></div></div>";

	return $star;
}

?>