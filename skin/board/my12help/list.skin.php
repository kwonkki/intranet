<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

//if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>

// image를 cdn에 올려둔 경우에는 해당 cdn의 url 주소를 적어주면 됩니다.
// $board_skin_path = "http://echo4me.imagetong.com/gnuboard4/skin/board/cheditor"
?>
<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0 margin=0 padding=0><tr><td>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<? if(!$wr_id) { ?>
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
	<td>
	<?php echo $title_img; ?>
	</td>
</tr>
<tr><td height=5></td></tr>
</table>
<? } ?>

<!-- 인기게시글 -->
<? if ($board[bo_hot_list]) { ?>
<table width="100%" cellspacing="0" cellpadding="0">
<tr><td><? include_once("$g4[path]/lib/latest.lib.php"); echo latest_popular("simple_box", $bo_table, 10, 256); ?></td></tr><tr height=5><td></td></tr></table>
<? } ?>



<table width="750" height="31" border="0" cellpadding="0" cellspacing="0" background="<?=$board_skin_path?>/img/sub_tep_02.gif" style="MARGIN: 5px 0 5px 0px">
<tbody>
<tr>
	<td width="4"><img src="<?=$board_skin_path?>/img/sub_tep_01.gif" width="4" height="31"></td>
	<td width="50" align="center"><? if($is_checkbox){ ?><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox><? }?><strong><font color="515151">Seq</font></strong></td>
	<td width="1" align="center"><strong><img src="<?=$board_skin_path?>/img/sub_unbg01.gif" width="1" height="10"></strong></td>
	<td align="center"><strong><font color="515151">Title</font></strong></td>
	<td width="1" align="center"><strong><img src="<?=$board_skin_path?>/img/sub_unbg01.gif" width="1" height="11"></strong></td>
	<td width="105" align="center"><strong><font color="515151">Writer</font></strong></td>
	<td width="1" align="center"><strong><img src="<?=$board_skin_path?>/img/sub_unbg01.gif" width="1" height="11"></strong></td>
	<td width="80" align="center"><strong><font color="515151">Date</font></strong></td>
	<td width="1" align="center"><strong><img src="<?=$board_skin_path?>/img/sub_unbg01.gif" width="1" height="10"></strong></td>
	<td width="50" align="center"><strong><font color="515151">View</font></strong></td>
	<td width="1" align="center"><strong><img src="<?=$board_skin_path?>/img/sub_unbg01.gif" width="1" height="10"></strong></td>
	<td width="40" align="center"><strong><font color="515151">Likes</font></strong></td>
	<td width="4" align="right"><img src="<?=$board_skin_path?>/img/sub_tep_03.gif" width="4" height="31"></td>
</tr>
</tbody>
</table>

<!-- STR : new table -->
<form name="fboardlist" method="post" style="margin:0px;">
<input type='hidden' name='bo_table' value='<?=$bo_table?>'>
<input type='hidden' name='sfl'  value='<?=$sfl?>'>
<input type='hidden' name='stx'  value='<?=$stx?>'>
<input type='hidden' name='spt'  value='<?=$spt?>'>
<input type='hidden' name='page' value='<?=$page?>'>
<input type='hidden' name='sw'   value=''>
<input type='hidden' name='sca'   value=''>


<table width="750" border="0" cellspacing="0" cellpadding="0" style="MARGIN: 0 0 0 0px">
<tbody>
	<? for( $i=0; $i<count($list); $i++) { ?>
	<tr>
        <td class="G12read">
		<table width="100%" border="0" cellspacing="6" cellpadding="0" id="57">
			<tbody><tr>
				<td width="45" height="29" class="A11gray">
				<center>
				<? if ($is_checkbox) { ?><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"><? } ?>
				<?
				if ($list[$i][is_notice]) // 공지사항 
         		   	echo "<img src=\"$board_skin_path/img/icon_notice.gif\">";
		        else if ($wr_id == $list[$i][wr_id]) // 현재위치
		        	echo "<span style='font:bold; color:#E15916;'>{$list[$i][num]}</span>";
		        else
		            echo "{$list[$i][num]}";
				?>
				</center></td>
				
				<td class="G12read">&nbsp
				<?
				//echo $nobr_begin;
		        echo $list[$i][reply];
		        echo $list[$i][icon_reply];
		        if ($is_category && $list[$i][ca_name]) { 
		            //echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
		        }
		        $style = "";
		        //if ($list[$i][is_notice]) $style .= " style='font-weight:bold;'";
		        //if ($list[$i][wr_singo]) $style .= " style='color:#B8B8B8;'";
		
		        echo "<a href='{$list[$i][href]}' $style>";
		        echo $list[$i][subject];
		        echo "</a>";
		
		        if ($list[$i][comment_cnt]) 
		            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:10px;color:#EE5A00;'>{$list[$i][comment_cnt]}</span></a>";
		
		        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
		        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
		
		        echo " " . $list[$i][icon_new];
		        echo " " . $list[$i][icon_file];
		        echo " " . $list[$i][icon_link];
		        if (!$list[$i][is_notice]) {
		
		        echo " " . $list[$i][icon_hot];
		        }
		        echo " " . $list[$i][icon_secret];
		        //echo $nobr_end;
				
				?>
				</td>
				
				<td width="90" align="center" class="D11"><font color="#fff"><?=$list[$i][name]?></font></td>
				<td width="80" align="center"><font color="717171"><?=$list[$i][datetime]?></font></td>
				<td width="40" align="right" class="A12gray" style="padding:0 5px 0 0px"><strong><?=$list[$i][wr_hit]?></strong></td>
				<td width="35" align="right" class="A12gray" style="padding:0 5px 0 0px"><strong><?=$list[$i][wr_good]?></strong></td>
			</tr>
		</tbody></table>
		</td>
    </tr> 
    <tr>
        <td bgcolor="E6E6E6" colspan="6" style="font-size : 1px;"><img src="http://image.donga.com/mlbpark/img200807/blank.gif" width="1" height="1"></td>
    </tr>
	<? } ?> 	
 
</tbody>
</table>
</form>
<!-- END : new table-->


<!-- 페이지 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="100%" align="center" height=30 valign=bottom>
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/btn_search_prev.gif' border=0 align=absmiddle title='이전검색'></a>"; } ?>
        <?
        // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
        //echo $write_pages;
        $write_pages = str_replace("처음", "<img src='$board_skin_path/img/begin.gif' border='0' align='absmiddle' title='처음'>", $write_pages);
        $write_pages = str_replace("이전", "<img src='$board_skin_path/img/prev.gif' border='0' align='absmiddle' title='이전'>", $write_pages);
        $write_pages = str_replace("다음", "<img src='$board_skin_path/img/next.gif' border='0' align='absmiddle' title='다음'>", $write_pages);
        $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/end.gif' border='0' align='absmiddle' title='맨끝'>", $write_pages);
        $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<b><font style=\"font-family:tahoma; font-size:11px; color:#000000\">$1</font></b>", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><font style=\"font-family:tahoma; font-size:11px; color:#E15916;\">$1</font></b>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/btn_search_next.gif' border=0 align=absmiddle title='다음검색'></a>"; } ?>
    </td>
