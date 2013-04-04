<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$today = getdate(); 
$b_mon = $today['mon']; 
$b_day = $today['mday']; 
$b_year = $today['year']; 

if ($year < 1) 
{
   $month = $b_mon;
   $mday = $b_day;
   $year = $b_year;
}

$lastday=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
if($year%4 == 0) $lastday[2] = 29;
$dayoftheweek = date("w", mktime (0,0,0,$month,1,$year));
?>

<div align="center">
	<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&mode=m&"?><?if ($month == 1) { $year_pre=$year-1; $month_pre=12; } else {$year_pre=$year; $month_pre=$month-1;} echo ("year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/btn_prev_c.png" border="0" title="이전달" align="absbottom" /></a>&nbsp;
	<span class="day_navi">
	<?
	if(strlen($month) == 1) { echo $year.".0".$month ; } 
	else { echo $year.".".$month ; }
	?>
	</span>
	<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&mode=m&"?><? if ($month == 12) { $year_next=$year+1; $month_next=1; } else {$year_next=$year; $month_next=$month+1;} echo ("&year=$year_next&month=$month_next");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/btn_next_c.png" border="0" title="다음달" align="absbottom" /></a>

	<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&mode=m&year=$thisyear&month=$thismonth"?>" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/btn_today.png" border="0" title="오늘" align="absbottom" /></a> 
</div>	
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10px">&nbsp;</td>
		<td valign="bottom" width="144px"><a href='board.php?bo_table=<?=$bo_table?>&mode=m'><img src="<?=$board_skin_path?>/img/tab_month_on.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=w'><img src="<?=$board_skin_path?>/img/tab_week_off.gif"></a><a href='board.php?bo_table=<?=$bo_table?>&mode=d'><img src="<?=$board_skin_path?>/img/tab_day_off.gif"></a></td>
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
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="board_list">
	<tr>
		<th width="50px" style="padding-left:15px">추가</th>
		<th width="130px" style="padding-left:22px">날짜</th>
		<th width="" align='center'>일정</th>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" width="100%" class="board_list">
<?
$cday = 1;
$sel_mon = sprintf("%02d",$month);
$query = "SELECT * FROM $write_table WHERE mb_id = '$member[mb_id]' and wr_3 not in ('000') and left(replace(wr_1,'-',''),6) <= '$year$sel_mon' and left(replace(wr_2,'-',''),6) >= '$year$sel_mon' ORDER BY wr_id ASC";
$result = sql_query($query);

