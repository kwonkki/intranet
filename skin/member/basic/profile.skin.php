<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="600" height="50" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td align="center" valign="middle" bgcolor="#EBEBEB">
        <table width="590" height="40" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td width="25" align="center" bgcolor="#FFFFFF" ><img src="<?=$member_skin_path?>/img/icon_01.gif" width="5" height="5"></td>
            <td width="75" align="left" bgcolor="#FFFFFF" ><font color="#666666"><b>introduce</b></font></td>
            <td width="490" bgcolor="#FFFFFF" ><? if ($is_admin) {?>(ID: <?=$mb['mb_id']?>)<? }?></td>
        </tr>
        </table></td>
</tr>
</table>

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr> 
    <td align="center" valign="top">
        <table width="540" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td height="20" colspan="3"></td>
        </tr>
        <tr> 
            <td width="174" height="149" align="center" valign="middle" background="<?=$member_skin_path?>/img/self_intro_bg.gif">
                <table width="170" height="130" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                    <td align="center" valign="middle"><?=$mb_nick?>
                    <BR>
                    <?
                    $sql = "select * from $g4[mb_nick_table] where mb_id = '$member[mb_id]' and end_datetime != '0000-00-00 00:00:00' order by nick_no desc limit 5 ";
                    $result = sql_query($sql);
                    for ($i=0; $row=sql_fetch_array($result); $i++) {
                        echo "<BR>" . $row[mb_nick];
                    }
                    ?>
                    </td>
                </tr>
                </table></td>
            <td width="15" height="149"></td>
            <td width="351" height="149" align="center" valign="middle" background="<?=$member_skin_path?>/img/self_intro_bg_1.gif">
                <table width="300" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                    <td width="30" height="25" align="center"><img src="<?=$member_skin_path?>/img/arrow_01.gif" width="7" height="5"></td>
                    <td width="270">Level : <?=$mb[mb_level]?></td>
                </tr>
                <tr> 
                    <td height="1" colspan="2" bgcolor="#FFFFFF"></td>
                </tr>
                <tr> 
                    <td width="30" height="25" align="center"><img src="<?=$member_skin_path?>/img/arrow_01.gif" width="7" height="5"></td>
                    <td width="270">Point : <? if ($mb[mb_point]) { ?><?=number_format($mb[mb_point])?> <? } ?></td>
                </tr>
                <tr> 
                    <td height="1" colspan="2" bgcolor="#FFFFFF"></td>
                </tr>

                <? if ($mb_homepage) { ?>
                <tr> 
                    <td width="30" height="25" align="center"><img src="<?=$member_skin_path?>/img/arrow_01.gif" width="7" height="5"></td>
                    <td width="270">homepage : <a href="<?=$mb_homepage?>" target="<?=$config[cf_link_target]?>"><?=$mb_homepage?></a></td>
                </tr>
                <tr> 
                    <td height="1" colspan="2" bgcolor="#FFFFFF"></td>
                </tr>
                <? } ?>

                <? if ($mb[mb_datetime]) { ?>
                <tr> 
                    <td width="30" height="25" align="center"><img src="<?=$member_skin_path?>/img/arrow_01.gif" width="7" height="5"></td>
                    <td width="270">registrated date : <?=($member[mb_level] >= $mb[mb_level]) ?  substr($mb[mb_datetime],0,10) ." (".$mb_reg_after." day )" : " no information"; ?></td>
                </tr>
                <? } ?>

                <? if ($mb[mb_realcheck]) { ?>
                <tr> 
                    <td width="30" height="25" align="center"><img src="<?=$member_skin_path?>/img/arrow_01.gif" width="7" height="5"></td>
                    <td width="270">self-valication : <?=substr($mb[mb_realcheck],0,10)?></td>
                </tr>
                <? } ?>

                <? if ($mb[mb_today_login]) { ?>
                <tr> 
                    <td height="1" colspan="2" bgcolor="#FFFFFF"></td>
                </tr>
                <tr> 
                    <td width="30" height="25" align="center"><img src="<?=$member_skin_path?>/img/arrow_01.gif" width="7" height="5"></td>
                    <td width="270">Last access : <?=($member[mb_level] >= $mb[mb_level]) ? $mb[mb_today_login] : "no information";?></td>
                </tr>
                <? } ?>
                </table></td>
        </tr>
        <tr> 
            <td width="540" height="15" colspan="3" bgcolor="#FFFFFF"></td>
        </tr>
        <tr> 
            <td height="15" colspan="3" bgcolor="#FFFFFF"><img src="<?=$member_skin_path?>/img/top_line.gif" width="540" height="15"></td>
        </tr>
        <tr align="center" valign="top"> 
            <td colspan="3" background="<?=$member_skin_path?>/img/mid_line.gif" bgcolor="#FFFFFF"><table width="500" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                        <td height="30" valign="top"><img src="<?=$member_skin_path?>/img/self_intro_icon_01.gif" width="81" height="24"></td>
                    </tr>
                    <tr>
                        <td height="100" valign="top"><?=$mb_profile?></td>
                    </tr>
                <?
                // 불당팩 - 최고 관리자의 경우 mb_memo를 볼 수 있게
                if ($is_super) {
                ?>
                    <tr>
                        <td height="100" valign="top" bgcolor="#EBEBEB">
                        <? echo nl2br($mb[mb_memo]) ?>
                        </td>
                    </tr>
                <? } ?>
                </table></td>
        </tr>
        <tr> 
            <td height="15" colspan="3" bgcolor="#FFFFFF"><img src="<?=$member_skin_path?>/img/down_line.gif" width="540" height="15"></td>
        </tr>
        <tr>
            <td height="50" colspan="3" bgcolor="#FFFFFF"></td>
        </tr>
        </table></td>
</tr>
<tr> 
    <td height="2" align="center" valign="top" bgcolor="#D5D5D5"></td>
</tr>
<tr>
    <td height="2" align="center" valign="top" bgcolor="#E6E6E6"></td>
</tr>
<tr>
    <td height="40" align="center" valign="bottom"><a href="javascript:window.close();"><img src="<?=$member_skin_path?>/img/btn_close.gif" width="48" height="20" border="0"></a></td>
</tr>
</table>
