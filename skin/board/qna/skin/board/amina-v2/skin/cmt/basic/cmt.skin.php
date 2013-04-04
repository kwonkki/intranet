<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

?>

<!-- 코멘트 리스트 -->
<div id="commentContents">

<? 

//Choice
if($is_choice == "done") include($cmt_skin_path."/cmt.skin.choice.php");

//Best
if($amina[cmt_good] && $amina[cmt_best] > 0) {
	$best = sql_fetch(" select count(*) as cnt from $write_table where wr_parent = '$wr_id' and wr_is_comment = 1 and wr_good >= '$amina[cmt_best]' and wr_5 not like '%<choice>%' ");
	if($best[cnt] > 0) include($cmt_skin_path."/cmt.skin.best.php");
}

//Comment
for ($i=0; $i<count($list); $i++) {

	$list[$i][comment_id] = $list[$i][wr_id];

	//Secret
	$is_secret = false;
	if (strstr($list[$i][wr_option], "secret")) $is_secret = true;

	$is_blind = false;
	if($list[$i][wr_9] == "lock" || $list[$i][wr_9] == "shingo") $is_blind = true;

	//xp 및 모바일 아이콘
	$c_icon = amina_array_icon($list[$i][wr_5]);

	//Photo
	$r_padding = "class='r_padding'";
	switch($amina[cmt_photo]) {
		case '1'	: $c_photo = mb_photo($member[mb_id], $list[$i][mb_id], 56, 56); break;
		case '2'	: $c_photo = mb_photo($member[mb_id], $list[$i][mb_id], 56, 56, "is"); break;
		default		: $c_photo = ""; break;
	}

	//Cool & Bad
	if($amina[cmt_cool]) {
		switch($c_icon[post_cool]) {
			case '<cool>'	: $cool_txt = "<span class='cmt_cool'>{$amina[cmt_cool_txt]}</span>&nbsp;"; break;
			case '<bad>'	: $cool_txt = "<span class='cmt_bad'>{$amina[cmt_bad_txt]}</span>&nbsp;"; break;
			default			: $cool_txt = ""; break;
		}
	}

	//SNS Icon
	if ($is_blind || $is_secret || $amina[cmt_sns] == "none") { 
		$c_sns = "";
	} else {
		$clurl = $lurl."#c_".$list[$i][wr_id];
		$surl = sns_surl($clurl, $amina[use_bitly]);
		$c_sns = amina_sns($amina[cmt_sns], $list[$i][wr_content], $clurl, $surl);
	} 

	//Blind
	switch($list[$i][wr_9]) {
		case 'lock'		: $blind_msg = "관리자가 블라인드 처리한 댓글입니다."; break;
		case 'shingo'	: $blind_msg = "신고누적으로 블라인드 처리된 댓글입니다."; break;
		default			: $blind_msg = ""; break;
	}

	//Content
	$str = "";
	if(!$is_blind || $is_admin) {
		$str = $list[$i][content];
		if (!$is_secret || $is_admin) {
			$str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str);
		    $str = preg_replace("/\[\<a\s*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\"\s*[^\>]*\>[^\s]*\<\/a\>\]/i", "<img src='$1://$2.$3' id='target_resize_image[]' onclick='image_window(this);' border='0'>", $str);
		}	

		if ($is_secret) $str = "<span class='cmt_secret'>* {$str}</span>";
		if ($list[$i][wr_trackback]) $str .= "<p>".$list[$i][wr_trackback]."</p";
	}
?>

