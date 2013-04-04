<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($is_dhtml_editor) {
	echo "<script type='text/javascript' src='$board_skin_path/ckeditor/ckeditor.js'></script>";
}
?>

<div >
	<img src="<?=$g4[path]?>/images/psp_notice.png">
</div>

<script language="javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null> 
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">
<input type=hidden name=mnb      value="<?=$mnb?>">
<input type=hidden name=snb      value="<?=$snb?>">


<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width=100>
<colgroup width=''>
<tr><td colspan=2 height=2 bgcolor=#b0adf5></td></tr>
<tr><td style='padding-left:20px' colspan=2 height=38 bgcolor=#f8f8f9><strong><?=$title_msg?></strong></td></tr>

<? if ($is_name) { ?>
<tr>
    <td style='padding-left:20px; height:30px;'>· 이름</td>
    <td><input class=ed maxlength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr>
    <td style='padding-left:20px; height:30px;'>· 패스워드</td>
    <td><input class=ed type=password maxlength=20 size=15 name=wr_password itemname="패스워드" <?=$password_required?>></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr>
    <td style='padding-left:20px; height:30px;'>· 이메일</td>
    <td><input class=ed maxlength=100 size=50 name=wr_email email itemname="이메일" value="<?=$email?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_homepage) { ?>
<tr>
    <td style='padding-left:20px; height:30px;'>· 홈페이지</td>
    <td><input class=ed size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr>
    <td style='padding-left:20px; height:30px;'>· Notice</td>
    <td><input class=ed style="width:99%;" name=wr_subject id="wr_subject" itemname="제목" required value="<?=$subject?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td style='padding-left:20px;'>· Content</td>
    <td style='padding:5 0 5 0;'>
        <? if ($is_dhtml_editor) { ?>
            <textarea cols="80" id="wr_content" name="wr_content" rows="20" rows=10 itemname="content" >
            <?=$content?>			
			</textarea>
        <? } else { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif"></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>글자<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
        </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<? if ($is_file) { ?>
<tr>
    <td style='padding-left:20px; height:30px;'><table cellpadding=0 cellspacing=0><tr><td style=" padding-top: 10px;">· File <span onclick="add_file();" style='cursor:pointer; font-family:tahoma; font-size:12pt;'>+</span> <span onclick="del_file();" style='cursor:pointer; font-family:tahoma; font-size:12pt;'>-</span></td></tr></table></td>
    <td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script language="JavaScript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("You can upload maximu files : "+upload_count+" ");
                return;
            }

            var objTbl;
            var objRow;
            var objCell;
            if (document.getElementById)
                objTbl = document.getElementById("variableFiles");
            else
                objTbl = document.all["variableFiles"];

            objRow = objTbl.insertRow(objTbl.rows.length);
            objCell = objRow.insertCell(0);

            objCell.innerHTML = "<input type='file' class=ed name='bf_file[]' title='maxmimum file size :  <?=$upload_max_filesize?> '>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class=ed size=50 name='bf_content[]' title=''>";
                <? } ?>
                ;
            }

            flen++;
        }

        <?=$file_script; //수정시에 필요한 스크립트?>

        function del_file()
        {
            // file_length 이하로는 필드가 삭제되지 않아야 합니다.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
            {
                objTbl.deleteRow(objTbl.rows.length - 1);
                flen--;
            }
        }
        </script></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr><td colspan=2 height=1 bgcolor=#000000></td></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" height="30" background="<?=$board_skin_path?>/img/write_down_bg.gif"></td>
</tr>
<tr>
    <td width="100%" align="center" valign="top">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
</tr>
</table>

</td></tr></table>
</form>

<script language="javascript">
<?
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = 'notice';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = 'notice';
    }";
} 
?>

with (document.fwrite) {
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined") {
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
        if (w.value == "r")
            ca_name.value = "<?=$write[ca_name]?>"; 
    }
}


function html_auto_br(obj) 
{
    if (obj.checked) {
        result = confirm("Do you want to use the auto row?");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f) 
{
	
	<?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    /*
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("prohibited word inclued  ('"+s+"')");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("prohibited word inclued  ('"+s+"')");
        return false;
    }
    */

    if (document.getElementById('char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(document.getElementById('char_count').innerHTML);
            if (char_min > 0 && char_min > cnt) {
                alert("minimum character : "+char_min+" ");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("maximum character :  "+char_max+" ");
                return false;
            }
        }
    }


    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;
    

    return true;
}

CKEDITOR.replace( 'wr_content', {enterMode    : Number(2)});
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>