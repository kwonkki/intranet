<? if ($board[bo_use_good] || $board[bo_use_nogood]) { ?>
	<style>
		.good_tbl { }
		.good_tbl td {font:bold 12px dotum; color:#fff; line-height:180%;}
		.good_tbl span{float:left; margin:5px 0 0 27px; font:bold 12px dotum; color:#fff; line-height:180%;}
		.good_tbl .gg{width:100px; height:30px; cursor:pointer; background:url('<?=$good_skin_path?>/img/btn_good.gif');}
		.good_tbl .gn{width:100px; height:30px; cursor:pointer; background:url('<?=$good_skin_path?>/img/btn_nogood.gif'); margin:0 0 0 10px;}
	</style>

	<table border=0 cellpadding=0 cellspacing=0 class="good_tbl">
	<tr>
	<? if ($board[bo_use_good]) { ?><td><div class="gg" onclick="<?=$good_act?>"><span>추천 : <?=number_format($write[wr_good])?></span></div></td><? } ?>
	<? if ($board[bo_use_nogood]) { ?><td><div class="gn" onclick="<?=$nogood_act?>"><span>비추 : <?=number_format($write[wr_nogood])?></span></div></td><? } ?>
	</tr>
	</table>
<? } ?>
