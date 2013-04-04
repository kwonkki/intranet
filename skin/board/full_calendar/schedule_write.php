<?
$wr_id = $id;
include_once("./_common.php");
set_session('ss_bo_table', $_REQUEST['bo_table']);
set_session('ss_wr_id', $_REQUEST['wr_id']);

$g4[path] = str_replace("../../","", $g4[path]);
$g4[bbs_path] = str_replace("../../","", $g4[bbs_path]);
$board_skin_path = str_replace("../../","", $board_skin_path);

$notice_array = explode("\n", trim($board[bo_notice]));

/*************************
wr_1 시작일
wr_2 종료일
wr_3 분류(중요도)
wr_4 시작시간
wr_5 종료시간
wr_6 department 
wr_7 
wr_8 일정반복
wr_9 
wr_10 일정완료체크
*************************/

$dept_param = "";

// 수정, 삭제 링크
$update_href = $delete_href = "";
// 로그인중이고 자신의 글이라면 또는 관리자라면 패스워드를 묻지 않고 바로 수정, 삭제 가능
if ($is_admin) 
{
    //$update_href = "./write.php?w=u&bo_table=$bo_table&wr_id=$wr_id";
	$delete_href = "javascript:del('$g4[bbs_path]/delete.php?bo_table=$bo_table&mode=$mode&wr_id=$wr_id&year=$year&month=$month&day=$day&token=$token');";
}else if($member[mb_id] && ($member[mb_id] == $write[mb_id])){
	//$update_href = "./write.php?w=u&bo_table=$bo_table&wr_id=$wr_id";
    $delete_href = "javascript:del('$g4[bbs_path]/delete.php?bo_table=$bo_table&mode=$mode&wr_id=$wr_id&year=$year&month=$month&day=$day');";
}

if ($w == "") 
{
	if (isset($wr_id))
		alert("error -1  \$wr_id .", "$g4[bbs_path]/board.php?bo_table=$bo_table");
    if ($member[mb_level] < $board[bo_write_level]) 
	{ 
        if ($member[mb_id]) 
			alert("no permission write.");
        else 
            alert("no permission write, please login first.", "./login.php?$qstr&url=".urlencode("$_SERVER[PHP_SELF]?bo_table=$bo_table"));
    }
    if ($member[mb_point] + $board[bo_write_point] < 0 && !$is_admin)
        alert("no point");

    $title_msg = "write";
	$write[wr_1] = $wr_1;
	$write[wr_2] = $wr_2;
	
	
	if($is_admin){
		$dept_param = "admin";
	}else{
		$dept_param = $member['mb_1'];
	}
	
	
} 
else if ($w == "u") 
{
    // 김선용 1.00 : 글쓰기 권한과 수정은 별도로 처리되어야 함
    //if ($member[mb_level] < $board[bo_write_level]) {
    if($member['mb_id'] && ($write['mb_id'] == $member['mb_id']))
	{
        
    } elseif($member[mb_level] < $board[bo_write_level]) { 
        if($member[mb_id])
		{
            alert("no permission to write.");
        }else{ 
            alert("no permission to write, please login first", "./login.php?$qstr&url=".urlencode("$_SERVER[PHP_SELF]?bo_table=$bo_table"));
		}
	}
	
	
	// If project is not yours, Go to the view.
	if( ($write['mb_id'] != $member['mb_id']) && !$is_admin){
		$link01 = "./board.php?bo_table=$bo_table&wr_id=$wr_id";
		goto_url($link01);
	}

	$len = strlen($write[wr_reply]);
    if($len < 0) $len = 0; 
    $reply = substr($write[wr_reply], 0, $len);

    // 원글만 구한다.
    $sql = " select count(*) as cnt from $write_table where wr_reply like '$reply%' and wr_id <> '$write[wr_id]' and wr_num = '$write[wr_num]' and wr_is_comment = 0 ";
    $row = sql_fetch($sql);
    if($row[cnt] && !$is_admin)
        alert("this one has reply, you cant update this one.");

    // 코멘트 달린 원글의 수정 여부
    /*
    $sql = " select count(*) as cnt from $write_table where wr_parent = '$wr_id' and mb_id <> '$member[mb_id]' and wr_is_comment = 1 ";
    $row = sql_fetch($sql);
    
    if($row[cnt] >= $board[bo_count_modify] && !$is_admin)
    	alert("If Project has the comment, cant update this");
    */


        
        
    //alert("This is not your project. You are not allowed to change this");
        
        
    $title_msg = "write update";
    
    
    if($is_admin){
		$dept_param = $write['wr_6'];
	}else{
		$dept_param = $write['wr_6'];
	}
} 

