<?php
require_once "classes/presentation.class.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_SESSION['key'];
	$idToEdit = $_POST['idtoedit'];
    $data = array(
        'id' => $idToEdit,
        'name' => $_POST['e_name'],
        'companyId' => $_POST['e_company_id'],
        'frame1' => $_POST['e_frame_1'],
        'frame2' => $_POST['e_frame_2'],
        'frame3' => $_POST['e_frame_3'],
        'frame4' => $_POST['e_frame_4'],
        'frame5' => $_POST['e_frame_5'],
        'frame6' => $_POST['e_frame_6'],
        'frame7' => $_POST['e_frame_7'],
        'frame8' => $_POST['e_frame_8'],
        'frame9' => $_POST['e_frame_9'],
        'frame10' => $_POST['e_frame_10']
    );
    // checks if a $_POST is empty and puts int containing NULL
    foreach ($data as $key => $value) {
        $value = trim($value);
        if (empty($value)) {
            $data[$key] = 0;
        }
    }
    var_dump($data);
    // If success with the ReCaptcha
    $aEdit = Presentation::editPresentation($data,$idToEdit,$key);
	$aEdit = json_decode($aEdit);
    $message = "De presentatie is aangepast";
    //Dump your POST variables
    echo $message;
    $_SESSION['msg'] = $message;
    //echo $message;
    header('location: presentation.php');
} else {
    $message = "Er is geen POST. Neem contact op met uw site adminstrator";
    //Dump your POST variables
    $_SESSION['msg'] = $message;
    //echo $message;
    header('location: presentation.php');
}
 ?>
