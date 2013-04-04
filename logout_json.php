<?php
include_once("./_common.php");


if($is_admin){
$sql = " select 	mb_no, mb_logout_id, mb_logout_time 
					,DATE_FORMAT(mb_logout_time,'%Y-%m-%d') as cur_date
					,DATE_FORMAT(mb_logout_time,'%H:%i') as cur_time
		from mb_logout
		order by cur_date asc
";	
}else{
$sql = " select 	mb_no, mb_logout_id, mb_logout_time 
					,DATE_FORMAT(mb_logout_time,'%Y-%m-%d') as cur_date
					,DATE_FORMAT(mb_logout_time,'%H:%i') as cur_time
		from mb_logout
		where mb_logout_id = '$member[mb_id]'
		order by cur_date asc
";
	
}




$result = sql_query($sql);


$sql_array=array();
for ($i=0; $row=sql_fetch_array($result); $i++){
	
	$sql_array[] = array('title' => '['.$row[mb_logout_id].']'.'logout : '.$row['cur_time'], 'start' => $row['cur_date']);
}

echo json_encode($sql_array);
 
?>
