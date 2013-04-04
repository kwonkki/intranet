<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

@include_once("$list_skin_path/set/set.load.php");

$set = amina_set_list($amina[list_set]);

//List View Check
$is_thumb = false;
if ($set[list_thumb_w] > 0) {
	@include_once("$g4[path]/lib/amina.lib.thumb.php");
	$is_thumb = true;
}

$is_photo = false;
if ($set[list_photo] > 0) $is_photo = true;

$is_catesubj = false;
if($is_category) {
	$is_category = false;
	if($set[list_cate] > 0 && $set[list_cate_view] != 1) $is_category = true;
	if($set[list_cate_view]) $is_catesubj = true;
}

if ($is_good && $set[list_good] > 0) {
	$is_good = true;
} else {
	$is_good = false;
}

if ($is_nogood && $set[list_nogood] > 0) {
	$is_nogood = true;
} else {
	$is_nogood = false;
}

$is_star = false;
if ($amina[star] && $set[list_star] > 0) $is_star = true;

$is_choice = false;
$is_point = false;
if ($amina[cmt_choice]) {
	if($set[list_choice] > 0) $is_choice = true;
	if($set[list_point] > 0) $is_point = true;
}

$is_date = false;
if ($set[list_date] > 0 && $set[list_date_type]) $is_date = true;

$is_num = false;
if ($set[list_num] > 0) $is_num = true;

$is_name = false;
if ($set[list_name] > 0) $is_name = true;

$is_cmt = false;
if ($set[list_cmt] > 0) $is_cmt = true;

$is_hit = false;
if ($set[list_hit] > 0) $is_hit = true;

$colspan = 1;
if ($is_checkbox) $colspan++;
if ($is_category) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;
if ($is_star) $colspan++;
if ($is_num) $colspan++;
if ($is_name) $colspan++;
if ($is_cmt) $colspan++;
if ($is_date) $colspan++;
if ($is_hit) $colspan++;
if ($is_choice) $colspan++;
if ($is_poiint) $colspan++;
if ($is_thumb) $colspan++;
if ($is_photo) $colspan++;

include($head_skin_path."/head.skin.php");

?>

<link rel="stylesheet" href="<?=$list_skin_path?>/<?=$amina[list_css]?>.css" type="text/css">

<table width="100%" cellpadding="0" cellspacing="0" class="list_tbl">
<? if ($is_checkbox) { ?><col width='20'><?}?>
<? if ($is_num) { ?><col width='<?=$set[list_num]?>'><? } ?>
<? if ($is_thumb) { ?><col width='<?=$set[list_thumb_w]?>'><? } ?>
<? if ($is_category) { ?><col width='<?=$set[list_cate]?>'><? } ?>
<col />
<? if ($is_photo) { ?><col width='<?=$set[list_photo]?>'><? } ?>
<? if ($is_name) { ?><col width='<?=$set[list_name]?>'><? } ?>
<? if ($is_cmt) { ?><col width='<?=$set[list_cmt]?>'><? } ?>
<? if ($is_date) { ?><col width='<?=$set[list_date]?>'><? } ?>
<? if ($is_hit) { ?><col width='<?=$set[list_hit]?>'><? } ?>
<? if ($is_good) { ?><col width='<?=$set[list_good]?>'><? } ?>
<? if ($is_nogood) { ?><col width='<?=$set[list_nogood]?>'><? } ?>
<? if ($is_star) { ?><col width='<?=$set[list_star]?>'><? } ?>
<? if ($is_choice) { ?><col width='<?=$set[list_choice]?>'><? } ?>
<? if ($is_poiint) { ?><col width='<?=$set[list_point]?>'><? } ?>

<tr class="head_tr">
<? if ($is_checkbox) { ?><td class='head_td' align=center><input onclick="if (this.checked) all_checked(true); else all_checked(false);" type="checkbox"></td><? } ?>
<? if ($is_num) { ?> <td class='head_td' align=center>번호</td> <? } ?>
<? if ($is_thumb) { ?><td class='head_td' align=center>이미지</td><? } ?>
<? if ($is_category) { ?><td class='head_td' align=center>분류</td><? } ?>
<td class='head_td' align=center>제&nbsp;&nbsp;&nbsp;목</td>
<? if ($is_photo) { ?><td class='head_td' align=center>&nbsp;</td><? } ?>
<? if ($is_name) { ?><td class='head_td' align='<?=$set[list_name_align]?>'>글쓴이</td><? } ?>
<? if ($is_cmt) { ?><td class='head_td' align=center><?=$set[list_cmt_txt]?></td><? } ?>
<? if ($is_date) { ?><td class='head_td' align=center><?=subject_sort_link('wr_datetime', $qstr2, 1)?>날짜</a></td><? } ?>
<? if ($is_hit) { ?><td class='head_td' align=center><?=subject_sort_link('wr_hit', $qstr2, 1)?>조회</a></td><? } ?>
<? if ($is_good) { ?><td class='head_td' align=center><?=subject_sort_link('wr_good', $qstr2, 1)?>추천</a></td> <? } ?>
<? if ($is_nogood) { ?><td class='head_td' align=center><?=subject_sort_link('wr_nogood', $qstr2, 1)?>비추</a></td><? } ?>
<? if ($is_star) { ?><td class='head_td' align=center>별점</td><? } ?>
<? if ($is_choice) { ?><td class='head_td' align=center>상태</td><? } ?>
<? if ($is_poiint) { ?><td class='head_td' align=center>포인트</td><? } ?>
</tr>

