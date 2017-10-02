<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'Name' => $_POST['b_name'],
        'Email' => $_POST['b_email'],
        'Password' => $_POST['b_password']
    );
    $data_json = json_encode($data);
    $ch = curl_init('http://localhost:63502/api/account/aanmaken');

    curl_setopt($ch, CURLOPT_URL, 'http://localhost:63502/api/account/aanmaken');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response  = curl_exec($ch);

    curl_close($ch);
    echo $response;
}



 ?>
