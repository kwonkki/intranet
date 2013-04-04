<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// xp 정보 업데이트
if($write[mb_id]) check_xp($write[mb_id]);

if($go_url) goto_url($go_url."&go_url=".urlencode($go_url));

?>
