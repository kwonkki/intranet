<?
include_once("./_common.php");


$g4['title'] = "Dept Attendance Status";
include_once("./_head.php");

 if($member[mb_level] < 5 ){
 	alert("Only Superviosr Allowed here", $g4[path]);
 }



// 5 레벨 체크
if( !isset($dept) ){
	$my_dept = $member[mb_1];
	$dept = $member[mb_1];
}else{
	$my_dept = $dept;
		
}

if($sdate){
	
	$day_query =  $sdate;
}else{
	$day_query =  date("Y-m-d");
	$sdate = date("Y-m-d");
}


$sql = " 
			select	count(*) as cnt	
			from g4_member a
			left outer join 
			(
				select mb_login_id , max(mb_login_time) as mb_login_time
				from mb_login
				where date(mb_login_time) = '{$day_query}'
				group by mb_login_id
				order by mb_login_time asc
			)b
			on a.mb_id = b.mb_login_id
			where a.mb_1 = '{$my_dept}'
			and a.mb_id <> 'admin'
";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$rowno = $config[cf_page_rows];
$total_page  = ceil($total_count / $rowno);  // 전체 페이지 계산
if (!$page) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rowno; // 시작 열을 구함

//$listall = "<a href='$_SERVER[PHP_SELF]' class=tt>First</a>";

$sql = " 	select	a.mb_no, a.mb_id, a.mb_name, a.mb_1, a.mb_2, a.mb_3, b.mb_login_time,	
					case 
						when date( b.mb_login_time ) = date('{$day_query}') then 'come'
						else ''
					end as come
					, b.mb_login_time
			from g4_member a
			left outer join 
			(
				select mb_login_id , max(mb_login_time) as mb_login_time
				from mb_login
				where date(mb_login_time) = '{$day_query}'
				group by mb_login_id
				order by mb_login_time asc
			)b
			on a.mb_id = b.mb_login_id
			where a.mb_1 = '{$my_dept}'
			and a.mb_id <> 'admin'
			order by come desc, a.mb_3 asc, a.mb_no desc
";
$result = sql_query($sql);

//ChromePhp::log($sql);

$colspan = 6;

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
<script>
  $(function() {
  	
  	 var date = new Date();
     var currentMonth = date.getMonth();
     var currentDate = date.getDate();
     var currentYear = date.getFullYear();
  	
  	
    $( "#datepicker" ).datepicker({
    	dateFormat: 'yy-mm-dd'
    	,maxDate: new Date(currentYear, currentMonth, currentDate)
    
    });
  });
  
</script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

<div >
	<img src="<?=$g4[path]?>/images/dept_status.png">
</div>

<script language="JavaScript">
var list_update_php = "exchange_list_update.php";
var list_delete_php = "exchange_list_delete.php";
var list_sleep_php = "exchange_list_sleep.php";
var list_cancel_php = "exchange_list_cancel.php";
</script>
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f0f0f0">
<form name=fsearch method=get>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=sdate  value='<?=$sdate?>'>
<input type=hidden name=edate  value='<?=$edate?>'>
<input type=hidden name=dept  value='<?=$dept?>'>
<col width="120">
<col width="">
	<tr><td colspan='2' class='line1'></td></tr>
	<tr height="30">
		<td class="bold" width="400px"style="font-size:14px;padding-left:5px;"><?=$g4[title]?> : <b><font color="green"><?=$my_dept?> / <?=$day_query?></font></b></td>
		<td class="bold"  style="font-size:14px;padding-right:5px;" align="right">
		<table align="right" >
		<tr>
			<td>
			<select name="dept">
    		<?
				$sql_dept = " select distinct dept_name from dept order by dept_no ";
				   
				$result_dept = sql_query($sql_dept);    
				
				for ($i=0; $row=sql_fetch_array($result_dept); $i++) {
				
			?>
				<option value="<?=$row['dept_name']?>"  <?php if ($row['dept_name']== $dept ) echo 'selected="selected"';?> ><?=$row['dept_name']?></option> 
			<?
				}
			?>	
			</select>
			Date: <input type="text" name="sdate" value="<?=$sdate?>" id="datepicker" size="10"/>
			<span class="button red"><input type="submit" value="search" class="btn1" ></span>
			</td>
		</tr>
		</table>
