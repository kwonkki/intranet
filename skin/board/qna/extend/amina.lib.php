<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// Load AMINA SKIN 2.x - Copyright (c) 2012 AMINA - http://amina.co.kr
//-------------------------------------------------------------------------------------

//AMINA Skin Version
$amina_skin_version = "v2.0.2";

//Write Option Set for wr_10
function amina_array_write($wr_10) {
	$set = array();
	list($set[photo], $set[img_location], $set[img_space], $set[post_main], $set[post_good], $set[post_rss], $set[video], $set[file], $set[subj_b], $set[subj_i], $set[subj_s], $set[subj_color]) = explode("|", $wr_10);
	return $set;
}

//Video Option Set for wr_6
function amina_array_video($wr_6) {
	$set = array();
	list($set[movie_url], $set[movie_w], $set[movie_h], $set[movie_auto]) = explode("|", $wr_6);
	$set[movie_info] = $set[movie_url]."|width={$set[movie_w]} height={$set[movie_h]} auto={$set[movie_auto]}";
	return $set;
}

//Icon Option Set for wr_5
function amina_array_icon($wr_5) {
	$set = array();
	list($set[level], $set[mobile], $set[post_icon], $set[choice], $set[choice_point], $set[choice_mb], $set[post_cool], $set[post_icon_mb]) = explode("|", $wr_5);
	return $set;
}

//Sort Array
function amina_sort($Ary, $field, $reverse=false) {

	foreach($Ary as $res)
		$sortArr[] = $res[$field];

	($reverse) ? array_multisort($sortArr, SORT_DESC, $Ary) : array_multisort($sortArr, SORT_ASC, $Ary);

	return $Ary;
}

//Exchage Value
function amina_query($str) { 

	$querystring = array();
	$query = array();

	//공백(" ")으로 변수분리
	$querystring = explode(" ", $str);
	foreach($querystring as $q) {
		list($k, $v) = explode("=", $q, 2);
		$query[$k] = str_replace("+"," ",trim($v)); // "+" 를 공백으로 변환
	}

	return $query;
}

//Extract Value
function amina_value($tag) {
    preg_match_all('@(?P<attribute>[^\s\'\"]+)\s*=\s*(\'|\")?(?P<value>[^\s\'\"]+)(\'|\")?@i', $tag, $match);
    if (function_exists('array_combine')) {
        $value = array_change_key_case(array_combine($match['attribute'], $match['value']));
    } else {
        $value = array_change_key_case(amina_array_combine4($match['attribute'], $match['value']));
    }
		
	return $value;
}

//Mobile Check
function check_mobile(){
    
	$mobile = 0;
	$mobileKeyWords = array ('iPhone', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'Windows CE;', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson', 'Mobile', 'Symbian', 'Opera Mobi', 'Opera Mini', 'IEmobile');

	for($i = 0 ; $i < count($mobileKeyWords) ; $i++) {
		if(strpos($_SERVER['HTTP_USER_AGENT'],$mobileKeyWords[$i]) == true) {
			$mobile = 1;
			return $mobile;
		}
	}

	return $mobile;
}

//Move Mobile Page
function auto_mobile(){
	global $g4;

	$mobile = check_mobile();

	//pc버전 유지를 위해 섹션생성
	if($_GET['m'] == 'pc') set_session("pc", "1");
 
	//모바일페이지로 이동,
	if($mobile && (!$_SESSION['pc'] || !$_SERVER['QUERY_STRING']) && file_exists($g4[path]."/m/lib/m.lib.php")) goto_url($g4[path]."/m");
}

//Exchang URL
function gnu_url($file, $opt) {
	global $g4, $amina;

	if($opt) {

		//그누보드 URL
		$url = $g4[url];
		if($amina[gnu_url]) $url = $amina[gnu_url];
		$url = $url."/";

		//그누보드 상대경로
		$path = $g4[path]."/";

		$file = str_replace($path,$url,$file);
	}

    return $file;
}

//그누보드 긴글 주소 만들기
function sns_lurl($bo_table, $wr_id, $opt=''){
	global $amina;

	$lurl = $amina[gnu_url]."/bbs/board.php?bo_table={$bo_table}&wr_id={$wr_id}";
	if($opt == 1) $lurl = $amina[site_url]."/".$bo_table."/".$wr_id;

	return $lurl;
}

//그누보드 짧은 주소 만들기
function sns_surl($surl, $opt=''){
	global $amina;

	if($opt == 1) $surl = bitly_url($surl);

	return $surl;

}

//Bit.ly 짧은 주소 사용하기
function bitly_url($url){  
	global $amina;

	$data = "http://api.bit.ly/shorten?version=2.0.1&longUrl=".urlencode($url)."&login=".$amina[bitly_id]."&apiKey=".$amina[bitly_key]."&format=json&history=1";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $data); 
	$data = curl_exec($ch);
	curl_close($ch); 

    $data = json_decode($data);
    foreach($data->results as $row) {
		$burl = $row->shortCNAMEUrl;
	}
	return $burl;
}