// 그룹접근 가능
if ($group[gr_use_access]) 
{
	if(!$member[mb_id]) 
        alert("no permission. -2 ", "login.php?$qstr&url=".urlencode("$_SERVER[PHP_SELF]?bo_table=$bo_table"));

    if($is_admin == 'super' || $group[gr_admin] == $member[mb_id] || $board[bo_admin] == $member[mb_id]) 
        ; // 통과 
    else {
        // 그룹접근
        $sql = " select gr_id from $g4[group_member_table] where gr_id = '$board[gr_id]' and mb_id = '$member[mb_id]' ";
        $row = sql_fetch($sql);
        if (!$row[gr_id])
            alert("no permission -3.");
    }
}

if (($w == "u" || $w == "r") && !$write[wr_id]) 
    alert("not existing...", $g4[path]);

$is_notice = false;
if ($is_admin && $w != "r") 
{
    $is_notice = true;

    if ($w == "u") 
    {
        // 답변 수정시 공지 체크 없음
        if ($write[wr_reply])
            $is_notice = false;
        else 
        {
            $notice_checked = "";
            //if (preg_match("/^".$wr_id."/m", trim($board[bo_notice]))) 
            //if (preg_match("/[^0-9]{0,1}{$wr_id}[\r]{0,1}/",$board[bo_notice]))
            if (in_array((int)$wr_id, $notice_array))
                $notice_checked = "checked";
        }
    }
}

$is_html = false;
if ($member[mb_level] >= $board[bo_html_level]) 
    $is_html = true;

$is_secret = $board[bo_use_secret];
// DHTML 에디터 사용 선택 가능하게 수정 : 061021
//$is_dhtml_editor = $board[bo_use_dhtml_editor];
// 090713
if ($board[bo_use_dhtml_editor] && $member[mb_level] >= $board[bo_html_level]) 
    $is_dhtml_editor = true; 
else 
    $is_dhtml_editor = false; 

$is_mail = false;

if ($config[cf_email_use] && $board[bo_use_email])
    $is_mail = true;

$recv_email_checked = "";

if ($w == "" || strstr($write[wr_option], "mail")) 
    $recv_email_checked = "checked";

$is_name = false;
$is_password = false;
$is_email = false;
if (!$member[mb_id] || ($is_admin && $w == 'u' && $member[mb_id] != $write[mb_id])) 
{
    $is_name = true;
    $is_password = true;
    $is_email = true;
    $is_homepage = true;
}

$is_category = false;
if ($board[bo_use_category]) 
{
    $ca_name = $write[ca_name];
    $category_option = get_category_option($bo_table);
    $is_category = true;
}

$is_link = false;
if ($member[mb_level] >= $board[bo_link_level]) 
    $is_link = true;

$is_file = false;
if ($member[mb_level] >= $board[bo_upload_level]) 
    $is_file = true;

$is_file_content = false;
if ($board[bo_use_file_content])
    $is_file_content = true;

// 트랙백
$is_trackback = false;
if ($board[bo_use_trackback] && $member[mb_level] >= $board[bo_trackback_level]) 
    $is_trackback = true;

if ($w == "" || $w == "r") 
{
    if ($member[mb_id]) 
	{
        $name = get_text(cut_str($write[wr_name],20));
        $email = $member[mb_email];
        $homepage = get_text($member[mb_homepage]);
    }
}

if ($w == "") 
    $password_required = "required";
else if ($w == "u") 
{
    $password_required = "";

   /**
	if (!$is_admin) {
        if (!($member[mb_id] && $member[mb_id] == $write[mb_id])) 
            if (sql_password($wr_password) != $write[wr_password]) 
                alert("패스워드가 틀립니다.");
    }
	**/
    $name = get_text(cut_str($write[wr_name],20));
    $email = $write[wr_email];
    $homepage = get_text($write[wr_homepage]);

    for($i=1; $i<=$g4[link_count]; $i++)
	{
        $link[$i] = $write["wr_link".$i];
	}

    $trackback = $write[wr_trackback];

    if(strstr($write[wr_option], "html1")) 
	{
        $html_checked = "checked";
        $html_value = "html1";
    }elseif(strstr($write[wr_option], "html2")) {
        $html_checked = "checked";
        $html_value = "html2";
    }else{
        $html_value = "";
	}
    if(strstr($write[wr_option], "secret"))
        $secret_checked = "checked";

    $file = get_file($bo_table, $wr_id);
	}

