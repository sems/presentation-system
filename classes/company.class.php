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
        $createResponse = General::postApi($data, "/api/Company/Create", 0);
        return $createResponse;
    }

    public function companyDelete($dataId, $key)
    {
        // Call with General::deleteID("3");
        $job = "/api/Account/".$dataId;
        General::deleteApi($job, 1, $key);
    }

    public function accountEdit($data, $dataID, $key)
    {
        /*
        $data = array()
          "Name": "Anders",
          "Email": "info@test.nl",
          "Phone": "074333689 2458",
          "Address": "Zwolsestraat 63A",
          "City": "Zwolle",
          "Country": "Nederland",
          "Website": "www.landstede.nl"
        );
        */
        General::putApi($data, "/api/Company/".$dataID, 1, $key);
    }
}

?>
