<head>
	<link rel="stylesheet" type="text/css" href="/css/login.css"/>
</head>
<div class="login-page">
  <div class="form">
		<?php
		if(isSet($_GET[error])) {
			?><p>Er ging iets mis bij het inloggen</p> <?php
		}
		 ?>
	<form class="login-form" action="logincheck.php" method="POST">
	  <input type="text" name="l_email" placeholder="email"/>
	  <input type="password" name="l_password" placeholder="password"/>
	  <input type="submit" name="login" value="login" class="login-submit">
	</form>
  </div>
</div>
