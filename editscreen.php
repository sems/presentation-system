<?php
require_once "classes/receiver.class.php";
session_start();

$idToEdit = $_POST['idtoedit'];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_SESSION['key'];
    $rData = array(
        'Id' => $idToEdit,
        'Name' => $_POST['edit_screen_name'],
        'Active' => $_POST['edit_screen_active']
    );
    $rDelete = Receiver::editReceiver($rData, $idToEdit, $key);
    echo $rDelete;
}
 ?>
