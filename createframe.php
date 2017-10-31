<?php
    require_once "classes/frame.class.php";
    session_start();
    if(isset($_POST['createframe'])) {
        if(empty($_POST['media'])) {
            $data = array(
                'Title' => $_POST['title'],
                'orderIndex' => $_POST['orderIndex'],
                'duration' => $_POST['duration'],
                'text' => $_POST['text']
            );
        } else {
            $data = array(
                'Title' => $_POST['title'],
                'orderIndex' => $_POST['orderIndex'],
                'duration' => $_POST['duration'],
                'media' => $_POST['media'],
                'text' => $_POST['text']
            );
        }
        $r = Frame::frameCreate($data);
        $message = "Frame is succesvol aangemaakt";
        //Dump your POST variables
        $_SESSION['msg'] = $message;
        //echo $message;
        header('location: presentation.php');
    } else {
        $message = "Er is geen POST. Neem contact op met uw site adminstrator";
        //Dump your POST variables
        $_SESSION['msg'] = $message;
        //echo $message;
        header('location: presentation.php');
    }













?>
