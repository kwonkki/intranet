<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
?>

<? if ($board[bo_use_good] || $board[bo_use_nogood]) { // ��õ, ����õ ?>
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