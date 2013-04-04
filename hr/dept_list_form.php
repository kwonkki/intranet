<?
$sub_menu = "900200";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

$g4[title] = "Department Form";
include_once("./admin.head.php");



if( $w != '' && $_GET['dept_id'] != ''){
	
	
	$dept_id = $_GET['dept_id'];
	
	
	$sql = " select dept_no, dept_name, dept_created from dept where dept_no = '$dept_id' ";
	
	$row = sql_fetch($sql);
	
}



?>



<table width=100% align=center cellpadding=0 cellspacing=0>
<form name=fdepartment method=post onsubmit="return fdepartment_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w     value='<?=$w?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>
<input type=hidden name=dept_id value='<?=$dept_id?>'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<tr>
    <td colspan=4 class=title align=left><img src='<?=$g4[hr_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>Department Name</td>
    <td>
        <input type=text class=ed name='mb_department' size=20 maxlength=20 minlength=2  itemname='department' value='<?=$row[dept_name]?>'>
    </td>
    <td></td>
    <td></td>
</tr>

<tr><td colspan=4 class=line1></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  O K  '>&nbsp;
    <input type=button class=btn1 value='  LIST  ' onclick="document.location.href='./dept_list.php?<?=$qstr?>';">&nbsp;
    <!--
    <? if ($w != '' ) { ?>
    <input type=button class=btn1 value='  DELETE  ' onclick="post_delete('./member_delete.php','<?=$mb[mb_id]?>');">&nbsp;
    <? } ?>
    -->
</form>


<script>
// POST 방식으로 삭제
function fdepartment_submit(f){
	
	
	f.action = 'dept_list_update.php';
	
	console.log(f.action);
	
	f.submit();
	
	
	return false;

	
	
}



function post_delete(action_url, val)
{
	var f = document.fpost;

	if(confirm("Do you want to make selected user resign?")) {
    f.mb_id.value = val;
    f.admin_password.value = document.fmember.admin_password.value;
		f.action         = action_url;
		f.submit();
	}
}
</script>

<form name='fpost' method='post'>
<input type='hidden' name='sst'   value='<?=$sst?>'>
<input type='hidden' name='sod'   value='<?=$sod?>'>
<input type='hidden' name='sfl'   value='<?=$sfl?>'>
<input type='hidden' name='stx'   value='<?=$stx?>'>
<input type='hidden' name='page'  value='<?=$page?>'>
<input type='hidden' name='token' value='<?=$token?>'>
<input type='hidden' name='w'     value='<?=$w?>'>
<input type='hidden' name='mb_id'>
<input type='hidden' name='admin_password'>
</form>


<?
include_once ("./admin.tail.php");
?>
