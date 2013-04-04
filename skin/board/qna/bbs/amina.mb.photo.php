<?

include_once("./_common.php");

if(!$member) alert_close("회원만 이용하실 수 있습니다.");

// 설정 저장-------------------------------------------------------
if ($w == "u") {

	mb_photo_upload($member[mb_id], $del_mb_icon2, $_FILES);

	//goto_url("./mb_photo.php");
}
//--------------------------------------------------------------------

$g4[title] = "회원사진 등록하기";

include_once("$g4[path]/head.sub.php");

?>

<style>
	body { padding:15; margin:0; background:#FFFFFF; line-height:180% }
	form,fieldset,legend,button,select{margin:0;padding:0}
	body, table, td, p, input, button, textarea, select { font-family:Dotum, AppleGothic, sans-serif; font-size:9pt; color:#222222; }
	.ed { border:1px solid #CCCCCC; } 
	.tx { border:1px solid #CCCCCC; }
	.tbl { border-collapse:collapse; BACKGROUND-COLOR: white;} 
	.tbl td, .tbl th { border:1px solid #ddd; padding : 8px; line-height:1.6;}
	.tbl .td_head { BACKGROUND-COLOR: #efefef; text-align:center; }
	.tbl .td_head2 { BACKGROUND-COLOR: #fafafa; text-align:center; }

	.tbl1 { border-collapse:collapse; BACKGROUND-COLOR: white;} 
	.tbl1 td, .tbl1 th { border:0; padding:1px 0px; line-height:1.5;}

	.btn_save {cursor:pointer; padding:8px 20px; background:#efefef; font-weight:bold; color:#333; border:0px;}
</style>

<table cellspacing=0 cellspacing=0 border=0 class=tbl>
<form name=fregisterform method=post onsubmit="return fregisterform_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=bo_table         value="<?=$bo_table?>">
<input type=hidden name=w                value="u">
<tr>
<td valign=top class="td_head">
	<?=mb_photo("", $member[mb_id], 80, 80)?>
</td>
<td>
	<table border=0 cellpadding=0 cellspacing=0 width=100% class=tbl1>
	<tr><td>
		회원사진은 이미지(gif/jpg/png) 파일만 가능하며, 등록후 80x80 사이즈로 자동 조절됩니다.
	</td></tr>
	<tr><td>
		<input type=file name='mb_icon2' class=ed>
	</td></tr>
    <?
	    $icon_file2 = "$g4[path]/data/mb_photo/$member[mb_id]";
        if (file_exists($icon_file2)) {
		    echo "<tr><td><input type=checkbox name='del_mb_icon2' value='1' class='csscheck'>회원사진 삭제</td></tr>";
        }
    ?>
	</table>
</td>
</tr>
</table>

<p align=center><input type=submit accesskey='s' value='저  장' class="btn_save"></p>

</form>

<script type="text/javascript">

function fregisterform_submit(f) {

	f.action = "./amina.mb.photo.php";

	return true;
}
</script>

<?
include_once("$g4[path]/tail.sub.php");
?>
