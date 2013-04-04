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

//input 입력값 자동 넣기 

var max=0;
function window.onload() {
    max=document.all.memo.value.length;  //초기문자길이지정
}
function AddEmoticon(EMOTICON) {
    var o=document.all.memo;
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
	html.push('<a href="javascript:AddEmoticon(\''+videoID+'\');" onfocus=this.blur()>등록하기</a>', title.substr(0,25), '');
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
	html.push('<a href="javascript:AddEmoticon(\''+videoID+'\');" onfocus=this.blur()>등록하기</a>', title.substr(0,25), '');
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