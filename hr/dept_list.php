<?
$sub_menu = "900200";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

$sql_common = " from dept ";
$sql_order = " order by dept_no desc ";

$g4[title] = "Department Management";
include_once("./admin.head.php");

$sql = " select *
          $sql_common
          $sql_order
          ";
$result = sql_query($sql);


$colspan = 5;

?>

<script type="text/javascript" src="<?=$g4[path]?>/js/sideview.js"></script>
<script language="JavaScript">
var list_update_php = "member_list_update.php";
var list_delete_php = "member_list_delete.php";
</script>

<form name=fmemberlist method=post>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>

<table width=100% cellpadding=0 cellspacing=0>
<colgroup width=30>
<colgroup width=100>
<colgroup width=200>
<colgroup width=250>
<colgroup width=''>

<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
    <td><input type=checkbox name=chkall value='1' onclick='check_all(this.form)'></td>
    <td><?=subject_sort_link('dept_no')?>#</td>
    <td><?=subject_sort_link('dept_name')?>Department Name  </td>
    <td><?=subject_sort_link('dept_created')?>Created Date</td>
    <td>modify</td>
</tr>


<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<?
for ($i=0; $row=sql_fetch_array($result); $i++) {

    $list = $i%2;
    
    echo "
    <input type=hidden name=mb_id[$i] value='$row[mb_id]'>
    <tr class='list$list col1 ht center'>
        <td><input type=checkbox name=chk[] value='$row[dept_no]'></td>
        <td title='$row[mb_id]'><nobr style='display:block; overflow:hidden; width:90;'>&nbsp;$row[dept_no]</nobr></td>
        <td>$row[dept_name]</td>
        <td>$row[dept_created]</td>
        <td><a href='dept_list_form.php?w=u&dept_id=$row[dept_no]'><img src='img/icon_modify.gif' border=0 title='modify'></a></td>
    </tr>";
}

if ($i == 0)
    echo "<tr><td colspan='$colspan' align=center height=100 class=contentbg>no data.</td></tr>";

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";


echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr><td width=50%>";
echo "<input type=button class='btn1' value='create' onclick=\"btn_create()\">&nbsp;";
echo "<input type=button class='btn1' value='delete' onclick=\"btn_check(this.form, 'dept_delete')\">";
echo "</td>";
echo "<td width=50% align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script language='javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";

?>

<script>
// POST 방식으로 delete
function post_delete(action_url, val)
{
	var f = document.fpost;

	if(confirm("Do you want to make selected Employee resign?")) {
        f.mb_id.value = val;
		f.action      = action_url;
		f.submit();
	}
}

function btn_create(action_url){
	document.location.href='dept_list_form.php'
}


</script>

<form name='fpost' method='post' id='fpost'>
<input type='hidden' name='sst'   value='<?=$sst?>'>
<input type='hidden' name='sod'   value='<?=$sod?>'>
<input type='hidden' name='sfl'   value='<?=$sfl?>'>
<input type='hidden' name='stx'   value='<?=$stx?>'>
<input type='hidden' name='page'  value='<?=$page?>'>
<input type='hidden' name='token' value='<?=$token?>'>
<input type='hidden' name='mb_id'>
</form>

<?
include_once ("./admin.tail.php");
?>
