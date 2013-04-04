<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

//링크 조정
if($sca) $qstr2 .= "&sca=".urlencode($sca);

$qstr2 = $qstr2."".$frame_opt;

$no_list = "게시물이 없습니다.";

?>

<!-- AMINA SKIN v2.x for G4 / Copyright (c) 2012 AMINA - http://amina.co.kr -->

<? if($amina[star] && !$wr_id) { @include_once("$g4[path]/lib/amina.lib.star.php"); ?>
	<link rel="stylesheet" href="<?=$board_skin_path?>/star.css" type="text/css">
<? } ?>

<table border=0 cellpadding=0 cellspacing=0 width="<?=$width?>" align=center>
<tr>
<td>
	<? if(!file_exists($list_skin_path."/list.skin.php")) { ?>
		<div style='text-align:center; padding:100px 0; margin:20px 0; font-weight:bold; color:crimson; background:#fafafa; border:1px solid #ddd; line-height:30px;'>
			아미나 스킨 v2.x의 설정값이 없습니다. 
			<br> 
			관리자 로그인후 하단에 있는 '아미나 설정'에서 세팅해 주시기 바랍니다.
		</div>
	<? } else { if($amina[addon_skin] != "none") @include_once ("$addon_skin_path/addon.skin.php"); ?>
	
		<form name="fboardlist" method="post">
		<input type='hidden' name='bo_table' value='<?=$bo_table?>'>
		<input type='hidden' name='sfl'  value='<?=$sfl?>'>
		<input type='hidden' name='stx'  value='<?=$stx?>'>
		<input type='hidden' name='spt'  value='<?=$spt?>'>
		<input type='hidden' name='page' value='<?=$page?>'>
		<input type='hidden' name='frame' value='<?=$frame?>'>
		<input type='hidden' name='bo_it' value='<?=$bo_it?>'>
		<input type='hidden' name='sw'   value=''>

		<? if ($is_category) { @include($cate_skin_path."/cate.skin.php"); } ?>
		<? include($list_skin_path."/list.skin.php"); ?>

		</form>
		
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr>
		<td style="padding:0px 10px;">
			<? if(!$frame ||$rss_href ) { ?>
				<link rel="stylesheet" href="<?=$board_skin_path?>/search.css" type="text/css">
				<table border=0 cellpadding=0 cellspacing=0 border=0>
				<tr height=40>
				<? if ($rss_href) { ?>
					<td><a href="javascript:show_box('rss_box');"><img src='<?=$btn_skin_path?>/btn_rss.gif' border=0></a></td>
					<td id="rss_box" style="display:none;">
						<ul>
							<li><a href="<?=$board_skin_path?>/rss.php?bo_table=<?=$bo_table?>" target="_blank" title=" 본 게시판 전용 RSS 2.0 ">게시판</a></li>
							<li><a href="<?=$g4[path]?>/rss" target="_blank" title=" 구독용 전체 RSS 2.0 ">전체</a></li>
						</ul>
					</td>
				<? } ?>

				<? if (!$frame) { $display_search = "none"; if($stx) { $display_search = "block"; }	?>
					<td><a href="javascript:show_box('search_box');"><img src="<?=$btn_skin_path?>/btn_search.gif" border=0></a></td>
					<td id="search_box" style="padding-left:12px; display:<?=$display_search?>;">
						<table cellpadding=0 cellspacing=0 class="search">
						<form name="fsearch" method="get">
						<input type="hidden" name="bo_table" value="<?=$bo_table?>">
					    <input type="hidden" name="sca"      value="<?=$sca?>">
						<tr><td class="select">
							<select name="sfl">
								<option value="wr_subject||wr_content">제목+내용</option>
								<option value="wr_subject">제목</option>
								<option value="wr_content">내용</option>
								<option value="mb_id,1">회원아이디</option>
								<option value="mb_id,0">회원아이디(댓글)</option>
								<option value="wr_name,1">글쓴이</option>
								<option value="wr_name,0">글쓴이(댓글)</option>
						   </select>
					   </td>
					   <td class="input"><input name="stx" class="stx" itemname="검색어" required value="<?=stripslashes($stx)?>"></td>
					   <td><input type="image" src="<?=$board_skin_path?>/img/btn_search.png" class="submit"></td>
					   </tr>
					   </form>
					   </table>
				   </td>
			   <? } ?>
			   </tr>
			   </table>
		   <? } ?>
		</td>
		<td align=right style="padding:10px;">
			<? if ($write_href) { if($sca) $write_href .= "&sca=".urlencode($sca); ?>
				<a href="<?=$write_href?><?=$frame_opt?><?=$search_opt?>"><img src="<?=$btn_skin_path?>/btn_write.gif" border='0' align='absmiddle'></a>
			<? } else { ?>
				<a href="javascript:alert('로그인을 하지 않았거나 권한이 없는 레벨입니다.')"><img src="<?=$btn_skin_path?>/btn_write.gif" border='0' align='absmiddle'></a>
			<? } ?>
		</td></tr>
		</table>

		<!-- Paginate -->
		<? @include($page_skin_path."/page.skin.php"); ?>

	<?	} ?>

	<? if ($is_checkbox || $admin_href) { ?>
		<div class=small style="text-align:center; background:#fafafa; border:1px solid #eee; margin:15px 0px; padding:12px; letter-spacing:-1px; color:#aaa;">
			<? if ($is_checkbox) { ?>
				<a href="javascript:select_delete();">선택삭제</a> &nbsp; | &nbsp; <a href="javascript:select_copy('copy');">선택복사</a> &nbsp; | &nbsp; <a href="javascript:select_copy('move');">선택이동</a>
			<? } ?>
			<? if ($admin_href) { ?>
				&nbsp; | &nbsp;	<a href="<?=$admin_href?>">그누보드 설정</a> &nbsp; | &nbsp; <a href="<?=$board_skin_path?>/amina.set.form.php?bo_table=<?=$bo_table?>">아미나 설정</a> 
				&nbsp; | &nbsp;	<a href="<?=$g4[bbs_path]?>/amina.blind.list.php">블라인드글 관리</a>
			<?}?>
		</div>
	<? } ?>
</td></tr>
</table>

<script language="JavaScript">
function list_shingo(url) {
	if (confirm("본 글을 정말 신고하시겠습니까?\n\n한번 신고하면 취소할 수 없습니다.")) hiddenframe.location.href = url;
}
function show_box(id) {
	var mode=document.getElementById(id).style.display;
	if (mode=='block') { 
		document.getElementById(id).style.display='none';
	} else {
		document.getElementById(id).style.display='block';
	}
}
<? if ($is_checkbox) { ?>
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
        alert(str + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete() {
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 게시물을 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
<? } ?>
</script>
<!-- 게시판 목록 끝 -->
