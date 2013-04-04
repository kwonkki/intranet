<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<br><br><br>

<table border=0 cellpadding=0 cellspacing=0 width="100%" style="border:1px solid #eee;">
<tr><td style="padding:10px;">
	<form name="aminastar" method="post" onsubmit="return star_submit(this);" autocomplete="off">
	<input type='hidden' name=bo_table value='<?=$bo_table?>'>
	<input type='hidden' name=wr_id  value='<?=$wr_id?>'>
	<table border=0 cellpadding=0 cellspacing=0 width="100%">
	<col width=140><col/><col width=140>
	<tr>
	<td align=center style="padding-right:12px;">
		<?=amina_star_mark($amina[star_color], $view[wr_7], "l")?>
		<?
			$star = amina_array_star($view[wr_7]);
			if(!$star[people]) $star[people] = 0;
			$score = 0;
			if($star[people] > 0) $score = $star[score] / $star[people];
			$score = round($score,1);
		?>
		<div style="clear:both; text-align:center; padding-top:4px;color:#888;">( <?=$score?>점 / <?=$star[people]?>명 )</div>
	</td>
	<td align=center style="padding:0px 10px; border-left:1px solid #eee; border-right:1px solid #eee;">
		<table border=0 cellpadding=0 cellspacing=0 width="100%">
		<tr>
		<td align=center width="20%"><?=amina_star_mark($amina[star_color],"10|1","s")?></td>
		<td align=center width="20%"><?=amina_star_mark($amina[star_color],"8|1","s")?></td>
		<td align=center width="20%"><?=amina_star_mark($amina[star_color],"6|1","s")?></td>
		<td align=center width="20%"><?=amina_star_mark($amina[star_color],"4|1","s")?></td>
		<td align=center width="20%"><?=amina_star_mark($amina[star_color],"2|1","s")?></td>
		</tr>
		<tr height=6><td colspan=5></td></tr>
		<tr>
		<td align=center><input type="radio" name="star" value="10" checked ></td>
		<td align=center><input type="radio" name="star" value="8"></td>
		<td align=center><input type="radio" name="star" value="6"></td>
		<td align=center><input type="radio" name="star" value="4"></td>
		<td align=center><input type="radio" name="star" value="2"></td>
		</tr>
		</table>
	</td>
	<td align=center style="padding-left:12px;">
		<input type=image src="<?=$star_skin_path?>/img/btn_star.gif" border=0>
	</td>
	</tr>
	</table>
	</form>
	<script type="text/javascript">
		function star_submit(f) {
		  f.target = "hiddenframe";
		  f.action = "<?=$board_skin_path?>/star.act.php";
		}
	</script>
</td>
</tr>
</table>
<br><br><br>