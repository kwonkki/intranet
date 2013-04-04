<link rel="stylesheet" type="text/css" href="slider/jquery.vegas.css"/>
<script type="text/javascript" src="slider/js/jquery.totemticker.js"></script>
<script type="text/javascript" src="slider/jquery.vegas.js"></script>
<script type="text/javascript">
	$(function(){
		$.vegas( 'slideshow', {
			align:       'left',
			delay: 8000,
			backgrounds: [
				{ src: 'slider/images/psp.jpg', fade: 4000 },
			]
		} )( 'overlay' );
	});
	
</script>

<div id="wrapper">
	<!--<p><a href="#" id="ticker-previous">Previous</a> / <a href="#" id="ticker-next">Next</a> / <a id="stop" href="#">Stop</a> / <a id="start" href="#">Start</a></p>-->
</div>

