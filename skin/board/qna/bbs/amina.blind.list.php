<?

include_once("./_common.php");

$g4[title] = "블라인드 글보기";

include_once("./_head.php");

// 블라인드글 출력하기
function amina_blind_table($bo_table) {
    global $g4, $is_admin;

    $list = array();

    $sql = " select * from $g4[board_table] where bo_table = '$bo_table' ";
    $board = sql_fetch($sql);
	$board_skin_path = "{$g4['path']}/skin/board/{$board[bo_skin]}"; // 게시판 스킨 경로

	$tmp_write_table = $g4['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
	$sql = " select * from $tmp_write_table where wr_9 = 'lock' or wr_9 = 'shingo' order by wr_num ";
    $result = sql_query($sql);
    for ($i=0; $row = sql_fetch_array($result); $i++) {
        $list[$i] = get_list($row, $board, $board_skin_path, 80);
	}

	if($list) {
		$blind = "<table border=0 cellpadding=10 cellspacing=0 width=100% class='blind_table'>\n";
		$blind .= "<tr><td class='blind_head'>{$board[bo_subject]} <span style='color:#333;'>블라인드글 리스트</span></td></tr>\n";
		$blind .= "<tr><td class='blind_list'><table border=0 cellpadding=5 cellspacing=0 width=100%>\n";
	    for ($i=0; $i < count($list); $i++) {

			if($list[$i][wr_is_comment] == 0) {
				$list[$i][wr_ment] = "일반";
			} else {
				$list[$i][wr_ment] = "댓글";
				$list[$i][subject] = amina_cut($list[$i][wr_content], 80);
			    $list[$i][href] = "{$g4[bbs_path]}/board.php?bo_table={$bo_table}&wr_id={$list[$i][wr_parent]}#c_{$list[$i][wr_id]}";
			}

			if($list[$i][wr_9] == "lock") {
				$list[$i][wr_lock] = "관리자";
			} else {
				$list[$i][wr_lock] = "신고누적";
			}

			$list[$i][datetime2] = date("Y.m.d", strtotime($list[$i][wr_datetime]));

			$blind .= "<tr>\n";
			$blind .= "<td class=subject><a href='{$list[$i][href]}'>- [{$list[$i][wr_ment]}/{$list[$i][wr_lock]}] {$list[$i][subject]}</a></td>\n";
			$blind .= "<td align=center width=100>{$list[$i][name]}</td>\n";
			$blind .= "<td align=center class=num width=60>{$list[$i][datetime2]}</td>\n";
			if($is_admin) {
				$blind .= "<td align=center width=60><a href='{$g4[bbs_path]}/amina.blind.php?bo_table={$bo_table}&wr_id={$list[$i][wr_id]}&act=unlock' target='hiddenframe'>[해제하기]</a></td>\n";
			}
			$blind .= "</tr>\n";
		}
		$blind .= "</table></td></tr></table>\n";
		$blind .= "<br><br>\n\n";
	}

    return $blind;
} 

?>

<style>
	.blind_table .blind_head {padding:10px 15px; margin:0px; border:1px solid #ddd; background:#f5f5f5; font-weight:bold; color:crimson;}
	.blind_table .blind_list {padding:8px; margin:0; border:1px solid #ddd; border-top:0;}
	.blind_table .num{font:normal 11px tahoma;color:#767676;letter-spacing:0px;text-align:center}
	.blind_table .cate{font:normal 11px dotum;color:#767676;letter-spacing:-1px;text-align:center}
	.blind_table .subject{overflow:hidden}
</style>

<?
	//게시판 출력하기..
	$sql = " select bo_table, bo_subject from $g4[board_table] where bo_list_level <= '$member[mb_level]' order by bo_table ";
    $result = sql_query($sql);
	$bn = 0;
	for ($i=0; $row=sql_fetch_array($result); $i++) {
		$blind = amina_blind_table($row[bo_table]);
		if($blind) {
			echo $blind;
			$bn++;
		}
	}

	if($bn == 0) echo "<br><br><br><br><br><p aling=center><b>블라인드 처리된 글이 없습니다.</b></p><br><br><br><br><br>";

include_once("./_tail.php");
?>
