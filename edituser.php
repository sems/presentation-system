<?php
    require_once "classes/account.class.php";
    session_start();

    $idToEdit = $_POST['idtoedit'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['b_edit_submit'])) {
            $key = $_SESSION['key'];

            $editResponse = Account::accountGet($idToEdit, $key);
            echo $editResponse;
            //header('location: controlusers.php');
        } else {
            echo "else";
            //header('location: controlusers.php');
        }
    }


?>
