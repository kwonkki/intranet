<?
$sub_menu = "300100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

switch($param){
	case '1' :
		$b1 = "class=bold";
		break;
	case '2' :
		$b2 = "class=bold";
		break;
	case '3' :
		$b3 = "class=bold";
		break;
	case '4' :
		$b4 = "class=bold";
		break;
	default :
		$b0 = "class=bold";
		break;
}


$sql_common = " from g4_write_vacation ";

switch($param){
	case "1" :
		$vl_sql = " and wr_10 = 'process' ";
		$vl_sql2 = " and wr_9 = 'approved by supervisor' ";
		break;
	case "2" :
		$vl_sql = " and wr_10 = 'process' ";
		$vl_sql2 = " and wr_9 = 'waiting for supervisor' ";
		break;
	case "3" :
		$vl_sql = " and wr_10 = 'approved' ";
		$vl_sql2 = "";
		break;
	case "4" :
		$vl_sql = " and wr_10 = 'canceled' ";
		$vl_sql2 = "";
		break;
}


$sql_search = " where (1) $vl_sql $vl_sql2  ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case "mb_point" :
            $sql_search .= " ($sfl >= '$stx') ";
            break;
        case "mb_level" :
            $sql_search .= " ($sfl = '$stx') ";
            break;
        case "mb_tel" :
        case "mb_hp" :
            $sql_search .= " ($sfl like '%$stx') ";
            break;
        default :
            $sql_search .= " ($sfl like '$stx%') ";
            break;
    }
    $sql_search .= " ) ";
}

//if ($is_admin == 'group') $sql_search .= " and mb_level = '$member[mb_level]' ";
if ($is_admin != 'super') 
    $sql_search .= " and mb_level <= '$member[mb_level]' ";

if (!$sst) {
    $sst = "wr_datetime";
    $sod = "desc";
}

$sql_order = " order by $sst $sod ";

$sql = " select count(*) as cnt
         $sql_common
         $sql_search
         $sql_order ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$rows = $config[cf_page_rows];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if (!$page) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$listall = "<a href='$_SERVER[PHP_SELF]' class=tt>first page</a>";

$g4[title] = "Vacation Approve Management";
include_once("./admin.head.php");

$sql = " select *
          $sql_common
          $sql_search
          $sql_order
          limit $from_record, $rows ";
$result = sql_query($sql);

$colspan = 15;
?>

<script type="text/javascript" src="<?=$g4[path]?>/js/sideview.js"></script>
<script language="JavaScript">
var list_update_php = "member_list_update.php";
var list_delete_php = "member_list_delete.php";
</script>

<table width=100%>
<form name=fsearch method=get>
<tr>
    <td width=60% align=left> 
	<a 	<?=$b0 ?>	href="<?=$_SERVER['PHP_SELF']?>">All</a> |   
	<a 	<?=$b1 ?>	href="<?=$_SERVER['PHP_SELF']?>?param=1">approved by supervisor</a> |   
	<a 	<?=$b2 ?>	href="<?=$_SERVER['PHP_SELF']?>?param=2">waiting for supervisor</a> |  
	<a 	<?=$b3 ?>	href="<?=$_SERVER['PHP_SELF']?>?param=3">approved</a> |   
	<a 	<?=$b4 ?>	href="<?=$_SERVER['PHP_SELF']?>?param=4">canceled</a>   
    </td>
    <td width=40% align=right>
        <select name=sfl class=cssfl>
            <option value='mb_id'>member id</option>
        </select>
        <input type=text name=stx class=ed required itemname='search' value='<? echo $stx ?>'>
        <input type=image src='<?=$g4[hr_path]?>/img/btn_search.gif' align=absmiddle></td>
</tr>
</form>
</table>

<form name=fmemberlist method=post>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>

<table width=100% cellpadding=0 cellspacing=0>
<colgroup width=30>
<colgroup width=100>
<colgroup width=50>
<colgroup width=110>
<colgroup width=30>
<colgroup width=80>
<colgroup width=30>
<colgroup width=''>
<colgroup width=50>
<colgroup width=30>

