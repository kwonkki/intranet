<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 네이버 스타일 페이지
function naver_paging($type, $write_pages, $cur_page, $total_page, $url, $add="") {
		global $page_skin_path;

		if(!$cur_page) $cur_page = 1;

		$str = "";

		if ($cur_page < 2) {
			$str .= "<a class='pre' title='맨앞페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_first.gif' width=56 height=27 border=0></a>";
		} else {
			$str .= "<a href='".$url."1{$add}' class='pre' title='맨앞페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_first.gif' width=56 height=27 border=0></a>";
		}

		$start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
        $end_page = $start_page + $write_pages - 1;

        if ($end_page >= $total_page) { 
			$end_page = $total_page;
		}

        if ($start_page > 1) { 
			$str .= "<a href='".$url.($start_page-1)."{$add}' class='pre' title='이전페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_prev.gif' width=56 height=27 border=0></a>"; 
		} else {
			$str .= "<a class='pre' title='이전페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_prev.gif' width=56 height=27 border=0></a>"; 
		}

        if ($total_page > 0){
                for ($k=$start_page;$k<=$end_page;$k++){
                        if ($cur_page != $k) {
		                    $str .= "<a href='$url$k{$add}'><span>$k</span></a>";
                        } else {
	                        $str .= "<strong><span>$k</span></strong> ";
						}
                }
        }

        if ($total_page > $end_page) {
			$str .= "<a href='".$url.($end_page+1)."{$add}' class='next' title='다음페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_next.gif' width=56 height=27 border=0></a>";
		} else {
			$str .= "<a class='next' title='다음페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_next.gif' width=56 height=27 border=0></a>";
		}

		if ($cur_page < $total_page) {
			$str .= "<a href='$url".($total_page)."{$add}' class='next' title='맨뒤페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_end.gif' width=56 height=27 border=0></a>";
		} else {
			$str .= "<a class='next' title='맨뒤페이지'><img src='{$page_skin_path}/img/{$type}_btn_page_end.gif' width=56 height=27 border=0></a>";
		}

		return $str;
}

?>

<? if($total_count > $board[bo_page_rows]) { ?>

	<link rel="stylesheet" href="<?=$page_skin_path?>/<?=$amina[page_css]?>.css" type="text/css">
	<div class="paginate">
		<?=naver_paging($amina[page_css], $config[cf_write_pages], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page=")?>
	</div>


<? } ?>