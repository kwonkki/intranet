<?
$sub_menu = "300100";
include_once("./_common.php");
include_once("$g4[admin_path]/admin.lib.php");

auth_check($auth[$sub_menu], "w");

if (!$bo_table)
	alert("설정할 게시판을 지정해 주세요.");

if (!$board[bo_table])
	alert("존재하지 않은 게시판 입니다.");

if ($is_admin == "group") {
	if ($member[mb_id] != $group[gr_admin]) {
		alert("그룹이 틀립니다.");
	}
}

if ($is_admin != "super") {
    $group = get_group($board[gr_id]);
    $is_admin = is_admin($member[mb_id]);
}

// 스킨경로를 얻는다.
function get_skin_path($skin, $type, $opt='') {
    global $g4;

    $result_array = array();

	if($opt == "skin") {
		$dirname = "$g4[path]/skin/$type/";
	} else {
		$dirname = "$g4[path]/skin/board/$skin/skin/$type/";
	}

	$handle = opendir($dirname);
    while ($file = readdir($handle)) {
        if($file == "."||$file == "..") continue;

        if (is_dir($dirname.$file)) $result_array[] = $file;
    }
    closedir($handle);
    sort($result_array);

    return $result_array;
}

function get_skin($skin, $type, $name, $sel_name, $opt='', $change='') {
	global $g4;

	if($opt == "array") {
		$set = "<select name='{$name}[]' {$change} style='width:120px;'>";
	} else {
		$set = "<select name='{$name}' {$change} style='width:120px;'>";
	}
		
	$option = get_skin_path($skin, $type, $opt);

	for($i=0; $i<count($option); $i++) {
		$chk_sel = "";
		if($sel_name == $option[$i]) $chk_sel = "selected";
		$set .= "<option value='$option[$i]' {$chk_sel}>$option[$i]</option>\n";
	}
	$set .= "</select>\n";

	return $set;
}

$width = $board[bo_table_width];
if ($width <= 100) $width .= '%';

$g4[title] = "{$board[bo_subject]} 아미나 스킨 설정";

include_once ($g4[path]."/_head.php");

$is_setup = false;
if(file_exists("$g4[path]/setup.php")) {
		$is_setup = true;
        echo "<script type='text/javascript'> alert('셋업을 클릭하여 DB에 테이블과 필드를 생성해 주세요.');</script>";
}

?>

