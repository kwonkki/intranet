<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
//if ($is_dhtml_editor) {
//    include_once("$g4[path]/lib/cheditor4.lib.php");
//    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
//    echo cheditor1('wr_content', '100%', '250');
//}

/*************************
wr_1 시작일
wr_2 종료일
wr_3 분류(중요도)
wr_4 시작시간
wr_5 종료시간
wr_6 department
wr_7 
wr_8 일정반복
wr_9 
wr_10 일정완료체크
*************************/

$dept_param = "";

if ($w == ""){
		
	if($is_admin){
		$dept_param = "admin";
	}else{
		$dept_param = $member['mb_1'];
	}
	
}else if ($w == "u"){
	if($is_admin){
		$dept_param = $write['wr_6'];
	}else{
		$dept_param = $write['wr_6'];
	}
}



echo $w;
?>

<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/css/g_style.css' />

<style type="text/css">
.write_head {height:22px;}
</style>
<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<center>
<!--문서레이아웃-->
<table width="800px" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td class="docbg">
			<div style="clear:both;">
				<div style="float:left; width:20%">&nbsp;</div>
				<div style="float:left; width:60%; text-align:center;" class="doctitle"><? if($mode=="c" || !$mode) echo "Planning the Project"; else echo "Planning the Project"; ?></div>
				<div style="width:20%; text-align:right;" id="doclogo" class="doclogo"><?=$g_logo?></div>
			</div>
			<div style="clear:both;"></div>
			<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
			<input type="hidden" name="null"> 
			<input type="hidden" name="w"        value="<?=$w?>">
			<input type="hidden" name="bo_table" value="<?=$bo_table?>">
			<input type="hidden" name="wr_id"    value="<?=$wr_id?>">
			<input type="hidden" name="sca"      value="<?=$sca?>">
			<input type="hidden" name="sfl"      value="<?=$sfl?>">
			<input type="hidden" name="stx"      value="<?=$stx?>">
			<input type="hidden" name="spt"      value="<?=$spt?>">
			<input type="hidden" name="sst"      value="<?=$sst?>">
			<input type="hidden" name="sod"      value="<?=$sod?>">
			<input type="hidden" name="page"     value="<?=$page?>">
			<input type="hidden" name="wr_6"     value="<?=$dept_param?>">	

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<colgroup width="60px">
				<colgroup width=''>

				<? 
				$option = "";
				$option_hidden = "";
				
				if ($is_notice || $is_html || $is_secret || $is_mail) { 
				$option = "";
					if ($is_notice) { 
//					$option .= "<input type=checkbox name=notice value='1' $notice_checked>공지&nbsp;";
					}
					if ($is_html) {
				        if ($is_dhtml_editor) {
						$option_hidden .= "<input type='hidden' value='html1' name='html'>";
						} else {
						$option .= "<input onclick='html_auto_br(this);' type=checkbox value='$html_value' name='html' $html_checked><span class=w_title>html</span>&nbsp;";
						}
					}
				 /*
					if ($is_secret) {
						if ($is_admin || $is_secret==1) {
							$option .= "<input type=checkbox value='secret' name='secret' $secret_checked><span class=w_title>비밀글</span>&nbsp;";
						} else {
							$option_hidden .= "<input type="hidden" value='secret' name='secret'>";
						}
					}
				  */
	
					if ($is_mail) {
					$option .= "<input type=checkbox value='mail' name='mail' $recv_email_checked>답변메일받기&nbsp;";
					 }
				}

				echo $option_hidden;
				if ($option) {
				?>
				<tr>
					<td class="write_head">옵 션</td>
					<td><?=$option?></td>
				</tr>
				<? } ?>

				<? if ($is_category) { ?>
				<tr>
					<td class="write_head">카테고리 :</td>
					<td><select name='ca_name' required itemname="카테고리"><option value="">카테고리<?=$category_option?></select></td>
				</tr>
				<? } ?>
				<tr>
					<td class="write_head">category :</td>
					<td>
						<input type="radio" name="wr_3" value="001"  <? if($write[wr_3] == "001" || !$write[wr_3]) echo " checked=checked"; ?>>normal
						<input type="radio" name="wr_3" value="002"  <? if($write[wr_3] == "002") echo " checked=checked"; ?>>important
						<input type="radio" name="wr_3" value="003"  <? if($write[wr_3] == "003") echo " checked=checked"; ?>>very important
						<input type="radio" name="wr_3" value="004"  <? if($write[wr_3] == "004") echo " checked=checked"; ?>>Long Project
						<input type="radio" name="wr_3" value="000"  <? if($write[wr_3] == "000") echo " checked=checked"; ?>>personnel
					</td>
				</tr>
				<tr>
					<td class="write_head">progress :</td>
				    <td style="padding-left:4px">
						<select name="wr_10">
						<option value=""> 0%
						<option value="10" <?if($write[wr_10] == "10") echo " selected";?>> 10%
						<option value="20" <?if($write[wr_10] == "20") echo " selected";?>> 20%
						<option value="30" <?if($write[wr_10] == "30") echo " selected";?>> 30%
						<option value="40" <?if($write[wr_10] == "40") echo " selected";?>> 40%
						<option value="50" <?if($write[wr_10] == "50") echo " selected";?>> 50%
						<option value="60" <?if($write[wr_10] == "60") echo " selected";?>> 60%
						<option value="70" <?if($write[wr_10] == "70") echo " selected";?>> 70%
						<option value="80" <?if($write[wr_10] == "80") echo " selected";?>> 80%
						<option value="90" <?if($write[wr_10] == "90") echo " selected";?>> 90%
						<option value="100" <?if($write[wr_10] == "100") echo " selected";?>> 100%
						</select>
						&nbsp;&nbsp;
						repeat : 		
						<select name="wr_8">
						<option value=""      <?if(!$write[wr_8])           echo " selected";?>> n/a
						<option value="year"  <?if($write[wr_8] == "year")  echo " selected";?>> every year
						<option value="month" <?if($write[wr_8] == "month") echo " selected";?>> every month
						<option value="week"  <?if($write[wr_8] == "week")  echo " selected";?>> every week
						</select>
					</td>
				</tr>
				<tr>
				<td class="write_head">TimeLine :</td>
					<td style="padding-left:6px">
						<input type="text" name="wr_1" id="date2_wr_1" value="<?=$write[wr_1]?>" class="ed" style="width:70px" onclick="Calendar_Create('date2_wr_1','');" readonly/ itemname="시작일" required>	
						<select name="wr_4">
						<option value="">Start Time</option>
						<?
						$hour = 0;
						$min = ":00";
						for($i = 0; $i < 48; $i++){
							if(floor($i/2) < 10){	$hour = "0".floor($i/2); } else { $hour = floor($i/2);}
							if($i%2 != 0){ $min = ':30'; }else{ $min = ":00"; }
							$time = $hour.$min;
						?>
						<option value="<?=$time?>"<?if($time == $write[wr_4]) echo " selected";?>><?=$time?></option>
						<?
						} 
						?>
						</select>
						~
						<input type="text" name="wr_2" id="date2_wr_2" value="<?=$write[wr_2]?>" class="ed" style="width:70px" onclick="Calendar_Create('date2_wr_2','');" readonly/>
						<select name="wr_5">
						<option value="">End Time</option>
						<?
						$hour = 0;
						$min = ":00";
						for($i = 0; $i < 48; $i++){
							if(floor($i/2) < 10){	$hour = "0".floor($i/2); } else { $hour = floor($i/2);}
							if($i%2 != 0){ $min = ':30'; }else{ $min = ":00"; }
							$time = $hour.$min;
						?>
						
						<option value="<?=$time?>"<?if($time == $write[wr_5]) echo " selected";?>><?=$time?></option>
						<?
						} 
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="write_head">Project Name :</td>
					<td style="padding-left:6px"><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="문서명" required value="<?=$subject?>"></td>
				</tr>
			</table>
			<div style="padding:2px;"></div>
			<div style="height:2px; line-height:2px; font-size:1px;" class="c2"></div>
			<div style="position:relative; top:-3px; height:1px; line-height:1px; font-size:1px;" class="bb2"></div>
			<div style="padding:3px;"></div>
		
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class='write_head' style='padding:5 0 5 10;' colspan='2'>
					<?// if ($is_dhtml_editor) { ?>
						<?//=cheditor2('wr_content', $content);?>
					<?// } else { ?>
					<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td width="50%" align="left" valign="bottom">
							<span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);" class="btn_icon">－</span>
							<span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);" class="btn_icon">＋</span>
						</td>
						<td width="50%" align="right"><? if ($write_min || $write_max) { ?><span id=char_count></span>글자<?}?></td>
					</tr>
					</table>
					<textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required 
					<? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
					<? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
					<?// } ?>
				</td>
			</tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<? if ($is_file) { ?>
			<tr>
				<td valign="top" width="100px">
					<table cellpadding='0' cellspacing='0'>
						<tr>
							<td class='small' style="padding-top:10px; line-height:20px;">
							File Attach  
							<span onclick="add_file();" style="cursor:pointer;" class="btn_icon">＋</span> 
							<span onclick="del_file();" style="cursor:pointer;" class="btn_icon">－</span>
							</td>
						 </tr>
					</table>
				</td>
				<td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
					<script type="text/javascript">
					var flen = 0;
					function add_file(delete_code)
					{
						var upload_count = <?=(int)$board[bo_upload_count]?>;
						if (upload_count && flen >= upload_count)
						{
							alert("you can upload maximum : "+upload_count+" ");
							return;
						}

					var objTbl;
					var objRow;
					var objCell;
					if (document.getElementById)
					objTbl = document.getElementById("variableFiles");
					else
					objTbl = document.all["variableFiles"];

					objRow = objTbl.insertRow(objTbl.rows.length);
					objCell = objRow.insertCell(0);

					objCell.innerHTML = "<input type='file' class='ed' name='bf_file[]' title='maxmimum file size would be :  <?=$upload_max_filesize?> '>";
					if (delete_code)
					objCell.innerHTML += delete_code;
					else
					{
						<? if ($is_file_content) { ?>
						objCell.innerHTML += "<br><input type='text' class='ed' size=50 name='bf_content[]' title=''>";
						<? } ?>
					;
					}

					flen++;
					}
			        <?=$file_script; //수정시에 필요한 스크립트?>

					function del_file()
					{
						// file_length 이하로는 필드가 삭제되지 않아야 합니다.
						var file_length = <?=(int)$file_length?>;
						var objTbl = document.getElementById("variableFiles");
						if (objTbl.rows.length - 1 > file_length)
						{
							objTbl.deleteRow(objTbl.rows.length - 1);
							flen--;
						}
					}
					</script>
				</td>
			</tr>
			<? } ?>
			<? if ($is_link) { ?>
				<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
				<tr>
					<td class='small'>link<?=$i?> : </td>
					<td><input type='text' class='ed' size='50' name='wr_link<?=$i?>' itemname='링크<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
				</tr>
				<? } ?>
			<? } ?>
			<? if ($is_trackback) { ?>
			<!--
			<tr>
				<td class="write_head">트랙백주소</td>
				<td><input class='ed' size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
			<? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">핑 보냄<? } ?></td>
			</tr>
			-->
			<? } ?>
		</table>
		<? if ($is_guest) { ?>
		<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0">
			<colgroup width="130px">
			<colgroup width=''>
			<tr>
				<td><img id='kcaptcha_image' /></td>
				<td><input class='ed' type='input' size='10' name='wr_key' itemname="자동등록방지" required>&nbsp;&nbsp;왼쪽의 글자를 입력하세요.</td>
			</tr>
		</table>
		<? } ?>
		</td>
	</tr>
