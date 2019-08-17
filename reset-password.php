<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- custom css -->
    <link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- fontawesome css -->
    <!-- //css files -->

    <!-- google fonts -->
   <!--  <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

     <link href="css/form.css" rel="stylesheet">
     <link href="whatsapp.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="wrapper-main">
		<section class="section-default">
			<h1>Reset your password</h1>
			<p>An email will be send you with instructions on how to reset your password</p>
			<form action="includes/reset-request.inc.php" method="post">
				<input type="text" name="email" placeholder="Enter your Email Address..">
				<button type="submit" name="reset-request-submit">Receive new password</button>
			</form>
			<?php
			if(isset($_GET["reset"])){
				if($_GET["reset"] == "success"){
					echo '<p class="signupsuccess">check your email</p>';
				}
			}
			?>
		</section>

</body>
</html>