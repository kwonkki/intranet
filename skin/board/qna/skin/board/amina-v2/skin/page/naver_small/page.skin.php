<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 네이버 스타일 페이지
function naver_paging($write_pages, $cur_page, $total_page, $url, $add="") {

		if(!$cur_page) $cur_page = 1;

		$str = "";

		if ($cur_page < 2) {
			$str .= "<a class='pre_end' title='맨앞페이지'>처음</a>";
		} else {
			$str .= "<a href='".$url."1{$add}' class='pre_end' title='맨앞페이지'>처음</a>";
		}

		$start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
        $end_page = $start_page + $write_pages - 1;

        if ($end_page >= $total_page) { 
			$end_page = $total_page;
		}

        if ($start_page > 1) { 
			$str .= "<a href='".$url.($start_page-1)."{$add}' class='pre' title='이전페이지'>이전</a>"; 
		} else {
			$str .= "<a class='pre' title='이전페이지'>이전</a>"; 
		}

        if ($total_page > 0){
                for ($k=$start_page;$k<=$end_page;$k++){
                        if ($cur_page != $k) {
		                    $str .= "<a href='$url$k{$add}'>$k</a>";
                        } else {
	                        $str .= "<strong>$k</strong> ";
						}
                }
        }

        if ($total_page > $end_page) {
			$str .= "<a href='".$url.($end_page+1)."{$add}' class='next' title='다음페이지'>다음</a>";
		} else {
			$str .= "<a class='next' title='다음페이지'>다음</a>";
		}

		if ($cur_page < $total_page) {
			$str .= "<a href='$url".($total_page)."{$add}' class='next_end' title='맨뒤페이지'>끝</a>";
		} else {
			$str .= "<a class='next_end' title='맨뒤페이지'>끝</a>";
		}

		return $str;
}

?>

<? if($total_count > $board[bo_page_rows]) { ?>

	<link rel="stylesheet" href="<?=$page_skin_path?>/<?=$amina[page_css]?>.css" type="text/css">
	<div class="paginate">
		<?=naver_paging($config[cf_write_pages], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page=")?>
	</div>

<? } ?>