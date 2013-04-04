<?
$sub_menu = "900100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

$sql_common = " from $g4[member_table] ";

$sql_search = " where (1) ";
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
    $sst = "mb_datetime";
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

// 탈퇴회원수
$sql = " select count(*) as cnt
         $sql_common
         $sql_search
            and mb_leave_date <> ''
         $sql_order ";
$row = sql_fetch($sql);
$leave_count = $row[cnt];

// 차단회원수
$sql = " select count(*) as cnt
         $sql_common
         $sql_search
            and mb_intercept_date <> ''
         $sql_order ";
$row = sql_fetch($sql);
$intercept_count = $row[cnt];

$listall = "<a href='$_SERVER[PHP_SELF]' class=tt>first page</a>";

$g4[title] = "Employee Management";
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

<script language="JavaScript">
function member_delete_unvisited()
{
    if (confirm("오랫동안 접속하지 않고 글작성도 없는 회원을 정리합니다\n\n정리기간 등은 /adm/member_undelete_unvisited.php에서 설정가능합니다.\n\n\n그래도 진행하시겠습니까?"))
    {
        document.location.href = "./member_delete_unvisited.php?ok=1";
    }
}
</script>

<table width=100%>
<form name=fsearch method=get>
<tr>
    <td width=50% align=left><?=$listall?> 
        (Total Employees : <?=number_format($total_count)?>, 
        <!--<a href='?sst=mb_intercept_date&sod=desc&sfl=<?=$sfl?>&stx=<?=$stx?>' title='차단된 회원부터 출력'><font color=orange>차단 : <?=number_format($intercept_count)?></font></a>,--> 
        <a href='?sst=mb_leave_date&sod=desc&sfl=<?=$sfl?>&stx=<?=$stx?>' title='order by resigned emp'><font color=crimson>Resign : <?=number_format($leave_count)?></font></a>)
        <!--&nbsp;&nbsp;<a href="javascript:member_delete_unvisited();">장기미접속회원정리</a>-->
    </td>
    <td width=50% align=right>
        <select name=sfl class=cssfl>
            <option value='mb_id'>member id</option>
            <option value='mb_name'>name</option>
            <option value='mb_nick'>nickname</option>
            <!--
            <option value='mb_level'>권한</option>
            <option value='mb_email'>E-MAIL</option>
            <option value='mb_tel'>전화번호</option>
            <option value='mb_hp'>핸드폰번호</option>
            <option value='mb_point'>포인트</option>
            <option value='mb_datetime'>가입일시</option>
            <option value='mb_ip'>IP</option>
            <option value='mb_recommend'>추천인</option>
            <option value='ug_id'>사용자그룹</option>
            <option value='mb_no'>회원번호</option>
            -->
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
<colgroup width=100>
<colgroup width=100>
<colgroup width=80>
<colgroup width=80>
<colgroup width=100>
<colgroup width=100>
<colgroup width=''>

<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
    <td><input type=checkbox name=chkall value='1' onclick='check_all(this.form)'></td>
    <td><?=subject_sort_link('mb_id')?>member id</a></td>
    <td><?=subject_sort_link('mb_1')?>dept</a></td>
    <td><?=subject_sort_link('mb_nick')?>nick name</a></td>
    <td><?=subject_sort_link('mb_level', '', 'desc')?>level</a></td>
    <td><?=subject_sort_link('mb_3', '', 'desc')?>local/expat</a></td>
    <td><?=subject_sort_link('mb_4', '', 'desc')?>working start</a></td>
    <td><?=subject_sort_link('mb_5', '', 'desc')?>regularization</a></td>
    <td><?=subject_sort_link('', '', 'desc')?>manage</a><!--<a href="./member_form.php"><img src='<?=$g4[hr_path]?>/img/icon_insert.gif' border=0 title='추가'></a>--></td>
    
    
    <!--
    <td><?=subject_sort_link('mb_point', '', 'desc')?>point</a></td>
    <td title='메일수신허용여부'><?=subject_sort_link('mb_mailling', '', 'desc')?>receive</a></td>
    <td title='정보공개여부'><?=subject_sort_link('mb_open', '', 'desc')?>public</a></td>
    <td><?=subject_sort_link('mb_leave_date', '', 'desc')?>탈퇴</a></td> 
    <td><?=subject_sort_link('mb_email_certify', '', 'desc')?>auth</a></td>
    <td><?=subject_sort_link('mb_intercept_date', '', 'desc')?>block</a></td>
    <td title='사용자그룹'><?=subject_sort_link('ug_id', '', 'desc')?>U group</a></td>
    <td title='접근가능한 그룹수'>B그룹</td>
	-->
	
