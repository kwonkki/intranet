<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

$board_color = explode(",",$board[bo_color]);
?>

<script language="javascript">
// ���ڼ� ����
var char_min = parseInt(<?=$write_min?>); // �ּ�
var char_max = parseInt(<?=$write_max?>); // �ִ�
</script>

<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null><!-- �������� ���ʽÿ�. -->
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

<!-- �Խñ� ���� ���� -->
<table width="980" align=center cellpadding=0 cellspacing=0><tr><td>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width="100">
<colgroup width=''>
<colgroup width="100">
<colgroup width=''>

<tr>
	<td colspan="4" class="top">:: <?=$title_msg?> ::</td>
</tr>

<tr>
	<? if ($is_name) { ?>
	<td class="write_head">�����</td>
	<td class="field"<?=($is_admin)?" colspan='3'":"";?>><input name=wr_name itemname="�����" required value="<?=$name?>" maxlength="20" type="text" class="ed" size="15" /></td>
	<? if (!$is_admin) { ?>
	<td class="write_head">�н�����</td>
	<td class="field"><input class='ed' type=password maxlength=20 size=15 name=wr_password itemname="�н�����" required <?=$password_required?> /></td>
	<? } ?>
	<? } ?>
</tr>

<? 
$option = "";
$option_hidden = "";
if ($is_notice || $is_html || $is_secret || $is_mail) { 
    $option = "";
    if ($is_notice) { 
        $option .= "<input type=checkbox name=notice value='1' $notice_checked>����&nbsp;";
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
            $option .= "<input type=checkbox value='secret' name='secret' $secret_checked><span class=w_title>��б�</span>&nbsp;";
        } else {
            $option_hidden .= "<input type=hidden value='secret' name='secret'>";
        }
    }
    
    if ($is_mail) {
        $option .= "<input type=checkbox value='mail' name='mail' $recv_email_checked>�亯���Ϲޱ�&nbsp;";
    }
}

echo $option_hidden;
if ($option) {
?>
<tr style="display:none;">
    <td class=write_head>�� ��</td>
    <td class="field"><?=$option?></td>
</tr>
<? } ?>

<? if ($is_category) { ?>
<tr>
    <td class="write_head">�� ��</td>
    <td class="field" colspan="3"><select name=ca_name required itemname="�з�"><option value="">�����ϼ���<?=$category_option?></select></td>
</tr>
<? } ?>

<!-- �ֹ�ó������-->
<? if ($is_admin)  { ?>
<!-- <tr>
	<td height=15 colspan=4 bgcolor="#CCCCCC" style='padding-left:13px;'><font color="#E87208">�� ���ڿ��Ը� �������� ȭ��. ���ó�� ��Ȳ�� ��� ��ȣ�� �Է��ϸ� ����Ʈ�� ó�������� ��Ÿ���ϴ�.</font></td>
</tr> -->

<tr>
	<td class="write_head">������Ȳ</td>
	<td class="field" colspan="3">
	<input type=radio name="wr_5" value="����" <? if(!$write[wr_5] || $write[wr_5] == "����" ) echo "checked"; ?>>����
	<input type=radio name="wr_5" value="������" <? if($write[wr_5] == "������") echo "checked"; ?>>������
	<input type=radio name="wr_5" value="����" <? if($write[wr_5] == "����") echo "checked"; ?>>����
	<input type=radio name="wr_5" value="�Ϸ�" <? if($write[wr_5] == "�Ϸ�") echo "checked"; ?>>�Ϸ�
	</td>
</tr>
<? } ?>
<tr>
  <td class=write_head>�����</td>
  <td class="field"><input maxlength=15 size=10 name=wr_6 itemname="�����" value="<?=$write[wr_6]?>">&nbsp;%</td>
  <td class="write_head">�ϷΌ����</td>
	<td class="field">
	<input class="ed" type="text" name="wr_4" id="wr_4" style="width:100px;" itemname="�Ϸ�����" value="<?=$write[wr_4]?>"> <img src="<?=$board_skin_path?>/img/calendar.jpg" alt="�޷º���" align="absmiddle" onclick="win_calendar('wr_4', window.document.getElementById('wr_4').value, '-');" style="cursor:pointer;" />
	</td
></tr>
<tr>
   <td class=write_head>�����̳�</td>
   <td class="field"><input maxlength=15 size=40 name=wr_2 itemname="�����̳�" value="<?=$write[wr_2]?>"></td>
   <td class=write_head>���α׷���</td>
   <td class="field"><input maxlength=15 size=40 name=wr_3 itemname="���α׷���" value="<?=$write[wr_3]?>"></td>
</tr>
<!-- �ֹ�ó������ ��-->

