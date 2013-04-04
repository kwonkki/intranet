<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$category_list = explode("|", $board[bo_category_list]);

?>

<link rel="stylesheet" href="<?=$cate_skin_path?>/<?=$amina[cate_css]?>.css" type="text/css">

<div class="cate_tab">
	<ul>
		<li <? if (!$sca) echo "class='on'";?>><a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?><?=$frame_opt?>">전체</a></li>
		<? for ($i=0, $m=sizeof($category_list); $i<$m; $i++) { ?>
			<li <? if ($sca == $category_list[$i]) echo "class='on'";?>><a 	href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&sca=<?=urlencode($category_list[$i])?><?=$frame_opt?>"><?=$category_list[$i]?></a></li>
		<? } ?>
		<li class=end><a>글 <span class=cnt><?=number_format($total_count)?></span> 개</a></li>
	</ul>
</div>
<div style="clear:both;"></div>
