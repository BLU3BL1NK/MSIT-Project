<?php
include '../Administrator/connection/connection.php';
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Decent Touch Massage Center</title>
        <link href='../Administrator/images/logo.ico' type='image' rel='icon'>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="../Administrator/css/LoginStyle1.css" />
		<script src="../Administrator/js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
				background: #563c55 url(../Administrator/images/blurred.jpg) no-repeat center top;
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
    </head>
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
            </div><!--/ Codrops top bar -->
			
			<header>
			
				<h1><strong>CASHIER LOGIN FORM</strong></h1>

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">
				<form class="form-3" method='POST' action='../Administrator/connection/functions.php'>
				    <p class="clearfix">
				        <label for="login">Username</label>
				        <input type="text" name="Username" id="login" placeholder="Username">
				    </p>
				    <p class="clearfix">
				        <label for="password">Password</label>
				        <input type="password" name="Password" id="password" placeholder="Password"> 
				    </p>

				    <p class="clearfix">
				        <input type="submit" name="CashierLogin" value="Log in">
				    </p>
				    <p class="clearfix">
				        <input type="submit" name="submit" onclick="window.history.go(-1); return false;" value="Cancel">
				    </p><br><br><br>
				    <p>
				        
				    </p>       
				</form>​
			</section>
			
        </div>
    </body>
</html>