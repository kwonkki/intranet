﻿<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

//가로 세로 폭 지정
$col_height= 60 ;

$f_day = date("Ymd",mktime(0, 0, 0, $month, $day-7, $year));
$pervyear  = substr($f_day,0,4);
$prevmonth = sprintf("%d",substr($f_day,4,2));
$prevday   = sprintf("%d",substr($f_day,6,2));

$l_day = date("Ymd",mktime(0, 0, 0, $month, $day+7, $year));
$nextyear  = substr($l_day,0,4);
$nextmonth = sprintf("%d",substr($l_day,4,2));
$nextday   = sprintf("%d",substr($l_day,6,2));

$offset  = date(w, mktime(0, 0, 0, $month, 1, $year));

$cur_day = date("w",mktime(0, 0, 0, $month, $day, $year));
$minus_day = 6 - $cur_day;

$week_first = date("Ymd", mktime(0, 0, 0, $month, $day-$cur_day, $year));
$week_last  = date("Ymd", mktime(0, 0, 0, $month, $day+$minus_day, $year));
?>
<style type="text/css">
/* 카테고리 스타일*/
#box_day{width:3%; padding-left: 7px; padding-top: 4px; font-size:12px; font-family:돋움; font-weight:bold; float:left;}
#box_list{width:100%;}
#box_list2{width:100%; padding:5px 0px 5px 7px;}

#box00{width:40px;float:left;}
#box01{width:240px;float:left;}
#box02{width:40px;float:right;}
#box03{width:200px;float:right;}
#box04{width:40px;float:right;}

#box1{width:240px;float:left;}
#box2{width:240px;float:left;}

