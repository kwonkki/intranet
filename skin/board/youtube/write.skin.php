<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" CONTENT="YouTube, YouTube API, quvic, YouTube API JSON-C, YouTube API JavaScript, QUVIC">
  <meta name="Subject" content="YouTube API"> 
  <meta name="description" content="QUVIC : YouTube Video Search Engine using YouTube API"> 
  <meta name="author" content="YouTube API"> 
  <meta name="writer" content="TYZEN.NET"> 
  <meta name="copyright" content="&copy;QUVIC"> 
<link rel="shortcut icon" href="/favicon.ico" />
 </HEAD>
 <BODY>
<script type="text/javascript" src="<?=$board_skin_path?>/js/swfobject.js"></script> 
<script type="text/javascript">
/*!
 * QUVIC YouTube Video Browser JavaScript Library v1.1
 * http://quvic.com/
 *
 * Copyright 2010, TYZEN
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://tyzen.net
 *
 * Includes TEXTTUBE
 * http://texttube.org
 * Copyright 2010, TEXTTUBE
 * Released under the MIT, BSD, and GPL Licenses.
 *
 * Date: Sun Jul 11 2010
 */


//유튜브 url input 넣기 그누 헌이 
var max=0;
function window.onload() {
    max=document.all.wr_3.value.length;  //초기문자길이지정
}
function AddEmoticon(EMOTICON) {
    var o=document.all.wr_3;
    o.value=o.value.substring(0,max)+EMOTICON;
}

//유튜제목 input 넣기 그누 헌이

var max=0;
function window.onload() {
    max=document.all.wr_subject.value.length;  //초기문자길이지정
}
function AddEmoticon1(EMOTICON) {
    var o=document.all.wr_subject;
    o.value=o.value.substring(0,max)+EMOTICON;
}



var quvic = {};

quvic.MAX_RESULTS_LIST = 10;


quvic.THUMBNAIL_WIDTH = 120;

quvic.THUMBNAIL_HEIGHT = 90;


quvic.PLAYER_WIDESCREEN_WIDTH = 720;

quvic.PLAYER_STANDARD_WIDTH = 540;


quvic.PLAYER_HEIGHT = 435;


quvic.VIDEO_LIST_CSS_CLASS = 'videolist';

quvic.PREVIOUS_PAGE_BUTTON = 'previousPageButton';

quvic.NEXT_PAGE_BUTTON = 'nextPageButton';

quvic.STANDARD_FEED_URL_TOP_RATED = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/KR/top_rated?';

quvic.STANDARD_FEED_URL_MOST_VIEWED = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/KR/most_viewed?';

quvic.STANDARD_FEED_URL_MOST_POPULAR = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/KR/most_popular?';

quvic.STANDARD_FEED_URL_RECENTLY_FEATURED = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/KR/recently_featured?';

quvic.VIDEO_FEED_URL = 
    'http://gdata.youtube.com/feeds/api/videos?';

quvic.QUERY_URL_MAP = {
  'top_rated' : quvic.STANDARD_FEED_URL_TOP_RATED,
 
  'most_viewed' : quvic.STANDARD_FEED_URL_MOST_VIEWED,
 
  'most_popular' : quvic.STANDARD_FEED_URL_MOST_POPULAR,
  
  'recently_featured' : quvic.STANDARD_FEED_URL_RECENTLY_FEATURED,
 
  'search' : quvic.VIDEO_FEED_URL
};

quvic.nextPage = 2;

quvic.previousPage = 0;

quvic.previousSearchTerm = '';

quvic.previousQueryType = 'search';

quvic.jsonFeed_ = null;

quvic.appendScriptTag = function(scriptSrc, scriptId, scriptCallback) {
 
  var oldScriptTag = document.getElementById(scriptId);
  if (oldScriptTag) {
    oldScriptTag.parentNode.removeChild(oldScriptTag);
  }
  var script = document.createElement('script');
  script.setAttribute('src', 
      scriptSrc + '&v=2&alt=jsonc&callback=' + scriptCallback);
  script.setAttribute('id', scriptId);
  script.setAttribute('type', 'text/javascript');
  document.getElementsByTagName('head')[0].appendChild(script);
};

