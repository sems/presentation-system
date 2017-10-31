<?php
    require_once "classes/account.class.php";
    session_start();
    
    $idToDel = $_POST['idtodel'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['delyes'])) {
            $key = $_SESSION['key'];
            $delResponse = Account::accountDelete($idToDel, $key);
            $message = "Account is succesvol verwijderd.";
            //Dump your POST variables
            $_SESSION['msg'] = $message;
            header('location: controlusers.php');
        } else {
            $message = "Verwijderen is gestopt door gebruiker.";
            $_SESSION['msg'] = $message;
            header('location: controlusers.php');
        }
    } else {
        $message = "Er is geen POST. Neem contact op met uw site adminstrator";
        //Dump your POST variables
        $_SESSION['msg'] = $message;
        //echo $message;
        header('location: controlscreens.php');
    }


?>
