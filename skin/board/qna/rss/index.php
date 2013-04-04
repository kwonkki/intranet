<?
$g4_path = ".."; // common.php 의 상대 경로
include_once("$g4_path/common.php");
include_once("$g4[path]/lib/amina.lib.view.skin.php");

//뽑아올 글 수
$rss_rows = 10;

$yoil = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");

//특수문자 변환
function specialchars_replace($str, $len=0) {
    if ($len) {
        $str = substr($str, 0, $len);
    }

	$str = preg_replace("/&/", "&amp;", $str);
    $str = preg_replace("/</", "&lt;", $str);
    $str = preg_replace("/>/", "&gt;", $str);
    return $str;
}

Header("Content-type: text/xml"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");   

echo "<?xml version=\"1.0\" encoding=\"$g4[charset]\"?>\n";

?>

<rss version="2.0"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/"
	xmlns:activity="http://activitystrea.ms/spec/1.0/" >
<channel>
	
<title><?=$config['cf_title']?></title>
<link><?=$amina[site_url]?></link>
<description><?=$config['cf_title']?></description>
<language>ko</language>
<generator>AMINA SKIN for GNU Board</generator>
<pubDate><?=$yoil[date('w', $g4['server_time'])]?>, <?=date('d M Y H:i:s', $g4['server_time'])?> +0900</pubDate>

<?
//RSS 추출
$result = sql_query(" select * from $g4[board_new_table] where wr_rss != '' order by bn_id desc limit $rss_rows ");
for ($i=0; $row=sql_fetch_array($result); $i++) {

	//링크설정
	//$link = "{$amina[gnu_url]}/bbs/board.php?bo_table={$row[bo_table]}&wr_id={$row[wr_id]}";
	//if($amina[use_surl] == 1) $link = "{$amina[site_url]}/{$row[bo_table]}/{$row[wr_id]}";
	$link = gnu_url(sns_surl(sns_lurl($row[bo_table], $row[wr_id], $amina[use_surl]), $amina[use_bitly]),"change"); //짧은 주소

    $board = sql_fetch(" select * from $g4[board_table] where bo_table = '$row[bo_table]' ");
	$row1 = sql_fetch(" select * from {$g4['write_prefix']}{$row[bo_table]} where wr_id = '$row[wr_id]' "); //글 정보 불러오기..

	$row1[file] = get_file($row[bo_table], $row[wr_id]);

?>
	<item>
	<author><?=specialchars_replace($row1[wr_name])?></author>
	<title><?=specialchars_replace($row1[wr_subject])?></title>
	<link><?=specialchars_replace($link)?></link>
	<guid><?=specialchars_replace($link)?></guid>
	<description><?=specialchars_replace(gnu_url(amina_view_contents($row1[wr_content], $row1[file], $row1[wr_6], amina_array_write($row1[wr_10]), (int)$board[bo_image_width],"rss"),"change"))?></description>
	<pubDate><?=$yoil[date('w', strtotime($row['bn_datetime']))]?>, <?=date('d M Y H:i:s', strtotime($row['bn_datetime']))?> +0900</pubDate>
	<activity:verb>http://activitystrea.ms/schema/1.0/post</activity:verb>
	<activity:object-type>http://activitystrea.ms/schema/1.0/blog-entry</activity:object-type>
	</item>
<? } ?>

</channel>
</rss>