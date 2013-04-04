<?
if (!defined("_GNUBOARD_")) exit; // 媛�� ���吏���렐 遺�� 

/*
 *     latest.skin Gallery for Gnuboard4
 * 	    
 *      Copyright 2012.1.2 Man Hyung, cho
 *      
 *      File encoding: Korean(EUC-KR)
 * 
 */


$is_crop = 1;
// $is_crop     : �몃� ���媛�$height瑜���� ��crop ��寃��吏�� 寃곗�
//                0 : crop ��� ������
//                1 : 湲곕낯 crop
//                2 : 以����湲곗��쇰� crop
// $col_width = (int)(99 / $cols);


//遺����--------------------------------------------------------------//
$img_width = 510; //������대�吏�� 媛���ъ�利�
$img_height = 260; //������대�吏�� �몃��ъ�利�


//�몄�留������━�����몄�利��吏�
$th['filter'] = array();
$th['filter']['type'] = 90; 
$th['filter']['arg1'] = 100;
$th['filter']['arg2'] = 1;
$th['filter']['arg3'] = 2;

$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb';
$no_img = $latest_skin_path."/img/no_img.gif"; 

// 遺���몄� include
include_once("$g4[path]/lib/thumb.lib.php");
//遺����--------------------------------------------------------------//

?> 

<style type="text/css">
/*<!--<![CDATA[*/
	@import url(<?php echo $latest_skin_path; ?>/latest.skin.css);
/*]]>-->*/
</style>

<link rel="stylesheet" href="<?php echo $latest_skin_path; ?>/jshowoff.css" type="text/css" media="screen, projection" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $latest_skin_path; ?>/jquery.jshowoff.min.js"></script>




        <div id="features">

<?php
	for ($i=0; $i<count($list); $i++) { 
		$thumfile = "";
		$thumb = $thumb_path.'/'.$list[$i][wr_id];
		$file = $list[$i][file][0][path] .'/'. $list[$i][file][0][file];

	// ������ ������대�吏��硫�
	if (preg_match("/\.(jpg|gif|png|bmp)$/i", $file) && file_exists($file)) { 
		$thumb = thumbnail($file, $img_width, $img_height, 0, 1, 90, 0, "",  $filter, $noimg); //泥⑤���� �몄�留���ъ�媛�

	} else { //����곗����쎌����대�吏�
			$edit_img = $list[$i]['wr_content'];
		if (eregi("data/cheditor4[^<>]*\.(gif|jp[e]?g|png|bmp)", $edit_img, $tmp)) { // data/cheditor------
			$file = $g4[path].'/' . $tmp[0]; // ���紐�
			$thumb=thumbnail($file, $img_width, $img_height, 0, 1, 90, 0, "",  $th['filter'], $noimg); //�몄�留���ъ�媛�
		}
	} 
?>
	
		<a href="#"><img src="<?php echo $thumb; ?>" alt="" title="" ></a>

<?php
	}
?>


            </div>

<script type="text/javascript">		
	$(document).ready(function(){ $('#features').jshowoff(); });
</script>




