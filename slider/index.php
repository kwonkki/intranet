<?php
if(isset($_POST['winner'])){
	//$newLineCode = ""\n";
	$message = $_POST['winner'] ;	
	$modifiedTextAreaText = str_replace(chr(13), "</li><li>", $message);

	$content= "<li>".  preg_replace("/\s+/", "", $modifiedTextAreaText)."</li>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Top 10 Winner List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="jquery.vegas.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.totemticker.js"></script>
	<script type="text/javascript" src="jquery.vegas.js"></script>
	<script type="text/javascript" src="js/jquery.lettering.js"></script>
<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true
			});
			
			$.vegas( 'slideshow', {
				delay: 8000,
				backgrounds: [
					{ src: 'images/xmas1.jpg', fade: 4000 },
					{ src: 'images/xmas2.jpg', fade: 4000 },
					{ src: 'images/xmas3.jpg', fade: 4000 },
					{ src: 'images/xmas4.jpg', fade: 4000 },
					{ src: 'images/xmas5.jpg', fade: 4000 },
					{ src: 'images/xmas6.jpg', fade: 4000 },
					{ src: 'images/xmas7.jpg', fade: 4000 },
					{ src: 'images/xmas8.jpg', fade: 4000 },
					{ src: 'images/xmas9.jpg', fade: 4000 }
				]
			} )( 'overlay' );
		});
		
		$(document).ready(function() {
			$("#logo").lettering('words').children("span").lettering();
		});
		
		
	</script>
</head>
<body>
	
	
	<div id="wrapper">
		<h1 id="logo"><span class="char1">T</span><span class="char2">o</span><span class="char3">p</span><span class="char4">1</span><span class="char5">0</span><span class="char6">L</span><span class="char7">i</span><span class="char8">s</span><span class="char9">t</span></h1>
		<h1 id="logo2"><span class="char1">Come</span><span class="char2">on</span><span class="char4">stage</span><span class="char3">!!!</span></h1>
		<ul id="vertical-ticker">
		<?php
		echo $content;
		?>
		</ul>
		
		<!--<p><a href="#" id="ticker-previous">Previous</a> / <a href="#" id="ticker-next">Next</a> / <a id="stop" href="#">Stop</a> / <a id="start" href="#">Start</a></p>-->
	</div>
	
</body>	
</html>