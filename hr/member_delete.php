<?
$sub_menu = "200100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "d");

$mb = get_member($_POST['mb_id']);

if (!$mb[mb_id])
    alert("no member data.");
else if ($member[mb_id] == $mb[mb_id])
    alert("try later - 3.");
else if (is_admin($mb[mb_id]) == "super")
    alert("member is super admin.");
else if ($mb[mb_level] >= $member[mb_level])
    alert("you cant delete the higher lever.");

check_token();

// 회원자료 삭제
member_delete($mb[mb_id]);

if ($url)
    goto_url("{$url}?$qstr&w=u&mb_id=$mb_id");
else
    goto_url("./member_list.php?$qstr");
?>
