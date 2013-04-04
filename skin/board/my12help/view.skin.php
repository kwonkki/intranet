<?
if (!defined("_GNUBOARD_")) exit; // 媛�� ���吏���렐 遺�� 
// �ㅽ���� �ъ���� lib �쎌��ㅼ�湲�
include_once("$g4[path]/lib/view.skin.lib.php");
?>
<!-- 寃��湲�蹂닿린 ��� -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0" id="view_<?=$wr_id?>"><tr><td>
<colgroup width="750px;" />
<!-- 留�� 踰�� -->
<? 
ob_start(); 
?>
<!--
<table width='100%' cellpadding=0 cellspacing=0>
<tr height=35>
    <td width=75%>
        <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_search_list.gif' border='0' align='absmiddle'></a> "; } ?>
        <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>

        <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_modify.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_del.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($good_href) { echo "<a href=\"$good_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_good.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($nogood_href) { echo "<a href=\"$nogood_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_nogood.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($nosecret_href) { echo "<a href=\"$nosecret_href\"><img src='$board_skin_path/img/btn_nosecret.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($secret_href) { echo "<a href=\"$secret_href\"><img src='$board_skin_path/img/btn_secret.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($now_href) { echo "<a href=\"$now_href\"><img src='$board_skin_path/img/btn_now.gif' border='0' align='absmiddle'></a> "; } ?>
    </td>
    <td width=25% align=right>
        <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
        <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </td>
</tr>
</table>
-->

<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
	<td>
		<?php echo $title_img; ?>
	</td>
</tr>
<tr><td height=5></td></tr>
</table>
<!-- ��ぉ, 湲���� ���, 議고�, 異��, 鍮��泥�-->
<table width="100%" cellspacing="0" cellpadding="0" id="view_Contents">
<colgroup width="750px;" />
<tr><td height=30 style="padding:5px 0 5px 0;">
    <table cellpadding=0 cellspacing=0>
    <colgroup width="750px;" />
    <tr>
	  <td><img src="<?=$board_skin_path?>/img/sub_line_w_702.gif" width="750" height="4"></td>
	</tr>
    <tr background="<?=$board_skin_path?>/img/sub_line_w_702bg.gif">
    	<td style='word-break:break-all; height:28px;'>&nbsp;&nbsp;<strong><span id="writeSubject"><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?><?=cut_hangul_last(get_text($view[wr_subject]))?></span></strong></td>
    	
    	</td>
    </tr>
	  <tr><td colspan="2" height=3 style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;"></td></tr>
    </table></td></tr>    
<tr><td height=30>
    <span style="float:left;">
    &nbsp;&nbsp;Writer : <?=$view[name]?><? if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>&nbsp;&nbsp;&nbsp;&nbsp;
    Date : <?=substr($view[wr_datetime],2,14)?>&nbsp;&nbsp;&nbsp;&nbsp;
    View : <?=$view[wr_hit]?>&nbsp;&nbsp;&nbsp;&nbsp;
    <? if ($is_good) { ?><font style="font:normal 11px ���; color:#BABABA;">Likes</font> :<font style="font:normal 11px tahoma; color:#BABABA;"> <?=$view[wr_good]?>&nbsp;&nbsp;&nbsp;&nbsp;<?}?></font>
    <? if ($is_nogood) { ?><font style="font:normal 11px ���; color:#BABABA;">鍮��泥�/font> :<font style="font:normal 11px tahoma; color:#BABABA;"> <?=$view[wr_nogood]?>&nbsp;&nbsp;&nbsp;&nbsp;<?}?></font>
    </span>
    <?if ($singo_href) { ?><span style="float:right;padding-right:5px;"><a href="javascript:win_singo('<?=$singo_href?>');"><img src='<?=$board_skin_path?>/img/icon_singo.gif'></a></span><?}?>
    <?if ($unsingo_href) { ?><span style="float:right;padding-right:5px;"><a href="javascript:win_unsingo('<?=$unsingo_href?>');"><img src='<?=$board_skin_path?>/img/icon_unsingo.gif'></a></span><?}?>
</td></tr>

