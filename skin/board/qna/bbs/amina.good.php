<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<? if ($board[bo_use_good] || $board[bo_use_nogood]) { // 추천, 비추천 ?>
	<div id="good<?=$wr_id?>"></div>
    <script type="text/javascript">
		function good<?=$wr_id?>_load() {
		    $.get("<?=$g4[bbs_path]?>/amina.good.skin.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&skin=<?=$skin?>", function (data) {
			    $("#good<?=$wr_id?>").html(data);
	        });
        }
	    function good<?=$wr_id?>_act(good) {
		    $.get("<?=$g4[bbs_path]?>/amina.good.act.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>&skin=<?=$skin?>&good="+good, function (data) {
			    alert(data);
		        good<?=$wr_id?>_load();
	        });
	    }
		good<?=$wr_id?>_load();
	</script>
<? } ?>