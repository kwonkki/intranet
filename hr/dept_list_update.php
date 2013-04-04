<?
$sub_menu = "900200";
include_once("./_common.php");

if ($w == 'u')
    check_demo();

auth_check($auth[$sub_menu], "w");

check_token();

$sql_common = " dept_name         	= '$_POST[mb_department]',
                dept_created        = '$g4[time_ymdhis]'
";

if ($w == "")
{

    // 불당팩 - mb_nick을 db에 추가
    $sql2 = " insert dept set  $sql_common ";
    sql_query($sql2);

}
else if ($w == "u")
{
	
	$sql2 = " update dept set  $sql_common where dept_no = '$dept_id' ";
    sql_query($sql2);
   
}
else
    alert("no parameter.");

goto_url("./dept_list.php");


?>