<? for ($i=0; $i<count($list); $i++) { 

	//첫페이지만 공지사항 나오도록
	if($list[$i][is_notice] && $page > 1) continue;

	//링크 재설정
	$list[$i][href] = $list[$i][href]."".$frame_opt;

	//xp 및 모바일 아이콘
	$wr_post = amina_array_write($list[$i][wr_10]);
	$wr_icon = amina_array_icon($list[$i][wr_5]);

	$bg = "";
	$icon_post = "";

	//List Type
	$s_name = "";
	if($set[list_qa] && !$list[$i][is_notice]) { //질답형
		if($list[$i][icon_secret]) {
			$s_name = "s";
			$list[$i][icon_secret] = "";
		}

		if($list[$i][icon_reply]) {
			$icon_post = "<img src='{$board_skin_path}/img/icon_{$s_name}a.gif' border=0 align=absmiddle>";
		} else {
			$icon_post = "<img src='{$board_skin_path}/img/icon_{$s_name}q.gif' border=0 align=absmiddle>";
		}
	}

	//제목 재설정
	$is_blind = false;
	if($list[$i][wr_9] == "lock" || $list[$i][wr_9] == "shingo") {
		$is_blind = true;
		$list[$i][wr_subject] = "블라인드 처리된 글입니다.";
		$list[$i][subject] = "<span class=blind>".amina_cut($list[$i][wr_subject], $board[bo_subject_len])."</span>";
		$icon_post = "<img src='{$board_skin_path}/img/icon_shingo.gif' border=0 align=absmiddle>";
	} else {
		if(!$list[$i][is_notice] && $is_catesubj) $list[$i][wr_subject] = "[".$list[$i][ca_name]."] ".$list[$i][wr_subject];
		$list[$i][subject] = amina_cut($list[$i][wr_subject], $board[bo_subject_len]);
		if($wr_post[subj_b]) $list[$i][subject] = "<b>".$list[$i][subject]."</b>";
		if($wr_post[subj_i]) $list[$i][subject] = "<i>".$list[$i][subject]."</i>";
		if($wr_post[subj_s]) $list[$i][subject] = "<strike>".$list[$i][subject]."</strike>";
		if($wr_post[subj_color]) $list[$i][subject] = "<span style='color:{$wr_post[subj_color]};'>".$list[$i][subject]."</span>";
	}

	//Now Post
	$bg = "class=list";
	if($list[$i][wr_id] == $wr_id) {
		$bg = "class=now";
		$list[$i][subject] = "<span class=now_post>".$list[$i][subject]."</span>";
		$list[$i][num] = "<span class=now_post>".$list[$i][num]."</span>";
	}

	//Notice
	if($list[$i][is_notice]) {
		if($is_category) {
			$list[$i][num] = "*";
			$list[$i][ca_name] = "<img src='{$board_skin_path}/img/icon_notice.gif' border=0>";
		} else {
			$list[$i][num] = "<img src='{$board_skin_path}/img/icon_notice.gif' border=0>";
		}
		$bg = "class=notice";
		$list[$i][subject] = "<b>".$list[$i][subject]."</b>";
	}

	if($is_photo) {
		$mb_photo = "";
		if($amina[view_photo] == "3") {
			if($wr_icon[post_icon_mb]) $mb_photo = mb_photo($member[mb_id], $list[$i][mb_id], $set[list_photo], $set[list_photo], "is");
			if(!$mb_photo) {
				if(!file_exists($emo_skin_path."/".$wr_icon[post_icon].".gif")) $wr_icon[post_icon] = rand(1,$amina[emo_cnt]);
				$mb_photo = "<img src=\"{$emo_skin_path}/{$wr_icon[post_icon]}.gif\" width='{$set[list_photo]}' height='{$set[list_photo]}' \">\n";
			}
		} else {
			//회원사진(모두출력)
			if($amina[view_photo] == "2") {
				$mb_photo = mb_photo($member[mb_id], $list[$i][mb_id], $set[list_photo], $set[list_photo], "is");
			} else {
				$mb_photo = mb_photo($member[mb_id], $list[$i][mb_id], $set[list_photo], $set[list_photo]);
			}
		}
	}
?>
<tr <?=$bg?>> 
<? if ($is_checkbox) { ?><td align='center'><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
<? if ($is_num) { ?><td class=num><?=$list[$i][num]?></td><? } ?>
<? if ($is_thumb) { 
		$thumb_img = "";
		$thumb_icon = "";
		if(!$is_blind) {
			list($thumb_img) = amina_thumb_img($list[$i][file], $list[$i][wr_6], $list[$i][wr_content], 1, $link_youngcart, $list[$i][wr_8]);
			if($list[$i][icon_hot]) {
				$thumb_icon = "hot";
			} else if($list[$i][icon_new]) {
				$thumb_icon = "new";
			} else if($wr_post[video]) {
				$thumb_icon = "video";
			}
		}
?>
	<td align=center><?=amina_thumbnail($list[$i][wr_subject], $list[$i][href], $thumb_img, $set[list_thumb_w], $set[list_thumb_h], $set[list_thumb_cut], $set[list_thumb_no], $thumb_icon, $set[list_thumb_icon])?></td>
<? } ?>
<? if ($is_category) { ?><td class='category'><?=$list[$i][ca_name]?></td><? } ?>
<td class='subject'>
    <?=$list[$i][reply]?><?=$list[$i][icon_reply]?> <?=$icon_post?> <?=$list[$i][icon_secret]?>
	<? if($wr_icon[mobile]) { ?><img src="<?=$board_skin_path?>/img/icon_mobile.gif" border=0 align=absmiddle><? } ?>
	<a href="<?=$list[$i][href]?>"><?=$list[$i][subject]?></a>
    <? if (!$is_cmt && $list[$i][comment_cnt]) {?> <span class="comment"><?=$list[$i][comment_cnt]?></span><? } ?>
    <? if($wr_post[video] == "video") { ?> <img src="<?=$board_skin_path?>/img/icon_video.gif" border=0 align=absmiddle><? } ?>
	<? if($wr_post[photo] == "photo") { ?> <img src="<?=$board_skin_path?>/img/icon_image.gif" border=0 align=absmiddle><? } ?>
	<? if(amina_attach_file($list[$i][file])) { ?> <img src="<?=$board_skin_path?>/img/icon_file.gif" border=0 align=absmiddle><? } ?>
	<?=$list[$i][icon_new]?> <?=$list[$i][icon_hot]?>
</td>
<? if ($is_photo) { ?><td class='photo' align=center><?=$mb_photo?></td><? } ?>
<? if ($is_name) { ?><td class='name' align="<?=$set[list_name_align]?>"><?=xp_icon($list[$i][mb_id], $wr_icon[level])?> <?=$list[$i][name]?></td><? } ?>
<? if ($is_cmt) { 
		$cmt_class = "cmt"; 
		if($list[$i][wr_comment] > 0) $cmt_class = "cmt_on";
?>
	<td class='<?=$cmt_class?>'><?=$list[$i][wr_comment]?></td>
<? } ?>
<? if($is_date) { 
		switch($set[list_date_type]) {
			case '1'		: $date_class = "date1"; break;
			case '2'		: $list[$i][datetime2] = amina_date($list[$i][wr_datetime]); $date_class = "date2"; break;
			default			: $list[$i][datetime2] = date("{$set[list_date_type]}", strtotime($list[$i][wr_datetime])); $date_class = "date"; break;
		}
?>
	<td class='<?=$date_class?>'><?=$list[$i][datetime2]?></td>
<? } ?>
<? if ($is_hit) { ?><td class='hit'><?=$list[$i][wr_hit]?></td><? } ?>
<? if ($is_good) { ?><td class="good"><?=$list[$i][wr_good]?></td><? } ?>
<? if ($is_nogood) { ?><td class="nogood"><?=$list[$i][wr_nogood]?></td><? } ?>
<? if ($is_star) { ?><td align='center'><?=amina_star_mark($amina[star_color], $list[$i][wr_7], "s")?></td><? } ?>
<? if ($is_choice) { if($wr_icon[choice]) { ?>
		<td class='choice'><?=$set[list_choice_txt]?></td>
	<? } else { ?>
		<td class='nochoice'><?=$set[list_nochoice_txt]?></td>
<? } } ?>
<? if ($is_point) { if(!$wr_icon[choice_point]) { $wr_icon[choice_point] = 0; } ?>
		<td class='point'><?=number_format($wr_icon[choice_point])?></td>
<? } ?>
</tr>

<? } // end for ?>

<? if ($k == 0) { ?>
	<tr><td colspan='<?=$colspan?>' class='no_list'><?=$no_list?></td></tr>
<? } ?>
</table>
