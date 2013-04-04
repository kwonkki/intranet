<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/lib/amina.lib.write.skin.php");

if (!$is_admin && $amina[limit_post_cnt] > 0 && $w != "u") {
	if($amina[limit_post] == '1') {
		 $chk_time = date("Y-m-d 00:00:01", $g4['server_time']); //오늘 00시 00분 01초 기준 
		 $row = sql_fetch(" select count(*) as cnt from $write_table where wr_is_comment = 0 and mb_id = '$member[mb_id]' and wr_datetime >= '$chk_time' "); 
		 if($row[cnt] > $amina[limit_post_cnt]) alert("이 게시판은 회원당 하루 최대 {$amina[limit_post_cnt]}개 글만 등록할 수 있습니다. "); 
	} else if ($amina[limit_post] == '2') {
		 $row = sql_fetch(" select count(*) as cnt from $write_table where wr_is_comment = 0 and mb_id = '$member[mb_id]' "); 
		 if($row[cnt] > $amina[limit_post_cnt]) alert("이 게시판은 회원당 최대 {$amina[limit_post_cnt]}개 글만 등록할 수 있습니다. "); 
	}
}


//기본 카테고리 설정
if ($board[bo_use_category]) {
	if(!$ca_name) $ca_name = $write[ca_name];
	if(!$ca_name) $ca_name = $sca;

	$category_option = amina_category($ca_name, $board[bo_category_list]);
}

//값 불러오기(wr_10)
$post = amina_array_write($write[wr_10]);

//동영상 주소
$movie = amina_array_video($write[wr_6]);

//아이및 및 댓글채택
$wr_icon = amina_array_icon($write[wr_5]);

//별점관련
if($amina[star] == "1") {
	@include_once("$g4[path]/lib/amina.lib.star.php");
	echo "<link rel=\"stylesheet\" href=\"{$board_skin_path}/star.css\" type=\"text/css\">\n";
}

include($write_skin_path."/write.skin.php");

?>

