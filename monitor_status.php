<?
include_once("./_common.php");


$g4['title'] = "working status";
include_once("./_head.php");


?>
<div >
	<img src="<?=$g4[path]?>/images/monitor_status.png">
</div>
<? // 현재접속자
include_once("$g4[path]/bbs/current_connect.php");
?>


<script>
setTimeout(function(){
   window.location.reload(1);
}, 1000*60*2);
</script>
<?
include_once("./_tail.php");
?>
