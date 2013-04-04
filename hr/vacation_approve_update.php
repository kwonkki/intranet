<?
$sub_menu = "100100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "w");

check_token();





for ($i=0; $i<count($chk); $i++) 
{
    // 실제 번호를 넘김
    $k = $_POST['chk'][$i];
    
    $requestor 			= $_POST['mb_id'][$k];
    $vacation_point	 	= $_POST['wr_2'][$k];
    $vacation_type	 	= $_POST['wr_1'][$k];
    $vacation_day	 	= $_POST['wr_content'][$k];
    $post_mb_id	 		= $_POST['mb_id'][$k];
    
    $sql = " update g4_write_vacation
            set 	wr_9               = 'approved',
                	wr_10              = 'approved',
                	wr_8              = '{$g4['time_ymdhis']}'
          where wr_id            = '{$_POST['wr_id'][$k]}' ";
          
    sql_query($sql);
    
    $mb = get_member($post_mb_id);

	if( ($vacation_type == "annual leave") || ($vacation_type == "sick leave") )
		insert_vacation_point( $requestor, -$vacation_point, "vacation approved. before deduct : <font color='blue'>$mb[mb_vacation_point]</font>. days : <font color=blue>[$vacation_day]</font>", "@vacation", $member['mb_id'], $g4['time_ymd']);
	else
		insert_vacation_point( $requestor, 0, "vacation approved. no deduction : <font color='blue'>$mb[mb_vacation_point]</font>. days : <font color=blue>[$vacation_day]</font>", "@vacation", $member['mb_id'], $g4['time_ymd']);				    
    
    //
    
/*
    $sql = " update g4_write_a30
            set wr_9               = '{$_POST['wr_9'][$k]}',
                	wr_10              = '{$_POST['wr_10'][$k]}',
                	is_draw              = '{$_POST['draw'][$k]}',
                	wr_is_comment              = '{$_POST['wr_is_comment'][$k]}'
          where wr_id            = '{$_POST['wr_id'][$k]}' ";
    sql_query($sql);
    
    

    $mb_id = $_POST['mb_id'][$k];
    $mb_level = $_POST['mb_level'][$k];
    $mb_intercept_date = $_POST['mb_intercept_date'][$k];

    //$mb = get_member($mb_id);

    $sql = " update g4_write_a30
                set wr_9               = '{$_POST['wr_9'][$k]}',
                    	wr_10              = '{$_POST['wr_10'][$k]}',
                    	is_draw              = '{$_POST['draw'][$k]}',
                    	wr_is_comment              = '{$_POST['wr_is_comment'][$k]}'
              where wr_id            = '{$_POST['wr_id'][$k]}' ";
    sql_query($sql);
    
  */  
}



if ($msg)
    echo "<script language='JavaScript'> alert('$msg'); </script>";

goto_url("./vacation_approve_list.php?param=3");
?>
