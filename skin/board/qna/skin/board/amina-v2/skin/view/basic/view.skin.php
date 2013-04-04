<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$view_skin_path/set/set.load.php");

$set = amina_set_view($amina[view_set]);

if($set[view_1vs1] && !$is_admin) { //1:1 게시판용

	// 접근권한 설정
	if (!$member[mb_id]) alert("본 게시판은 로그인 후 이용가능합니다.");

	// 읽을 권한 설정
	$do_read = false;
	$sql = "select * from `{$write_table}` where 1 and wr_num like '{$view[wr_num]}' and mb_id like '{$member[mb_id]}';";
	$result = sql_query($sql);
	while ($row = sql_fetch_array($result)) {
		if ($view[wr_num] == $row[wr_num] ){
		  	$do_read = true; 
			break;
		}  
	}

	if(!$do_read) {
		// 공지글 체크
		$noticeNumS = explode("\n",$board[bo_notice]);
		if (in_array($_GET[wr_id] , $noticeNumS )) $do_read = true;
	}

	if(!$do_read ) alert("회원님은 본 게시물을 볼 수 있는 권한이 없습니다.");
}

//글제목
$is_blind = false;
$blind_msg = "";
if($view[wr_9] == "lock" || $view[wr_9] == "shingo") {
	$is_blind = true;
	$view_subject = "<img src='{$board_skin_path}/img/shingo.gif' border='0'> 블라인드 처리된 글입니다.";
	if($is_admin) $view_subject .= "[ ".cut_hangul_last(get_text($view[wr_subject]))." ]";
	$bling_msg = "신고누적으로";
	if($view[wr_9] == "lock") $bling_msg = "관리자에 의해";
} else {
	$view_subject = cut_hangul_last(get_text($view[wr_subject]));
}

//링크 & 첨부
$attach_list = "";
if(!$is_admin && ($view[wr_9] == "lock" || $view[wr_9] == "shingo")) {
	;
} else	{
	// 링크
	for ($i=1; $i<=$g4[link_count]; $i++) {
		if ($view[link][$i]) {
			$link = cut_str($view[link][$i], 70);
			$attach_list .="<tr height=24><td align=center><img src='{$board_skin_path}/img/icon/9.gif' border=0></td><td><font color='#888888'>관련링크 : </font><a href='{$view[link_href][$i]}' target=_blank><span style=\"color:#888;\">{$link}</span> <span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span></a></td></tr>\n";
		}
	}			

	// 가변 파일
	for ($i=0; $i<count($view[file]); $i++) {
		if ($view[file][$i][source] && !$view[file][$i][view]) {
			$attach_list .= "<tr height=24><td align=center><img src='{$board_skin_path}/img/icon/6.gif' border=0></td><td><font color='#888888'>첨부파일 : </font><a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'> <span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span> <span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span></a></td></tr>\n";
		} 
	}
}

//회원사진
switch($amina[view_photo]) {
	case '1'	:	$view_photo = mb_photo($member[mb_id], $view[mb_id], 56, 56); break;
	case '2'	:	$view_photo = mb_photo($member[mb_id], $view[mb_id], 56, 56, "is"); break;
	case '3'	: 	if($icon[post_icon_mb]) $view_photo = mb_photo($member[mb_id], $view[mb_id], 56, 56, "is");
					if(!$view_photo && !file_exists($emo_skin_path."/".$v_icon[post_icon].".gif")) $v_icon[post_icon] = rand(1,$amina[emo_cnt]);
					$view_photo = "<img src=\"{$emo_skin_path}/{$v_icon[post_icon]}.gif\" width=56 height=56 \">\n";
					break;
	default		:	$view_photo = ""; break;
}

?>

<!-- 게시글 보기 시작 -->

<link rel="stylesheet" href="<?=$view_skin_path?>/<?=$amina[view_css]?>.css" type="text/css">

<? if(!$set[view_head]) { ?>
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr class="head_tr"><td class="head_td">
		&nbsp;
	</td></tr>
	<tr height=10><td></td></tr>	
	</table>
<? } ?>

