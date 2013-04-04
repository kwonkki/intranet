<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}

//영카트 상품코드
if($w == "u" || $w == "r") $wr_8 = $write[wr_8]; 
if(!$wr_8 && $bo_it) $wr_8 = $bo_it;

?>

<link rel="stylesheet" href="<?=$head_skin_path?>/<?=$amina[head_css]?>.css" type="text/css">

<link rel="stylesheet" href="<?=$write_skin_path?>/basic.css" type="text/css">

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
<input type=hidden name=go_url   value='<?=$go_url?>'>
<input type=hidden name=frame    value="<?=$frame?>">
<input type=hidden name=bo_it    value="<?=$bo_it?>">
<input type=hidden name=post_mobile		value="">
<? if($amina[view_photo] != "3") { ?>
	<input type=hidden name='post_icon'		value="<?=$wr_icon[post_icon]?>">
	<input type=hidden name='post_icon_mb'	value="<?=$wr_icon[post_icon_mb]?>">
<? } ?>

<? if(!$is_admin) { //추천글 체크값?>
	<input type=hidden name=wr_8     value="<?=$wr_8?>">
	<input type=hidden name=post_main     value="<?=$post[post_main]?>">
	<input type=hidden name=post_good     value="<?=$post[post_good]?>">
	<input type=hidden name=post_rss      value="<?=$post[post_rss]?>">
<? } ?>

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="write_tbl">
<colgroup width=90>
<colgroup width=''>
<tr class="head_tr"><td colspan=2 class="head_td" style="border:0px;"><b><?=$title_msg?></b></td></tr>
<? if ($is_name) { ?>
<tr>
    <td class=td_head>이 &nbsp; &nbsp; &nbsp; 름</td>
    <td><input class='ed' maxlength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>"></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr>
    <td class=td_head>패스워드</td>
    <td><input class='ed' type=password maxlength=20 size=15 name=wr_password itemname="패스워드" <?=$password_required?>></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr>
    <td class=td_head>이 &nbsp;메&nbsp; 일</td>
    <td><input class='ed' maxlength=100 size=50 name=wr_email email itemname="이메일" value="<?=$email?>"></td></tr>
<? } ?>

<? if ($is_homepage) { ?>
<tr>
    <td class=td_head>홈페이지</td>
    <td><input class='ed' size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>"></td></tr>
<? } ?>