quvic.listVideos = function(queryType, searchTerm, page) {
  quvic.previousSearchTerm = searchTerm; 
  quvic.previousQueryType = queryType; 
  var queryUrl = quvic.QUERY_URL_MAP[queryType];
  if (queryUrl) {
    queryUrl += 'max-results=' + quvic.MAX_RESULTS_LIST +
        '&format=5&start-index=' + (((page - 1) * quvic.MAX_RESULTS_LIST) + 1);
    if (searchTerm != '') {
      queryUrl += '&q=' + encodeURI(searchTerm);
    }
    quvic.appendScriptTag(queryUrl, 
                         'searchResultsVideoListScript', 
                         'quvic.listVideosCallback');
    quvic.updateNavigation(page);
	
  } else {
    alert('Unknown feed type specified');
  }
};

quvic.PresentVideos = function(queryType, searchTerm, page) {
  quvic.previousSearchTerm = searchTerm; 
  quvic.previousQueryType = queryType; 
  var queryUrl = quvic.QUERY_URL_MAP[queryType];
  if (queryUrl) {
    queryUrl += 'max-results=' + quvic.MAX_RESULTS_LIST +
        '&format=5&start-index=' + (((page - 1) * quvic.MAX_RESULTS_LIST) + 1);
    if (searchTerm != '') {
      queryUrl += '&q=' + encodeURI(searchTerm);
    }
    quvic.appendScriptTag(queryUrl, 
                         'searchResultsVideoListScript', 
                         'quvic.listVideosCall');
    quvic.updateNavigation(page);
   }
};

quvic.listVideosCall = function(json) {
  quvic.jsonFeed_ = json.data;
  var div = document.getElementById(quvic.VIDEO_LIST_CSS_CLASS);
  var items = json.data.items || [];


  var html = ['<dl class="videos">'];
  for (var i = 0; i < items.length; i++) {
    var title = json.data.items[i].title;
    var thumbnailUrl = json.data.items[i].thumbnail.sqDefault;
    var videoID = json.data.items[i].id;
    var duration = json.data.items[i].duration;
    var viewCount = json.data.items[i].viewCount;
    var keywords = json.data.items[i].tags;//jeon add





    var tubeUrl  = '/<?=$board_skin_path?>/write_tube.php?vid='+videoID+'&title='+addslashes(title)+'&duration='+duration+'&thumbUrl='+thumbnailUrl+'&viewCount='+viewCount+'&keywords='+keywords;
    
    html.push('<dt>');
    html.push('<span class="video_thumb thumbbox"><a href="javascript:playVideo(\''+videoID+'\',\''+addslashes(title)+'\')">');
	html.push('<img src="',thumbnailUrl,'" width="',quvic.THUMBNAIL_WIDTH,'" height="',quvic.THUMBNAIL_HEIGHT,'" onmouseout="mouseOutImage(this)" onmouseover="mousOverImage(this,\'',videoID,'\',1)"></a>');
	html.push('<span class="duration">',getDurationTime(duration),'</span>');
	html.push('</span><br/>');
	html.push('<a href="javascript:AddEmoticon(\''+videoID+'\');" onfocus=this.blur()>영상등록</a>&nbsp;','');
	html.push('<a href="javascript:AddEmoticon1(\''+addslashes(title)+'\');" onfocus=this.blur()>제목등록</a>', title.substr(0,25), '');
	html.push('</dt>');
	}
    html.push('</dl><br style="clear: left;"/>');


    jQuery(div).fadeTo(500, 1.0);
    document.getElementById(quvic.VIDEO_LIST_CSS_CLASS).innerHTML = html.join('');
  if (items.length > 0) {
    loadVideo(json.data.items[0].id);
  }
};

function loadVideo(videoID) {
  swfobject.embedSWF("http://www.youtube.com/v/" + videoID + "?version=3&enablejsapi=1&playerapiid=ytplayer&fs=1",
  'player', quvic.PLAYER_WIDESCREEN_WIDTH, quvic.PLAYER_HEIGHT, '9.0.0', false, false, {allowScriptAccess: 'always',allowfullscreen: 'true'});
  }

