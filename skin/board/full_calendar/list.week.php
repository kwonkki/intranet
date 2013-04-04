<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
//include_once("./_common.php");

$f_day		= date("Ymd",mktime(0, 0, 0, $month, $day-7, $year));
$pervyear	= substr($f_day,0,4);
$prevmonth	= sprintf("%d",substr($f_day,4,2));
$prevday	= sprintf("%d",substr($f_day,6,2));

$l_day		= date("Ymd",mktime(0, 0, 0, $month, $day+7, $year));
$nextyear	= substr($l_day,0,4);
$nextmonth	= sprintf("%d",substr($l_day,4,2));
$nextday	= sprintf("%d",substr($l_day,6,2));
$offset		= date(w, mktime(0, 0, 0, $month, 1, $year));

$cur_day	= date("w",mktime(0, 0, 0, $month, $day, $year));
$minus_day	= 6 - $cur_day;
$week_first = date("Ymd", mktime(0, 0, 0, $month, $day-$cur_day, $year));
$week_last  = date("Ymd", mktime(0, 0, 0, $month, $day+$minus_day, $year));
// 시작일과 종료일의 기간이 2년이내로만 디비에서 뽑기, 디비부담 줄이기 위한..  
$week_first2= date("Ymd", mktime(0, 0, 0, $month, $day-$cur_day, $year-1));  
$week_last2 = date("Ymd", mktime(0, 0, 0, $month, $day+$minus_day, $year+1));
?>

