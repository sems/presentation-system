<?php
require_once "classes/general.class.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'Name' => $_POST['b_name'],
        'Email' => $_POST['b_email'],
        'Password' => $_POST['b_password']
    );
    // Start ReCaptcha
    if(isset($_POST['g-recaptcha-response'])){
        // If it is responding set a variable
        $captcha= $_POST['g-recaptcha-response'];
    }
    // Key got from the google account
    $secretKey = "6LdpFzMUAAAAAG5Qcsqtebtvioo1NCmu2IdXvMbn";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
        // No succes
        echo "De captcha was incorrect of niet ingevuld!";
    } else {
        // If success
        // Run the following code in side this else
        General::accountAanmaken($data);

    }
    // End ReCaptcha
}
