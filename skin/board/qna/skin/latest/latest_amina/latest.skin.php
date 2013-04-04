<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

//latest_amina 함수가 아닐 경우 옵션값을 다시 불러온다.
if(!$latest_amina) {
	$tab = array();
	$opt = array();
	$opt = amina_query($options);
	$tab[0][title] = $board[bo_subject];
	$tab[0][href] = $g4[bbs_path]."/board.php?bo_table=".$bo_table;
}

if(!$opt[head_skin]) $opt[head_skin] = "basic";
if(!$opt[list_skin]) $opt[list_skin] = "basic";
if(!$opt[size]) $opt[size] = "100%";

$latest_head_path = $g4[path]."/skin/latest/{$skin_dir}/head/".$opt[head_skin];
$latest_list_path = $g4[path]."/skin/latest/{$skin_dir}/list/".$opt[list_skin];

// 이미지링크 주소
$latest_skin_url = gnu_url($g4[path]."/skin/latest/".$skin_dir, $opt[tab]);
$latest_list_url = gnu_url($g4[path]."/skin/latest/{$skin_dir}/list/".$opt[list_skin], $opt[tab]);

// 탭타켓 지정
if($opt[tab_id]) $tab_id = $opt[tab_id];

$tab_cnt = count($tab);

// CSS 불러오기
if(!$opt[tab]) include_once($latest_skin_path."/load.css.php"); 

?>

<table border=0 cellpadding=0 cellspacing=0 width="<?=$opt[size]?>">
<tr><td>

<? 
	if($opt[head_skin] != "none") {
		if(!$opt[head_gap]) $opt[head_gap] = 8;
		include($latest_head_path."/latest.head.php"); 
	}
?>

<? if($tab_cnt > 1) { ?>
	<div id="latest_content1_<?=$tab_id?>">
		<? include($latest_list_path."/latest.list.php"); ?>
	</div>

	<div id="latest_content2_<?=$tab_id?>" style="display:none;">
		<div id="latest_<?=$tab_id?>"></div>
	</div>

	<script type="text/javascript">
		function TabClk_<?=$tab_id?>(n,url) {

			var i;
			for (i = 0; i < <?=$tab_cnt?>; i++)	{
				$("#Tab"+ i +"_<?=$tab_id?>").removeClass("on");
			}

			$("#Tab"+ n +"_<?=$tab_id?>").addClass("on");

			if(n == 0) {
				$("#latest_content1_<?=$tab_id?>").show();
				$("#latest_content2_<?=$tab_id?>").hide();
			} else {
				$("#latest_content1_<?=$tab_id?>").hide();
				$("#latest_content2_<?=$tab_id?>").show();

				latest_load_<?=$tab_id?>(url);
			}
        }

		function latest_load_<?=$tab_id?>(url) {
			$.get(url, function (data) {
			    $("#latest_<?=$tab_id?>").html(data);
	        });
        }
	</script>
<? } else {	include($latest_list_path."/latest.list.php"); } ?>

</td></tr>
</table>