</td>
	</tr>
	<tr><td colspan='2' class='line2'></td></tr>
</form>
</table>

<table width=100% cellpadding="0" cellspacing="1">
<tr class=ht>
    <td width=50% align=left><?=$listall?>
        (Total : <?=number_format($total_count)?> )
    </td>
</tr>
</table>

<form name="list" method="post">
<input type=hidden name=token value='<?=$token?>'>

<table width="100%" cellpadding="0" cellspacing="1" class="normal_box" bgcolor="#dedede" >
<col width="170">
<col width="150">
<col width="150">
<col width="150">
<col width="100">
<col width="">
<tr class="bgcol1 col1 ht center">
<th>Present</th>
<th>Name</th>
<th>Dept</th>
<th>Position</th>
<th>Local/Expat</th>
<th>Login Time</th>
</tr>
<?
$emp_come = 0;
$emp_not_come = 0;
$total_emp = 0;
for($i=0; $row=sql_fetch_array($result); $i++) {
	
	if($row[come]==""){
		$come01 = "<span class='red'>n/a</span>";
		$emp_not_come++;
	}else{
		$come01 = "<span class='green'>present</span>";
		$emp_come++;
	}
	$total_emp = $emp_not_come + $emp_come;  
	
	
	$list = $i%2;
	
	echo "<tr class='ht center list$list' bgcolor='white'>
	<td>".$come01."</td>
	<td>".$row[mb_name]."</td>
	<td>".$row[mb_1]."</td>
	<td>".$row[mb_2]."</td>
	<td>".$row[mb_3]."</td>
	<td>".$row[mb_login_time]."</td>
	</tr>";
}

if ($i == 0) echo "<tr class='ht center'><td colspan='6' align=center height=100 bgcolor=white>no data.</td></tr><tr><td colspan='$colspan' class='line2'></td></tr>";
echo "<tr  class='ht center'><td colspan=\"1\" class=\"ht color1\" >Total Present</td><td colspan=\"5\" class=\"ht color2\" >$emp_come</td></tr>";
echo "<tr  class='ht center'><td colspan=\"1\" class=\"ht color1\" >Total Not Come</td><td colspan=\"5\" class=\"ht color2\" >$emp_not_come</td></tr>";
echo "<tr  class='ht center'><td colspan=\"1\" class=\"ht color1\" >Total</td><td colspan=\"5\" class=\"ht color2\" >$total_emp</td></tr>";
echo "</table>";
//$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$qstr&page=");

echo "<table width=100% cellpadding=3 cellspacing=1  height='40'>";
echo "<td width=50%><div class=\"paginate\">$pagelist</div></td><tr><td width=50%  align=right>";
echo " ";

//echo " <span class='button'><input type=button class='btn1' value='".adm_exp_lang('삭제하기')."' onclick=\"btn_check(this.form, 'delete')\"></span>";
echo "</td>";
echo "</tr></table></form>\n";
?>


<script>
<!--
function apply_jungsan(gid)
{
	document.betting.action="./betting_update.php";
	document.betting.gid.value = gid;
	document.betting.submit();
}

function cancel_jungsan(gid, no)
{
	$j("input[name='chk[]']")[no].checked = true;;
	document.formBetting.action="./betting_list_delete.php";
	document.formBetting.submit();
}
-->
</script>
<form name="attendance" method="POST">
<input type=hidden name=gid value=''>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden id=sfl name=sfl   value='<?=$sfl?>'>
<input type=hidden id=stx name=stx   value='<?=$stx?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=sdate  value='<?=$sdate?>'>
<input type=hidden name=edate  value='<?=$edate?>'>
<input type=hidden name=dept  value='<?=$dept?>'>

</form>

<?
include_once("./_tail.php");
?>
