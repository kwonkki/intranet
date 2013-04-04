<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<table border=0 cellpadding=0 cellspacing=0 width=100% class="latest_head_gray">
<tr height=32>
<td class="top">
	<ul>
	<? if($tab_cnt > 1) { ?>
		<? for ($i=0; $i < $tab_cnt; $i++) { ?>
			<? if($opt[tab_act] == "click") { ?>
				<li <? if($i == 0) echo "class=first";?>><a style='cursor:pointer;' onclick="TabClk_<?=$tab_id?>('<?=$i?>','<?=$tab[$i][query]?>');"><span id="Tab<?=$i?>_<?=$tab_id?>" <? if($i == 0) echo "class=on";?>><?=$tab[$i][title]?></span></a></li>
			<? } else {?>
				<li <? if($i == 0) echo "class=first";?>><a href="<?=$tab[$i][href]?>" onmouseover="TabClk_<?=$tab_id?>('<?=$i?>','<?=$tab[$i][query]?>');"><span id="Tab<?=$i?>_<?=$tab_id?>" <? if($i == 0) echo "class=on";?>><?=$tab[$i][title]?></span></a></li>
			<? } ?>
		<? } ?>
	<? } else { ?>
		<li class=first><a href="<?=$tab[0][href]?>"><span class=on><?=$tab[0][title]?></span></a></li>
		<li class=end><a href="<?=$tab[0][href]?>"><span class=more>+ 더보기</span></a></li>
	<? } ?>
	</ul>
</td></tr>
<tr><td class="bottom">
	<img src="<?=$latest_skin_path?>/img/hd_bottom_gray.gif" style="display:block;" border=0>
</td></tr>
<? if($opt[head_gap] != 1) { ?>
	<tr height="<?=$opt[head_gap]?>"><td></td></tr>
<? } ?>
</table>