// SNS 아이콘 출력하기
function amina_sns($skin_dir, $sns_subj, $lurl, $surl='', $sns_image=''){
	global $g4;

    if ($skin_dir)
        $sns_skin_path = "$g4[path]/skin/sns/$skin_dir";
	else
        $sns_skin_path = "$g4[path]/skin/sns/basic";

	$sns_subj = amina_cut($sns_subj, 200);

	if(!$surl) $surl = $lurl;

    $org_url = trim($lurl);
    $sns_url = trim($surl);

	if($sns_image) {
		$fb_image = "&p[images][0]=".urlencode(amina_set_utf8($sns_image));
	}

    $me2day_url = "http://me2day.net/posts/new?new_post[body]=".urlencode(amina_set_utf8($sns_subj)." - \"$sns_url\":$sns_url");
    //$twitter_url = "http://twitter.com/home?status=".urlencode(set_utf8($view[wr_subject])." - $sns_url");
    $twitter_url = "http://twitter.com/?status=".str_replace("+", " ", urlencode(amina_set_utf8($sns_subj)." - $sns_url"));
	$tw_url = $org_url;
	$tw_txt = $sns_subj;
	//$facebook_url = "http://www.facebook.com/share.php?u=".urlencode($org_url);
	$facebook_url = "http://www.facebook.com/share.php?s=100&p[url]=".urlencode($sns_url)."&p[title]=".urlencode(amina_set_utf8($sns_subj))."".$fb_image;
	$fb_url = urlencode($org_url);
	$yozm_url = "http://yozm.daum.net/api/popup/prePost?sourceid=41&link={$sns_url}&prefix=".urlencode(amina_set_utf8($sns_subj));
    $cy_url = "javascript:window.open('http://csp.cyworld.com/bi/bi_recommend_pop.php?url={$sns_url}', ";
    $cy_url.= "'recom_icon_pop', 'width=400,height=364,scrollbars=no,resizable=no');";
	$google_url = "https://www.google.com/bookmarks/mark?op=add&title=".urlencode(amina_set_utf8($sns_subj))."&bkmk=".$sns_url;
	$naver_url = "http://bookmark.naver.com/post?ns=1&title=".urlencode(amina_set_utf8($sns_subj))."&url=".$sns_url;

    ob_start();
    include "$sns_skin_path/sns.skin.php";
    $view_sns = ob_get_contents();
    ob_end_clean();

	return $view_sns;
}

/* SNS관련해서 배추보드에서 차용한 함수*/

// euckr -> utf8 
function amina_set_utf8($str) {
    if (!amina_is_utf8($str))
        $str = amina_convert_charset('cp949', 'utf-8', $str);

    $str = trim($str);

    return $str;
}

// utf8 -> euckr 
function amina_set_euckr($str) {
    if (amina_is_utf8($str))
        $str = amina_convert_charset('utf-8', 'cp949', $str);

    $str = trim($str);

    return $str;
}

// Charset 을 변환하는 함수 
function amina_convert_charset($from_charset, $to_charset, $str) {
    if(function_exists('iconv'))
        return iconv($from_charset, $to_charset, $str);
    elseif(function_exists('mb_convert_encoding') )
        return mb_convert_encoding($str, $to_charset, $from_charset);
    else
		return $str;
		//die("Not found 'iconv' or 'mbstring' library in server.");
}

// 텍스트가 utf-8 인지 검사하는 함수 
function amina_is_utf8($string) {

  // From http://w3.org/International/questions/qa-forms-utf-8.html
  return preg_match('%^(?:
        [\x09\x0A\x0D\x20-\x7E]            # ASCII
      | [\xC2-\xDF][\x80-\xBF]            # non-overlong 2-byte
      |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
      | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
      |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
      |  \xF0[\x90-\xBF][\x80-\xBF]{2}    # planes 1-3
      | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
      |  \xF4[\x80-\x8F][\x80-\xBF]{2}    # plane 16
 )*$%xs', $string);
}

