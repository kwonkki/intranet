<?

include_once("./_common.php");

header("Content-Type: text/html; charset=$g4[charset]");
$gmnow = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: 0"); // rfc2616 - Section 14.21
header("Last-Modified: " . $gmnow);
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0

$info = array();
$info = amina_query($org);

?>

<?=latest_amina($info[skin_dir], $info[bo_table], $info[rows], $info[subject_len], $opt." head_skin=none tab=ok", $tab)?>
