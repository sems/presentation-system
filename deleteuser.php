<?php
    require_once "classes/account.class.php";
    $idToDel = $_POST['idtodel'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['delyes'])) {
            $delResponse = Account::accountDelete($idToDel);
            $message = "Account is succesvol verwijderd.";
            //Dump your POST variables
            $_SESSION['msg'] = $message;
            header('location: controlusers.php');
        } else {
            $message = "Verwijderen is gestopt door gebruiker.";
            $_SESSION['msg'] = $message;
            header('location: controlusers.php');
        }
    }


?>
