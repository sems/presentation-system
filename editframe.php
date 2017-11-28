<?php
    require_once "classes/frame.class.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        if (isset($_POST['b_edit_submit'])) {

            $idToEdit = $_POST['idtoedit'];
            $key = $_SESSION['key'];
            $c_id = $_SESSION['companyId'];
            //print_r($c_id);
            if(empty($_POST["edit_slide_media"])) {
                $uEditData = array(
                    'Id' => $idToEdit,
                    'CompanyId' => $c_id,
                    'Title' => $_POST['edit_slide_title'],
                    'duration' => $_POST['edit_slide_dur'],
                    'Text' => $_POST['edit_slide_text']
                );
            } else {
                $uEditData = array(
                    'Id' => $idToEdit,
                    'CompanyId' => $c_id,
                    'Title' => $_POST['edit_slide_title'],
                    'duration' => $_POST['edit_slide_dur'],
                    'media' => $_POST['edit_slide_media'],
                    'Text' => $_POST['edit_slide_text']
                );
            }

            $editFrameCall = Frame::frameEdit($uEditData, $idToEdit, $key);

            $_SESSION['msg'] = "Het frame is aangepast.";

            //print_r($editFrameCall);
            header('location: frames.php');

        } else {
            $_SESSION['msg'] = "er is geen POST";
            header('location: controlusers.php');
        }
    } else {
        $_SESSION['msg'] = "er is geen POST";
        header("Location: frames.php");
    }


?>
