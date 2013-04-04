<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// AMINA Skin Lib for AMINA BBS & THEMA - Copyright (c) 2012 AMINA - http://amina.co.kr
//
// only for AMINA Write Skin
//-------------------------------------------------------------------------------------

//분류 자동 선택
function amina_category($ca_name, $ca_list) {

    $arr = explode("|", $ca_list); // 구분자가 , 로 되어 있음
    $str = "";
    for ($i=0; $i<count($arr); $i++) {
        if (trim($arr[$i])) {
			if(trim($arr[$i]) == $ca_name) { $selected = "selected"; } else { $selected = ""; }
			$str .= "<option value='$arr[$i]' $selected >$arr[$i]</option>\n";
		}
	}
    return $str;
}

//익명글
function amina_nameless_tail($num) {

	if($num > 0) {
		$temp = str_split('abcdefghijklmnopqrstuvwxyz012345678901234567890123456789'); 
		shuffle($temp); 
		$id = implode('',array_slice($temp,0,$num));
	} else {
		$id = "";
	}

	return $id;
} 

//동영상 이미지 등록 - 모바일 때문에 글등록시 동영상 이미지 미리 불러오기
function amina_video_all($wr_6, $wr_content) {
	global $g4;

	include_once($g4[path]."/lib/amina.lib.video.php");

	$img = array();
	$info = array();
	$video = array();

	//직접링크 동영상
	if($wr_6) {
		$info = amina_array_video($wr_6);
		if($info[movie_url]) {
			$video = amina_video_info($info[movie_info]);
			$img[] = amina_video_img($video[video_url], $video[vid], $video[type], $opt);
		}
	}

	//본문첨부 동영상
	if(preg_match_all("/{동영상\:([^}]*)}/ie", $wr_content, $match)) {
		for ($i=0; $i<count($match[1]); $i++) {
			if(preg_match('/http:\/\/(youtu\.be|vimeo\.com|tvpot\.daum\.net|www\.ted\.com|channel\.pandora\.tv|pann\.nate\.com)/', $match[1][$i])) {
				list($url) = explode("|", trim(strip_tags($match[1][$i])));
				$video = amina_video_info($url);
				$img[] = amina_video_img($video[video_url], $video[vid], $video[type], $opt);
			}
		}
	}

	return $img;
}

//첨부 이미지 전체 불러오기
function amina_attach_img_all($attach, $wr_content) {
	global $g4, $amina;

	$img = array();

	//직접 첨부한 이미지
	for ($k=0; $k<count($attach); $k++) {
		if ($attach[$k][view]) {
			$attach_img[$k] = $attach[$k][path]."/".$attach[$k][file];
			if(preg_match("/\.(jpg|gif|png)$/i", $attach_img[$k]) && file_exists($attach_img[$k])) {
				$img[] = $attach_img[$k];
			}
		}
	}

	//에디터에 삽입된 이미지
	if(preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $wr_content, $match)) {
		for ($k=0; $k<count($match[1]); $k++) {
			list($edit_img) = explode("\"", $match[1][$k]); //크롬에서 오류 방지..
			if(preg_match('/\.(jpg|gif|png)$/i', $edit_img) && !preg_match('/icons\/em\/[^<>]*\/[^<>]*\.(jpg|gif|png)$/i', $edit_img)) {
			    if (preg_match("/^(http|https|ftp|telnet|news|mms)\:\/\//i", $edit_img)) {
					if (preg_match("/" . $_SERVER[HTTP_HOST] . "/", $edit_img, $matches)) {
						$edit_img = str_replace($amina[gnu_url], $g4[path], $edit_img);
						$img[] = $edit_img;
					}
				} else {
					$img[] = $edit_img;
				}
			}
		}
	}

	return $img;
}

?>