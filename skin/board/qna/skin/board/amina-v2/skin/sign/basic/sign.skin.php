<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 글쓴이 xp 가져오기
if($view[mb_id]) {
	$xp_info = xp_info($view[mb_id]); //현재 레벨
	$xp_class = "sign_xp_bar";
	if($xp_info[per] == "100") $xp_class = "sign_xp_maxbar";
	$xp_grade = "&nbsp;<span class='xp_grade'>".$xp_info[grade]."</span>";
}

if(!$signature) $signature = "<span style='color:#888;'>등록된 서명이 없습니다.</span>";

?>

<link rel="stylesheet" href="<?=$sign_skin_path?>/<?=$amina[sign_css]?>.css" type="text/css">

<table align=right border=0 cellpadding=0 cellspacing=0 width=280>
<tr>
<td width=280 style="padding:20px 0px 8px;">
	<b><?=xp_icon($view[mb_id],$xp_info[level])?> <?=$view[name]?></b> <?=$xp_grade?>
</td>
</tr>
<? if($xp[xp_use] == 1) { ?>
<tr><td class='sign_xp'>
	<table border=0 cellpadding=0 cellspacing=0>
	<tr>
	<td><div class="sign_xp_percent"><?=number_format($xp_info[per])?>%</div></td>
	<td><div class="<?=$xp_class?>"><div style="width:<?=(int)$xp_info[per]?>%">&nbsp;</div></div></td>
	<td width=20></td>
	<td><span style='font:normal 11px verdana;'>Exp<br> <?=number_format($xp_info[xp])?></span></td>
	<td width=20></td>
	<td><span style='font:normal 11px verdana;'>Point<br> <?=number_format($xp_info[point])?></span></td>
	</tr>
	</table>
</td></tr>
<? } ?>
<tr><td class='signature'>
	<?=$signature?>
</td></tr>
</table>
