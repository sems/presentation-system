<?php
    require_once "classes/account.class.php";
    $idToDel = $_POST['idtodel'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['delyes'])) {
            $delResponse = Account::accountDelete($idToDel);
            header('location: controlusers.php');
        } else {
            header('location: controlusers.php');
        }
    }


?>
