﻿<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if(!$write[wr_link1]) $write[wr_link1] = date("Ymd");
?>
<link rel="stylesheet" href="<?=$board_skin_path?>/style.css" type="text/css">

<script language="JavaScript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<form name="fwrite" method="post" action="javascript:fwrite_check(document.fwrite);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=null>
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td align=center>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
    <td align=center class="bbs_head">
		<span class=" bbs_fhead">글 쓰 기</span>
	</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<? if ($is_name) { ?>
<tr> 
    <td width="125" height="30" class="bbs_pl">
		이 름
	</td>
    <td>
		<INPUT class=bbs_ft maxLength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>">
	</td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<? } ?>


<? if ($is_password) { ?>
<tr> 
    <td height="30" class="bbs_pl">
		패스워드
	</td>
    <td>
		<INPUT class=bbs_ft type=password maxLength=20 size=15 name=wr_password itemname="패스워드" <?=$password_required?>>
	</td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr> 
    <td height="30" class="bbs_pl">
		이메일
	</td>
    <td>
		<INPUT class=bbs_ft maxLength=100 size=50 name=wr_email email itemname="이메일" value="<?=$email?>">
	</td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<? } ?>

<? if ($is_homepage) { ?>
<tr> 
    <td height="30" class="bbs_pl">
		홈페이지
	</td>
    <td>
		<INPUT class=bbs_ft size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>">
	</td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<? } ?>
<tr>
    <td height="30" class="bbs_pl">
		날 짜
	</td>
	<td>
			<input class=bbs_ft type=text id="indate" name='wr_link1' size=8 maxlength=8 minlength=8 required numeric itemname='날짜' value="<?=$write[wr_link1]?>" readonly title="옆의 달력 아이콘을 클릭하여 날짜를 입력하세요.">
			<a href="javascript:win_calendar('indate', document.getElementById('indate').value, '');">
			<img src="<?=$board_skin_path?>/img/calendar.gif" border="0" align="absmiddle" title="날짜를 선택하세요"></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>

<tr> 
    <td height="30" class="bbs_pl">
		옵 션
	</td>
    <td>
        <? if ($is_html) { ?>
			<INPUT onclick="html_auto_br(this);" type=checkbox value="<?=$html_value?>" name="html" <?=$html_checked?>>HTML&nbsp;
		<? } ?>
        <? if ($is_secret) { ?>
			<INPUT type=checkbox value="secret" name="secret" <?=$secret_checked?>>비밀글&nbsp;
		<? } ?>
        <INPUT type=checkbox value="mail" name="mail" <?=$recv_email_checked?>>답변메일받기&nbsp;
	</td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>

<tr> 
    <td height="30" class="bbs_pl">
		행 사 명
	</td>
    <td>
		<INPUT class=bbs_ft style="width:100%;" name=wr_subject itemname="제목" required value="<?=$subject?>">
	</td>
</tr>
<tr> 
    <td height="30" class="bbs_pl">
		주 관
	</td>
    <td><input class="ed" style="width:100%;" name="wr_5" id="wr_5" itemname="내용" value="<?=$wr_5?>" /></td>
