<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$set_skin_path/set.load.php");

$set = amina_set_view($set_data);

?>

<div class=br></div>

<input type=checkbox name='view_head' value='1' <? if($set[view_head]) echo "checked"; ?>> 헤드바 숨기기

&nbsp;

<input type=checkbox name='view_1vs1' value='1' <? if($set[view_1vs1]) echo "checked"; ?>> 1:1 게시판으로 사용
