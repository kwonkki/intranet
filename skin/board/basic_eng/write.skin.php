<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}
?>

<div style="height:14px; line-height:1px; font-size:1px;">&nbsp;</div>

<style type="text/css">
.write_head { height:30px; text-align:center; color:#8492A0; }
.field { border:1px solid #ccc; }
</style>

<script type="text/javascript">
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

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>


<div style="border:1px solid #ddd; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
<div style="font-weight:bold; font-size:14px; margin:7px 0 0 10px;">:: write ::</div>
</div>
<div style="height:3px; background:url(<?=$board_skin_path?>/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width=90>
<colgroup width=''>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>
<? if ($is_name) { ?>
<tr>
    <td class=write_head>Name</td>
    <td><input class='ed' maxlength=20 size=15 name=wr_name itemname="Name" required value="<?=$name?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr>
    <td class=write_head>Password</td>
    <td><input class='ed' type=password maxlength=20 size=15 name=wr_password itemname="Password" <?=$password_required?>></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr>
    <td class=write_head>E-mail</td>
    <td><input class='ed' maxlength=100 size=50 name=wr_email email itemname="E-mail" value="<?=$email?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_homepage) { ?>
<tr>
    <td class=write_head>homepage</td>
    <td><input class='ed' size=50 name=wr_homepage itemname="homepage" value="<?=$homepage?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? 
$option = "";
$option_hidden = "";
if ($is_notice || $is_html || $is_secret || $is_mail) { 
    $option = "";
    if ($is_notice) { 
        $option .= "<input type=checkbox name=notice value='1' $notice_checked>공지&nbsp;";
    }

    if ($is_html) {
        if ($is_dhtml_editor) {
            $option_hidden .= "<input type=hidden value='html1' name='html'>";
        } else {
            $option .= "<input onclick='html_auto_br(this);' type=checkbox value='$html_value' name='html' $html_checked><span class=w_title>html</span>&nbsp;";
        }
    }

    if ($is_secret) {
        if ($is_admin || $is_secret==1) {
            $option .= "<input type=checkbox value='secret' name='secret' $secret_checked><span class=w_title>secret memo</span>&nbsp;";
        } else {
            $option_hidden .= "<input type=hidden value='secret' name='secret'>";
        }
    }
    
    if ($is_mail) {
        $option .= "<input type=checkbox value='mail' name='mail' $recv_email_checked>답변메일받기&nbsp;";
    }
}

echo $option_hidden;
if ($option) {
?>
<tr>
    <td class=write_head>option</td>
    <td><?=$option?></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_category) { ?>
<tr>
    <td class=write_head>category</td>
    <td><select name=ca_name required itemname="category"><option value="">choose it<?=$category_option?></select></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr>
    <td class=write_head>subject</td>
    <td><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="subject" required value="<?=$subject?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class='write_head' style='padding:5 0 5 10;' colspan='2'>
        <? if ($is_dhtml_editor) { ?>
            <?=cheditor2('wr_content', $content);?>
        <? } else { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif"></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>word<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="content" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>

<? if ($is_link) { ?>
<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
<tr>
    <td class=write_head>link #<?=$i?></td>
    <td><input type='text' class='ed' size=50 name='wr_link<?=$i?>' itemname='link #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>
<? } ?>

<? if ($is_file) { ?>
<tr>
    <td class=write_head>
        <table cellpadding=0 cellspacing=0>
        <tr>
            <td class=write_head style="padding-top:10px; line-height:20px;">
                File<br> 
                <span onclick="add_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_add.gif"></span> 
                <span onclick="del_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_minus.gif"></span>
            </td>
        </tr>
        </table>
    </td>
    <td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script type="text/javascript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("Only "+upload_count+"files upload is possible.");
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

            objCell.innerHTML = "<input type='file' class='ed' name='bf_file[]' title='Only <?=$upload_max_filesize?> files are allowed for the upload at one time.'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='ed' size=50 name='bf_content[]' title='Enter a description of the image.'>";
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

<? if ($is_trackback) { ?>
<tr>
    <td class=write_head>trackback</td>
    <td><input class='ed' size=50 name=wr_trackback itemname="trackback" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">re_trackback<? } ?></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_guest) { ?>
<tr>
    <td class=write_head><img id='kcaptcha_image' /></td>
    <td><input class='ed' type=input size=10 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;Please enter the letters on the left.</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" align="center" valign="top" style="padding-top:30px;">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
</tr>
</table>

</td></tr></table>
</form>

<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
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

with (document.fwrite) 
{
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj) 
{
    if (obj.checked) {
        result = confirm("Do you want a new line to be added after carriage returns?\n\n If yes, a tag will be added after each carriage return to create a new line.");
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
    /*
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }
    */

    if (document.getElementById('char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(document.getElementById('char_count').innerHTML);
            if (char_min > 0 && char_min > cnt) {
                alert("Content must at least be of "+char_min+"characters.");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("characters. "+char_max+"characters at most.");
                return false;
            }
        }
    }

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('Incorrect Captcha Number.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }

    <?
    if ($is_dhtml_editor) echo cheditor3('wr_content');
    ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: "<?=$board_skin_path?>/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("subject includes prohibited word.('"+subject+"')");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("Content includes prohibited word.('"+content+"')");
        if (typeof(ed_wr_content) != "undefined") 
            ed_wr_content.returnFalse();
        else 
            f.wr_content.focus();
        return false;
    }

    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    
    return true;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>
