<?php
    require_once "classes/account.class.php";
    session_start();

    $idToEdit = $_POST['idtoedit'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['b_edit_submit'])) {
            $key = $_SESSION['key'];
            $uEditData = array(
                'Id' => $idToEdit,
                'Name' => $_POST['b_edit_name'],
                'Email' => $_POST['b_edit_email'],
                'Password' => $_POST['b_edit_repeat_password']
            );

            $editAccountCall = Account::accountEdit($uEditData, $idToEdit, $key);

            $edit_results = json_decode($editAccountCall);
            if ($edit_results === NULL) die('Error parsing json');

            $a = $edit_results->data;
            // Can select a specific data element like the line under here.
            //echo $a->email;
            $message = $edit_results->message;

            //Dump your POST variables
            $_SESSION['msg'] = $message;

            //echo $message;
            header('location: controlusers.php');

            /*;
            $editResponse = Account::accountGet($idToEdit, $key);
            $edit_results = json_decode($editResponse);

            if ($edit_results === NULL) die('Error parsing json');

            $a = $edit_results->data;
            echo $a->email;
            echo $a->id;
            echo $a->password;
            */

        } else {
            echo "else";
            //header('location: controlusers.php');
        }
    }


?>
