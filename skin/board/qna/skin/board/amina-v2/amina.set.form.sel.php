<?

include_once("./_common.php");
include_once("$g4[admin_path]/admin.lib.php");

auth_check($auth[$sub_menu], "w");

if ($is_admin == "group") {
	if ($member[mb_id] != $group[gr_admin]) {
		alert("그룹이 틀립니다.");
	}
}

if ($is_admin != "super") {
    $group = get_group($board[gr_id]);
    $is_admin = is_admin($member[mb_id]);
}

header("Content-Type: text/html; charset=$g4[charset]");
$gmnow = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: 0"); // rfc2616 - Section 14.21
header("Last-Modified: " . $gmnow);
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0


function get_skin_options($pattern, $path, $type, $skin, $css='') {

    $dirname = $path."/skin/".$type."/".$skin."/";

	$str = "";
    unset($arr);
    $handle = opendir($dirname);
    while ($file = readdir($handle)) {
        if (preg_match("/$pattern/", $file, $matches)) {
			$arr[] = str_replace(".css","",$matches[0]); //파일명만 가져오기
        }
    }
    closedir($handle);

    sort($arr);

    foreach($arr as $key=>$value) {
		$chk_sel = "";
		if($css == $arr[$key]) $chk_sel = "selected";		
		$str .= "<option value='$arr[$key]' {$chk_sel}>$arr[$key]</option>\n";
    }

    return $str;
}

$set = array();

if($opt == "set") {
	switch($type) {
		case 'addon'	: $msg = "애드온"; $set_name = $amina[addon_skin]; $set_data = $amina[addon_set]; break;
		case 'list'		: $msg = "목록"; $set_name = $amina[list_skin]; $set_data = $amina[list_set]; break;
		case 'view'		: $msg = "내용"; $set_name = $amina[view_skin]; $set_data = $amina[view_set]; break;
		case 'sign'		: $msg = "서명"; $set_name = $amina[sign_skin]; $set_data = $amina[sign_set]; break;
	}

	if($set_name != $skin) $set_data = "";

	$set_skin_path = $board_skin_path."/skin/".$type."/".$skin."/set";

	if(file_exists($set_skin_path."/set.form.php")) {
		@include_once($set_skin_path."/set.form.php");
	} else {
		echo "<div class=br></div>\n";
		echo "<span style='color:#888888;'>※ {$skin} {$msg}스킨은 세부설정이 없는 단독스킨입니다.</span>";
	}
} else {
	$sel_name = $name;
?>

<select name='<?=$sel_name?>' style='width:120px;'>
	<?=get_skin_options("^(.*)\.css", $board_skin_path, $type, $skin, $amina[$name])?>
</select>

<? } ?>