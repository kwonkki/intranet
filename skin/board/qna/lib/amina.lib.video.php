<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// AMINA Skin Lib for AMINA BBS & THEMA - Copyright (c) 2012 AMINA - http://amina.co.kr
//
// only for Video 
//-------------------------------------------------------------------------------------

// 동영상 이미지 주소 가져오기
function amina_video_imgurl($url, $vid, $type) {
	global $g4;

	if($type == "vimeo") { //비메오
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://vimeo.com/api/v2/video/{$vid}.php");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$output = unserialize(curl_exec($ch));
		curl_close($ch);

		$imgurl = $output[0]['thumbnail_large'];

	} else if($type == "youtube" || $type == "ted" || $type == "daum" || $type == "pandora" || $type == "nate") {
		
		if($type == "youtube") $url = "http://www.youtube.com/watch?v={$vid}&feature=youtu.be";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$output = curl_exec($ch);
		curl_close($ch);

		preg_match('/\<meta property=\"og\:image\"[^\<\>]*\>/i', $output, $video);
		if($video) $video = amina_value($video[0]);
		$imgurl = $video[content];

	} 

	return $imgurl;
}

// 동영상 이미지 가져오기
function amina_video_img($url, $vid, $type, $opt='') {
	global $g4;

	$video_path = $g4[path]."/data/video";
	$type_path = $video_path."/".$type;
	$img = $type_path."/".$vid;
	$no_video = $g4[path]."/img/amina/no_video.png";

	if(file_exists($img) && $opt) @unlink($img);

	if(!file_exists($img)) {

		//썸네일 저장폴더
		if(!is_dir($video_path)) {
	        @mkdir($video_path, 0707);
	        @chmod($video_path, 0707);
		}			

		if(!is_dir($type_path)) {
	        @mkdir($type_path, 0707);
	        @chmod($type_path, 0707);
		}			

		//동영상 이미지 주소 가져오기
		$imgurl = amina_video_imgurl($url, $vid, $type);

		if($imgurl) {
			$ch = curl_init ($imgurl);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,1); 
			$err = curl_error($ch);
			if(!$err) $rawdata=curl_exec($ch);
			curl_close ($ch);
			if($rawdata) {
				$fp = fopen($img,'w'); 
				fwrite($fp, $rawdata); 
				fclose($fp); 
			} else {
				copy($no_video, $img); 
			}
		} else {
			copy($no_video, $img); 
		}
	} 

	return $img;
}

// 동영상 실제 아이디 가져오기
function amina_video_id($url, $vid, $type) {
	global $g4;

	$play = array();
	$info = array();
	$query = array();

	if (!$url || !$vid || !$type) return;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$output = curl_exec($ch);
	curl_close($ch);

	if($type == "daum") {
		preg_match('/\<meta property=\"og\:video\"([^\<\>])*\>/i', $output, $video);
		if($video) {
			$video = amina_value($video[0]);
			$$video[content] = preg_replace("/&amp;/", "&", $video[content]);
			$info = parse_url($video[content]);
			parse_str($info[query], $query); 
			$play[rid] = $query[vid];
		}
	} else if($type == "nate") {
		preg_match('/mov_id = \"([^\"]*)\"/i', $output, $video);
		$play[mov_id] = $video[0];

		preg_match('/vs_keys = \"([^\"]*)\"/i', $output, $video);
		$play[vs_keys] = $video[0];

		if($play) {
			$meta = "<meta {$play[mov_id]} {$play[vs_keys]} >";
			$video = amina_value($meta);
			$play[mov_id] = $video[mov_id];
			$play[vs_keys] = $video[vs_keys];
		}
	}

	return $play;
}

// 동영상 종류 파악
function amina_video_info($video_url, $view='') {
	global $g4;

	$video = array();
	$query = array();

	list($url, $opt) = explode("|", trim($video_url));

	$url = strip_tags($url);

	//변수 분리하기
	$video = amina_query($opt);

	//URL 담기
	$video[video] = $url;

	//숫자값만 가져오기
	$video[width] = preg_replace('/[^0-9]/', '', $video[width]); 
	$video[height] = preg_replace('/[^0-9]/', '', $video[height]);

	//주소분해
	$video[video_url] = preg_replace("/&amp;/", "&", $url);
	$info = parse_url($video[video_url]); 
	if($info[query]) parse_str($info[query], $query); 

	if($info[host] == "youtu.be") { //유튜브
		$video[type] = "youtube";
		$video[vid] = trim(str_replace("/","",$info[path]));
		$video[vid] = substr($video[vid], 0, 11);

	} else if($info[host] == "vimeo.com") { //비메오
		$video[type] = "vimeo";
		$vquery = explode("/",$video[video_url]);
		$num = count($vquery) - 1;
		$video[vid] = $vquery[$num];

	} else if($info[host] == "www.ted.com") { //테드
		$video[type] = "ted";
		$vquery = explode("/",$video[video_url]);
		$num = count($vquery) - 1;
		list($video[vid]) = explode(".", $vquery[$num]);
		$video[rid] = trim($info[path]);

	} else if($info[host] == "tvpot.daum.net") { //다음tv
		$video[type] = "daum";
		if($query[vid]) {
			$video[vid] = $query[vid];
			$video[rid] = $video[vid];
		} else {
			if($query[clipid]) {
				$video[vid] = $query[clipid];
			} else {
				$video[vid] = trim(str_replace("/v/","",$info[path]));
			}

			if($view) $play = amina_video_id($video[video_url], $video[vid], $video[type]);
			$video[rid] = $play[rid];
		}

	} else if($info[host] == "channel.pandora.tv") { //판도라tv
		$video[type] = "pandora";
		$video[ch_userid] = $query[ch_userid];
		$video[prgid] = $query[prgid];
		$video[vid] = $video[ch_userid]."_".$video[prgid];

	} else if($info[host] == "pann.nate.com") { //네이트tv
		$video[type] = "nate";
		$video[vid] = trim(str_replace("/video/","",$info[path])); 
		if($view) $play = amina_video_id($video[video_url], $video[vid], $video[type]);
		$video[mov_id] = $play[mov_id];
		$video[vs_keys] = $play[vs_keys];
	}

	//기본 사이즈
	if(!$video[width]) $video[width] = 640;
	if(!$video[height]) {
		switch($video[type]) {
			case 'nate'		: $video[height] = 384; break;
			default			: $video[height] = 360; break;			
		}
	}

     return $video;
}

?>