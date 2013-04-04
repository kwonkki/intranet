<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>PSP Intranet</title>
        <meta name="description" content="PSP Intranet" />
        <meta name="keywords" content="PSP Intranet system" />
        <meta name="author" content="Kibum Kwon" />
        <link rel="shortcut icon" href="favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/main_login.css" />
		<script src="js/main_login.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
				background: #563c55 url(images/blurred.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
		<script type="text/javascript">
		function fhead_submit(f)
		{
		    if (!f.mb_id.value)
		    {
		        alert("please type the id.");
		        f.mb_id.focus();
		        return false;
		    }
		
		    if (!f.mb_password.value)
		    {
		        alert("please type the password.");
		        f.mb_password.focus();
		        return false;
		    }
		    
		    f.action = 'bbs/login_check.php';
		
		
		    return true;
		}
		</script>
    </head>
    <body>
	    	
    
    
        <div class="container">
			<section class="main">
			
				<div style="margin:30px auto; width :300px;">
				<img src="images/main_logo.png">
				</div>
				
				
				
				<form name="fhead" class="form-3" method="post" onsubmit="return fhead_submit(this);" autocomplete="off" >
				    <p class="clearfix">
				        <label for="login" title="Username"">Username</label>
				        <input type="text" name="mb_id" id="mb_id" placeholder="Username">
				    </p>
				    <p class="clearfix">
				        <label for="password" title="Password">Password</label>
				        <input type="password" name="mb_password" id="mb_password" placeholder="Password"> 
				    </p>
				    <p class="clearfix">
				        <label for="remember" class="register"><a href="bbs/register_form.php">Register Now!</a></label>
				    </p>
				    <p class="clearfix">
				        <input type="submit" name="submit" value="Sign in" title="Sign in">
				    </p>       
				</form>​
			</section>
			
        </div>
    </body>
</html>