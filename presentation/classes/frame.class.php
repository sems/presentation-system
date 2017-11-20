<?php
require_once $_SERVER['DOCUMENT_ROOT']."/presentatiesysteem/classes/general.class.php";
/**
 *
 */
class Frame extends General
{

    public function getFrames() {
        $response = General::getApi("/api/Frame", 0);
        //$frameresponse;
        return $response;
    }

    public function frameCreate($data, $key) {
        // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
        // Graag ook op deze manier schrijven, inclusief the inditatiesl
        /*
            $data = array(
                'Title' => $_POST['title'],
                'duration' => $_POST['duration'],
                'media' => $_POST['media'],
                'text' => $_POST['text']
            );
        */
        $fCreate = General::postApi($data, "/api/frame/Create", 1, $key);
        return $fCreate;
    }

    public function frameDelete($dataId , $key)
    {
        // Call with General::deleteID("3");
        $job = "/api/Frame/".$dataId;
        General::deleteApi($job, 1, $key);
    }

    public function frameEdit($data, $dataID, $key)
    {
        /*
        $data = array(
            'id' => '2',
            'Title'=>'wow',
            'duration'=>'32',
            'media'=>'www.evv',
            'text'=>'tewvwevwel grgwvwe'
        );
        */
        $editResponse = General::putApi($data, "/api/Frame/".$dataID, 1, $key);
        return $editResponse;
    }

    public function frameGet($dataID, $key)
    {
        // accountGet(1, 1, $key)
        $getFrame = General::getApi("/api/frame/".$dataID, 1, $key);
        return $getFrame;
    }
}

 ?>