// Extract Text
function amina_text($str) {
	global $g4;

	$str = strip_tags($str);
	$str = preg_replace("/{이미지\:([^}]*)}/ie", "", $str);
	$str = preg_replace("/{동영상\:([^}]*)}/ie", "", $str);
	$str = str_replace("&nbsp;"," ",$str);
	$str = preg_replace('/\s\s+/', ' ', $str);
	$str = trim($str);

	return $str;
}

// Cut Text
function amina_cut($str, $len, $tail="…") {
	global $g4;

	$str = amina_text($str);
	$str = cut_str($str, $len, $tail);

	return $str;
}

// AMINA Date
function amina_date($wr_date) {

	$diff = time() - strtotime($wr_date);
 
	if( $diff < 60 ) {
		$date = $diff."초전";
	} else if( 3600 > $diff && $diff >= 60 ) {
		$date = round($diff/60)."분전";
	} else if( 86400 > $diff && $diff >= 3600 ) {
		$date = round($diff/3600)."시간전";
	} else {
		$date = round($diff/86400)."일전";
	} 

	return $date;
}

//Check Attached File
function amina_attach_file($attach) {

	$chk_file = false;
	for ($i=0; $i<count($attach); $i++) {
		if ($attach[$i][source] && !$attach[$i][view]) {
			$chk_file = true;
			return $chk_file;
		}
    }

	return $chk_file;
}

//Check Attached Image
function amina_attach_img($attach, $wr_content, $rows='1') {
	global $g4, $amina;

	$img = array();

	$z = 0;
	//Direct Attach
	for ($k=0; $k<count($attach); $k++) {
		if ($attach[$k][view]) {
			$attach_img[$k] = $attach[$k][path]."/".$attach[$k][file];
			if(preg_match("/\.(jpg|gif|png)$/i", $attach_img[$k]) && file_exists($attach_img[$k])) {
				$img[] = $attach_img[$k];
				$z++;
				if($z == $rows) return $img;
			}
		}
	}

	//Edit Attach
	if(preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $wr_content, $match)) {
		for ($k=0; $k<count($match[1]); $k++) {
			list($edit_img) = explode("\"", $match[1][$k]); //크롬에서 오류 방지..
			if(!preg_match('/icons\/em\/[^<>]*\/[^<>]*\.(jpg|gif|png)$/i', $edit_img)) {
			    if (preg_match("/^(http|https|ftp|telnet|news|mms)\:\/\//i", $edit_img)) {
					if (preg_match("/" . $_SERVER[HTTP_HOST] . "/", $edit_img, $matches)) {
						$edit_img = str_replace($amina[gnu_url], $g4[path], $edit_img);
					}
				}
				$img[] = $edit_img;
				$z++;
				if($z == $rows) return $img;
			}
		}
	}

	return $img;
}

