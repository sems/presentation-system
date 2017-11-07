<?php
    require_once "classes/receiver.class.php";
    session_start();
    $idToDel = $_POST['idtodel'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['delyes'])) {
            $key = $_SESSION['key'];
            $delResponse = Receiver::deleteReceiver($idToDel, $key);
            $message = "Receiver is succesvol verwijderd.";
            //Dump your POST variables
            $_SESSION['msg'] = $message;
            header('location: controlscreens.php');
        } else {
            $message = "Verwijderen is gestopt door gebruiker.";
            $_SESSION['dngr_msg'] = $message;
            header('location: controlscreens.php');
        }
    }


?>
