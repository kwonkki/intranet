<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if ($w == "cu") {
    $sql = " select * from $write_table where wr_id = '$comment_id' ";
    $wr_cmt = sql_fetch($sql);
}

?>