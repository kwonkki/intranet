<?
include_once("./_common.php");


$g4['title'] = "Asset Inventory";
include_once("./_head.php");

 if($member[mb_level] < 5 ){
 	alert("Only Superviosr Allowed here", $g4[path]);
 }



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
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />


<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f0f0f0">

<col width="120">
<col width="">
	<tr><td colspan='2' class='line1'></td></tr>
	<tr height="30">
		<td class="bold" width="400px"style="font-size:14px;padding-left:5px;"><?=$g4[title]?></td>
		<td class="bold"  style="font-size:14px;padding-right:5px;" align="right">
		<table align="right" >
		<tr>
			<td>
			</td>
		</tr>
		</table>
</td>
	</tr>
	<tr><td colspan='2' class='line2'></td></tr>
</table>

<table width=100% cellpadding="0" cellspacing="1">
<tr class=ht>
    <td width=50% align=left>
    </td>
</tr>
</table>

<?
	$sql = "select * from asset_category order by seq desc ";
	
	$result = sql_query($sql);
	
	for ($i=0; $row=sql_fetch_array($result); $i++) {


	
	
	$sql2 = " select * from asset_inventory where as_asset_category_seq = '$row[seq]' order by as_no desc ";
	$result2 = sql_query($sql2);
	
	
	 
	for ($i=0; $row2=sql_fetch_array($result2); $i++) {
	
	echo $row2[as_particular];
	
	
?>








<?
		} // end of for 
	} // end of for
?>


<div style="height : 20px;">
</div>



<script>
<!--



-->
</script>


<?
include_once("./_tail.php");
?>
