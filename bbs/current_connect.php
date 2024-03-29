<?
include_once("./_common.php");

$g4[title] = "Current access";
include_once("./_head.php");

$list = array();

$sql = " select a.mb_id, a.status, b.mb_nick, b.mb_name, b.mb_email, b.mb_homepage, b.mb_open, b.mb_point, a.lo_ip, a.lo_location, a.lo_url, a.lo_agent, a.lo_referer, a.lo_datetime, b.mb_1 , b.mb_2, b.mb_3
           from $g4[login_table] a left join $g4[member_table] b on (a.mb_id = b.mb_id)
          where a.mb_id <> '$config[cf_admin]'
          order by b.mb_1, b.mb_3, b.mb_2";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    $list[$i] = $row;

    if ($row[mb_id])
        //$list[$i][name] = get_sideview($row[mb_id], $row[mb_nick], $row[mb_email], $row[mb_homepage]);
        $list[$i][name] = get_sideview($row[mb_id], cut_str($row[mb_nick], $config[cf_cut_name]), $row[mb_email], $row[mb_homepage]);
    else
    {
        if ($is_admin)
            $list[$i][name] = $row[lo_ip];
        else
            $list[$i][name] = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", "\\1.♡.\\3.\\4", $row[lo_ip]);
    }

    $list[$i][num] = sprintf("%03d",$i+1);
}

$write_pages = get_paging($config[cf_write_pages], $page, $total_page, "?gr_id=$gr_id&page=");

echo "<script type=\"text/javascript\" src=\"$g4[path]/js/sideview.js\"></script>\n";

$connect_skin_path = "$g4[path]/skin/connect/$config[cf_connect_skin]";

include_once("$connect_skin_path/current_connect.skin.php");

include_once("./_tail.php");
?>