<style>
	.br { height:5px; padding:0; margin:0; line-height:1px; font:1px; } 
	.ed { border:1px solid #CCCCCC; } 
	.tx { border:1px solid #CCCCCC; }
	.settbl { border-collapse:collapse; BACKGROUND-COLOR: white;} 
	.settbl td, .settbl th { border:1px solid #ddd; padding : 7px 10px; line-height:1.6;}
	.settbl .head { padding:12px; font:bold 13px dotum; border-left:0; border-right:0;}
	.settbl .td1 { BACKGROUND-COLOR: #efefef; padding : 7px 0px; text-align:center; letter-spacing:-1px;}
	.settbl .td2 { BACKGROUND-COLOR: #f5f5f5; padding : 7px 0px; text-align:center; letter-spacing:-1px;}
	.settbl .td3 { BACKGROUND-COLOR: #fafafa; padding : 7px 0px; }
	.settbl .td4 { text-align:center; padding:7px 0px; }
	.btn_bo {cursor:pointer; padding:8px 20px; background:#efefef; font-weight:bold; color:#333; border:0px; cursor:pointer;}
	.btn_setup {cursor:pointer; padding:8px 20px; background:red; font-weight:bold; color:#ffffff; border:0px; cursor:pointer;}
	.btn_save {cursor:pointer; padding:8px 20px; background:#333333; font-weight:bold; color:gold; border:0px; cursor:pointer;}
</style>

<form name=fboardform method=post onsubmit="return fboardform_submit(this)" enctype="multipart/form-data">
<input type=hidden name="w"     value="<?=$w?>">
<input type=hidden name="bo_table"     value="<?=$bo_table?>">

<table border=0 cellpadding=0 cellspacing=0 width="<?=$width?>" align=center>
<tr><td>

<table border=0 cellpadding=0 cellspacing=0 width=100% class=settbl>
<col width=25><col width=40><col width=65><col />
<tr><td colspan=4 style="padding:12px; text-align:center; font:bold 14px verdana; color:gold; background:#333; border:0">
	AMINA SKIN <span style="color:greenyellow;"><?=$amina_skin_version?></span> SETUP
</td>
</tr>
<tr>
<td colspan=3 class="td2">게 시 판 명</td>
<td><span style="color:orangered;"><b><?=$board[bo_subject]?> (<?=$bo_table?>)</b></span></td>
</tr>
<tr>
<td colspan=3 class="td2">안 내 사 항</td>
<td>
	<ul style="padding-left:15px; margin:0px;">
		<li>각 설정값 좌측 체크박스를 선택하시면 같은 그룹에 속한 게시판의 아미나 스킨 설정을 동일하게 변경할 수 있습니다.
		<li>개별 스킨에 따라 추가설정이 있을 수도 있고, 없을 수도 있습니다.
	</ul>
</td>
</tr>
<tr>
<td valign=bottom colspan=3 class="head">
	1. 스킨 설정
</td>
<td align=right class="head">
	<input type=button onclick="document.location.href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>';" value=' 게시판 ' class="btn_bo">
	&nbsp; 
	<? if($is_setup) { ?>
		<input type=button onclick="document.location.href='<?=$g4[path]?>/setup.php?bo_table=<?=$bo_table?>';" value=' 셋업하기 ' class="btn_setup">
	<? } else {?>
		<input type=submit accesskey='s' value=' 저장하기 ' class="btn_save">
	<? } ?>
</td>
</tr>
<tr>
<td class="td1"><b>*</b></td>
<td colspan=2 class="td1"><b>구 &nbsp; 분</b></td>
<td class="td1"><b>설 / 정 / 하 / 기</b></td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_addon_skin value=1></td>
<td colspan=2 class="td2">애드온스킨</td>
<td>
	<? if(!$amina[addon_skin]) $amina[addon_skin] = "none"; ?>
	<?=get_skin($board[bo_skin], "addon", "addon_skin", $amina[addon_skin], "", "onchange='addon_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="addon_css"></span> <span id="addon_set"></span>

    <script type="text/javascript">
		function addon_css_load(skin) {
			$.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=addon_css&type=addon&skin="+skin, function (data) {
			    $("#addon_css").html(data);
	        });

		    $.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=addon_set&type=addon&skin="+skin+"&opt=set", function (data) {
			    $("#addon_set").html(data);
	        });
		}
		addon_css_load("<?=$amina[addon_skin]?>");
	</script>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_cate_skin value=1></td>
<td colspan=2 class="td2">카테고리탭</td>
<td>
	<? if(!$amina[cate_skin]) $amina[cate_skin] = "basic"; ?>
	<?=get_skin($board[bo_skin], "cate", "cate_skin", $amina[cate_skin], "", "onchange='cate_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="cate_css"></span>

    <script type="text/javascript">
		function cate_css_load(skin) {
			$.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=cate_css&type=cate&skin="+skin, function (data) {
			    $("#cate_css").html(data);
	        });
		}
		cate_css_load("<?=$amina[cate_skin]?>");
	</script>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_head_skin value=1></td>
<td colspan=2 class="td2">헤드스타일</td>
<td>
	<? if(!$amina[head_skin]) $amina[head_skin] = "basic"; ?>
	<?=get_skin($board[bo_skin], "head", "head_skin", $amina[head_skin], "", "onchange='head_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="head_css"></span>

    <script type="text/javascript">
		function head_css_load(skin) {
			$.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=head_css&type=head&skin="+skin, function (data) {
			    $("#head_css").html(data);
	        });
		}
		head_css_load("<?=$amina[head_skin]?>");
	</script>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_list_skin value=1></td>
<td colspan=2 class="td2">목 록 스 킨</td>
<td>
	<? if(!$amina[list_skin]) $amina[list_skin] = "basic"; ?>
	<?=get_skin($board[bo_skin], "list", "list_skin", $amina[list_skin], "", "onchange='list_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="list_css"></span> <span id="list_set"></span>

    <script type="text/javascript">
		function list_css_load(skin) {
			$.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=list_css&type=list&skin="+skin, function (data) {
			    $("#list_css").html(data);
	        });

		    $.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=list_set&type=list&skin="+skin+"&opt=set", function (data) {
			    $("#list_set").html(data);
	        });
		}
		list_css_load("<?=$amina[list_skin]?>");
	</script>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_view_skin value=1></td>
<td rowspan=5 class="td2">내용</td>
<td class="td2">내용스킨</td>
<td>
	<? if(!$amina[view_skin]) $amina[view_skin] = "basic"; ?>
	<?=get_skin($board[bo_skin], "view", "view_skin", $amina[view_skin], "", "onchange='view_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="view_css"></span> <span id="view_set"></span>

    <script type="text/javascript">
		function view_css_load(skin) {
			$.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=view_css&type=view&skin="+skin, function (data) {
			    $("#view_css").html(data);
	        });

		    $.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=view_set&type=view&skin="+skin+"&opt=set", function (data) {
			    $("#view_set").html(data);
	        });
		}
		view_css_load("<?=$amina[view_skin]?>");
	</script>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_view_photo value=1></td>