quvic.listVideosCallback = function(json) {
 quvic.jsonFeed_ = json.data;
  var div = document.getElementById(quvic.VIDEO_LIST_CSS_CLASS);
  while (div.childNodes.length >= 1) {
    div.removeChild(div.firstChild);
    jQuery(div).fadeTo(0, '.01');
    }
  var items = json.data.items || [];
  var html = ['<dl class="videos">'];
  for (var i = 0; i < items.length; i++) {
    var title = json.data.items[i].title;
    var thumbnailUrl = json.data.items[i].thumbnail.sqDefault;
    var videoID = json.data.items[i].id;
    var duration = json.data.items[i].duration;
    var viewCount = json.data.items[i].viewCount;
    var keywords = json.data.items[i].tags;//jeon add

    var tubeUrl  = '/<?=$board_skin_path?>/write_tube.php?vid='+videoID+'&title='+addslashes(title)+'&duration='+duration+'&thumbUrl='+thumbnailUrl+'&viewCount='+viewCount+'&keywords='+keywords;



    html.push('<dt><span class="video_thumb thumbbox"><a href="javascript:playVideo(\''+videoID+'\',\''+addslashes(title)+'\')">');
	html.push('<img src="',thumbnailUrl,'" width="',quvic.THUMBNAIL_WIDTH,'" height="',quvic.THUMBNAIL_HEIGHT,'" onmouseout="mouseOutImage(this)" onmouseover="mousOverImage(this,\'',videoID,'\',1)"></a>');
	html.push('<span class="duration">',getDurationTime(duration),'</span>');
	html.push('</span><br/>');
	html.push('<a href="javascript:AddEmoticon(\''+videoID+'\');" onfocus=this.blur()>등록하기</a>&nbsp;', '');
	html.push('<a href="javascript:AddEmoticon1(\''+addslashes(title)+'\');" onfocus=this.blur()>제목등록</a>', title.substr(0,25), '');
	html.push('</dt>');
	
	}
    html.push('</dl><br style="clear: left;"/>');


    jQuery(div).fadeTo(500, 1.0);
    document.getElementById(quvic.VIDEO_LIST_CSS_CLASS).innerHTML = html.join('');
};
 
quvic.updateNavigation = function(page) {
  quvic.nextPage = page + 1;
  quvic.previousPage = page - 1;
  document.getElementById(quvic.NEXT_PAGE_BUTTON).style.display = 'inline';
  document.getElementById(quvic.PREVIOUS_PAGE_BUTTON).style.display = 'inline';
  if (quvic.previousPage < 1) {
    document.getElementById(quvic.PREVIOUS_PAGE_BUTTON).disabled = true;
  } else {
    document.getElementById(quvic.PREVIOUS_PAGE_BUTTON).disabled = false;
  }
  document.getElementById(quvic.NEXT_PAGE_BUTTON).disabled = false;
};

function onPlayerError(errorCode) {
        alert("An error occured of type:" + errorCode);
      }
 

function onYouTubePlayerReady(playerId) {
        ytplayer = document.getElementById("player");
        ytplayer.addEventListener("onError", "onPlayerError");
      }


function playVideo(videoID,title){
     if(document.title)
		document.title = title;
    
	ytplayer.loadVideoById(videoID);
}

function HDPlayer() {
        resizePlayer(quvic.PLAYER_WIDESCREEN_WIDTH, quvic.PLAYER_HEIGHT);
      }

function HQPlayer() {
        resizePlayer(quvic.PLAYER_STANDARD_WIDTH, quvic.PLAYER_HEIGHT);
      }

function resizePlayer(width, height) {
        var playerObj = document.getElementById("player");
        playerObj.height = height;
        playerObj.width = width;
      }

