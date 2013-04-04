<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<!-- 로그인 후 외부로그인 시작 -->
<style type="text/css">
.login_menu{
	color: white;
	display: block;
	font-size: 10px;
	background: #364155 no-repeat 174px 3px;
}
.login_menu strong.menu{ color: white; display: block; border-bottom: 1px solid white; padding: 5px 5px 4px 10px; font-size: 10px; background: #364155 no-repeat 174px 3px;}
</style>
<div class="login_menu">
<strong class="menu">Login</strong>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style='border:solid 1px #ccc;'>
<tr>
<td width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
    <td>
        <table width="100%" height="27" border="0" cellpadding="0" cellspacing="0">
        <tr> 
            <td width="10" height="27">&nbsp;</td>
            <td width="" height="27"><a href='#' onclick="win_profile('<?=$member[mb_id]?>');"><span class='member'><strong><?=$nick?></strong></span></a>&nbsp;<img src="<?=$outlogin_skin_path?>/img/<?=$member[mb_level]?>.gif"><font color="#737373" style="margin-left:10px;"> Available VL : <?=$member[mb_vacation_point]?></font></td>
            <td height="27">
            <? if ($g4['member_suggest_join']) { ?>
            <span class="btn_pack small"><a href="<?=$g4['g4_path']?>/plugin/recommend/index.php">추천</a></span>
            <? } ?>
            <? if ($config[cf_use_recycle]) { ?>
            <span class="btn_pack small"><a href="<?=$g4['bbs_path']?>/recycle_list.php">휴지통</a></span>
            <? } ?>
            </td>
        </tr>
      </table></td>
</tr>
<tr> 
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td width="100%" align="center">
                <table width="100%" height="25" border="0" cellpadding="1" cellspacing="0" align="center">
                <tr> 
                    <!--<td width="58" align="center"><a href="javascript:win_scrap();" onfocus="this.blur()"><img src="<?=$outlogin_skin_path?>/img/scrap_button.gif" width="51" height="20" border="0"></a></td>-->
                    <td width="58" align="center"><a href="<?=$g4[bbs_path]?>/member_confirm.php?url=register_form.php" onfocus="this.blur()"><button>change info</button></a></td>
                    <td width="58" align="center"><a href="<?=$g4[bbs_path]?>/logout.php?url=<?=$urlencode?>" onfocus="this.blur()"><button>logout</button></a></td>
			   </tr>
               </table>
			</td>
        </tr>
        </table></td>
</tr>

<?
$my_menu = array();
$sql = "select m.bo_table, b.bo_subject from $g4[my_menu_table] as m left join $g4[board_table] as b on m.bo_table = b.bo_table where mb_id = '$member[mb_id]'";
$qry = sql_query($sql);
while ($row = sql_fetch_array($qry))
{
    $my_menu[] = $row;
}

if (count($my_menu) > 0) { 
?>

<script language="JavaScript">
function quick_move(bo_table)
{
    if (!bo_table) return;
    if (bo_table == 'menu-edit') {
        popup_window("<?=$g4[bbs_path]?>/my_menu_edit.php", "my_menu_edit", "width=350, height=400, scrollbars=1");
        return;
    }
    if (bo_table == 'mypage') {
        location.href = "<?=$g4[path]?>/customer/mypage.php";
        return;
    }
    location.href = "<?=$g4[bbs_path]?>/board.php?bo_table=" + bo_table;
}
</script>

<? } ?>

</table>
</td>
</tr>
</table>
<script language="JavaScript">
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave() 
{
    if (confirm("Do you want to un-register?")) 
            location.href = "<?=$g4[bbs_path]?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- 로그인 후 외부로그인 끝 -->
