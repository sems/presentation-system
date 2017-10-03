<?php
require_once "classes/general.class.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'Name' => $_POST['b_name'],
        'Email' => $_POST['b_email'],
        'Password' => $_POST['b_password']
    );
    General::accountAanmaken($data);
} 
