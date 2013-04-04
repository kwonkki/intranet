<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

global $is_admin;
?>
<style type="text/css">
.section_ul strong.menu{ color: white; display: block; border-bottom: 1px solid white; padding: 5px 5px 4px 10px; font-size: 10px; background: #364155 no-repeat 174px 3px;}
</style>

<div class="section_ul">
<strong class="menu">Connection</strong>
<ul style='text-align:left;'>
	<li><span class="bu"></span> Today : <span><?=number_format($visit[1])?></span></li>
	<li><span class="bu"></span> Yesterday : <span><?=number_format($visit[2])?></span></li>
	<li><span class="bu"></span> 1day Maximum  : <span><?=number_format($visit[3])?></span></li>
	<li><span class="bu"></span> Total : <span><?=number_format($visit[4])?></span></li>
</li>
</ul>
</div>