<div align="center" style="z-index:3000;">
	<a href="./board.php?bo_table=<?=$bo_table?>&mode=w&year=<?=$prevyear?>&month=<?=$prevmonth?>&day=<?=$prevday?>">
		<img src='<?=$board_skin_path?>/img/btn_prev_c.png' border=0 align="absbottom">
	</a>&nbsp;
    <span class="day_navi">
		<?=sprintf("%d",substr($week_first,0,4))?>.<?=sprintf("%d",substr($week_first,4,2))?>.<?=sprintf("%d",substr($week_first,6,2))?> ~ <?=sprintf("%d",substr($week_last,0,4))?>.<?=sprintf("%d",substr($week_last,4,2))?>.<?=sprintf("%d",substr($week_last,6,2))?>
	</span>
	<a href="./board.php?bo_table=<?=$bo_table?>&mode=w&year=<?=$nextyear?>&month=<?=$nextmonth?>&day=<?=$nextday?>">
		<img src='<?=$board_skin_path?>/img/btn_next_c.png' border=0 align="absbottom">
	</a>
	<a href="./board.php?bo_table=<?=$bo_table?>&mode=w&year=<?=$thisyear?>&month=<?=$thismonth?>" onfocus="this.blur()">
		<img src="<?=$board_skin_path?>/img/btn_today.png" border="0" title="오늘" align="absbottom" />
	</a> 
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10px" class="bb1">&nbsp;</td>
		<td valign="bottom" width="144px" class="bb1"><a href='board.php?bo_table=<?=$bo_table?>&mode=m'><img src="<?=$board_skin_path?>/img/tab_month_off.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=w'><img src="<?=$board_skin_path?>/img/tab_week_on.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=d'><img src="<?=$board_skin_path?>/img/tab_day_off.gif"></a></td>
		<td align="right" class="bb1" style="padding:0 2px; font-size:11px;">
			<img src='<?=$board_skin_path?>/img/icon_001.gif' border="0"> 일반
			<img src='<?=$board_skin_path?>/img/icon_002.gif' border="0"> 중요
			<img src='<?=$board_skin_path?>/img/icon_003.gif' border="0"> 매우중요
			<img src='<?=$board_skin_path?>/img/icon_004.gif' border="0"> 프로젝트
			<img src='<?=$board_skin_path?>/img/icon_000.gif' border="0"> 개인일정
			<span style="position:relative; top:-6px;"><a href="#" onclick="pagePrint(document.getElementById('print_page'))" class="btn s"><span style="color:#e0e0e0">P</span></a></span>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
	<?
	// 일정 하나만 뽑기
	//$query = "SELECT * FROM $write_table WHERE wr_1 between '$week_first' AND '$week_last' ORDER BY wr_id ASC"; 
	//일주일간의 일정만 모두 뽑기
	//$query = "SELECT * FROM $write_table WHERE replace(wr_1,'-','') between '$week_first' AND '$week_last' ORDER BY wr_id ASC"; 
	// 전체일정 모두 뽑기, 데이타 많아지면 디비부담이..
	//$query = "SELECT * FROM $write_table WHERE replace(wr_1,'-','') ORDER BY wr_id ASC";
	// 일정의 기간을 2년 이내로만 뽑기, 디비부담 줄이기 위함, 시작일과 종료일의 기간이 2년이 넘지 않는 경우가 일반적이므로 권장
	$query = "SELECT * FROM $write_table WHERE mb_id = '$member[mb_id]' and wr_3 not in ('000') and replace(wr_1,'-','') between '$week_first2' AND '$week_last2' ORDER BY replace(wr_4,':','') ASC"; 
	$result = sql_query($query);
	$list = array();
	for ($j=0; $row=mysql_fetch_array($result); $j++) 
	{
		$list[$j][wr_id]      = $row[wr_id];
		$list[$j][wr_name]    = $row[wr_name];
		$list[$j][mb_id]      = $row[mb_id];
		$list[$j][wr_subject] = $row[wr_subject];
		$list[$j][wr_content]  = $row[wr_content];
		$list[$j][wr_1]       = $row[wr_1];
		$list[$j][wr_2]       = $row[wr_2];
		$list[$j][wr_1_z]     = substr($row[wr_1],0,4).substr($row[wr_1],5,2).substr($row[wr_1],8,2) ;
		$list[$j][wr_2_z]     = substr($row[wr_2],0,4).substr($row[wr_2],5,2).substr($row[wr_2],8,2) ;
		$list[$j][wr_3]       = $row[wr_3];
		$list[$j][wr_4]       = $row[wr_4];
		$list[$j][wr_5]       = $row[wr_5];
		//$list[$j][wr_6]       = $row[wr_6];
		//$list[$j][wr_7]       = $row[wr_7];
		$list[$j][wr_8]       = $row[wr_8];
		$list[$j][wr_9]       = $row[wr_9];
		$list[$j][wr_10]      = $row[wr_10];
		$list[$j][wr_comment] = $row[wr_comment];

		switch ($row[wr_3]) 
		{ 
			case "001" : $imp[$j] = "<img src='$board_skin_path/img/icon_001.gif' border=0> "; 	break; 
			case "002" : $imp[$j] = "<img src='$board_skin_path/img/icon_002.gif' border=0> "; 	break; 
			case "003" : $imp[$j] = "<img src='$board_skin_path/img/icon_003.gif' border=0> "; 	break; 
			case "004" : $imp[$j] = "<img src='$board_skin_path/img/icon_004.gif' border=0> "; 	break; 
			case "000" : $imp[$j] = "<img src='$board_skin_path/img/icon_000.gif' border=0> "; 	break; 
			default    : $imp[$j] = "<img src='$board_skin_path/img/icon_001.gif' border=0> "; 	
		}
	}
	?>
	<tr style="height:22px; background:#fafafa">
		<td class="bb4" width="50px" style='padding-left:15px;'>추가</td>
		<td class="bb4" width="150px" style='padding-left:5px;'>요일 &nbsp;&nbsp;날짜</td>
		<td class="bb4" width="80%" style='padding-left:40px; text-align:left;'>일정</td>
	</tr>
	<?
	for($i=0; $i<=6; $i++) 
	{
		$year1 = date("Y",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year));
		$month1 = date("n",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year));
		$day1 = date("j",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year)); 
		$day2 = date("Ymd",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year)); // 일정기간 동안 일정 출력위해 사용
		$day3 = date("d",mktime(0, 0, 0, $month, $day-$cur_day+$i, $year));  // 오늘날짜 배경색 찾을때 사용
		$bgcolor = "#fafafa"; //일반날짜

		// 요일 표시하기
		switch($i) 
		{
		   case("0"): $yoil = "일"; $bgcolor = "#f0f0f0"; break;
		   case("1"): $yoil = "월"; $bgcolor = "#f0f0f0"; break;
		   case("2"): $yoil = "화";	$bgcolor = "#f0f0f0"; break;
		   case("3"): $yoil = "수";	$bgcolor = "#f0f0f0"; break;
		   case("4"): $yoil = "목";	$bgcolor = "#f0f0f0"; break;
		   case("5"): $yoil = "금";	$bgcolor = "#f0f0f0"; break;
		   default:	$yoil = "토";   $bgcolor = "#f0f0f0";
		}
		$tmp = sprintf("%02d",$month1)."-".sprintf("%02d",$day1);

		if($nal[$tmp])	
		{
			$title = trim($nal[$tmp][1]);
			
			if(trim($nal[$tmp][2]) == "*")  // 공휴일 경우
			{
				$day1 = "<span class='day3_w'>$yoil &nbsp;&nbsp;  $month1.$day1</span> <span class='day5'> $title </span> ";
				$bgcolor = "#f0f0f0";
			
			}elseif($i =='0' or $i == '6') { // 음력/절기 표시되는 토/일요일일 경우
				$day1 = "<span class='day3_w'>$yoil &nbsp;&nbsp; $month1.$day1</span> <span class='day4'> $title </span> ";
				$bgcolor = "#f0f0f0";

			}else{ // 음력/절기 표시되는 평일일 경우
				$day1 = "<span class='day1_w'>$yoil &nbsp;&nbsp; $month1.$day1</span> <span class='day4'> $title </span> "; 
			}
		
		}elseif($i == '0' or $i == '6'){ // 토/일요일 경우
			$day1="<span class='day3_w'>$yoil &nbsp;&nbsp; $month1.$day1</span>";
		
		}else{ // 평일 경우
			$day1="<span class='day1_w'>$yoil &nbsp;&nbsp; $month1.$day1</span>";
		}

		if($thisyear==$year && $thismonth==$month && $thisday==$day3) $bgcolor = "#fafafa"; //오늘날짜
	?>
	<tr>
		<td class="bb4" bgcolor="<?=$bgcolor?>"  valign="top" style='padding:20px 0 20px 18px;'>
		<?
		/////// 글쓰기 권한여부
		if($member[mb_level] > 1)  // 기본적으로 회원만 입력가능
		{  
			if($write_href)  // 입력권한에 따라
			{	
				$f_date = $year1."-".sprintf("%02d",$month1)."-".sprintf("%02d",$day3);
		?>
				<span class='f_plus'>
					<a href="<?=$g4[bbs_path]?>/write.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&write[wr_1]=<?=$f_date?>&write[wr_2]=<?=$f_date?>"> 
					<span style='color:#777777;'>＋</span></a>
				</span>
		<?
			}else{  // 입력권한 없을 시
				echo "<div class='f_plus'></div>";
			}
		}else{ // 비회원 경우 
		?>
			<div class='f_plus'><a href="<?=$g4['bbs_path']?>/login.php">＋</a></div>
		<? 
		}
		?>
		</td>
		<td class="bb4" style='padding:20px 0 0 8px;' valign="top" bgcolor="<?=$bgcolor?>"><?=$day1?></td>
		<td class="bb4" bgcolor="<?=$bgcolor?>">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<? 
				for($k=0; $k<$j; $k++) 
				{
					//새댓글 눈에 띄게
					if ($list[$k][wr_comment] > 0) 
					{
						$wr_id = $list[$k][wr_id] ;
						$sql_new = "SELECT count(*) AS cnt FROM $write_table WHERE wr_is_comment = '1' and wr_parent = '$wr_id' and wr_datetime >='$newtime'"; 
						$row_new = sql_fetch($sql_new); 
						
						if($row_new[cnt]) 
						{
							$comment = " <span style='font-size:11px; color:#cc3300; font-weight:bold;'>({$list[$k][wr_comment]})</span>";
						}else{
							$comment = " <span style='font-size:11px; color:#cc3300;'>({$list[$k][wr_comment]})</span>";
						}
					}else{
						$comment = "";
					}	
					if ($list[$k][wr_1] && $list[$k][wr_2]) // 일정 시작일과 종료일이 있는 경우만
					{ 
						if ($list[$k][wr_1_z] <= $day2 && $day2 <= $list[$k][wr_2_z]) // 시작일과 종료일 사이의 일정 모두 나타나게 
						{ 
				?>
				<tr>
					<td style='width:90px; padding:5px 0;' valign="top"><? if($list[$k][wr_1] == $list[$k][wr_2] && $list[$k][wr_4]) echo $list[$k][wr_4]."~".$list[$k][wr_5];?>&nbsp;</td>
					<td width="" style="padding:5px 0;">
						<?=$imp[$k]?>
						<a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&wr_id=<?=$list[$k][wr_id]?>"> 
						<? 
							if($list[$k][wr_10] == "100")  // 완료일정 스트라이커 처리
							{	
								echo "<strike>".$list[$k][wr_subject]."</strike>";
							}else{
								echo $list[$k][wr_subject] ;
							}
						?>
						</a>
						<span style="padding:2px 0 2px 0px; font-size:11px; color:#777777; ">(<? if($list[$k][wr_10]) {echo $list[$k][wr_10];} else { echo "0"; }?>%)</span>
						<?=$comment?>
						<? if ($is_admin) { ?>
						<a href="javascript:del('./delete.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&wr_id=<?=$list[$k][wr_id]?>&year=<?=$year?>&month=<?=$month?>&day=<?=$day?>&token=<?=$token?>');"><span class="mout_del" onmouseover="this.className='mover_del'" onmouseout="this.className='mout_del'" alt='del'>×</span></a>
						<? }elseif($member[mb_id] && ($member[mb_id] == $list[$k][mb_id])){ ?>
						<a href="javascript:del('./delete.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&wr_id=<?=$list[$k][wr_id]?>&mb_id=<?=$list[$k][mb_id]?>&year=<?=$year?>&month=<?=$month?>&day=<?=$day?>');"><span class="mout_del" onmouseover="this.className='mover_del'" onmouseout="this.className='mout_del'" alt='del'>×</span></a>
						<? } ?>
						<div style="padding:2px 0 2px 0px; font-size:11px; color:#555555; "><?=nl2br(stripslashes($list[$k][wr_content]))?><div>
					</td>
				</tr>	
				<? 	    
						}
					}
				} //end for
				?>
			</table>
		</td>
	</tr>
	<? } ?>
</table>