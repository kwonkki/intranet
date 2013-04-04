<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td>
	<a href="https://twitter.com/share" class="twitter-share-button"  data-count="horizontal" data-url="<?=$tw_url?>" data-text="<?=$tw_txt?>" data-via="<?=$config[cf_title]?>">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</td>
<td width=30></td>
<td>
	<iframe src="http://www.facebook.com/plugins/like.php?href=<?=$fb_url?>&amp;layout=button_count&amp;show_faces=true&amp;width=120&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe>
</td>
<td width=30></td>
<td>
	<!-- +1 버튼이 렌더링되기를 원하는 곳에 이 태그를 넣습니다. -->
	<g:plusone size="medium" href="<?=$org_url?>"></g:plusone>

	<!-- 적절한 곳에 이 렌더링 호출을 넣습니다. -->
	<script type="text/javascript">
	  window.___gcfg = {lang: 'ko'};

	  (function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
</td>
<td width=30></td>
<td><a href="<?=$twitter_url?>" target="_blank" title="이 글을 트위터로 보내기"><img src="<?=$sns_skin_path?>/img/send_twitter.png" border="0"></a>&nbsp;</td>
<td><a href="<?=$facebook_url?>" target="_blank" title="이 글을 페이스북으로 보내기"><img src="<?=$sns_skin_path?>/img/send_facebook.png" border="0"></a>&nbsp;</td>
<td><a href="<?=$me2day_url?>" target="_blank" title="이 글을 미투데이로 보내기"><img src="<?=$sns_skin_path?>/img/send_me2day.png" border="0"></a>&nbsp;</td>
<td><a href="<?=$yozm_url?>" target="_blank" title="이 글을 요즘으로 보내기"><img src="<?=$sns_skin_path?>/img/send_yozm.png" border="0"></a>&nbsp;</td>
<td><img src="<?=$sns_skin_path?>/img/send_cy.png" border="0" onclick="<?=$cy_url?>" style="cursor:pointer" title="싸이월드 공감으로 보내기">&nbsp;</td>
<td>
	<script type="text/javascript" src="http://api.nateon.nate.com/js/note/note_common_v2_0.min.js"></script>
	<script type="text/javascript">var enc_note="zbP4D3xUhYPgZAzL0gZT9Zkl16JRk4YKJbU6m3JIw6aKiCfcEznkymc4J_2QW0Mb8L6z6es8CTNKATXdKBFOczubq7dozMzv9Yd7gnet14Y"</script>
	<a title="네이트온 쪽지보내기" href="javascript:send_note();"><img src="<?=$sns_skin_path?>/img/send_nateon.png" alt="네이트온 쪽지보내기" border="0" /></a>&nbsp;
</td>
<td><a href="<?=$google_url?>" target="_blank" title="이 글을 구글로 북마크하기"><img src="<?=$sns_skin_path?>/img/send_google.png" border="0"></a>&nbsp;</td>
<td><a href="<?=$naver_url?>" target="_blank" title="이 글을 네이버로 북마크하기"><img src="<?=$sns_skin_path?>/img/send_naver.png" border="0"></a></td>
</tr>
</table>