<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// Best Comment
$sql = " select * from $write_table where wr_parent = '$wr_id' and wr_is_comment = 1 and wr_good >= '$amina[cmt_best]' and wr_5 not like '%<choice>%' order by wr_good desc";
$result = sql_query($sql);

?>

<table border=0 cellpadding=0 cellspacing=0 width=100%>
<tr><td class="cmt_best_head">베스트 <?=$amina[good_txt]?></td></tr>
<tr><td class="cmt_best_body">

<?	for ($i=0; $row=sql_fetch_array($result); $i++) {

		//Secret
		$is_secret = false;
		if (strstr($row[wr_option], "secret")) $is_secret = true;

		$is_blind = false;
		if($row[wr_9] == "lock" || $row[wr_9] == "shingo") $is_blind = true;

		//xp 및 모바일 아이콘
		$c_icon = amina_array_icon($row[wr_5]);

		//Photo
		switch($amina[cmt_photo]) {
			case '1'	: $c_photo = mb_photo($member[mb_id], $row[mb_id], 56, 56); break;
			case '2'	: $c_photo = mb_photo($member[mb_id], $row[mb_id], 56, 56, "is"); break;
			default		: $c_photo = ""; break;
		}

		//Cool & Bad
		if($amina[cmt_cool]) {
			switch($c_icon[post_cool]) {
				case '<cool>'	: $cool_txt = "<span class='cmt_cool'>{$amina[cmt_cool_txt]}</span>&nbsp; "; break;
				case '<bad>'	: $cool_txt = "<span class='cmt_bad'>{$amina[cmt_bad_txt]}</span>&nbsp; "; break;
				default			: $cool_txt = ""; break;
			}
		}

		//Name
	    $tmp_name = get_text(cut_str($row[wr_name], $config[cf_cut_name])); // 설정된 자리수 만큼만 이름 출력
	    if ($board[bo_use_sideview]) {
			$c_name = get_sideview($row[mb_id], $tmp_name, $row[wr_email], $row[wr_homepage]);
	    } else {
			$c_name = "<span class='".($row[mb_id]?'member':'guest')."'>$tmp_name</span>";
		}

		if ($is_ip_view) { 
			if (!$is_admin) $row[wr_ip] = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", "\\1.♡.\\3.\\4", $row[wr_ip]); 
			$c_ip = " - ".$row[wr_ip]; 
		}

		//SNS Icon
		if ($is_blind || $is_secret || $amina[cmt_sns] == "none") { 
			$c_sns = "";
		} else {
			$clurl = $lurl."#c_".$row[wr_id];
			$surl = sns_surl($clurl, $amina[use_bitly]);
			$c_sns = amina_sns($amina[cmt_sns], $row[wr_content], $clurl, $surl);
		} 

		//Blind
		switch($row[wr_9]) {
			case 'lock'		: $blind_msg = "관리자가 블라인드 처리한 댓글입니다."; break;
			case 'shingo'	: $blind_msg = "신고누적으로 블라인드 처리된 댓글입니다."; break;
			default			: $blind_msg = ""; break;
		}

		//Content
		$str = "";
		if(!$is_blind || $is_admin) {
		    $str = "비밀글 입니다.";
		    if (!$is_secret || $is_admin || ($write[mb_id]==$member[mb_id] && $member[mb_id]) || ($row[mb_id]==$member[mb_id] && $member[mb_id])) {
		        $str = search_font($stx, conv_content($row[wr_content], 0, 'wr_content'));
			    $str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str);
			    $str = preg_replace("/\[\<a\s*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\"\s*[^\>]*\>[^\s]*\<\/a\>\]/i", "<img src='$1://$2.$3' id='target_resize_image[]' onclick='image_window(this);' border='0'>", $str);
			}
			if ($is_secret) $str = "<span class='cmt_secret'>* {$str}</span>";
			if($row[wr_trackback]) $str .= "<p>".url_auto_link($row[wr_trackback])."</p>";
		}

?>
	<table width=100% cellpadding=0 cellspacing=0 border=0 class="cmt_list">
	<tr>
    <td width='100%' class="cmt_best">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr>
		<? if($c_photo) { ?><td width=56 valign=top class='cmt_photo'><?=$c_photo?></td><? } ?>
		<td valign=top>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr>
			<td>
				<?=$cool_txt?> <?=xp_icon($row[mb_id], $c_icon[level])?> <b><?=$c_name?></b>
				<span class='cmt_date'>
					&nbsp; <?=date("Y.m.d H:i:s", strtotime($row[wr_datetime]))?> <?=$c_ip?>
				</span>
				<? if($is_admin) { ?>&nbsp;<a href="<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>&act=lock" target="hiddenframe"><img src="<?=$cmt_skin_path?>/img/icon_blind.gif" border=0 alt="블라인드"></a><? } ?>
				<? if($amina[shingo] > 0) { ?>&nbsp;<a href="javascript:cmt_shingo('<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>');"><img src="<?=$cmt_skin_path?>/img/icon_shingo.gif" border=0 alt="신고"></a><? } ?>
			</td>
			<td align=right>
				<table border=0 cellpadding=0 cellspacing=0>
				<tr>
				<td>
	                <a href="#c_<?=$row[wr_id]?>"><img src='<?=$cmt_skin_path?>/img/co_btn_modify.gif' border=0 alt='이동하기'></a>
				</td>
				<? if($c_sns) { ?>
					<td width=10></td><td><?=$c_sns?></td>
				<? } ?>
				</tr>
				</table>
			</td>
			</tr>
			</table>

			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr>
			<td colspan=2 class="cmt_conts">
				<? if($c_icon[mobile]) { ?><img src="<?=$board_skin_path?>/img/icon_mobile.gif"><? } ?>
				<? if($blind_msg) { ?>
						<span class=blind><img src="<?=$board_skin_path?>/img/icon_shingo.gif" border=0> <?=$blind_msg?></span>
						<? if($is_admin) { ?>&nbsp; [<a href="<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>&act=unlock" target="hiddenframe">해제하기</a>]<p><? } ?>
				<? } ?>
				<?=$str?>
			</td>
			</tr>
			<tr>
			<td>
				<? if($is_choice == "select" && ($view[mb_id] != $list[$i][mb_id])) { ?>
					<a href="<?=$board_skin_path?>/choice.cmt.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>" target="hiddenframe"><span class='cmt_choice_act'><?=$amina[cmt_choice_txt]?>하기</span></a>
				<? } ?>
				&nbsp;
			</td>
			<td align=right>
				<div style="float:right;"><a href="<?=$board_skin_path?>/good.cmt.php?bo_table=<?=$bo_table?>&wr_id=<?=$row[wr_id]?>&good=good" target="hiddenframe" title="<?=$amina[cmt_good_txt]?>"><span class='cmt_good'><?=$row[wr_good]?> &nbsp;</span></a></div>
				<div style='float:right;'><span class="cmt_best_icon">베플</span>&nbsp;</div>
			</td></tr>
			<tr height=15><td colspan=2></td></tr>
			</table>
		</td>
		</tr>
		</table>
	</td>
	</tr>
	</table>

<? } //End for ?>

</td></tr>
</table>