<td class="td2">회원사진</td>
<td>
	<select name="view_photo">
		<option value="1" <? if($amina[view_photo] == "" || $amina[view_photo] == "1") echo "selected"; ?>>모든회원</option>
		<option value="2" <? if($amina[view_photo] == "2") echo "selected"; ?>>있는회원</option>
		<option value="3" <? if($amina[view_photo] == "3") echo "selected"; ?>>이모티콘</option>
		<option value="0" <? if($amina[view_photo] == "0") echo "selected"; ?>>표시안함</option>
	</select>
	- 이모티콘 <?=get_skin($board[bo_skin], "emo", "emo_skin", $amina[emo_skin])?>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_view_good value=1></td>
<td class="td2">추천버튼</td>
<td><?=get_skin($board[bo_skin], "good", "view_good", $amina[view_good])?>
</td>
</tr>
<? if(!$amina[view_sns]) $amina[view_sns] = "basic"; ?>
<tr>
<td class="td1"><input type=checkbox name=chk_view_sns value=1></td>
<td class="td2">SNS버튼</td>
<td><?=get_skin($board[bo_skin], "sns", "view_sns", $amina[view_sns], "skin")?>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_sign_skin value=1></td>
<td class="td2">글 &nbsp;서&nbsp; 명</td>
<td>
	<? if(!$amina[sign_skin]) $amina[sign_skin] = "basic"; ?>
	<?=get_skin($board[bo_skin], "sign", "sign_skin", $amina[sign_skin], "", "onchange='sign_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="sign_css"></span> <span id="sign_set"></span>

    <script type="text/javascript">
		function sign_css_load(skin) {
			$.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=sign_css&type=sign&skin="+skin, function (data) {
			    $("#sign_css").html(data);
	        });

		    $.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=sign_set&type=sign&skin="+skin+"&opt=set", function (data) {
			    $("#sign_set").html(data);
	        });
		}
		sign_css_load("<?=$amina[sign_skin]?>");
	</script>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_cmt_skin value=1></td>
<td rowspan=3 class="td2">댓글</td>
<td class="td2">댓글스킨</td>
<td>
	<? if(!$amina[cmt_skin]) $amina[cmt_skin] = "basic"; ?>
	<?=get_skin($board[bo_skin], "cmt", "cmt_skin", $amina[cmt_skin], "", "onchange='cmt_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="cmt_css"></span>

    <script type="text/javascript">
		function cmt_css_load(skin) {
		    $.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=cmt_css&type=cmt&skin="+skin, function (data) {
			    $("#cmt_css").html(data);
	        });
	    }
		cmt_css_load("<?=$amina[cmt_skin]?>");
	</script>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_cmt_photo value=1></td>
<td class="td2">회원사진</td>
<td>
	<select name="cmt_photo">
		<option value="1" <? if($amina[cmt_photo] == "" || $amina[cmt_photo] == "1") echo "selected"; ?>>모든회원</option>
		<option value="2" <? if($amina[cmt_photo] == "2") echo "selected"; ?>>있는회원</option>
		<option value="0" <? if($amina[cmt_photo] == "0") echo "selected"; ?>>표시안함</option>
	</select>
