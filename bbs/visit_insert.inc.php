<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 컴퓨터의 아이피와 쿠키에 저장된 아이피가 다르다면 테이블에 반영함
if (get_cookie('ck_visit_ip') != $_SERVER['REMOTE_ADDR']) {
    set_cookie('ck_visit_ip', $_SERVER['REMOTE_ADDR'], 86400); // 하루동안 저장

    // vi_id를 auto_increment로 변경함에 따라서 불필요함
    //$tmp_row = sql_fetch(" select max(vi_id) as max_vi_id from $g4[visit_table] ");
    //$vi_id = $tmp_row[max_vi_id] + 1;

    $sql = " insert $g4[visit_table] ( vi_ip, vi_date, vi_time, vi_referer, vi_agent ) values ( '$remote_addr', '$g4[time_ymd]', '$g4[time_his]', '$referer', '$user_agent' ) ";
    $result = sql_query($sql, FALSE);

    // 정상으로 INSERT 되었다면 방문자 합계에 반영
    if ($result) {
      
        // UPDATE를 먼저하고 오류가 발생시 insert를 실행 (엑스엠엘님)
        $sql = " update $g4[visit_sum_table] set vs_count = vs_count + 1 where vs_date = '$g4[time_ymd]' ";
        $result = sql_query($sql, FALSE);
        
        if ( mysql_affected_rows() == 0 ) {
            $sql = " insert $g4[visit_sum_table] ( vs_count, vs_date) values ( 1, '$g4[time_ymd]' ) ";
            $result = sql_query($sql, FALSE);
        }

        // INSERT, UPDATE 된건이 있다면 기본환경설정 테이블에 저장
        // 방문객 접속시마다 따로 쿼리를 하지 않기 위함 (엄청난 쿼리를 줄임 ^^)

        // 오늘
        $sql = " select vs_count as cnt from $g4[visit_sum_table] where vs_date = '$g4[time_ymd]' ";
        $row = sql_fetch($sql);
        $vi_today = $row[cnt];

        // 어제
        $sql = " select vs_count as cnt from $g4[visit_sum_table] where vs_date = DATE_SUB('$g4[time_ymd]', INTERVAL 1 DAY) ";
        $row = sql_fetch($sql);
        $vi_yesterday = $row[cnt];

        // 합계, 전체 - 엑스엠엘님께서 SQL 2개를 1개로 줄여주셨습니다.
        $sql = " select max(vs_count) as cnt , sum(vs_count) as total from $g4[visit_sum_table] "; 
        $row = sql_fetch($sql);
        $vi_sum = $row[total];
        $vi_max = $row[cnt];

        $visit = "오늘:$vi_today,어제:$vi_yesterday,최대:$vi_max,전체:$vi_sum";

        // 기본설정 테이블에 방문자수를 기록한 후 
        // 방문자수 테이블을 읽지 않고 출력한다.
        // 쿼리의 수를 상당부분 줄임
        sql_query(" update $g4[config_table] set cf_visit = '$visit' ");
    }
}
?>