// 내용을 보여주는 부분
while ($row = mysql_fetch_array($result))   // 제목글 뽑아서 링크 문자열 만들기..
{
	$row1 = explode("-",$row[wr_1]); // 날짜 2011-11-11 을 20111111 로
	$row2 = explode("-",$row[wr_2]); 

	if( $row1[0].$row1[1] < $year.$sel_mon ) 
	{
		$start_day = 1; 
		$start_day = (int)$start_day;
	}else{
		$start_day = $row1[2];
		$start_day = (int)$start_day;
	}

	if( $row2[0].$row2[1] >  $year.$sel_mon ) 
	{
		$end_day = $lastday[$month];
		$end_day = (int)$end_day;
	}else{
		$end_day = $row2[2];
		$end_day = (int)$end_day;
}

$list = array();
	for ($i = $start_day ; $i <= $end_day;  $i++) 
	{
		$list[$i][wr_id]      = $row[wr_id];
		$list[$i][wr_name]    = $row[wr_name];
		$list[$i][mb_id]      = $row[mb_id];
		$list[$i][wr_subject] = $row[wr_subject];
		$list[$i][wr_1]       = $row[wr_1];
		$list[$i][wr_2]       = $row[wr_2];
		$list[$i][wr_3]       = $row[wr_3];
		$list[$i][wr_4]       = $row[wr_4];
		$list[$i][wr_5]       = $row[wr_5];
		//$list[$i][wr_6]       = $row[wr_6];
		//$list[$i][wr_7]       = $row[wr_7];
		$list[$i][wr_8]       = $row[wr_8];
		$list[$i][wr_9]       = $row[wr_9];
		$list[$i][wr_10]      = $row[wr_10];
		$list[$i][wr_comment] = $row[wr_comment];

		//새댓글 눈에 띄게
		if ($list[$i][wr_comment] > 0) 
		{
			$wr_id = $list[$i][wr_id] ;
			$sql_new = "SELECT count(*) AS cnt FROM $write_table WHERE wr_is_comment = '1' and wr_parent = '$wr_id' and wr_datetime >='$newtime'"; 
			$row_new = sql_fetch($sql_new); 
			if($row_new[cnt]) 
			{
				$comment = " <span style='font-size:11px; color:#cc3300; font-weight:bold;'>({$list[$i][wr_comment]})</span>";
			}else{
				$comment = " <span style='font-size:11px; color:#cc3300;'>({$list[$i][wr_comment]})</span>";
			}
		}else{
			$comment = "";
		}

		switch ($list[$i][wr_3]) 
		{ 
			case "001" : $list[$i][wr_3] = "<img src='$board_skin_path/img/icon_001.gif' border=0> "; 	break; 
			case "002" : $list[$i][wr_3] = "<img src='$board_skin_path/img/icon_002.gif' border=0> "; 	break; 
			case "003" : $list[$i][wr_3] = "<img src='$board_skin_path/img/icon_003.gif' border=0> "; 	break; 
			case "004" : $list[$i][wr_3] = "<img src='$board_skin_path/img/icon_004.gif' border=0> "; 	break; 
			case "000" : $list[$i][wr_3] = "<img src='$board_skin_path/img/icon_000.gif' border=0> "; 	break; 
			default    : $list[$i][wr_3] = "<img src='$board_skin_path/img/icon_001.gif' border=0> "; 	
		}

        // 삭제
        if ($is_admin) 
		{
			$del[$i] = "<a href=\"javascript:del('./delete.php?bo_table=".$bo_table."&mode=".$mode."&wr_id=".$list[$i][wr_id]."&year=".$year."&month=".$month."&day=".$day."&token=".$token."');\"><span class='mout_del' onmouseover=\"this.className='mover_del'\" onmouseout=\"this.className='mout_del'\" alt='del'>×</span></a>";
        }else if($member[mb_id] && ($member[mb_id] == $list[$i][mb_id])){
            $del[$i] = "<a href=\"javascript:del('./delete.php?bo_table=".$bo_table."&mode=".$mode."&wr_id=".$list[$i][wr_id]."&year=".$year."&month=".$month."&day=".$day."');\"><span class='mout_del' onmouseover=\"this.className='mover_del'\" onmouseout=\"this.className='mout_del'\" alt='del'>×</span></a>";
        }

		if($list[$i][wr_10] == "100")  // 완료일정 스트라이커 처리
	    {
			$html_day[$i].= "<div>".$list[$i][wr_3]."<a href='".$g4[bbs_path]."/board.php?bo_table=".$bo_table."&mode=".$mode."&wr_id=".$list[$i][wr_id]."'><strike>".$row[wr_subject]."</strike></a>".$comment." ".$del[$i]."</div>";
		}else{
            $html_day[$i].= "<div>".$list[$i][wr_3]."<a href='".$g4[bbs_path]."/board.php?bo_table=".$bo_table."&mode=".$mode."&wr_id=".$list[$i][wr_id]."'>".$row[wr_subject]."</a>".$comment." ".$del[$i]."</div>";
		}
    }
}

//달력
$temp = 7- (($lastday[$month]+$dayoftheweek)%7);

if($temp == 7) $temp = 0;
     $lastcount = $lastday[$month]+$dayoftheweek + $temp;
	