</td>	
</tr>
<? if(!$amina[cmt_sns]) $amina[cmt_sns] = "basic_cmt"; ?>
<tr>
<td class="td1"><input type=checkbox name=chk_cmt_sns value=1></td>
<td class="td2">SNS버튼</td>
<td>
	<?=get_skin("sns", "sns", "cmt_sns", $amina[cmt_sns], "skin")?>
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_write_skin value=1></td>
<td colspan=2 class="td2">쓰 기 스 킨</td>
<td><?=get_skin($board[bo_skin], "write", "write_skin", $amina[write_skin])?></td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_page_skin value=1></td>
<td colspan=2 class="td2">페이징스킨</td>
<td>

	<? if(!$amina[page_skin]) $amina[page_skin] = "basic"; ?>
	<?=get_skin($board[bo_skin], "page", "page_skin", $amina[page_skin], "", "onchange='page_css_load(this.value);'")?>

	&nbsp; - &nbsp; 컬러셋 <span id="page_css"></span>

    <script type="text/javascript">
		function page_css_load(skin) {
			$.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=page_css&type=page&skin="+skin, function (data) {
			    $("#page_css").html(data);
	        });
		}
		page_css_load("<?=$amina[page_skin]?>");
	</script>		
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_btn_skin value=1></td>
<td colspan=2 class="td2">버튼이미지</td>
<td><?=get_skin($board[bo_skin], "btn", "btn_skin", $amina[btn_skin])?></td>
</tr>
<tr>
<td valign=bottom colspan=3 class="head">
	2. 기능 설정
</td>
<td align=right class="head">
	<input type=button onclick="document.location.href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>';" value=' 게시판 ' class="btn_bo">
	&nbsp; 
	<? if($is_setup) { ?>
		<input type=button onclick="document.location.href='<?=$g4[path]?>/setup.php?bo_table=<?=$bo_table?>';" value=' 셋업하기 ' class="btn_setup">
	<? } else {?>
		<input type=submit accesskey='s' value=' 저장하기 ' class="btn_save">
	<? } ?>
</td>
</tr>
<tr>
<td class="td1"><b>*</b></td>
<td colspan=2 class="td1"><b>구 &nbsp; 분</b></td>
<td class="td1"><b>설 / 정 / 하 / 기</b></td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_auto_rss value=1></td>
<td colspan=2 class="td2">통합 RSS</td>
<td>
	<input type=checkbox name='auto_rss' value='1' <? if($amina[auto_rss]) echo "checked"; ?>> 글등록시 자동으로 통합 RSS에 등록하기
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_video value=1></td>
<td colspan=2 class="td2">동 &nbsp;영&nbsp; 상</td>
<td>
	<input type=checkbox name='video' value='1' <? if($amina[video]) echo "checked"; ?>> 유튜브, 비메오, TED, 다음TV, 네이트TV, 판도라TV 동영상 직접첨부 사용
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_post_limit value=1></td>
<td colspan=2 class="td2">글 &nbsp;제&nbsp; 한</td>
<td>
	<? if(!$amina[limit_post_cnt]) $amina[limit_post_cnt] = 0; ?>
	회원당 
	<select name="limit_post">
		<option value="1" <? if($amina[limit_post] == "1") echo "selected"; ?>>하루</option>
		<option value="2" <? if($amina[limit_post] == "2") echo "selected"; ?>>전체</option>
	</select>
	최대 <input type=text class=ed name='limit_post_cnt' size=4 maxlength=4 numeric value='<?=$amina[limit_post_cnt]?>'> 개까지 글등록 가능(관리자 제외)
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_point_limit value=1></td>
<td colspan=2 class="td2">점수제한</td>
<td>
	<input type=checkbox name='limit_cmt' value='1' <? if($amina[limit_cmt]) echo "checked"; ?>> 자신의 글에 쓴 자신의 댓글/별점에는 포인트 적립하지 않음
	<div class=br></div>
	<? if(!$amina[limit_date]) $amina[limit_date] = 0; ?>
	<input type=text class=ed name='limit_date' size=4 maxlength=10 numeric value='<?=$amina[limit_date]?>'> 일 이상 지난 글에 쓴 댓글/추천/별점은 포인트 적립하지 않음
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_shingo value=1></td>
<td colspan=2 class="td2">블라인드</td>
<td>
	<? if(!$amina[shingo]) $amina[shingo] = 0; ?>
	<input type=text class=ed name='shingo' size=4 numeric maxlength=10 value='<?=$amina[shingo]?>'> 회 이상 신고시 글을 자동 블라인드 처리함
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_upimg value=1></td>
<td colspan=2 class="td2">리사이즈</td>
<td>
	<? 
		if(!$amina[upimg_size]) $amina[upimg_size] = 0; 
		if(!$amina[upimg_quality]) $amina[upimg_quality] = 90; 
	?>
	<input type=text class=ed name='upimg_size' size=4 maxlength=10 numeric value='<?=$amina[upimg_size]?>'> px 보다 폭(width)이 큰 이미지는 업로드시 자동 리사이즈
	(리사이즈 퀄리티 : <input type=text class=ed name='upimg_quality' numeric size=4 maxlength=3 value='<?=$amina[upimg_quality]?>'> %)

