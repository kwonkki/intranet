<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// AMINA Skin Lib for AMINA BBS & THEMA - Copyright (c) 2012 AMINA - http://amina.co.kr
//
// only for AMINA View Skin
//-------------------------------------------------------------------------------------

//동영상 관련 불러오기
include_once("$g4[path]/lib/amina.lib.video.php");

//본문 동영상 출력
function amina_video_content($vid, $mobile='') {
	global $g4;

	$video = array();
	$video = amina_video_info($vid, "view");

	if($mobile) {
		switch ($video[type]) {
			case 'youtube'	: $m_txt = "Youtube"; break;
			case 'vimeo'	: $m_txt = "Vimeo"; break;
			case 'daum'		: $m_txt = "DaumTV"; break;
			case 'pandora'	: $m_txt = "PandoraTV"; break;
			case 'nate'		: $m_txt = "NateTV"; break;
			case 'ted'		: $m_txt = "TED"; break;
		}

		if($m_txt) {
			$m_photo = amina_video_img($video[video_url], $video[vid], $video[type]);
			$show = "<table bordder=0 cellpadding=0 cellspacing=0 width=100%><tr><td align=center style=\"height:160px; padding:10px 0px; background:#000;\">";
			$show .= "<a href=\"{$video[video]}\" target=\"_blank\"><img src=\"{$m_photo}\" style=\"border:0;display:block;\" /></a>";
			$show .= "</td></tr><tr height=\"6\"><td></td></tr><tr><td align=center class=small>[{$m_txt}] 동영상을 보실려면 클릭해 주세요.</td></tr><tr height=\"15\"><td></td></tr></table>\n";
		}
	} else {
		if($video[type] == "youtube") { //유튜브
			$show = "<p align=center><iframe width='{$video[width]}' height='{$video[height]}' src='http://www.youtube.com/embed/{$video[vid]}' frameborder='0' allowfullscreen></iframe></p>";

		} else if($video[type] == "vimeo") { //비메오
			if($video[auto]) $auto = "&amp;autoplay=1";
			$show = "<iframe src='http://player.vimeo.com/video/{$video[vid]}?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff{$auto}' width='{$video[width]}' height='{$video[height]}' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>\n\n";

		} else if($video[type] == "ted") { //테드
			$show .= "<iframe src='http://embed.ted.com".$video[rid]."' width='{$video[width]}' height='{$video[height]}' frameborder='0' scrolling='no' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>\n\n";

		} else if($video[type] == "daum") { //다음TV
			$show = "<iframe width='{$video[width]}' height='{$video[height]}' src='http://videofarm.daum.net/controller/video/viewer/Video.html?vid={$video[rid]}&play_loc=undefined' frameborder='0' scrolling='no' ></iframe>\n\n";

		} else if($video[type] == "pandora") { //판도라TV
			if($video[auto]) $auto = "&amp;autoPlay=true";
			$show = "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0' width='{$video[width]}' height='{$video[height]}' id='movie' align='middle'>\n";
			$show .= "<param name='quality' value='high' />\n";
			$show .= "<param name='movie' value='http://flvr.pandora.tv/flv2pan/flvmovie.dll/userid={$video[ch_userid]}&amp;prgid={$video[prgid]}&amp;skin=1{$auto}&amp;share=on&countryChk=ko' />\n";
			$show .= "<param name='allowScriptAccess' value='always' />\n";
			$show .= "<param name='allowFullScreen' value='true' />\n";
			$show .= "<param name='wmode' value='transparent' />\n";
			$show .= "<embed src='http://flvr.pandora.tv/flv2pan/flvmovie.dll/userid={$video[ch_userid]}&amp;prgid={$video[prgid]}&amp;skin=1{$auto}&amp;share=on&countryChk=ko' type='application/x-shockwave-flash' wmode='transparent' allowScriptAccess='always' allowFullScreen='true' pluginspage='http://www.macromedia.com/go/getflashplayer' width='{$video[width]}' height='{$video[height]}' /></embed>\n";
			$show .= "</object>\n\n";

		} else if($video[type] == "nate") { //네이트TV
			$show = "<object id='skplayer' name='skplayer' width='{$video[width]}' height='{$video[height]}' classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9.0.115.00'>\n";
			$show .= "<param name='movie' value='http://v.nate.com/v.sk/movie/{$video[vs_keys]}/{$video[mov_id]}' />\n";
			$show .= "<param name='allowFullscreen' value='true' />\n";
			$show .= "<param name='allowScriptAccess' value='always' />\n";
			$show .= "<param name='wmode' value='transparent' />\n";
			$show .= "<embed src='http://v.nate.com/v.sk/movie/{$video[vs_keys]}/{$video[mov_id]}' wmode='transparent' allowScriptAccess='always' allowFullscreen='true' name='skplayer' width='{$video[width]}' height='{$video[height]}' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' />\n";
			$show .= "</object>\n\n";
		}
	}

	return $show;
}

