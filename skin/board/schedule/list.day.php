﻿<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$f_day = date("Ymd",mktime(0, 0, 0, $month, $day-1, $year));
$pervyear  = substr($f_day,0,4);
$prevmonth = sprintf("%d",substr($f_day,4,2));
$prevday   = sprintf("%d",substr($f_day,6,2));

$l_day = date("Ymd",mktime(0, 0, 0, $month, $day+1, $year));
$nextyear  = substr($l_day,0,4);
$nextmonth = sprintf("%d",substr($l_day,4,2));
$nextday   = sprintf("%d",substr($l_day,6,2));

$cel_mon = sprintf("%02d",$month);
$cel_day = sprintf("%02d",$day);
$query = "SELECT * FROM $write_table WHERE wr_link1 = '$year$cel_mon$cel_day' ORDER BY wr_id ASC";
$result = sql_query($query);

$list = array();
?>
<table width="100%" height="39" border="0" cellpadding="0" cellspacing="0" background="<?=$board_skin_path?>/img/bar_bg.gif"">
<tr>
	<td width="10">&nbsp;</td>
	<td valign="bottom">
	<a href='board.php?bo_table=<?=$bo_table?>&mode=m2'><img src="<?=$board_skin_path?>/img/btn_s2_01.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=m'><img src="<?=$board_skin_path?>/img/btn_s2_02.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=w'><img src="<?=$board_skin_path?>/img/btn_s2_03.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=d'><img src="<?=$board_skin_path?>/img/btn_s_04.gif"></a></td>
	<td align="right">

<div align="right">
</span><span class="day4"><?=$year?></span><span class="day5">년</span>
<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><?if ($month == 1) { $year_pre=$year-1; $month_pre=$month; } else {$year_pre=$year-1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/y_prev.gif" border="0" title="<?=$year_pre?>년" align="abbottom" /></a> <a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><?if ($month == 12) { $year_pre=$year+1; $month_pre=$month; } else {$year_pre=$year+1; $month_pre=$month;} echo ("&year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/y_next.gif" border="0" title="<?=$year_pre?>년" align="abbottom" /></a> <span class="day4">
<?=$month?>
</span><span class="day5">월</span> <a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><?if ($month == 1) { $year_pre=$year-1; $month_pre=12; } else {$year_pre=$year; $month_pre=$month-1;} echo ("year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/m_prev.gif" border="0" title="<?=$month_pre?>월" align="abbottom" /></a> <a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><? if ($month == 12) { $year_pre=$year+1; $month_pre=1; } else {$year_pre=$year; $month_pre=$month+1;} echo ("&year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/m_next.gif" border="0" title="<?=$month_pre?>월" align="abbottom" /></a>

		<a href="./board.php?bo_table=<?=$bo_table?>&mode=d&year=<?=$prevyear?>&month=<?=$prevmonth?>&day=<?=$prevday?>">
		<img src='<?=$board_skin_path?>/img/page_prev.gif' border=0 align=absmiddle width=17 height=13>
		</a>

		<?
		 //글쓰기 권한여부
		if ($write_href) {
			$f_date = $year.$cel_mon.$cel_day;
			echo " <a href='$write_href&write[wr_link1]=$f_date'>$year 년 $month 월 $day 일</a>\n";
		} 
		else {
			echo "$year 년 $month 월 $day 일\n";
		}
		?>

		<a href="./board.php?bo_table=<?=$bo_table?>&mode=d&year=<?=$nextyear?>&month=<?=$nextmonth?>&day=<?=$nextday?>">
		<img src='<?=$board_skin_path?>/img/page_next.gif' border=0 align=absmiddle width=17 height=13>
		</a></div>
</td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td align="center" height="35">

	</td>
	<td align="right">
		<img src='<?=$board_skin_path?>/img/dia_diary.gif' border=0 align=absmiddle> 일기
		<img src='<?=$board_skin_path?>/img/dia_memorial.gif' border=0 align=absmiddle> 기념
		<img src='<?=$board_skin_path?>/img/dia_schedual.gif' border=0 align=absmiddle> 일정
		<img src='<?=$board_skin_path?>/img/dia_review.gif' border=0 align=absmiddle> 메모
	</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbline1">
<?
for ($j=0; $row=mysql_fetch_array($result); $j++) {
	$list[$j][wr_id]       = $row[wr_id];
	$list[$j][wr_subject]  = $row[wr_subject];
	$list[$j][wr_link1]        = $row[wr_link1];
	$list[$j][wr_datetime]  = substr($row[wr_datetime],0,10);

	switch ($row[wr_3]) { 
	case 1 :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_diary.gif' border=0 align=absmiddle> 일기"; 
		break; 
	case 2 :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_memorial.gif' border=0 align=absmiddle> 기념"; 
		break; 
	case 3 :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_schedual.gif' border=0 align=absmiddle> 일정"; 
	    break; 
	default :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_review.gif' border=0 align=absmiddle> 메모"; 
	}
}
?>
<tr>
	<td class="tbline2 bbs_head bbs_fhead" align="center" width="80">분류</td>
	<td class="tbline2 bbs_head bbs_fhead" align="center">등록된 제목</td>
	<td class="tbline2 bbs_head bbs_fhead" align="center" width="80">등록일</td>
</tr>
<? for($k=0; $k<count($list); $k++) {?>
<tr>
	<td class="tbline2" height="25" align="center"><?=$list[$k][wr_3]?></td>
	<td class="tbline2">
		<a href='./board.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$k][wr_id]?>'><?=$list[$k][wr_subject]?></a>
	</td>
	<td class="tbline2" align="center"><?=$list[$k][wr_datetime]?></td>
</tr>
<? } ?>

<? if (count($list) == 0) { ?>
<tr><td class="tbline2" height="200" colspan="3" align="center">오늘 등록된 일정이 없습니다.</td></tr>
<? } ?>
</table>
