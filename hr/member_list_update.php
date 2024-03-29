<?
$sub_menu = "900100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "w");

check_token();

for ($i=0; $i<count($chk); $i++) 
{
    // 실제 번호를 넘김
    $k = $_POST['chk'][$i];

    $mb_id = $_POST['mb_id'][$k];
    $mb_level = $_POST['mb_level'][$k];
    $mb_intercept_date = $_POST['mb_intercept_date'][$k];

    $mb = get_member($mb_id);

    if (!$mb[mb_id]) {
        $msg .= "$mb[mb_id] : no member data.\\n";
    } else if ($is_admin != "super" && $mb[mb_level] >= $member[mb_level]) {
        $msg .= "$mb[mb_id] : you cant update the higher level.\\n";
    } else if ($member[mb_id] == $mb[mb_id]) {
        $msg .= "$mb[mb_id] : please try update later.\\n";
    } else {
        $sql = " update $g4[member_table]
                    set mb_level          = '{$mb_level}',
                        mb_intercept_date = '{$mb_intercept_date}'
                  where mb_id             = '{$mb_id}' ";
        sql_query($sql);
    }

    // 회원레벨이 업데이트 된 경우에는 레벨업 날짜와 history를 기록 합니다.
    if ($mb[mb_level] !== $mb_level) {
        sql_query(" update $g4[member_table] set mb_level_datetime = '$g4[time_ymdhis]' where mb_id='$mb_id' ");
        sql_query(" insert into $g4[member_level_history_table] set mb_id='$mb_id', from_level='$mb[mb_level]', to_level='$mb_level', level_datetime='$g4[time_ymdhis]' ");
    }
}

if ($msg)
    echo "<script language='JavaScript'> alert('$msg'); </script>";

goto_url("./member_list.php?$qstr");
?>