//본문내용 출력
function amina_view_contents($wr_content, $wr_file, $wr_6, $wr_opt, $width='640', $mobile='') {
	global $g4, $board, $bo_table;

	//모바일 체크
	if($mobile && $mobile != "rss") $mobile = check_mobile();

	if($wr_opt[img_location] == "insert" || $wr_opt[img_location] == "hide") {
		$content = $wr_content;
	} else {
		$file = "";
		for ($i=0; $i<=count($wr_file); $i++) {
		    if($wr_file[$i][view]) {
				$file .= $wr_file[$i][view]."<br>\n";
				if($wr_opt[img_space] != "1") $file .= "<br>\n";
			}
		}

		if($wr_opt[img_space] == "1") $file .= "<br>\n";

		$content = "";
		if($file && $wr_opt[img_location] != "bottom") $content .= "<center>".$file."</center>\n";
		$content .= $wr_content;
		if($file && $wr_opt[img_location] == "bottom") $content .= "<center>".$file."</center>\n";
	}

	//불당 Resize
	$content = amina_resize_content($content, $width);

	//본문 동영상 변환 - {동영상:주소|width=크기 height=크기 auto=ok} 형식
	$content = preg_replace("/{동영상\:([^}]*)}/ie", "amina_video_content('\\1','{$mobile}')", $content);

	$view_content = "";
	if($wr_6) {
		$video = amina_array_video($wr_6);
		if($video[movie_url]) $view_content .= "<p align=center>".amina_video_content($video[movie_info], $mobile)."</p>";
	}
	$view_content .= $content;
	$view_content .= "<!-- 테러 태그 방지용 --></xml></xmp><a href=\"\"></a><a href=''></a>";

	return $view_content;
}

//Good 아이콘 출력하기
function amina_good($skin, $bo_table, $wr_id){
	global $g4, $board, $board_skin_path;

	$good_skin_path = "$board_skin_path/skin/good/$skin";
    if(!is_dir($good_skin_path)) $good_skin_path = "$board_skin_path/skin/good/basic";

	ob_start();
	include "$g4[bbs_path]/amina.good.php";
    $view_good = ob_get_contents();
    ob_end_clean();

	return $view_good;
}

// 프로그램 : 그누보드 불당팩 라이브러리 
// 개 발 자 : 아빠불당 (echo4me@gmail.com)
//
// 저 작 권 : GPL2

// 한별아빠 수정사항 - 본문 썸네일 출력관련 부분만 별도 정리 - 함수충돌방지를 위해 각 함수명에 amina_ 붙임

