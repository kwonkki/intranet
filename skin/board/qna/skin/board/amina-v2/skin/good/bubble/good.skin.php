
<? if ($board[bo_use_good] || $board[bo_use_nogood]) { ?>
	<table border=0 cellspacing=0 cellpadding=0>
	<tr>
	<? if ($board[bo_use_good]) { ?>
	<td>
		<table border=0 cellspacing=0 cellpadding=0>
		<tr>
		<td width=63 align="left">
			<img src="<?=$good_skin_path?>/img/good_yes.gif" border=0 onclick="<?=$good_act?>" style='cursor:pointer; display:block;'>
		</td>
		<td width=8><img src="<?=$good_skin_path?>/img/good_head.gif" border=0 style="display:block;"></td>
		<td align="center" style="background: url('<?=$good_skin_path?>/img/good_bg.gif'); padding:0 6px; color:orangered; font:bold 10px verdana; letter-spacing:-1px;"><?=number_format($write[wr_good])?></td>
		<td width=2><img src="<?=$good_skin_path?>/img/good_tail.gif" border=0 style="display:block;"></td>
		</tr>
		</table> 
	</td>
	<? } ?>
	<? if ($board[bo_use_nogood]) { ?>
	<td style="padding-left:10px;">
		<table border=0 cellspacing=0 cellpadding=0>
		<tr>
		<td width=63 align="left">
			<img src="<?=$good_skin_path?>/img/good_no.gif" border=0 onclick="<?=$nogood_act?>" style='cursor:pointer; display:block;'>
		</td>
		<td width=8><img src="<?=$good_skin_path?>/img/good_head.gif" border=0 style="display:block;"></td>
		<td align="center" style="background: url('<?=$good_skin_path?>/img/good_bg.gif'); padding:0 6px; color:#666; font:bold 10px verdana; letter-spacing:-1px;"><?=number_format($write[wr_nogood])?></td>
		<td width=2><img src="<?=$good_skin_path?>/img/good_tail.gif" border=0 style="display:block;"></td>
		</tr>
		</table> 
	</td>
	<? } ?>
	</tr>
	</table>
<? } ?>