<!-- 寃��湲�二쇱�瑜�蹂듭���린 �쎄� ��린 �������� 遺�����쎌� -->
<!--
<tr><td height=30>
        <font style="font:normal 11px ���; color:#BABABA;">&nbsp;&nbsp;寃��湲�二쇱� : <a href="javascript:clipboard_trackback('<?=$posting_url?>');" style="letter-spacing:0;" title='��湲�� �������� ��二쇱�瑜��ъ������><?=$posting_url;?></a></font>
        <? if ($g4[use_bitly]) { ?>
            <? if ($view[bitly_url]) { ?>
            &nbsp;bitly : <span id="bitly_url" class=bitly style="font:normal 11px ���; color:#BABABA;"><a href=<?=$view[bitly_url]?> target=new><?=$view[bitly_url]?></a></span>
            <? } else { ?>
            &nbsp;bitly : <span id="bitly_url" class=bitly style="font:normal 11px ���; color:#BABABA;"></span>
            <script language=javascript>
            // encode ��寃�� ��꺼二쇰㈃, �����decode�댁� 寃곌낵瑜�return �댁���
            // encode ��린 ��� url�������寃곌낵瑜�爰쇰� ����린 ��Ц�� 寃곌뎅 2媛�� ��꺼以��.
            // �� java script�����urlencode, urldecode媛�������. ���
            // 湲�� �닿굅��留��留�� �댁� ���. ��?? 洹몃�����낫瑜�html page������댄� ���~!
            get_bitly_g4('#bitly_url', '<?=$bo_table?>', '<?=$wr_id?>');
            </script>
            <?}?>
        <?}?>
        
        <? 
        if ($is_member && $g4[use_gblog]) {
            $gb4_path="../blog";
            include_once("$gb4_path/common.php");
        ?>
        <script language=javascript>
        // gblog��� �곕� java script 蹂���ㅼ� �ㅼ�
        var gb4_blog        = "<?=$gb4['bbs_path']?>";
        </script>
        <script type="text/javascript"  src="<?="$gb4[path]/js/blog.js"?>"></script>
        <a href="javascript:send_to_gblog('<?=$bo_table?>','<?=$wr_id?>')">釉��洹몃�蹂대�湲�/a>
        <? } ?>
</td></tr>
-->
<tr><td height=1 bgcolor=#E7E7E7></td></tr>

<?
// 媛�� ���
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view]) {
        $cnt++;
        //echo "<tr><td height=22>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle> <a href='{$view[file][$i][href]}' title='{$view[file][$i][content]}'><strong>{$view[file][$i][source]}</strong> ({$view[file][$i][size]}), Down : {$view[file][$i][download]}, {$view[file][$i][datetime]}</a></td></tr>";
        echo "<tr><td height=30>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle> <a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'><font style='normal 11px ���;'>{$view[file][$i][source]} ({$view[file][$i][size]}), Down : {$view[file][$i][download]}, {$view[file][$i][datetime]}</font></a></td></tr><tr><td height='1'  bgcolor='#E7E7E7'></td></tr>";
    }
}

// 留��
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><td height=30>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle> <a href='{$view[link_href][$i]}' target=_blank><font  style='normal 11px ���;'>{$link} ({$view[link_hit][$i]})</font></a></td></tr><tr><td height='1' bgcolor='#E7E7E7'></td></tr>";
    }
}
?>

