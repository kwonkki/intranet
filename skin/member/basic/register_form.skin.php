<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<style type="text/css">
<!--
.m_title    { BACKGROUND-COLOR: #F7F7F7; PADDING-LEFT: 15px; PADDING-top: 5px; PADDING-BOTTOM: 5px; }
.m_padding  { PADDING-LEFT: 15px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px; }
.m_padding2 { PADDING-LEFT: 0px; PADDING-top: 5px; PADDING-BOTTOM: 0px; }
.m_padding3 { PADDING-LEFT: 0px; PADDING-top: 5px; PADDING-BOTTOM: 5px; }
.m_text     { BORDER: #D3D3D3 1px solid; HEIGHT: 18px; BACKGROUND-COLOR: #ffffff; }
.m_text2    { BORDER: #D3D3D3 1px solid; HEIGHT: 18px; BACKGROUND-COLOR: #dddddd; }
.m_textarea { BORDER: #D3D3D3 1px solid; BACKGROUND-COLOR: #ffffff; WIDTH: 100%; WORD-BREAK: break-all; }
.w_message  { font-family:돋움; font-size:9pt; color:#4B4B4B; }
.w_norobot  { font-family:돋움; font-size:9pt; color:#BB4681; }
.w_hand     { cursor:pointer; }
-->
</style>

<script>
var member_skin_path = "<?=$member_skin_path?>";
</script>

<script type="text/javascript" src="<?=$member_skin_path?>/jquery.ajax_register_form.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/md5.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/sideview.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?=$g4[path]?>/css/jquery-ui.css">

<form name=fregisterform id=fregisterform method=post onsubmit="return fregisterform_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w                id=w                   value="<?=$w?>">
<input type=hidden name=url              id=url                 value="<?=$urlencode?>">
<input type=hidden name=mb_jumin         id=mb_jumin            value="<?=$jumin?>">
<input type=hidden name=mb_id_enabled    id="mb_id_enabled"     value="" >
<input type=hidden name=mb_nick_enabled  id="mb_nick_enabled"   value="" >
<input type=hidden name=mb_email_enabled id="mb_email_enabled"  value="" >
<input type=hidden name=mb_name_enabled  id="mb_name_enabled"   value="" >
<input type=hidden name=ug_id            id="ug_id"             value="<?=$ug_id?>" >
<input type=hidden name=join_code        id="join_code"         value="<?=$join_code?>" >

<table width=600 cellspacing=0 align=center>
<tr>
    <td><img src="<?=$member_skin_path?>/img/join_form_title.gif" width="624" height="72">

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>User ID</TD>
            <TD class=m_padding>
                <input class=m_text maxlength=20 size=20 id='mb_id' name="mb_id" required style="ime-mode:disabled" value="<?=$member[mb_id]?>" <? if ($w=='u') { echo "readonly style='background-color:#dddddd;'"; } ?>
                    <? if ($w=='') { echo "onblur='reg_mb_id_check()'"; } ?>>
                <? if ($w=='') { ?>
                <span id='msg_mb_id'></span>
                <table height=25 cellspacing=0 cellpadding=0 border=0>
                <tr><td><font color="#66a2c8">※ at least 4 character.</font></td></tr>
                </table>
                <? } ?>
            </TD>
        </TR>
        
        <style type="text/css">
            /* 패스워드 미터 http://www.codeassembly.com/How-to-make-a-password-strength-meter-for-your-register-form */ 
            #barplus {position: relative; width: 300px;  display:block;} 
            #barplus #passwordStrength {position: absolute; top: 1px; left: 125px;} 
            #passwordStrength {position: relative; font-size: 1px; height:18px;} 
            .strength0,
            .strength1,
            .strength2,
            .strength3,
            .strength4,
            .strength5 {font-size:1px;position:absolute;top:0px;left:-120px;width:178px;height:16px;}
            .strength0 {background-image:url('<?=$member_skin_path?>/img/m1.gif');} /*매우부족*/ 
            .strength1 {background-image:url('<?=$member_skin_path?>/img/m2.gif');} /*조금부족*/ 
            .strength2 {background-image:url('<?=$member_skin_path?>/img/m3.gif');} /*보통수준*/
            .strength3 {background-image:url('<?=$member_skin_path?>/img/m4.gif');} /*양호수준*/
            .strength4 {background-image:url('<?=$member_skin_path?>/img/m5.gif');} /*좋습니다*/
            .strength5 {background-image:url('<?=$member_skin_path?>/img/m6.gif');} /*매우좋음*/
            .strength0t,
            .strength1t,
            .strength2t,
            .strength3t,
            .strength4t,
            .strength5t {font-weight:bold;letter-spacing:-2px;font-size:8pt;display:none;}

            .strength0t,
            .strength1t {color:#ff0066;}
            .strength2t,
            .strength3t {color:#77a80f;}
            .strength4t,
            .strength5t {color:#4ab3d6;}

            #passwordDescription {padding-left: 5px; display:block; } 
        </style>

        <script language="javascript">
        <!--
        function passwordStrength(password) { //이미지로 대체해서 글자는 나오지 않습니다.
                    var desc = new Array();
                    desc[0] = "<label class=\"strength0t\">매우부족</label>"; // 매우부족
                    desc[1] = "<label class=\"strength1t\">조금부족</label>"; // 조금부족
                    desc[2] = "<label class=\"strength2t\">보통수준</label>"; // 보통수준
                    desc[3] = "<label class=\"strength3t\">양호수준</label>"; // 양호수준
                    desc[4] = "<label class=\"strength4t\">좋습니다</label>"; // 좋습니다
                    desc[5] = "<label class=\"strength5t\">매우좋음</label>"; // 매우좋음
                    var score = 0;
                    
                    //if password length == 0, do nothing
                    if (password.length == 0) return;
                    //if password bigger than 6 give 1 point
                    if (password.length > 6) score++;
                    //if password has both lower and uppercase characters give 1 point 
                    if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;
                    //if password has at least one number give 1 point 
                    if (password.match(/\d+/)) score++; 
                    //if password has at least one special caracther give 1 point 
                    if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;
                    //if password bigger than 12 give another 1 point 
                    if (password.length > 12) score++; 
                    
                    //document.getElementById("passwordDescription").innerHTML = desc[score]; 
                    document.getElementById("passwordStrength").className = "strength" + score;
                }
        -->
        </script>

        <TR bgcolor="#FFFFFF">
           <TD class=m_title>password</TD>
           <TD class=m_padding>
           <div id="barplus"><INPUT class=m_text type=password name="mb_password" id="mb_password" style="ime-mode:disabled" size=20 maxlength=20 <?=($w=="")?"required":"";?> itemname="패스워드" onblur="passwordStrength(this.value)" ><div id="passwordStrength">&nbsp;</div></div>    
           </TD>
        </TR>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>password confirm</TD>
            <TD class=m_padding><INPUT class=m_text type=password name="mb_password_re" style="ime-mode:disabled" size=20 maxlength=20 <?=($w=="")?"required":"";?> itemname="패스워드 확인"></TD>
        </TR>
        </TABLE>
    </td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>name</TD>
            <TD class=m_padding>
                <input name=mb_name id=mb_name required itemname="이름" value="<?=$member[mb_name]?>" <?=$member[mb_name]?"readonly class=m_text2":"class=m_text";?>
                <? if ($w=='') { echo "onblur='reg_mb_name_check()'"; } ?>>

                <? if ($w=='') { ?>
                <span id='msg_mb_name'></span>
                <table height=25 cellspacing=0 cellpadding=0 border=0>
                <tr><td><font color="#66a2c8">※ no blank please.</font></td></tr>
                </table>
                <? } ?>
            </TD>
        </TR>

        <? if ($member[mb_nick_date] <= date("Y-m-d", $g4[server_time] - ($config[cf_nick_modify] * 86400))) { // 별명수정일이 지났다면 수정가능 ?>
        <input type=hidden name=mb_nick_default value='<?=$member[mb_nick]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>nickname</TD>
            <TD class='m_padding lh'>
                <input class=m_text type=text id='mb_nick' name='mb_nick' required hangulalphanumeric maxlength=20 value='<?=$member[mb_nick]?>'
                    onblur="reg_mb_nick_check();">
                <span id='msg_mb_nick'></span>
                <!--
                <br>공백없이 한글,영문,숫자만 입력 가능 (한글2자, 영문4자 이상)
                <br>별명을 바꾸시면 앞으로 <?=(int)$config[cf_nick_modify]?>일 이내에는 변경 할 수 없습니다.
                -->
            </TD>
        </TR>
        <? } else { ?>
        <input type=hidden name="mb_nick_default" value='<?=$member[mb_nick]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>nickname</TD>
            <?
            $d_times = (int)(($config[cf_nick_modify] * 86400 - ( $g4[server_time] - strtotime($member[mb_nick_date]))) / 86400) + 1;
            ?>
            <TD class='m_padding lh'><input name="mb_nick" value="<?=$member[mb_nick]?>" readonly> ※ After <?=$d_times?> days, you can change.
            </TD>
        </TR>
        <? } ?>
        <input type=hidden name=mb_mb_1_default value='<?=$member[mb_1]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>department</TD>
            <TD class='m_padding lh'>
            	<select name="mb_1">
            	<?
            	
            		$sql1 = " select dept_no, dept_name, dept_created from dept order by dept_no asc ";
            		$row1 = sql_query($sql1);
            		
            		for ($i=0; $data=sql_fetch_array($row1); $i++) {
            	
            	?>
            	
            		<option  <?php if ($data[dept_name]== $member[mb_1] ) echo 'selected="selected"';?>> <?=$data[dept_name]?></option>
            	<?
            		}
            	?>
            	</select>
             
            </TD>
        </TR>
        <input type=hidden name=mb_mb3_default value='<?=$member[mb_3]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>local/expat</TD>
            <TD class='m_padding lh'>
            	<select name="mb_3">
            		<option  <?php if ($member[mb_3]== "expat" ) echo 'selected="selected"';?>>expat</option>
            		<option <?php if ($member[mb_3]== "local" ) echo 'selected="selected"';?>>local</option>
            	</select>
            </TD>
        </TR>
        
        <input type=hidden name=mb_nick_default value='<?=$member[mb_2]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>job title</TD>
            <TD class='m_padding lh'>
                <input class=m_text type=text id='mb_2' name='mb_2' required maxlength=20 value='<?=$member[mb_2]?>' >
            </TD>
        </TR>
        
        <input type=hidden name=mb_working_start_default value='<?=$member[mb_4]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>working start</TD>
            <TD class='m_padding lh'>
                <input class=m_text type=text id='mb_4' name='mb_4' required maxlength=20 value='<?=$member[mb_4]?>' >
            </TD>
        </TR>
        <script>
		  $(function() {
		    $( "#mb_4" ).datepicker();
		  });
  		</script>
        
        </TR>
        <input type=hidden name=mb_nick_default value='<?=$member[mb_tel]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>Phone #</TD>
            <TD class='m_padding lh'>
                <input class=m_text type=text id='mb_tel' name='mb_tel' required maxlength=20 value='<?=$member[mb_tel]?>' >
            </TD>
        </TR>
        
        </TR>
        <input type=hidden name=mb_nick_default value='<?=$member[mb_hp]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>cell phone</TD>
            <TD class='m_padding lh'>
                <input class=m_text type=text id='mb_hp' name='mb_hp' required maxlength=20 value='<?=$member[mb_hp]?>' >
            </TD>
        </TR>

        <input type=hidden name='old_email' value='<?=$member[mb_email]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>E-mail</TD>
            <TD class='m_padding lh'>
                <input class=m_text type=text id='mb_email' name='mb_email' required style="ime-mode:disabled" size=38 maxlength=100 value='<?=$member[mb_email]?>'
                    onblur="reg_mb_email_check()">
                <span id='msg_mb_email'></span> 
                <!--
                <? if ($member[mb_email_certify]) echo "<br>" . cut_str($member[mb_email_certify],10,"") . "에 인증되었습니다." ?>
                <? if ($config[cf_use_email_certify]) { ?>
                    <? if ($w=='') { echo "<br>e-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; } ?>
                    <? if ($w=='u') { echo "<br>e-mail 주소를 변경하시면 다시 인증하셔야 합니다."; } ?>
                <? } ?>
                <? if ($w=='u')
                    if ($g4['email_certify_point'] || $config['cf_use_email_certify'])
                        echo "<br><a href='$g4[bbs_path]/email_re_certify.php' target=new>이메일인증하러 가기</a>를 누르시면 인증창이 열립니다.";
                ?>
                <br>아이디, 비밀번호 분실 시 본인확인용으로 사용되므로
                <br>유효한 이메일 계정으로 입력하시기 바랍니다.
                -->
            </TD>
        </TR>

        <? if ($w=="") { ?>
            <? if ($config[cf_use_birthdate]) { ?>
            <TR bgcolor="#FFFFFF">
                <TD class=m_title>생년월일</TD>
                <TD class=m_padding><input class=m_text type=text id=mb_birth name='mb_birth' size=8 maxlength=8 minlength=8 required numeric itemname='생년월일' value='<?=$member[mb_birth]?>' readonly title='옆의 달력 아이콘을 클릭하여 날짜를 입력하세요.'>
                    <a href="javascript:win_calendar('mb_birth', document.getElementById('mb_birth').value, '');"><img src='<?=$member_skin_path?>/img/calendar.gif' border=0 align=absmiddle title='달력 - 날짜를 선택하세요'></a></TD>
            </TR>
            <? } ?>
        <? } ?>

        <? if ($member[mb_sex]) { ?>
            <input type=hidden name=mb_sex value='<?=$member[mb_sex]?>'>
            <TR bgcolor="#FFFFFF">
                <TD class=m_title>성별</TD>
                <TD class=m_padding>
                    <? 
                    switch ($member[mb_sex]) {
                      case 'F' : echo "여자"; break;
                      case 'M' : echo "남자"; break;
                    }
                    ?>
                </td>
            </TR>
        <? } else { ?>
            <? if ($config[cf_use_sex]) { ?>
            <TR bgcolor="#FFFFFF">
                <TD class=m_title>성별</TD>
                <TD class=m_padding>
                    <select id=mb_sex name=mb_sex required itemname='성별'>
                    <option value=''>선택하세요
                    <option value='F'>여자
                    <option value='M'>남자
                    </select>
                    <script language="JavaScript">//document.getElementById('mb_sex').value='<?=$member[mb_sex]?>';</script>
                    </td>
            </TR>
            <? } ?>
        <? } ?>

        <? if ($config[cf_use_homepage]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>홈페이지</TD>
            <TD class=m_padding><input class=m_text type=text name='mb_homepage' size=38 maxlength=255 <?=$config[cf_req_homepage]?'required':'';?> itemname='홈페이지' value='<?=$member[mb_homepage]?>'></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_tel]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>전화번호</TD>
            <TD class=m_padding><input class=m_text type=text name='mb_tel' size=21 maxlength=20 <?=$config[cf_req_tel]?'required':'';?> itemname='전화번호' value='<?=$member[mb_tel]?>'></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_hp]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>핸드폰번호</TD>
            <? if ($config[cf_hp_certify] && $w=='u') { ?>
            <TD class='m_padding lh'> 
            <? 
            /*
            if ($member[mb_hp_certify_datetime] != '0000-00-00 00:00:00') { 
                echo "<span class='small' style='color:#ff3300;'>$member[mb_hp_certify_datetime] 에 인증하였습니다.</span><br>"; 
                echo "<input type='hidden' name='mb_hp_old' value='$member[mb_hp]'>"; 
            } 
            */
            ?> 
            <input class=m_text type=text name='mb_hp' size=21 maxlength=20 <?=$config[cf_req_hp]?'required':'';?> itemname='핸드폰번호' value='<?=$member[mb_hp]?>'>  
            <input type=button value='인증번호 전송' class='small' onclick="hp_certify(this.form);">  
              인증번호 : <input class=m_text type=text name='mb_hp_certify' size=6 maxlength=6> 6자리 숫자<br> 
            <span class=small style='color:blue;'> 
                핸드폰으로 전송된 인증번호를 입력 후 회원정보를 수정(확인 버튼)하시기 바랍니다.<br> 
            </span> 
            <script> 
            function hp_certify(f) { 
                var pattern = /^01[0-9][-]{0,1}[0-9]{3,4}[-]{0,1}[0-9]{4}$/; 
                if(!pattern.test(f.mb_hp.value)){  
                    alert("핸드폰 번호가 입력되지 않았거나 번호가 틀립니다.\n\n핸드폰 번호를 010-123-4567 또는 01012345678 과 같이 입력해 주십시오."); 
                    f.mb_hp.select(); 
                    f.mb_hp.focus(); 
                    return; 
                } 

                win_open("<?=$g4[sms_path]?>/hp_certify.php?hp="+f.mb_hp.value+"&token=<?=$token?>", "hiddenframe"); 
            } 
            </script> 
            </TD> 
            <? } else { ?>
            <TD class=m_padding><input class=m_text type=text name='mb_hp' size=21 maxlength=20 <?=$config[cf_req_hp]?'required':'';?> itemname='핸드폰번호' value='<?=$member[mb_hp]?>'></TD>
            <? } ?>    
        </TR>
        <? } ?>

        <? if ($config[cf_use_addr]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>주소</TD>
            <TD valign="middle" class=m_padding>
                <table width="330" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="25"><input class=m_text type=text name='mb_zip1' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 앞자리' value='<?=$member[mb_zip1]?>'>
                         - 
                        <input class=m_text type=text name='mb_zip2' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 뒷자리' value='<?=$member[mb_zip2]?>'>
                        &nbsp;<a href="javascript:;" onclick="win_zip('fregisterform', 'mb_zip1', 'mb_zip2', 'mb_addr1', 'mb_addr2');"><img width="91" height="20" src="<?=$member_skin_path?>/img/post_search_btn.gif" border=0 align=absmiddle></a></td>
                </tr>
                <tr>
                    <td height="25" colspan="2"><input class=m_text type=text name='mb_addr1' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='주소' value='<?=$member[mb_addr1]?>'></td>
                </tr>
                <tr>
                    <td height="25" colspan="2"><input class=m_text type=text name='mb_addr2' size=60 <?=$config[cf_req_addr]?'required':'';?> itemname='상세주소' value='<?=$member[mb_addr2]?>'></td>
                </tr>
                </table>
            </TD>
        </TR>
        <? } ?>

        </TABLE>
    </td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>

        <? if ($config[cf_use_signature]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>서명</TD>
            <TD class=m_padding><textarea name=mb_signature class=m_textarea rows=3 style='width:95%;' <?=$config[cf_req_signature]?'required':'';?> itemname='서명'><?=$member[mb_signature]?></textarea></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_profile]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>자기소개</TD>
            <TD class=m_padding><textarea name=mb_profile class=m_textarea rows=3 style='width:95%;' <?=$config[cf_req_profile]?'required':'';?> itemname='자기 소개'><?=$member[mb_profile]?></textarea></TD>
        </TR>
        <? } ?>

        <? if ($member[mb_level] >= $config[cf_icon_level]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>member Icon</TD>
            <TD class=m_padding><INPUT class=m_text type=file name='mb_icon' size=30>
                <table width="350" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class=m_padding3>* Image size would be(<?=$config[cf_member_icon_width]?>pixel)x(<?=$config[cf_member_icon_height]?>pixel) below.<br>&nbsp;&nbsp;(gif/jpg/bmp/png format available/ size:<?=number_format($config[cf_member_icon_size]/1000)?>k byte below available.)
                            <? if ($w == "u" && file_exists($mb_icon)) { ?>
                                <br><img src='<?=$mb_icon?>' align=absmiddle> <input type=checkbox name='del_mb_icon' value='1'>삭제
                            <? } ?>
                        </td>
                    </tr>
                </table></TD>
        </TR>
        <? } ?>
		<!--
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>emailing service</TD>
            <TD class=m_padding><input type=checkbox name=mb_mailling value='1' <?=($w=='' || $member[mb_mailling])?'checked':'';?>>Do you want to receive the email from bet-talk?</TD>
        </TR>
        -->
        <? if ($config[cf_use_hp]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>SMS 수신여부</TD>
            <TD class=m_padding><input type=checkbox name=mb_sms value='1' <?=($w=='' || $member[mb_sms])?'checked':'';?>>핸드폰 문자메세지를 받겠습니다.</TD>
        </TR>
        <? } ?>

        <? if ($config[cf_memo_realtime]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>실시간쪽지</TD>
            <TD class=m_padding>
            <input type=checkbox name=mb_realmemo value='1' <?=($w=='' || $member[mb_realmemo])?'checked':'';?>>실시간쪽지 사용
            <input type=checkbox name=mb_realmemo_sound value='1' <?=($w=='' || $member[mb_realmemo_sound])?'checked':'';?>>음성알림사용(실시간쪽지 사용시에만 동작함)
            </TD>
        </TR>
        <? } ?>
        
        <? if ($member[mb_open_date] <= date("Y-m-d", $g4[server_time] - ($config[cf_open_modify] * 86400)) || !$member['mb_open']) { // 정보공개 수정일이 지났다면 수정가능 ?>
       <!-- 	
        <input type=hidden name=mb_open_default value='<?=$member[mb_open]?>'>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>Open your Profile?</TD>
            <TD class=m_padding><input type=checkbox name=mb_open value='1' <?=($w=='' || $member[mb_open])?'checked':'';?>>Do you want to open your profile?
                <? if ($config[cf_open_modify]) { ?>
                <br>&nbsp;&nbsp;&nbsp;&nbsp; After change this, you cant change this within <?=(int)$config[cf_open_modify]?> days.</td>
                <? } ?>
                
        </TR>
        -->
        <? } else { ?>
        <input type=hidden name="mb_open" value="<?=$member[mb_open]?>">
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>Open your profile?</TD>
            <?
            $d_times = (int)(($config[cf_open_modify] * 86400 - ( $g4[server_time] - strtotime($member[mb_open_date]))) / 86400) + 1;
            if ($member[mb_open]) $msg="open"; else $msg = "not open";
            ?>
            <TD class='m_padding lh'>
            <?=$msg?>
            <!--
                현재 <?=$msg?> 상태이며, <?=$member[mb_open_date]?>일 정보를 수정했습니다.<br>
                정보공개는 수정후 <?=(int)$config[cf_open_modify]?>일 이내, <?=date("Y년 m월 j일", strtotime("$member[mb_open_date] 00:00:00") + ($config[cf_open_modify] * 86400))?> 까지는 변경이 안됩니다.<br> 
                이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다.
                --> 
            </td>
        </TR>
        <? } ?>

        <? if ($w == "" && $config[cf_use_recommend]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>추천인아이디</TD>
            <TD class=m_padding>
            <? if ($mb_recommend) { ?>
            <input type=hidden name=mb_recommend         id=mb_recommend            value="<?=$mb_recommend?>">
            <?=$mb_recommend?>
            <? } else { ?>
            <input type=text name=mb_recommend maxlength=20 size=20 <?=$config[cf_req_recommend]?'required':'';?> itemname='추천인아이디' class=m_text>
            <? } ?>
            <? if ($config[cf_recommend_point]) { ?>
                *추천 회원에게 <?=$config[cf_recommend_point]?> 포인트를 지급합니다.
            <? } ?>
            </TD>
        </TR>
        <? } else if ( $config[cf_use_recommend] && $member[mb_recommend]) {?>
        <TR bgcolor="#FFFFFF">
            <script type='text/javascript' src='<?=$g4[path]?>/js/sideview.js'></script>
            <? $mb=get_member($member['mb_recommend'], "mb_id, mb_nick")?>
            <TD width="160" class=m_title>추천인아이디</TD>
            <TD class=m_padding><?=get_sideview($mb['mb_id'], $mb['mb_nick'])?></TD>
        </TR>
        <? } ?>

        <? if ($w == "u") { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>registration date</TD>
            <TD class=m_padding><?=$member[mb_datetime]?></TD>
        </TR>
        <? } ?>

        </TABLE>
    </td>
</tr>
</table>

<? if ($config[cf_use_norobot]) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>
        <TR bgcolor="#FFFFFF">
            <td width="160" height="28" class=m_title>
                <script type="text/javascript" src="<?="$g4[path]/zmSpamFree/zmspamfree.js"?>"></script>
                <img id="zsfImg">
            </td>
            <td class=m_padding>
                <input class='ed' type=input size=10 name=wr_key id=wr_key itemname="자동등록방지" required >&nbsp;&nbsp;Please input the left character.
            </td>
        </tr>
        </table>
    </td>
</tr>
</table>
<? } ?>

<p align=center> 
    <INPUT type=image width="66" height="20" src="<?=$member_skin_path?>/img/join_ok_btn.gif" border=0 accesskey='s'> 
    <? if ($is_member) { ?> 
    <a href="javascript:member_leave();"><img src="<?=$member_skin_path?>/img/leave_btn.gif" border=0 align=right></a> 
    <? } ?> 
</td></tr> 
</table> 

</form> 

<script type="text/javascript">
$(document).ready(function(){
    if ($('#w').val() == '')
        $('#mb_id').focus();
    else {
        $('#mb_password').focus();
    }
});

// submit 최종 폼체크
function fregisterform_submit(f) 
{
    // 회원아이디 검사
    if (f.w.value == "") {

        reg_mb_id_check();

        if (f.mb_id_enabled.value != '000') {
            alert('pleae check your member id.');
            f.mb_id.focus();
            return false;
        }
    }

    if (f.w.value == '') {
        if ($.trim(f.mb_password.value).length < 3) {
            alert('pleae type the more than 3 characters.');
            f.mb_password.focus();
            return false;
        }
    }

    if (f.mb_password.value != f.mb_password_re.value) {
        alert('password not same.');
        f.mb_password_re.focus();
        return false;
    }

    if ($.trim(f.mb_password.value).length > 0) {
        if ($.trim(f.mb_password_re.value).length < 3) {
            alert('pleae type the more than 3 characters.');
            f.mb_password_re.focus();
            return false;
        }
    }

    // 이름 검사
    if (f.w.value == "") {

        reg_mb_name_check();

        if (f.mb_name_enabled.value != '000') {
            alert('please check your name.');
            f.mb_name.focus();
            return false;
        }
    }

    // 별명 검사
    if ((f.w.value == "") ||
        (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {

        reg_mb_nick_check();

        if (f.mb_nick_enabled.value != '000') {
            alert('please check your nickname.');
            f.mb_nick.focus();
            return false;
        }
    }

    // E-mail 검사
    if ((f.w.value == "") ||
        (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {

        reg_mb_email_check();

        if (f.mb_email_enabled.value != '000') {
            alert('please check your E-mail format.');
            f.mb_email.focus();
            return false;
        }
    }

    if (typeof(f.mb_birth) != 'undefined') {
        if ($.trim(f.mb_birth.value).length < 1) {
            alert('please input the your birthday.');
            //f.mb_birth.focus();
            return false;
        }

        var todays = <?=date("Ymd", $g4['server_time']);?>;
        // 오늘날짜에서 생일을 빼고 거기서 140000 을 뺀다.
        // 결과가 0 이상의 양수이면 만 14세가 지난것임
        var n = todays - parseInt(f.mb_birth.value) - 140000;
        if (n < 0) {
            alert("만 14세가 지나지 않은 어린이는 정보통신망 이용촉진 및 정보보호 등에 관한 법률\n\n제 31조 1항의 규정에 의하여 법정대리인의 동의를 얻어야 하므로\n\n법정대리인의 이름과 연락처를 '자기소개'란에 별도로 입력하시기 바랍니다.");
            return false;
        }
    }

    if (typeof(f.mb_sex) != 'undefined') {
        if (f.mb_sex.value == '') {
            alert('please choose your sex.');
            f.mb_sex.focus();
            return false;
        }
    }

    if (typeof f.mb_icon != 'undefined') {
        if (f.mb_icon.value) {
            if (!f.mb_icon.value.toLowerCase().match(/.(gif|bmp|jpg|png)$/i)) {
                alert('member icon would be gif|jpg|bmp|png.');
                f.mb_icon.focus();
                return false;
            }
        }
    }

    if (typeof(f.mb_recommend) != 'undefined') {
        if (f.mb_id.value == f.mb_recommend.value) {
            alert('you are not allowed to refer yourself.');
            f.mb_recommend.focus();
            return false;
        }
    }

    if (typeof(f.wr_key) != 'undefined') {
        if (!checkFrm()) {
            alert ("Captcha Code wrong.");
            return false;
        }
    }

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/register_form_update.php';";
    else
        echo "f.action = './register_form_update.php';";
    ?>

    // 보안인증관련 코드로 반드시 포함되어야 합니다.
    set_cookie("<?=md5($token)?>", "<?=base64_encode($token)?>", 1, "<?=$g4['cookie_domain']?>");

    return true;
}

// 회원 탈퇴 
function member_leave() 
{ 
    if (confirm("Do you want to un-register?")) 
            location.href = "<?=$g4[bbs_path]?>/mb_leave.php"; 
}
</script>