//동영상 포함 썸네일용 이미지 하나 뽑아오기
function amina_thumb_img($attach, $wr_6, $wr_content, $rows='1', $link_youngcart='', $it_id='') {
	global $g4, $amina;

	$img = array();
	$info = array();
	$video = array();

	$z = 0;

	//직접 첨부한 이미지
	for ($k=0; $k<count($attach); $k++) {
		if ($attach[$k][view]) {
			$attach_img[$k] = $attach[$k][path]."/".$attach[$k][file];
			if(preg_match("/\.(jpg|gif|png)$/i", $attach_img[$k]) && file_exists($attach_img[$k])) {
				$img[] = $attach_img[$k];
				$z++;
				if($z == $rows) return $img;
			}
		}
	}

	//직접링크 동영상 이미지
	if($wr_6) {
		$info = amina_array_video($wr_6);
		if($info[movie_url]) {
			include_once("$g4[path]/lib/amina.lib.video.php");
			$video = amina_video_info($info[movie_info]);
			$img[] = amina_video_img($video[video_url], $video[vid], $video[type]);
			$z++;
			if($z == $rows) return $img;
		} 
	}
		
	//에디터에 삽입된 이미지
	if(preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $wr_content, $match)) {
		for ($k=0; $k<count($match[1]); $k++) {
			list($edit_img) = explode("\"", $match[1][$k]); //크롬에서 오류 방지..
			if(!preg_match('/icons\/em\/[^<>]*\/[^<>]*\.(jpg|gif|png)$/i', $edit_img)) {
			    if (preg_match("/^(http|https|ftp|telnet|news|mms)\:\/\//i", $edit_img)) {
					if (preg_match("/" . $_SERVER[HTTP_HOST] . "/", $edit_img, $matches)) {
						$edit_img = str_replace($amina[gnu_url], $g4[path], $edit_img);
					}
				}
				$img[] = $edit_img;
				$z++;
				if($z == $rows) return $img;
			}
		}
	}

	//에디터에 삽입된 동영상
	if(preg_match_all("/{동영상\:([^}]*)}/ie", $wr_content, $match)) {
		include_once("$g4[path]/lib/amina.lib.video.php");
		for ($k=0; $k<count($match[1]); $k++) {
			if(preg_match('/http:\/\/(youtu\.be|vimeo\.com|tvpot\.daum\.net|www\.ted\.com|channel\.pandora\.tv|pann\.nate\.com)/', $match[1][$k])) {
				list($url) = explode("|", trim(strip_tags($match[1][$k])));
				$video = amina_video_info($url);
				$img[] = amina_video_img($video[video_url], $video[vid], $video[type]);
				$z++;
				if($z == $rows) return $img;
			}
		}
	}

	//영카트 상품이미지
	if($link_youngcart && $it_id) {
		if(file_exists($g4[path]."/data/item/".$it_id."_l1")) { //상품이미지
			$img[] = $g4[path]."/data/item/".$it_id."_l1";
			$z++;
			if($z == $rows) return $img;
		}
	}

	return $img;
}

// Load Member Photo
function mb_photo($login_id, $mb_id, $width='80', $height='80', $no_photo='', $thumb='') {
	global $g4, $bo_table;

	$mb_photo = $g4[path]."/data/mb_photo/".$mb_id;

	if(!$mb_id || !file_exists($mb_photo)) {
		if($no_photo) {
			$mb_photo = "";
			return $mb_photo;
		} else {
			$mb_photo = $g4[path]."/img/amina/no_photo.gif";
		}
	}

	if($login_id && $login_id == $mb_id) {
		$photo_upload_url = $g4[bbs_path]."/amina.mb.photo.php";
		$onclick = " onclick=\"window.open('{$photo_upload_url}','photo','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=200,top=20,left=20');\" style='cursor:pointer;' title='회원사진 등록 및 수정하기' ";
	}	

	$mb_photo = "<img src='".$mb_photo."' width='{$width}' height='{$height}' border=0 {$onclick}>";

	return $mb_photo;
}

//Upload Member Photo
function mb_photo_upload($mb_id, $del_photo, $_FILES) {
	global $g4;

	//Photo Size
	$photo_w = 80;
	$photo_h = 80;
	$photo_dir = $g4[path]."/data/mb_photo";
	$temp_dir = $g4[path]."/data/mb_photo/temp";

	if(!is_dir($photo_dir)) {
        @mkdir($photo_dir, 0707);
        @chmod($photo_dir, 0707);
	}

	if(!is_dir($temp_dir)) {
        @mkdir($temp_dir, 0707);
        @chmod($temp_dir, 0707);
	}

	//Delete Photo
	if ($del_photo == "1")
		@unlink($photo_dir."/{$mb_id}");
    
	//Upload Photo
	if (is_uploaded_file($_FILES[mb_icon2][tmp_name])) {
		if (!preg_match("/(\.(jpg|gif|png))$/i", $_FILES[mb_icon2][name])) {
			alert($_FILES[mb_icon2][name] . '은(는) 이미지(gif/jpg/png) 파일이 아닙니다.');
		} else {
			$org_photo = $photo_dir."/{$mb_id}";
			$temp_photo = $temp_dir."/{$mb_id}";
			move_uploaded_file($_FILES[mb_icon2][tmp_name], $temp_photo);
			chmod($temp_photo, 0606);
			if(file_exists($temp_photo)) {
			    $size = @getimagesize($temp_photo);

			    //Non Image
				if (!$size[0]) {
					@unlink($temp_photo);
					alert('회원사진 등록에 실패했습니다. 이미지 파일이 정상적으로 업로드 되지 않았거나, 이미지 파일이 아닙니다.');
				}			

				//Thumbnail Lib
				include_once("$g4[path]/lib/thumb.lib.php");

				//Animated GIF
			    if($size[2] == IMG_GIF && is_animated_gif($temp_photo)) {
					copy($temp_photo, $org_photo);
					chmod($org_photo, 0606);
					@unlink($temp_photo);
				} else {
					$thumb = thumbnail($temp_photo, $photo_w, $photo_h, "1", "2", "90", "1");
					if($thumb) {
						copy($thumb, $org_photo);
						chmod($org_photo, 0606);
						@unlink($thumb);
						@unlink($temp_photo);
					} else {
						@unlink($temp_photo);
						alert('회원사진 등록에 실패했습니다. 이미지 파일이 정상적으로 업로드 되지 않았거나, 이미지 파일이 아닙니다.');
					}
				}
			}
		}
	}
}