<table border=0 cellpadding=0 cellspacing=0 width=100% class="view_tbl">
<tr><td style="padding:0 10px 10px; border-bottom:1px solid #ddd;">
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
	<? if($view_photo) { ?><td width=56 valign=top class='view_photo'><?=$view_photo?></td><? } ?>
	<td>
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr>
		<td colspan=2 style="font:bold 16pt dotum; letter-spacing:-1px;line-height:1.4;">
			<?=$view_subject?> <? if($v_icon[mobile]) { ?><img src="<?=$board_skin_path?>/img/icon_mobile.gif" border=0><? } ?>
		</td>
		</tr>
		<tr>
		<td style="padding:10px 0 0;">
			<?=xp_icon($view[mb_id], $v_icon[level])?> <b><?=$view[name]?></b>
		</td>
		<td align=right valign=bottom style="padding:20px 0 0;">
			<ul class=view_info style="float:right;">
				<li class=first><span class=cnt><?=date("Y.m.d H:i", strtotime($view[wr_datetime]))?></span></li>
				<? if($amina[star]) { ?><li><?=amina_star_mark($amina[star_color],$view[wr_7],"s")?></li><? } ?>
				<? if($view[ca_name]) { ?><li><?=$view[ca_name]?></li><? } ?>
				<li>조회 <span class=cnt><?=$view[wr_hit]?></span></li>
				<? if ($board[bo_use_good]) { ?><li><span class=good><?=$view[wr_good]?></span></li><? } ?>
				<? if ($board[bo_use_nogood]) { ?><li><span class=nogood><?=$view[wr_nogood]?></span></li><? } ?>
				<? if ($scrap_href) { ?><li><a href="javascript:win_scrap('<?=$scrap_href?>');" title=" 이 글을 스크랩합니다. ">스크랩</a></li><? } ?>
				<? if ($trackback_url) { ?><li><a href="javascript:trackback_send_server('<?=$trackback_url?>');" title=" 이 글의 트랙백 주소를 복사합니다. ">트랙백</a></li><? } ?>
				<li><a href="javascript:clipboard_address('<?=urlencode($surl)?>');" title=" 이 글의 고유주소를 복사합니다. ">주소복사</a></li>
				<? if($is_admin) { ?><li><a href="<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&act=lock" target="hiddenframe"><span class=lock>잠금</span></a></li><? } ?>
				<? if($amina[shingo] > 0) { ?><li><a href="javascript:view_shingo('<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>');"><span class=shingo>신고</span></a></li><? } ?>
			</ul>
		</td>
		</tr>
		</table>
	</td>
	</tr>
	</table>
</td>
</tr>
<? if($attach_list) { ?>
	<tr>
	<td style="padding:7px 10px;">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<col width=20><col />
		<?=$attach_list?> 
		</table>
	</td>
	</tr>
<? } ?>
</table>

<? if($link_youngcart && $view[wr_8]) include_once("$view_skin_path/view.it.php"); ?>

<? if($is_choice == "none") { ?>
	<p>&nbsp; <span class="view_choice"><?=$amina[cmt_choice_txt]?>된 댓글은 <?=number_format($v_icon[choice_point])?> 포인트를 드립니다.</span></p>
<? } ?>

<table border=0 cellpadding=0 cellspacing=0 width=100%>
<tr><td class="viewContents">
	<? if($is_blind) { ?>
		<span class=view_blind><img src="<?=$board_skin_path?>/img/icon_shingo.gif" border=0> <?=$blind_msg?> 블라인드 처리된 글입니다.</span>
		<? if($is_admin) { ?>&nbsp; [<a href="<?=$g4[bbs_path]?>/amina.blind.php?bo_table=<?=$bo_table?>&wr_id=<?=$view[wr_id]?>&act=unlock" target="hiddenframe">해제하기</a>]<p><? } ?>
	<? } ?>
	<? 
		if(!$is_blind || $is_admin) { 
			$wr_post = amina_array_write($view[wr_10]);
			if($wr_post[img_location] == "insert") $view[content] = $view[rich_content];
			echo amina_view_contents($view[content], $view[file], $view[wr_6], $wr_post, (int)$board[bo_image_width]);
		}
	?>
</td></tr>
</table>

<? if ($board[bo_use_good] || $board[bo_use_nogood]) { ?>
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr><td align=center>
		<?=amina_good($amina[view_good], $bo_table, $view[wr_id])?>
	</td></tr>
	</table>
<? } ?>	

<?
	if ($amina[star] == "2") { //회원별점일 때 입력창 출력
		$star_skin_path = $board_skin_path."/skin/star/".$amina[star_skin];
		include_once($star_skin_path."/star.skin.php");
	} 
?>

<? if ($amina[sign_skin] != "none" && $is_signature) include($sign_skin_path."/sign.skin.php"); // 서명 출력 ?>

<div style="height:30px; clear:both;">&nbsp;</div>

<? if(!$is_blind && $amina[view_sns] != "none") { 
	list($sns_img) = amina_thumb_img($view[file], $view[wr_6], $view[wr_content], 1, $link_youngcart, $view[wr_8]);	
	if($sns_img) $sns_img = gnu_url($sns_img, "sns");
?>
	<table border=0 cellpadding=10 cellspacing=0 width="100%">
	<tr>
	<td align=right valign=bottom>
		<?=amina_sns($amina[view_sns], $view[wr_subject]." - ".$view[wr_content], $lurl, $surl, $sns_img)?>
	</td>
	</tr>
	</table>
<? } ?>

<div style="clear:both;"></div>
