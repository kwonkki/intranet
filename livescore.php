<?
include_once("./_common.php");


$g4['title'] = "Live Score";
include_once("./_head.php");
?>
<table width="100%" cellspacing="0" cellpadding="0">
	<tbody>
		<tr height="25">
			<td>
			<img src="<?=$g4[path]?>/images/live.png">	
			</td>
		</tr>
		<tr>
			<td height="5"></td>
		</tr>
	</tbody>
</table>

<iframe src="http://www.nowgoal.com/asianbookie.htm" width="100%" height="1700" frameborder="0"></iframe>


<?
include_once("./_tail.php");
?>
