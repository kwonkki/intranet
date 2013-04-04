<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//-------------------------------------------------------------------------------------
// AMINA Skin Lib for AMINA BBS & THEMA - Copyright (c) 2012 AMINA - http://amina.co.kr
//
// only for AMINA LATEST
//-------------------------------------------------------------------------------------

function amina_get_list($write_row, $board, $skin_path, $subject_len=40, $bbs_href='', $mobile='') {
    global $g4, $config;
    //global $qstr, $page;

    //$t = get_microtime();

	// 링크주소 풀 주소로 바꾸기
	if(!$bbs_href) $bbs_href = $g4[bbs_path];

    // 배열전체를 복사
    $list = $write_row;
    unset($write_row);

    //$list['is_notice'] = preg_match("/[^0-9]{0,1}{$list['wr_id']}[\r]{0,1}/",$board['bo_notice']);

    if ($subject_len)
        $list['subject'] = conv_subject($list['wr_subject'], $subject_len, "…");
    else
        $list['subject'] = conv_subject($list['wr_subject'], $board['bo_subject_len'], "…");

    // 목록에서 내용 미리보기 사용한 게시판만 내용을 변환함 (속도 향상) : kkal3(커피)님께서 알려주셨습니다.
    if ($board['bo_use_list_content'])
	{
		$html = 0;
		if (strstr($list['wr_option'], "html1"))
			$html = 1;
		else if (strstr($list['wr_option'], "html2"))
			$html = 2;

        $list['content'] = conv_content($list['wr_content'], $html);
	}

    $list['comment_cnt'] = "";
    if ($list['wr_comment'])
        $list['comment_cnt'] = "($list[wr_comment])";

    // 당일인 경우 시간으로 표시함
    $list['datetime'] = substr($list['wr_datetime'],0,10);
    $list['datetime2'] = $list['wr_datetime'];
    if ($list['datetime'] == $g4['time_ymd'])
        $list['datetime2'] = substr($list['datetime2'],11,5);
    else
        $list['datetime2'] = substr($list['datetime2'],5,5);
    // 4.1
    $list['last'] = substr($list['wr_last'],0,10);
    $list['last2'] = $list['wr_last'];
    if ($list['last'] == $g4['time_ymd'])
        $list['last2'] = substr($list['last2'],11,5);
    else
        $list['last2'] = substr($list['last2'],5,5);

    $list['wr_homepage'] = get_text(addslashes($list['wr_homepage']));

    $tmp_name = get_text(cut_str($list['wr_name'], $config['cf_cut_name'])); // 설정된 자리수 만큼만 이름 출력
    if ($board['bo_use_sideview'])
        $list['name'] = get_sideview($list['mb_id'], $tmp_name, $list['wr_email'], $list['wr_homepage']);
    else
        $list['name'] = "<span class='".($list['mb_id']?'member':'guest')."'>$tmp_name</span>";

    $reply = $list['wr_reply'];

    $list['reply'] = "";
    if (strlen($reply) > 0)
    {
        for ($k=0; $k<strlen($reply); $k++)
            $list['reply'] .= ' &nbsp;&nbsp; ';
    }

    $list['icon_reply'] = "";
    if ($list['reply'])
        $list['icon_reply'] = "<img src='$skin_path/img/icon_reply.gif' align='absmiddle'>";

    $list['icon_link'] = "";
    if ($list['wr_link1'] || $list['wr_link2'])
        $list['icon_link'] = "<img src='$skin_path/img/icon_link.gif' align='absmiddle'>";

    // 분류명 링크
    $list['ca_name_href'] = "{$bbs_href}/board.php?bo_table=$board[bo_table]&sca=".urlencode($list['ca_name']);

    $list['href'] = "{$bbs_href}/board.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]" . $qstr;
    //$list['href'] = "$g4[bbs_path]/board.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]";
    if ($board['bo_use_comment'])
        $list['comment_href'] = "javascript:win_comment('{$bbs_href}/board.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]&cwin=1');";
    else
        $list['comment_href'] = $list['href'];

    $list['icon_new'] = "";
    if ($list['wr_datetime'] >= date("Y-m-d H:i:s", $g4['server_time'] - ($board['bo_new'] * 3600)))
        $list['icon_new'] = "<img src='$skin_path/img/icon_new.gif' align='absmiddle'>";

    $list['icon_hot'] = "";
    if ($list['wr_hit'] >= $board['bo_hot'])
        $list['icon_hot'] = "<img src='$skin_path/img/icon_hot.gif' align='absmiddle'>";

    $list['icon_secret'] = "";
    if (strstr($list['wr_option'], "secret"))
        $list['icon_secret'] = "<img src='$skin_path/img/icon_secret.gif' align='absmiddle'>";

    // 링크
    for ($i=1; $i<=$g4['link_count']; $i++)
    {
        $list['link'][$i] = set_http(get_text($list["wr_link{$i}"]));
        $list['link_href'][$i] = "{$bbs_href}/link.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]&no=$i" . $qstr;
        $list['link_hit'][$i] = (int)$list["wr_link{$i}_hit"];
    }

    // 가변 파일
    $list['file'] = get_file($board['bo_table'], $list['wr_id']);

    if ($list['file']['count'])
        $list['icon_file'] = "<img src='$skin_path/img/icon_file.gif' align='absmiddle'>";

    return $list;
}
 
