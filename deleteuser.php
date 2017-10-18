<?php
    require_once "classes/account.class.php";
    $idToDel = $_GET['id'];


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //something posted
        if (isset($idToDel)) {
            // btnDelete
            echo $idToDel;
            $delResponse = Account::accountDelete($idToDel);
            echo $delResponse;
        } else {
            //assume btnSubmit
        }
    }

?>