// Calculate XP 
function check_xp($mb_id) {
	global $g4, $xp;

	if(!$mb_id || $xp[xp_use] != 1) return;

	//Caculate XP
	if($xp[xp_rule] == 2) {
		$sql = " select SUM(po_point) as point from $g4[point_table] where mb_id = '$mb_id' and (po_rel_action = '쓰기' or po_rel_action = '코멘트') ";
		$row = sql_fetch($sql);
		$point = $row[point];
	} else if($xp[xp_rule] == 3) {
		$sql = " select SUM(po_point) as point from $g4[point_table] where mb_id = '$mb_id' and (po_rel_action = '쓰기' or po_rel_action = '코멘트' or po_rel_table = '@login') ";
		$row = sql_fetch($sql);
		$point = $row[point];
	} else {
		$sql = " select mb_point from $g4[member_table] where mb_id = '$mb_id' ";
		$row = sql_fetch($sql);
		$point = $row[mb_point];
	}

	//Caculat Level
	if($point > 0) {
		$level = chk_xp_num($point, $xp[xp_point], $xp[xp_max]);
	} else {
		$point = 0;
		$level = 1;
	}

	//Update Member Info
	sql_query(" update $g4[member_table] set mb_9 = '$level', mb_10 = '$point' where mb_id = '$mb_id' ");

	$info[0] = $level;
	$info[1] = $point;

	return $info;
}

//Calculate XP
function chk_xp_num($point, $xp_point, $xp_max) {

	//기본값
	if(!$point || $point < 0 || !is_numeric($point)) $xp_point = 0;
	if(!$xp_point || $xp_point < 0 || !is_numeric($xp_point)) $xp_point = 1;

	//레벨계산
	if($point > 0) {
		$level = ($point / $xp_point) + 1;
		$level = (int)$level;
		if($level > $xp_max) $level = $xp_max;
	} else {
		$level = 1;
	}

	return $level;
}

//Calculate Level
function xp_level($mb_id='') {
	global $g4, $member, $xp;

	if(!$mb_id) $mb_id = $member[mb_id];
	if($mb_id) {
		$level = $member[mb_9];
		if(!$level || !is_numeric($level)) {
			list($level) = check_xp($mb_id);
		} else {
			if($level != chk_xp_num($member[mb_10], $xp[xp_point], $xp[xp_max])) {
				list($level) = check_xp($mb_id);
			}
		}
	} else {
		$level = 1;
	}

	return $level;
}

//XP Level Icon
function xp_icon($xp_id, $xp_level) {
	global $g4, $xp;

	$xp_icon = "";

	if($xp[xp_use] == 1) {
		if(!$xp_id) {
			$xp_icon = "guest";
		} else {
			$is_admin = is_admin($xp_id);
			if($is_admin) {
				$xp_icon = "admin";
			} else {
				$xp_mb = explode(",", trim($xp[xp_mb_list]));
				for($i = 0 ; $i < count($xp_mb) ; $i++) {
					if($xp_id == $xp_mb[$i]) {
						$xp_icon = "special";
						break;
					}
				}
			}
		}

		if(!$xp_icon) {
			if(is_numeric($xp_level)) {
				$xp_icon = $xp_level;
			} else {
				$xp_icon = 1;
			}
		}

		if($xp[xp_icon] == "img") {
			$xp_icon = "<img src='{$g4[path]}/skin/xp/{$xp[xp_icon_skin]}/".$xp_icon.".gif' border=0>";
		} else {

			switch ($xp_icon) {
				case 'guest'	: $xp_icon = "GT"; break;
				case 'admin'	: $xp_icon = "AD"; break;
				case 'special'	: $xp_icon = "SP"; break;
				default			: $xp_icon = "LV ".$xp_icon; break;
			}

			$xp_icon = "<span style='font:bold 10px verdana;letter-spacing:-1px;'>".$xp_icon."</span>";
		}
	}

	return $xp_icon;
}

