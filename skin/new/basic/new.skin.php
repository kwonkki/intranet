<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<style>
.n_title1 { font-family:돋움; font-size:9pt; color:#FFFFFF; }
.n_title2 { font-family:돋움; font-size:9pt; color:#5E5E5E; }
</style>

</style>

<? if ($is_admin) { ?>
<script type="text/javascript">
function all_checked(sw) {  //ssh
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function select_new_batch(sw){////ssh06-04-12
    var f = document.fboardlist;
    str = "delete";
    f.sw.value = sw;
    //f.target = "hiddenframe";

    if (!confirm("Do you want to delete?"))
        return;

    f.action = "<?=$g4[admin_path]?>/ssh_delete_spam.php";
    f.submit();
}
</script>
<? } ?>

<!-- 분류 시작 -->
<form name=fnew method=get style="margin:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height=30>
        <?=$group_select?>
        <select id=view_type name=view_type onchange="select_change()">
            <option value=''>article
            <option value='c'>comment
            <option value='a'>all
        </select>
        &nbsp;<b>member id : </b>
        <input type=text class=ed id='mb_id' name='mb_id' value='<?=$mb_id?>'>
        <input type=submit value='search'>

        <?  if ($is_admin) { ?>
            <INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox>All&nbsp;&nbsp;
            <a href="javascript:select_new_batch('d');">Delete</a>&nbsp;&nbsp;
        <? } ?>

        <script type="text/javascript">
        function select_change()
        {
            var f = document.fnew;

            f.action = "<?=$g4[bbs_path]?>/new.php";
            f.submit();
        }
        document.getElementById("gr_id").value = "<?=$gr_id?>";
        document.getElementById("view_type").value = "<?=$view_type?>";
        </script>
    </td>
</tr>
</table>
</form>
<!-- 분류 끝 -->

<form name="fboardlist" method="post" style="margin:0px;">
<input type="hidden" name="sw"   value="">	
<input type="hidden" name="gr_id"   value="<?=$gr_id?>">	
<input type="hidden" name="view"   value="<?=$view_type?>">	
<input type="hidden" name="mb_id"   value="<?=$mb_id?>">	

<!-- 제목 시작 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height=2 bgcolor="#0A7299"></td>
    <td bgcolor="#0A7299"></td>
    <td bgcolor="#0A7299"></td>
    <td bgcolor="#A4B510"></td>
    <td bgcolor="#A4B510"></td>
</tr>
<tr height=28 align=center> 
    <td width="100" align="center">group</td>
    <td width="100" align="center">bbs</td>
    <td width="">title</td>
    <td width="110" align="center">writer</td>
    <td width="40" align="center">date</td>
</tr>
<tr><td colspan=5 height=3 style="background:url(<?=$new_skin_path?>/img/title_bg.gif) repeat-x;"></td></tr>

<?
for ($i=0; $i<count($list); $i++) 
{
    $gr_subject = cut_str($list[$i][gr_subject], 10);
    $bo_subject = cut_str($list[$i][bo_subject], 10);
    $wr_subject = get_text(cut_str($list[$i][wr_subject], 40));

    echo <<<HEREDOC
<tr> 
    <td align="center" height="30"><a href='./new.php?gr_id={$list[$i][gr_id]}'>{$gr_subject}</a></td>
    <td align="center"><a href='./new.php?bo_table_search={$list[$i][bo_table]}'>{$bo_subject}</a></td>
    <td width="">
HEREDOC;

    if ($is_admin) {
      if ($list[$i][comment])
          echo "<input type=checkbox name=chk_wr_id[] value='{$list[$i][comment_id]}|{$list[$i][bo_table]}'>";
      else
          echo "<input type=checkbox name=chk_wr_id[] value='{$list[$i][wr_id]}|{$list[$i][bo_table]}'>";
    }

    echo <<<HEREDOC2
    &nbsp;<a href='{$list[$i][href]}'>{$list[$i][comment]}{$wr_subject}</a>
    </td>
    <td align="center">{$list[$i][name]}</td>
    <td align="center">{$list[$i][datetime2]}</td>
</tr>
<tr>
    <td colspan="5" height="1" background="{$new_skin_path}/img/dot_bg.gif"></td>
</tr>
HEREDOC2;
}
?>

<? if ($i == 0) { ?>
<tr><td colspan="5" height=50 align=center>no data.</td></tr>
<? } ?>
<tr>
    <td colspan="5" height="30" align="center"><?=$write_pages?></td>
</tr>
<tr>
    <td colspan="4" height="30" align="left">
    <a href="./new.php?page=<?=$page?>"><img src="<?=$new_skin_path?>/img/btn_list.gif" border="0"></a>

    </td>
</tr>
</table>
</form>
