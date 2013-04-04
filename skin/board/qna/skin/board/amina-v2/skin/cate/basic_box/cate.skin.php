<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$category_list = explode("|", $board[bo_category_list]);

?>

<link rel="stylesheet" href="<?=$cate_skin_path?>/<?=$amina[cate_css]?>.css" type="text/css">

<table border=0 cellpadding=0 cellspacing=0 width=100% class="cate_box">
<col width=100><col /><col width=100>
<tr height=15><td colspan=3></td></tr>
<tr>
<td width=100 align=center>
		<span <? if (!$sca) echo "class='on'";?>><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>">전체</a></span>	
</td><td class=sperate>
	<ul>
	<? for ($i=0, $m=sizeof($category_list); $i<$m; $i++) { ?>
		<li <? if (urldecode($sca) == $category_list[$i]) echo "class='on'";?>><a 	href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&sca=<?=urlencode($category_list[$i])?>"><?=$category_list[$i]?></a></li>
	<? } ?>
 	</ul>
</td>
<td align=center>
	글 <span class=cnt><?=number_format($total_count)?></span> 개
</td>
</tr>
<tr height=15><td colspan=3></td></tr>
</table>

<div style="clear:both;"></div>
