<?php
require_once "classes/presentation.class.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_SESSION['key'];
    $data = array(
        'name' => $_POST['name'],
        'companyId' => $_POST['company_id'],
        'frame1' => $_POST['frame_1'],
        'frame2' => $_POST['frame_2']
        'frame3' => $_POST['frame_3'],
        'frame4' => $_POST['frame_4'],
        'frame5' => $_POST['frame_5'],
        'frame6' => $_POST['frame_6'],
        'frame7' => $_POST['frame_7'],
        'frame8' => $_POST['frame_8'],
        'frame9' => $_POST['frame_9'],
        'frame10' => $_POST['frame_10']
    );
    // If success with the ReCaptcha
    $aCreate = Presentation::createPresentation($data, $key);
	$aCreate = json_decode($aCreate);
	echo $aCreate;
    $message = "De presentatie is aangemaakt";
    //Dump your POST variables
    $_SESSION['msg'] = $message;
    //echo $message;
   // header('location: presentation.php');
} else {
    $message = "Er is geen POST. Neem contact op met uw site adminstrator";
    //Dump your POST variables
    $_SESSION['msg'] = $message;
    //echo $message;
    header('location: presentation.php');
}
 ?>
