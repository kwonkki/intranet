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

$is_catesubj = false;
if($is_category) {
	$is_category = false;
	if($set[info_cate]) $is_category = true;
	if($set[subj_cate]) $is_catesubj = true;
}

if ($is_good && $set[info_good]) {
	$is_good = true;
} else {
	$is_good = false;
}

if ($is_nogood && $set[info_nogood]) {
	$is_nogood = true;
} else {
	$is_nogood = false;
}

$is_star = false;
if ($amina[star] && $set[info_star]) $is_star = true;

$is_choice = false;
$is_point = false;
if ($amina[cmt_choice]) {
	if($set[info_choice]) $is_choice = true;
	if($set[info_point]) $is_point = true;
}

$is_date = false;
if ($set[info_date] && $set[info_date_type]) $is_date = true;

$is_name = false;
if ($set[info_name]) $is_name = true;

$is_cmt = false;
if ($set[info_cmt]) $is_cmt = true;

$is_hit = false;
if ($set[info_hit]) $is_hit = true;

$is_conts = false;
if ($set[conts_len] > 0) $is_conts = true;

$is_info = false;
if ($is_category || $is_good || $is_nogood || $is_star || $is_name || $is_cmt || $is_hit) $is_info = true;

include($head_skin_path."/head.skin.php");

$n = 0;

?>

<link rel="stylesheet" href="<?=$list_skin_path?>/<?=$amina[list_css]?>.css" type="text/css">

<table width="100%" cellpadding="0" cellspacing="0" class="webzine_tbl">
<tr class="head_tr">
<td style='font:1px;padding:0;margin:0;line-height:0'>&nbsp;</td>
</tr>