</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_good_point value=1></td>
<td colspan=2 class="td2">추천점수</td>
<td>
	<? 
		if(!$amina[good_point]) $amina[good_point] = 0; 
		if(!$amina[good_repoint]) $amina[good_repoint] = 0;
	?>

	추천시 <input type=text class=ed name='good_point' size=4 numeric maxlength=10 value='<?=$amina[good_point]?>'> 포인트 적립
	/ 
	글쓴이에게 <input type=text class=ed name='good_repoint' size=4 numeric maxlength=10 value='<?=$amina[good_repoint]?>'> 포인트 적립 - 비추천도 동일 적용

</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_star value=1></td>
<td colspan=2 class="td2">회원별점</td>
<td>
	<select name="star">
		<option value="0">사용안함</option>
		<option value="1" <? if($amina[star] == "1") echo "selected"; ?>>글쓴이</option>
		<option value="2" <? if($amina[star] == "2") echo "selected"; ?>>회원별점</option>
	</select>

	&nbsp;

	<select name="star_color">
		<option value="gold" <? if($amina[star_color] == "gold") echo "selected"; ?>>골드별</option>
		<option value="blue" <? if($amina[star_color] == "blue") echo "selected"; ?>>블루별</option>
		<option value="red" <? if($amina[star_color] == "red") echo "selected"; ?>>레드별</option>
		<option value="violet" <? if($amina[star_color] == "violet") echo "selected"; ?>>보라별</option>
		<option value="orange" <? if($amina[star_color] == "orange") echo "selected"; ?>>살구별</option>
		<option value="green" <? if($amina[star_color] == "green") echo "selected"; ?>>그린별</option>
	</select>	

	&nbsp;

	<? if(!$amina[star_skin]) $amina[star_skin] = "basic"; ?>
	입력 <?=get_skin($board[bo_skin], "star", "star_skin", $amina[star_skin], "", "onchange='star_css_load(this.value);'")?>

	&nbsp;
	
	컬러셋 <span id="star_css"></span>

    <script type="text/javascript">
		function star_css_load(skin) {
		    $.get("<?=$board_skin_path?>/amina.set.form.sel.php?bo_table=<?=$bo_table?>&name=star_css&type=star&skin="+skin, function (data) {
			    $("#star_css").html(data);
	        });
	    }
		star_css_load("<?=$amina[star_skin]?>");
	</script>

	<div class=br></div>

	<? 
		if(!$amina[star_point]) $amina[star_point] = 0; 
		if(!$amina[star_repoint]) $amina[star_repoint] = 0;
	?>
	별점시 <input type=text class=ed name='star_point' numeric size=4 maxlength=10 value='<?=$amina[star_point]?>'> 포인트 적립 
	/
	글쓴이에게 <input type=text class=ed name='star_repoint' size=4 numeric maxlength=10 value='<?=$amina[star_repoint]?>'> 포인트 적립

