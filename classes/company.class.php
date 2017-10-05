<?php
require_once "classes/general.class.php";
/**
 *
 */
class Company extends General
{

    public function companyCreate($data) {
        // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
        // Graag ook op deze manier schrijven, inclusief the inditatiesl
        /*
            $data = array()
              "Name": "Landstede",
              "Email": "info@landstede.nl",
              "Phone": "074 - 689 2458",
              "Address": "Zwolsestraat 63A",
              "City": "Raalte",
              "Country": "Nederland",
              "Website": "www.landstede.net"
            );
        */
        General::postApi($data, "/api/Company");
    }

    public function companyDelete($dataId)
    {
        // Call with General::deleteID("3");
        $job = "/api/Account/".$dataId;
        General::deleteApi($job);
    }
}

?>