<tr>
    <td class="write_head">������Ʈ��</td>
    <td class="field" colspan="3"><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="����" required value="<?=$subject?>"></td>
</tr>

<tr>
    <td class="write_head">����</td>
    <td class='write_head' style='padding:5 0 5 10;' colspan='4'>
        <? if ($is_dhtml_editor) { ?>
            <?=cheditor2('wr_content', $content);?>
        <? } else { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif"></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>����<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=20 itemname="����" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>

<? if ($is_file) { ?>
<tr>
    <td>
        <table width="100%" cellpadding=0 cellspacing=0>
        <tr>
            <td class=write_head style="padding-top:10px; line-height:20px;">
                ����÷��<br> 
                <span onclick="add_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_add.gif"></span> 
                <span onclick="del_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_minus.gif"></span>
            </td>
        </tr>
        </table>
    </td>
    <td class="field" colspan="3"><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script language="JavaScript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("�� �Խ����� "+upload_count+"�� ������ ���� ���ε尡 �����մϴ�.");
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

            objCell.innerHTML = "<input type='file' class='ed' name='bf_file[]' title='���� �뷮 <?=$upload_max_filesize?> ���ϸ� ���ε� ����'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='ed' size=50 name='bf_content[]' title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ �Է��ϼ���.'>";
                <? } ?>
                ;
            }

            flen++;
        }

        <?=$file_script; //�����ÿ� �ʿ��� ��ũ��Ʈ?>

        function del_file()
        {
            // file_length ���Ϸδ� �ʵ尡 �������� �ʾƾ� �մϴ�.
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
<? } ?>

<? if ($is_trackback) { ?>
<tr>
    <td class=write_head>Ʈ�����ּ�</td>
    <td class="field" colspan="3"><input class='ed' size=50 name=wr_trackback itemname="Ʈ����" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">�� ����<? } ?></td>
</tr>
<? } ?>

<? if ($is_guest) { ?>
<tr>
    <td class="write_head" style="padding:5px 0; text-align:center;"><img id='kcaptcha_image' /></td>
    <td class="field" colspan="3"><input class='ed' type=input size=10 name=wr_key itemname="�ڵ���Ϲ���" required>&nbsp;&nbsp;������ ���ڸ� �Է��ϼ���.</td>
</tr>
<? } ?>

<tr><td colspan=4 height="3" bgcolor="<?=$board_color[0]?>"></td></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td colspan=2 height=1 bgcolor=#e1e1e1></td></tr>
<tr><td colspan=2 height=6></td></tr>
<tr height="50">
    <td width="100%" align="center">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
</tr>
</table>

</td></tr></table>
</form>

<script type="text/javascript"> var md5_norobot_key = ''; </script>
<script type="text/javascript" src="<?="$g4[path]/js/prototype.js"?>"></script>
<script type="text/javascript">
function imageClick() {
    var url = "<?=$g4[bbs_path]?>/kcaptcha_session.php";
    var para = "";
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            asynchronous: true,
            parameters: para, 
            onComplete: imageClickResult
        });
}

function imageClickResult(req) { 
    var result = req.responseText;
    var img = document.createElement("IMG");
    img.setAttribute("src", "<?=$g4[bbs_path]?>/kcaptcha_image.php?t=" + (new Date).getTime());
    document.getElementById('kcaptcha_image').src = img.getAttribute('src');

    md5_norobot_key = result;
}

<? if (!$is_member) { ?>Event.observe(window, "load", imageClick);<? } ?>

<?
// ���ڶ�� �з� ���ÿ� '����' �ɼ��� �߰���
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '����';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '����';
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

    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("�ڵ� �ٹٲ��� �Ͻðڽ��ϱ�?\n\n�ڵ� �ٹٲ��� �Խù� ������ �ٹٲ� ����<br>�±׷� ��ȯ�ϴ� ����Դϴ�.");
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
    /*var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("���� �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }*/

    if (char_min > 0 || char_max > 0)
    {
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("������ "+char_min+"���� �̻� ���ž� �մϴ�.");
            return;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("������ "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
            return;
        }
    }

	if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('������ �Է��Ͻʽÿ�.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }

    <?
    if ($is_dhtml_editor) echo cheditor3('wr_content');
    ?>

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
<style type="text/css">
.top { font-weight:bold; font-size:12px; border-top:3px solid <?=$board_color[0]?>; border-bottom:1px solid <?=$board_color[0]?>; white-space:nowrap; height:36px; color:<?=$board_color[1]?>; padding-left:15px; }
.write_head { height:30px; padding-left:15px; color:#8492A0; background-color:#F8F8F8; color:<?=$board_color[1]?>; border-bottom:1px solid #E7E7E7; }
.field { padding:0 10px; border-bottom:1px solid #E7E7E7; }
</style>
