<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가


$sql = " select count(*) as cnt from g4_write_vacation
         ";

$row = sql_fetch($sql);
$total_count = $row[cnt];

$rowno = 15;
$total_page  = ceil($total_count / $rowno);  // 전체 페이지 계산
if (!$page) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rowno; // 시작 열을 구함




$sql = " select * from g4_write_vacation order by wr_id desc
          limit $from_record, $rowno ";
$result = sql_query($sql); 

?>

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


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width=100>
<colgroup width=''>
<tr><td colspan=2 height=2 bgcolor="#0A7299"></td></tr>
<tr>
	<td style='padding-left:20px' colspan='2' align=center width="400" height=38 bgcolor="#FBFBFB"><strong>Vacation Status : </strong> 
		<a href="#" style="margin-right:8px;">Approve</a>
		<a href="#" style="margin-right:8px;">process</a>
		<a href="#" style="margin-right:8px;">cancel</a>
	</td>

</tr>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>


<tr>
    <td colspan="2" style='padding-left:20px; height:30px;'>
    	<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#dedede" style="margin : 10px 0; border:2px #ccc solid;" class="normal_box">
		<colgroup width=50>
		<colgroup width=100>
		<colgroup width=80>
		<colgroup width=40>
		<colgroup width=80>
		<colgroup width=''>
		<colgroup width=80>
		<colgroup width=80>
		<colgroup width=30>
		<tr class='col1 ht center'>
		    <th>#</th>
		    <th>REQUEST DATE</th>
		    <th>VL TYPE</th>
		    <th>DAYS</th>
		    <th>DATES</th>
		    <th>APPROVER</th>
		    <th>DETAILS</th>
		    <th>VL STATUS</th>
		    <th>APPROVED DATE</th>
		    <th>FILE</th>
		</tr>
		<?php while($row = sql_fetch_array($result)){ ?> 
		<tr class='col1 ht center' <? echo ($row['wr_10'] == "approved") ? "bgcolor=#eee" : "bgcolor=white"?>>
			<td><?=$row['wr_id'] ?></td>
			<td><?=date( 'Y-m-d', strtotime($row['wr_datetime'])) ?></td>
			<td><?=$row['wr_1'] ?></td>
			<td><?=$row['wr_2'] ?></td>
			<td >
				<? 
					$arrContent =  explode(",", $row['wr_content']);
					foreach ($arrContent as $value){
						echo $value."<br>";
					}
			
			 	?>
			 </td>
			<td><?=$row['wr_3'] ?></td>
			<td><?=$row['wr_9'] ?></td>
			<td><b><?=$row['wr_10'] ?></b></td>
			<td><?=$row['wr_8'] ?></td>
			<td>FILE</td>
		</tr>
		
		
		<? } ?> 
		</table>
    
    </td>
</tr>

<tr><td colspan=2 height=2 bgcolor="#0A7299"></td></tr>
</table>

<div style="margin-top : 10px; margin-left : 10px; margin-bottom : 200px;">
	*Vacation Process<br>
	Request -> Supervisor Approve -> Management Approve -> Approved<br><br>
	*Vacation Status<br>
	<ol>
	<li>request</li>
	<li>sv approve -> supervisor approve</li>
	<li>sv cancel -> supervisor cancel</li>
	<li>approved -> management approved, final approve</li>
	<li>cancel -> management cancel</li>
</ol>
	
</div> 

