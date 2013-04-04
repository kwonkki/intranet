<?php
$g4_path = "../../..";
include_once("$g4_path/common.php");
$time = date('m/d');

switch($wr){
case "5" :{
			$sql = " update $write_table
					 set wr_5 = '$pc'
					 where wr_id = '$wr_id'";
			echo $sql;
			}break;

case "6" :{
			$sql = " update $write_table
					 set wr_6 = '$pc'
					 where wr_id = '$wr_id'";
			echo $sql;
			}break;

case "7" :{
			$sql = " update $write_table
					 set wr_7 = '$pc'
					 where wr_id = '$wr_id'";
			echo $sql;
			}break;
}
sql_query($sql);

echo"
    <script type='text/javascript'>
    //parent.opener.location.href = '$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id=$wr_id';
    //parent.opener.location.reload();
	parent.opener.location.href = '$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id=$wr_id';
    window.close();
    </script>
    ";
?>