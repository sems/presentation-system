<?php
require_once "classes/account.class.php";
require_once "classes/company.class.php";
require_once "classes/companyaccount.class.php";

//If the form is posted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    if ($_POST['b_password'] == $_POST['b_repeat_password']) {
        if(intval($responseKeys["success"]) !== 1) {
            // No succes with the ReCaptcha
            $rError = "De captcha was incorrect of niet ingevuld!";
            header('Location: prices.php');
        } else {
            $uData = array(
                'Name' => $_POST['b_name'],
                'Email' => $_POST['b_email'],
                'Password' => $_POST['b_password']
            );
            // If success with the ReCaptcha
            $aCreate = Account::accountCreate($uData);

            // Put the Company data in an array
            $cData = array(
                "Name" => $_POST['c_name'],
                "Email" => $_POST['c_email'],
                "Phone" => $_POST['c_phone'],
                "Address" => $_POST['c_adres'],
                "City" => $_POST['c_city'],
                "Website" => $_POST['c_site']
            );
            $cCreate = Company::companyCreate($cData);


            $aObj = json_decode($aCreate);
            $aCreateId =  $aObj->id;

            $cObj = json_decode($cCreate);
            $cCreateId =  $cObj->id;


            if ( is_numeric($aCreateId) && is_numeric($cCreateId) ) {
                $data = array(
                    'AccountId' => $aCreateId,
                    'CompanyId' => $cCreateId,
                );
                CompanyAccount::linkCreate($data);
            }


            if ($aCreateId == "" || $aCreateId == " ") {
                // It will never end in this if good
                exit;
            }
            if ($cCreateId == "" || $cCreateId == " ") {
                // It will never end in this if good
                exit;
            }
        }
    } else {
        $rError = "De ingevulde wachtwoorden komen niet overeen!";
        header('Location: prices.php');
    }


    // End ReCaptcha
}
