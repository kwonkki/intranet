﻿<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?><div style="height:12px; line-height:1px; font-size:1px;">&nbsp;</div>

<style type="text/css">
.top { font-weight:bold; font-size:12px; text-align:center; background-color:#95A7DD; border-top:3px solid <?=$board_color[0]?>; border-bottom:1px solid <?=$board_color[0]?>; white-space:nowrap; height:36px; color:<?=$board_color[1]?>; }
.top2 { font-weight:bold; font-size:12px; border-top:3px solid <?=$board_color[0]?>; border-bottom:1px solid <?=$board_color[0]?>; white-space:nowrap; height:36px; color:<?=$board_color[1]?>; padding-left:15px; }
.view_head { width:100px; height:30px; padding-left:15px; color:#8492A0; background-color:#F8F8F8; color:<?=$board_color[1]?>; border-bottom:1px solid #E7E7E7; }
.view_tail { padding-left:15px; color:<?=$board_color[1]?>; border-bottom:1px solid #E7E7E7; } 
.field { padding:5px; border-bottom:1px solid #E7E7E7; }
</style>

<!-- 게시글 보기 시작 -->
<table width="945" align="center" cellpadding="0" cellspacing="0"><tr><td>


<div style="clear:both; height:30px;">
    <div style="float:left; margin-top:6px;">
    <img src="<?=$board_skin_path?>/img/icon_date.gif" align=absmiddle border='0'>
    <span style="color:#888888;">Request Date : <?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
    </div>

    <!-- 링크 버튼 -->
    <div style="float:right;">
    <? 
    ob_start();        $reply_href .= "&dept=$dept";     $list_href .= "&dept=$dept";     $update_href .= "&dept=$dept";     $delete_href .= "&dept=$dept";     $write_href .= "&dept=$dept";         ?>
    <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>
    <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>
    <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>    
    <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_update.gif' border='0' align='absmiddle'></a> "; } ?>

    <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
    <?
    $link_buttons = ob_get_contents();
    ob_end_flush();
    ?>
    </div>
</div>

<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
	<td height="1" bgcolor="#f05134"></td>
	<td height="1" bgcolor="#999999" colspan="6"></td>
	</tr>

	<tr>
	<td height="2" bgcolor="#f2712f"></td>
	<td height="2" bgcolor="#999999" colspan="6"></td>
	</tr>

	<tr>
		<td class="top2" colspan='6'>
            <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
            <?=cut_hangul_last(get_text($view[wr_subject]))?>
        </td>
	</tr>

	<tr>
	<td height="1" bgcolor="#f05134"></td>
	<td height="1" bgcolor="#999999" colspan="6"></td>
	</tr>

	<tr>
	<td width="15%" class="view_head">From</td><td width="15%" class="view_tail">&nbsp;<?=$view[name]?></td>
	<td width="15%" class="view_head">Who</td><td width="15%" class="view_tail">&nbsp;<?=$view[wr_2]?></td>
	<td width="15%" class="view_head">Dept</td><td width="13%" class="view_tail">&nbsp;<?=$view[wr_10]?></td>
	</tr>
</table>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td width="15%" class="view_head">Status</td>
	<td width="15%" class="field">&nbsp;<?php
    if($view[wr_5]=="receive") echo "<img src='$board_skin_path/img/order1.gif' align='absmiddle' border='0'>";
	elseif($view[wr_5]=="process") echo "<img src='$board_skin_path/img/order2.gif' align='absmiddle' border='0'>";
	elseif($view[wr_5]=="hold") echo "<img src='$board_skin_path/img/order3.gif' align='absmiddle' border='0'>";
	elseif($view[wr_5]=="complete") echo "<img src='$board_skin_path/img/order4.gif' align='absmiddle' border='0'>";
	else echo "<img src='$board_skin_path/img/order1.gif' align='absmiddle' border='0'>";
	?>
	</td>
	<td width="15%" class="view_head">Deadline</td><td width="15%" class="view_tail">&nbsp;<?=$view[wr_4]?></td>
	<td width="15%" class="view_head">Progress Rate</td><td width="13%" class="view_tail">&nbsp;<?=$view[wr_6]?>%</td>
</tr>

</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?
// 가변 파일
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view]) {
        $cnt++;
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle border='0'>";
        echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'>";
        echo "&nbsp;<span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
        echo "</a></td></tr>";
    }
}

// 링크
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle border='0'>";
        echo "<a href='{$view[link_href][$i]}' target=_blank>";
        echo "&nbsp;<span style=\"color:#888;\">{$link}</span>";
        echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
        echo "</a></td></tr>";
    }
}
?>
<tr> 
    <td height="150" style="word-break:break-all; padding:10px;">
        <? 
        // 파일 출력
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>

        <!-- 내용 출력 -->
        <span id="writeContents"><?=$view[content];?></span>
        
        <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
        <!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>

        <? if ($nogood_href) {?>
        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
        <div style="color:#888; margin:7px 0 5px 0;">비추천 : <?=number_format($view[wr_nogood])?></div>
        <div><a href="<?=$nogood_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align="absmiddle"></a></div>
        </div>
        <? } ?>

        <? if ($good_href) {?>
        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
        <div style="color:#888; margin:7px 0 5px 0;"><span style='color:crimson;'>추천 : <?=number_format($view[wr_good])?></span></div>
        <div><a href="<?=$good_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align="absmiddle"></a></div>
        </div>
        <? } ?>

</td>
</tr>
<? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // 서명 출력 ?>
</table>
<br>

<?
// 코멘트 입출력
include_once("./view_comment.php");
?>

<div style="height:1px; line-height:1px; font-size:1px; background-color:#ddd; clear:both;">&nbsp;</div>

<div style="clear:both; height:43px;">
    <div style="float:left; margin-top:10px;">
    <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </div>

    <!-- 링크 버튼 -->
    <div style="float:right; margin-top:10px;">
    <?=$link_buttons?>
    </div>
</div>

<div style="height:2px; line-height:1px; font-size:1px; background-color:#dedede; clear:both;">&nbsp;</div>

</td></tr></table><br>

<script type="text/javascript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>
<!-- 게시글 보기 끝 -->
