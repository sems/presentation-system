<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/index.php";
    $sectionActive = "index";

    include_once $template;
    if(isSet($_SESSION["logged_in"])) {
	     if($_SESSION["logged_in"] == true) {
		       session_destroy();
		         header("location: index.php");
	     }
    }
?>
