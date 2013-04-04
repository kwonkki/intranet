<?
include_once("./_common.php");

if($_POST['type'] == "login"){
	
	
	
	$sql = " insert into mb_login (mb_login_id, mb_login_time) values ( '{$member['mb_id']}', '{$g4[time_ymdhis]}' ) ";
	$result = sql_query($sql);
	echo "000";
		
}else if($_POST['type'] == "logout"){
	
	$sql = " insert into mb_logout (mb_logout_id, mb_logout_time) values ( '{$member['mb_id']}', '{$g4[time_ymdhis]}' ) ";
	$result = sql_query($sql);
	echo "000";
	
} else{
	
	echo "-1";
}


?>
