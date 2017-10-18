<?php
    require_once "classes/account.class.php";
    $awNo =  $_POST['delyes'];
    $awYes = $_POST['delno'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($awYes)) {
            $delResponse = Account::accountDelete($awYes);
            echo $delResponse;
        } else {
            header('controlusers.php');
            exit;
        }
    }


?>
