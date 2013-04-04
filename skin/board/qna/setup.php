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

echo "<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'>";

// 필드존재여부 체크
function amina_chk_field($type, $field) { //DB 테이블에 필드 존재여부 체크
	global $g4, $bo_table;

	$chk_field = false;

	//필드 체크
	if($type == "rss") {
		$sql = " select * from $g4[board_new_table] limit 1";
	}

	if($sql) {
		$result=sql_query($sql); 
		$row = sql_fetch($sql);
		for($i=0; $i < count($row); $i++){ 
			$fname[$i] = mysql_field_name($result, $i);
			if($field == $fname[$i]) return $field;
		} 
	}

	return $chk_field;
}

//rss관련 필드 추가
if(amina_chk_field("rss", "wr_rss")) {
	;
} else {
    sql_query(" alter table $g4[board_new_table] add wr_rss varchar(10) default '' NOT NULL ", false);
}

//charset 설정
if(strtoupper($g4['charset']) == "UTF-8") $sql_charset = "DEFAULT CHARSET=utf8";

//아미나스킨 설정값 테이블 추가
$sql = " CREATE TABLE IF NOT EXISTS `$g4[board_table]_amina` (
			`bo_table` varchar(20) NOT NULL default '',
			`gr_id` varchar(255) NOT NULL default '',
			`auto_rss` tinyint(4) NOT NULL default '0',
			`video` tinyint(4) NOT NULL default '0',
			`limit_post` tinyint(4) NOT NULL default '0',
			`limit_post_cnt` tinyint(4) NOT NULL default '0',
			`limit_cmt` tinyint(4) NOT NULL default '0',
			`limit_date` int(11) NOT NULL default '0',
			`shingo` int(11) NOT NULL default '0',
			`good_point` int(11) NOT NULL default '0',
			`good_repoint` int(11) NOT NULL default '0',
			`upimg_size` int(11) NOT NULL default '0',
			`upimg_quality` int(11) NOT NULL default '0',
			`star` tinyint(4) NOT NULL default '0',
			`star_color` varchar(255) NOT NULL default '',
			`star_skin` varchar(255) NOT NULL default '',
			`star_css` varchar(255) NOT NULL default '',
			`star_point` int(11) NOT NULL default '0',
			`star_repoint` int(11) NOT NULL default '0',
			`cmt_cool` tinyint(4) NOT NULL default '0',
			`cmt_cool_txt` varchar(255) NOT NULL default '',
			`cmt_bad_txt` varchar(255) NOT NULL default '',
			`cmt_good` tinyint(4) NOT NULL default '0',
			`cmt_best` int(11) NOT NULL default '0',
			`cmt_good_txt` varchar(255) NOT NULL default '',
			`cmt_good_point` int(11) NOT NULL default '0',
			`cmt_good_repoint` int(11) NOT NULL default '0',
			`cmt_choice` tinyint(4) NOT NULL default '0',
			`cmt_choice_return` int(11) NOT NULL default '0',
			`cmt_choice_txt` varchar(255) NOT NULL default '',
			`nameless_write` tinyint(4) NOT NULL default '0',
			`nameless_cmt` tinyint(4) NOT NULL default '0',
			`nameless_head` varchar(255) NOT NULL default '',
			`nameless_tail` int(11) NOT NULL default '0',
			`addon_skin` varchar(255) NOT NULL default '',
			`addon_css` varchar(255) NOT NULL default '',
			`addon_set` varchar(255) NOT NULL default '',
			`cate_skin` varchar(255) NOT NULL default '',
			`cate_css` varchar(255) NOT NULL default '',
			`head_skin` varchar(255) NOT NULL default '',
			`head_css` varchar(255) NOT NULL default '',
			`list_skin` varchar(255) NOT NULL default '',
			`list_css` varchar(255) NOT NULL default '',
			`list_set` varchar(255) NOT NULL default '',
			`view_skin` varchar(255) NOT NULL default '',
			`view_css` varchar(255) NOT NULL default '',
			`view_set` varchar(255) NOT NULL default '',
			`view_photo` tinyint(4) NOT NULL default '0',
			`emo_skin` varchar(255) NOT NULL default '',
			`emo_cnt` int(11) NOT NULL default '0',
			`view_good` varchar(255) NOT NULL default '',
			`view_sns` varchar(255) NOT NULL default '',
			`sign_skin` varchar(255) NOT NULL default '',
			`sign_css` varchar(255) NOT NULL default '',
			`sign_set` varchar(255) NOT NULL default '',
			`cmt_skin` varchar(255) NOT NULL default '',
			`cmt_css` varchar(255) NOT NULL default '',
			`cmt_photo` tinyint(4) NOT NULL default '0',
			`cmt_sns` varchar(255) NOT NULL default '',
			`write_skin` varchar(255) NOT NULL default '',
			`page_skin` varchar(255) NOT NULL default '',
			`page_css` varchar(255) NOT NULL default '',
			`btn_skin` varchar(255) NOT NULL default '',
			PRIMARY KEY  (`bo_table`)
			) {$sql_charset}; ";

sql_query($sql, false);

//별점 테이블 추가
$sql = " CREATE TABLE IF NOT EXISTS `$g4[board_table]_star` (
			`bg_id` int(11) NOT NULL auto_increment,
			`bo_table` varchar(20) NOT NULL default '',
			`wr_id` int(11) NOT NULL default '0',
			`mb_id` varchar(20) NOT NULL default '',
			`bg_flag` varchar(255) NOT NULL default '',
			`bg_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
			`bg_star` int(11) NOT NULL default '0',
			PRIMARY KEY  (`bg_id`),
			UNIQUE KEY `fkey1` (`bo_table`,`wr_id`,`mb_id`)
			) {$sql_charset}; ";

sql_query($sql, false);


//블라인드 테이블 추가
$sql = " CREATE TABLE IF NOT EXISTS `$g4[board_table]_blind` (
			`id` int(11) NOT NULL auto_increment,
			`bo_table` varchar(20) NOT NULL default '',
			`wr_id` int(11) NOT NULL default '0',
			`mb_id` varchar(20) NOT NULL default '',
			`flag` varchar(255) NOT NULL default '',
			`datetime` datetime NOT NULL default '0000-00-00 00:00:00',
			`ip` varchar(20) NOT NULL default '',
			PRIMARY KEY  (`id`),
			UNIQUE KEY `fkey1` (`bo_table`,`wr_id`,`mb_id`)
			) {$sql_charset}; ";

sql_query($sql, false);

echo "<script type='text/javascript'>alert('DB에 아미나 스킨용 추가 필드와 테이블을 생성하였습니다.');</script>";

@unlink($g4[path]."/setup.php");

goto_url("$board_skin_path/amina.set.form.php?bo_table=$bo_table");

?>
