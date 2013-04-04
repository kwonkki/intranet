<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if(file_exists($g4[path]."/data/item/".$view[wr_8]."_l1")) {

	// 영카트 상품정보 불러오기
	function amina_view_it($it_id) {
		global $g4;

		// 분류사용, 상품사용하는 상품의 정보를 얻음
		$sql = " select a.*, b.ca_name, b.ca_use from $g4[yc4_item_table] a, $g4[yc4_category_table] b where a.it_id = '$it_id' and a.ca_id = b.ca_id limit 1 ";
		$it = sql_fetch($sql);

		return $it;
	}

	$it = amina_view_it($view[wr_8]);

?>
	<table width=100% cellpadding=0 cellspacing=0>
	<tr><td height=12></td></tr>
	<tr>
	<td style="padding:12px; border:1px solid #eee;">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<col width=72><col width=15><col width=20><col width=60><col width=10><col width=500><col />
		<tr>
		<td align=center>
			<b>관련상품</b>
		</td>
		<td style="border-right:1px solid #eee;">&nbsp;</td>
		<td></td>
		<td>
			<a href="<?=$g4[shop_path]?>/item.php?it_id=<?=$it[it_id]?>"><img src="<?=thumbnail($g4[path]."/data/item/".$it[it_id]."_l1", 50, 50)?>" border=0 style="display:block; border:1px solid #ddd;" title="<?=stripslashes($it[it_name])?>"></a>
		</td>
		<td></td>
		<td>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr><td>
				<? if($it[it_use]) { ?>
					<b><?=it_name_icon($it, stripslashes($it[it_name]))?></b>
				<? } else {?>
					<b><?=stripslashes($it[it_name])?></b>
				<? } ?>
			</td></tr>
			<tr height=10><td></td></tr>
			<tr><td style="color:#888;">
				<? if($it[it_use]) { ?>
					<?
						if($it[it_tel_inq]) {
							echo "전화문의";
						} else {
							if ($it[it_cust_amount]) echo "<strike>".number_format($it[it_cust_amount], 0)."원</strike> → ";
							echo "<span class=amount>".number_format(get_amount($it), 0)."원</span>";
						}
					?>
					&nbsp; / &nbsp; <?=number_format($it[it_point])?> 포인트 적립
				<? } else {?>
					판매가 종료된 상품입니다.
				<? } ?>
			</td>
			</tr>
			</table>
		</td>
		<td align=right>
			<? if($it[it_use]) { ?>
				<a href="<?=$g4[shop_path]?>/item.php?it_id=<?=$it[it_id]?>" ><span style='color:crimson;'><b>바로가기</b></span></a>
			<? } else {?>
				&nbsp;
			<? } ?>
		</td>
		</tr>
		</table>
	</td>
	</tr>
	</table>
<? } ?>