function addslashes(str) {
	str=str.replace(/\'/g,'\\\'');
	str=str.replace(/\"/g,'');
	return str;
}

function stripslashes(str) {
	str=str.replace(/\\'/g,'\'');
	return str;
}

var imname;
var timer;
function mousOverImage(name,id,nr){
	if(name)
		imname = name;
	imname.src = "http://img.youtube.com/vi/"+id+"/"+nr+".jpg";
	imname.style.border = 	'3px solid silver';
	nr++;
	if(nr > 3)
		nr = 1;
	timer =  setTimeout("mousOverImage(false,'"+id+"',"+nr+");",1000);
}
function mouseOutImage(name){
	if(name)
		imname = name;
	imname.style.border = 	'3px solid #fff';
	if(timer)
		clearTimeout(timer);
}

function getDurationTime(sec)
{
	var sec_div = ''+((sec%60) | 0);
	if(sec_div.length == 1)
		sec_div = '0'+sec_div;
	return ((sec/60) | 0)+':'+sec_div;
}
</script>

<link href="<?=$board_skin_path?>/css/quvic.css" type="text/css" rel="stylesheet"/>

<center>
<div style="width: 720px;">  
<div id="playerContainer" style="width: 720px;"> 
<object id="player"></object>
</div> 
<br> 
<div id="videoSize"> 
  <input type="button" id="Widescreen" value="Widescreen" onclick="javascript:HDPlayer()" disabled="true"></input> 
  <input type="button" id="Standard" value="Standard" onclick="javascript:HQPlayer()"></input> 
</div><br>

<br>
<div align="center">
    <a href="#" onclick="quvic.listVideos('recently_featured','',1); return false;"><b>Recently Featured</b></a> |
	<a href="#" onclick="quvic.listVideos('top_rated','',1); return false;"><b>Top Rated</b></a> |
    <a href="#" onclick="quvic.listVideos('most_viewed','',1); return false;"><b>Most Viewed</b></a> |
    <a href="#" onclick="quvic.listVideos('most_popular','',1); return false;"><b>Most Popular</b></a>
	</div>
<br><br>

 <div id="searchResultsNavigation" align="right"><LABEL id="videosinfo" align="right"></LABEL> <form id="navigationForm"><input type="button" id="previousPageButton" onclick="quvic.listVideos(quvic.previousQueryType, quvic.previousSearchTerm, quvic.previousPage);" value="<< prev" style="display: none;"></input><input type="button" id="nextPageButton" onclick="quvic.listVideos(quvic.previousQueryType, quvic.previousSearchTerm, quvic.nextPage);" value="next >>" style="display: none;"></input></form></div>

 
<div id="videolist"> 
<SCRIPT language=JavaScript type=text/javascript> 
			<!--
quvic.PresentVideos('recently_featured','',1);
//--> 
		</SCRIPT> 

</div> 
<div id="searchForm">
 <form id="searchForm" onsubmit="quvic.listVideos('search', this.searchTerm.value, 1); return false;"> 
               <input name="searchTerm" type="text" value="" style="WIDTH: 280px;"> 
        <input type="submit" value="Search"> 
      </form>
</div>
<div class="clear"></div>
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
<script type="text/javascript" src="<?=$board_skin_path?>/js/jscolor.js"></script>

<script language="Javascript">
    function chk(){
    var obj = document.getElementById("ctg_1");
    obj.style.display = this.checked?'block':'none';
    }
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
<div style="font-weight:bold; font-size:14px; margin:7px 0 0 10px;">:: <?=$title_msg?> ::</div>
</div>
<div style="height:3px; background:url(<?=$board_skin_path?>/img/title_shadow.gif) repeat-x; line-height:1px; font-size:1px;"></div>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<colgroup width=90>
<colgroup width=''>
<tr><td colspan="2" style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x; height:3px;"></td></tr>
<? if ($is_name) { ?>
<tr>
    <td class=write_head>이 름</td>
    <td><input class='ed' maxlength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr>
    <td class=write_head>패스워드</td>
    <td><input class='ed' type=password maxlength=20 size=15 name=wr_password itemname="패스워드" <?=$password_required?>></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr>
    <td class=write_head>이메일</td>
    <td><input class='ed' maxlength=100 size=50 name=wr_email email itemname="이메일" value="<?=$email?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_homepage) { ?>
<tr>
    <td class=write_head>홈페이지</td>
    <td><input class='ed' size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>"></td></tr>
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
<?
if ($write['wr_1']=='') $write['wr_1']='470';
if ($write['wr_2']=='') $write['wr_2']='320';
if ($write['wr_4']=='') $write['wr_4']='ffffff';
if ($write['wr_5']=='') $write['wr_5']='000000';
if ($write['wr_6']=='') $write['wr_6']='000000';
if ($write['wr_7']=='') $write['wr_7']='000000';
?>
<tr>
    <td class=write_head>옵 션</td>
    <td><?=$option?><input type=checkbox name="num_chk" onClick="chk.call(this);" class="inputnone" />번역</td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_category) { ?>
<tr>
    <td class=write_head>분 류</td>
    <td><select name=ca_name required itemname="분류"><option value="">선택하세요<?=$category_option?></select></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr>
    <td class=write_head>제 목</td>
    <td><input class='ed' style="width:100%;" name=wr_subject id="wr_subject" itemname="제목" required value="<?=$subject?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>동영상 크기</td>
    <td>width<input class='ed' maxlength=20 size=10 name=wr_1 itemname="width" value="<?=$write[wr_1]?>">height<input class='ed' maxlength=20 size=10 name=wr_2 itemname="height" value="<?=$write[wr_2]?>">
</tr><tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
 <tr>
    <td class=write_head>player 색상</td>
    <td>backcolor<input class='color' maxlength=20 size=10 name=wr_4 itemname="width" value="<?=$write[wr_4]?>">frontcolor<input class='color' maxlength=20 size=10 name=wr_5 itemname="height" value="<?=$write[wr_5]?>">lightcolor<input class='color' maxlength=20 size=10 name=wr_6 itemname="height" value="<?=$write[wr_6]?>">screencolor<input class='color' maxlength=20 size=10 name=wr_7 itemname="height" value="<?=$write[wr_7]?>">
</tr><tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
 <tr>
    <td class=write_head>유튜브 URL</td>
    <td><input class='ed' maxlength=500 size=100 name=wr_3 itemname="youtube" value="<?=$write[wr_3]?>">
</tr><tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<tr>
    <td class=write_head>FLV URL</td>
    <td><input class='ed' maxlength=500 size=100 name=wr_8 itemname="youtube" value="<?=$write[wr_8]?>">
</tr><tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td class="write_head">스킨 선택</td>
	<td><div>
<? 
if($write[wr_9] != 'simple') {
	echo "<img src='$board_skin_path/img/simple.png' width=50 >&nbsp;<input type='radio' id=r3 name='wr_10' value='simple' checked>simple Skin&nbsp;";
	echo "<img src='$board_skin_path/img/fs40.png'  width=50 >&nbsp;<input type='radio' id=r4 name='wr_10' value='fs40'>fs40 Skin&nbsp;";
	echo "<img src='$board_skin_path/img/grungtape.png'  width=50 >&nbsp;<input type='radio' id=r5 name='wr_10' value='grungetape'>grungetape Skin&nbsp;";
} 
?>
 </div>
	</td>
</tr><tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<!-- 번역만들기 -->
<tr><td align="center" write_head' style='padding:5 0 5 10;' colspan='2'>
<div id="ctg_1" style="display:none;">
<textarea id="from" style='width:100%; word-break:break-all;'  rows=10 ></textarea>
 

<a href="#" id="translate">↓ 한글로 번역</a>
<div>
 <script type="text/javascript" src="<?=$g4[path]?>/js/jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="<?=$board_skin_path?>/js/ko.js"></script>
<!-- 번역만들기 끝-->

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
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>글자<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>

<? if ($is_link) { ?>
<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
<tr>
    <td class=write_head>링크 #<?=$i?></td>
    <td><input type='text' class='ed' size=50 name='wr_link<?=$i?>' itemname='링크 #<?=$i?>' value='<?=$write["wr_link{$i}"]?>'></td>
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
                파일첨부<br> 
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
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_trackback) { ?>
<tr>
    <td class=write_head>트랙백주소</td>
    <td><input class='ed' size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">핑 보냄<? } ?></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_guest) { ?>
<tr>
    <td class=write_head><img id='kcaptcha_image' /></td>
    <td><input class='ed' type=input size=10 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;왼쪽의 글자를 입력하세요.</td>
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
YouTube Video Browser <b>&copy; <a href="http://www.quvic.com" target=_blank>QUVIC</a></b> | Developed by <a href="http://www.tyzen.net" target=_blank><b>TYZEN.NET</b></a> | <a href="http://tyzen.net/201" target=_blank><b>Get This Script</b></a><br><br><!---삭제불가 합니다. ?>