$subject = preg_replace("/\"/", "&#034;", get_text(cut_str($write[wr_subject], 255), 0));

if ($w == "")
{
    $content = $board[bo_insert_content];
    
}elseif($w == "r") {
    
	//if (!$write[wr_html]) {
    if (!strstr($write[wr_option], "html")) 
	{
        $content = "\n\n\n>"
                 //. "\n> $write[wr_datetime], \"$write[wr_name]\"님이 쓰신 글입니다. ↓"
                 . "\n>"
                 . "\n> " . preg_replace("/\n/", "\n> ", get_text($write[wr_content], 0)) 
                 . "\n>"
                 . "\n";
    }
}else{ 
    $content = get_text($write[wr_content], 0);
}

$upload_max_filesize = number_format($board[bo_upload_size]) . " 바이트";

$width = $board[bo_table_width];
if ($width <= 100) 
    $width .= '%';

// 글자수 제한 설정값
if ($is_admin)
{
    $write_min = $write_max = 0;
}else{
    $write_min = (int)$board[bo_write_min];
    $write_max = (int)$board[bo_write_max];
}

$file_script = "";
$file_length = -1;
// 수정의 경우 파일업로드 필드가 가변적으로 늘어나야 하고 삭제 표시도 해주어야 합니다.
if ($w == "u") 
{
    for ($i=0; $i<$file[count]; $i++) 
    {
        $row = sql_fetch(" select bf_file, bf_content from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$i' ");
        if($row[bf_file])
        {
            $file_script .= "add_file(\"<input type='checkbox' name='bf_file_del[$i]' value='1'><a href='{$file[$i][href]}'>{$file[$i][source]}({$file[$i][size]})</a> 삭제";
            if($is_file_content)
			{
                //$file_script .= "<br><input type='text' class=ed size=50 name='bf_content[$i]' value='{$row[bf_content]}' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.'>";
                // 첨부파일설명에서 ' 또는 " 입력되면 오류나는 부분 수정
                $file_script .= "<br><input type='text' class=ed size=50 name='bf_content[$i]' value='".addslashes(get_text($row[bf_content]))."' title=''>";
				$file_script .= "\");\n";
			}
		}else{
            $file_script .= "add_file('');\n";
		}
	}
    $file_length = $file[count] - 1;
}

if ($file_length < 0) 
{
    $file_script .= "add_file('');\n";
    $file_length = 0;
}

if (!$member[mb_id]) 
{
    echo "<script language='javascript' src='$g4[path]/js/md5.js'></script>\n";

	// 필터
	echo "<script language='javascript'> var g4_cf_filter = '$config[cf_filter]'; </script>\n";
	echo "<script language='javascript' src='$g4[path]/js/filter.js'></script>\n";
}
?>

<div id="WriteForm"> 
	<div style='position:absolute; right:10px; top:10px; text-align:right; width:30px;'><img src="<?=$board_skin_path?>/img/btn_close.gif" alt="닫기" style="cursor:pointer;" id="btn_list" /></a></div>
	<form name="fwrite" id="fwrite" method="post" enctype="multipart/form-data" style="margin:0px;">
	<input type="hidden" name="w"        value="<?=$w?>">
	<input type="hidden" name="bo_table" value="<?=$bo_table?>">
	<input type="hidden" name="wr_id"    value="<?=$wr_id?>">
	<input type="hidden" name="sca"      value="<?=$sca?>">
	<input type="hidden" name="sfl"      value="<?=$sfl?>">
	<input type="hidden" name="stx"      value="<?=$stx?>">
	<input type="hidden" name="spt"      value="<?=$spt?>">
	<input type="hidden" name="sst"      value="<?=$sst?>">
	<input type="hidden" name="sod"      value="<?=$sod?>">
	<input type="hidden" name="page"     value="<?=$page?>">
	<input type="hidden" name="wr_6"     value="<?=$dept_param?>">

	<input type="hidden" id="PHPID" name="PHPID"     value="<?=session_id()?>">
	<div class="wrbox">
		<? if ($is_category) { ?>
		<p>
			<select name=ca_name required itemname="카테고리"><option value="">카테고리<?=$category_option?></select>
		</p>
		<? }?>

		<p>
			<B style="margin-right:25px">category</B>
			<input type="radio" name="wr_3" value="001"  <? if($write[wr_3] == "001" || !$write[wr_3]) echo " checked=checked"; ?>>normal
			<input type="radio" name="wr_3" value="002"  <? if($write[wr_3] == "002") echo " checked=checked"; ?>>important
			<input type="radio" name="wr_3" value="003"  <? if($write[wr_3] == "003") echo " checked=checked"; ?>>very important
			<input type="radio" name="wr_3" value="004"  <? if($write[wr_3] == "004") echo " checked=checked"; ?>>Long project
			<input type="radio" name="wr_3" value="000"  <? if($write[wr_3] == "000") echo " checked=checked"; ?>>personnel
		</p>
    
