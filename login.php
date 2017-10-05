<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');
    if(isset($_SESSION["logged_in"])) {
      if($_SESSION["logged_in"] == true) {
        header("location: index.php");
      } else {
        $view = "views/login.php";
        $sectionActive = "Login";
      }
    } else {
      $view = "views/login.php";
      $sectionActive = "Login";
    }
    include_once $template;

?>