</tr>
<tr> 
    <td height="30" class="bbs_pl">
		시 간
	</td>
    <td><select name='wr_6' itemname='시간'>
      <option value=''></option>
      <option value='07:00' <? if($wr_6 == "07:00") echo "selected"; ?>>07:00</option>
      <option value='07:30' <? if($wr_6 == "07:30") echo "selected"; ?>>07:30</option>
      <option value='08:00' <? if($wr_6 == "08:00") echo "selected"; ?>>08:00</option>
      <option value='08:30' <? if($wr_6 == "08:30") echo "selected"; ?>>08:30</option>
      <option value='09:00' <? if($wr_6 == "09:00") echo "selected"; ?>>09:00</option>
      <option value='09:30' <? if($wr_6 == "09:30") echo "selected"; ?>>09:30</option>
      <option value='10:00' <? if($wr_6 == "10:00") echo "selected"; ?>>10:00</option>
      <option value='10:30' <? if($wr_6 == "10:30") echo "selected"; ?>>10:30</option>
      <option value='11:00' <? if($wr_6 == "11:00") echo "selected"; ?>>11:00</option>
      <option value='11:30' <? if($wr_6 == "11:30") echo "selected"; ?>>11:30</option>
      <option value='12:00' <? if($wr_6 == "12:00") echo "selected"; ?>>12:00</option>
      <option value='12:30' <? if($wr_6 == "12:30") echo "selected"; ?>>12:30</option>
      <option value='13:00' <? if($wr_6 == "13:00") echo "selected"; ?>>13:00</option>
      <option value='13:30' <? if($wr_6 == "13:30") echo "selected"; ?>>13:30</option>
      <option value='14:00' <? if($wr_6 == "14:00") echo "selected"; ?>>14:00</option>
      <option value='14:30' <? if($wr_6 == "14:30") echo "selected"; ?>>14:30</option>
      <option value='15:00' <? if($wr_6 == "15:00") echo "selected"; ?>>15:00</option>
      <option value='15:30' <? if($wr_6 == "15:30") echo "selected"; ?>>15:30</option>
      <option value='16:00' <? if($wr_6 == "16:00") echo "selected"; ?>>16:00</option>
      <option value='16:30' <? if($wr_6 == "16:30") echo "selected"; ?>>16:30</option>
      <option value='17:00' <? if($wr_6 == "17:00") echo "selected"; ?>>17:00</option>
      <option value='17:30' <? if($wr_6 == "17:30") echo "selected"; ?>>17:30</option>
      <option value='18:00' <? if($wr_6 == "18:00") echo "selected"; ?>>18:00</option>
      <option value='18:30' <? if($wr_6 == "18:30") echo "selected"; ?>>18:30</option>
      <option value='19:00' <? if($wr_6 == "19:00") echo "selected"; ?>>19:00</option>
      <option value='19:30' <? if($wr_6 == "19:30") echo "selected"; ?>>19:30</option>
      <option value='20:00' <? if($wr_6 == "20:00") echo "selected"; ?>>20:00</option>
      <option value='20:30' <? if($wr_6 == "20:30") echo "selected"; ?>>20:30</option>
      <option value='21:00' <? if($wr_6 == "21:00") echo "selected"; ?>>21:00</option>
      <option value='21:30' <? if($wr_6 == "21:30") echo "selected"; ?>>21:30</option>
    </select></td>
</tr>
<tr> 
    <td height="30" class="bbs_pl">
		장 소
	</td>
    <td><input class="ed" style="width:100%;" name="wr_7" id="wr_7" itemname="내용" value="<?=$wr_7?>" /></td>
</tr>
<tr> 
    <td height="30" class="bbs_pl">
		연락처
	</td>
    <td><input class="ed" style="width:100%;" name="wr_8" id="wr_8" itemname="내용" value="<?=$wr_8?>" /></td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<tr> 
    <td class="bbs_pl bbs_pt" valign=top>
		내 용<br><br>
        <SPAN class="bbs_point" onclick="textarea_decrease('wr_content', 10);">
		<img src="<?=$board_skin_path?>/img/write_up.gif" align="absmiddle">
		</SPAN>
        <SPAN class="bbs_point" onclick="textarea_original('wr_content', 10);">
		<img src="<?=$board_skin_path?>/img/write_start.gif" align="absmiddle">
		</SPAN>
        <SPAN class="bbs_point" onclick="textarea_increase('wr_content', 10);">
		<img src="<?=$board_skin_path?>/img/write_down.gif" align="absmiddle">
		</SPAN>
		<br>

		<? if ($write_min || $write_max) { ?><span id=char_count></span>글자<?}?>
    </td>
    <td class="bbs_pt">
		<TEXTAREA id=wr_content class=bbs_fa name=wr_content rows=10 itemname="내용" <? if ($write_min || $write_max) { ?>ONKEYUP="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></TEXTAREA>
		<? if ($write_min || $write_max) { ?><script language="JavaScript"> check_byte('wr_content', 'char_count'); </script><?}?>
	</td>
</tr>
<tr><td colspan=2 height=10></td></tr>
<tr><td colspan=2 class=bbs_line1></td></tr>

<? if ($is_link) { ?>
<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
<tr> 
    <td height="30" class="bbs_pl">
		링크 #<?=$i?>
	</td>
    <td>
		<INPUT type='text' class=bbs_ft size=50 name='wr_link<?=$i?>' itemname='링크 #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'>
	</td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<? } ?>
<? } ?>


