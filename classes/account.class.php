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
        return $loginResponse;
    }

    public function accountDelete($dataId, $key)
    {
        // Call with General::deleteID("3");
        $job = "/api/Account/".$dataId;
        $deleteResponse = General::deleteApi($job , 1, $key);
        return $deleteResponse;
    }

    public function accountEdit($data, $dataID, $key)
    {
        /*
        $data = array(
            'id' => '2',
            'username'=>'dog',
            'password'=>'tall'
        );
        */
        $editResponse = General::putApi($data, "/api/Account/".$dataID, 1, $key);
        return $editResponse;
    }

    public function accountGet($dataID, $key)
    {
        // accountGet(1, 1, $key)
        $getAccount = General::getApi("/api/Account/".$dataID, 1, $key);
        return $getAccount;
    }

    public function getUsers() {
        $response = General::getApi("/api/Account", 0);
        return $response;
    }
}
?>
