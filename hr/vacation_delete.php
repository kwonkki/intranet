<?
$sub_menu = "300100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "d");

check_token();

$msg = "";
for ($i=0; $i<count($chk); $i++) 
{
    // 실제 번호를 넘김
    $k = $_POST['chk'][$i];


    if (!$k) {
        $msg .= " no vacation parameter data.\\n";
    } else {
        // 회원자료 삭제                                             
        $sql = " delete from vacation where vacation_no = '$k' ";
        sql_query($sql);
    }
}

if ($msg)
    echo "<script language='JavaScript'> alert('$msg'); </script>";

goto_url("./vacation_list.php");


?>
