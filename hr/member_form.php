<?
$sub_menu = "900000";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

if ($w == "") 
{
    $required_mb_id = "required minlength=3 alphanumericunderline itemname='member id'";
    $required_mb_password = "required itemname='password'";

    $mb[mb_mailling] = 1;
    $mb[mb_open] = 1;
    $mb[mb_level] = $config[cf_register_level];
    $html_title = "register";
}
else if ($w == "u") 
{
    $mb = get_member($mb_id);
    if (!$mb[mb_id])
        alert("no emp data."); 

    if ($is_admin != 'super' && $mb[mb_level] >= $member[mb_level])
        alert("you cant change higher emp.");

    $required_mb_id = "readonly style='background-color:#dddddd;'";
    $required_mb_password = "";
    $html_title = "update";

    $mb[mb_email]       = get_text($mb[mb_email]);
    $mb[mb_homepage]    = get_text($mb[mb_homepage]);
    $mb[mb_birth]       = get_text($mb[mb_birth]);
    $mb[mb_tel]         = get_text($mb[mb_tel]);
    $mb[mb_hp]          = get_text($mb[mb_hp]);
    $mb[mb_addr1]       = get_text($mb[mb_addr1]);
    $mb[mb_addr2]       = get_text($mb[mb_addr2]);
    $mb[mb_signature]   = get_text($mb[mb_signature]);
    $mb[mb_recommend]   = get_text($mb[mb_recommend]);
    $mb[mb_profile]     = get_text($mb[mb_profile]);
    $mb[mb_1]           = get_text($mb[mb_1]);
    $mb[mb_2]           = get_text($mb[mb_2]);
    $mb[mb_3]           = get_text($mb[mb_3]);
    $mb[mb_4]           = get_text($mb[mb_4]);
    $mb[mb_5]           = get_text($mb[mb_5]);
    $mb[mb_6]           = get_text($mb[mb_6]);
    $mb[mb_7]           = get_text($mb[mb_7]);
    $mb[mb_8]           = get_text($mb[mb_8]);
    $mb[mb_9]           = get_text($mb[mb_9]);
    $mb[mb_10]          = get_text($mb[mb_10]);
} 
else 
    alert("parameter error.");

if ($mb[mb_mailling]) $mailling_checked = "checked"; // 메일 수신
if ($mb[mb_sms])      $sms_checked = "checked"; // SMS 수신
if ($mb[mb_open])     $open_checked = "checked"; // 정보 공개

$g4[title] = "Employee Information " . $html_title;
include_once("./admin.head.php");
?>

<script type="text/javascript" src="<?=$g4[path]?>/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?=$g4[path]?>/css/jquery-ui.css">

<table width=100% align=center cellpadding=0 cellspacing=0>
<form name=fmember method=post onsubmit="return fmember_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w     value='<?=$w?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<tr>
    <td colspan=4 class=title align=left><img src='<?=$g4[hr_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>ID</td>
    <td>
        <input type=text class=ed name='mb_id' size=20 maxlength=20 minlength=2 <?=$required_mb_id?> itemname='id' value='<? echo $mb[mb_id] ?>'>
    </td>
    <td>PW</td>
    <td><input type=password class=ed name='mb_password' size=20 maxlength=20 <?=$required_mb_password?> itemname='암호'></td>
</tr>
<tr class='ht'>
    <td>Name</td>
    <td><input type=text class=ed name='mb_name' maxlength=20 minlength=2 required itemname='이름(실명)' value='<? echo $mb[mb_name] ?>'></td>
    <td>Nick Name</td>
    <td><input type=text class=ed name='mb_nick' maxlength=20 minlength=2 required itemname='별명' value='<? echo $mb[mb_nick] ?>'> <? if ($mb['mb_nick_date'] && $mb['mb_nick_date']!="0000-00-00") { ?>(<?=$mb['mb_nick_date']?>)<? } ?></td>
</tr>
<tr class='ht'>
    <td>Level</td>
    <td><?=get_member_level_select("mb_level", 1, $member[mb_level], $mb[mb_level])?></td>
    <td></td>
    <td></td>
</tr>
<tr class='ht'>
    <td>E-mail</td>
    <td><input type=text class=ed name='mb_email' size=40 maxlength=100 required email itemname='e-mail' value='<? echo $mb[mb_email] ?>'></td>
    <td></td>
    <td></td>
</tr>
<tr class='ht'>
    <td>Phone #</td>
    <td><input type=text class=ed name='mb_tel' maxlength=20 itemname='전화번호' value='<? echo $mb[mb_tel] ?>'></td>
    <td>CellPhone</td>
    <td><input type=text class=ed name='mb_hp' maxlength=20 itemname='핸드폰번호' value='<? echo $mb[mb_hp] ?>'></td>
</tr>
<tr class='ht'>
    <td>Address</td>
    <td>
        <br><input type=text class=ed name='mb_addr2' size=25 itemname='상세주소' value='<? echo $mb[mb_addr2] ?>'></td>
    <td></td>
    <td colspan=3>
    </td>
</tr>
<tr class='ht'>
    <td>Birthday</td>
    <td><input type=text class=ed name=mb_birth size=9 maxlength=8 value='<? echo $mb[mb_birth] ?>'></td>
    <td></td>
    <td></td>
