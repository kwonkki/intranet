<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

function sign_list($wr_id, $board, $board_skin_path, $bo_table, $mb_id, $rows=5) {
    global $g4;

    $list = array();

    $tmp_write_table = $g4['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
    $sql = " select * from $tmp_write_table where wr_is_comment = 0 and wr_id != '$wr_id' and mb_id = '$mb_id' order by wr_num limit 0, $rows ";
    $result = sql_query($sql);
    for ($i=0; $row = sql_fetch_array($result); $i++) {
        $list[$i] = get_list($row, $board, $board_skin_path, $board[bo_subject_len]);
	}

    return $list;
} 

// 글쓴이 xp 가져오기
if($view[mb_id]) {
	$xp_info = xp_info($view[mb_id]); //현재 레벨
	$xp_class = "sign_xp_bar";
	if($xp_info[per] == "100") $xp_class = "sign_xp_maxbar";
	$xp_grade = "&nbsp;<span class='xp_grade'>".$xp_info[grade]."</span>";

	$sign_list = sign_list($wr_id, $board, $board_skin_path, $bo_table, $view[mb_id], 5);
}

if(!$signature) $signature = "<span style='color:#888;'>등록된 서명이 없습니다.</span>";

?>

<link rel="stylesheet" href="<?=$sign_skin_path?>/<?=$amina[sign_css]?>.css" type="text/css">

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<col width="80"><col width="10"><col width="17"><col />
<tr>
<td valign=top align=center class='sign_photo'>
	<?=mb_photo($member[mb_id], $view[mb_id], 80, 80)?>
</td>
<td></td>
<td valign="top" class='sign_arrow'><img src="<?=$sign_skin_path?>/img/sign_arrow.gif" /></td>
<td valign=top class='sign_content'>
	<table border=0 cellpadding=10 cellspacing=0 width=100%>
	<tr><td>
		<table border=0 cellpadding=0 cellspacing=0>
		<tr>
		<td><b><?=xp_icon($view[mb_id],$xp_info[level])?> <?=$view[name]?></b> <?=$xp_grade?></td>
		<? if($xp[xp_use] == 1) { ?>
			<td width=20></td>
			<td><div class="sign_xp_percent"><?=number_format($xp_info[per])?>%</div></td>
			<td><div class="<?=$xp_class?>"><div style="width:<?=(int)$xp_info[per]?>%">&nbsp;</div></div></td>
			<td width=20></td>
			<td><span style='font:bold 11px verdana;'>Exp <?=number_format($xp_info[xp])?></span></td>
			<td width=20></td>
			<td><span style='font:bold 11px verdana;'>Point <?=number_format($xp_info[point])?></span></td>
		<? } ?>
		</tr>
		</table>
	</td></tr>
	<tr><td style="padding-top:0px;">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr><td class="signature">
			<?=$signature?>
		</td></tr>
		<? if($sign_list) { ?>
			<tr height=10><td></td></tr>
			<tr><td>
				<table border=0 cellpadding=0 cellspacing=0 width=100% class="sign_list">
			    <? for ($i=0; $i<count($sign_list); $i++) { 
					$sign_list[$i][href] = $sign_list[$i][href]."".$frame_opt;
					$sign_list[$i][datetime2] = date("m.d", strtotime($sign_list[$i][wr_datetime]));
				?>
				    <tr height=22>
			        <td class="subject">
		            <? 
						list($sign_list[$i][img]) = amina_attach_img($sing_list[$i][file], $sign_list[$i][wr_content], 1);

						echo $sign_list[$i][reply];
			            echo $sign_list[$i][icon_reply];
						echo "<a href='{$sign_list[$i][href]}'>ㆍ";
						if($is_category && $sign_list[$i][ca_name]) echo "[{$sign_list[$i][ca_name]}] ";
						echo "{$sign_list[$i][subject]}</a>";
			            if ($sign_list[$i][comment_cnt]) echo " <span class='comment'>{$sign_list[$i][comment_cnt]}</span>";
				        if($list[$i][img]) echo " <img src='{$board_skin_path}/img/icon_image.gif' border=0 align=absmiddle>";
						if(amina_attach_file($list[$i][file])) echo " <img src='{$board_skin_path}/img/icon_file.gif' border=0 align=absmiddle>";
			            echo " " . $sign_list[$i][icon_secret];
			            echo " " . $sign_list[$i][icon_new];
						echo " " . $sign_list[$i][icon_hot];
		            ?>
			        </td>
				    <? if ($is_good) { ?><td width=40><div class="good"><?=$sign_list[$i][wr_good]?></div></td><? } ?>
					<? if ($is_nogood) { ?><td width=40><div class="nogood"><?=$sign_list[$i][wr_nogood]?></div></td><? } ?>
			        <td class="num" width=50 align=right><?=$sign_list[$i][wr_hit]?> Hit</td>
					<td class="num" width=60 align=right><?=$sign_list[$i][datetime2]?></td>
					</tr>
				<? } ?>
				</table>
			</td></tr>
		<? } ?>
		</table>
	</td></tr>
	</table>
</td>
</tr>
</table>
