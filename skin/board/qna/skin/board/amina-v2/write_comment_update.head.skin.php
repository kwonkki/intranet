<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

if ($w == "cu") {
    $sql = " select * from $write_table where wr_id = '$comment_id' ";
    $wr_cmt = sql_fetch($sql);
}

?>