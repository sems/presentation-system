<?php
require_once "classes/presentation.class.php";
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_SESSION['key'];
    $idToEdit = $_POST['idtoedit'];
    echo $key . "</br>";
    echo $idToEdit;
    $e_Data = array(
        'name' => $_POST['e_name'],
        'companyId' => $_POST['e_company_id'],
        'frame1' => $_POST['e_frame_1'],
        'frame2' => $_POST['e_frame_2'],
        'frame3' => "5",
        'frame4' => "5",
        'frame5' => "5",
        'frame6' => "5",
        'frame7' => "5",
        'frame8' => "5",
        'frame9' => "5",
        'frame10' => "5"
    );
    $rEdit = Presentation::editPresentation($e_Data, $idToEdit, $key);
    echo $rEdit;
    $message = "De Presentatie is aangepast";
    //Dump your POST variables
    $_SESSION['msg'] = $message;
    //echo $message;
    //header('location: presentation.php');
} else {
    $message = "Er is geen POST. Neem contact op met uw site administrator";
    //Dump your POST variables
    $_SESSION['msg'] = $message;
    //echo $message;
    header('location: presentation.php');
}
 ?>
