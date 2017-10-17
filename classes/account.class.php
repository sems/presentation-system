<?php
require_once "classes/general.class.php";
/**
 *
 */
class Account extends General
{

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
    public function accountLogin($data) {
        /*
            $data = array(
                'Email' => $_POST['l_email'],
                'Password' => $_POST['l_password']
            );
        */
        $loginResponse = General::postApi($data, "/api/account/login");
        $loginResponse = json_decode($loginResponse);
        return $loginResponse;
    }

    public function accountDelete($dataId)
    {
        // Call with General::deleteID("3");
        $job = "/api/Account/".$dataId;
        General::deleteApi($job);
    }

    public function accountEdit($data, $dataID)
    {
        /*
        $data = array(
            'id' => '2',
            'username'=>'dog',
            'password'=>'tall'
        );
        */
        General::putApi($data, "/api/Account/".$dataID);
    }
}
?>
