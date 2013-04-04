<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>

</div><!-- 가운데 영역 div - content 끝 -->

<!-- 오른쪽 컬럼 div - side 시작 -->
<!--
<div class="aside">
    <div>
    <?
    // 항상 광고노출
    include_once("$g4[path]/adsense_aside2.php");
    ?>
    </div>
</div>--><!-- 오른쪽 컬럼 div - side 끝 -->

</div><!-- 중간부 div - container 끝 -->

</div><!-- 전체 div : wrap 끝 -->
<!-- 페이지 하단부 footer -->
<footer id="footer">
 	<div id="fSponsor">
 		<h3></h3>
 		<ul class="clearfix">
     		<li><a href="http://10.120.10.28/log/login.php" title="Call Log" target="_blank"><img src="<?=$g4[path]?>/images/b1.png" width="119" height="25" alt="Call Log"></a></li>
     		<li class="last"><a href="http://www.12odds.com/webcsd/admin/" title="PSB" target="_blank"><img src="<?=$g4[path]?>/images/b2.png" width="119" height="25" alt="PSB"></a></li>
	    </ul>
	</div>
	
    <div id="footerBottom" style="clear:both;">
    <div id="footerLine" style="clear:both;"></div>
	<ul class="footer_menu">
		<li class="first"><a href="#"><strong>Login/Logout</strong></a></li>
		<li><a href="#"><strong>Daily Report</a></li>
		<li><a href="#"><strong>Project ManageMent</a></li>
		<li><a href="#"><strong>Request Job</a></li>
		<li><a href="#"><strong>Asset Management</a></li>
		<li><a href="#"><strong>PSP Notice</a></li>
	</ul>
        <p class="cpr">Copyright ⓒ <strong>PSP intranet</strong> All Rights Reserved.</p>
    <p></p></div>
</footer>


<?
include_once("$g4[path]/tail.sub.php");
?>