</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_cmt_cool value=1></td>
<td colspan=2 class="td2">댓글평가</td>
<td>
	<input type=checkbox name='cmt_cool' value='1' <? if($amina[cmt_cool]) echo "checked"; ?>> 사용

	<? if(!$amina[cmt_cool_txt]) $amina[cmt_cool_txt] = "좋아!"; ?>
	- <input type=text class=ed name='cmt_cool_txt' size=6 value='<?=$amina[cmt_cool_txt]?>'> 표시(좋아! 찬성! 인증! 등)
	/
	<? if(!$amina[cmt_bad_txt]) $amina[cmt_bad_txt] = "별로!"; ?>
	<input type=text class=ed name='cmt_bad_txt' size=6 value='<?=$amina[cmt_bad_txt]?>'> 표시(별로! 반대! 글쎄! 등)
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_cmt_good value=1></td>
<td colspan=2 class="td2">댓글공감</td>
<td>
	<input type=checkbox name='cmt_good' value='1' <? if($amina[cmt_good]) echo "checked"; ?>> 사용

	<? if(!$amina[cmt_good_txt]) $amina[cmt_good_txt] = "공감"; ?>
	- <input type=text class=ed name='cmt_good_txt' size=6 value='<?=$amina[cmt_good_txt]?>'> 표시(공감, 추천, 인증 등)

	<? if(!$amina[cmt_best]) $amina[cmt_best] = 0; ?>
	/ <input type=text class=ed name='cmt_best' size=6 numeric maxlength=10 value='<?=$amina[cmt_best]?>'> 개 이상 베스트

	<? 
		if(!$amina[cmt_good_point]) $amina[cmt_good_point] = 0; 
		if(!$amina[cmt_good_repoint]) $amina[cmt_good_repoint] = 0;
	?>

	<div class=br></div>	

	공감시 <input type=text class=ed name='cmt_good_point' numeric size=4 maxlength=10 value='<?=$amina[cmt_good_point]?>'> 포인트 적립 
	/
	글쓴이에게 <input type=text class=ed name='cmt_good_repoint' size=4 numeric maxlength=10 value='<?=$amina[cmt_good_repoint]?>'> 포인트 적립 

</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_cmt_choice value=1></td>
<td colspan=2 class="td2">댓글채택</td>
<td>
	<input type=checkbox name='cmt_choice' value='1' <? if($amina[cmt_choice]) echo "checked"; ?>> 사용

	<? if(!$amina[cmt_choice_txt]) $amina[cmt_choice_txt] = "채택"; ?>
	- <input type=text class=ed name='cmt_choice_txt' size=6 value='<?=$amina[cmt_choice_txt]?>'> 표시(채택, 당첨, 선정 등)

	<? if(!$amina[cmt_choice_return]) $amina[cmt_choice_return] = 0; ?>
	/ 채택시 건 포인트의 <input type=text class=ed name='cmt_choice_return' size=4 numeric maxlength=10 value='<?=$amina[cmt_choice_return]?>'> % 돌려받음
</td>
</tr>
<tr>
<td class="td1"><input type=checkbox name=chk_nameless value=1></td>
<td colspan=2 class="td2">익 &nbsp;명&nbsp; 글</td>
<td>
	<input type=checkbox name='nameless_write' value='1' <? if($amina[nameless_write]) echo "checked"; ?>> 글

	<input type=checkbox name='nameless_cmt' value='1' <? if($amina[nameless_cmt]) echo "checked"; ?>> 댓글

	- 익명글은 글수정 불가(검색방지를 위해 mb_id 자체를 삭제)

	<div class=br></div>	

	표시이름 
	: 
	접두어 <input type=text class=ed name='nameless_head' size=10 value='<?=$amina[nameless_head]?>'> 
	+ 
	<? if(!$amina[nameless_tail]) $amina[nameless_tail] = 6; ?>
	<input type=text class=ed name='nameless_tail' size=2 maxlength=4 numeric value='<?=$amina[nameless_tail]?>'> 자리 랜덤 이름
</td>
</tr>
<tr>
<td colspan=4 class="head" align="right" style="border-bottom:0px;">
	<input type=button onclick="document.location.href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>';" value=' 게시판 ' class="btn_bo">
	&nbsp; 
	<? if($is_setup) { ?>
		<input type=button onclick="document.location.href='<?=$g4[path]?>/setup.php?bo_table=<?=$bo_table?>';" value=' 셋업하기 ' class="btn_setup">
	<? } else {?>
		<input type=submit accesskey='s' value=' 저장하기 ' class="btn_save">
	<? } ?>
</td>
</tr>
</table>
</form>

</td></tr></table>

<br><br>

<script type="text/javascript">

function fboardform_submit(f) {

    f.action = "./amina.set.form.update.php";

	return true;
}
</script>

<?
include_once ($g4[path]."/_tail.php");

?>
