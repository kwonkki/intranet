<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?=$comment_min?>); // 최소
var char_max = parseInt(<?=$comment_max?>); // 최대
</script>

<? if ($cwin==1) { //코멘트 새창 띄울때 나타나게?>
<table width='100%' cellpadding='10' align='center'><tr><td>
<? } ?>

<!-- 코멘트 리스트 -->
<div id="commentContents">
<?
for ($i=0; $i<count($list); $i++) 
{
    $comment_id = $list[$i][wr_id];
?>
<a name="c_<?=$comment_id?>"></a>

<table width='100%' cellpadding='0' cellspacing='0' border='0'>
	<tr>
		<td>
			<? for ($k=0; $k<strlen($list[$i][wr_comment_reply]); $k++) echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
		</td>
		<td width='100%' valign="top">
			<div style="float:left; margin:5px 0 0 2px;">
				<strong><?=$list[$i][name]?></strong>
                <!--<span style='font-size:11px; color=#909090'><?// if ($is_ip_view) { echo "({$list[$i][ip]}) "; } ?> </span> &nbsp;-->
				<span style="font-size:11px; color:#bbbbbb;">|</span><span class="small3"> <?=date("Y-m-d H:i", strtotime($list[$i][datetime]))?></span>
            </div>
            <div style="float:right; margin-top:5px;" class="small3">
                <? if ($list[$i][is_reply]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'c');\"><span class='small3'>Reply</span></a>"; } ?>
                <? if ($list[$i][is_edit]) { echo " | <a href=\"javascript:comment_box('{$comment_id}', 'cu');\"><span class='small3'>Update</span></a>"; } ?>
                <? if ($list[$i][is_del])  { echo " | <a href=\"javascript:comment_delete('{$list[$i][del_link]}');\"><span class='small3'>Delete</span></a>"; } ?>
            </div>
       
            <!-- 코멘트 출력 -->
            <div style='line-height:20px; padding:5px 15px; word-break:break-all; overflow:hidden; clear:both; '>
                <?
                if (strstr($list[$i][wr_option], "secret")) echo "<span style='color:#ff6600;'>*</span> ";
                $str = $list[$i][content];
                if (strstr($list[$i][wr_option], "secret"))
                    $str = "<span class='small' style='color:#ff6600;'>$str</span>";

                $str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str);
                // FLASH XSS 공격에 의해 주석 처리 - 110406
                //$str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(swf)\".*\<\/a\>\]/i", "<script>doc_write(flash_movie('$1://$2.$3'));</script>", $str);
                $str = preg_replace("/\[\<a\s*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\"\s*[^\>]*\>[^\s]*\<\/a\>\]/i", "<img src='$1://$2.$3' id='target_resize_image[]' onclick='image_window(this);' border='0'>", $str);
                echo $str;
                ?>
            </div>
            <? if ($list[$i][trackback]) { echo "<p>".$list[$i][trackback]."</p>"; } ?>
                <span id='edit_<?=$comment_id?>' style='display:none;'></span><!-- 수정 -->
                <span id='reply_<?=$comment_id?>' style='display:none;'></span><!-- 답변 -->
               
				<input type='hidden' id='secret_comment_<?=$comment_id?>' value="<?=strstr($list[$i][wr_option],"secret")?>">
                <textarea id='save_comment_<?=$comment_id?>' style='display:none;'><?=get_text($list[$i][content1], 0)?></textarea>
			</div>
			<div style="width:100%; height:1px; line-height:1px; font-size:1px; background:url(<?=$board_skin_path?>/img/dot.gif) repeat-x ;">&nbsp;</div>
		</td>
	</tr>
</table>
<? } ?>
</div>
<!-- 코멘트 리스트 -->
		</td>
	</tr>
</table>
<!--//문서레이아웃:프린트부분-->

