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
$('#translate').click(function(){ msTranslate(); });