</tr>
<tr class='ht'>
    <td>memo</td>
    <td colspan=3><textarea class=ed name=mb_memo rows=5 style='width:99%; word-break:break-all;'><? echo $mb[mb_memo] ?></textarea></td>
</tr>

<? if ($w == "u") { ?>
<tr class='ht'>
    <td>Registration date</td>
    <td><?=$mb[mb_datetime]?></td>
    <td>Last access</td>
    <td><?=$mb[mb_today_login]?></td>
</tr>
<tr class='ht'>
    <td>IP</td>
    <td><?=$mb[mb_ip]?></td>
    
    <? if ($config[cf_use_email_certify]) { ?>
    <td>인증일시</td>
    <td><?=$mb[mb_email_certify]?> 
        <? if ($mb[mb_email_certify] == "0000-00-00 00:00:00") { echo "<input type=checkbox name=passive_certify>수동인증"; } ?></td>
    <? } else { ?>
    <td></td>
    <td></td>
    <? } ?>

</tr>
<? } ?>

<? if ($config[cf_use_recommend]) { // 추천인 사용 ?>
<tr class='ht'>
    <td>추천인</td>
    <td colspan=3><?=($mb[mb_recommend] ? get_text($mb[mb_recommend]) : "없음"); // 081022 : CSRF 보안 결함으로 인한 코드 수정 ?></td>
</tr>
<? } ?>

<tr class='ht'>
    <td>Resign Date</td>
    <td><input type=text class=ed name=mb_leave_date size=9 maxlength=8 value='<? echo $mb[mb_leave_date] ?>'></td>
    <td></td>
    <td></td>
</tr>

<tr class='ht'>
    <td>department </td>
    <td>
    
    	<select name="mb_1">
    	<?php
			$sql1 = " select dept_no, dept_name, dept_created from dept order by dept_no asc  ";
    		$row1 = sql_query($sql1);
    		
    		for ($i=0; $data=sql_fetch_array($row1); $i++) {
    	?>
    		<option value='<?=$data[dept_name]?>' <?php if ($data[dept_name]== $mb[mb_1] ) echo 'selected="selected"';?>> <?=$data[dept_name]?></option>
        <?
    		}
    	?>
    	</select>
    </td>
    <td>job title</td>
    <td><input type=text class=ed style='width:99%;' name='mb_2' maxlength=255 value='<?=$mb["mb_2"]?>'></td>
</tr>
<tr class='ht'>
    <td>local/expat</td>
    <td>
    	<select name="mb_3" >
			<option value="local" <?php if ($mb["mb_3"] == "local" ) echo 'selected="selected"';?>>local</option>
			<option value="expat" <?php if ($mb["mb_3"] == "expat" ) echo 'selected="selected"';?>>expat</option>
		</select>
    </td>
    <td>working start</td>
    <td><?=$mb["mb_4"]?></td>
</tr>
<tr class='ht'>
    <td>reguralizatoin date</td>
    <td>
		<input type=text class=ed id="mb_5" name='mb_5' maxlength=20 itemname='reguralization date' value='<? echo $mb[mb_5] ?>' <? if($mb[mb_5] != "" ) echo "disabled=disabled";  ?>  >
    </td>
    
    <script>
	  $(function() {
	    $( "#mb_5" ).datepicker();
	  });
	</script>
  		
    <td>field 6</td>
    <td><?=$mb["mb_6"]?></td>
</tr>

<? for ($i=7; $i<=10; $i=$i+2) { $k=$i+1; ?>
<tr class='ht'>
    <td>field <?=$i?></td>
    <td><input type=text class=ed style='width:99%;' name='mb_<?=$i?>' maxlength=255 value='<?=$mb["mb_$i"]?>'></td>
    <td>field <?=$k?></td>
    <td><input type=text class=ed style='width:99%;' name='mb_<?=$k?>' maxlength=255 value='<?=$mb["mb_$k"]?>'></td>
</tr>
<? } ?>

<tr class='ht'>
    <td colspan=4 align=left>
        <?=subtitle("XSS / CSRF")?>
    </td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>
Admin Password
    </td>
    <td colspan=3>
        <input class='ed' type='password' name='admin_password' itemname="관리자 패스워드" required>
        <?=help("For the security reason, please type the admin password again.");?>
    </td>
</tr>
<tr><td colspan=4 class=line2></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  O K  '>&nbsp;
    <input type=button class=btn1 value='  LIST  ' onclick="document.location.href='./member_list.php?<?=$qstr?>';">&nbsp;
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  DELETE  ' onclick="post_delete('./member_delete.php','<?=$mb[mb_id]?>');">&nbsp;
    <? } ?>
</form>

<script type='text/javascript'>
if (document.fmember.w.value == "")
    document.fmember.mb_id.focus();
else if (document.fmember.w.value == "u")
    document.fmember.mb_password.focus();

if (typeof(document.fmember.mb_level) != "undefined") 
    document.fmember.mb_level.value   = "<?=$mb[mb_level]?>"; 

function fmember_submit(f)
{


    f.action = './member_form_update.php';
    return true;
}
</script>

<script>
// POST 방식으로 삭제
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
<input type='hidden' name='w'     value='d'>
<input type='hidden' name='mb_id'>
<input type='hidden' name='admin_password'>
</form>

<?
include_once("./admin.tail.php");
?>
