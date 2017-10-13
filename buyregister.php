<?php
require_once "classes/account.class.php";
require_once "classes/company.class.php";
require_once "classes/companyaccount.class.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Put the User data in an array
    $uData = array(
        'Name' => $_POST['b_name'],
        'Email' => $_POST['b_email'],
        'Password' => $_POST['b_password']
    );
    // Put the Company data in an array
    $cData = array(
        "Name" => $_POST['c_name'],
        "Email" => $_POST['c_email'],
        "Phone" => $_POST['c_phone'],
        "Address" => $_POST['c_adres'],
        "City" => $_POST['c_city'],
        "Website" => $_POST['c_site']
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
        // No succes with the ReCaptcha
        return "De captcha was incorrect of niet ingevuld!";
    } else {
        // If success with the ReCaptcha
        // Run the following code in side this else
        $aCreate = Account::accountCreate($uData);
        $cCreate = Company::companyCreate($cData);

        $aObj = json_decode($aCreate);
        $aCreateId =  $aObj->id;

        $cObj = json_decode($cCreate);
        $cCreateId =  $cObj->id;

        if ($aCreateId == "" || $aCreateId == " ") {
            // It will never end in this if good
            exit;
        }
        if ($cCreateId == "" || $cCreateId == " ") {
            // It will never end in this if good
            exit;
        }

        // Getting the data from the previous calls
        $data = array(
            'AccountId' => $aCreateId,
            'CompanyId' => $cCreateId,
        );
        CompanyAccount::linkCreate($data);



    }
    // End ReCaptcha
}
