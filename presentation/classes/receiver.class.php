<?php
require_once realpath(dirname(__FILE__)."/../../")."/classes/general.class.php";
/**
 *
 */
class Receiver extends General
{
    public function createReceiver($data,$key) {
        $response = General::postApi($data, "/api/Receiver/Create", 1, $key);
        return $response;
    }

    public function editReceiver($data, $dataID, $key) {
        /*
        $data = array(
            'Id'=>$id;
            'Name'=>'Woonkamer',
            'Active'=>'true'
        );
        */
        $response = General::putApi($data, "/api/Receiver".$dataID, 1, $key);
        return $response;
    }

    public function deleteReceiver($dataId, $key)
    {
        // Call with Receiver::deleteReceiver("3");
        $deleteResponse = General::deleteApi("/api/Receiver/".$dataId, 1, $key);
        return $deleteResponse;
    }

    public function getReceiver($dataID, $key)
    {
        // getReceiver(1, 1, $key)
        $getAccount = General::getApi("/api/Receiver/".$dataID, 1, $key);
        return $getAccount;
    }
    public function getReceivers($key) {
        $response = General::getApi("/api/Receiver", 1, $key);
        return $response;
    }



}


 ?>