</tr>

<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<?
for ($i=0; $row=sql_fetch_array($result); $i++) {
    // 접근가능한 그룹수
    $sql2 = " select count(*) as cnt from $g4[group_member_table] where mb_id = '$row[mb_id]' ";
    $row2 = sql_fetch($sql2);
    $group = "";
    if ($row2[cnt])
        $group = "<a href='./boardgroupmember_form.php?mb_id=$row[mb_id]'>$row2[cnt]</a>";

    // 사용자그룹
    $ug_id = $row[ug_id];
    if ($ug_id) {
        $result0 = sql_fetch(" select ug_subject from $g4[user_group_table] where ug_id = '$ug_id' ");
        $ug_name = "<a href='./ug_list.php?sfl=ug_id&stx=$ug_id'>". cut_str($result0[ug_subject], 6, "") . "</a>";
    } else {
        $ug_name = "";
    }
    
    if ($is_admin == 'group') 
    {
        $s_mod = "";
        $s_del = "";
    } 
    else 
    {
        $s_mod = "<a href=\"./member_form.php?$qstr&w=u&mb_id=$row[mb_id]\"><img src='img/icon_modify.gif' border=0 title='modify'></a>";
        //$s_del = "<a href=\"javascript:del('./member_delete.php?$qstr&w=d&mb_id=$row[mb_id]');\"><img src='img/icon_delete.gif' border=0 title='delete'></a>";
        $s_del = "<a href=\"javascript:post_delete('member_delete.php', '$row[mb_id]');\"><img src='img/icon_delete.gif' border=0 title='delete'></a>";
    }
    //$s_grp = "<a href='./boardgroupmember_form.php?mb_id=$row[mb_id]'><img src='img/icon_group.gif' border=0 title='그룹'></a>";

    $leave_date = $row[mb_leave_date] ? $row[mb_leave_date] : date("Ymd", $g4[server_time]);
    $intercept_date = $row[mb_intercept_date] ? $row[mb_intercept_date] : date("Ymd", $g4[server_time]);

    $mb_nick = get_sideview($row[mb_id], $row[mb_nick], $row[mb_email], $row[mb_homepage]);

    $mb_id = $row[mb_id];
    if ($row[mb_leave_date])
        $mb_id = "<font color=crimson>$mb_id</font>";
    else if ($row[mb_intercept_date])
        $mb_id = "<font color=orange>$mb_id</font>";

    $list = $i%2;
    echo "
    <input type=hidden name=mb_id[$i] value='$row[mb_id]'>
    <tr class='list$list col1 ht center'>
        <td><input type=checkbox name=chk[] value='$i'></td>
        <td title='$row[mb_id]'><nobr style='display:block; overflow:hidden; width:90;'>&nbsp;$mb_id</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[mb_1]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'><u>$mb_nick</u></nobr></td>
        <td>".get_member_level_select("mb_level[$i]", 1, $member[mb_level], $row[mb_level])."</td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'><u>$row[mb_3]</u></nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[mb_4]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[mb_5]</nobr></td>
        <td>$s_mod $s_del $s_grp</td>
        <td>$group</td>
    </tr>";
}

if ($i == 0)
    echo "<tr><td colspan='$colspan' align=center height=100 class=contentbg>no data.</td></tr>";

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "?$qstr&page=");
echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr><td width=50%>";
echo "<input type=button class='btn1' value='update' onclick=\"btn_check(this.form, 'update')\">&nbsp;";
echo "<input type=button class='btn1' value='delete' onclick=\"btn_check(this.form, 'delete')\">";
echo "</td>";
echo "<td width=50% align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script language='javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";
?>
</form>

* Delete - meaning make employee resign<br />
* If employee lever is higher than 5, meaning "supervisor"

<script>
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
