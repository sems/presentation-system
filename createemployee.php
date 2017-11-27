<?php
require_once "classes/account.class.php";
session_start();
//If the form is posted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['b_password'] == $_POST['b_repeat_password']) {
        $token = $_SESSION['key'];
        $uData = array(
            'Name' => $_POST['b_name'],
            'Email' => $_POST['b_email'],
            'Password' => $_POST['b_password']
        );
        // If success with the ReCaptcha
        $aCreate = Account::employeeCreate($uData, $token);
        $aCreate = json_decode($aCreate);
        $a = $aCreate->data->Name;
        //print_r($a);

        $message = "De gebruiker ".$a." is goed aangemaakt.";
        //Dump your POST variables
        $_SESSION['msg'] = $message;
        header('Location: controlusers.php');

    } else {
        $message = "De ingevulde wachtwoorden komen niet overeen!";
        $_SESSION['msg'] = $message;
        header('Location: prices.php');
    }
} else {
  $message = "Er is geen POST neem contact op met de systeem administrator!";
  $_SESSION['msg'] = $message;
}
