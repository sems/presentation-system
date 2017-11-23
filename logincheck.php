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

        //Dump your POST variables
        $message = "Er gaat was mis met de Captcha";
        $_SESSION['msg'] = $message;
        header('location: login.php');
    } else {
        $l_data = array(
            'Email' => $_POST['l_email'],
            'Password' => $_POST['l_password']
        );
        $l_response = Account::accountLogin($l_data);
        $l_response = json_decode($l_response);
        $token = $l_response->data[0]->token;
        $c_id = $l_response->data[1]->id;
        //$userid = $l_response->data->id;
        if($l_response->error == false) {
            $_SESSION['key'] = "Bearer " .$token;
            $_SESSION['companyId'] = $c_id;
            //$_SESSION['userid'] = $userid;
            $_SESSION['logged_in'] = true;

            $message = $l_response->message;
            //$_SESSION['msg'] = $message;
            header('Location: index.php');
        } else {
            $_SESSION['logged_in'] = false;

            //Dump your POST variables
            $message = $l_response->message;
            $_SESSION['msg'] = $message;
            header('Location: login.php');

        }
    }
}