<!--
	<p>
	   <B>옵션</B>
		<? 
		$option = "";
		$option_hidden = "";
		if ($is_notice || $is_html || $is_secret || $is_mail) { 
			$option = "";
/*
			if ($is_notice) { 
				$option .= "<input type=checkbox name=notice value='1' $notice_checked><label for=\"notice\" class=\"title\">일정알림";
			}

			if ($is_html) {
				if($is_dhtml_editor) {
					$option_hidden .= "<input type=hidden value='html1' name='html'>";
				} else {
					$option .= "<input onclick='html_auto_br(this);' type=checkbox value='$html_value' name='html' $html_checked><label for=\"html\" class=\"title\">html";
				}
			}

			if ($is_secret) {
				if ($is_admin || $is_secret==1) {
					$option .= "<input type=checkbox value='secret' name='secret' $secret_checked><label for=\"secret\" class=\"title\">개인일정";
				} else {
					$option_hidden .= "<input type=hidden value='secret' name='secret'>";
				}
			}
*/			
			if ($is_mail) {
				$option .= "<input type=checkbox value='mail' name='mail' $recv_email_checked><label for=\"mail\" class=\"title\">답변메일";
			}
		}

		echo $option_hidden;
		if ($option) { echo "$option"; }
		?>
      </p>	