<!-- <tr><td height=1 bgcolor=#"E7E7E7"></td></tr> //-->
<tr background="<?=$board_skin_path?>/img/sub_line_702bg.gif" >  
    <td height="150" style='word-break:break-all;padding:10px;'>
    <div id="resContents" class="resContents" >

        <?
        // ��� 異��
        ob_start(); 
        for ($i=0; $i<=$view[file][count]; $i++) {
            if ($view[file][$i][view]) {
                // function resize_content($content, $width=0, $height=0, $quality=0, $thumb_create=0, $image_window=1, $water_mark="", $image_filter="", $image_min=0, $imgage_min_kb=0)
                echo resize_dica($view[file][$i][view],250,300) . "<br/>&nbsp;&nbsp;&nbsp;" . $view[file][$i][content] . "<br/>"; if (trim($view[file][$i][content])) echo "<br/>"; 
                //echo resize_content($view[file][$i][view], 0,0,0,1,1,"","",300,90) . "<br/>&nbsp;&nbsp;&nbsp;" . $view[file][$i][content] . "<br/>"; if (trim($view[file][$i][content])) echo "<br/>";
                //echo $view[file][$i][view] . "<br/>&nbsp;&nbsp;&nbsp;" . $view[file][$i][content] . "<br/>"; if (trim($view[file][$i][content])) echo "<br/>";
            }
        }
        $file_viewer = ob_get_contents();
        ob_end_clean();

        // �����寃��湲�� �대�吏�� ������ 異����린
        if ($view['wr_singo'] and trim($file_viewer)) {
            $singo = "<div id='singo_file_title{$view[wr_id]}' class='singo_title'><font color=gray>���媛������寃��臾쇱����. ";
            $singo .= "<span class='singo_here' style='cursor:pointer;font-weight:bold;' onclick=\"document.getElementById('singo_file{$view[wr_id]}').style.display=(document.getElementById('singo_file{$view[wr_id]}').style.display=='none'?'':'none');\"><font color=red>�ш린</font></span>瑜��대┃���硫�泥⑤� �대�吏�� 蹂���������.</font></div>";
            $singo .= "<div id='singo_file{$view[wr_id]}' style='display:none;'><p>";
            $singo .= $file_viewer;
            $singo .= "</div>";
            echo $singo;
        } else {
            echo $file_viewer;
        }
        ?>

        <!-- �댁� 異�� -->
        <span id="writeContents" class="ct lh">
        <?
            $write_contents=resize_dica($view[content],400,300);
            echo $write_contents;
        ?>
        </span>

        <?//echo $view[rich_content]; // {�대�吏�0} 怨�媛�� 肄��瑜��ъ���寃쎌�?>
        <!-- ��� ��렇 諛⑹���--></xml></xmp><a href=""></a><a href=''></a>

        <tr><td height="1" bgcolor="#E7E7E7"></td></tr>
        <? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // ��� 異�� ?>

        <?
        // CCL ��낫
        $view[wr_ccl] = $write[wr_ccl] = mw_get_ccl_info($write[wr_ccl]);
        ?>

        <? if ($board[bo_ccl] && $view[wr_ccl][by]) { ?>
        <tr style='padding:10px;' class=mw_basic_ccl><td>
        <a rel="license" href="<?=$view[wr_ccl][link]?>" title="<?=$view[wr_ccl][msg]?>" target=_blank><img src="<?=$board_skin_path?>/img/ccls_by.gif">
        <? if ($view[wr_ccl][nc] == "nc") { ?><img src="<?=$board_skin_path?>/img/ccls_nc.gif"><? } ?>
        <? if ($view[wr_ccl][nd] == "nd") { ?><img src="<?=$board_skin_path?>/img/ccls_nd.gif"><? } ?>
        <? if ($view[wr_ccl][nd] == "sa") { ?><img src="<?=$board_skin_path?>/img/ccls_sa.gif"><? } ?>
        </a>
        </td></tr>
        <? } ?>
        
        <? if ($board[bo_related] && $view[wr_related]) { ?>
        <? $rels = mw_related($view[wr_related], $board[bo_related]); ?>
        <? if (count($rels)) {?>
        <tr>
            <td>
            <b>愿��湲�/b> : <?=$view[wr_related]?>
            </td>
        </tr>
        <tr>
            <td>
                <ul>
                <? for ($i=0; $i<count($rels); $i++) { ?>
                <li> <a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$rels[$i][wr_id]?>"> <?=$rels[$i][wr_subject]?> </a> </li>
                <? } ?>
                </ul>
            </td>
        </tr>
        <? } ?>
        <? } ?>

        <? 
        // �멸린寃����
        if ($board[bo_popular]) { 
        
        unset($plist);
        $plist = popular_list($board[bo_popular], $board[bo_popular_days], $bo_table);
        
        if (count($plist) > 0) {
        ?>
        <tr>
            <td>
                <b>�멸린寃����/b> : 
                <? 
                for ($i=0; $i<count($plist); $i++) {
                    if (trim($plist[$i][sfl]) == '' || strstr($plist[$i][sfl], '\%7C')) $plist[$i][sfl] = "wr_subject||wr_content";
                ?>
                <a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&sfl=<?=urlencode($plist[$i][sfl])?>&stx=<?=$plist[$i]['pp_word']?>"><?=$plist[$i]['pp_word']?></a>&nbsp;&nbsp;
                <? } ?>
            </td>
        </tr>
        <? } ?>
        <? } ?>

        <?
        if ($board[bo_chimage])  {
            include_once("$g4[path]/lib/chimage.lib.php");
            $ch_list = chimage('', $bo_table, $wr_id);
            if ($ch_list) {
                echo "<tr>
                      <td>
                      $ch_list
                      </td>
                      </tr>
                ";
            }
        } ?>
</div>
</td>
</tr>

</table><br>

<?
// 愿��媛���� 寃쎌� 愿��瑜��곌껐
if (file_exists("$board_skin_path/adsense_view_comment.php"))
    include_once("$board_skin_path/adsense_view_comment.php");

// 肄���������
if (!$board['bo_comment_read_level'])
  include_once("./view_comment.php");
else if ($member['mb_level'] >= $board['bo_comment_read_level'])
  include_once("./view_comment.php");
?>

<?=$link_buttons?>

</td></tr>
<tr><td>
<? include_once("$g4[path]/adsense_page_bottom.php"); ?>
</td></tr>
</table><br>

<script type="text/javascript"  src="<?="$g4[path]/js/board.js"?>"></script>
<script language="JavaScript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
    OnclickCheck(document.getElementById("writeContents"), '<?=$config[cf_link_target]?>'); 
}
$(document).ready(function() {
	$("#resContents").krioImageLoader();
});
</script>

<!-- 寃��湲�蹂닿린 ��-->
