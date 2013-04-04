<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

function amina_list_category($ca_name, $ca_list) {

    $arr = explode("|", $ca_list); // 구분자가 , 로 되어 있음
    $str = "";
    for ($i=0; $i<count($arr); $i++) {
        if (trim($arr[$i])) {
			if(trim($arr[$i]) == $ca_name) { $selected = "selected"; } else { $selected = ""; }
			$str .= "<option value='$arr[$i]' $selected >$arr[$i]</option>\n";
		}
	}
    return $str;
}

?>

<link rel="stylesheet" href="<?=$cate_skin_path?>/<?=$amina[cate_css]?>.css" type="text/css">

<table border=0 cellpadding=0 cellspacing=0 width=100%>
<tr><td  class="cate_select">
	<div class="select_cate">	
		<form name="fcategory" method="get" style="margin:0px;">
		<? if ($is_category) { $category_option = amina_list_category($sca, $board[bo_category_list]); ?>
		<select name=sca onchange="location='<?=$category_location?>'+<?=strtolower($g4[charset])=='utf-8' ? "encodeURIComponent(this.value)" : "this.value"?>;">
			<option value=''>전체</option>
			<?=$category_option?>
		</select>
		<? } ?>
		</form>
	</div>
	<div class="select_post" style="color:#888;">
		글 <span class=cnt><?=number_format($total_count)?></span> 개
	</div>
</td></tr>
</table>