a.day1:link, a.day1:visited, a.day1:active { font-size:14px; text-decoration:none; color:#9e9e9e; }
a.day1:hover { font-size:16px;color:#9e9e9e; text-decoration:underline; font-weight:bold; }

a.day2:link, a.day2:visited, a.day2:active { font-size:14px; text-decoration:none; color:#9e9e9e; }
a.day2:hover { font-size:16px;color:#9e9e9e; text-decoration:underline; font-weight:bold; }

a.day3:link, a.day3:visited, a.day3:active { font-size:14px; text-decoration:none; color:#9e9e9e; }
a.day3:hover { font-size:16px;color:#9e9e9e; text-decoration:underline; font-weight:bold; }

.day4 {font-size:20px;color:#1641b2;}
.day5 {font-family:돋움;font-size:14px;color:#6c91c3;}
.day6 {font-size:16px;color:#308dff;}
</style>
<table width="100%" height="39" border="0" cellpadding="0" cellspacing="0" background="<?=$board_skin_path?>/img/bar_bg.gif"">
<tr>
	<td width="10">&nbsp;</td>
	<td valign="bottom">
	<a href='board.php?bo_table=<?=$bo_table?>&mode=m2'><img src="<?=$board_skin_path?>/img/btn_s2_01.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=m'><img src="<?=$board_skin_path?>/img/btn_s2_02.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=w'><img src="<?=$board_skin_path?>/img/btn_s_03.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=l'><img src="<?=$board_skin_path?>/img/btn_s2_04.gif"></a></td>
	<td align="right">

<div align="right">

<a href="./board.php?bo_table=<?=$bo_table?>&mode=w&year=<?=$prevyear?>&month=<?=$prevmonth?>&day=<?=$prevday?>"></a>
	    <span class="day6"><?=sprintf("%d",substr($week_first,0,4))?>.<?=sprintf("%d",substr($week_first,4,2))?>.<?=sprintf("%d",substr($week_first,6,2))?>. ~ <?=sprintf("%d",substr($week_last,0,4))?>.<?=sprintf("%d",substr($week_last,4,2))?>.<?=sprintf("%d",substr($week_last,6,2))?>.</span>
		

	<a href="./board.php?bo_table=<?=$bo_table?>&mode=w&year=<?=$prevyear?>&month=<?=$prevmonth?>&day=<?=$prevday?>">
	<img src='<?=$board_skin_path?>/img/y_prev.gif' border=0 align=absmiddle >	</a>
	<a href="./board.php?bo_table=<?=$bo_table?>&mode=w&year=<?=$nextyear?>&month=<?=$nextmonth?>&day=<?=$nextday?>">
	<img src='<?=$board_skin_path?>/img/y_next.gif' border=0 align=absmiddle >	</a>
	</div>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbline1">
<?
$query = "SELECT * FROM $write_table WHERE wr_link1 between '$week_first' AND '$week_last' ORDER BY wr_id ASC";

$result = sql_query($query);

$list = array();
for ($j=0; $row=mysql_fetch_array($result); $j++) {
	$list[$j][wr_id]      = $row[wr_id];
	$list[$j][wr_subject] = $row[wr_subject];
	$list[$j][wr_link1]   = $row[wr_link1];
	$list[$j][wr_6]       = $row[wr_6];
	$list[$j][wr_7]       = $row[wr_7];
	$list[$j][wr_5]       = $row[wr_5];

	switch ($row[wr_3]) { 
	case 1 :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_review.gif' border=0 align=absmiddle>"; 
		break; 
	case 2 :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_review.gif' border=0 align=absmiddle>"; 
		break; 
	case 3 :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_review.gif' border=0 align=absmiddle>"; 
	    break; 
	default :
		$list[$j][wr_3] = "<img src='$board_skin_path/img/dia_review.gif' border=0 align=absmiddle>"; 
	}
}
?>

<tr height="30">
	<td class="tbline2 bbs_head bbs_fhead" align="center" width="30">요일</td>
	<td class="tbline2 bbs_head bbs_fhead" align="center" width="60">날짜</td>
	<td class="tbline2 bbs_head bbs_fhead" align="center">일정</td>
</tr>
<?
for($i=0; $i<=6; $i++) {

	$year1 = date("Y",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year));
	$month1 = date("n",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year));
	$day1 = date("j",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year));

	$bgcolor = "#ffffff"; //일반날짜

	// 요일 표시하기
	switch($i) {
		case("0"):
			$yoil = "<font color=#FF0000>S</font>";
			$bgcolor = "#FEFAFF";
			break;
		case("1"):
			$yoil = "M";
			break;
		case("2"):
			$yoil = "T";
			break;
		case("3"):
			$yoil = "W";
			break;
		case("4"):
			$yoil = "T";
			break;
		case("5"):
			$yoil = "F";
			break;
		default:
			$yoil = "<font color=#0000FF>S</font>";
			$bgcolor = "#F0F8FF";
    }

	$tmp = sprintf("%02d",$month1)."-".sprintf("%02d",$day1);
	if ($nal[$tmp])	{
		$title = trim($nal[$tmp][1]);
		
		if (trim($nal[$tmp][2]) == "*") {
			$day1 = "$day1 <br> <font color=#804180>$title</font>";
			$bgcolor = "#FEFAFF";
		} //공휴일
		else { $day1 = "$day1 <br> $title"; }
	}

	if ($thisyear==$year && $thismonth==$month && $thisday==$day1) $bgcolor = "#FFFFC0"; //오늘날짜
?>
<tr height="<?=$col_height?>">
	<td class="tbline2" align="center" bgcolor="<?=$bgcolor?>"><?echo $yoil?></td>
	<td class="tbline2" align="center" bgcolor="<?=$bgcolor?>">
		<?
		 //글쓰기 권한여부
		if ($write_href) {
			$f_date = $year1.sprintf("%02d",$month1).sprintf("%02d",$day1);
			echo " <a href='$write_href&write[wr_link1]=$f_date'>{$month1}. {$day1}</a>\n";
		} 
		else {
			echo "$day1\n";
		}
		?>
	</td>
	<td class="tbline2" bgcolor="<?=$bgcolor?>">
	&nbsp;
	<? for ($k=0; $k<$j; $k++) {
		if ($day1 ==  substr($list[$k][wr_link1],6,2)) {?>

<div id='box_list2'>
	<div id='box01'><?=$list[$k][wr_3]?><a href='./board.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$k][wr_id]?>'><?=$list[$k][wr_subject]?></a></div>
	<div id='box03'><?=$list[$k][wr_5]?></div>
	<div id='box03'><font color=#e04f00><?=$list[$k][wr_7]?></font></div>
	<div id='box04'><font color=#4d9d0d><?=$list[$k][wr_6]?></font></div>&nbsp;</div>
	
<? }
	}?>
	 &nbsp;
	</td>
</tr>
<? } ?>
</table>