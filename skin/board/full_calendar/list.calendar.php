<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $my_dept;

?>
<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/css/fullcalendar.css' />
<script type='text/javascript' src='<?=$board_skin_path?>/js/ui.core.js'></script>
<script type='text/javascript' src='<?=$board_skin_path?>/js/ui.draggable.js'></script>
<script type='text/javascript' src='<?=$board_skin_path?>/js/ui.resizable.js'></script>
<script type='text/javascript' src='<?=$board_skin_path?>/js/fullcalendar.js'></script>
<script type='text/javascript' src='<?=$board_skin_path?>/js/jquery.form.js'></script>
<script type='text/javascript'>
//<![CDATA[
	$(document).ready(function() {

		$('#calendar').fullCalendar({

			header: {
				//left: 'month,agendaWeek,agendaDay',
				left: 'month,agendaWeek,agendaDay',
				center: 'prev, title, next today',
				right: ''
			},
			
			editable: true,			
			events: "<?=$board_skin_path?>/schedule_calendar.php?mb_id=<?=$member[mb_id]?>&department=<?=$my_dept?>&bo_table=<?=$bo_table?>",
      	
			eventDrop: function(event, delta) { 
            event_url = "<?=$board_skin_path?>/schedule_update.php";
				event.s_date = $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd');
				event.e_date = $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd');
				event.s_time = $.fullCalendar.formatDate(event.start, 'HH:mm');
				event.e_time = $.fullCalendar.formatDate(event.end, 'HH:mm');
			 	event.mode = "drop";
				$.post(event_url,event);
			},

			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { 
				event_url = "<?=$board_skin_path?>/schedule_update.php";
			   //event.s_date = $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd');
				event.e_date = $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd');
				//event.s_time = $.fullCalendar.formatDate(event.start, 'HH:mm');
				event.e_time = $.fullCalendar.formatDate(event.end, 'HH:mm');
				event.mode = "resize";
				$.post(event_url,event);
			},
              

			<? if ($write_href) { ?>
			dayClick: function(date, allDay, jsEvent, view) { // 일정등록		
				var chk_date = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
				event_url = "<?=$board_skin_path?>/schedule_write.php";
				$(this).schedule(event_url, { bo_table: "<?=$bo_table?>", wr_1: chk_date, wr_2: chk_date, w:"" });	
			},
    		<? } ?>

			eventRender: function(event, element) {
	           element.bind('click', function() { // 일정보기,수정
			    event_url = "<?=$board_skin_path?>/schedule_write.php" ;
				$(this).schedule(event_url, { bo_table: "<?=$bo_table?>", w:"u", wr_id: event.id });
			});
			}
		});
	});

//레이어팝업 입력창
(function($){
	//$.fn.schedule = function(url,destination,params,kind, type) {
	$.fn.schedule = function(url,event) {

		$("#fade, #light").remove();
		$('<div id=\"light\" class=\"wl_box\"></div><div id=\"fade\" class=\"wl_boxbg\"></div>').appendTo(document.body);
		$("#light, #fade").css("display", "block");		
		$("#fade").css("height", 800);

		$.ajax({
			type: "POST",
			url: url,
			data: event,
			success: function(msg){
				modi = event; // 변수로 넣어주기.....
				$("#light").html(msg);				
				var l_left = ($("body").width() - $("#light").width())/2;
				var l_top = ($("body").height() - $("#light").height())/2; 
				$("#light").css({'left' : l_left, 'top' : l_top});
			}
		});

	};  
})(jQuery);
//]]>
</script>
<? if($mode=="c" || !$mode) { ?>
<div style="position:relative; float:right; z-index:100; top:20px; right:3px; width:350px; text-align:right; font-size:11px;">
    <img src='<?=$board_skin_path?>/img/icon_001.gif' border="0"> normal
    <img src='<?=$board_skin_path?>/img/icon_002.gif' border="0"> important
    <img src='<?=$board_skin_path?>/img/icon_003.gif' border="0"> Very Important
    <img src='<?=$board_skin_path?>/img/icon_004.gif' border="0"> Long project
    <img src='<?=$board_skin_path?>/img/icon_000.gif' border="0"> personnel
</div>
<div style="clear:both; margin:0;"></div>
<? } ?>
<div class="content" id="calendar"></div>
<div style="padding:5px 0; text-align:left;" class="small3"><b>[Notice]</b> Proejct Management.</div>