function latest_amina($skin_dir="", $bo_table="", $rows=10, $subject_len=40, $options="", $tab_list="", $sql_opt="") {
    global $g4, $config, $amina, $bo_youngcart_list;

    $list = array();
	$tab = array();
	$opt = array();

	//탭 아이디 설정
	$tab_id = $bo_table;

	//탭이 있는지 확인
	$tab_num = count($tab_list);

	//탭이 1개이상일 경우에는 jquery용으로
	if($tab_num > 1) { 
		$tab_opt = "&org=".urlencode("skin_dir={$skin_dir} rows={$rows} subject_len={$subject_len}")."&opt=".urlencode($options);
		for ($i=0; $i < $tab_num; $i++) {
			if($i == "0") {
				$tab[$i][query] = "#";
			} else {
				$tab[$i][query] = $g4[path]."/latest.php?tab=".urlencode($tab_list[$i])."".$tab_opt;
			}

			$tmp = amina_query($tab_list[$i]);
			$tab[$i][title] = $tmp[title];

			$arr_board = explode(",", trim($tmp[bo_list]));

			// 타이틀 링크설정
			if($tmp[type] == "newgul" || $tmp[type] == "newcmtgul") {
				$tab[$i][href] = $g4[bbs_path]."/new.php?view=w";
			} else if($tmp[type] == "newcmt") {
				$tab[$i][href] = $g4[bbs_path]."/new.php?view=c";
			} else {
				if(count($arr_board) > 1) {
					$tab[$i][href] = "#";
				} else {
					$tab[$i][href] = $g4[bbs_path]."/board.php?bo_table=".$tmp[bo_list]."&sca=".urlencode($tmp[ca_name]);
				}
			}
		}	

		// 첫번째 탭 정리하기..
		$tmp2 = amina_query($options);
		$tmp2[bo_list] = $tmp2[title] = $tmp2[ca_name] = "";

		$tmp1 = amina_query($tab_list[0]);

		$opt = $tmp1 + $tmp2; //두 배열키로 합치기

		if($opt[skin_dir]) $skin_dir = $opt[skin_dir];
		if($opt[rows]) $rows = $opt[rows];
		if($opt[subject_len]) $subject_len = $opt[subject_len];

	} else {
		//탭값 및 옵션을 변수값으로 변환
		if($tab_list) {
			$tmp2 = amina_query($options);
			$tmp2[bo_list] = $tmp2[title] = $tmp2[ca_name] = "";

			$tmp1 = amina_query($tab_list);

			$opt = $tmp1 + $tmp2; //두 배열키로 합치기

			if($opt[skin_dir]) $skin_dir = $opt[skin_dir];
			if($opt[rows]) $rows = $opt[rows];
			if($opt[subject_len]) $subject_len = $opt[subject_len];
		} else {
			$opt = amina_query($options);
		}
	}

	//탭일 경우 링크 주소 재설정
	$bbs_href = gnu_url($g4[bbs_path], $opt[tab]);

	//스킨디렉토리
	if(file_exists($g4[path]."/skin/latest/".$skin_dir."/latest.skin.php")) {
		$latest_skin_path = $g4[path]."/skin/latest/".$skin_dir;
	} else {
        $latest_skin_path = $g4[path]."/skin/latest/basic";
	}

	// 탭 초기번호..
	$z = 0;

	// 새글, 새댓글 등
	if($opt[type] == "newgul" || $opt[type] == "newcmt" || $opt[type] == "newcmtgul") {

		// 포함 게시판 설정
		if($opt[bo_include]) {
			$new_sql = "";
			$bo_in = explode(",", trim($opt[bo_include]));
			for ($k=0; $k < count($bo_in); $k++) {
				if (trim($bo_in[$k])=='') continue;
				$new_sql .= " bo_table = '$bo_in[$k]' or ";
			}
			if($new_sql) $new_sql = " and (".substr($new_sql,0,-3).")";
		} 

		// 제외 게시판 설정
		if($opt[bo_exclude]) {
			$new_sql = "";
			$bo_ex = explode(",", trim($opt[bo_exclude]));
			for ($k=0; $k < count($bo_ex); $k++) {
				if (trim($bo_ex[$k])=='') continue;
				$new_sql .= " and bo_table != '$bo_ex[$k]' ";
			}
		} 

		// 추출 및 정리
		if($opt[type] == "newcmt") {
			$tab[$z][title] = "새로 달린 댓글";
			$tab[$z][href] = $g4[bbs_path]."/new.php?view=c";

			$result = sql_query(" select * from $g4[board_new_table] where bo_table != '' and wr_id <> wr_parent $new_sql order by bn_id desc limit 0, $rows ");
			for ($i=0; $row=sql_fetch_array($result); $i++) {
			    $tmp_write_table = $g4['write_prefix'] . $row['bo_table']; // 게시판 테이블 전체이름
				$board = sql_fetch(" select * from $g4[board_table] where bo_table = '$row[bo_table]' ");

				if (!$board) continue;

				$row1 = sql_fetch(" select wr_option from {$tmp_write_table} where wr_id = '$row[wr_parent]' "); //원글 글옵션
				$row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '$row[wr_id]' "); //댓글 정보 불러오기..
				// 댓글이라 글제목을 글내용으로 대체
				if(strstr($row1[wr_option], "secret") || strstr($row2[wr_option], "secret")) {
					$row2[wr_subject] = "비밀 댓글입니다.";
				} else {
					$row2[wr_subject] = $row2[wr_content];
				}
				$row2[wr_comment] = 0; //댓글수 0으로
				$row2[bo_table] = $board[bo_table];
				$row2[ca_name] = $board[bo_subject]; //게시판 제목을 카테고리로 사용..
				$row2[link_youngcart] = false;
				if($bo_youngcart_list && in_array(strval($row2[bo_table]), $bo_youngcart_list)) $row2[link_youngcart] = true;

				$list[$i] = amina_get_list($row2, $board, $latest_skin_path, $subject_len, $bbs_href);
			}
		} else {
			if($opt[type] == "newcmtgul") {
				$tab[$z][title] = "새로 댓글달린 글";
				$tab[$z][href] = $g4[bbs_path]."/new.php?view=c";

				$result = sql_query(" select bo_table, wr_parent, max(bn_id) as bn_id from $g4[board_new_table] where bo_table != '' and wr_id <> wr_parent $new_sql group by bo_table, wr_parent order by bn_id desc limit 0, $rows ");
			} else {
				$tab[$z][title] = "새로 등록된 글";
				$tab[$z][href] = $g4[bbs_path]."/new.php?view=w";

				$result = sql_query(" select bo_table, wr_parent, bn_id from $g4[board_new_table] where  bo_table != '' and wr_id = wr_parent $new_sql order by bn_id desc limit 0, $rows ");
			}

			for ($i=0; $row=sql_fetch_array($result); $i++) {
			    $tmp_write_table = $g4['write_prefix'] . $row['bo_table']; // 게시판 테이블 전체이름
				$board = sql_fetch(" select * from $g4[board_table] where bo_table = '$row[bo_table]' ");

				if (!$board) continue;

				$row1 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '$row[wr_parent]' "); //글 정보 불러오기..
				$row1[bo_table] = $board[bo_table];
				$row1[link_youngcart] = false;
				if($bo_youngcart_list && in_array(strval($row1[bo_table]), $bo_youngcart_list)) $row1[link_youngcart] = true;
				$row1[ca_name] = $board[bo_subject]; //게시판 제목을 카테고리로 사용..
				$list[$i] = amina_get_list($row1, $board, $latest_skin_path, $subject_len, $bbs_href);
			}
		}

	} else {

		// sql 추가조건 결정
		if($sql_opt) $sql_opt = " and ".$sql_opt." ";

		// 추출기간 설정
		if($opt[term]) {
			$nowYmd = date(Ymd); # 시작시간을 구합니다. 
			$time = time(); 
			$startYmd = date("Ymd",strtotime("-".$opt[term]." day", $time)); 

			//비밀글 제외함
			$sql_term = " and wr_option not like '%secret%' and date_format(wr_datetime, '%Y%m%d') between '$startYmd' and '$nowYmd' ";
		}

		// 정렬방법
		switch($opt[order]) {
			case 'hit'			: $order_by = " wr_hit desc "; break;
			case 'good'			: $order_by = " wr_good desc, wr_hit desc "; break;
			case 'nogood'		: $order_by = " wr_nogood desc, wr_hit desc "; break;
			case 'cmt'			: $order_by = " wr_comment desc, wr_hit desc "; break;
			case 'rand'			: $order_by = " rand() "; break;
		}

		// 복수게시판에서 추출
		$arr_bo = explode(",", trim($opt[bo_list]));
		$bo_num = count($arr_bo);

		// 복수 게시판일 경우
		if($bo_num > 1) {

			if(!$order_by) $order_by = " wr_datetime desc ";
			
			$tmp = "";
			for($i=0; $i < $bo_num; $i++){ 
				$tmp_write_table = $g4['write_prefix'] . $arr_bo[$i];
				$tmp .= " select '{$arr_bo[$i]}' as bo_table, wr_id, mb_id, wr_name, wr_subject, wr_content, wr_comment, wr_hit, wr_good, wr_nogood, wr_datetime, wr_last, wr_option, wr_5, wr_9 from $tmp_write_table where wr_is_comment=0 $sql_opt $sql_term UNION ALL ";
			}

			if($tmp) $tmp = "select * from ( ".substr($tmp,0,-10).") as a order by $order_by limit 0, $rows";
			$result = sql_query($tmp);
			for ($i=0; $row=sql_fetch_array($result); $i++){ 
				$sql = "select * from {$g4['board_table']} where bo_table='$row[bo_table]'";
				$board = sql_fetch($sql);
				$row[bo_table] = $board[bo_table];
				$row[link_youngcart] = false;
				if($bo_youngcart_list && in_array(strval($row[bo_table]), $bo_youngcart_list)) $row[link_youngcart] = true;
				$row[ca_name] = $board[bo_subject]; //게시판 제목을 카테고리로 사용..
				$list[$i] = amina_get_list($row, $board, $latest_skin_path, $subject_len, $bbs_href);
			} 

			$tab[$z][href] = "#";
			$tab[$z][title] = "제목입력";

		} else {

			if(!$order_by) $order_by = " wr_id desc ";

			if($opt[bo_list]) list($bo_table) = explode(",", trim($opt[bo_list]));

			$tab[$z][href] = $g4[bbs_path]."/board.php?bo_table=".$bo_table."&sca=".urlencode($opt[ca_name]);

			//일반 게시물 추출
		    $sql = " select * from $g4[board_table] where bo_table = '$bo_table' ";
		    $board = sql_fetch($sql);

			if(!$board) {
				$tab[$z][title] = "미등록 게시판";
			} else {
				//영카트 연동부분 체크..
				$link_youngcart = false;
				if($bo_youngcart_list && in_array(strval($bo_table), $bo_youngcart_list)) $link_youngcart = true;

				$tmp_write_table = $g4['write_prefix'] . $bo_table; // 게시판 테이블 전체이름

				if($opt[ca_name]) $sql_ca = " and ca_name = '$opt[ca_name]' ";

				$i = 0;
				if($opt[type] == "notice" || $opt[type] == "nonotice") {
					$notice_sql = "";
					$arr_notice = explode("\n", trim($board[bo_notice]));
					if($opt[type] == "notice") {
						for ($k=0; $k<count($arr_notice); $k++) {
							if (trim($arr_notice[$k])=='') continue;
							$row = sql_fetch(" select * from $tmp_write_table where wr_id = '$arr_notice[$k]' $sql_ca $sql_opt ");
						    if (!$row[wr_id]) continue;
							$list[$i] = amina_get_list($row, $board, $latest_skin_path, $subject_len, $bbs_href);
							$list[$i][is_notice] = true;
							$list[$i][link_youngcart] = $link_youngcart;
							if($opt[ca_name]) $list[$i][href] = $list[$i][href]."&sca=".urlencode($opt[ca_name]);
							$notice_sql .= " and wr_id != '$arr_notice[$k]' "; 
							$i++;
						}

						$rows = $rows - $i;
					} else { //공지는 출력안함
						for ($k=0; $k<count($arr_notice); $k++) {
							if (trim($arr_notice[$k])=='') continue;
							$notice_sql .= " and wr_id != '$arr_notice[$k]' "; 
						}
					}
					$sql = " select * from $tmp_write_table where wr_is_comment = 0 $sql_ca $notice_sql $sql_opt $sql_term order by $order_by limit 0, $rows ";
				} else {
					$sql = " select * from $tmp_write_table where wr_is_comment = 0 $sql_ca $sql_opt $sql_term order by $order_by limit 0, $rows ";
				}
			}

			$result = sql_query($sql);
			for ($i=$i; $row = sql_fetch_array($result); $i++) { 
				$list[$i] = amina_get_list($row, $board, $latest_skin_path, $subject_len, $bbs_href);
				$list[$i][link_youngcart] = $link_youngcart;
				if($opt[ca_name]) $list[$i][href] = $list[$i][href]."&sca=".urlencode($opt[ca_name]);
			}

			$tab[$z][title] = $board[bo_subject];
		}
	}

	if($opt[title]) $tab[$z][title] = $opt[title];

	$latest_amina = "ok";

    ob_start();
    include "$latest_skin_path/latest.skin.php";
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
} 

?>