// 불당팩 : 이미지 resize (청춘불안정 : http://www.sir.co.kr/bbs/board.php?bo_table=cm_free&wr_id=306629)
function amina_resize($string)
{ 
    global $g4, $board;

    //print_r($board);

    // 전역변수를 받아들이기 때문에 설정값이 없으면, 기본으로 게시판의 폭을 지정. 게시판 폭도 없으면 기본으로 500
    $max_img_width = (int) $board['resize_img_width'];
    if ($max_img_width <= 0) {
        if ((int)$board['bo_image_width'] > 0)
            $max_img_width = $board['bo_image_width'];
        else
            $max_img_width = 500;
    }
    
    // max_img_height에 값이 있는 경우는 crop을 허용 합니다.
    $max_img_height = (int) $board['resize_img_height'];
    $is_crop = false;
    if ($max_img_height > 0)
        $is_crop = true;

    // 실행할 때마다 image를 create할지 설정 (무조건 false)
    $is_create = false;
    
    // 이미지의 quality 값을 설정 (없으면, thumb의 기본값으로 90이 적용됨)
    $quality = (int) $board['resize_img_quality'];
    if ($quality <= 0)
        $quality = 90;

    // $water_mark 변수를 전달 받습니다
    $water_mark = $board['water_mark'];

    // $board[thumb_create]에 값이 있으면 무조건 썸네일을 생성 합니다.
    if ($board[thumb_create])
        $thumb_create = 1;

    // 이미지 필터 - 기본으로 UnSharpMask
    if ($board[image_filter]) {
        $filter[type] = $board[image_filter][type];
        $filter[arg1] = $board[image_filter][arg1];
        $filter[arg2] = $board[image_filter][arg2];
        $filter[arg3] = $board[image_filter][arg3];
        $filter[arg4] = $board[image_filter][arg4];
    } else {
        $filter[type] = 99;
        $filter[arg1] = 10;
        $filter[arg2] = 1;
        $filter[arg3] = 2;
    }

    // 변수를 setting
    $return = $string['0']; 
    preg_match_all('@(?P<attribute>[^\s\'\"]+)\s*=\s*(\'|\")?(?P<value>[^\s\'\"]+)(\'|\")?@i', $return, $match);
    if (function_exists('array_combine')) {
        $img = array_change_key_case(array_combine($match['attribute'], $match['value']));
    }
    else {
        $img = array_change_key_case(amina_array_combine4($match['attribute'], $match['value']));
    }

    // 실제 디렉토리 이름을 구하고 절대경로에서 잘라낼 글자수를 계산
    $real_dir = dirname($_SERVER['DOCUMENT_ROOT'] . "/nothing");
    $cut_len = strlen($real_dir);

    // 가끔씩 img의 파일이름이 깨어지는 경우가 있어서 decoding 해줍니다 (예: &#111;&#110; = on)
    $img['src'] = html_entity_decode($img[src]); 

    // 이미지 파일의 경로를 설정 (외부? 내부? 내부인경우 절대경로? 상대경로?)
    if (preg_match("/^(http|https|ftp|telnet|news|mms)\:\/\//i", $img['src'])) {
        // 내 서버에 있는 이미지?
        $img_src = @getimagesize($img['src']);
        if (preg_match("/" . $_SERVER[HTTP_HOST] . "/", $img[src], $matches)) {
            $url = parse_url($img[src]);
            $img[src] = $url[path];
            $thumb_path = "1";
        } else {
            $thumb_path = "";
        }
    } else {
        $thumb_path="1";
    }

    if ($thumb_path) {
        $dir = dirname(amina_file_path($img['src']));
        $file = basename($img['src']);
        $img_path = $dir . "/" . $file;
        // 첨부파일의 이름은 urlencode로 들어가게 됩니다. 따라서, decode해줘야 합니다. (/bbs/write_update.php 참조)
        $img_path = urldecode($img_path);
        $img_src = @getimagesize($img_path);
        // 잊어버리지말고 여기도 urldecode 해줘야죠?
        $thumb_path = urldecode($img['src']);
    }

    // 이미지파일의 정보를 얻지 못했을 때
    if (!$img_src) {
        return $return;
    }

    // 이미지생성의 최소 넓이가 있으면, 이미지가 그 크기 이상일때만, 썸을 만들어야징.
    // 이거는 작은 아이콘 같은 것의 썸을 만들지 않게 하려고 하는거임
    if ($board[image_min] && $img_src[0] < $board[image_min])
        return $return;

    // 이미지 파일의 크기를 구해서
    $fsize = amina_filesize2bytes(filesize($img_path));

    // 이미지 파일의 전체 크기와 갯수 저장
    if ($board['bo_image_info']) {
        $g4['resize']['image_size'] = $g4['resize']['image_size'] + $fsize/1000;
        $g4['resize']['image_count'] = $g4['resize']['image_count'] + 1;
        $g4['resize']['image_file'][] = $img_path;
    }

    // 이미지생성의 최소 파일용량이 있으면, 이미지가 그 파일크기 이상일때만, 썸을 만들어야징.
    // 이거는 작은 아이콘 같은 것이나 효율적으로 줄어든 이미지의 썸을 만들지 않게 하려고 하는거임
    if ($board[image_min_kb]) {
        // 용량은 kb에서 byte로 바꿔서
        $min_kb = $board[image_min_kb]*1024;
        if ($fsize < $min_kb) {
            return $return;
        }
    }

	//크기지정부분 수정(아미나스킨)
    if(isset($img['width']) == false) {
        $img_width = $img_src[0];
        $img_height = $img_src[1];
    } else {
        $img_width = $img['width'];
        $img_height = $img['height'];
    }

    if((int)$img_src[0] > $max_img_width) 
    {
        // width를 조정
        if (isset($img['width']) == true)
            $return = preg_replace('/width\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'width="' . $img['width'] . '"', $return); 
        else
            $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 width='" . $max_img_width . "' \\2 \\3", $return);

        // height를 삭제
        // $return = preg_replace('/height\=(\'|\")?[^\s\'\"]+(\'|\")?/i', null, $return); 

        // 이름도 그누의 javascript resize할 수 있게 수정
        if (isset($img[name]) == true)
            $return = preg_replace('/name\=(\'|\")?[^\s\'\"]+(\'|\")?/i', ' name="target_resize_image[]" ', $return);
        else
            $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 name='target_resize_image[]' \\2 \\3", $return);

        // thumbnail을 생성
        if ($thumb_path) {
            include_once("$g4[path]/lib/thumb.lib.php");
			$thumb_path=thumbnail($thumb_path, $max_img_width,$max_img_height,$is_create,$is_crop,$quality, "", $water_mark, $filter);
            $return = preg_replace('/src\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'src="' . $thumb_path . '"', $return); 
        }

        // onclick을 했을 때, 원래의 이미지 크기로 popup이 되도록 변경
        if ($board[image_window]) {
            if (isset($img[onclick]) == true)
                $return = preg_replace('/onclick\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'onClick="image_window3(\'' . $img['src'] . '\',' . (int)$img_src[0] . ',' . (int)$img_src[1] . ')" ', $return);
            else
                $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 onClick='image_window3(\"" . $img['src'] . "\"," . (int)$img_src[0] . "," . (int)$img_src[1] . ")' \\2 \\3", $return);
        } else {
            if (isset($img[onclick]) == true)
                $return = preg_replace('/onclick\=(\'|\")?[^\s\'\"]+(\'|\")?/i', '', $return);
            else
                $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 onclick='' \\2 \\3", $return);
        }
    }
    else
    { 
        // width를 조정
        if (isset($img['width']) == true)
            $return = preg_replace('/width\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'width="' . $img_width . '"', $return); 
        else
            $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 width='" . $img_width . "' \\2 \\3", $return);

        // height를 삭제
        // $return = preg_replace('/height\=(\'|\")?[^\s\'\"]+(\'|\")?/i', null, $return); 

        // 이름도 그누의 javascript resize할 수 있게 수정
        if (isset($img[name]) == true)
            $return = preg_replace('/name\=(\'|\")?[^\s\'\"]+(\'|\")?/i', ' name="target_resize_image[]" ', $return);
        else
            $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 name='target_resize_image[]' \\2 \\3", $return);

        // $thumb_create가 true이면, 이미지 크기가 $max_img_width보다 작지만, 그래도 thumb를 생성

        if ($thumb_create && $thumb_path) {
            include_once("$g4[path]/lib/thumb.lib.php");
			$thumb_path=thumbnail($thumb_path, $max_img_width,$max_img_height,$is_create,$is_crop,$quality, "", $water_mark, $filter);
            $return = preg_replace('/src\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'src="' . $thumb_path . '"', $return);
        }

        // onclick을 했을 때, 원래의 이미지 크기로 popup이 되도록 변경
        if ($board[image_window]) {
            if (isset($img[onclick]) == true)
                $return = preg_replace('/onClick\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'onClick="image_window3(\'' . $img['src'] . '\',' . (int)$img_src[0] . ',' . (int)$img_src[1] . ')" ', $return);
            else
                $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 onClick='image_window3(\"" . $img['src'] . "\"," . (int)$img_src[0] . "," . (int)$img_src[1] . ")' \\2 \\3", $return);
        } else {
            if (isset($img[onclick]) == true)
                $return = preg_replace('/onClick\=(\'|\")?[^\s\'\"]+(\'|\")?/i', '', $return);
            else
                $return = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 onClick='' \\2 \\3", $return);
        }
    }

    return $return; 
}

// $content                                   : resize할 img 태그가 있는 html
// $width         = $board[resize_img_width]  : 최대 이미지의 폭 (값이 없으면 $board[bo_img_width] 값을 씁니다
// $height        = $board[resize_img_height] : 최대 이미지의 높이 (이것이 지정되면 $is_crop = true가 됩니다) 값이 없으면, 비율대로 줄이고 crop 하지 않습니다.
// $quality       = $board[resize_img_quality]: 썸네일 이미지의 quality (없으면 기본값, 70%를 사용)
// $thumb_create  = $board[thumb_create]      : 이미지의 폭이 지정보다 작은경우에도 썸네일을 생성할지를 지정
// $image_window  = $board[image_window]      : 이미지를 누를때 팝업창을 띄울 것인지를 선택 (1: 팝업)
// $water_mark    = $board[water_mark]        : 워터마크
// $image_filter  = $board[image_filter]      : 이미지필터
// $image_min     = $board[image_min]         : 값이 있으면, $thumb_create=1이더라도 image_min 이상의 폭의 이미지에 대해서만, 썸을 만든다
// $image_min_kb  = $board[image_min_kb]      : 값이 있으면, $thumb_create=1이더라도 image_kb 이상의 이미지 용량에 대해서만, 썸을 만든다
function amina_resize_content($content, $width=0, $height=0, $quality=0, $thumb_create=0, $image_window=1, $water_mark='', $image_filter='', $image_min=0, $image_min_kb=0)
{
    global $board;

    if ($width > 0)
        $board['resize_img_width'] = (int)$width;
    else
        $board['resize_img_width'] = 0;

    if ($height > 0)
        $board['resize_img_height'] = (int)$height;
    else
        $board['resize_img_height'] = 0;

    if ($quality > 0)
        $board['resize_img_quality'] = (int)$quality;
    else
        $board['resize_img_quality'] = 90;

    if ($thumb_create)
        $board['thumb_create'] = 1;
    else
        $board['thumb_create'] = 0;

    if ($image_window)
        $board['image_window'] = 1;
    else
        $board['image_window'] = 0;

    if ($image_min)
        $board['image_min'] = $image_min;

    if ($image_min_kb)
        $board['image_min_kb'] = $image_min_kb;

    if ($water_mark)
        $board['water_mark'] = $water_mark;

    if ($image_filter)
        $board['image_filter'] = $image_filter;
    
    return preg_replace_callback('/\<img[^\<\>]*\>/i', 'amina_resize', $content);
}

// $content                                   : resize할 img 태그가 있는 html
// $image_min     = $board[image_min]         : 값이 있으면, $thumb_create=1이더라도 image_min 이상의 폭의 이미지에 대해서만, 썸을 만든다
// $image_min_kb  = $board[image_min_kb]      : 값이 있으면, $thumb_create=1이더라도 image_kb 이상의 이미지 용량에 대해서만, 썸을 만든다
// $quality       = $board[resize_img_quality]: 썸네일 이미지의 quality (없으면 기본값, 70%를 사용)
// $image_window  = $board[image_window]      : 이미지를 누를때 팝업창을 띄울 것인지를 선택 (1: 팝업)
function amina_resize_dica($content, $image_min=0, $image_min_kb=0, $quality=90, $image_window=1)
{
    global $board;

    $board['image_min'] = (int)$image_min;

    $board['image_min_kb'] = (int)$image_min_kb;

    $board['resize_img_quality'] = (int)$quality;

    $board[image_window] = $image_window;

    return preg_replace_callback('/\<img[^\<\>]*\>/i', 'amina_resize', $content);
}

// 함수명 변경 - php4를 위한 array_combine 함수정의, http://kr2.php.net/manual/kr/function.array-combine.php
function amina_array_combine4($arr1, $arr2) {
    $out = array();
    
    $arr1 = array_values($arr1);
    $arr2 = array_values($arr2);
    
    foreach($arr1 as $key1 => $value1) {
        $out[(string)$value1] = $arr2[$key1];
    }
    
    return $out;
}

// 파일의 경로를 가지고 옵니다 (불당팩, /lib/common.lib.php에 정의된 함수)
function amina_file_path($path) {

    $dir = dirname($path);
    $file = basename($path);
    
    if (substr($dir,0,1) == "/") {
        $real_dir = dirname($_SERVER['DOCUMENT_ROOT'] . "/nothing");
        $dir = $real_dir . $dir;
    }
    
    return $dir . "/" . $file;
}

/** 
 * Converts human readable file size (e.g. 10 MB, 200.20 GB) into bytes. 
 * 
 * @param string $str 
 * @return int the result is in bytes 
 * @author Svetoslav Marinov 
 * @author http://slavi.biz 
 */ 

function amina_filesize2bytes($str) { 
    $bytes = 0; 

    $bytes_array = array( 
        'B' => 1, 
        'KB' => 1024, 
        'MB' => 1024 * 1024, 
        'GB' => 1024 * 1024 * 1024, 
        'TB' => 1024 * 1024 * 1024 * 1024, 
        'PB' => 1024 * 1024 * 1024 * 1024 * 1024, 
    ); 

    $bytes = floatval($str); 

    if (preg_match('#([KMGTP]?B)$#si', $str, $matches) && !empty($bytes_array[$matches[1]])) { 
        $bytes *= $bytes_array[$matches[1]]; 
    } 

    $bytes = intval(round($bytes, 2)); 

    return $bytes; 
} 

?>