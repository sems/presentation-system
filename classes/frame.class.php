<?php
require_once "classes/general.class.php";
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

    public function frameCreate($data) {
        // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
        // Graag ook op deze manier schrijven, inclusief the inditatiesl
        /*
            $data = array(
                'Title' => $_POST['title'],
                'orderIndex' => $_POST['orderIndex'],
                'duration' => $_POST['duration'],
                'media' => $_POST['media'],
                'text' => $_POST['text']
            );
        */
        $fCreate = General::postApi($data, "/api/frame/Create");
        return $fCreate;
    }

    public function frameDelete($dataId , $key)
    {
        // Call with General::deleteID("3");
        $job = "/api/Frame/".$dataId;
        General::deleteApi($job, 1, $key);
    }
}

 ?>
