<?
include_once("./_common.php");


 if($member[mb_level] < 5 ){
 	alert("Only Superviosr Allowed here", $g4[path]);
 }

$sql = " delete from asset_category where seq = '$_POST[seq]' ";

sql_query($sql);

echo "ok";

?>
