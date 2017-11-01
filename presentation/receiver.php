<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/viewpost.php";

    try {
        $stmt = $db->prepare('SELECT * FROM portfolio WHERE id = :id');
        $stmt->execute(array(':id' => $_GET['id']));
        $row = $stmt->fetch();
    } catch(PDOException $e) {
        //Gives the error message if possible.
         echo "Error: " . $e->getMessage();
    };


    //if post does not exists redirect user.
    if($row['id'] == ''){
        header('Location: ./');
        exit;
    }

    include_once $template;
?>
