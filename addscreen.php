<?php
require_once "classes/receiver.class.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rData = array(
        'UserId' => $_POST['add_screen_user_id'],
        'Name' => $_POST['add_screen_name'],
        'Active' => $_POST['add_screen_active']
    );
    // If success with the ReCaptcha
    $aCreate = Receiver::createReceiver($rData, $rData);
}
 ?>