<a name="c_<?=$list[$i][comment_id]?>"></a>
	<table width=100% cellpadding=0 cellspacing=0 border=0 class="cmt_list">
	<tr>
    <td><? for ($k=0; $k<strlen($list[$i][wr_comment_reply]); $k++) echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></td>
    <td width='100%' class="cmt_head">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr>
		<? if($c_photo) { $r_padding = ""; ?>
				<td width=56 valign=top class='cmt_photo'><?=$c_photo?></td>
		<? } ?>
		<td valign=top>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr>
			<td>
				<?=$cool_txt?> <?=xp_icon($list[$i][mb_id], $c_icon[level])?> <b><?=$list[$i][name]?></b>
				<span class='cmt_date'>
					&nbsp; <?=date("Y.m.d H:i:s", strtotime($list[$i][wr_datetime]))?>
					<? if ($is_ip_view) { ?> - <?=$list[$i][ip]?> <? } ?>
				</span>
				<? if($is_admin) { ?>&nbsp;<a href="<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>&act=lock" target="hiddenframe"><img src="<?=$cmt_skin_path?>/img/icon_blind.gif" border=0 alt="블라인드"></a><? } ?>
				<? if($amina[shingo] > 0) { ?>&nbsp;<a href="javascript:cmt_shingo('<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>');"><img src="<?=$cmt_skin_path?>/img/icon_shingo.gif" border=0 alt="신고"></a><? } ?>
			</td>
			<td align=right>
				<table border=0 cellpadding=0 cellspacing=0>
				<tr>
				<td>	
	                <? if ($list[$i][is_reply]) { ?> <a href="javascript:comment_box('<?=$list[$i][comment_id]?>', 'c');"><img src="<?=$cmt_skin_path?>/img/co_btn_reply.gif" border=0 alt="답변"></a><? } ?>
		            <? if ($is_admin || $list[$i][is_edit]) { ?><a href="javascript:comment_box('<?=$list[$i][comment_id]?>', 'cu');"><img src="<?=$cmt_skin_path?>/img/co_btn_modify.gif" border=0 alt="수정"></a><? } ?>
			        <? if ($is_admin || $list[$i][is_del]) { ?><a href="javascript:comment_delete('<?=$list[$i][del_link]?>');"><img src="<?=$cmt_skin_path?>/img/co_btn_delete.gif" border=0 alt="삭제"></a><? } ?>
				</td>
				<? if($c_sns) { ?>
					<td width=10></td><td><?=$c_sns?></td>
				<? } ?>
				</tr>
				</table>
			</td>
			</tr>
			</table>

			<div class="cmt_line"></div>

			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr>
			<td colspan=2 class="cmt_conts">
				<? if($c_icon[mobile]) { ?><img src="<?=$board_skin_path?>/img/icon_mobile.gif"><? } ?>
				<? if($blind_msg) { ?>
						<span class=blind><img src="<?=$board_skin_path?>/img/icon_shingo.gif" border=0> <?=$blind_msg?></span>
						<? if($is_admin) { ?>&nbsp; [<a href="<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][wr_id]?>&act=unlock" target="hiddenframe">해제하기</a>]<p><? } ?>
				<? } ?>
				<?=$str?>
			</td>
			</tr>
			<? if(!$is_secret && ($amina[cmt_choice] || $amina[cmt_good])) { ?>
				<tr>
				<td>
					<? if($c_icon[choice]) { ?>
						<span class="cmt_choice_end"><?=$amina[cmt_choice_txt]?></span>
					<? } ?>
					<? if($is_choice == "select" && ($view[mb_id] != $list[$i][mb_id])) { ?>
						<a href="<?=$board_skin_path?>/choice.cmt.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][comment_id]?>" target="hiddenframe"><span class="cmt_choice_act"><?=$amina[cmt_choice_txt]?>하기</span></a>
					<? } ?>
					&nbsp;
				</td>
				<td align=right>
					<? if($amina[cmt_good]) { ?>
						<div style="float:right;"><a href="<?=$board_skin_path?>/good.cmt.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i][comment_id]?>&good=good" target="hiddenframe" title="<?=$amina[cmt_good_txt]?>"><span class="cmt_good"><?=$list[$i][wr_good]?> &nbsp;</span></a></div>
						<? if($amina[cmt_best] > 0 && $list[$i][wr_good] >= $amina[cmt_best]){?><div style='float:right;'><span class="cmt_best_icon">베플</span>&nbsp;</div><?}?>
					<? } ?>
				</td></tr>
				<tr height=15><td colspan=2></td></tr>
			<? } else {?>
				<tr height=20><td colspan=2></td></tr>
			<? } ?>
			<tr><td colspan=2 <?=$r_padding?>>
				<span id='edit_<?=$list[$i][comment_id]?>' style='display:none;'></span><!-- 수정 -->
			    <span id='reply_<?=$list[$i][comment_id]?>' style='display:none;'></span><!-- 답변 -->
				<input type=hidden id='secret_comment_<?=$list[$i][comment_id]?>' value="<?=strstr($list[$i][wr_option],"secret")?>">
			    <textarea id='save_comment_<?=$list[$i][comment_id]?>' style='display:none;'><?=get_text($list[$i][content1], 0)?></textarea>
			</td>
			</tr>
			</table>
		</td>
		</tr>
		</table>
	</td>
	</tr>
	</table>
<? } ?>
</div>
<!-- 코멘트 리스트 -->

<?

	$write_error = '';
	if (!$is_member && !$is_comment_write) {
		$write_error = "readonly onclick=\"alert('로그인 하신 후 댓글을 작성하실 수 있습니다.'); return false;\"";
	} else if($is_member && !$is_comment_write) {
		$write_error = "readonly onclick=\"alert('댓글을 작성할 수 있는 권한이 없습니다.'); return false;\"";
	}
?>

