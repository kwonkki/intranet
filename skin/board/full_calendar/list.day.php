<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
//$g4['title'] = "업무일지";

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

// 시작일과 종료일의 기간이 2년 이내로만 디비에서 뽑기, 디비부담 줄이기 위한..  
$week_first2 = date("Ymd", mktime(0, 0, 0, $cel_mon-1, $cel_day, $year-1));  
$week_last2  = date("Ymd", mktime(0, 0, 0, $cel_mon+1, $cel_day, $year+1));

$query = "SELECT * FROM $write_table WHERE mb_id = '$member[mb_id]' and wr_3 not in ('000') and replace(wr_1,'-','') between '$week_first2' AND '$week_last2' order by replace(wr_4,':','') ASC"; 
$result = sql_query($query);
$list = array();
?>

<style type="text/css">
.day4 {font-size:20px;color:#333333;font-weight:bold;}
</style>

<div align="center">
	<a href="./board.php?bo_table=<?=$bo_table?>&mode=d&year=<?=$prevyear?>&month=<?=$prevmonth?>&day=<?=$prevday?>">
		<img src='<?=$board_skin_path?>/img/btn_prev_c.png' border="0" align="absbottom">
	</a>
	<span class="day_navi">
	<?
		if($month < 10) { echo $year.".0".$month ; } 
		else { echo $year.".".$month ; }
		echo ".";

		if($day < 10) { echo "0".$day ; } 
		else { echo $day ; }
	?>
	</span>
	<a href="./board.php?bo_table=<?=$bo_table?>&mode=d&year=<?=$nextyear?>&month=<?=$nextmonth?>&day=<?=$nextday?>">&nbsp;<img src='<?=$board_skin_path?>/img/btn_next_c.png' border="0" align="absbottom"></a>
	<a href="./board.php?bo_table=<?=$bo_table?>&mode=d&year=<?=$thisyear?>&month=<?=$thismonth?>&day=<?=$thisday?>" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/btn_today.png" border="0" title="오늘" align="absbottom" /></a>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10px">&nbsp;</td>
		<td valign="bottom" width="144px"><a href='board.php?bo_table=<?=$bo_table?>&mode=m'><img src="<?=$board_skin_path?>/img/tab_month_off.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=w&'><img src="<?=$board_skin_path?>/img/tab_week_off.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=d'><img src="<?=$board_skin_path?>/img/tab_day_on.gif"></a></td>
		<td align="right" style="padding:0 2px; font-size:11px;">
			<img src='<?=$board_skin_path?>/img/icon_001.gif' border="0"> 일반
			<img src='<?=$board_skin_path?>/img/icon_002.gif' border="0"> 중요
			<img src='<?=$board_skin_path?>/img/icon_003.gif' border="0"> 매우중요
			<img src='<?=$board_skin_path?>/img/icon_004.gif' border="0"> 프로젝트
			<img src='<?=$board_skin_path?>/img/icon_000.gif' border="0"> 개인일정
			<span style="position:relative; top:-6px;"><a href="#" onclick="pagePrint(document.getElementById('print_page'))" class="btn s"><span style="color:#e0e0e0">P</span></a></span>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="board_list">
<?
for ($j=0; $row=mysql_fetch_array($result); $j++) 
{
	$list[$j][wr_id]       = $row[wr_id];
	$list[$j][wr_subject]  = $row[wr_subject];
	$list[$j][wr_1]        = $row[wr_1];
	$list[$j][wr_2]        = $row[wr_2];
	$list[$j][wr_1_z]      = substr($row[wr_1],0,4).substr($row[wr_1],5,2).substr($row[wr_1],8,2) ;
	$list[$j][wr_2_z]      = substr($row[wr_2],0,4).substr($row[wr_2],5,2).substr($row[wr_2],8,2) ;
	$list[$j][wr_datetime] = substr($row[wr_datetime],0,10);
	$list[$j][wr_content]  = $row[wr_content];
	$list[$j][wr_3]        = $row[wr_3];
	$list[$j][wr_4]        = $row[wr_4];
	$list[$j][wr_5]        = $row[wr_5];
	//$list[$j][wr_6]       = $row[wr_6];
	//$list[$j][wr_7]       = $row[wr_7];
	$list[$j][wr_8]        = $row[wr_8];
	$list[$j][wr_9]        = $row[wr_9];
	$list[$j][wr_10]       = $row[wr_10];
	$list[$j][wr_comment]  = $row[wr_comment];

	switch ($row[wr_3]) 
	{ 
		case "001" : $list[$j][wr_3] = "<img src='$board_skin_path/img/icon_001.gif' border=0> 일반"; 	break; 
		case "002" : $list[$j][wr_3] = "<img src='$board_skin_path/img/icon_002.gif' border=0> 중요"; 	break; 
		case "003" : $list[$j][wr_3] = "<img src='$board_skin_path/img/icon_003.gif' border=0> 매우중요"; 	break; 
		case "004" : $list[$j][wr_3] = "<img src='$board_skin_path/img/icon_004.gif' border=0> 프로젝트"; 	break; 
		case "000" : $list[$j][wr_3] = "<img src='$board_skin_path/img/icon_000.gif' border=0> 개인일정"; 	break; 
	    default    : $list[$j][wr_3] = "<img src='$board_skin_path/img/icon_001.gif' border=0> 일반"; 	
	}
}
?>
	<tr>
		<th align="center" width="40px" style='padding-left:15px;'>추가</th>
		<th align="center" width="90px">분류</th>
		<th align="center" width="100px">시간</th>
		<th align="center">일 정</th>
	</tr>

	<? 
	$day2 = date("Ymd",mktime(0, 0, 0, $month, $day, $year)); // 일정기간 동안 일정 출력위해 사용
	
	for($k=0; $k<count($list); $k++) 
	{
		//새댓글 눈에 띄게
		if ($list[$k][wr_comment] > 0) 
		{
			$wr_id = $list[$k][wr_id] ;
			$sql_new = "SELECT count(*) AS cnt FROM $write_table WHERE wr_is_comment = '1' and wr_parent = '$wr_id' and wr_datetime >='$newtime'"; 
			$row_new = sql_fetch($sql_new); 
			if($row_new[cnt]) 
			{
				$comment = "<span style='font-size:11px; color:#cc3300; font-weight:bold;'>({$list[$k][wr_comment]})</span>";
			}else{
				$comment = "<span style='font-size:11px; color:#cc3300;'>({$list[$k][wr_comment]})</span>";
			}
		}else{
			$comment = "";
		}

		if ($list[$k][wr_1] && $list[$k][wr_2]) // 일정 시작일과 종료일이 있는 경우만
		{ 
			if ($list[$k][wr_1_z] <= $day2 && $day2 <= $list[$k][wr_2_z]) // 시작일과 종료일 사이의 일정 모두 나타나게 	
			{ 
	?>
	
	<tr class="list_my">
		<td align="center" valign="top" style="padding:10px;">
		<?
		/////// 글쓰기 권한여부
		if($member[mb_level] > 1)  // 기본적으로 회원만 입력가능
		{  
			if($write_href) // 입력권한에 따라
			{
				$f_date = $year."-".$cel_mon."-".$cel_day;
		?>
				<div class="f_plus">
				<a href="<?=$g4[bbs_path]?>/write.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&write[wr_1]=<?=$f_date?>&write[wr_2]=<?=$f_date?>"> 
				&nbsp;&nbsp;<span style='color:#777777;'>＋</span></a></div>
		<?
			}else{  // 입력권한 없을 시
				echo "<div class='f_plus'>&nbsp;&nbsp;－</div>";
			}
		}else{ // 비회원 경우 
		?>
			<div class='f_plus'><a href="<?=$g4['bbs_path']?>/login.php">＋</a></div>
	<? } ?>
		</td>

		<td valign="top" style='padding:5px 10px 0 10px'><?=$list[$k][wr_3]?></td>
		<td valign="top" style='padding:5px 10px 0 10px;'><? if($list[$k][wr_1] == $list[$k][wr_2] && $list[$k][wr_4]) echo $list[$k][wr_4]."~".$list[$k][wr_5];?>&nbsp;</td> 
		<td>
		    <a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&wr_id=<?=$list[$k][wr_id]?>"> 
			<b>
			<? if($list[$k][wr_10] == "100") { // 완료일정 스트라이커 처리
				echo "<strike>".$list[$k][wr_subject]."</strike>";
			}else{
				echo $list[$k][wr_subject] ;
			}
			?>
			</b>
			</a>
			<span style="padding:2px 0 2px 0px; font-size:11px; color:#666666; ">(<? if($list[$k][wr_10]) {echo $list[$k][wr_10];} else { echo "0"; }?>%)</span>
			&nbsp;<?=$comment?>&nbsp;
			<div style="padding:2px 0 2px 0px; font-size:11px; color:#555555; "><?=nl2br(stripslashes($list[$k][wr_content]))?><div>
		</td>
		<!--<td class="bb4" align="center" valign="top"><?//=$list[$k][wr_datetime]?></td>-->
	</tr>
	<?
			} //if end
		} //if end
	} // for end
	?>

	<?// if (count($list) == "0") { ?>
	<!--<tr><td class="bb4" height="200px" colspan="4" align="center">일정이 없습니다.</td></tr>-->
	<?//} ?>
</table>