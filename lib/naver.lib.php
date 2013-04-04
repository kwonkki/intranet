<?php
if (!defined('_GNUBOARD_')) exit;

// 네이버 인기검색어
function naver_popular($skin_dir="basic", $rows=10, $options="") {
    global $g4;

    if ($skin_dir)
        $popular_skin_path = "$g4[path]/skin/popular/$skin_dir";
    else
        $popular_skin_path = "$g4[path]/skin/popular/basic";

    $rows = (int) $rows;
    
    // 네이버는 10개만 나오니까
    if ($rows > 10 || $rows < 0) $rows = 10;

    $xml =simplexml_load_file("http://openapi.naver.com/search?key=$g4[naver_api]&query=nexearch&target=rank");

    $npop = array();
    for ($i=0; $i<$rows;$i++) {
        $k = $i + 1;
        $j = "R" . $k;
        $item = $xml->item->$j; 

        $k = $npop[$i]['K'] = iconv("UTF-8", $g4[charset], $item->K);
        $npop[$i]['S'] = iconv("UTF-8", $g4[charset], $item->S);
        $npop[$i]['V'] = (int) $item->V;
        $npop[$i]['LINK'] = "http://search.naver.com/search.naver?where=nexearch&query=" . urlencode($k) . "&sm=top_lve";
    }

    ob_start();
    include "$popular_skin_path/popular.skin.php";
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
