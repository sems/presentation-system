<?php
    require_once "classes/presentation.class.php";
		session_start();

    $idToView = $_POST['selectedItem'];
    echo $idToView."<br/>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        $key = $_SESSION['key'];
        if ($idToView == "sel" || $idToView == "NaN" || $idToView == "") {
          $message = "Maak aub een geldige keuze";
          //echo $message;
          header('location: select.php');
        } else {
          $getPresentation =  Presentation::getPresentation($idToView, $key);
          echo $getPresentation->id;
        }
        $_SESSION['msg'] = $message;
        print_r($getPresentation);
    }
?>
