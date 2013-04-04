<? if ($board[bo_use_good] || $board[bo_use_nogood]) { ?>
	<style>
		.good_tbl { margin:20px 0; }
		.good_tbl .gg{width:60px; height:60px; cursor:pointer; background:url('<?=$good_skin_path?>/img/good.gif') no-repeat top left; font:bold 15px tahoma; padding-top:10px; text-align:center; color:#ff3f01; }
		.good_tbl .gn{width:60px; height:60px; cursor:pointer; background:url('<?=$good_skin_path?>/img/nogood.gif') no-repeat top left; font:bold 15px tahoma; padding-top:10px; text-align:center; color:#017ba2; }
	</style>

	<table border=0 cellpadding=0 cellspacing=0 class="good_tbl">
	<tr>
	<? if ($board[bo_use_good]) { ?>
		<td width=10></td>
		<td><div class="gg" onclick="<?=$good_act?>"><?=number_format($write[wr_good])?></div></td>
	<? } ?>
	<? if ($board[bo_use_nogood]) { ?>
		<td width=10></td>
		<td><div class="gn" onclick="<?=$nogood_act?>"><?=number_format($write[wr_nogood])?></div></td>
	<? } ?>
	<td width=10></td>
	</tr>
	</table>
<? } ?>