<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
    <td><input type=checkbox name=chkall value='1' onclick='check_all(this.form)'></td>
    <td><?=subject_sort_link('wr_datetime')?>request date</a></td>
    <td><?=subject_sort_link('mb_id')?>requestor</a></td>
    <td><?=subject_sort_link('wr_1')?>vl type</a></td>
    <td><?=subject_sort_link('wr_2', '', 'desc')?>days</a></td>
    <td><?=subject_sort_link('wr_content', '', 'desc')?>dates</a></td>
    <td><?=subject_sort_link('wr_3', '', 'desc')?>approver</a></td>
    <td><?=subject_sort_link('wr_9', '', 'desc')?>details</a></td>
    <td><?=subject_sort_link('wr_10', '', 'desc')?>vl status</a></td>
    <td><?=subject_sort_link('wr_10', '', 'desc')?>file</a></td>
    
    
</tr>

<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<?
for ($i=0; $row=sql_fetch_array($result); $i++) {

    $mb_nick = get_sideview($row[mb_id], $row[mb_nick], $row[mb_email], $row[mb_homepage]);

    $mb_id = $row[mb_id];
    if ($row[mb_leave_date])
        $mb_id = "<font color=crimson>$mb_id</font>";
    else if ($row[mb_intercept_date])
        $mb_id = "<font color=orange>$mb_id</font>";
        
	$arrContent =  explode(",", $row['wr_content']);
	$vlTmp ="";
	foreach ($arrContent as $value){
		$vlTmp .= $value."<br>";
	}        

    $list = $i%2;
    echo "
    <input type=hidden name=wr_id[$i] value='$row[wr_id]'>
    <input type=hidden name=wr_9[$i] value='$row[wr_9]'>
    <input type=hidden name=wr_10[$i] value='$row[wr_10]'>
    <input type=hidden name=wr_1[$i] value='$row[wr_1]'>
    <input type=hidden name=wr_content[$i] value='$row[wr_content]'>
    <input type=hidden name=wr_2[$i] value='$row[wr_2]'>
    <input type=hidden name=mb_id[$i] value='$row[mb_id]'>
    <tr class='list$list col1 ht center'>
        <td><input type=checkbox name=chk[] value='$i'></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>".date( 'Y-m-d', strtotime($row['wr_datetime']))."</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'><u>$row[mb_id]</u></nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[wr_1]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[wr_2]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$vlTmp</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[wr_3]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[wr_9]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[wr_10]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>file</nobr></td>
    </tr>";
}

if ($i == 0)
    echo "<tr><td colspan='$colspan' align=center height=100 class=contentbg>no data.</td></tr>";

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "?$qstr&page=");
echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr><td width=50%>";
echo "<input type=button class='btn1' value='approve' onclick=\"vacation_approve(this.form)\">&nbsp;";
echo "<input type=button class='btn1' value='cancel' onclick=\"vacation_cancel(this.form, 'vacation_cancel')\">";
echo "</td>";
echo "<td width=50% align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script language='javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";
?>
</form>

* Delete - meaning make employee resign<br />
* If employee lever is higher than 5, meaning "supervisor"

<script>

function vacation_approve(f)
{
    
    f.action = 'vacation_approve_update.php';
    var chk = document.getElementsByName("chk[]");
    var bchk = false;

    for (i=0; i<chk.length; i++)
	{
	    if (chk[i].checked)
	        bchk = true;
	}

	if (!bchk) 
	{
	    alert("please select the item.");
	    return;
	}
	
	
    f.submit();
}



// POST 방식으로 delete
function post_delete(action_url, val)
{
	var f = document.fpost;

	if(confirm("Do you want to make selected Employee resign?")) {
        f.mb_id.value = val;
		f.action      = action_url;
		f.submit();
	}
}
</script>

<form name='fpost' method='post'>
<input type='hidden' name='sst'   value='<?=$sst?>'>
<input type='hidden' name='sod'   value='<?=$sod?>'>
<input type='hidden' name='sfl'   value='<?=$sfl?>'>
<input type='hidden' name='stx'   value='<?=$stx?>'>
<input type='hidden' name='page'  value='<?=$page?>'>
<input type='hidden' name='token' value='<?=$token?>'>
<input type='hidden' name='mb_id'>
</form>

<?
include_once ("./admin.tail.php");
?>
