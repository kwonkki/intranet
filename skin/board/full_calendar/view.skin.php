<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//열람권한 : 작성자, 관리자만 열람
if($view[mb_id] == $member[mb_id] || $is_admin || $member[mb_level] >= 2)
{
?>


<!-- 게시글 보기 시작 -->
<script type="text/javascript">
//<![CDATA[
//문서 프린트
	function pagePrint(Obj) {
    var W = Obj.offsetWidth;        //screen.availWidth;
    var H = Obj.offsetHeight;       //screen.availHeight;
 
    var features = "menubar=no,toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,width=" + W + ",height=" + H + ",left=0,top=0";
    var PrintPage = window.open("",Obj.id,features);
    PrintPage.document.open();
    PrintPage.document.write("<html><head><title>문서출력</title><link rel='stylesheet' href='<?=$board_skin_path?>/css/g_style.css' type='text/css'><style type='text/css'>body{background-color:#ffffff;}</style>\n</head>\n<body topmargin='0' leftmargin='0' bottommargin='0' righttmargin='0'>" + Obj.innerHTML + "\n</body></html>");
    PrintPage.document.close();
    PrintPage.document.title = document.domain;
    PrintPage.print(PrintPage.location.reload());
}
//]]>
</script>

<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/css/g_style.css' />

<!--문서레이아웃:프린트부분-->
<BR>
<table width="800px" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<!-- <td valign="top" width="16px"><img src="<?=$g4[path]?>/z_img/box2_left.png" border="0" width="16px" height="170px"></td>-->
		<td class="docbg" id="print_page">
			<div style="float:left; width:19%">
				<span class="docprint">   
				<a href="#" onclick="pagePrint(document.getElementById('print_page'))" alt="print" class="btn s"><span title="Print" style="color:#e0e0e0">Print</span></a>
				</span>
			</div>
			<div style="float:left; width:60%; text-align:center;" class="doctitle"><? if($mode=="c" || !$mode) echo "Project Detail"; else echo "Project Detail"; ?></div>
			<div style="width:19%; text-align:right;" id="doclogo" class="doclogo"><?=$g_logo?></div>
			<div style="clear:both;">
				category&nbsp;&nbsp;&nbsp; :  
				<? 
					switch($view[wr_3])
					{
						case "001": $wr_3 = "normal"; break;
						case "002": $wr_3 = "important"; break;
						case "003": $wr_3 = "very important"; break;
						case "004": $wr_3 = "project"; break;
						case "000": $wr_3 = "personnel"; break;
						default   : $wr_3 = "normal"; 
					}
					echo $wr_3;
				?>	
				<BR>
				progress&nbsp;&nbsp;&nbsp; :  <? if(!$view[wr_10]) echo "0"; else echo $view[wr_10];?>%
				<BR>
				repeat&nbsp;&nbsp;&nbsp; :  
				<? 
					switch($view[wr_8])
					{
						case "year" : $wr_8 = "Every Year"; break;
						case "month": $wr_8 = "Every Month"; break;
						case "week" : $wr_8 = "Every Week"; break;
						default     : $wr_8 = "n/a"; 
					}
					echo $wr_8;
				?>	
				<BR>	
				TimeLine&nbsp;&nbsp;&nbsp; :	<?=$view[wr_1]?> <?=$view[wr_4]?> ~ <?=$view[wr_2]?> <?=$view[wr_5]?> 
				<BR>
				Writing Date : <?=date("Y-m-d H:i", strtotime($view[wr_datetime]))?><BR>
				Person who in charge : <?=$v_team3?> <?=$v_team2?> <?=$v_team1?> <?=$view[name]?><?// if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>
				<!--<BR>View : <?=number_format($view[wr_hit])?>-->
			</div>
			<div style="padding:0 0 5px 0;clear:both;">Project Name : <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?> <b><?=cut_hangul_last(get_text($view[wr_subject]))?></b></div>
			<div class="doc_breakline"></div>

			<table align="center" cellpadding="0" cellspacing="0" width="100%">
				<tr height="150px"> 
					<td valign="top" style="word-break:break-all; padding:10px;">

						<!-- 내용 출력 -->
						<span id="writeContents" style="text-align:justify; line-height:18px"><?=nl2br($view[content]);?></span>

						<?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
						<!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>
						<? 
						//파일 출력
						if($view[file]) 
						{
							for ($i=0; $i<=count($view[file]); $i++) 
							{
								if ($view[file][$i][view]) { echo "<table width=100%><tr><td style='padding-bottom:5px;'align=center>".$view[file][$i][view] . "</td><tr></table>"; }
								if ($view[file][$i][content]) {
									echo "<table width=100%><tr><td style='padding-bottom:15px;'align=center><span class=small>".nl2br($view[file][$i][content])."</span></td><tr></table>";  // [추가] 이미지 설명글 
								}
							}
						}
						?>
					</td>
				</tr>

				<?
				// 가변 파일
				$cnt = 0;
				for ($i=0; $i<count($view[file]); $i++) {
					if ($view[file][$i][source] && !$view[file][$i][view]) {
						$cnt++;
						echo "<tr><td height='20px' class='small'>";
						echo "&nbsp;&nbsp;attach{$i}. ";
						echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'>";
						echo "&nbsp;<span style=\"color:#666;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
						echo "&nbsp;<span style=\"color:#cc3300; font-size:11px;\">[{$view[file][$i][download]}]</span>";
						echo "&nbsp;<span style=\"color:#ccc; font-size:11px;\"> {$view[file][$i][datetime]}</span>";
						echo "</a></td></tr>";
					}
				}

				// 링크
				$cnt = 0;
				for ($i=1; $i<=$g4[link_count]; $i++) {
					if ($view[link][$i]) {
						$cnt++;
						$link = cut_str($view[link][$i], 70);
						echo "<tr><td height='20px' class='small'>";
						echo "&nbsp;&nbsp;링크{$i}. ";
						echo "<a href='{$view[link_href][$i]}' target=_blank>";
						echo "&nbsp;<span style=\"color:#666;\">{$link}</span>";
						echo "&nbsp;<span style=\"color:#cc3300; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
						echo "</a></td></tr>";
					}
				}
				?>

				<?// if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // 서명 출력 ?>
			</table>
			<div style="text-align:center;">
			<center>
				<div class="btn_good_width">
					<? if ($good_href) {?>
					<div style="float:left; padding:0 3px;"><a href="<?=$good_href?>" target="hiddenframe" class="btn_good"><span><?=number_format($view[wr_good])?><BR>추천</span></a></div>
					<? } ?>
					<? if ($nogood_href) {?>
					<div style="float:left; padding:0 3px;"><a href="<?=$nogood_href?>" target="hiddenframe" class="btn_nogood"><span><?=number_format($view[wr_nogood])?><BR>비추</span></a></div>
					<div style="clear:both;"></div>
					<? } ?>
				</div>
			</center>
			</div>

		<? if($view[wr_comment]) { ?>
		<div style="clear:both;"><span class="btn s" style="font-size:11px;">&nbsp;Reqeust/Opinion(<?=$view[wr_comment]?>)&nbsp;</span></div>
		<div style="position:relative; top:-1px; height:1px; line-height:1px; font-size:1px; clear:both;" class="bb2"></div>
		<? } ?>

		<? include_once("./view_comment.php");// 코멘트 입출력 ?>

		<!--<table align="center" cellpadding="0" cellspacing="0" width="<?=$width?>">-->
		<table align="center" cellpadding="0" cellspacing="0" width="800px">
			<tr>
				<td>
					<div style="clear:both; height:43px;">
						<div style="float:left; margin-top:10px; margin-right:2px;">
						<? if ($prev_href) {?>
							<span class="btn m"><button type="button" onclick="location.href='<?=$prev_href?>'">이전글</button></span>
						<? } ?>
						<? if ($next_href) {?>
							<span class="btn m"><button type="button" onclick="location.href='<?=$next_href?>'">다음글</button></span>
						<? } ?>
						</div>

						<!-- 링크 버튼 -->
						<div style="float:right; margin-top:10px; margin-right:2px;">
						<!-- 링크 버튼 -->
						<?// if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_list_search.gif' border='0' align='absmiddle'></a> "; } ?>
							<span class="btn m"><button type="button" onclick="location.href='<?=$list_href?>&appstate=all'">Show Projects</button></span>
	
						<? if ($update_href) {?><span class="btn m"><button type="button" onclick="location.href='<?=$update_href?>'">Update Project</button></span><? } ?>
						<? if ($delete_href) {?><span class="btn m"><button type="button" onclick="<?=$delete_href?>">Delete Projects</button></span><? } ?>
				
						<? if ($reply_href) {?><!--<span class="btn m"><button type="button" onclick="location.href='<?=$reply_href?>'">답변</button></span>--><? } ?>
						<? if ($view_href) {?>
							<!--<span class="btn m"><button type="button" onclick="location.href='<?=$board_skin_path?>/doc_select.php'">문서작성</button></span>-->
						<? } ?>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<BR>

<script type="text/javascript">
function file_download(link, file) 
{
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' You point will be deducted?"))<?}?>
    document.location.href=link;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>
<!-- 게시글 보기 끝 -->


<?
//열람권한
}else{ 
?>
<script language='javascript'>
 alert('no auth');
 history.back()
</script>
<? } //end if 열람권한 ?>