<? if ($is_file) { ?>
<tr> 
    <td height="30" class="bbs_pl bbs_pt" valign=top>
		파일&nbsp;&nbsp;
		<span class="bbs_point" onclick="add_file();"><img src="<?=$board_skin_path?>/img/file_pl.gif" border=0 align="absmiddle" width="13" height="13"></span>
		<span class="bbs_point" onclick="del_file();"><img src="<?=$board_skin_path?>/img/file_mi.gif" border=0 align="absmiddle" width="13" height="13"></span>

	</td>
    <td class="bbs_pt" valign=top>
		<table id="variableFiles" cellpadding=0 cellspacing=0></table>
		<?// print_r2($file); ?>
    </td>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>

<script language="JavaScript">
function add_file(delete_code) {
	var objTbl;
	var objRow;
	var objCell;
	if (document.getElementById)
		objTbl = document.getElementById("variableFiles");
	else
		objTbl = document.all["variableFiles"];

	objRow = objTbl.insertRow(objTbl.rows.length);
	objCell = objRow.insertCell(0);

	objCell.innerHTML = "<input type='file' class='bbs_ft' size=32 name='bf_file[]' title='파일 용량 <?=$upload_max_filesize?> 이하만 업로드 가능'>";

	if (delete_code) 
		objCell.innerHTML += delete_code;
	else {
		<? if ($is_file_content) { ?>
		objCell.innerHTML += "<br><input type='text' class='bbs_ft' size=50 name='bf_content[]' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.'>";
		<? } ?>
		;
	}
}

<?=$file_script; //수정시에 필요한 스크립트?>

function del_file()
{
	// file_length 이하로는 필드가 삭제되지 않아야 합니다.
	var file_length = <?=(int)$file_length?>;
	var objTbl = document.getElementById("variableFiles");
	if (objTbl.rows.length - 1 > file_length)
		objTbl.deleteRow(objTbl.rows.length - 1);
	}
</script>
<? } ?>


<? if ($is_trackback) { ?>
<tr> 
    <td height="30" class="bbs_pl">
		트랙백주소
	</td>
    <td>
		<INPUT class=bbs_ft size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
        <? if ($w=="u") { ?>
			<input type=checkbox name="re_trackback" value="1">핑 보냄
		<? } ?>
	</TD>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<? } ?>

    
<? if ($is_norobot) { ?>
<tr> 
    <td height="30" class="bbs_pl">
		<?=$norobot_str?>
	</td>
    <td>
		<INPUT class=bbs_ft type=input size=10 name=wr_key itemname="자동등록방지" required>
		* 왼쪽의 글자중 <FONT COLOR="red">빨간글자만</FONT> 순서대로 입력하세요.
	</TD>
</tr>
<tr><td colspan=2 class=bbs_line1></td></tr>
<? } ?>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr height=50> 
	<td width="50%" class=bbs_pr align="right">
		<INPUT type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_ok.gif" border=0 width="55" height="20" accesskey='s'>
	</td>
	<td width="50%" class=bbs_pl>
		<a href="./board.php?bo_table=<?=$bo_table?>">
		<img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0 width="55" height="20">
		</a>
	</td>
</tr>
</table>

</td></tr></table>
</form>

<script language="Javascript">
with (document.fwrite) {
    if (typeof(wr_name) != "undefined") 
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined") 
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined") 
        wr_content.focus();

    if (typeof(ca_name) != "undefined") 
        if (w.value == "u") 
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result) 
            obj.value = "html2";
        else 
            obj.value = "html1";
    } 
    else 
        obj.value = "";
}

function fwrite_check(f)
{
    var s = "";
    /*
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return;
    }
	*/
    if (char_min > 0 || char_max > 0)
    {
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
            return;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
            return;
        }
    }

    if (typeof(f.wr_key) != "undefined") {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert("자동등록방지용 빨간글자가 순서대로 입력되지 않았습니다.");
            f.wr_key.focus();
            return;
        }
    }

    f.action = "./write_update.php";
    f.submit();
}
</script>