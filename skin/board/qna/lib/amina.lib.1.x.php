<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 아미나 스킨 1.x 버전에 사용하던 함수들로 2.0 이상버전에서 사용하지 않습니다. 필요없으신 분들은 본 php 파일을 삭제해 주세요.

include_once("$g4[path]/lib/amina.lib.thumb.php");
include_once("$g4[path]/lib/amina.lib.video.php");
include_once("$g4[path]/lib/amina.lib.star.php");
include_once("$g4[path]/lib/amina.lib.view.skin.php");
include_once("$g4[path]/lib/amina.lib.write.skin.php");

//{이미지:번호:옵션} 형식 변환
function amina_image_content($wr_file, $width='640', $num, $info){
	global $g4, $board;

	$query = array();

	if(!$wr_file || !is_numeric($num)) return;

	//이미지 체크
	if($wr_file[$num][view]) {
		$image = $wr_file[$num][path]."/".$wr_file[$num][file];
		if(preg_match("/\.(jpg|gif|png)$/i", $image) && file_exists($image)) {

			//변수 분리하기
			$query = amina_query($info);

			//변수값에서 숫자값만 가져오기
			$query[width] = preg_replace('/[^0-9]/', '', $query[width]); 
			$query[height] = preg_replace('/[^0-9]/', '', $query[height]);

			$img = "<img src='{$image}' name='target_resize_image[]' onclick='image_window(this);' style='cursor:pointer;' title='{$wr_file[file][$num][content]}'>";
			if($query[thumb]) {
				if(!$query[width]) $query[width] = $width;
				if(!$query[height]) $query[height] = "";
				$img = amina_resize_content($img, $query[width], $query[height]);
			} else {
				$img = amina_resize_content($img, $width , 0);
			}

			// 크기재입력하기
			if($query[width] && $query[height]) {
				$img = preg_replace('/width\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'width="' . $query[width] . '" height="' . $query[height] . '"', $img); 
			} else if($query[width] && !$query[height]) {
				$img = preg_replace('/width\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'width="' . $query[width] . '"', $img); 
			} else if(!$query[width] && $query[height]) {
				$img = preg_replace('/width\=(\'|\")?[^\s\'\"]+(\'|\")?/i', 'width="' . $width . '" height="' . $query[height] . '"', $img); 
			}

			return $img;
		}
	}
	
	return;
}

//별점
function amina_star($star, $total, $people, $type=''){
	global $board_skin_path;

	if(!$star) $star = "gold";

	$total = trim($total);
	$people = trim($people);

	if(!is_numeric($total) || !is_numeric($people)) {
		$total = 0;
		$people = 0;
	} 

	$score = 0;
	if($people > 0) $score = $total / $people;

	$score = round($score,1);
	$point = round($score) * 10;

	switch($type) {
		case 'l'	: $size = "l"; $width = "100"; $height = "25"; break;
		case 'm'	: $size = "m"; $width = "70"; $height = "12"; break;
		case 's'	: $size = "s"; $width = "55"; $height = "10"; break;
		default		: $size = "s"; $width = "55"; $height = "10"; break;
	}

	$alt = number_format($score, 1)."점 / ".number_format($people, 0)."명";
	$star = "<div class='star_{$size}'><div class='mask' style='width:{$point}%'><img src='{$board_skin_path}/img/star/star_{$star}_{$size}.png' width='{$width}' height='{$height}' border=0 title=' {$alt} ' style='cursor:pointer;'></div></div>";

	return $star;
}

//글쓰기 관련 설정값(wr_10)
function wr_amina($wr_10) {

	$post = array();

	list($post[photo], $post[img_location], $post[img_space], $post[post_main], $post[post_good], $post[post_rss], $post[video], $post[file]) = explode("|", trim($wr_10));

	return $post;
}

//동영상 첨부 설정값(wr_6)
function wr_movie($wr_6) {

	$movie = array();

	list($movie[movie_url], $movie[movie_w], $movie[movie_h], $movie[movie_auto]) = explode("|", trim($wr_6));

	$movie[movie_info] = $movie[movie_url]."|width={$movie[movie_w]} height={$movie[movie_h]} auto={$movie[movie_auto]}";

	return $movie;
}

// 본문 동영상 출력
function amina_movie_content($vid, $mobile='') {
	global $g4;

	// 동영상 관련 불러오기
	include_once("$g4[path]/lib/amina.lib.video.php");

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
			$show .= "<a href=\"{$video[movie_url]}\" target=\"_blank\"><img src=\"{$m_photo}\" style=\"border:0;display:block;\" /></a>";
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

//댓글 내용 full 출력..(수정필요함)
function amina_comments($board, $list) {
	global $g4;

	if (strstr($list[wr_option], "secret")) {
		$str = "<span style='color:#ff6600;'>* {$list[content]}</span>";
	} else {
		$str = $list[content];
	    $str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str);
	    // FLASH XSS 공격에 의해 주석 처리 - 110406
	    //$str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(swf)\".*\<\/a\>\]/i", "<script>doc_write(flash_movie('$1://$2.$3'));</script>", $str);
	    $str = preg_replace("/\[\<a\s*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\"\s*[^\>]*\>[^\s]*\<\/a\>\]/i", "<img src='$1://$2.$3' id='target_resize_image[]' onclick='image_window(this);' border='0'>", $str);
	}

	return $str;
}

//아이콘, 댓글채택 등 설정값(wr_5)
function wr_icon($wr_5) {

	$icon = array();

	list($icon[level], $icon[mobile], $icon[post_icon], $icon[choice], $icon[choice_point], $icon[choice_mb], $icon[post_cool], $icon[post_icon_mb]) = explode("|", trim($wr_5));

	return $icon;
}

// 분류 자동 선택
function amina_category_option($bo_table='', $ca_name) {
    global $g4, $board;

    $arr = explode("|", $board[bo_category_list]); // 구분자가 , 로 되어 있음
    $str = "";
    for ($i=0; $i<count($arr); $i++) {
        if (trim($arr[$i])) {
			if(trim($arr[$i]) == $ca_name) { $selected = "selected"; } else { $selected = ""; }
			$str .= "<option value='$arr[$i]' $selected >$arr[$i]</option>\n";
		}
	}
    return $str;
}

function show_movie($movie, $mobile='') { //동영상 재생하기

	$show = "";

	if($movie[movie_id]) {
		if($mobile) {
			$m_photo = "http://img.youtube.com/vi/{$movie[movie_id]}/hqdefault.jpg";

			$show = "<table bordder=0 cellpadding=0 cellspacing=0><tr><td style=\"background:#000;\">";
			$show .= "<a href=\"$movie[movie_url]\" target=\"_blank\"><img src=\"{$m_photo}\" style=\"border:0;display:block;\" /></a>";
			$show .= "</td></tr><tr height=\"6\"><td></td></tr><tr><td align=center class=small>[유튜브] 동영상을 보실려면 클릭해 주세요.</td></tr><tr height=\"15\"><td></td></tr></table>\n";
		} else {
			if(!$movie[movie_w] || !is_numeric($movie[movie_w])) $movie[movie_w] = 640;
			if(!$movie[movie_h] || !is_numeric($movie[movie_h])) $movie[movie_h] = 360;

			if($movie[movie_auto]) $auto = "&amp;autoplay=1";
			$show = "<p align=center><EMBED width='{$movie[movie_w]}' height='{$movie[movie_h]}' type=application/x-shockwave-flash src=http://www.youtube.com/v/{$movie[movie_id]}{$auto}&amp;loop=1 allowScriptAccess='always' allowfullscreen='true' hl='ko_KR&amp;feature=player_embedded&amp;version=3'></EMBED></p>";
		}
	}

	return $show;
}

// 별점주기 폼 출력하기
function amina_star_form($skin, $bo_table, $wr_id){
	global $g4, $amina, $board, $view, $board_skin_path;

    if ($skin)
        $star_form_path = "$board_skin_path/star/$skin";
    else
        $star_form_path = "$board_skin_path/star/basic";

	ob_start();
	include "$star_form_path/star.form.php";
    $view_star = ob_get_contents();
    ob_end_clean();

	return $view_star;
}

// SNS 아이콘 출력
function chk_sns_icon($wr_option, $wr_sns, $opt){

	$sns_icon = false;
	if(!strstr($wr_option, "secret")) {
		if($wr_sns == "all" || $wr_sns == $opt) $sns_icon = true;
	}

	return $sns_icon;
}

//동영상 썸네일 체크
function amina_video_thumb($wr_6, $wr_content) {
	global $g4;

	$info = array();
	$video = array();

	$img = "";

	//직접첨부 동영상
	if($wr_6) {
		$info = wr_movie($wr_6); //직접링크 동영상
		if($info[movie_url]) {
			$video = amina_video_info($movie[movie_info]);
			$img = amina_video_img($video[video_url], $video[vid], $video[type]);
			if($img) return $img;
		}
	} 
		
	//본문첨부 동영상
	if(preg_match_all("/{동영상\:([^}]*)}/ie", $wr_content, $match)) {
		for ($i=0; $i<count($match[1]); $i++) {
			//동영상 썸네일 체크
			if(preg_match('/http:\/\/(youtu\.be|vimeo\.com|tvpot\.daum\.net|www\.ted\.com|channel\.pandora\.tv|pann\.nate\.com)/', $match[1][$i])) {
				list($url) = explode("|", trim(strip_tags($match[1][$i])));
				$video = amina_video_info($url);
				$img = amina_video_img($video[video_url], $video[vid], $video[type]);
				if($img) return $img;
			}
		}
	}

	return $img;
}

// 썸네일 가져오기
function amina_thumb($path, $list, $img_w, $img_h, $no_img="", $mb_photo="", $no_thumb="", $is_crop=2, $quality=90, $is_create=false, $small_thumb='1') {
	global $g4;

	if($list[img]) {
		$thumb = $list[img];
		if(!$no_thumb) $thumb = thumbnail($list[img], $img_w, $img_h, $is_create, $is_crop, $quality, $small_thumb);
	} else {
		//유튜브, 비메오, 다음TV 등 동영상 이미지
		$video_img = amina_video_thumb($list[wr_6], $list[wr_content]);
		if($video_img) {
			$thumb = $video_img;
			if(!$no_thumb) $thumb = thumbnail($thumb, $img_w, $img_h, $is_create, $is_crop, $quality, $small_thumb);
		} else {
			if($mb_photo) {
				$thumb = $g4[path]."/data/mb_photo/".$list[mb_id].".gif";
				if($no_img && !file_exists($thumb)) $thumb = $g4[path]."/img/amina_no_photo.gif";
			} else {
				if($no_img) {
					$thumb = $g4[path]."/img/amina_no_image.gif";
					if(!$no_thumb) $thumb = thumbnail($thumb, $img_w, $img_h, $is_create, $is_crop, $quality, $small_thumb);
				}
			}
		}
	}

	return $thumb;
}

//본문 내용 full 출력..
function amina_contents($board, $list, $width='640', $mobile='') {
	global $g4, $bo_table, $amina;

	$post = array();
	$movie = array();

	//모바일 체크
	if($mobile) $mobile = check_mobile();

	$post = wr_amina($list[wr_10]); //글쓰기 옵션
	$movie = wr_movie($list[wr_6]); //유튜브 동영상

	$content = "";
	if($post[img_location] == "insert") { //첨부이미지 본문삽입이라면..
		$content = preg_replace("/{이미지\:([0-9]+)[:]?([^}]*)}/ie", "amina_image_content(\$board, \$list, \$width, '\\1', '\\2')", $list[content]);
	} else {
		$file = "";
		for ($i=0; $i<=count($list[file]); $i++) {
		    if($list[file][$i][view]) {
				$file .= $list[file][$i][view]."<br>\n";
				if($post[img_space] != "1") $file .= "<br>\n";
			}
		}

		if($post[img_space] == "1") $file .= "<br>\n";

		if($file && $post[img_location] != "bottom") $content .= "<center>".$file."</center>\n";
		$content .= $list[content];
		if($file && $post[img_location] == "bottom") $content .= "<center>".$file."</center>\n";

		$content = amina_resize_content($content, $width);
	}

	//본문 동영상 변환 - {동영상:주소|width=크기 height=크기 auto=ok} 형식
	$content = preg_replace("/{동영상\:([^}]*)}/ie", "amina_movie_content('\\1','{$mobile}')", $content);

	$view_content = "";
	$view_content .= show_movie($movie, $mobile);
	$view_content .= $content;
	$view_content .= "<!-- 테러 태그 방지용 --></xml></xmp><a href=\"\"></a><a href=''></a>";


	return $view_content;
}

//익명글 이름 - 영문 숫자 조합 난수생성
function amina_rand_id($num) {

	if($num > 0) {
		$temp = str_split('abcdefghijklmnopqrstuvwxyz012345678901234567890123456789'); 
		shuffle($temp); 
		$id = implode('',array_slice($temp,0,$num));
	} else {
		$id = "";
	}

	return $id;
} 

// 글내용 SNS 사용체크
function chk_view_sns($bo_table, $sca, $view){
	global $amina;

	$view_sns = "yes";
	if(strstr($view[wr_option], "secret") || !$amina[view_sns] || !$amina[view_sns] == "cmt") $view_sns = ""; //비밀글에는 출력하지 않음

	return $view_sns;
}

// 댓글SNS 사용체크
function chk_cmt_sns($bo_table, $sca, $view){
	global $amina;

	$cmt_sns = "yes";
    if(strstr($view[wr_option], "secret")  || !$amina[view_sns] || !$amina[view_sns] == "view") $cmt_sns = ""; //원글이 비밀글에는 출력하지 않음

	return $cmt_sns;
}

function amina_latest($skin_dir="", $bo_table="", $rows=10, $subject_len=40, $options="", $type_arr="", $ca_name="", $bo_title="", $sql_opt="") {
    global $g4, $thema_skin_path;

	if(file_exists("{$g4[path]}/skin/latest/{$skin_dir}/latest.skin.php")) {
			$latest_skin_path = "$g4[path]/skin/latest/$skin_dir";
	} else {
		if(file_exists("{$thema_skin_path}/latest/{$skin_dir}/latest.skin.php")) {
			$latest_skin_path = "$thema_skin_path/latest/$skin_dir";		
		} else {
	        $latest_skin_path = "$g4[path]/skin/latest/basic";
		}
	}

    $list = array();

	list($type[name], $type[opt], $type[bo_list]) = explode("|", trim($type_arr));

	if($type[name] == "newgul" || $type[name] == "newcmt" || $type[name] == "newcmtgul") {

		// 새글에서 추출
		$new_sql = "";
		$arr_board = explode(",", trim($type[bo_list]));
		$arr_num = count($arr_board);

		if($type[opt] == "exclude") {
			for ($k=0; $k < $arr_num; $k++) {
				if (trim($arr_board[$k])=='') continue;
				$new_sql .= " and bo_table != '$arr_board[$k]' ";
			}
		} else if($type[opt] == "include") {
			$tmp_sql = "";
			for ($k=0; $k < $arr_num; $k++) {
				if (trim($arr_board[$k])=='') continue;
				$tmp_sql .= " bo_table = '$arr_board[$k]' or ";
			}

			if($tmp_sql) {
				$tmp_sql .= "//END";
				list($tmp2_sql) = explode(" or //END", trim($tmp_sql));
				$new_sql .= " and (".$tmp2_sql.") ";
			}
		}
		
		if($type[name] == "newgul") {
			$new_type = " wr_id = wr_parent ";
			$bo_href = $g4[bbs_path]."/new.php?view=w";
		} else if($type[name] == "newcmt" || $type[name] == "newcmtgul") {
			$new_type = " wr_id <> wr_parent ";	
			$bo_href = $g4[bbs_path]."/new.php?view=c";
		}

		// 추출 및 정리
		if($type[name] == "newcmt") {
			$result = sql_query(" select * from $g4[board_new_table] where $new_type $new_sql order by bn_datetime desc limit 0, $rows ");
			for ($i=0; $row=sql_fetch_array($result); $i++) {
			    $board = sql_fetch(" select * from $g4[board_table] where bo_table = '$row[bo_table]' ");
				$row1 = sql_fetch(" select wr_option from {$g4['write_prefix']}{$row[bo_table]} where wr_id = '$row[wr_parent]' "); //원글 글옵션
				$row2 = sql_fetch(" select * from {$g4['write_prefix']}{$row[bo_table]} where wr_id = '$row[wr_id]' "); //댓글 정보 불러오기..
				if(strstr($row1[wr_option], "secret") || strstr($row2[wr_option], "secret")) {
					$row2[wr_subject] = "비밀 댓글입니다.";
				} else {
					$row2[wr_subject] = amina_cut($row2[wr_content],100); //댓글이라 글제목을 글내용으로 대체
				}
				$row2[wr_comment] = 0; //댓글수 0으로
				$list[$i] = amina_get_list($row2, $board, $latest_skin_path, $subject_len);
			}
		} else {
			if($type[name] == "newcmtgul") {
				$result = sql_query(" select bo_table, wr_parent, bn_id from $g4[board_new_table] where wr_id <> wr_parent $new_sql group by bo_table, wr_parent order by max(bn_id) desc limit 0, $rows ");
			} else {
				$result = sql_query(" select bo_table, wr_parent, bn_id from $g4[board_new_table] where wr_id = wr_parent $new_sql order by bn_id desc limit 0, $rows ");
			}

			for ($i=0; $row=sql_fetch_array($result); $i++) {
			    $board = sql_fetch(" select * from $g4[board_table] where bo_table = '$row[bo_table]' ");
				$row1 = sql_fetch(" select bn_datetime from $g4[board_new_table] where bo_table = '$row[bo_table]' and wr_parent = '$row[wr_parent]' "); //새글 시간
				$row2 = sql_fetch(" select * from {$g4['write_prefix']}{$row[bo_table]} where wr_id = '$row[wr_parent]' "); //글 정보 불러오기..
				$row2[wr_datetime] = $row1[bn_datetime];
				$list[$i] = amina_get_list($row2, $board, $latest_skin_path, $subject_len);
			}
		}
	
	} else {

		$bo_href = $g4[bbs_path]."/board.php?bo_table=".$bo_table;

		//일반 게시물 추출
	    $sql = " select * from $g4[board_table] where bo_table = '$bo_table' ";
	    $board = sql_fetch($sql);

		if(!$board) {
			$bo_title = "추출 게시판 아이디 수정";
		} else {
		    $tmp_write_table = $g4['write_prefix'] . $bo_table; // 게시판 테이블 전체이름

			if($ca_name) {
				$sql_ca = " and ca_name = '$ca_name' ";
				$bo_href .= "&sca=".urlencode($ca_name);
			}
			$i = 0;
			$notice_sql = "";
			$arr_notice = explode("\n", trim($board[bo_notice]));
			if($type[name] == "notice" || $type[name] == "notice_rand") {
				for ($k=0; $k<count($arr_notice); $k++) {
					if (trim($arr_notice[$k])=='') continue;

					$row = sql_fetch(" select * from $tmp_write_table where wr_id = '$arr_notice[$k]' $sql_ca $sql_opt ");

				    if (!$row[wr_id]) continue;

					$list[$i] = amina_get_list($row, $board, $latest_skin_path, $subject_len);
					$list[$i][is_notice] = true;
					if($ca_name) $list[$i][href] = $list[$i][href]."&sca=".urlencode($ca_name);
					$notice_sql .= " and wr_id != '$arr_notice[$k]' "; //[2008-02-03] 추가
				    $i++;
				}

				$rows = $rows - $i;
			} else { //공지는 출력안함
				for ($k=0; $k<count($arr_notice); $k++) {
					if (trim($arr_notice[$k])=='') continue;
					$notice_sql .= " and wr_id != '$arr_notice[$k]' "; //[2008-02-03] 추가
				}
			}

			$order_by = "wr_num";

			if($type[name] == "rand" || $type[name] == "notice_rand") $order_by = "rand()";

		    $sql = " select * from $tmp_write_table where wr_is_comment = 0 $sql_ca $notice_sql $sql_opt order by $order_by limit 0, $rows ";
			$result = sql_query($sql);
			for ($i=$i; $row = sql_fetch_array($result); $i++) { 
				$list[$i] = amina_get_list($row, $board, $latest_skin_path, $subject_len);
				if($ca_name) $list[$i][href] = $list[$i][href]."&sca=".urlencode($ca_name);
			}
		}
	}

    ob_start();
    include "$latest_skin_path/latest.skin.php";
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
} 

// 아미나 외부로그인
function amina_outlogin($skin_dir="") {
    global $g4, $config, $member, $urlencode, $is_admin, $amina, $xp, $thema_skin_path;

    $nick  = cut_str($member['mb_nick'], $config['cf_cut_name']);
    $point = number_format($member['mb_point']);

	if(file_exists("{$g4[path]}/skin/outlogin/{$skin_dir}/outlogin.skin.1.php")) {
	    $outlogin_skin_path = "$g4[path]/skin/outlogin/$skin_dir";
	} else {
		if(file_exists("{$thema_skin_path}/outlogin/outlogin.skin.1.php")) {
		    $outlogin_skin_path = "$thema_skin_path/outlogin";
		} else {
		    $outlogin_skin_path = "$g4[path]/skin/outlogin/basic";
		}
	}

    // 읽지 않은 쪽지가 있다면
    if ($member['mb_id']) {
        $sql = " select count(*) as cnt from {$g4['memo_table']} where me_recv_mb_id = '{$member['mb_id']}' and me_read_datetime = '0000-00-00 00:00:00' ";
        $row = sql_fetch($sql);
        $memo_not_read = $row['cnt'];

        $is_auth = false;
        $sql = " select count(*) as cnt from $g4[auth_table] where mb_id = '$member[mb_id]' ";
        $row = sql_fetch($sql);
        if ($row['cnt']) 
            $is_auth = true;
    }

    ob_start();
    if ($member['mb_id'])
        include_once ("$outlogin_skin_path/outlogin.skin.2.php");
    else // 로그인 전이라면
        include_once ("$outlogin_skin_path/outlogin.skin.1.php");
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

//사이트 새글 아이콘
function new_icon($bo_list, $list) {
	global $g4, $thema_skin_path;

	$arr_bo = explode("|", trim($bo_list));

	$up_icon = " <img src='{$thema_skin_path}/img/icon_new.gif' border=0 align=absmiddle>";

	for ($i=0; $i<count($list); $i++) { 
		for ($j=0; $j<count($arr_bo); $j++) {
			if ($list[$i][bo_table] == $arr_bo[$j] || $list[$i][ca_name] == $arr_bo[$j]) return $up_icon;
		}
	}

	$up_icon = "";

	return $up_icon;
}

//회원 등급표시
function xp_grade($n='') {
	global $member, $xp;

	if(!$n) $n = $member[mb_level];

	if($n) {
		$grade = $xp[grade][$n];
	} else {
		$grade = $xp[grade][1];
	}

	return $grade;
}

//리스트 순서
function wr_order($wr_amina) {

	$order = array();

	list($order[order_num], $order[order_img], $order[order_cate], $order[order_subj], $order[order_conts], $order[order_name], $order[order_date], $order[order_hit], $order[order_good], $order[order_nogood], $order[order_cmt], $order[order_star], $order[order_choice], $order[order_point], $order[order_photo]) = explode(",", trim($wr_amina));

	return $order;
}

//리스트 크기
function wr_size($wr_amina) {

	$size = array();

	list($size[size_num], $size[size_cate], $size[size_name], $size[size_date], $size[size_hit], $size[size_good], $size[size_nogood], $size[size_cmt], $size[size_star], $size[size_choice], $size[size_point]) = explode(",", trim($wr_amina));

	return $size;
}

/* 이하 2.0에서 미사용 */

function bo_amina1($bo_amina) { //bo_amina1 설정값

	$temp = array();

	list($temp[use_star], $temp[star_color], $temp[view_photo], $temp[emo_skin], $temp[cmt_photo], $temp[hide_xp], $temp[view_sns], $temp[cmt_good], $temp[limit_cmt], $temp[limit_date], $temp[shingo], $temp[set_num], $temp[good_point_gul], $temp[good_point_re], $temp[choice_cmt], $temp[choice_return], $temp[good_point_cmt], $temp[good_point_cmt_re], $temp[nameless], $temp[cmt_best], $temp[nameless_name], $temp[nameless_num], $temp[use_youtube], $temp[star_point], $temp[star_point_re], $temp[cmt_cool], $temp[choice_txt], $temp[good_txt], $temp[cool_txt], $temp[bad_txt], $temp[auto_rss], $temp[emo_cnt], $temp[upimg_size], $temp[upimg_quality]) = explode("|", trim($bo_amina));

	return $temp;
}

function bo_amina2($bo_amina) { //bo_amina2 설정값

	$temp = array();

	list($temp[cate], $temp[list_skin], $temp[img_w], $temp[img_h], $temp[list_mod], $temp[subj_len], $temp[cont_len], $temp[view_skin], $temp[cmt_skin], $temp[write_skin], $temp[cate_skin], $temp[head_skin], $temp[btn_skin], $temp[paging_skin], $temp[search_skin], $temp[sign_skin], $temp[cate_view], $temp[name_align], $temp[no_img], $temp[date_type], $temp[thumb_cut], $temp[addon_skin], $temp[list_css], $temp[cmt_css], $temp[cate_css], $temp[head_css], $temp[order_list], $temp[size_list], $temp[date_gubun], $temp[subj_bold], $temp[cate_subj], $temp[photo_size], $temp[list_type]) = explode("|", trim($bo_amina));

	return $temp;
}

function amina_set($bo_amina1, $bo_amina2, $sca='') {

	if(!$bo_amina1) return;

	$temp = array();
	$basic = array();
	$set = array();

	//기본설정
	$basic = bo_amina1($bo_amina1);

	//출력설정
	$set = explode("[]", trim($bo_amina2));

	if($sca && count($set) > 1) {
		for($i=1; $i<count($set); $i++) {
			$tmp[$i] = bo_amina2($set[$i]);
			if($sca == trim($tmp[$i][cate])) {
				$temp = array_merge($basic, $tmp[$i]); 
				return $temp;
			}
		}
	}

	$tmp = bo_amina2($set[0]);
	$temp = array_merge($basic, $tmp); 

	return $temp;
}

if($board[bo_skin] == "amina") {

	$old_amina = array();

	// 1.x 버전 설정값 불러오기
	$old_amina = amina_set($board[bo_amina1], $board[bo_amina2], $sca);

	if(!$old_amina[list_skin]) $old_amina[list_skin] = "basic";
	if(!$old_amina[view_skin]) $old_amina[view_skin] = "basic";
	if(!$old_amina[cmt_skin]) $old_amina[cmt_skin] = "basic";
	if(!$old_amina[write_skin]) $old_amina[write_skin] = "basic";
	if(!$old_amina[cate_skin]) $old_amina[cate_skin] = "basic";
	if(!$old_amina[head_skin]) $old_amina[head_skin] = "basic";
	if(!$old_amina[btn_skin]) $old_amina[btn_skin] = "basic";
	if(!$old_amina[paging_skin]) $old_amina[paging_skin] = "basic";
	if(!$old_amina[search_skin]) $old_amina[search_skin] = "basic";
	if(!$old_amina[sign_skin]) $old_amina[sign_skin] = "basic";
	if(!$old_amina[emo_skin]) $old_amina[emo_skin] = "none";

	//스킨 주소
	$list_skin_path = $board_skin_path."/list/".$old_amina[list_skin];
	$view_skin_path = $board_skin_path."/view/".$old_amina[view_skin];
	$cmt_skin_path = $board_skin_path."/cmt/".$old_amina[cmt_skin];
	$write_skin_path = $board_skin_path."/write/".$old_amina[write_skin];
	$cate_skin_path = $board_skin_path."/cate/".$old_amina[cate_skin];
	$head_skin_path = $board_skin_path."/head/".$old_amina[head_skin];
	$btn_skin_path = $board_skin_path."/btn/".$old_amina[btn_skin];
	$paging_skin_path = $board_skin_path."/paging/".$old_amina[paging_skin];
	$search_skin_path = $board_skin_path."/search/".$old_amina[search_skin];
	$sign_skin_path = $board_skin_path."/sign/".$old_amina[sign_skin];
	$emo_skin_path = $board_skin_path."/emo/".$old_amina[emo_skin];

	$amina = array_merge($amina, $old_amina); 
}

?>