<? if ($cwin==1) { ?><table width='100%' cellpadding='10' align='center'><tr><td><?}?>
<? if ($is_comment_write) { ?>
<!-- 코멘트 입력 -->
<!--문서레이아웃-->
<BR>

<? if ($cwin==1) { //댓글새창 띄울시 ?>
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
<? }else{ // 평상시 ?>
	<table width="800px" align="center" cellpadding="0" cellspacing="0">
<? } ?> 
		<tr>
			<td class="docbg2">
				<div id="comment_write" style="display:none;">
				<form name="fviewcomment" method="post" action="./write_comment_update.php" onsubmit="return fviewcomment_submit(this);" autocomplete="off" style="margin:0px;">
				<input type=hidden name=w           id=w value='c'>
				<input type=hidden name=bo_table    value='<?=$bo_table?>'>
				<input type=hidden name=wr_id       value='<?=$wr_id?>'>
				<input type=hidden name=comment_id  id='comment_id' value=''>
				<input type=hidden name=sca         value='<?=$sca?>' >
				<input type=hidden name=sfl         value='<?=$sfl?>' >
				<input type=hidden name=stx         value='<?=$stx?>'>
				<input type=hidden name=spt         value='<?=$spt?>'>
				<input type=hidden name=page        value='<?=$page?>'>
				<input type=hidden name=cwin        value='<?=$cwin?>'>
				<input type=hidden name=is_good     value=''>

				<table width='100%' cellpadding='0' cellspacing='0'>
				<tr> 
					<td align="center" valign='top' rowspan="2" width="100px">
						<br>
						<span style='font-size:13px'><b>Opinion</b></span><BR>
						<table border='0' cellpadding="0" cellspacing="2"><tr><td></td></table>
						<!--<span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);">■</span>-->
						<span onclick="textarea_decrease('wr_content', 6);" class="btn_icon">－</span>
						<span onclick="textarea_increase('wr_content', 6);" class="btn_icon">＋</span><BR>
				   </td>
				   <td></td>
				</tr>
			<td colspan="2"> 
			<textarea id="wr_content" name="wr_content" rows="6" itemname="내용" required 
				<? if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?> style='width:100%; word-break:break-all;' class='tx'></textarea>
				<? if ($comment_min || $comment_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
			</td>
		</tr>
        <tr> 
			<td>&nbsp; </td>
            <td height='28px' valign='bottom'> 
				<table border='0' cellpadding="0" cellspacing="0">
					<tr valign="top"> 
	  					<? if ($is_guest) { ?>
						<td style="padding-top:4px">
							<img id='kcaptcha_image' border='0' width='120px' height='60px' onclick="imageClick();" style="cursor:pointer;" title="글자가 잘안보이는 경우 클릭하시면 새로운 글자가 나옵니다." align="top">
							<input title="왼쪽의 글자를 입력하세요." type="input" name="wr_key" size="10" itemname="자동등록방지" required class=ed>
							&nbsp;&nbsp;
						</td>
						<td style="padding-top:4px">Name <INPUT type=text maxLength='20' size='10' name="wr_name" itemname="이름" required class=ed>&nbsp;&nbsp;</td>
						<td style="padding-top:4px">Pass <INPUT type=password maxLength='20' size='10' name="wr_password" itemname="비밀번호" required class='ed'>&nbsp;&nbsp;</td>
    					<?}?>
						<td class="small" style="padding-top:4px"><input type=checkbox id="wr_secret" name="wr_secret" value="secret">secret&nbsp;</td>
						<td style="padding-top:4px">&nbsp;<span class="btn s"><button type="submit" accesskey='s'>submit</button></span></td>
						    <? if ($comment_min || $comment_max) { ?><td class=small> &nbsp;&nbsp;&nbsp;(<span id=char_count></span>글자)</td><?}?>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</form>
</div>
		 </td>
	</tr>
</table>
<!--//문서레이아웃-->

<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
var save_before = '';
var save_html = document.getElementById('comment_write').innerHTML;

function good_and_write()
{
    var f = document.fviewcomment;
    if (fviewcomment_submit(f)) {
        f.is_good.value = 1;
        f.submit();
    } else {
        f.is_good.value = 0;
    }
}

function fviewcomment_submit(f)
{
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자

    f.is_good.value = 0;

    /*
    var s;
    if (s = word_filter_check(document.getElementById('wr_content').value))
    {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        document.getElementById('wr_content').focus();
        return false;
    }
    */

    var subject = "";
    var content = "";
    $.ajax({
        url: "<?=$board_skin_path?>/ajax.filter.php",
        type: "POST",
        data: {
            "subject": "",
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

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        f.wr_content.focus();
        return false;
    }

    // 양쪽 공백 없애기
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("minimum comment character would be  "+char_min+" ");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("maxmimum comment character would be  "+char_max+" ");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("Please type the comment");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('no name typed');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('no password typed');
            f.wr_password.focus();
            return false;
        }
    }

    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    return true;
}

/*
jQuery.fn.extend({
    kcaptcha_load: function() {
        $.ajax({
            type: 'POST',
            url: g4_path+'/'+g4_bbs+'/kcaptcha_session.php',
            cache: false,
            async: false,
            success: function(text) {
                $('#kcaptcha_image')
                    .attr('src', g4_path+'/'+g4_bbs+'/kcaptcha_image.php?t=' + (new Date).getTime())
                    .css('cursor', '')
                    .attr('title', '');
                md5_norobot_key = text;
            }
        });
    }
});
*/

function comment_box(comment_id, work)
{
    var el_id;
    // 코멘트 아이디가 넘어오면 답변, 수정
    if (comment_id)
    {
        if (work == 'c')
            el_id = 'reply_' + comment_id;
        else
            el_id = 'edit_' + comment_id;
    }
    else
        el_id = 'comment_write';

    if (save_before != el_id)
    {
        if (save_before)
        {
            document.getElementById(save_before).style.display = 'none';
            document.getElementById(save_before).innerHTML = '';
        }

        document.getElementById(el_id).style.display = '';
        document.getElementById(el_id).innerHTML = save_html;
        // 코멘트 수정
        if (work == 'cu')
        {
            document.getElementById('wr_content').value = document.getElementById('save_comment_' + comment_id).value;
            if (typeof char_count != 'undefined')
                check_byte('wr_content', 'char_count');
            if (document.getElementById('secret_comment_'+comment_id).value)
                document.getElementById('wr_secret').checked = true;
            else
                document.getElementById('wr_secret').checked = false;
        }

        document.getElementById('comment_id').value = comment_id;
        document.getElementById('w').value = work;

        save_before = el_id;
    }

    if (typeof(wrestInitialized) != 'undefined')
        wrestInitialized();

    //jQuery(this).kcaptcha_load();
    if (comment_id && work == 'c')
        $.kcaptcha_run();
}

function comment_delete(url)
{
    if (confirm("Do you want to delete this comment?")) location.href = url;
}

comment_box('', 'c'); // 코멘트 입력폼이 보이도록 처리하기위해서 추가 (root님)
</script>
<? } ?>

<? if($cwin==1) { ?></td><tr></table><p align=center><a href="javascript:window.close();"><img src="<?=$board_skin_path?>/img/btn_close.gif" border="0"></a><br><br><?}?>
