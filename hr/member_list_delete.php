<?
$sub_menu = "900100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "d");

check_token();

$msg = "";
for ($i=0; $i<count($chk); $i++) 
{
    // 실제 번호를 넘김
    $k = $_POST['chk'][$i];

    $mb = get_member($_POST['mb_id'][$k]);

    if (!$mb[mb_id]) {
        $msg .= "$mb[mb_id] : no member data.\\n";
    } else if ($member[mb_id] == $mb[mb_id]) {
        $msg .= "$mb[mb_id] : you cant delete higher level.\\n";
    } else if (is_admin($mb[mb_id]) == "super") {
        $msg .= "$mb[mb_id] : try to delete later.\\n";
    } else if ($is_admin != "super" && $mb[mb_level] >= $member[mb_level]) {
        $msg .= "$mb[mb_id] : you cant delete higher level.\\n";
    } else {
        // 회원자료 삭제                                             
        member_delete($mb[mb_id]);
    }
}

if ($msg)
    echo "<script language='JavaScript'> alert('$msg'); </script>";

goto_url("./member_list.php?$qstr");
?>
