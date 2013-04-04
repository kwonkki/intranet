<?
include_once("./_common.php");


 if($member[mb_level] < 5 ){
 	alert("Only Superviosr Allowed here", $g4[path]);
 }
 
 if( $_POST[w] == "u" ){
 	
 	$sql = " update asset_category set asset_category = '$_POST[categoryName]' where seq = '$_POST[seq]'  ";
 	
 	sql_query($sql);
 	
 	echo "update";
 	
 }else{

	$sql = " insert into asset_category(asset_category, reg_date, assigner ) values('$_POST[categoryName]', '$g4[time_ymdhis]', '$member[mb_id]' ) ";
	  
	sql_query($sql);
	
	echo "ok";
	echo $_POST[w];
}

?>
