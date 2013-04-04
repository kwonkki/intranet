<?php
include_once("./_common.php");


if( $is_admin){
	
	echo $_POST[member_id];
	
	$sql_search = " where (1) ";
	
	if( isset($member_id)){
		//$sql_search .= " and ( mb_login_id = $member_id  ) ";	
	}else{
	}
	$sql = " select 	mb_no, mb_login_id, mb_login_time 
						,DATE_FORMAT(mb_login_time,'%Y-%m-%d') as cur_date
						,DATE_FORMAT(mb_login_time,'%H:%i') as cur_time
			from mb_login
			$sql_search
			order by cur_date asc
	 ";
	 
	 ChromePhp::log($sql);
 
}else{

	$sql = " select 	mb_no, mb_login_id, mb_login_time 
						,DATE_FORMAT(mb_login_time,'%Y-%m-%d') as cur_date
						,DATE_FORMAT(mb_login_time,'%H:%i') as cur_time
			from mb_login
			where mb_login_id = '$member[mb_id]'
			order by cur_date asc
	 ";
}
 
$result = sql_query($sql);



$sql_array=array();
for ($i=0; $row=sql_fetch_array($result); $i++){
	
	$sql_array[] = array('title' => '['.$row[mb_login_id].']'.'login : '.$row['cur_time'], 'start' => $row['cur_date']);
}

echo json_encode($sql_array);
 
?>
