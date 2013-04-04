<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<link rel="stylesheet" type="text/css" href="<?=$latest_skin_path?>/ez_basic.latest.skin.css"  />

<div class="ez_basic_latest_box">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td height="5" colspan="4"></td>
</tr>
<tr>
    <td width=14>&nbsp;</td>
    <td width='100%'><img src='<?=$latest_skin_path?>/img/picons09.png' border=0 align="absmiddle">&nbsp;<strong><?=$board[bo_subject]?></a></strong></td>
    <td width=37><a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'><img src='<?=$latest_skin_path?>/img/btn_more.gif' border=0></a></td>
    <td width=14>&nbsp;</td>
</tr>
<tr>
    <td height="5" colspan="4"></td>
</tr>
<tr>
    <td height="1" colspan="4">
		<div style="border-top:1px solid #ccc; padding:0px; margin:0 5px;"></div>
	</td>
</tr>
<tr>
    <td height="5" colspan="4"></td>
</tr>
</table>

<ul>
<? for ($i=0; $i<count($list); $i++) { ?>
	<li>
			<?
			echo $list[$i]['icon_reply'] . " ";
			echo "<a href='{$list[$i]['href']}'>";
			if ($list[$i]['is_notice'])
				echo "{$list[$i]['subject']}";
			else
				echo "{$list[$i]['subject']}";
			echo "</a>";

			if ($list[$i]['comment_cnt']) 
				echo " <a href=\"{$list[$i]['comment_href']}\" id='cmt'>{$list[$i]['comment_cnt']}</a>";
				echo " " . $list[$i][icon_new];
			?>
	</li>

<? } ?>
</ul>


<?

 if (count($list) == 0) {
	for($i=0; $i < $rows; $i++) { 
	
	echo "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr><td colspan=3 align=center height=25>자료가 없습니다.</td></tr></table>";

	}
  }
?>
</div>

