<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}

//여분필드
$ex3_filed = explode("|", $write[wr_3]);

$ext3_00  = $ex3_filed[0];
$ext3_01  = $ex3_filed[1];
$ext3_02  = $ex3_filed[2];
$ext3_03  = $ex3_filed[3];
$ext3_04  = $ex3_filed[4];
$ext3_05  = $ex3_filed[5];
$ext3_06  = $ex3_filed[6];
$ext3_07  = $ex3_filed[7];
$ext3_08  = $ex3_filed[8];
$ext3_09  = $ex3_filed[9];
$ext3_10  = $ex3_filed[10];
$ext3_11  = $ex3_filed[11];
$ext3_12  = $ex3_filed[12];
$ext3_13  = $ex3_filed[13];
$ext3_14  = $ex3_filed[14];
$ext3_15  = $ex3_filed[15];
$ext3_16  = $ex3_filed[16];
$ext3_17  = $ex3_filed[17];
$ext3_18  = $ex3_filed[18];
$ext3_19  = $ex3_filed[19];
$ext3_19  = $ex3_filed[19];
$ext3_20  = $ex3_filed[20];
$ext3_21  = $ex3_filed[21];
$ext3_22  = $ex3_filed[22];
$ext3_23  = $ex3_filed[23];
$ext3_24  = $ex3_filed[24];
$ext3_25  = $ex3_filed[25];
$ext3_26  = $ex3_filed[26];
$ext3_27  = $ex3_filed[27];
$ext3_28  = $ex3_filed[28];
$ext3_29  = $ex3_filed[29];
$ext3_30  = $ex3_filed[30];
$ext3_31  = $ex3_filed[31];
$ext3_32  = $ex3_filed[32];
$ext3_33  = $ex3_filed[33];
$ext3_34  = $ex3_filed[34];
$ext3_35  = $ex3_filed[35];
$ext3_36  = $ex3_filed[36];
$ext3_37  = $ex3_filed[37];
$ext3_38  = $ex3_filed[38];
$ext3_39  = $ex3_filed[39];
$ext3_40  = $ex3_filed[40];
$ext3_41  = $ex3_filed[41];
$ext3_42  = $ex3_filed[42];
$ext3_43  = $ex3_filed[43];
$ext3_44  = $ex3_filed[44];
$ext3_45  = $ex3_filed[45];
$ext3_46  = $ex3_filed[46];
$ext3_47  = $ex3_filed[47];
$ext3_48  = $ex3_filed[48];
$ext3_49  = $ex3_filed[49];
$ext3_50  = $ex3_filed[50];



if( $is_admin ){
	$criteria = "";
}else{
	$criteria = " and mb_id = '$member[mb_id]' ";
}
		
		


$sql_common = " from $write_table ";
$sql_search = " where (1) $criteria ";

$sql = " 	select max(wr_id) as cnt
			$sql_common
			$sql_search
			 ";

$row = sql_fetch($sql);
$max_wrid = $row[cnt];


?>
<div >
	<img src="<?=$g4[path]?>/images/daily_report.png">
</div>

<style>

a:link, a:visited, a:active { text-decoration:none; color:222222; }
a:hover { text-decoration:underline; color:67798B; }
a.title:link, a.title:visited, a.title:active { text-decoration:none; color:white; }
a.title:hover { text-decoration:underline; color:white; }

