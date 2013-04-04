<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//여분필드
$ex3_filed = explode("|", $view[wr_3]);

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

?>

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


<div >
	<? if( isset($review_auth) ) { ?>
		<img src="<?=$g4[path]?>/images/review_daily_report.png">
	<? }else{ ?>
		<img src="<?=$g4[path]?>/images/daily_report.png">
	<? } ?>
</div>

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
			<td class="bold" style="font-size:14px;padding-left:5px;"><?=$view[wr_subject]?></td>
			<td class="bold" style="font-size:14px;padding-right:5px;" align="right">
			
			<?php if( $is_admin ){?>
				<form name=fsearch method=get style="margin:0px;">
				<input type=hidden name=bo_table value="<?=$bo_table?>">
				<input type=hidden name=sca      value="<?=$sca?>">
				<table width=100% cellpadding=0 cellspacing=0>
				<tr> 
				    <td  align="right">
				        <select name=sfl>
				        	<option value='wr_name,1'>Employee Name</option>
				        	<option value='mb_id,1'>Employee ID</option>
				            <option value='wr_subject'>title</option>
				            <option value='wr_content'>content</option>
				        </select>
				        <input name=stx maxlength=15 size=10 itemname="search" required value='<?=stripslashes($stx)?>'>
				        <select name=sop>
				            <option value=and>and</option>
				            <option value=or>or</option>
				        </select>
				        <span class="button red"><input type="submit" value="search" class="btn1"></span>
				        </td>
				</tr>
				</table>
				</form>
			<?php }?>
			
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
	
	<table width="100%" cellpadding="0" cellspacing="1" class="normal_box" bgcolor="#dedede" >
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
		    <td ><span><?=$ext3_00?></span></td>
		    <td ><span><?=$ext3_01?></span></td>
			<td ><span><?=$ext3_02?></span></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>2</td>
		    <td ><span><?=$ext3_03?></span></td>
			<td ><span><?=$ext3_04?></span></td>
			<td ><span><?=$ext3_05?></span></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>3</td>
		    <td ><span><?=$ext3_06?></span></td>
			<td ><span><?=$ext3_07?></span></td>
			<td ><span><?=$ext3_08?></span></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>4</td>
			<td ><span><?=$ext3_09?></span></td>
			<td ><span><?=$ext3_10?></span></td>
			<td ><span><?=$ext3_11?></span></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>5</td>
		    <td ><span><?=$ext3_12?></span></td>
			<td ><span><?=$ext3_13?></span></td>
			<td ><span><?=$ext3_14?></span></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>6</td>
		    <td ><span><?=$ext3_15?></span></td>
			<td ><span><?=$ext3_16?></span></td>
			<td ><span><?=$ext3_17?></span></td>
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>7</td>
			<td ><span><?=$ext3_18?></span></td>
			<td ><span><?=$ext3_19?></span></td>
			<td ><span><?=$ext3_20?></span></td>		
		</tr>
		<tr class="col1 ht center" bgcolor="white">
			<td>8</td>
		    <td ><span><?=$ext3_21?></span></td>
			<td ><span><?=$ext3_22?></span></td>
			<td ><span><?=$ext3_23?></span></td>
		</tr>		
		</tbody>
	</table>
	</td>
	<td>
	</td>
</tr>
</table>
