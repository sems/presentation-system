<?php
require_once "classes/receiver.class.php";
session_start();

$idToEdit = $_POST['idtoedit'];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_SESSION['key'];
    if ($_POST['add_screen_active'] == True) {
        $active = "True";
    } else {
        $active = "False";
    }
    $rData = array(
        'Id' => $idToEdit,
        'Name' => $_POST['edit_screen_name'],
        'Active' => $active
    );
    $rDelete = Receiver::editReceiver($rData, $idToEdit, $key);
    $message = "De Receiver is aangepast";
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