.dot14 { font-size:14px; }
.title { font-size:9pt; font-family:gulim; font-weight:bold; color:#616161; }

.btn1 {background-color:#f0f0f0;height:25px;font-size:11px; letter-spacing:-1;} 

.col1 { color:#333;}
.col2 { color:#868686; }

.pad1{padding:5px;}
.pad2{padding:5px;}

.bgcol1 { background-color:#F7F7F7; padding:5px; }
.bgcol2 { background-color:#fofofo; padding:5px; }

.line1 { background-color:#4C5053; height:2px; }
.line2 { background-color:#CCCCCC; height:1px; }

.list0 { background-color:#FFFFFF; }
.list1 { background-color:#F8F8F8; }

.alist0 { background-color:#FFFFFF; }
.alist1 { background-color:#F0F2F5;}
.alist2 { background-color:#FFFFFF;}

.bold{ font-weight:bold;letter-spacing:-1;}
.center{ text-align:center; }
.right{ text-align:right; }

.w99 { width:99%; }
.ht {height:27px;border-bottom:1px #f0f0f0 solid;}

.ed{margin:0px;}
.member{color:#555555;}
.config_box td{background:white;}

form{margin:0;}
.normal_box{display: table;
	border-collapse: separate;
	border-spacing: 2px;}
.normal_box th{height:27px;padding-top:3px;background:#2E5EA0; text-align : center; 	}
.normal_box th{letter-spacing:-1;color:white;}
.normal_box .write_head{padding:3px;background:A0AAB9;letter-spacing:-1;color:white;}
.bg_menu1{height:22px;padding-left:5px;padding-right:15px;}
.bg_line1{height:1px; background-color:#dedede;}
.bg_menu2 { height:22px;padding-left:5px; }
.bg_line2 { background-image:url('<?=$g4['admin_path']?>/img/dot.gif'); height:3px; }
.dot {color:#D6D0C8;border-style:dotted;}

#csshelp1 { border:0px; background:#FFFFFF; padding:6px; }
#csshelp2 { border:2px solid #BDBEC6; padding:0px; }
#csshelp3 { background:#F9F9F9; padding:6px; width:200px; color:#222222; line-height:120%; text-align:left; }

</style>
<link rel="stylesheet" href="<?=$board_skin_path?>/daily.css" type="text/css" />

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

<table cellspacing="0" cellpadding="0" >
	<tr height="10px">
		<td>
		</td>
	</tr>
</table>


<table width="950" cellspacing="0" cellpadding="0" >
<colgroup width="6">
<colgroup width="">
<colgroup width="6">
<tr>
	<td>
	</td>
	<td>
	
	
	<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f0f0f0">
	<colgroup width="500">
	</colgroup><colgroup width="">
		</colgroup><tbody><tr><td colspan="2" class="line1"></td></tr>
		<tr height="30">
			<td class="bold" style="font-size:14px;padding-left:5px;">Writing the [<?= date('Y-m-d')?>] Daily Report</td>
			<td class="bold" style="font-size:14px;padding-right:5px;" align="right">
				<select name="supervisor" required>
					<option value="">### Choose your supervisor ###</option>
					<?
						$sql = " select * from g4_member where mb_level >= 5 and mb_id <> 'admin' ";
						$result = sql_query($sql);    
						
						for ($i=0; $row=sql_fetch_array($result); $i++) {
					
					?>
						<option value="<?=$row[mb_name]?>">[<?=$row['mb_1']?> Dept] : <?=$row['mb_name']?></option> 
					<?
						}
					?>	
				</select>
			</td>
		</tr>
		<tr><td colspan="2" class="line2"></td></tr>
	</tbody></table>
	
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tbody>
		<tr height="10px">
			<td colspan="3">
			</td>
		</tr>
		</tbody>
	</table>
	
	
	<table width="100%" cellpadding="0" cellspacing="1" class="normal_box" bgcolor="#dedede">
		<colgroup width="50">
		</colgroup>
		<colgroup width="150">
		</colgroup>
		<colgroup width="150">
		</colgroup>
		<colgroup width="">
		</colgroup>
		<tbody>
		<tr class="bgcol1 col1 ht center">
			<th >seq</th>
		    <th >Time On</th>
		    <th>Time Off</th>
		    <th>Descriptions</th>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>1</td>
		    <td ><input name='ext3_00' class=ed required value='<?=$ext3_00?>' type='text' style='width:95%' itemname='item1_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_01' class=ed required value='<?=$ext3_01?>' type='text' style='width:95%' itemname='item1_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_02' class=ed required value='<?=$ext3_02?>' type='text' style='width:95%' itemname='item1_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>2</td>
		    <td ><input name='ext3_03' class=ed required value='<?=$ext3_03?>' type='text' style='width:95%' itemname='item2_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_04' class=ed required value='<?=$ext3_04?>' type='text' style='width:95%' itemname='item2_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_05' class=ed required  value='<?=$ext3_05?>' type='text' style='width:95%' itemname='item2_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>3</td>
		    <td ><input name='ext3_06' class=ed value='<?=$ext3_06?>' type='text' style='width:95%' itemname='item3_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_07' class=ed value='<?=$ext3_07?>' type='text' style='width:95%' itemname='item3_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_08' class=ed value='<?=$ext3_08?>' type='text' style='width:95%' itemname='item3_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>4</td>
		    <td ><input name='ext3_09' class=ed value='<?=$ext3_09?>' type='text' style='width:95%' itemname='item4_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_10' class=ed value='<?=$ext3_10?>' type='text' style='width:95%' itemname='item4_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_11' class=ed value='<?=$ext3_11?>' type='text' style='width:95%' itemname='item4_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>5</td>
		    <td ><input name='ext3_12' class=ed value='<?=$ext3_12?>' type='text' style='width:95%' itemname='item5_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_13' class=ed value='<?=$ext3_13?>' type='text' style='width:95%' itemname='item5_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_14' class=ed value='<?=$ext3_14?>' type='text' style='width:95%' itemname='item5_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>6</td>
		    <td ><input name='ext3_15' class=ed value='<?=$ext3_15?>' type='text' style='width:95%' itemname='item6_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_16' class=ed value='<?=$ext3_16?>' type='text' style='width:95%' itemname='item6_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_17' class=ed value='<?=$ext3_17?>' type='text' style='width:95%' itemname='item6_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>7</td>
		    <td ><input name='ext3_18' class=ed value='<?=$ext3_18?>' type='text' style='width:95%' itemname='item7_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_19' class=ed value='<?=$ext3_19?>' type='text' style='width:95%' itemname='item7_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_20' class=ed value='<?=$ext3_20?>' type='text' style='width:95%' itemname='item7_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>8</td>
		    <td ><input name='ext3_21' class=ed value='<?=$ext3_21?>' type='text' style='width:95%' itemname='item8_1' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_22' class=ed value='<?=$ext3_22?>' type='text' style='width:95%' itemname='item8_2' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		    <td ><input name='ext3_23' class=ed value='<?=$ext3_23?>' type='text' style='width:95%' itemname='item8_3' onmouseover="this.style.backgroundColor='#EBF9FF'" onmouseout="this.style.backgroundColor='#ffffff'"></td>
		</tr>		
		</tbody>
	</table>
	
	
	<table width="100%" cellpadding="3" cellspacing="1" style="margin-top: 10px;">
		<tbody>
			<tr>
				<td width="50%" align="right"></td>
				<td width="50%" align="right">
				<span class="button ">
					<input type="button" class="btn1" value="Go back to the List" onclick="location.href='./board.php?bo_table=<?=$bo_table?>&page=<?=$page?>&wr_id=<?=$max_wrid?>' ">
				</span>
				<span class="button red">
					<button>submit</button>
				</span>
				</td>
			</tr>
		</tbody>
	</table>
	</td>
	<td>
	</td>
</tr>
</table>

</form>



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
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
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

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    

    if (document.getElementById('char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(document.getElementById('char_count').innerHTML);
            if (char_min > 0 && char_min > cnt) {
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('내용을 입력하십시오.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }

    <?
    if ($is_dhtml_editor) echo cheditor3('wr_content');
    ?>

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
        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        if (typeof(ed_wr_content) != "undefined") 
            ed_wr_content.returnFalse();
        else 
            f.wr_content.focus();
        return false;
    }

    if (typeof(wr_key) != 'undefined') {
    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }
    }
    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    return true;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>
