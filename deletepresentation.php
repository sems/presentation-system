<?php
    require_once "classes/presentation.class.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['delyes'])) {
            $idToDel = $_POST['idtodel'];
            $key = $_SESSION['key'];
            $delResponse = Presentation::deletePresentation($idToDel, $key);
            $message = "Presentatie is succesvol verwijderd.";
            //Dump your POST variables
            $_SESSION['msg'] = $message;
            header('location: presentation.php');
        } else {
            $message = "Verwijderen is gestopt door gebruiker.";
            $_SESSION['msg'] = $message;
            header('location: presentation.php');
        }
    } else {
        $message = "Er is geen POST. Neem contact op met uw site adminstrator";
        //Dump your POST variables
        $_SESSION['msg'] = $message;
        //echo $message;
        header('location: presentation.php');
    }


?>
