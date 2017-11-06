<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/select.php";

    $viewId = $_GET['id'];

    


    //if post does not exists redirect user.
    if($row['id'] == ''){
        header('Location: ./');
        exit;
    }

    include_once $template;
?>