//XP Info
function xp_info($mb_id='') {
	global $g4, $xp;

	$info = array();

	if(!$mb_id || $xp[xp_use] != 1) {
		$info[point] = 0;
		$info[xp] = 0;
		$info[level] = 1;
	} else {
		$mb = sql_fetch(" select mb_level, mb_point, mb_9, mb_10 from $g4[member_table] where mb_id = '$mb_id' ");
		$grade = $mb[mb_level];
		if($xp[xp_rule] == 1) {
			if(!$mb[mb_9] || !is_numeric($mb[mb_9])) {
				list($info[level], $info[xp]) = check_xp($mb_id);
				$info[point] = $mb[mb_point];
			} else {
				$info[point] = $mb[mb_point];
				$info[xp] = $mb[mb_10];
				$info[level] = $mb[mb_9];
			}
		} else {
			if(!$mb[mb_9] || !is_numeric($mb[mb_9]) || !$mb[mb_10] || !is_numeric($mb[mb_10])) {
				list($info[level], $info[xp]) = check_xp($mb_id);
				$info[point] = $mb[mb_point];
			} else {
				$info[point] = $mb[mb_point];
				$info[xp] = $mb[mb_10];
				$info[level] = $mb[mb_9];
			}
		}
	}

	if($info[level] != chk_xp_num($info[xp], $xp[xp_point], $xp[xp_max])) {
		list($info[level], $info[xp]) = check_xp($mb_id);
	}

	if($info[level] >= $xp[xp_max]) {
		$info[per] = 100;
		$info[up] = 0;
	} else {
		$now_xp = $info[xp] - (($info[level] - 1) * $xp[xp_point]); // 잔여 포인트
		$info[per] = ($now_xp / $xp[xp_point]) * 100;
		$info[up] = $xp[xp_point] - $now_xp;
	}	

	if(!$grade) $grade = 1;

	$info[grade] = $xp[grade][$grade];

	return $info;
}

//AMINA SKIN 2.x Setup Load
$xp = array();
$amina = array();

//Link to Yongcart
$link_youngcart = false;
if($board[bo_skin] == "amina-v2") {

	//AMINA Skin Settings
	$amina = sql_fetch(" select * from $g4[board_table]_amina where bo_table='$bo_table' ", false);

	//AMINA Skin Path
	$addon_skin_path = $board_skin_path."/skin/addon/".$amina[addon_skin];
	$cate_skin_path = $board_skin_path."/skin/cate/".$amina[cate_skin];
	$head_skin_path = $board_skin_path."/skin/head/".$amina[head_skin];
	$list_skin_path = $board_skin_path."/skin/list/".$amina[list_skin];
	$view_skin_path = $board_skin_path."/skin/view/".$amina[view_skin];
	$emo_skin_path = $board_skin_path."/skin/emo/".$amina[emo_skin];
	$sign_skin_path = $board_skin_path."/skin/sign/".$amina[sign_skin];
	$cmt_skin_path = $board_skin_path."/skin/cmt/".$amina[cmt_skin];
	$write_skin_path = $board_skin_path."/skin/write/".$amina[write_skin];
	$page_skin_path = $board_skin_path."/skin/page/".$amina[page_skin];
	$btn_skin_path = $board_skin_path."/skin/btn/".$amina[btn_skin];

	//Link to Youngcart BBS
	if($bo_youngcart) {
		$bo_youngcart_list = explode(",", $bo_youngcart);
		if(in_array(strval($bo_table), $bo_youngcart_list)) $link_youngcart = true;
	}
}

//AMINA SKIN 2.x Basic Settings
include_once("$g4[path]/amina.cfg.php");

//Link for iframe & bo_it
$frame_opt = "";
if($frame) {
	$thema = "iframe";
	$frame_opt .= "&frame=".$frame;
	$qstr .= "&frame=".$frame;
}

if($bo_it) {
	$frame_opt .= "&bo_it=".$bo_it;
	$qstr .= "&bo_it=".$bo_it;
}

?>