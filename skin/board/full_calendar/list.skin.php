<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once("./_common.php");

//오늘 날짜
$thisyear  = date('Y');  
$thismonth = date('n');  
$thisday   = date('j');  
if(!$year)  { $year = $thisyear; }
if(!$month) { $month = $thismonth; }
if(!$day)   { $day = $thisday; }

//최신댓글 색상 다르게 위한
$newtime = date("Y-m-d H:i:s", time() - (int)(60 * 60 * 24)); 

$f = @file("$g4[bbs_path]/calendar/$year.txt");
if ($f) 
{
	while ($line = each($f)) 
	{
		$tmp = explode("|", $line[value]);
        $nal[$tmp[0]] = $tmp;
    }
}


if( $is_admin ){
	if(isset($dept_name)){
		$my_dept = $dept_name;
	}else{
		$my_dept = 'admin';	
	}
	
}else{
	$my_dept = $member[mb_1];	
}
	

$sql = " select distinct dept_name from dept order by dept_no desc ";
$result = sql_query($sql);
while ($row=sql_fetch_array($result)) {
		$str .= "<option value='{$row[dept_name]}'>{$row[dept_name]}</option>";
}

?>
<link rel='stylesheet' type='text/css' href='<?=$board_skin_path?>/css/g_style.css' />

<!--문서레이아웃:프린트부분-->
<div id="print_page">
	<div id="g_title" style="padding-bottom:5px;">
		<span class="g_title">
				<img src="<?=$g4[path]?>/images/project_management.png"> 
				<div style='dispaly : inline;'><?=$my_dept?> Department</div> 
				<? if( $is_admin ){ ?>
				<form action="<?=$_SERVER[PHP_SELF]?>?bo_table=project" id="dept_form" method="post">
					<select name="dept_name"> 	
						<? echo "<option value=''>## Choose the Department ##</option>".$str;?>
					</select>
					
					<span class="button"><input class='btn01' type="submit" value="submit"></span>
					
				</form>  
				<? } ?>
		</span>
	</div>
	<center>
		<div style="width:<?=$width?>; text-align:center; margin:0 auto;">
			<?
			switch ($mode) 
			{ 
			  case "d" : include "$board_skin_path/list.day.php";	   break; 
			  case "w" : include "$board_skin_path/list.week.php";   break; 
			  case "m" : include "$board_skin_path/list.month.php";  break; 
			  case "c" : include "$board_skin_path/list.calendar.php"; break; 
			  default  : include "$board_skin_path/list.calendar.php";
			}
			?>
		</div>
	</center>
</div>
<!--//문서레이아웃:프린트부분-->

<script type='text/javascript' src='<?=$board_skin_path?>/js/calendar.js'></script>
<script type='text/javascript'>
//<![CDATA[
//문서 프린트
function pagePrint(Obj) 
{
    var W = Obj.offsetWidth;        //screen.availWidth;
    var H = Obj.offsetHeight;       //screen.availHeight;
 
    var features = "menubar=no,toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,width=" + W + ",height=" + H + ",left=0,top=0";
    var PrintPage = window.open("",Obj.id,features);
    PrintPage.document.open();
    PrintPage.document.write("<html><head><title>print out</title><link rel='stylesheet' href='<?=$board_skin_path?>/css/g_style.css' type='text/css'><link rel='stylesheet' href='<?=$board_skin_path?>/css/fullcalendar.css' type='text/css'><style type='text/css'>body{background-color:#f0f0f0;}</style>\n</head>\n<body topmargin='0' leftmargin='0' bottommargin='0' righttmargin='0'><br>" + Obj.innerHTML + "\n</body></html>");
    PrintPage.document.close();
    PrintPage.document.title = document.domain;
    PrintPage.print(PrintPage.location.reload());
}
//]]>
</script>
