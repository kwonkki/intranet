<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// AMINA Skin Lib for AMINA BBS & THEMA - Copyright (c) 2012 AMINA - http://amina.co.kr
//
// only for AMINA THEMA
//-------------------------------------------------------------------------------------

// LNB 출력하기
function amina_lnb($skin="basic", $css="basic", $width="100%", $left='', $right=''){
	global $g4, $config, $member, $amina, $xp, $is_admin, $is_auth, $urlencode;

    $lnb_skin_path = "$g4[path]/skin/lnb/$skin";

	ob_start();
	include "$lnb_skin_path/lnb.skin.php";
    $view_lnb = ob_get_contents();
    ob_end_clean();

	return $view_lnb;
}

//새글 목록 출력
function new_post($update='1', $bo_table='') {
	global $g4;

	$chk_date = date("Y-m-d H:i:s", $g4['server_time'] - ($update * 24 * 3600));
	if($bo_table) {
	    $tmp_write_table = $g4['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
	    $result = sql_query(" select distinct ca_name from $tmp_write_table where wr_datetime >= '$chk_date' and wr_is_comment = 0 ", FALSE);
	} else {
		$result = sql_query(" select distinct bo_table from $g4[board_new_table] where bn_datetime >= '$chk_date' and wr_id = wr_parent ", FALSE); //새글 : 댓글은 wr_id <> wr_parent
	}

	for ($i=0; $row=sql_fetch_array($result); $i++) {
		$list[$i] = $row;
	}

	return $list;
}

//사이트 새글 아이콘
function new_menu($bo_list, $list) {
	global $g4;

	$arr_bo = explode("|", trim($bo_list));

	$new_icon = "new";

	for ($i=0; $i<count($list); $i++) { 
		for ($j=0; $j<count($arr_bo); $j++) {
			if ($list[$i][bo_table] == $arr_bo[$j] || $list[$i][ca_name] == $arr_bo[$j]) return $new_icon;
		}
	}

	$new_icon = "old";

	return $new_icon;
}

//선택 메뉴 아이콘
function sel_menu($bo_list='', $page_list='') {
	global $bo_table, $page_id;

	$sel_icon = " class=on ";

	if($bo_list) {
		$chk_bo = explode("|", trim($bo_list));
		for ($i=0; $i<count($chk_bo); $i++) { 
			if ($bo_table == $chk_bo[$i]) return $sel_icon;
		}
	}

	if($page_list) {
		$chk_page = explode("|", trim($page_list));
		for ($i=0; $i<count($chk_page); $i++) { 
			if ($page_id == $chk_page[$i]) return $sel_icon;
		}
	}

	$sel_icon = "";

	return $sel_icon;

}

?>