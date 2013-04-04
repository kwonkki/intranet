<?
include_once("./_common.php");


$g4['title'] = "working status";
include_once("./_head.php");

// 바꾼 시간도 저장...
if($_POST['status']){
	$tmp_sql = " update $g4[login_table] set status = '$_POST[status]' where mb_id = '$member[mb_id]' ";
	
	sql_query($tmp_sql, FALSE);
}

$sql1 = " select * from g4_login where mb_id  ='$member[mb_id]'  ";
$sql_login = sql_fetch($sql1);


?>
<div >
	<img src="<?=$g4[path]?>/images/my_status.png">
</div>
Your WORKING STATUS : <?=$sql_login['status']?> 
<form action="my_status.php" id="status" method="post">
	<select name="status"> 	
		<option value="idle">++ Choose Your Status ++</option>
		<option value="idle">idle</option>
		<option value="lunch time">lunch time</option>
		<option value="break">break</option>
		<option value="working">working</option>
		<option value="meeting">meeting</option>
		<option value="out">out</option>
	</select>
	<input type="submit" value="submit">
</form>

<?
include_once("./_tail.php");
?>
