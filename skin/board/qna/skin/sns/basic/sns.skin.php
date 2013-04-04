<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<table border=0 cellpadding=0 cellspacing=0>
<tr>
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
