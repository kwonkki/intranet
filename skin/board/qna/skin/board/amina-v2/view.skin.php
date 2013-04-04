<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$g4[path]/lib/amina.lib.resize.php");
include_once("$g4[path]/lib/amina.lib.view.skin.php");

//주소
$lurl = sns_lurl($bo_table, $view[wr_id], $amina[use_surl]); //긴 주소
$surl = sns_surl($lurl, $amina[use_bitly]); //짧은 주소

//아이콘
$v_icon = amina_array_icon($view[wr_5]);

//채택
if($amina[cmt_choice]) {
	$is_choice = "none";
	if($v_icon[choice]) $is_choice = "done";
	if($is_choice != "done" && ($member[mb_id] == $view[mb_id])) $is_choice = "select";
}

?>

<table border=0 cellpadding=0 cellspacing=0 width="<?=$width?>" align=center>
<tr><td>
<? if($amina[star]) { @include_once("$g4[path]/lib/amina.lib.star.php"); ?> <link rel="stylesheet" href="<?=$board_skin_path?>/star.css" type="text/css"><? } ?>

<? include($view_skin_path."/view.skin.php"); ?>

<? include_once("./view_comment.php"); ?>

<!-- 링크 버튼 -->
<div style="padding:10px; margin:0 0 30px; border-bottom:1px solid #eee; border-top:1px solid #eee;">
	<? if ($copy_href || $move_href || $prev_href || $next_href) { ?>
			<div style='float:left;'>
				<? if ($prev_href) { ?><a href="<?=$prev_href?>" title="<?=$prev_wr_subject?>"><img src="<?=$btn_skin_path?>/btn_prev.gif" border=0 align="absmiddle"></a> <? } ?>
				<? if ($next_href) { ?><a href="<?=$next_href?>" title="<?=$next_wr_subject?>"><img src="<?=$btn_skin_path?>/btn_next.gif" border=0 align="absmiddle"></a> <? } ?>
				<? if ($copy_href) { ?><a href="<?=$copy_href?>"><img src="<?=$btn_skin_path?>/btn_copy.gif" border=0 align="absmiddle"></a> <? } ?>
				<? if ($move_href) { ?><a href="<?=$move_href?>"><img src="<?=$btn_skin_path?>/btn_move.gif" border=0 align="absmiddle"></a> <? } ?>
			</div>
	<? } ?>
	<div style="float:right;">
		<? if ($search_href) { ?> <a href="<?=$search_href?><?=$frame_opt?>"><img src="<?=$btn_skin_path?>/btn_list_search.gif" border=0 align="absmiddle"></a> <? } ?>
		<a href="<?=$list_href?><?=$frame_opt?>"><img src="<?=$btn_skin_path?>/btn_list.gif" border=0 align="absmiddle"></a>
		<? if ($update_href) { ?><a href="<?=$update_href?>"><img src="<?=$btn_skin_path?>/btn_modify.gif" border=0 align="absmiddle"></a> <? } ?>
		<? if ($delete_href) { ?><a href="<?=$delete_href?>"><img src="<?=$btn_skin_path?>/btn_delete.gif" border=0 align="absmiddle"></a> <? } ?>
		<? if ($reply_href) { ?><a href="<?=$reply_href?>"><img src="<?=$btn_skin_path?>/btn_reply.gif" border=0 align="absmiddle"></a> <? } ?>
		<? if ($write_href) { if($sca) { $write_href .= "&sca=".urlencode($sca); } ?><a href="<?=$write_href?><?=$frame_opt?>"><img src="<?=$btn_skin_path?>/btn_write.gif" border=0 align="absmiddle"></a> <? } ?>
	</div>
	<div style="clear:both;"></div>
</div>

</td></tr>
</table>

<script language="JavaScript">
function view_shingo(url) {
	if (confirm("본 글을 정말 신고하시겠습니까?\n\n한번 신고하면 취소할 수 없습니다.")) hiddenframe.location.href = url;
}
function clipboard_address(str) {
    prompt("이 글의 고유주소입니다. Ctrl+C를 눌러 복사하거나 확인을 눌러 주세요.", str);
	window.clipboardData.setData("Text",str);
}
function clipboard_address(str) {
    prompt("이 글의 고유주소입니다. Ctrl+C를 눌러 복사하거나 확인을 눌러 주세요.", str);
	window.clipboardData.setData("Text",str);
}
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}
</script>

<script language="JavaScript" src="<?=$g4[path]?>/js/board.js"></script>
<script language="JavaScript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>
<!-- 게시글 보기 끝 -->
