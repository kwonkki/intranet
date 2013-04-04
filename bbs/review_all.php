<?
include_once("./_common.php");



if($member[mb_level] < 5)
	echo "<script language='JavaScript'> alert('you dont have the permission'); </script>";
	
	
for ($i=0; $i<count(chk_wr_id); $i++) 
{
    // 실제 번호를 넘김
    $k = $_POST['chk_wr_id'][$i];
    
    $sql = " update g4_write_daily_report set wr_5 = 'reviwed by {$member[mb_name]}', wr_6 = '{$member[mb_name]}', wr_7 = '$g4[time_ymdhis]' where wr_id ='$k'  ";
    sql_query($sql);
}



echo "<script language='JavaScript'> alert('update the data as reviewed'); </script>";

goto_url("$g4[path]/bbs/board.php?bo_table=daily_report&review_auth=1");

?>
