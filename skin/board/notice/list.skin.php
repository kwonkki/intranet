<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 6;
//if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>
?>

<div >
	<img src="<?=$g4[path]?>/images/psp_notice.png">
</div>

<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <? if ($is_category) { ?><form name="fcategory" method="get"><td width="50%"><select name=sca onchange="location='<?=$category_location?>'+this.value;"><option value=''>전체</option><?=$category_option?></select></td></form><? } ?>
    <td align="right">
        Total Notice  : <?=number_format($total_count)?> 
</tr>
<tr><td height=5></td></tr>
</table>

<!-- 제목 -->
<form name="fboardlist" method="post" style="margin:0px;">
<input type='hidden' name='bo_table' value='<?=$bo_table?>'>
<input type='hidden' name='sfl'  value='<?=$sfl?>'>
<input type='hidden' name='stx'  value='<?=$stx?>'>
<input type='hidden' name='spt'  value='<?=$spt?>'>
<input type='hidden' name='page' value='<?=$page?>'>
<input type='hidden' name='sw'   value=''>
<table width=100% cellpadding=0 cellspacing=0>
<tr><td colspan=<?=$colspan?> height=2 bgcolor=#B0ADF5></td></tr>
<tr bgcolor=#F8F8F9 height=30 align=center>
    <td width=50>Num</td>
    <?/* if ($is_category) { ?><td width=70>분류</td><?}*/?>
    <? if ($is_checkbox) { ?><td width=40><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></td><?}?>
    <td>Notice</td>
    <td width=110>&nbsp;</td>
    <td width=20></td>
	<td width=60><?=subject_sort_link('wr_datetime', $qstr2, 1)?>Date</a></td>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#B0ADF5></td></tr>

<!-- 목록 -->
<? for ($i=0; $i<count($list); $i++) { ?>
<tr height=28 align=center> 
    <td>
        <? 
        if ($list[$i][is_notice]) // 공지사항 
            echo "<img src=\"$board_skin_path/img/notice_icon.gif\" width=30 height=16>";
        else if ($wr_id == $list[$i][wr_id]) // 현재위치
            echo "<span style='color:#ff6600;font-weight:bold;'>{$list[$i][num]}</span>";
        else
            echo "<span style='color:#888888;'>{$list[$i][num]}</span>";
        ?></td>
    <?/* if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><span class=small style='color:#888888;'><?=$list[$i][ca_name]?></span></a></td><? } */?>
    <? if ($is_checkbox) { ?><td><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='word-break:break-all;'>
        <? 
        echo $nobr_begin;
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
        if ($is_category && $list[$i][ca_name]) { 
            echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
        }
        $style = "";
        if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";

        echo "<a href='{$list[$i][href]}' $style>";
        echo $list[$i][subject];
        echo "</a>";

        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:7pt;color:#ff6600;'>{$list[$i][comment_cnt]}</span></a>";
        //echo " " . $list[$i][icon_new];
        echo " " . $list[$i][icon_file];
        echo " " . $list[$i][icon_link];
        echo " " . $list[$i][icon_hot];
        echo " " . $list[$i][icon_secret];
        echo $nobr_end;
        ?></td>
    <td>&nbsp;</td>
    <td><span style='color:#888888;'></td>
    <td><?=$list[$i][datetime2]?></span></td>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#E7E7E7></td></tr>
<?}?>

<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>No Notice.</td></tr>"; } ?>
<tr><td colspan=<?=$colspan?> bgcolor=#5C86AD height=1></td></tr>
</table>
</form>

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
        $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<b><font style=\"font-family:돋움; font-size:9pt; color:#797979\">$1</font></b>", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><font style=\"font-family:돋움; font-size:9pt; color:orange;\">$1</font></b>", $write_pages);
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
        <? if ($list_href) { ?><a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/btn_list.gif" border="0"></a><? } ?>
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border="0"></a><? } ?>
        <? if ($is_checkbox) { ?>
            <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" border="0"></a>
        <? } ?>
    </td>
    <td width="50%" align="right">
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
<!-- 게시판 목록 끝 -->
