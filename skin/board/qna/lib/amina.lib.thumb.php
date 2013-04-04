<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// AMINA Skin Lib for AMINA BBS & THEMA - Copyright (c) 2012 AMINA - http://amina.co.kr
//
// only for AMINA Thumbnail
//-------------------------------------------------------------------------------------

// 불당썸
include_once("$g4[path]/lib/thumb.lib.php");

// 썸네일 출력
function amina_thumbnail($subject, $href, $img, $img_w, $img_h, $cut='', $no_img='white', $icon='', $type='s', $path='', $target='') {
	global $g4;

	if(!$img && $no_img == "none") return;

	$thumb_w = $img_w;

	switch($cut) {
		case 'nocut'	: $thumb_h = 0; break;
		default			: $thumb_h = $img_h; break;
	}

	//링크 이미지 체크..
    if($img) {
	    $link_thumb = false;
		if(preg_match("/^(http|https|ftp|telnet|news|mms)\:\/\//i", $img)) $link_thumb = true;

		//썸네일 만들기
		if(!$link_thumb) $img = thumbnail($img, $thumb_w, $thumb_h, false, "2", "90", "1");
	}


	//링크설정
	switch($target) {
		case 'new'		: $href = "window.open('{$href}')"; break;
		default			: $href = "top.location.href='{$href}'"; break;
	}

	//높이설정
	if(!$img && !$img_h) {
		$img_h = ($img_w * 9)/16;
		$img_h = (int)$img_h;
		$img_h1 = " height:{$img_h}px;";
		$img_h2 = " height=\"{$img_h}\"";
	} else if($img && !$img_h) {
		$img_h1 = "";
		$img_h2 = "";
	} else {
		$img_h1 = " height:{$img_h}px;";
		$img_h2 = " height=\"{$img_h}\"";
	}

	//출력
	if($img && ($link_thumb || !$thumb_h)) {
		$thumb = "<div class=\"thumb\" onClick=\"{$href};\" style=\"width:{$img_w}px;{$img_h1}\" title=\"{$subject}\">\n";
		$thumb .= "<img src=\"{$img}\" width=\"{$img_w}\" {$img_h2}>\n";
		$thumb .= "</div>\n";
	} else {
		if($img || $no_img != "none") {

			if(!$path) $path = $g4[path]."/img/amina";
			if(!$type) $type = "s";
			if(!$img) $img = $path."/no_thumb.png";

			switch($icon) {
				case 'hot'		: $img_icon = "<img src='{$path}/thumb_hot_{$type}.png'>"; break;
				case 'new'		: $img_icon = "<img src='{$path}/thumb_new_{$type}.png'>"; break;
				case 'video'	: $img_icon = "<img src='{$path}/thumb_video_{$type}.png'>"; break;
				default			: $img_icon = "&nbsp;";
			}

			switch($no_img) {
				case 'black'	: $no_img = "#444444"; break;
				default			: $no_img = "#f5f5f5"; break;
			}

			$thumb = "<div class=\"thumb\" onClick=\"{$href};\" style=\"background:{$no_img} url('{$img}') no-repeat center center; width:{$img_w}px;{$img_h1}\" title=\"{$subject}\">\n";
			$thumb .= $img_icon;
			$thumb .= "</div>\n";
		}
	}

	return $thumb;
}

?>