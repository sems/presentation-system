<?php
require_once "classes/general.class.php";
session_start();
if(!isset($_SESSION['logged_in'])) {
  $_SESSION['logged_in'] = false;
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $l_data = array(
        'Email' => $_POST['l_email'],
        'Password' => $_POST['l_password']
    );
    General::accountLogin($l_data);

    if(General::accountLogin($l_data) == "") {
      $_SESSION['logged_in'] = true;
      echo $_SESSION["logged_in"];
      header('Location: index.php');
    } else {
      $_SESSION['logged_in'] = false;
      header('Location: login.php?error');
    }
}