-->
		<p style="padding-top:3px">
			<B style="margin-right:30px">progress</B>
			<select name="wr_10">
			<option value=""> 0%
			<option value="10" <?if($write[wr_10] == "10") echo " selected";?>> 10%
			<option value="20" <?if($write[wr_10] == "20") echo " selected";?>> 20%
			<option value="30" <?if($write[wr_10] == "30") echo " selected";?>> 30%
			<option value="40" <?if($write[wr_10] == "40") echo " selected";?>> 40%
			<option value="50" <?if($write[wr_10] == "50") echo " selected";?>> 50%
			<option value="60" <?if($write[wr_10] == "60") echo " selected";?>> 60%
			<option value="70" <?if($write[wr_10] == "70") echo " selected";?>> 70%
			<option value="80" <?if($write[wr_10] == "80") echo " selected";?>> 80%
			<option value="90" <?if($write[wr_10] == "90") echo " selected";?>> 90%
			<option value="100" <?if($write[wr_10] == "100") echo " selected";?>> 100%
			</select>&nbsp;&nbsp;
		
			<B>repeat</B>		
			<select name="wr_8">
			<option value=""      <?if(!$write[wr_8])           echo " selected";?>> n/a
			<option value="year"  <?if($write[wr_8] == "year")  echo " selected";?>> every year
			<option value="month" <?if($write[wr_8] == "month") echo " selected";?>> every month
			<option value="week"  <?if($write[wr_8] == "week")  echo " selected";?>> every week
			</select>
		</p>   
		<p style="padding:3px 0">
			<B style="margin-right:7px">Project Name*</B>&nbsp; <input type="text" name="wr_subject" id="wr_subject" itemname="제목" required value="<?=$subject?>" class="ed" style="width:400px;">
		</p>
		<p style="padding;3px 0">
	 		<table cellpadding="0" cellspacing="0" border="0" width='100%' style='display : inline'>
				<tr>
					<td width="">
						<B style="margin-right:1px">TimeLine</B>&nbsp;   
						<input type="text" name="wr_1" id="date_wr_1" itemname="시작일" required value="<?=$write[wr_1]?>" class="ed" style="width:70px" onclick="Calendar_Create('date_wr_1');" readonly/>	
						<select name="wr_4">
						<option value="">Start Time</option>
						<?
						$hour = 0;
						$min = ":00";
						for($i = 0; $i < 48; $i++)
						{
							if(floor($i/2) < 10){	$hour = "0".floor($i/2); } else { $hour = floor($i/2);}
							if($i%2 != 0){ $min = ':30'; }else{ $min = ":00"; }
							$time = $hour.$min;
						?>
						<option value="<?=$time?>"<?if($time == $write[wr_4]) echo " selected";?>><?=$time?></option>
						<?
						} 
						?>
						</select> ~ 
						<input type="text" name="wr_2" id="date_wr_2" itemname="종료일" required value="<?=$write[wr_2]?>" class="ed" style="width:70px" onclick="Calendar_Create('date_wr_2');" readonly/>
						<select name="wr_5">
						<option value="">End Time</option>
						<?
						$hour = 0;
						$min = ":00";
						for($i = 0; $i < 48; $i++)
						{
							if(floor($i/2) < 10){	$hour = "0".floor($i/2); } else { $hour = floor($i/2);}
							if($i%2 != 0){ $min = ':30'; }else{ $min = ":00"; 
						}
							$time = $hour.$min;
						?>
						<option value="<?=$time?>"<?if($time == $write[wr_5]) echo " selected";?>><?=$time?></option>
						<?
						} 
						?>
						</select>
					</td>
					<td width="60px" style="text-align:right;">
						<span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);" class="btn_icon">－</span>
						<span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);" class="btn_icon">＋</span>
					</td>
				</tr>
			</table>
		</p>

		<p style="padding:3px 0">
			<textarea name="wr_content" id="wr_content" class="textarea" rows="5" style="width:100%;" <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>  itemname="내용"><?=$content?></textarea><? if ($write_min || $write_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
		</p>	
			<div style="clear:both; padding-top:5px;">
				<div style="float:left; width:20%">&nbsp;</div>
				<div style="float:left; width:60%; text-align:center;">
					<span class="btn m"><button type="submit" id="btn_submit" alt="저장" accesskey='s' onclick="_onSubmit();">&nbsp;save&nbsp;</button></span>
					<? if ($w == "u") { ?>
						<? if ($delete_href) { ?><input type="button" class="btn m" style="-moz-opacity:0.5;opacity:0.5;filter:alpha(opacity=50);" value='&nbsp; delete &nbsp;' onclick="<?=$delete_href?>"><? } ?>  
					<? } ?>
				</div>
				<div style="float:right; width:20%; text-align:right;">
					<? if ($w == "u") { ?>
					<a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&wr_id=<?=$wr_id?>">Detail</a>
					<? }else{ ?>
					<a href="<?=$g4[bbs_path]?>/write.php?bo_table=<?=$bo_table?>&mode=<?=$mode?>&write[wr_1]=<?=$write[wr_1]?>&write[wr_2]=<?=$write[wr_2]?>"><font color="blue"><b>Detail Input</b></font></a>
					<? } ?>
				</div>
			</div>
	</div>
	</form>	
</div>




<script type="text/javascript"> var md5_norobot_key = ''; </script>
<script language="javascript">

<?
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
        result = confirm("Do you want to use the new liner");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
$(function() {
	$("#fade, #btn_list").click(function(){ $("#light, #fade, #Calendar_Div").remove(); });

	var options = { 
		beforeSubmit:  fwrite_submit,
		success:       showResponse,
		url: "./write_update.php",
		type: "post"
	}; 
 
	// bind to the form's submit event 
	$('#fwrite').submit(function() { 
		$(this).ajaxSubmit(options); 
		return false; 
	}); 
});	

function fwrite_submit(formData, jqForm, options) 
{
	var f = jqForm[0];
    var s = "";

	if(!f.wr_subject.value) 
	{
        alert("please type this!");
		f.wr_subject.focus();
        return false;
    }
	/*
		if(f.wr_1.value){
			for(i=0; i < formData.length; i++){
				if(formData[i].name == "wr_9"){
					formData[i].value = "";
				}
			}
		}else{		
			for(i=0; i < formData.length; i++){
				if(formData[i].name == "wr_9"){
					formData[i].value = "1";
				}
			}
		}
	*/
	if(!'<?=$is_member?>') { alert("you need to log in first"); }
	if('<?=$w?>' == 'u') 
	{ 
		if(!'<?=$is_admin?>') 
		{
			if(!('<?=$member[mb_id]?>' && '<?=$member[mb_id]?>' == '<?=$write[mb_id]?>')) 
			alert("you can change yours.");
		}
	}
}

function showResponse(responseText, statusText, xhr, $form)  { 
	alert('Your Project Schedule saved.');
	$("#light, #fade").remove();
	$('#calendar').fullCalendar( 'refetchEvents' );
} 
</script>
<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript"> window.onload=function() { drawFont(); } </script>


