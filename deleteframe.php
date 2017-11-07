<?php
    require_once "classes/frame.class.php";
    session_start();
    $idToDel = $_POST['idtodel'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['delyes'])) {
            $key = $_SESSION['key'];
            $delResponse = Frame::frameDelete($idToDel, $key);
            $message = "Frame is succesvol verwijderd.";
            //Dump your POST variables
            $_SESSION['msg'] = $message;
            header('location: frames.php');
        } else {
            $message = "Verwijderen is gestopt door gebruiker.";
            $_SESSION['dngr_msg'] = $message;
            header('location: frames.php');
        }
    } else {
        $message = "Er is geen POST. Neem contact op met uw site adminstrator";
        //Dump your POST variables
        $_SESSION['dngr_msg'] = $message;
        //echo $message;
        header('location: controlscreens.php');
    }


?>
