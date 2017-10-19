<?php
require_once "classes/account.class.php";
session_start();

if(!isset($_SESSION['logged_in'])) {
  $_SESSION['logged_in'] = false;
}
if(!isset($_SESSION["key"])) {
  $_SESSION["key"] = "";
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // start chapta

  if(isset($_POST['g-recaptcha-response'])){
      // If it is responding set a variable
      $captcha= $_POST['g-recaptcha-response'];
  }
    // Key got from the google account
    $secretKey = "6LdpFzMUAAAAAG5Qcsqtebtvioo1NCmu2IdXvMbn";
    $ip = $_SERVER['REMOTE_ADDR'];
    $cresponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($cresponse,true);

    if(intval($responseKeys["success"]) !== 1) {

        // No succes
        header('location: login.php?error=captcha');
    } else {
      $l_data = array(
          'Email' => $_POST['l_email'],
          'Password' => $_POST['l_password']
      );
     $l_response = Account::accountLogin($l_data);
     $l_response = json_decode($l_response);
     $token = $l_response->data->token;
     if($l_response->error == false) {
        $_SESSION['key'] = "Bearer " .$token;
        $_SESSION['logged_in'] = true;
        $message = $l_response->message;
        header('Location: index.php?message='.$message);
      } else {
        $_SESSION['logged_in'] = false;
        $message = $l_response->message;
        header('Location: login.php?error='.$message);
      }
    }
}
