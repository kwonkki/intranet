<?
$sub_menu = "600200";
include_once("./_common.php");


$g4['title'] = "";
include_once("./_head.php");

$sql_condition = " where mb_id = '$member[mb_id]' ";
$sql_common = " from g4_vacation_point ";

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common.$sql_condition;
$row = sql_fetch($sql);
$total_count = $row[cnt];

$rows = $config[cf_page_rows];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
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


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-x: scroll;">
<colgroup width=100>
<colgroup width=''>
<tr><td colspan=2 height=2 bgcolor="#0A7299"></td></tr>
<tr>
	<td style='padding-left:20px' colspan='2' align=center width="400" height=38 bgcolor="#FBFBFB"> 
		<h3>Vacation Balance Details</h3>
	</td>

</tr>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>


<tr>
    <td colspan="2" style='padding-left:20px; height:30px;'>
    	<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#dedede" style="margin : 10px 0; border:2px #ccc solid;" class="normal_box">
		<colgroup width=40>
		<colgroup width=70>
		<colgroup width=70>
		<colgroup width=''>
		<colgroup width=100>
		<tr class='col1 ht center'>
		    <th>#</th>
		    <th>ID</th>
		    <th>POINT</th>
		    <th>DETAILS</th>
		    <th>DATE</th>
		</tr>
<?
$sql = " select * from g4_vacation_point 
          $sql_condition
          order by po_id desc
          limit $from_record, $rows  ";
$result = sql_query($sql);
for ($i=0; $row=mysql_fetch_array($result); $i++)
{

    $list = $i%2;
    echo "
    <tr class='list$list center'>
        <td>$row[po_id]</td>
        <td>$row[mb_id]</td>
        <td>$row[po_point]</td>
        <td>$row[po_content]</td>
        <td>$row[po_datetime]</td>
    </tr>";
}

if ($i == 0) {
    echo "<tr><td colspan=8 align=center height=100 bgcolor=#ffffff><span class=point>No Data.</span></td></tr>\n";
}
?>
</table>
</td></tr>
</table>
<table width=100%>
<tr>
    <td width=50%></td>
    <td width=50% align=right><?=get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$qstr&page=");?></td>
</tr>
</table>


<?
include_once("./_tail.php");
?>
