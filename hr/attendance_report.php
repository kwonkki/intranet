<?
$sub_menu = "300300";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

$g4[title] = "Attendance Report";
include_once("./admin.head.php");


//echo insert_vacation_point('test', '10', "{$g4['time_ymd']} vacation", "@vacation", $member['mb_id'], $g4['time_ymd']);

?>

<?
include_once ("./admin.tail.php");
?>
