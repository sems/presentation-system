<?php
require_once "classes/general.class.php";
/**
 *
 */
class Presentation extends General
{
    public function createPresentation($data, $key) {
      
        $response = General::postApi($data, "/api/Presentation/Create", 1, $key);
        return $response;
    }

    public function editPresentation($data, $dataID, $key) {
        /*
        $data = array(
            'Id'=>$id;
            'Name'=>'Woonkamer',
            'Active'=>'true'
        );
        */
        $response = General::putApi($data, "/api/Presentation".$dataID, 1, $key);
        return $response;
    }

    public function deletePresentation($dataId, $key)
    {
        // Call with Presentation::deletePresentation("3");
        $deleteResponse = General::deleteApi("/api/Presentation/".$dataId, 1, $key);
        return $deleteResponse;
    }

    public function getPresentation($dataID, $key)
    {
        // getPresentation(1, 1, $key)
        $getAccount = General::getApi("/api/Presentation/".$dataID, 1, $key);
        return $getAccount;
    }
    public function getPresentations($key) {
        $response = General::getApi("/api/Presentation", 1, $key);
        return $response;
    }



}


 ?>
