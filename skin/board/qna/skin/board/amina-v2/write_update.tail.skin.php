<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$g4[path]/lib/amina.lib.write.skin.php");

//포토글 & 첨부파일 체크
$chk_photo = "text";
$chk_file = "";

$attach = get_file($bo_table, $wr_id);
if(amina_attach_img($attach, $wr_content, 1)) $chk_photo = "photo";
if(amina_attach_file($attach)) $chk_file = "file";

//아이콘($wr_5) 값 정리하기..
if ($w == "u") {
	$icon = amina_array_icon($wr[wr_5]);
	$wr_5 = $icon[level]."|".$post_mobile."|".$post_icon."|".$icon[choice]."|".$icon[choice_point]."|".$icon[choice_mb]."|".$post_cool."|".$post_icon_mb;
} else {
	if(!$choice_point) $choice_point = 0;
	$wr_5 = xp_level($member[mb_id])."|".$post_mobile."|".$post_icon."|".$icon[choice]."|".$choice_point."|".$icon[choice_mb]."|".$post_cool."|".$post_icon_mb;

	//포인트차감
	if($cmt_choice[cmt_choice] && $choice_point > 0) {
        insert_point($member[mb_id], (int)$choice_point * (-1), "$board[bo_subject] $wr_id {$cmt_choice[cmt_choice_txt]} 포인트 걸기", $bo_table, $wr_id, '@choice_point');
	}
}

//통합 RSS - 비밀글 제외
if($w == "u") { //글 수정시는 글 존재 여부 확인
	$rss = sql_fetch(" select wr_id from $g4[board_new_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and wr_parent = '$wr_id' limit 1 ");
	if($rss[wr_id]) { //글이 있으면 업데이트함.
		if(!$secret && $post_rss) {
			sql_query(" update $g4[board_new_table] set wr_rss = '$post_rss' where bo_table = '$bo_table' and wr_id = '$wr_id' and wr_parent = '$wr_id' ");
		} else {
			sql_query(" update $g4[board_new_table] set wr_rss = '' where bo_table = '$bo_table' and wr_id = '$wr_id' and wr_parent = '$wr_id' ");
		}
	}
} else {
	if(!$secret) {
		if($amina[auto_rss]) $post_rss = "rss";
		if($post_rss) {
			sql_query(" update $g4[board_new_table] set wr_rss = '$post_rss' where bo_table = '$bo_table' and wr_id = '$wr_id' and wr_parent = '$wr_id' ");
		}
	}
}

if($secret) $post_rss = "";

//동영상($wr_6) 값 정리하기..
$wr_6 = "";
if($movie_url) {
	$wr_6 .= $movie_url."|";
	$wr_6 .= $movie_w."|";
	$wr_6 .= $movie_h."|";
	$wr_6 .= $movie_auto;
}

// 동영상 여부 체크하기
$chk_video = "";
if(amina_video_all($wr_6, $wr_content)) $chk_video = "video";

//$wr_10 값 정리하기..
$wr_10 = "";
$wr_10 .= $chk_photo."|";
$wr_10 .= $img_location."|";
$wr_10 .= $img_space."|";
$wr_10 .= $post_main."|";
$wr_10 .= $post_good."|";
$wr_10 .= $post_rss."|";
$wr_10 .= $chk_video."|";
$wr_10 .= $chk_file."|";
$wr_10 .= $subj_b."|";
$wr_10 .= $subj_i."|";
$wr_10 .= $subj_s."|";
$wr_10 .= $subj_color;

if($amina[nameless_write]) { // 익명게시판용
	$wr_rename = $amina[nameless_head]."".amina_nameless_tail($amina[nameless_tail]);
	$write_no_str = "wr_name = '$wr_rename', mb_id = '', wr_email = '', wr_homepage = '', ";
}

//블라인드 처리
if($w == "u") $wr_9 = $wr[wr_9];

//글쓴이 별점시
if($amina[star] == "1") $wr_7 = $star_score."|1";

//회원별점시
if($amina[star] == "2" && $w == "u") { 
	$row = sql_fetch(" select SUM(bg_star) as score, COUNT(bg_star) as people from $g4[board_table]_star where bo_table = '$bo_table' and wr_id = '$wr_id' and bg_flag = 'star' ");
	$wr_7 = $row[score]."|".$row[people];
}

// 글정보 업데이트
sql_query(" update $write_table set $write_no_str wr_10 = '$wr_10', wr_9 = '$wr_9', wr_8 = '$wr_8', wr_7 = '$wr_7', wr_6 = '$wr_6', wr_5 = '$wr_5' where wr_id = '$wr_id' ");

// xp 정보 업데이트
if($w != 'u' && $member[mb_id]) check_xp($member[mb_id]);

//등록이미지 자동 축소하기(jpg,gif,png 파일만 - bmp는 제외) 
if($amina[upimg_size] > 0 && $amina[upimg_quality] > 0) {

	$upimg = array();

	$upimg = amina_attach_img_all($attach, $wr_content);

	for ($i=0; $i<count($upimg); $i++) {
		if(file_exists($upimg[$i])) {
		    $size = @getimagesize($upimg[$i]);

		    //이미지 파일이 아니거나 폭이 같거나 작은 경우
			if (!$size[0] || $size[0] <= $amina[upimg_size]) continue;

			//불당썸
			include_once("$g4[path]/lib/thumb.lib.php");

			//animated gif의 경우 
		    if($size[2] == IMG_GIF && is_animated_gif($upimg[$i])) continue;

			$thumb = thumbnail($upimg[$i], $amina[upimg_size], 0, false, "", $amina[upimg_quality]);
			if($thumb) {
				copy($thumb, $upimg[$i]);
				chmod($upimg[$i], 0606);
				@unlink($thumb);
			}
		}
	}
}

@include_once ("$write_skin_path/write_update.tail.skin.php");

//이동 별도 지정시
if($go_url) {
	if($file_upload_msg) {
		alert($file_upload_msg, $go_url);
	} else {
		goto_url($go_url);
	}
}

?>