<? 
$option = "";
$option_hidden = "";
if ($is_notice || $is_html || $is_secret || $is_mail) { 
    $option = "";
    if ($is_notice) { 
        $option .= "<input type=checkbox name=notice value='1' $notice_checked>공지&nbsp;";
    }

	if ($is_admin) { 
		if($post[post_main] == "main") $chk_main = "checked";
		$option .= "<input type=checkbox name=post_main value='main' $chk_main>메인글&nbsp;";

		if($post[post_good] == "good") $chk_good = "checked";
		$option .= "<input type=checkbox name=post_good value='good' $chk_good>추천글&nbsp;";

		if($post[post_rss] == "rss") $chk_rss = "checked";
		$option .= "<input type=checkbox name=post_rss value='rss' $chk_rss>RSS글&nbsp;";
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
            $option .= "<input type=checkbox value='secret' name='secret' $secret_checked><span class=w_title>비밀글</span>&nbsp;";
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
    <td class=td_head>글 &nbsp;옵&nbsp; 션</td>
    <td><?=$option?></td></tr>
<? } ?>

<? if ($is_category) { ?>
<tr>
    <td class=td_head>글 &nbsp;분&nbsp; 류</td>
    <td>
		<select name=ca_name required itemname="분류"><option value="">선택하세요<?=$category_option?></select>
		<? if ($is_secret && $is_secret !=1) echo "&nbsp; <font color='orangered'>(자동비밀글)</font>"; ?>	
	</td></tr>
<? } ?>
<? if ($amina[star] == "1") { 
	$star = amina_array_star($write[wr_7]);
?>
<tr>
    <td class=td_head>별점주기</td>
    <td>
		<table border=0 cellpadding=0 cellspacing=0 class="star_tbl">
		<tr>
		<td><?=amina_star_mark($amina[star_color],"10|1","m")?></td>
		<td><input type="radio" name="star_score" value="10" <? if($star[score] == "10" || !$star[score]) echo "checked"; ?>></td>
		<td width=15></td>
		<td><?=amina_star_mark($amina[star_color],"8|1","m")?></td>
		<td><input type="radio" name="star_score" value="8" <? if($star[score] == "8") echo "checked"; ?>></td>
		<td width=15></td>
		<td><?=amina_star_mark($amina[star_color],"6|1","m")?></td>
		<td><input type="radio" name="star_score" value="6" <? if($star[score] == "6") echo "checked"; ?>></td>
		<td width=15></td>
		<td><?=amina_star_mark($amina[star_color],"4|1","m")?></td>
		<td><input type="radio" name="star_score" value="4" <? if($star[score] == "4") echo "checked"; ?>></td>
		<td width=15></td>
		<td><?=amina_star_mark($amina[star_color],"2|1","m")?></td>
		<td><input type="radio" name="star_score" value="2" <? if($star[score] == "2") echo "checked"; ?>></td>
		</tr>
		</table>
	</td>
	</tr>
<? } ?>
<? if($amina[view_photo] == "3") { 
	//아이콘이 없을 경우
	if(!file_exists($emo_skin_path."/".$wr_icon[post_icon].".gif")) $wr_icon[post_icon] = rand(1,$amina[emo_cnt]);
?>
<tr>
    <td class=td_head>이모티콘</td>
    <td>
		<style>
			#emoticon img { width:50px; height:50px; margin:8px; cursor:pointer; border:1px solid #efefef; }
		</style>

		<script type="text/javascript">
			function emo_show() { 
				document.getElementById('emoticon').style.display = "block" ;
			}

			function emo_hide() { 
				document.getElementById('emoticon').style.display = "none" ;
			} 

			function emo_insert(emo){
				var skin_path = "<?=$emo_skin_path?>";
				if(document.fwrite) {
					document.fwrite.emo_icon.src = skin_path + "/" + emo + ".gif";
					document.fwrite.post_icon.value = emo;
					emo_hide();
				}
			}
		</script>

		<img name="emo_icon" src='<?=$emo_skin_path?>/<?=$wr_icon[post_icon]?>.gif' width=50 height=50 onClick="emo_show();" style="cursor:pointer; border:1px solid #efefef;">
		<input type=hidden name='post_icon' value="<?=$wr_icon[post_icon]?>">
		<input type=checkbox name=post_icon_mb value='1' <? if($wr_icon[post_icon_mb] == "1") echo "checked"; ?>> 이모티콘 대신 회원사진 적용
		<br>
		<div id="emoticon" onmouseover="emo_show();" onMouseOut="emo_hide();" style="position:absolute; z-index:999; display:none; background:#FFFFFF; border:3px solid #dadada; padding:8px; text-align:center;">
			<?
				for($k=1; $k<=$amina[emo_cnt]; $k++){
					echo "<img src=\"{$emo_skin_path}/{$k}.gif\" onclick=\"emo_insert('{$k}');\"/>";
				} 
			?>
		</div>
	</td>
</tr>
<? } ?>
<tr>
    <td class=td_head>글 &nbsp;제&nbsp; 목</td>
    <td><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="제목" required value="<?=$subject?>"></td>
</tr>
<? if($is_admin) { ?>
<tr>
    <td class=td_head>목록제목</td>
    <td>
		<input type="checkbox" name="subj_b" value="1" <? if($post[subj_b] == "1") echo "checked"; ?>>두껍게
		<input type="checkbox" name="subj_i" value="1" <? if($post[subj_i] == "1") echo "checked"; ?>>이탤릭
		<input type="checkbox" name="subj_s" value="1" <? if($post[subj_s] == "1") echo "checked"; ?>>취소선
		&nbsp;
		<SCRIPT LANGUAGE="Javascript" SRC="<?=$board_skin_path?>/color_picker.js"></SCRIPT>
		<SCRIPT LANGUAGE="JavaScript">
			var cp = new ColorPicker(); // DIV style
		</SCRIPT>
		<input type="text" name="subj_color" size="10" itemname="제목색상" value="<?=$post[subj_color]?>"><input type="button" value="..." NAME="pick" ID="pick" onClick="cp.select(document.fwrite.subj_color,'pick');return false;">
		<SCRIPT LANGUAGE="JavaScript">cp.writeDiv()</SCRIPT>
	</td>
</tr>
<? } ?>
<tr>
    <td class='td_head' colspan='2'>
        <? if ($is_dhtml_editor) { ?>
            <?=cheditor2('wr_content', $content);?>
        <? } else { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$btn_skin_path?>/btn_up.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$btn_skin_path?>/btn_start.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$btn_skin_path?>/btn_down.gif"></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>글자<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>
<tr>
<td class=td_head>안내사항</td>
<td>
	<ul style="padding-left:15px; margin:0px; color:#787878;">
		<li>{동영상:공유주소} 형태로 본문에 동영상 등록시 썸네일 생성으로 글등록에 시간이 걸릴 수 있습니다.
		<? if($amina[upimg_size] > 0 && $amina[upimg_quality] > 0) { ?>
			<li>링크 이미지를 제외한 본문 또는 직접 첨부이미지의 폭이 <?=number_format($amina[upimg_size])?>px 보다 클 경우 자동으로 리사이즈 되어 업로드 되기 때문에 글등록에 시간이 걸릴 수 있습니다.
		<? } ?>
		<? if($member[mb_id] && $amina[cmt_choice]) { ?>
			<li><?=$amina[cmt_choice_txt]?> 포인트로 건 포인트는 글등록시 선차감되며, 글등록후 수정 또는 복구되지 않습니다.
		<? } ?>
	</ul>
</td>
</tr>
<? if($member[mb_id] && $amina[cmt_choice]) { if(!$wr_icon[choice_point]) $wr_icon[choice_point] = 0; ?>
	<tr>
		<td class=td_head><?=$amina[cmt_choice_txt]?>포인트</td>
	    <td><input class='ed' size=10 name=choice_point id="choice_point" numeric itemname="<?=$amina[cmt_choice_txt]?>포인트" value="<?=$wr_icon[choice_point]?>" <?=$w=="u"?"readonly style='background:pink;' title='수정불가'":"";?>>
		포인트 걸기 (쵀대 <b><?=number_format($member[mb_point])?></b>점 <? if($amina[cmt_choice_return] > 0) { ?> / <?=$amina[cmt_choice_txt]?>시 <b><?=$amina[cmt_choice_return]?></b>% 복구<? } ?>)
		</td></tr>
<? } ?>

<? if ($is_link) { ?>
		<tr> 
		<td class=td_head>관련링크</td>
		<td>
			<table border=0 cellpadding=0 cellspacing=0 width=100% class="write_tbl2">
			<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
				<tr><td>
					<input type='text' class='ed' size=50 name='wr_link<?=$i?>' itemname='링크 #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'>
				</td></tr>
			<? } ?>
			</table>
		</td> 
		</tr>
<? } ?>
<? if($amina[video]) { ?>
<tr> 
<td class=td_head>동 &nbsp;영&nbsp; 상</td>
<td>
	<table border=0 cellpadding=0 cellspacing=0 width=100% class="write_tbl2">
	<tr><td class=small style="color:#767676;">
		유튜브,비메오,다음TV,네이트TV,판도라TV,TED 동영상 SNS 등 공유주소 - 미입력시 640 x 360 재생<br>
		<input class='ed' size=50 name="movie_url" itemname="유튜브 공유 URL" value="<?=$movie[movie_url]?>">
		-
		W <input class='ed' maxlength=4 size=4 name="movie_w" itemname="동영상 Width" value="<?=$movie[movie_w]?>">
		&nbsp;x&nbsp;
		H <input class='ed' maxlength=4 size=4 name="movie_h" itemname="동영상 Height" value="<?=$movie[movie_h]?>">
		<input type="checkbox" name="movie_auto" value="1" <? if($movie[movie_auto] == "1") echo "checked"; ?>>자동<br>
		http://youtu.be/EkSOOiMDGiY, http://pann.nate.com/video/221086651, http://vimeo.com/4870899 등
	</td></tr>
	</table>
</td> 
</tr>
<? } ?>
<? if ($is_file) { $upload_max = number_format(($board[bo_upload_size] / 1024),0); ?>
<tr>
    <td class=td_head>
		파일첨부
		<div class=space style="height:6px;">&nbsp;</div>
        <span onclick="add_file();" style="cursor:pointer;"><img src="<?=$btn_skin_path?>/btn_file_add.gif"></span> 
        <span onclick="del_file();" style="cursor:pointer;"><img src="<?=$btn_skin_path?>/btn_file_minus.gif"></span>
    </td>
    <td>
		<span class=small style="color:#767676;">
			첨부사진 : 
			<input type="checkbox" name="img_space" value="1" <? if($post[img_space] == "1") echo "checked"; ?>>간격없음
			<input type="radio" name="img_location" value="top" <? if($post[img_location] != "bottom" && $post[img_location] != "insert") echo "checked"; ?>>상단
			<input type="radio" name="img_location" value="bottom" <? if($post[img_location] == "bottom") echo "checked"; ?>>하단
			<input type="radio" name="img_location" value="hide" <? if($post[img_location] == "hide") echo "checked"; ?>>숨김
			<input type="radio" name="img_location" value="insert" <? if($post[img_location] == "insert") echo "checked"; ?>>삽입 : {이미지:0}, {이미지:1} 형태로 본문에 입력
		</span><br>	
		<table id="variableFiles" cellpadding=0 cellspacing=0 class="write_tbl2"></table><?// print_r2($file); ?>
        <script type="text/javascript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("이 게시판은 "+upload_count+"개 까지만 파일 업로드가 가능합니다.");
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

            objCell.innerHTML = "<input type='file' class='ed' name='bf_file[]' title='파일 용량 <?=$upload_max_filesize?> 이하만 업로드 가능'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='ed' size=50 name='bf_content[]' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.'>";
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
<? } ?>

<? if ($is_trackback) { ?>
<tr>
    <td class=td_head>트랙백주소</td>
    <td><input class='ed' size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">핑 보냄<? } ?></td>
</tr>
<? } ?>

<? if ($is_guest) { ?>
<tr>
    <td class=td_head><img id='kcaptcha_image' /></td>
    <td><input class='ed' type=input size=10 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;왼쪽의 글자를 입력하세요.</td>
</tr>
<? } ?>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" align="center" valign="top" style="padding-top:30px;">
        <input type=image id="btn_submit" src="<?=$btn_skin_path?>/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>&sca=<?=urlencode($sca)?><?=$frame_opt?><?=$search_opt?>"><img id="btn_list" src="<?=$btn_skin_path?>/btn_list.gif" border=0></a></td>
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
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '공지';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '공지';
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
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
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
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('내용을 입력하십시오.'); 
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
        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
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
