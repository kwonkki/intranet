<?
include_once("./_common.php");

if (!$member[mb_id]) 
    alert("only member can access");

/*
if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER[REQUEST_URI]);
*/

$g4[title] = "member password check";
include_once("./_head.php");

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
include_once("$member_skin_path/member_confirm.skin.php");

include_once("./_tail.php");
?>
