var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslate(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'en'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate').click(function(){ msTranslate(); });

//일본어 번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslateja(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'ja'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate1').click(function(){ msTranslateja(); });

//한국어번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslateko(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'ko'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate2').click(function(){ msTranslateko(); });

//한국어번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslatefi(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'fi'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate3').click(function(){ msTranslatefi(); });

//스폐인 번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslatees(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'es'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate4').click(function(){ msTranslatees(); });

//러시아 번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslateru(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'ru'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate5').click(function(){ msTranslateru(); });

//프랑스 번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslatefr(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'fr'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate6').click(function(){ msTranslatefr(); });

//이탈리아 번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslateit(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'it'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate7').click(function(){ msTranslateit(); });

//독일 번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslatede(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'de'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate8').click(function(){ msTranslatede(); });

//중국 번역//
var WindowsLiveAppID = '9BEE70120363E77B0528A0E24953BFD00F59D58E';

function msTranslatezhCN(){
  var text = $('#from').attr('value');
  $.ajax({
    url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Detect',
    dataType: 'jsonp',
    jsonp: 'oncomplete',
    data: {
      appId: WindowsLiveAppID,
      text: text
    },
    success: function(dataDetect, dataType){
      $.ajax({
        url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
        dataType: 'jsonp',
        data: {
          appId: WindowsLiveAppID,
          text: text,
          from: dataDetect,
          to: 'zh-TW'
        },
        jsonp: 'oncomplete',
        success: function(dataTranslate, dataType){
          var result = '[' + dataDetect + '] ' + dataTranslate;
          $('#wr_content').attr('value', result);
        }
      });
    }
  });
}
$('#translate9').click(function(){ msTranslatezhCN(); });