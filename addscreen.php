<?php
require_once "classes/receiver.class.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_SESSION['key'];
    if ($_POST['add_screen_active'] == True) {
        $active = "True";
    } else {
        $active = "False";
    }
    $data = array(
        'companyId' => $_SESSION['companyId'],
        'Name' => $_POST['add_screen_name'],
        'Active' => $active,
    );
    // If success with the ReCaptcha
    $aCreate = Receiver::createReceiver($data, $key);
    $message = "De Reciever is aangemaakt";
    //Dump your POST variables
    $_SESSION['msg'] = $message;
    //echo $message;
    header('location: controlscreens.php');
} else {
    $message = "Er is geen POST. Neem contact op met uw site adminstrator";
    //Dump your POST variables
    $_SESSION['msg'] = $message;
    //echo $message;
    header('location: controlscreens.php');
}
 ?>