for($iz = 1; $iz <= $lastcount; $iz++)  
{
	$bgcolor = "#f0f0f0"; 
	
	if($dayoftheweek < $iz  &&  $iz <= $lastday[$month]+$dayoftheweek)	
	{
		if(strlen($cday) == 1) { $cday = "0".$cday ; }  //날짜 1 2 를 01 02 로 표현되게 
		$daytext = $month.".".$cday;   // $cday 는 숫자
	   
	   if($iz%7 == 6) {$daytext = "<span class='day1'>$daytext</span> (금)";} // 금요일
	   if($iz%7 == 5) {$daytext = "<span class='day1'>$daytext</span> (목)";} // 목요일
	   if($iz%7 == 4) {$daytext = "<span class='day1'>$daytext</span> (수)";} // 수요일
	   if($iz%7 == 3) {$daytext = "<span class='day1'>$daytext</span> (화)";} // 화요일
	   if($iz%7 == 2) {$daytext = "<span class='day1'>$daytext</span> (월)";} // 월요일
	   if($iz%7 == 1) {$daytext = "<span class='day3'>$daytext</span> <span style='color:#cc3300;'>(일)</span>"; $bgcolor = "#f0f0f0";} // 일요일
	   if($iz%7 == 0) {$daytext = "<span class='day3'>$daytext</span> <span style='color:#cc3300;'>(토)</span>"; $bgcolor = "#f0f0f0";} // 토요일
	   if($b_year==$year && $b_mon==$month && $b_day==$cday) {$daytext = "$daytext"; $bgcolor = "#fafafa";} //오늘날짜
	  
 	  
		//////// 음력/공휴일/절기 데이타 표현 
		$tmp = sprintf("%02d",$month)."-".sprintf("%02d",$cday);
		if ($nal[$tmp])	
		{
			$title = trim($nal[$tmp][1]);
			$title1 = cut_str($title,12);
			if (trim($nal[$tmp][2]) == "*")  // 공휴일 경우
			{
				$daytext = "<span class='day3'>$daytext</span> <span class='day5'>$title1</span>";
				//$bgcolor = "#f0f0f0";
			} 
			else {  // 공휴일 아닌 경우
				$daytext = "$daytext <span class='day4'>$title1</span>";
			}
		}
 
		/////// 01 02 다시 1 2로 다시 환원, 데이타 있는 날짜 찾기 위해
		
		if($cday < 10) { $cday = substr($cday,1); }

       ////////// 표 그리기
	   //echo ("<tr><td class='bb4' width=$col_width height=$col_height bgcolor=$bgcolor valign=center onmouseover=this.style.backgroundColor='#f9f9f9' onmouseout=this.style.backgroundColor=''>");
		echo "<tr><td width='50px' valign='top' style='padding:2px 0 2px 20px;' bgcolor=".$bgcolor.">";
		/////// 글쓰기 권한여부
		if($member[mb_level] > 1)   // 기본적으로 회원만 입력가능
		{
			if ($write_href)  // 입력권한에 따라
			{	$f_date = $year."-".sprintf("%02d",$month)."-".sprintf("%02d",$cday);
				//$f_date = $year.sprintf("%02d",$month).sprintf("%02d",$cday);

		?>
				<div class='f_plus'>
					<a href="<?=$g4[bbs_path]?>/write.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&write[wr_1]=<?=$f_date?>">  
					<span style='color:#777777;'>＋</span></a>
				</div>
		<?
			}else{  // 입력권한 없을 시
				echo "<div class='f_plus'>－</div>";
			}
		
		}else{ // 비회원 경우 
		?>
			<div class='f_plus'><a href="<?=$g4['bbs_path']?>/login.php">＋</a></div>
		<? 
		} 
		?>
	    </td>
		<td width='130px' valign='top' class='bb4' bgcolor="<?=$bgcolor?>" style='padding:2px 0;'><?=$daytext?></td>
		<?
		echo "<td width='' bgcolor=".$bgcolor." style='padding:3px 0;'> ";
		if ($html_day[$cday]) 
		{	
			echo $html_day[$cday];
        }else{ 
			echo "&nbsp;"; 
		}
		echo " </td></tr>";  		
		$cday++; // 날짜를 카운팅
	} 
	else { echo (""); }
   if (($iz%1) == 0) echo ("");   
}  
?>
</table>