<?
include_once("./_common.php");


$g4['title'] = "daily attendance";
include_once("./_head.php");


// admin validation
if( $is_admin ){
	
}else {
	
	$member_id = $member[mb_id];
}



// 하루에 최대 2번만 서브밋 할수 있음 
$sql1 = " 	select count(*) as cnt 
			from mb_login 
			where 	DATE_FORMAT(mb_login_time,'%Y-%m-%d') = DATE_FORMAT(now(),'%Y-%m-%d')
					and mb_login_id = '$member_id'  
";

$sql2 = " 	select count(*) as cnt
			from mb_logout 
			where 	DATE_FORMAT(mb_logout_time,'%Y-%m-%d') = DATE_FORMAT(now(),'%Y-%m-%d')
					and mb_logout_id = '$member_id'
";

$row1 = sql_fetch($sql1);
$row2 = sql_fetch($sql2);

if($row1[cnt] >= 2 ) $today_login = " disabled : disabled ";
if($row2[cnt] >= 2 ) $today_logout = " disabled : disabled ";

?>

<div >
	<img src="<?=$g4[path]?>/images/login_logout.png">
</div>

<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...
    var curDate = new Date();
    
    var curYr	= curDate.getFullYear();
	var curMon	= curDate.getMonth()+1;
	var curDay	= curDate.getDate();
	
	
    $('#calendar').fullCalendar({
    	
	    eventSources: [
	
	        // your event source
	        {
	            url: 'login_json.php',
	            type: 'POST',
	            error: function() {
	                alert('there was an error while fetching events!');
	            },
	            color : '#111'
	        },
	        {
	            url: 'logout_json.php',
	            type: 'POST',
	            error: function() {
	                alert('there was an error while fetching events!');
	            }
	        }
	
	        // any other sources...
	
	    ],
	
        dayClick: function(date, allDay, jsEvent, view) {
        	/*
        	var varYr	= date.getFullYear();
			var varMon	= date.getMonth()+1;
			var varDay	= date.getDate();
			
			if( varDay != curDay || varMon != curMon || varYr != curYr ){
				return false;
			}else{
				confirm("Do you want to submit the login?");
			}
				
			*/	
    	}

      //  ,events: eventArray
    });

});

function today_login_logout(type){
	$.ajax({
		url: '<?=$g4['path']?>/attendance_save.php',
	  	type: "POST",
	  	data: {type : type },
	  	success: function(data) {
			switch(data){
				case '000' : alert('your data has been successfully saved'); break;
				case '-1' : alert('data not saved. contact the programmer!'); break;
			}
			location.reload();
	  	}
	});		
}

</script>

<div style="margin-bottom:15px;">
<? if( $is_member && !$is_admin){ ?>
<span class="button red">	
<button title="Today Login" class="btn01" onclick="javascript:today_login_logout('login')" <?=$today_login?> >Today Login</button>
</span>
<span class="button red">	
<button title="Today Logout" class="btn01" onclick="javascript:today_login_logout('logout')" <?=$today_logout ?>>Today Logout</button>
</span>
<span>You can submit maximum 2-times a day</span>
<? }else{
	/*
	$sql = "select mb_id, mb_1 from g4_member
		where mb_id <> 'admin'
		order by mb_1, mb_no";
			
	$result =  sql_query($sql);
	
	$html0 = "<form method=post><select name=member_id><option value=''>### Choose the Employee ###</option>";

	for ($i=0; $row=sql_fetch_array($result); $i++) {
		$html0 .= "<option value='{$row[mb_id]}'>[{$row[mb_1]}] {$row[mb_id]}</option>";
 	}
 	
 	$html0 .= "</select><input type='submit' value='submit'></form>";
 	
 	echo $html0;
 	*/
} 	  
 ?>
</div>
<div id='calendar'></div>
<!-- 메인화면 최신글 끝 -->


<?
include_once("./_tail.php");
?>
