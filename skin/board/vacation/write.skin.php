<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($is_dhtml_editor) {
    echo "<script type='text/javascript' src='$board_skin_path/ckeditor/ckeditor.js'></script>";
}

// 스킨에서 사용하는 lib 읽어들이기
include_once("$g4[path]/lib/write.skin.lib.php");
?>
<script type="text/javascript" src="<?=$board_skin_path?>/js/jquery.datepick.js"></script>
<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/css/jquery.datepick.css' />

<div style="height:14px; line-height:1px; font-size:1px;">&nbsp;</div>

<style type="text/css">
.write_head { height:30px; text-align:center; color:#8492A0; }
.field { border:1px solid #ccc; }


a:link, a:visited, a:active {
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
a.title:link, a.title:visited, a.title:active {
    color: white;
    text-decoration: none;
}
a.title:hover {
    color: white;
    text-decoration: underline;
}
.dot14 {
    font-size: 14px;
}
.title {
    color: #616161;
    font-family: gulim;
    font-size: 9pt;
    font-weight: bold;
}
.btn1 {
    background-color: #F0F0F0;
    font-size: 11px;
    height: 25px;
}
.col1 {
    color: #333333;
}
.col2 {
    color: #868686;
}
.pad1 {
    padding: 5px;
}
.pad2 {
    padding: 5px;
}
.bgcol1 {
    background-color: #F7F7F7;
    padding: 5px;
}
.bgcol2 {
    padding: 5px;
}
.line1 {
    background-color: #4C5053;
    height: 2px;
}
.line2 {
    background-color: #CCCCCC;
    height: 1px;
}
.list0 {
    background-color: #FFFFFF;
}
.list1 {
    background-color: #F8F8F8;
}
.alist0 {
    background-color: #FFFFFF;
}
.alist1 {
    background-color: #F0F2F5;
}
.alist2 {
    background-color: #FFFFFF;
}
.bold {
    font-weight: bold;
}
.center {
    text-align: center;
}
.right {
    text-align: right;
}
.w99 {
    width: 99%;
}
.ht {
    border-bottom: 1px solid #F0F0F0;
    height: 27px;
}
.ed {
    margin: 0;
}
.member {
    color: #555555;
}
.config_box td {
    background: none repeat scroll 0 0 white;
}
form {
    margin: 0;
}
.normal_box th {
    background: none repeat scroll 0 0 #2E5EA0;
    height: 27px;
    padding-top: 3px;
}
.normal_box th {
    color: white;
}
.normal_box .write_head {
    color: white;
    padding: 3px;
}

</style>
<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>
<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null> 
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">
<input type=hidden name=mnb      value="<?=$mnb?>">
<input type=hidden name=snb      value="<?=$snb?>">
<input type=hidden name=wr_10      value="process">
<input type=hidden name=wr_9      value="waiting for supervisor">
<input type=hidden name=wr_subject      value="<?=$g4['time_ymdhis']?>">

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width=100>
<colgroup width=''>
<tr><td colspan=2 height=2 bgcolor="#0A7299"></td></tr>
<tr>
	<td style='padding-left:20px' width="400" height=38 bgcolor="#FBFBFB"><strong>Vacation Leave Request</strong></td>
	<td align=right style='padding-right:10px'>
		<a href="board.php?bo_table=vacation&mnb=vacation" ><input type="button" value="Vacation Status" /></a>
		<a href="vacation_point.php" ><input type="button" value="Vacation Point" /></a>
	</td>

</tr>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>


<tr>
    <td colspan="2" style='padding-left:20px; height:30px;'>
    	<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#dedede" style="margin : 10px 0; border:2px #ccc solid;" class="normal_box">
		<colgroup width=25%>
		<colgroup width=25%>
		<colgroup width=25%>
		<colgroup width=25%>
		<tr class='col1 ht center'>
		    <th colspan="4">Your Information</th>
		</tr>
		<tr class='col1 ht center' bgcolor="white">
			<td>Name </td>
			<td><b><?=$member[mb_name]?></b></td>
			<td>Nick name </td>
			<td><b><?=$member[mb_nick]?></b></td>
		</tr>
		<tr class='col1 ht center' bgcolor="white">
			<td>Department</td>
			<td><b><?=$member[mb_1] ?></b></td>
			<td>Job Title</td>
			<td><b><?=$member[mb_2] ?></b></td>
		</tr>
		<tr class='col1 ht center' bgcolor="white">
			<td>Phone #</td>
			<td><b><?=$member[mb_tel]?></b></td>
			<td>CellPhone #</td>
			<td><b><?=$member[mb_hp]?></b></td>
		</tr>
		
		</table>
    
    </td>
</tr>

<tr>
    <td colspan="2" style='padding-left:20px; height:30px;'>
    	<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#dedede" style="margin : 10px 0; border:2px #ccc solid;" class="normal_box">
		<colgroup width=25%>
		<colgroup width=25%>
		<colgroup width=25%>
		<colgroup width=25%>
		<tr class='col1 ht center'>
		    <th colspan="4">VL Balance</th>
		</tr>
		<tr class='col1 ht center' bgcolor="white">
			<td>Available Balance </td>
			<td colspan=3><b><?=$member[mb_vacation_point]?></b></td>
		</tr>
		</table>
    
    </td>
</tr>

<tr>
    <td colspan="2" style='padding-left:20px; height:30px;'>
    	<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#dedede" style="margin : 10px 0; border:2px #ccc solid;" class="normal_box">
		<colgroup width=25%>
		<colgroup width=25%>
		<colgroup width=25%>
		<colgroup width=25%>
		<tr class='col1 ht center'>
		    <th colspan="4">VL Request</th>
		</tr>
		
		<tr class='col1 ht center' bgcolor="white">
			<td>VL TYPE </td>
			<td >
				<select name="wr_1" >
				<?php
				$sql1 = " select vacation_no, vacation_name, vacation_created from vacation order by vacation_no asc  ";
	    		$row1 = sql_query($sql1);
	    		
	    		for ($i=0; $data=sql_fetch_array($row1); $i++) {
		    	?>
		    		<option value='<?=$data[vacation_name]?>' > <?=$data[vacation_name]?></option>
		        <?
		    		}
		    	?>
				</select>
			</td>
			<td>Approver</td>
			<td >
				<select name="wr_3" id="wr_3" >
		    	<?php
					$sql1 = " select * from g4_member where mb_level >= '5' and mb_id <> 'admin'  ";
		    		$row1 = sql_query($sql1);
		    		
		    		for ($i=0; $data=sql_fetch_array($row1); $i++) {
		    	?>
		    		<option value='<?=$data[mb_nick]?>' > <?=$data[mb_nick]?></option>
		        <?
		    		}
		    	?>
				</select>
			</td>
			
		</tr>
		
		<tr class='col1 ht center' bgcolor="white">
			<td>period</td>
			<td >
			<select id="halfyr" name="halfyr">
				<option value="1">first half year</option>
				<option value="2">second half year</option>
			</select>
			</td>
			<td>How many days</td>
			<td><input type="text" name="wr_2" id="totalVacation" onblur="javascript:checkTotalVacation()"></td>
		</tr>
		<tr class='col1 ht center' bgcolor="white">
			<td>select the days</td>
			<td colspan='3'>
				<div id="divVacationDate" style="display :none"><input type="text" size="70" name="wr_content" id="wr_content" /><div style="display:none"><img id="calImg" src="<?=$board_skin_path?>/img/calendar.gif" /></div>
			</td>
		</tr>
		
		</table>
    
    </td>
</tr>

<script>
	
var vlBalance = "<?=$member[mb_vacation_point]?>";
var isLocal =  ('<?=$member[mb_3]?>' == 'local') ? 1 : 0;

$(document).ready(function(){
	
//	console.log(vlBalance);
//	console.log(isLocal);
	
	
	
	$('#wr_content').datepick({
		minDate : 10,
		maxDate	 : 20,
		multiSelect: 10, 
		monthsToShow: 3, 
		monthsToStep: 3, 
		showOnFocus: true, 
		showTrigger: '#calImg'
	});
	
});

function checkTotalVacation(){	
	
	
	// num or not
	if( isNaN($('#totalVacation').val()) || $('#totalVacation').val() == "" || $('#totalVacation').val() <= 0 ){
		alert('please type the correct vacation days');
		$('#totalVacation').val('');
		$('#totalVacation').focus();	
		$('#divVacationDate').css("display","none");	
		return false;
	}else{
	
	
		var howManyVl = $('#totalVacation').val(); 
		// vacation type & local expat & balance check
		var vacationDay = $('#totalVacation').val();
		var minNotice;
		var maxNotice;
		
		var halfYr = $('#halfyr').val();
		if(halfYr == 1){
			console.log("1 half");
		}else if(halfYr == 2){
			console.log("2 half");
		}
		
		
		if(isLocal){
			if(vacationDay == 1){
				minNotice = 7;
			}else{
				console.log("local vacation many days");
				minNotice = 14; 
			}
		}else{
			if(vacationDay <= 3){
				console.log("expat vacation 1 days");
				minNotice =  14;
			}else{
				console.log("expat vacation many days");
				minNotice = <?=date('t')?>;
			}
		}
		
		
		$('#divVacationDate').css("display","block");
		$('#wr_content').datepick('clear');
		$('#wr_content').datepick('option', {	
					minDate : minNotice
					,maxDate : '+4m'
					,monthsToShow: 4
					,multiSelect: howManyVl, 
		}); 
	}
	
	return false;
}


</script>

<!--
<tr>
    <td style='padding-left:20px; height:30px;'>· Title</td>
    <td><input class="field_pub_01" style="width:100%;" name=wr_subject id="wr_subject" itemname="title" required value="<?=$subject?>"></td></tr>-->
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<? if ($is_file) { ?>
<tr>
    <td style='padding-left:20px; height:30px;' valign=top><table cellpadding=0 cellspacing=0><tr><td style=" padding-top: 10px;">· File <span onclick="add_file();" style='cursor:pointer; font-family:tahoma; font-size:12pt;'>+</span> <span onclick="del_file();" style='cursor:pointer; font-family:tahoma; font-size:12pt;'>-</span></td></tr></table></td>
    <td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script language="JavaScript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("you can upload the file until "+upload_count+" ");
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

            objCell.innerHTML = "<input type='file' class='field_pub_01' name='bf_file[]' title='Maximum file size : <?=$upload_max_filesize?> '>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='field_pub_01' size=50 name='bf_content[]' title='input the content '> input the content of the file.";
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
        </script></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr><td colspan=2 height=2 bgcolor="#0A7299"></td></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" align="center" valign="top" style="padding-top:30px;">
        <button id="btn_submit" class="btn_big" border=0 accesskey='s'>Request Vacation</button>&nbsp;
</tr>
</table>

</td></tr></table>
</form>

<script type="text/javascript">
<?
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = 'notice';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = 'notice';
    }";
} 
?>

with (document.fwrite) {
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined") {
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
        if (w.value == "r")
            ca_name.value = "<?=$write[ca_name]?>"; 
    }
}

function html_auto_br(obj) 
{
    if (obj.checked) {
        result = confirm("Do you want to use the auto row?");
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
	
	<?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    
    if( $('#totalVacation').val() <= 0 || isNaN ($('#totalVacation').val()) ) {
    	alert('please type how many vacation days you want to go.')
    	$('#totalVacation').focus();
    	return false;
    }
    
    if(  $('#wr_content').val() == "" ){
    	alert('please choose the vacation days.');
    	$('#wr_content').focus();
    }
    
    var varCnt = $('#totalVacation').val();
    var dayCnt = $('#wr_content').val().split(',').length;
    
    if(  dayCnt !=  varCnt ){
    	alert('you want to submit the the form for ' + varCnt + ' days. \nbut you only choose ' + dayCnt + ' days\nkindly double-check.');
    	return false;	
    }
    
    var dayArr = $('#wr_content').val().split(',');   
    
    var dayArrTxt = "";
    for( var i in dayArr ){
    	dayArrTxt += dayArr[i] + "\n";
    }
    
    if(!confirm( 'Do you want to go vacation below days?\n\n' + dayArrTxt + '\nif everything is correct, Kindly proceed.')) return false;
    
    
    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    return true;
}

</script>

<script type="text/javascript">
// 업로드한 이미지 정보를 리턴 받는 예제입니다.
function showImageInfo() {
    var data = ed_wr_content.getImages();
    if (data == null) {
        return 0;
    }

    var img_sum = 0;
    for (var i=0; i<data.length; i++) {
        img_sum += parseInt(data[i].fileSize);
    }
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>
