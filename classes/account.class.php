<?php

/**
 *
 */
class Account extends General
{

    public function accountAanmaken($data) {
        // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
        // Graag ook op deze manier schrijven, inclusief the inditatiesl
        /*
            $data = array(
                'Name' => $_POST['b_name'],
                'Email' => $_POST['b_email'],
                'Password' => $_POST['b_password']
            );
        */
        postApi($data, "/api/account/create");
    }
    public function accountLogin($data) {
        /*
            $data = array(
                'Email' => $_POST['l_email'],
                'Password' => $_POST['l_password']
            );
        */
        $loginResponse = General::postApi($data, "/api/account/login");
        if ($loginResponse === "false") {
            return false;
        } else {
            return true;
        }
    }

    public function deleteAccount($dataId)
    {
        // Call with General::deleteID("3");
        $job = "/api/Account/".$dataId;
        $this->deleteApi($job);
    }
}
?>
