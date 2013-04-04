<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

/*******************************************************************************
* 영카트 연동 게시판 기능
*******************************************************************************/

if($bo_it) {

	unset($list);

	$i = 0;
	$notice_sql = "";
	if (!$sca && !$stx) {
	    $arr_notice = explode("\n", trim($board[bo_notice]));
	    for ($k=0; $k<count($arr_notice); $k++) {
	        if (trim($arr_notice[$k])=='') continue;
	        $row = sql_fetch(" select * from $write_table where wr_id = '$arr_notice[$k]' ");
	        if (!$row[wr_id]) continue;
	        $list[$i] = get_list($row, $board, $board_skin_path, $board[bo_subject_len]);
	        $list[$i][is_notice] = true;
			$notice_sql .= " and wr_id != '$arr_notice[$k]' "; 
			$i++;
	    }
	}

	// 해당 사용자가 쓴 글의 번호를 얻어 옴.
	$sql = "select * from $write_table where 1 and wr_8 = '{$bo_it}'";
	$result = sql_query($sql);
	while ($row = sql_fetch_array($result)) {
		$list1S = $row[wr_num].",".$list1S;
	}

	if($sql_search) $sql_search = "and $sql_search ";

	$sql = " select * from $write_table where 1 and find_in_set(wr_num,'{$list1S}') and wr_is_comment != 1 $notice_sql $sql_search ";
	$result = sql_query($sql);
	$total_count = mysql_num_rows($result);

	// 페이징 처리
	$total_page  = ceil($total_count / $board[bo_page_rows]);  // 전체 페이지 계산
	if (!$page) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
	$from_record = ($page - 1) * $board[bo_page_rows]; // 시작 열을 구함

	// 공지글, 해당사용자가 쓴 글과 관련된 게시물 가져오기
	$k = 0;
	$sql = "select * from $write_table where 1 and find_in_set(wr_num,'{$list1S}') and wr_is_comment != 1 $notice_sql $sql_search order by  wr_num, wr_reply limit $from_record, $board[bo_page_rows];";
	$result = sql_query($sql);
	while ($row = sql_fetch_array($result)) {
	    // 검색일 경우 wr_id만 얻었으므로 다시 한행을 얻는다
		if ($sca || $stx) $row = sql_fetch(" select * from $write_table where wr_id = '$row[wr_parent]' ");

		$list[$i] = get_list($row, $board, $board_skin_path, $board[bo_subject_len]);
	    $list[$i][is_notice] = false;
	    $list[$i][num] = $total_count - ($page - 1) * $board[bo_page_rows] - $k;
		$i++;
		$k++;
	}
}

?>
