<?php
require_once "classes/general.class.php";
public function accountCreate($data) {
    // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
    // Graag ook op deze manier schrijven, inclusief the inditatiesl
    /*
        $data = array(
            'Name' => $_POST['b_name'],
            'Email' => $_POST['b_email'],
            'Password' => $_POST['b_password']
        );
    */
    $registerResponse = General::postApi($data, "/api/account/create");
    return $registerResponse;
}
?>
