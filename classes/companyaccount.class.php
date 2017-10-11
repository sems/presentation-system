<?php
require_once "classes/general.class.php";
/**
 *
 */
class CompanyAccount extends General
{

    public function linkCreate($data) {
        // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
        // Graag ook op deze manier schrijven, inclusief the inditatiesl
        /*
            $data = array(
                'AccountId' => $_POST['b_id'],
                'CompanyId' => $_POST['c_id'],
            );
        */
        $registerResponse = General::postApi($data, "/api/companyaccount");
        return $registerResponse;
    }
}

 ?>
