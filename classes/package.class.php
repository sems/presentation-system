<?php
require_once "classes/general.class.php";
/**
 *
 */
class Package extends General
{

    public function packageCreate($data) {
        // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
        // Graag ook op deze manier schrijven, inclusief the inditatiesl
        /*
            $data = array(
                'CompanyId' => $_POST['c_id'],
                'ScreenLimit' => $_POST['c_id'],
                'AccountLimit' => $_POST['c_id'],
            );
        */
        $pCreate = General::postApi($data, "/api/Package/Create");
        return $pCreate;
    }

    public function packageDelete($dataId)
    {
        // Call with General::deleteID("3");
        $job = "/api/Package/".$dataId;
        General::deleteApi($job);
    }
}

 ?>
