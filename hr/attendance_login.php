<?
$sub_menu = "300100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();


$sql_common = " from mb_login ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case "mb_login_id" :
        	$sql_search .= " ($sfl like '$stx%') ";
            break;
        default :
            $sql_search .= " ($sfl like '$stx%') ";
            break;
    }
    $sql_search .= " ) ";
}




$sql = " select count(*) as cnt
         $sql_common
         $sql_search
          ";
          
$row = sql_fetch($sql);
$total_count = $row[cnt];

$rows = $config[cf_page_rows];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if (!$page) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함



$login_query ="
			select mb_no, mb_login_id, mb_login_time 
			from mb_login
			$sql_search
			order by mb_no desc		
			limit $from_record, $rows ";		
ChromePhp::log($login_query);					
$result_login = sql_query($login_query);


$colspan= 3;
$g4[title] = "login list";
include_once("./admin.head.php");

?>

<form name=fsearch method=get style="margin:0px;">
<table width=100%>
<tr>
    <td width=50% align=left><?=$listall?>
      <span><b>* Login List</b></span>
    </td>
    <td width=50% align=right>
        <select name=sfl class=cssfl>
            <option value='mb_login_id'>login id</option>
        </select>
        <input type=text name=stx required itemname='search' value='<? echo $stx ?>'>
        <input type=image src='<?=$g4[hr_path]?>/img/btn_search.gif' align=absmiddle></td>
</tr>
</table>
</form>

<form name=fsingolist method=post style="margin:0px;">
<input type=hidden name=sst  value='<?=$sst?>'>
<input type=hidden name=sod  value='<?=$sod?>'>
<input type=hidden name=sfl  value='<?=$sfl?>'>
<input type=hidden name=stx  value='<?=$stx?>'>
<input type=hidden name=page value='<?=$page?>'>

<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#dedede" style="border:2px #ccc solid;" class="normal_box">
<colgroup width=110>
<colgroup width=120>
<colgroup width="">
<tr class='col1 ht center'>
    <th>#</th>
    <th>login id</th>
    <th>login time</th>
</tr>
<?

for($i=0; $row=sql_fetch_array($result_login); $i++) {
?>

<tr class='col1 ht center' bgcolor="white">
    <td><?=$row[mb_no] ?> </td>
    <td><?=$row[mb_login_id] ?></td>
    <td><?=$row[mb_login_time] ?> </td>
</tr>

<? }  if($i==0) echo "<tr class='col1 ht center' bgcolor='white' ><td colspan='$colspan'>no data</td></tr>" ?>

</table>
</form>

<?

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "?$qstr&page=");
echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr><td width=50%>";
echo "</td>";
echo "<td width=50% align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script language='javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";
?>




<?
include_once("./admin.tail.php");
?>
