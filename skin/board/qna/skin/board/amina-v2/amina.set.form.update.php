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


// Emo Count Function
function get_emo_cnt($dirname) {

	$i = 0;

	if(!is_dir($dirname)) return $i;

	$handle = opendir($dirname);
    while ($file = readdir($handle)) {
		if(preg_match("/(\.gif)/i", $file, $matches)) $i++;
    }
    closedir($handle);

    return $i;
}

//Chk Resize - Quality Range 1 ~ 100
if($upimg_quality > 100) {
	$upimg_quality = 100;
} else if($upimg_quality < 1) {
	$upimg_quality = 1;
} 

//Emo Count
$emo_path = $board_skin_path."/skin/emo/".$emo_skin;
$emo_cnt = get_emo_cnt($emo_path);

//Load Skin Set Data : $addon_set, $list_set, $view_set, $sign_set
@include_once("$board_skin_path/skin/addon/$addon_skin/set/set.save.php");
@include_once("$board_skin_path/skin/list/$list_skin/set/set.save.php");
@include_once("$board_skin_path/skin/view/$view_skin/set/set.save.php");
@include_once("$board_skin_path/skin/sign/$sign_skin/set/set.save.php");

$sql_common = " gr_id				= '$gr_id',
                bo_table			= '$bo_table',
                auto_rss			= '$auto_rss',
                video				= '$video',
                limit_post			= '$limit_post',
                limit_post_cnt		= '$limit_post_cnt',
				limit_cmt			= '$limit_cmt',
                limit_date			= '$limit_date',
				shingo				= '$shingo',
                good_point			= '$good_point',
                good_repoint		= '$good_repoint',
                upimg_size			= '$upimg_size',
                upimg_quality		= '$upimg_quality',
                star				= '$star',
                star_color			= '$star_color',
                star_skin			= '$star_skin',
                star_css			= '$star_css',
                star_point			= '$star_point',
                star_repoint		= '$star_repoint',
				cmt_cool			= '$cmt_cool',
				cmt_cool_txt		= '$cmt_cool_txt',
				cmt_bad_txt			= '$cmt_bad_txt',
				cmt_good			= '$cmt_good',
				cmt_best			= '$cmt_best',
				cmt_good_txt		= '$cmt_good_txt',
				cmt_good_point		= '$cmt_good_point',
				cmt_good_repoint	= '$cmt_good_repoint',
				cmt_choice			= '$cmt_choice',
				cmt_choice_return	= '$cmt_choice_return',
				cmt_choice_txt		= '$cmt_choice_txt',
				nameless_write		= '$nameless_write',
				nameless_cmt		= '$nameless_cmt',
				nameless_head		= '$nameless_head',
				nameless_tail		= '$nameless_tail',
				addon_skin			= '$addon_skin',
                addon_css			= '$addon_css',
                addon_set			= '$addon_set',
                cate_skin			= '$cate_skin',
                cate_css			= '$cate_css',
                head_skin			= '$head_skin',
                head_css			= '$head_css',
				list_skin			= '$list_skin',
                list_css			= '$list_css',
                list_set			= '$list_set',
                view_skin			= '$view_skin',
                view_css			= '$view_css',
                view_set			= '$view_set',
                view_photo			= '$view_photo',
                emo_skin			= '$emo_skin',
                emo_cnt				= '$emo_cnt',
                view_good			= '$view_good',
                view_sns			= '$view_sns',
                sign_skin			= '$sign_skin',
                sign_css			= '$sign_css',
                sign_set			= '$sign_set',
                cmt_skin			= '$cmt_skin',
                cmt_css				= '$cmt_css',
                cmt_photo			= '$cmt_photo',
                cmt_sns				= '$cmt_sns',
				write_skin			= '$write_skin',
                page_skin			= '$page_skin',
                page_css			= '$page_css',
                btn_skin			= '$btn_skin' ";


// 등록하기
$row = sql_fetch(" select count(*) as cnt from $g4[board_table]_amina where bo_table = '$bo_table' ");
if ($row[cnt]) {
	sql_query(" update $g4[board_table]_amina set $sql_common where bo_table = '$bo_table' ");
} else {
    sql_query(" insert into $g4[board_table]_amina set $sql_common ");
}

