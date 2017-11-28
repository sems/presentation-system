<?php
    require_once "classes/receiver.class.php";
    session_start();

    $idToEdit = $_POST['idtoedit'];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $token = $_SESSION['key'];
        $c_id = $_SESSION['companyId'];

        $activeEdit = $_POST['edit_screen_active'];

        echo $activeEdit;

        if ($activeEdit == 'Ja') {
            $active = "True";
        } else {
            $active = "False";
        }

        $rData = array(
            'Id' => $idToEdit,
            'CompanyId' => $c_id,
            'Name' => $_POST['edit_screen_name'],
            'Active' => $active
        );
        $rEdit = Receiver::editReceiver($rData, $idToEdit, $token);

        print_r($rEdit);
        
        $message = "Het scherm is aangepast";
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