<? for ($i=0; $i<count($list); $i++) { 

	//첫페이지만 공지사항 나오도록
	if($list[$i][is_notice] && $page > 1) continue;

	//링크 재설정
	$list[$i][href] = $list[$i][href]."".$frame_opt;

	if($list[$i][is_notice]) {
?>
		<tr>
		<td class='notice'>
			<table cellpadding=0 cellspacing=0 align=center width="100%" class="notice_tbl">
			<? if ($is_checkbox) { ?><col width=20><? } ?><col width=40><col /><col width=80>
			<tr>
			<? if ($is_checkbox) { ?>
				<td align=center><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td>
			<? } ?>
			<td align=center>
				<img src="<?=$board_skin_path?>/img/icon_notice.gif" border=0>
			</td>
			<td class="n_subject">
				<a href="<?=$list[$i][href]?>"><b><?=$list[$i][subject]?></b></a>
				<? if ($list[$i][comment_cnt]) { ?> <span class='comment'><?=$list[$i][comment_cnt]?></span><? } ?> 
				<?=$list[$i][icon_new]?>
			</td>
			<td class="date"><?=date("Y.m.d", strtotime($list[$i][wr_datetime]))?> &nbsp;</td>
			</tr>
			</table>
		</td>
		</tr>
	<? } else { 

		//xp 및 모바일 아이콘
		$wr_post = amina_array_icon($list[$i][wr_10]);

		//제목 재설정
		$is_blind = false;
		$icon_post = "";
		if($list[$i][wr_9] == "lock" || $list[$i][wr_9] == "shingo") {
			$is_blind = true;
			$list[$i][wr_subject] = "블라인드 처리된 글입니다.";
			$list[$i][subject] = "<span class=blind>".amina_cut($list[$i][wr_subject], $set[subj_len])."</span>";
			$icon_post = "<img src='{$board_skin_path}/img/icon_shingo.gif' border=0>";
		} else {
			if($is_catesubj) $list[$i][wr_subject] = "[".$list[$i][ca_name]."] ".$list[$i][wr_subject];
			$list[$i][subject] = amina_cut($list[$i][wr_subject], $set[subj_len]);
			if($wr_post[subj_b]) $list[$i][subject] = "<b>".$list[$i][subject]."</b>";
			if($wr_post[subj_i]) $list[$i][subject] = "<i>".$list[$i][subject]."</i>";
			if($wr_post[subj_s]) $list[$i][subject] = "<strike>".$list[$i][subject]."</strike>";
			if($wr_post[subj_color]) $list[$i][subject] = "<span style='color:{$wr_post[subj_color]};'>".$list[$i][subject]."</span>";
		}

		//xp 및 모바일 아이콘
		$wr_icon = amina_array_icon($list[$i][wr_5]);
	
	?>
		<tr>
		<td valign=top>
			<table cellpadding=0 cellspacing=0 width="100%" class="shell_tbl">
			<tr>
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

				$thumb_img = amina_thumbnail($list[$i][wr_subject], $list[$i][href], $thumb_img, $set[list_thumb_w], $set[list_thumb_h], $set[list_thumb_cut], $set[list_thumb_no], $thumb_icon, $set[list_thumb_icon]);
				if($thumb_img) {
			?>
				<td width="<?=$set[list_thumb_w]?>" valign=top><?=$thumb_img?></td>
			<? } } ?>
			<td valign=top>
				<table cellpadding=0 cellspacing=0 width="100%" class="list_tbl">			
				<tr><td align='<?=$set[subj_align]?>' class='subject'>
					<? if ($is_checkbox) { ?><div style='float:right;'><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></div><? } ?>
					<?=$icon_post?>
					<? if($wr_icon[mobile]) { ?><img src="<?=$board_skin_path?>/img/icon_mobile.gif" border=0><? } ?>
					<a href="<?=$list[$i][href]?>"><?=$list[$i][subject]?></a>
				    <? if (!$is_cmt && $list[$i][comment_cnt]) {?> <span class="comment"><?=$list[$i][comment_cnt]?></span><? } ?>
					<? if(!$thumb_img || !$set[list_thumb_h]) { ?> <?=$list[$i][icon_new]?> <?=$list[$i][icon_hot]?> <? } ?>
				</td></tr>

				<? if($set[info_location] && $is_conts) { ?>
					<tr><td class='conts'><?=amina_cut($list[$i][wr_content], $set[conts_len])?></td></tr>
				<? } ?>

				<? if($is_info) { ?>
					<tr><td align='<?=$set[info_align]?>'>
						<table cellpadding=0 cellspacing=0 class="info_tbl">
						<tr>
						<? if ($is_name) { ?><td><span class='name'><?=xp_icon($list[$i][mb_id], $wr_icon[level])?> <?=$list[$i][name]?></span></td><? } ?>
						<? if ($is_category) { ?><td><?=$list[$i][ca_name]?></td><? } ?>
						<? if ($is_star) { ?><td><?=amina_star_mark($amina[star_color], $list[$i][wr_7], "s")?></td><? } ?>
						<? if ($is_choice) { 
								$choice_txt = "<span class='nonchoice'>{$set[info_nochoice_txt]}</span>";
								if($wr_icon[choice]) $choice_txt = "<span class='choice'>{$set[info_choice_txt]}</span>";
						?>
							<td><?=$choice_txt?></td>
						<? } ?>
						<? if ($is_point) { if(!$wr_icon[choice_point]) { $wr_icon[choice_point] = 0; } ?>
							<td><span class='point'><?=number_format($wr_icon[choice_point])?>점</span></td>
						<? } ?>
						<? if ($is_date) { 
								switch($set[info_date_type]) {
								case '1'		: break;
								case '2'		: $list[$i][datetime2] = amina_date($list[$i][wr_datetime]); break;
								default			: $list[$i][datetime2] = date("{$set[info_date_type]}", strtotime($list[$i][wr_datetime])); break;
							}
						?>
							<td><?=$list[$i][datetime2]?></td>
						<? } ?>
						<? if ($is_hit) { ?><td>조회 <?=$list[$i][wr_hit]?></td><? } ?>
						<? if ($is_good) { ?><td><span class='good'><?=$list[$i][wr_good]?></span></td><? } ?>
						<? if ($is_nogood) { ?><td><span class='nogood'><?=$list[$i][wr_nogood]?></span></td><? } ?>
						<? if ($is_cmt) { 
							$cmt_class = "cmt"; 
							if($list[$i][wr_comment] > 0) $cmt_class = "cmt_on";
						?>
							<td><span class='<?=$cmt_class?>'><?=$list[$i][wr_comment]?></span></td>
						<? } ?>
						</tr>
						</table>
					</td></tr>
				<? } ?>				

				<? if(!$set[info_location] && $is_conts) { ?>
					<tr><td class='conts'><?=amina_cut($list[$i][wr_content], $set[conts_len])?></td></tr>
				<? } ?>
				</table>
			</td></tr>
			</table>
		</td>
		</tr>
	<? $n++; } ?>

<? } //End for ?>

<? if ($k == 0) { ?><tr><td class='no_list'><?=$no_list?></td></tr><? } ?>
<tr class='end_line'><td class='end_line'>&nbsp;</td></tr>
</table>
