<?php

	$wr_subject = $_POST['wr_subject'] = date('Y-m-d')." $member[mb_id] ";
	
	$wr_1 = $supervisor;
	$wr_2 = $is_admin ? "admin" : $member['mb_1'];
	
	$wr_3 = "$ext3_00|$ext3_01|$ext3_02|$ext3_03|$ext3_04|$ext3_05|$ext3_06|$ext3_07|$ext3_08|$ext3_09|$ext3_10|$ext3_11|$ext3_12|$ext3_13|$ext3_14|$ext3_15|$ext3_16|$ext3_17|$ext3_18|$ext3_19|$ext3_20|$ext3_21|$ext3_22|$ext3_23";
	
?>