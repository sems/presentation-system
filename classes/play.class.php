<?php
require_once "classes/general.class.php";
/**
 *
 */
class Play extends General
{
    public function createPlay($data,$key) {
        $response = General::postApi($data, "/api/Play/Create", 1, $key);
        return $response;
    }

    public function editPlay($data, $dataID, $key) {
        /*
        $data = array(
            'Id'=>$id;
            'Name'=>'Woonkamer',
            'Active'=>'true'
        );
        */
        $response = General::putApi($data, "/api/Play".$dataID, 1, $key);
        return $response;
    }

    public function deletePlay($dataId, $key)
    {
        // Call with Receiver::deleteReceiver("3");
        $deleteResponse = General::deleteApi("/api/Play/".$dataId, 1, $key);
        return $deleteResponse;
    }

    public function getPlay($dataID, $key)
    {
        // getReceiver(1, 1, $key)
        $getPlay = General::getApi("/api/Play/".$dataID, 1, $key);
        return $getPlay;
    }
    public function getPlay($key) {
        $response = General::getApi("/api/Play", 1, $key);
        return $response;
    }



}


 ?>
