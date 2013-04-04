<?
if (!defined("_GNUBOARD_")) exit; // 媛�� ���吏���렐 遺�� 
?>

<style type="text/css">
/*
諛�� 
http://html.nhndesign.com/uio_factory/ui_pattern/box/1

�대�吏����
.section .hx{margin:0;padding:10px 0 7px 9px;border:1px solid #fff;background:#f7f7f7;font-size:12px;line-height:normal;color:#333}
*/
.section{position:relative;border:1px solid #ccc;background:#fff;font-size:12px;line-height:normal;*zoom:1}
.section .hx{margin:0;padding:10px 0 7px 9px;border:1px solid #fff;background:#f7f7f7;font-size:12px;line-height:normal;color:#333}
.section .tx{padding:10px;border-top:1px solid #e9e9e9;color:#666}
.section .section_more{position:absolute;top:9px;right:10px;font:11px Dotum, ���, Tahoma;color:#656565;text-decoration:none !important}
.section .section_more span{font:14px/1 Tahoma;color:#6e89aa}
.section strong.menu{ color: white; display: block; border-bottom: 1px solid white; padding: 5px 5px 4px 10px; font-size: 10px; background: #364155 no-repeat 174px 3px;}
</style>

<div class="section">
	<strong class="menu">Active Employee</strong>
	<div class="hx"><a href='<?=$g4['bbs_path']?>/current_connect.php'><strong>All</strong> : <?=$row['total_cnt']?> (member <?=$row['mb_cnt']?>)</a></div>
</div>
