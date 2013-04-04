<?
if (!defined("_GNUBOARD_")) exit; // 媛�� ���吏���렐 遺�� 

if (!$skin_title) {
    $skin_title = $board[bo_subject];
    $skin_title_link = "$g4[bbs_path]/board.php?bo_table=$bo_table";
}
?>

<table width="100%" cellpadding="0" cellspacing="0" border="0" style='border:solid 3px #ccc;'><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr bgcolor="#F9F9F9"> 
    <td ><img src="<?=$g4['path']?>/images/<?=$bo_table?>.jpg"  /></td>
</tr>
<tr bgcolor="#222"><td height="0"></td></tr>
</table>
<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr bgcolor="#F9F9F9"> 
    <td height="20" width=10px></td>
    <td bgcolor="#F9F9F9">&nbsp;<a href='<?=$skin_title_link?>' onfocus='this.blur()'><font style='font-size:11pt; color:#333333;'><strong><?=$skin_title?></strong></font></a>&nbsp;</td>
    <td align="right" bgcolor="#F9F9F9" width=37px><a href='<?=$skin_title_link?>' onfocus='this.blur()'><img src="<?=$latest_skin_path?>/img/more.gif" width="37" height="15" border="0" alt='more'></a></td>
    <td bgcolor="#F9F9F9" width=10px></td>
</tr>
<tr bgcolor="#DDDDDD"><td colspan=4 height="1"></td></tr>
</table>
-->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td colspan=2 height="5"></td>
</tr>
<? if (count($list) == 0) { ?>
    <tr><td colspan=2 align=center height=178>no data</td></tr>
<? } else { ?>
<? for ($i=0; $i<count($list); $i++) { 
    if ($list[$i][ca_name] !== $member[mb_id])
        ;
    {
?>

<tr> 
    <td width="15" height="18" align="center" valign="middle" background="<?=$latest_skin_path?>/img/bg_line.gif"></td>
    <td align="left" background="<?=$latest_skin_path?>/img/bg_line.gif" style='word-break:break-all;'><nowarp><nobr style="display:block; overflow:hidden;">
        <?
        if ($list[$i][icon_secret])
            echo "<img src='$latest_skin_path/img/icon_secret.gif' alt='secret' align=absmiddle> ";

        if ($list[$i][bo_name])
            $list_title = $list[$i][bo_name] . " : " . $list[$i][subject] . " (". $list[$i][datetime] . ")" ;
        else
            $list_title = $list[$i][subject]  . " (". $list[$i][datetime] . ")" ;
        
        

        echo $list[$i][icon_reply] . " ";
        echo "<img src='$latest_skin_path/img/dot_gray.gif' align=absmiddle> ";
        echo "<a href='{$list[$i][href]}' onfocus='this.blur()' title='{$list_title}' {$target_link}>";
        if ($list[$i][is_notice])
            echo "<font style='font-size:10pt; color:#333333;'><strong>" . $list[$i][subject] . "</strong></font>";
        else
            echo "<font style='font-size:10pt; color:#333333;'>" . $list[$i][subject] . "</font>";
        echo "</a>";
        
        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\" onfocus=\"this.blur()\"><span style='font-size:10pt; color:#000;'>{$list[$i][comment_cnt]}</span></a> ";

        echo " " . $list[$i][icon_new];
        ?>
    </nobr></nowrap>
    </td>
</tr>
<? } ?>
<? } ?>
<? } ?>
</table>
</td></tr></table>
