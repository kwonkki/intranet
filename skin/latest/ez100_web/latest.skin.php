<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

/*
 *     ez_cineV_Gallery Gnuboard4
 *
 * 	    latest.skin.php
 *      
 *      Copyright 2011 Man Hyung, cho
 *      
 *      File encoding: Korean(Euc-kr)
 * 
 */

//$cols  = 4; //  이미지 가로갯수 //  이미지 세로 갯수는 메인에서 지정(총 이미지 수)

//$cols_subject  = 25;			// 우측 제목길이
//$list_content = "45";	// 하단 내용길이(이미지 아래)
//$image_h  = 10; // 이미지 상하 간격

// $is_crop = 1; 메인에서 지정
// $is_crop     : 세로 높이가 $height를 넘을 때 crop 할 것인지를 결정
//                0 : crop 하지 않습니다
//                1 : 기본 crop
//                2 : 중간을 기준으로 crop
$col_width = (int)(99 / $cols);


//불당썸---------------------------------------------------------------//
//$img_width = 110; //표시할 이미지의 가로사이즈
//$img_height = 75; //표시할 이미지의 세로사이즈 

//언�마스트 퀄리티(썸 노이즈바지)
$filter[type] = 99; 
$filter[arg1] = 100;
$filter[arg2] = 1;
$filter[arg3] = 2;


$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb';
$no_img = $latest_skin_path."/img/no_img.gif"; 


// 불당썸을 include
include_once("$g4[path]/lib/thumb.lib.php");
//불당썸---------------------------------------------------------------//

//$list_content = "450"; //내용길이
?>
<link rel="stylesheet" type="text/css" href="<?=$latest_skin_path?>/ez100_web.css"/>

<div class="ez100_web_latest_box">
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

<? for ($i=0; $i<count($list); $i++) { ?>

<? //리스트 페이지 이미지 출력   

//썸네일 생성
$thumfile = "";
$thumb = $thumb_path.'/'.$list[$i][wr_id];

$file = $list[$i][file][0][path] .'/'. $list[$i][file][0][file];

// 업로드된 파일이 이미지라면
if (preg_match("/\.(jpg|gif|png|bmp)$/i", $file) && file_exists($file)) { 
$thumb = thumbnail($file, $img_width, $img_height, 0, 1, 90, 0, "",  $filter, $noimg); //첨부파일 언�마스크추가

} else { //에디터에서 삽입한 이미지
	$edit_img = $list[$i]['wr_content'];
	if (eregi("data/cheditor4[^<>]*\.(gif|jp[e]?g|png|bmp)", $edit_img, $tmp)) { // data/cheditor------
	$file = $g4[path].'/' . $tmp[0]; // 파일명

	$thumb=thumbnail($file, $img_width, $img_height, 0, $is_crop, 90, 0, "",  $filter, $noimg); //언�마스크추가

	}
} 

?>

<div class="rListiFlexible">
	<ul>
		<li>
			<span class="thumb">
				<?
				if (preg_match("/\.(jpg|gif|png|bmp)$/i", $thumb) && file_exists($thumb)) {
				echo "<a href='{$list[$i]['href']}'>";
				echo "<img src='$thumb' border='0' align='absmiddle'>"; 
				echo "</a>";
				}
				?>
			</span>
			<strong>
				<? //제목
				echo "<a href='{$list[$i]['href']}'  class=\"b\">";
				echo "<b>{$list[$i]['subject']}</b>";
				echo "</a>";
				?></strong>

			<p><font style='font-family:돋움; font-size:9pt; color:#6A6A6A;'><?=cut_str(strip_tags($list[$i][wr_content]),$list_content,"...")?></font>&nbsp;&nbsp;<font style='font-family:돋움; font-size:9pt; color:#909090;'>(<?=$list[$i][wr_datetime] //날짜,시간?>)</font></p>
		</li>
	</ul>
</div>


<? } ?>
  <? if (count($list) == 0) { echo "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr><td colspan=3 align=center height=100>no data.</td></tr></table>"; } ?>
</div>
