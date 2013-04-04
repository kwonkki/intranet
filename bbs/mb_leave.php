<?
include_once("./_common.php");

$g4[title] = "Member un-register";
include_once ("./_head.php");

// 비회원의 접근을 제한 합니다
if (!$member[mb_id]) {
    $msg = "After logging in, use this service";
    alert($msg, "./login.php?url=".urlencode("./mb_leave.php"));
}
?>
        
<style type="text/css">
<!--
.col1 { color:#616161; }
.col2 { color:#868686; }
.pad1 { padding:5px 10px 5px 10px; }
.pad2 { padding:5px 0px 5px 0px; }
.bold { font-weight:bold; }
.center { text-align:center; }
.right { text-align:right; }
.ht { height:30px; }
-->
</style>

<div style="width:620px">
<p class='col1 pad1 bold'>Member un-register</p>
</div>

<div style="width:620px" class='pad1'>
<p>You can't register with current ID</P>


</div>

<BR>

<form name='fconfigform' method='post' onsubmit="return fconfigform_submit(this);">
<input type=hidden name=token value='<?=$token?>'>

<table width=620 cellpadding=0 cellspacing=0 border=0>
<colgroup width=120 class='col1 pad1 bold right'>
<colgroup class='col2 pad2'>
<tr class='ht'>
<td>ID</td>
<td><input type=text class=ed name='mb_id' size='25' readonly value='<?=$member[mb_id]?>'></td>
</tr>
<tr class='ht'>
<td>Name</td>
<td><input type=text class=ed name='mb_name' size='25' itemname="이름" required></td>
</tr>
<tr class='ht'>
<td>PassWord</td>
<td><input type=password class=ed name='mb_password' size='25' itemname="비밀번호" required></td>
</tr>
<tr class='ht'>
<td>Reason for un-register</td>
<td><textarea class=ed name='leave_reason' rows='3' style='width:99%;'></textarea></td>
</tr>
<tr class='ht'>
    <td>
    <img id="zsfImg">
    </td>
    <td colspan=3>
        <input class='ed' type=input size=10 name=wr_key id=wr_key itemname="자동등록방지" required >&nbsp;&nbsp;Type the left character
    </td>
</tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  Confirm  '>

</form>

<script type="text/javascript" src="<?="$g4[path]/zmSpamFree/zmspamfree.js"?>"></script>
<script language="javascript">
function fconfigform_submit(f)
{
    if (typeof(f.wr_key) != 'undefined') {
        if (!checkFrm()) {
            alert ("Spam code is wrong");
            return false;
        }
    }

    f.action = "./mb_leave_update.php";
    return true;
}
</script>
<?
include_once ("./_tail.php");
?>