</table>
<!--//문서레이아웃-->

<table width="800px" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
	<td align="center" style="padding:15px 0 0 10px;">
	   <span class="btn m"><button type="submit" id="btn_submit" accesskey='s'>Save the Project</button></span>
	   <span class="btn m" style="-moz-opacity:0.5;opacity:0.5;filter:alpha(opacity=50)"><button type="button" id="btn_list" onclick="location.href='./board.php?bo_table=<?=$bo_table?>&appstate=all'">Show Projects</button>&nbsp;</span>
	</td>
</tr>
</table>
</form>
</center>
<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">

<?
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '공지';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '공지';
    }";
} 
?>

with (document.fwrite) 
{
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
        result = confirm("Do you want to auto line?");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}


function fwrite_submit(f) 
{

    /*
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }
    */


    if (document.getElementById('char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(document.getElementById('char_count').innerHTML);
            if (char_min > 0 && char_min > cnt) {
                alert("you have to type minimum  :  "+char_min+".");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("you can type maximum "+char_max+".");
                return false;
            }
        }
    }

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('Type the content.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }

    <?// if($is_dhtml_editor) echo cheditor3('wr_content');  ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: "<?=$board_skin_path?>/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("error-1");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("error-2");
        if (typeof(ed_wr_content) != "undefined") 
            ed_wr_content.returnFalse();
        else 
            f.wr_content.focus();
        return false;
    }

    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

	<?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    
    return true;
}
</script>
<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>

<script type='text/javascript' src='<?=$board_skin_path?>/js/calendar.js'></script>