</tr>
</table>

<!-- 링크 버튼, 검색 -->
<form name=fsearch method=get style="margin:0px;">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=sca      value="<?=$sca?>">
<table width=100% cellpadding=0 cellspacing=0>
<tr> 
    <td width="50%" height="40">
        <? if ($list_href) { ?><a href="<?=$list_href?>" class="btn_big"><span>List</span></a><? } ?>
        <? if ($write_href) { ?><a href="<?=$write_href?>" class="btn_big"><span>Write</span></a><? } ?>
        <? if ( $is_checkbox) { ?>
            <a href="javascript:select_delete();" class="btn_big"><span>Delete</span></a>
            <!--
            <a href="javascript:select_copy('copy');" class="btn_big"><span>Select Copy</span></a>
            <a href="javascript:select_copy('move');" class="btn_big"><span>Select Move</span></a>
            -->
            <? if ($is_category) { ?>
            <a href="javascript:select_category();"><img src="<?=$board_skin_path?>/img/btn_select_category.gif" border="0"></a>
            <select name=sca2><?=$category_option?></select>
            <? } ?>
        <? } else if($delete_href) echo "<a href=\"$delete_href\" class=\"btn_big\"><span>Delete</span></a> ";  ?>
        
        <? if ($update_href) { ?> <a href="<?=$update_href?>" class="btn_big"><span>Modify</span></a><? } ?>
    </td>
    <td width="50%" align="right">
        <select name=sfl>
            <option value='wr_subject'>title</option>
            <option value='wr_content'>content</option>
            <option value='wr_subject||wr_content'>title+content</option>
            <option value='mb_id,1'>member id</option>
            <option value='wr_name,1'>name</option>
        </select><input name=stx maxlength=15 size=10 itemname="검색어" required value='<?=stripslashes($stx)?>'><select name=sop>
            <option value=and>and</option>
            <option value=or>or</option>
        </select>
        <input type=image src="<?=$board_skin_path?>/img/search_btn.gif" border=0 align=absmiddle></td>
</tr>
</table>
</form>

</td></tr></table>

<script language="JavaScript">
if ('<?=$sca?>') document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';
    document.fsearch.sop.value = '<?=$sop?>';
}
</script>

<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str) {
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert("select the article more than one");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete() {
    var f = document.fboardlist;

    str = "delete";
    if (!check_confirm(str))
        return;

    if (!confirm("Do you want to delete?"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "copy";
    else
        str = "move";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}

// 선택한 게시물 카테고리를 변경
function select_category() {
    var f = document.fboardlist;
    var f2 = document.fsearch;

    str = "change the category";
    if (!check_confirm(str))
        return;

    str = f2.sca2.value;
    if (!confirm("Do you want to transfer the category to  "+str+" "))
        return;

    // sca에 값을 넣어줘야죠.
    f.sca.value = str;

    f.action = "./category_all.php";
    f.submit();
}
</script>
<? } ?>

<style>
.G12read {
	FONT-SIZE: 14px; COLOR: #333333; LINE-HEIGHT: 18px; FONT-FAMILY: "sans-serif"
}
.G12read A:link {
	COLOR: #333333; TEXT-DECORATION: none
}
.G12read A:visited {
	COLOR: #7601a7; TEXT-DECORATION: none
}
.G12read A:hover {
	COLOR: #fb4c14; TEXT-DECORATION: underline
}
.G12 {
	FONT-SIZE: 15px; COLOR: #333333; LINE-HEIGHT: 18px; FONT-FAMILY: "sans-serif"
}
</style>
<!-- 게시판 목록 끝 -->
