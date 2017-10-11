<?php

    require_once "inc/package.inc.php";
    require('inc/config.php');
if(!isset($_SESSION["logged_in"])) {
    $view = "views/login.php";
    $sectionActive = "Login";
} elseif(isset($_SESSION["logged_in"]) || $_SESSION['logged_in'] == true) {
    $view = "views/controlpanel/bg.php";
    $sectionActive = "Controlpanel";
}
    include_once $template;
?>
