<?
// http://wiki.dreamhost.com/index.php/Custom_error_pages
$page_redirected_from = $_SERVER['REQUEST_URI'];  // this is especially useful with error 404 to indicate the missing page.
$server_url = "http://" . $_SERVER["SERVER_NAME"];
$redirect_to = "/";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Error page - 404error</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<meta http-equiv="Refresh" content="5; url='<?php print($redirect_to); ?>'">
	
<style type="text/css">

* { margin: 0px; padding: 0px; }
body {
	font-family: "Dotum", Tahoma, sans-serif;
	font-size: 12px;
	line-height: 150%; color: #444;
	text-align: center;
	background: url(img/err_bg.gif) repeat-x; padding-top: 30px;
}
a:link, a:visited, a:active { text-decoration: none; color: #444; }
a:hover { color: #1b8a83; text-decoration: underline; }
img { border: 0px; }

.err_info { border: 3px solid #eeeeee; width: 550px; margin: 0 auto; }
.err_info .err_line { border: 1px solid #b2b2b3; padding: 35px; text-align: left; }

.err_info .err_quick { color: #d7d7d7; letter-spacing: -1px; text-align: right; }
.err_info .err_quick a { color: #444444; }

.err_info .err_logo { margin-bottom: 35px; }

.err_info h3 { font-size: 16px; letter-spacing: -1px; margin-bottom: 20px; }
.err_info .err_text { line-height: 180%; }
.err_info .err_text a { color: #1e68cd; text-decoration: underline; }
.err_info .err_text a:hover { text-decoration: none; }

</style>

</head>
<body>

<div class="err_info"><div class="err_line">

	<div class="err_logo"><a href="/" target="_blank">Home</a></div>

	<h3>Sorry<br/>
	Your requested page was not found.<br/><br/>
	<? echo $server_url . $page_redirected_from?> 
	</h3>

	<div class="err_text">
	After 5 sec, page will be directed to main page<br/>
 </div>

</div></div>

</body>
</html>
