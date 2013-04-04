<?
$sub_menu = "300100";
include_once("./_common.php");

if ($w == 'u')
    check_demo();

auth_check($auth[$sub_menu], "w");

check_token();

$sql_common = " vacation_name         	= '$_POST[mb_vacation]',
                vacation_created        = '$g4[time_ymdhis]'
";

if ($w == "")
{

    // 불당팩 - mb_nick을 db에 추가
    $sql2 = " insert vacation set  $sql_common ";
    sql_query($sql2);

}
else if ($w == "u")
{
	
	$sql2 = " update vacation set  $sql_common where vacation_no = '$vacation_id' ";
    sql_query($sql2);
   
}
else
    alert("no parameter.");

goto_url("./vacation_list.php");


?>
