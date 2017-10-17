<head>
	<link rel="stylesheet" type="text/css" href="/css/login.css"/>
</head>
<div class="login-page">
  <div class="form">
		<?php
		if (!isset($_GET['error'])){
		 } else {
				$error = $_GET['error'];
				echo $error;
		}
		 ?>
	<form class="login-form" action="logincheck.php" method="POST">
	  <input type="text" name="l_email" placeholder="email"/>
	  <input type="password" name="l_password" placeholder="password"/>
		<div class="g-recaptcha" data-sitekey="6LdpFzMUAAAAAHxXzWptqDfQIk-z-X0271uen3pO"></div>
	  <input type="submit" name="login" value="login" class="login-submit">
	</form>
  </div>
</div>