// 같은 그룹내 게시판 동일 옵션 적용
$s = "";
if ($chk_addon_skin) $s .= " , addon_skin = '$addon_skin' , addon_css = '$addon_css' , addon_set = '$addon_set' ";
if ($chk_cate_skin) $s .= " , cate_skin = '$cate_skin' , cate_css = '$cate_css' ";
if ($chk_head_skin) $s .= " , head_skin = '$head_skin' , head_css = '$head_css' ";
if ($chk_list_skin) $s .= " , list_skin = '$list_skin' , list_css = '$list_css' , list_set = '$list_set' ";
if ($chk_page_skin) $s .= " , page_skin = '$page_skin' , page_css = '$page_css' ";
if ($chk_view_skin) $s .= " , view_skin = '$view_skin' , view_css = '$view_css' , view_set = '$view_set' ";
if ($chk_view_photo) $s .= " , view_photo = '$view_photo' , emo_skin = '$emo_skin' , emo_cnt = '$emo_cnt' ";
if ($chk_view_good) $s .= " , view_good = '$view_good' ";
if ($chk_view_sns) $s .= " , view_sns = '$view_sns' ";
if ($chk_sign_skin) $s .= " , sign_skin = '$sign_skin' , sign_css = '$sign_css' , sign_set = '$sign_set' ";
if ($chk_cmt_skin) $s .= " , cmt_skin = '$cmt_skin' , cmt_css = '$cmt_css' ";
if ($chk_cmt_photo) $s .= " , cmt_photo = '$cmt_photo' ";
if ($chk_cmt_sns) $s .= " , cmt_sns = '$cmt_sns' ";
if ($chk_write_skin) $s .= " , write_skin = '$write_skin' ";
if ($chk_btn_skin) $s .= " , btn_skin = '$btn_skin' ";
if ($chk_auto_rss) $s .= " , auto_rss = '$auto_rss' ";
if ($chk_video) $s .= " , video = '$video' ";
if ($chk_post_limit) $s .= " , limit_post = '$limit_post' , limit_post_cnt = '$limit_post_cnt' ";
if ($chk_point_limit) $s .= " , limit_cmt = '$limit_cmt' , limit_date = '$limit_date' ";
if ($chk_shingo) $s .= " , shingo = '$shingo' ";
if ($chk_upimg) $s .= " , upimg_size = '$upimg_size' , upimg_quality = '$upimg_quality' ";
if ($chk_good_point) $s .= " , good_point = '$good_point' , good_repoint = '$good_repoint' ";
if ($chk_star) $s .= " , star = '$star' , star_color = '$star_color' , star_skin = '$star_skin' , star_css = '$star_css' , star_point = '$star_point' , star_repoint = '$star_repoint' ";
if ($chk_cmt_cool) $s .= " , cmt_cool = '$cmt_cool' , cmt_cool_txt = '$cmt_cool_txt' , cmt_bad_txt = '$cmt_bad_txt' ";
if ($chk_cmt_good) $s .= " , cmt_good = '$cmt_good' , cmt_best = '$cmt_best' , cmt_good_txt = '$cmt_good_txt' , cmt_good_point = '$cmt_good_point' , cmt_good_repoint = '$cmt_good_repoint' ";
if ($chk_cmt_choice) $s .= " , cmt_choice = '$cmt_choice' , cmt_choice_return = '$cmt_choice_return' , cmt_choice_txt = '$cmt_choice_txt' ";
if ($chk_nameless) $s .= " , nameless_write = '$nameless_write' , nameless_cmt = '$nameless_cmt' , nameless_head = '$nameless_tail' ";

if ($s){
    $sql = " select bo_table from $g4[board_table] where gr_id = '$gr_id' and bo_table != '$bo_table' order by bo_table ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
		$row1 = sql_fetch(" select count(*) as cnt from $g4[board_table]_amina where bo_table = '$row[bo_table]' ");
		if ($row1[cnt]) {
			sql_query(" update $g4[board_table]_amina set bo_table = bo_table {$s} where bo_table = '$row[bo_table]' ");
		} else {
		    sql_query(" insert into $g4[board_table]_amina set bo_table = '$row[bo_table]', gr_id = '$gr_id' {$s} ");
		}
    }	
}

goto_url("./amina.set.form.php?bo_table=$bo_table");

?>
