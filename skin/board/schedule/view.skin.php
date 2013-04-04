﻿<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$year = substr($view[wr_link1],0,4);
$month = sprintf("%d",substr($view[wr_link1],4,2));
$day = sprintf("%d",substr($view[wr_link1],6,2));
?>
<link rel="stylesheet" href="<?=$board_skin_path?>/style.css" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td>

<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0" bgcolor="#dde6f4">
  <tr><td>
<table width="100%" height="34" border="0" cellspacing="0" cellpadding="0">
<tr class="bbs_head"> 
    <td class="bbs_pl bbs_fhead">
		<img src="<?=$board_skin_path?>/img/img_sub.gif" width="17" height="14" align="absmiddle">
		&nbsp;<b><?=$view[subject]?></b>	</td>
    <td class="bbs_pl bbs_fhead">
	<div align="right"> <font style="font:normal 12px 돋움; color:#6289BB;">
        <?=substr($view[wr_datetime],2,14)?>
&nbsp;&nbsp;
        <?=$view[name]?>
        </font>
            <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_modify.gif' border='0' align='absmiddle'></a> "; } ?>
            <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_del.gif' border='0' align='absmiddle'></a> "; } ?>
    </div>
	</td>
</tr>
<tr><td colspan="3" class="bbs_line1"></td></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr> 
	<td>
		<font color="#CF4900"> - 현재일</font> : <?=$year?>년 <?=$month?>월 <?=$day?>일
	</td>
	<td>
	<font color="#CF4900">- 등록일</font> : <?=date("Y년 n월 j일", strtotime($view[wr_datetime]))?> 
	</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr> 
	<td valign="top" style='word-break:break-all; padding:5px;'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="c_tc">
	<? 
		// 파일 출력
		for ($i=0; $i<=count($view[file]); $i++) {
			if ($view[file][$i][view]) echo $view[file][$i][view] . "<p>" . $view[file][$i][content] . "<p>";
		}

		echo "<span class='bbs_content'>$view[content]</span>";
	?>			
	</td></tr></table>	<!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>
</td></tr></table>
</td></tr></table>
</td></tr></table>
<script language="JavaScript">
// HTML 로 넘어온 <img ... > 태그의 폭이 테이블폭보다 크다면 테이블폭을 적용한다.
function resize_image()
{
    var target = document.getElementsByName('target_resize_image[]');
    var image_width = parseInt('<?=$board[bo_image_width]?>');
    var image_height = 0;

    for(i=0; i<target.length; i++) { 
        // 원래 사이즈를 저장해 놓는다
        target[i].tmp_width  = target[i].width;
        target[i].tmp_height = target[i].height;
        // 이미지 폭이 테이블 폭보다 크다면 테이블폭에 맞춘다
        if(target[i].width > image_width) {
            image_height = parseFloat(target[i].width / target[i].height)
            target[i].width = image_width;
            target[i].height = parseInt(image_width / image_height);
        }
    }
}

window.onload = resize_image;
</script>
