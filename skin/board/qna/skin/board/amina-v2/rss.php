<?
include_once("./_common.php");
include_once("$g4[path]/lib/amina.lib.view.skin.php");

//RSS Setting
$rss_rows = 10; //뽑아올 글 수

$yoil = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");

// 특수문자 변환
function specialchars_replace($str, $len=0) {
    if ($len) {
        $str = substr($str, 0, $len);
    }

	$str = preg_replace("/&/", "&amp;", $str);
    $str = preg_replace("/</", "&lt;", $str);
    $str = preg_replace("/>/", "&gt;", $str);
    return $str;
}

// 비회원 읽기가 가능한 게시판만 RSS 지원
if ($board[bo_read_level] >= 2) {
    echo "비회원 읽기가 가능한 게시판만 RSS 지원합니다.";
    exit;
}

// RSS 사용 체크
if (!$board[bo_use_rss_view]) {
    echo "RSS 보기가 금지되어 있습니다.";
    exit;
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
	
<title><?=specialchars_replace("$config[cf_title] > $board[bo_subject]")?></title>
<link><?=specialchars_replace("$g4[url]/$g4[bbs]/board.php?bo_table=$bo_table")?></link>
<description><?=specialchars_replace("$config[cf_title] 사이트의 $board[bo_subject] 게시판입니다.")?></description>
<language>ko</language>
<generator>AMINA BBS for GNU Board</generator>
<pubDate><?=$yoil[date('w', $g4['server_time'])]?>, <?=date('d M Y H:i:s', $g4['server_time'])?> +0900</pubDate>

<?
//RSS 추출
$sql = " select * from $g4[write_prefix]$bo_table where wr_is_comment = 0 and wr_option not like '%secret%' order by wr_num, wr_reply limit 0, $rss_rows ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {

	//링크설정
	//$link = "{$amina[gnu_url]}/bbs/board.php?bo_table={$bo_table}&wr_id={$row[wr_id]}";
	//if($amina[use_surl] == 1) $link = "{$amina[site_url]}/{$bo_table}/{$row[wr_id]}";
	$link = gnu_url(sns_surl(sns_lurl($bo_table, $row[wr_id], $amina[use_surl]), $amina[use_bitly]),"change"); //짧은 주소

	$row[file] = get_file($bo_table, $row[wr_id]);
?>
	<item>
	<author><?=specialchars_replace($row[wr_name])?></author>
	<title><?=specialchars_replace($row[wr_subject])?></title>
	<link><?=specialchars_replace($link)?></link>
	<guid><?=specialchars_replace($link)?></guid>
	<description><?=specialchars_replace(gnu_url(amina_view_contents($row[wr_content], $row[file], $row[wr_6], amina_array_write($row[wr_10]), (int)$board[bo_image_width],"rss"),"change"))?></description>
	<pubDate><?=$yoil[date('w', strtotime($row['wr_datetime']))]?>, <?=date('d M Y H:i:s', strtotime($row['wr_datetime']))?> +0900</pubDate>
	<activity:verb>http://activitystrea.ms/schema/1.0/post</activity:verb>
	<activity:object-type>http://activitystrea.ms/schema/1.0/blog-entry</activity:object-type>
	</item>
<? } ?>

</channel>
</rss>