<?
include_once("./_common.php");

if (!$member[mb_id]) 
    alert_close("memeber can access.");

if (!$member[mb_open] && $is_admin != "super" && $member[mb_id] != $mb_id) 
    alert_close("if you are not open your profile, you cant see the others profile");

//$mb = get_member($mb_id);
$mb = get_member($mb_id, "mb_id, mb_level, mb_point, mb_homepage, mb_open, mb_nick, mb_datetime, mb_today_login, mb_profile, mb_memo, mb_realcheck, mb_namecheck, mb_good, mb_nogood");

if (!$mb[mb_id])
    alert_close("no member information.");

// 비공개 회원의 정보는 보여주기 않기
if (!$mb[mb_open] && $is_admin != "super" && $member[mb_id] != $mb_id) {
    //$mb[mb_level] = "";
    //$mb[mb_point] = "";
    $mb[mb_profile] = "";
    $mb[mb_homepage] = "";
    $mb[mb_datetime] = "";
    $mb[mb_today_login] = "";
}

$g4[title] = $mb[mb_nick] . " profile";
include_once("$g4[path]/head.sub.php");

$mb_nick = get_sideview($mb[mb_id], $mb[mb_nick], $mb[mb_email], $mb[mb_homepage], $mb[mb_open]);

// 회원가입후 몇일째인지? + 1 은 당일을 포함한다는 뜻
$sql = " select (TO_DAYS('$g4[time_ymdhis]') - TO_DAYS('$mb[mb_datetime]') + 1) as days ";
$row = sql_fetch($sql);
$mb_reg_after = $row[days];

$mb_homepage = set_http($mb[mb_homepage]);
$mb_profile = $mb[mb_profile] ? conv_content($mb[mb_profile],0) : "no data";

echo "<script type='text/javascript' src='$g4[path]/js/sideview.js'></script>";

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
include_once("$member_skin_path/profile.skin.php");

include_once("$g4[path]/tail.sub.php");
?>
