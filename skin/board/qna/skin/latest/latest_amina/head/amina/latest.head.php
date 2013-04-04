<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<table border=0 cellpadding=0 cellspacing=0 width=100%>
<tr>
<td class="latest_head_amina">
	<ul>
	<? if($tab_cnt > 1) { ?>
		<? for ($i=0; $i < $tab_cnt; $i++) { ?>
			<? if($opt[tab_act] == "click") { ?>
				<li id="Tab<?=$i?>_<?=$tab_id?>" <? if($i == 0) echo "class=on";?>><a style='cursor:pointer;' onclick="TabClk_<?=$tab_id?>('<?=$i?>','<?=$tab[$i][query]?>');"><?=$tab[$i][title]?></a></li>
			<? } else {?>
				<li id="Tab<?=$i?>_<?=$tab_id?>" <? if($i == 0) echo "class=on";?>><a href="<?=$tab[$i][href]?>" onmouseover="TabClk_<?=$tab_id?>('<?=$i?>','<?=$tab[$i][query]?>');"><?=$tab[$i][title]?></a></li>
			<? } ?>
		<? } ?>
	<? } else { ?>
		<li class=on><a href="<?=$tab[0][href]?>"><?=$tab[0][title]?></a></li>
		<li class=end><a href="<?=$tab[0][href]?>"><span class=more>+ 더보기</span></a></li>
	<? } ?>
	</ul>
</td></tr>
<? if($opt[head_gap] != 1) { ?>
	<tr height="<?=$opt[head_gap]?>"><td></td></tr>
<? } ?>
</table>