<div id=comment_write style="display:none;">
	<form name="fviewcomment" method="post" action="./write_comment_update.php" onsubmit="return fviewcomment_submit(this);" autocomplete="off" style="margin:0px;">
	<input type=hidden name=w           id=w value='c'>
	<input type=hidden name=bo_table    value='<?=$bo_table?>'>
	<input type=hidden name=wr_id       value='<?=$wr_id?>'>
	<input type=hidden name=comment_id  id='comment_id' value=''>
	<input type=hidden name=sca         value='<?=$sca?>' >
	<input type=hidden name=sfl         value='<?=$sfl?>' >
	<input type=hidden name=stx         value='<?=$stx?>'>
	<input type=hidden name=spt         value='<?=$spt?>'>
	<input type=hidden name=page        value='<?=$page?>'>
	<input type=hidden name=cwin        value='<?=$cwin?>'>
	<input type=hidden name=go_url      value='<?=$go_url?>'>
	<input type=hidden name=frame       value='<?=$frame?>'>
	<input type=hidden name=bo_it       value='<?=$bo_it?>'>
	<input type=hidden name=is_good     value=''>

	<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
	<td>
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr>
		<td class="bubble_fhead">
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr>
			<td>
				<? if ($is_guest && !$write_error) { ?>
					<span style="color:#888;">이름 <INPUT type=text maxLength=20 size=12 name="wr_name" itemname="이름" required class=ed>
					&nbsp;
					패스워드 <INPUT type=password maxLength=20 size=12 name="wr_password" itemname="패스워드" required class=ed></span>
				<? } else { ?>
					<b>댓글 이야기!</b> 댓글은 자신을 나타내는 '얼굴'입니다. *^^*"
				<? } ?>
			</td>
			<td align=right>
				<table border=0 cellpadding=0 cellspacing=0>
				<tr>
				<td><input type=checkbox id="wr_secret" name="wr_secret" value="secret"></td>
				<td style="padding-right:10px;"><img src="<?=$cmt_skin_path?>/img/cmt_secret.gif" style="border:0; display:block;" title=" 비밀글 "></td>
				<td style="padding:0 4px;"><img src="<?=$cmt_skin_path?>/img/cmt_increase.gif" style="border:0; cursor:pointer; display:block;" onclick="textarea_increase('wr_content', 8);" title=" 입력창 늘이기" ></td>
				<td><img src="<?=$cmt_skin_path?>/img/cmt_original.gif" style="border:0; cursor:pointer; display:block;" onclick="textarea_original('wr_content', 8);" title=" 입력창 초기화 "></td>
				<td style="padding:0 4px;"><img src="<?=$cmt_skin_path?>/img/cmt_decrease.gif" style="border:0; cursor:pointer; display:block;" onclick="textarea_decrease('wr_content', 8);" title=" 입력창 줄이기 "></td>
				<td><a href="javascript:comment_box('', 'c', 'refresh');"><img src="<?=$cmt_skin_path?>/img/cmt_refresh.gif" style="border:0; display:block;" title=" 새댓글 쓰기 "></a></td>
				</tr>
				</table>
			</td>
			</tr>
			</table>
		</td></tr>
		<tr><td class="bubble_ftail">
			<img src="<?=$cmt_skin_path?>/img/bubble_ftail.gif" style="display:block;" border=0>
		</td></tr>
		</table>

		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr>
		<? if($amina[cmt_cool]) { ?>
			<td align=center style="border:1px solid #ddd; border-right:0px; background:#fafafa;">
				<table border=0 cellpadding=0 cellspacing=0 width="80">
				<tr><td align=center><input type="radio" name="post_cool" value="<cool>" checked><span class="cmt_cool"><?=$amina[cmt_cool_txt]?></span></td></tr>
				<tr height=6><td></td></tr>
				<tr><td  align=center><input type="radio" name="post_cool" value="<bad>"><span class="cmt_bad"><?=$amina[cmt_bad_txt]?></span></td></tr>
				</table>
			</td>
		<? } ?>
		<td width=100% style="border:1px solid #ddd; border-right:0px;">
	        <textarea id="wr_content" name="wr_content" rows=8 itemname="내용" required <?=$write_error?>
	        <? if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?> class=tx style='border:0; width:99%; word-break:break-all; overflow:auto;'></textarea>
		    <? if ($comment_min || $comment_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
		</td>
		<td style="border:1px solid #ddd; background:#fafafa;">
			<input type="image" src="<?=$cmt_skin_path?>/img/write_cmt.gif" border=0 accesskey='s' <?=$write_error?> style="display:block;">
		</tr>
		</table>

		<? if ($is_guest && !$write_error) { ?>
			<table border=0 cellpadding=0 cellspacing=0>
			<tr height=10><td colspan=2></td></tr>
			<tr><td valign=top>
				<img id='kcaptcha_image' />
			</td><td valign=top style="padding-left:10px; color:#888; line-height:180%">
				왼쪽 글자를 입력해 주세요.<br>
				<input title="왼쪽의 글자를 입력하세요." type="input" name="wr_key" size="12" itemname="자동등록방지" required class=ed>
			</td></tr>
			</table>
		<? } ?>
	</td>
	</tr>
	<tr height=10><td></td></tr>
	</table>
	</form>
</div>
