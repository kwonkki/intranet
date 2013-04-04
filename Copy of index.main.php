<!-- 메인화면 최신글 시작 -->

<?
//include_once("$g4[path]/lib/popular.lib.php");      // 인기글
//include_once("$g4[path]/lib/latest.lib.php");       // 최신글
//include_once("$g4[path]/lib/latest.group.lib.php"); // 그룹 최신글
//include_once("$g4[path]/lib/latest.my.lib.php"); // 그룹 최신글
//include_once("$g4[path]/lib/latest.club.lib.php");  // 클럽 최신글

?>
<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...
    var curDate = new Date();
    
    var curYr	= curDate.getFullYear();
	var curMon	= curDate.getMonth()+1;
	var curDay	= curDate.getDate();
	
	console.log(curYr);
	console.log(curMon);
	console.log(curDay);
	
	var a  = {title  : ' xx',
            start  : new Date(),
            allDay : false // will make the time show
            , color : '#fcc'};
	
	var eventArray =  [
        {
            title  : 'login : 9:10am',
            start  : '2013-01-20'
        },
        {
            title  : 'logout : 6:10pm',
            start  : '2013-01-20',
            color : '#111'
        },
        {
            title  : ' Login',
            start  : new Date(),
            allDay : false // will make the time show
            , color : '#ccc'
        }, a
    ];

    $('#calendar').fullCalendar({
    	
        dayClick: function(date, allDay, jsEvent, view) {
    	}
    	,
        events: eventArray
    })

});
</script>
<div id='calendar'></div>
<!-- 메인화면 최신글 끝 -->
