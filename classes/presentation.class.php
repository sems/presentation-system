<?php
require_once "classes/general.class.php";
/**
 *
 */
class Presentation extends General
{
    public function createPresentation($data, $key) {
        /*
        $data = array(
            'name' => $_POST['name'],
            'companyId' => $_POST['company_id'],
            'frame1' => $_POST['frame_1'],
            'frame2' => $_POST['frame_2'],
            'frame3' => $_POST['frame_3'],
            'frame4' => $_POST['frame_4'],
            'frame5' => $_POST['frame_5'],
            'frame6' => $_POST['frame_6'],
            'frame7' => $_POST['frame_7'],
            'frame8' => $_POST['frame_8'],
            'frame9' => $_POST['frame_9'],
            'frame10' => $_POST['frame_10']
        );
        */
        $response = General::postApi($data, "/api/Presentation/Create", 1, $key);
        return $response;
    }

    public function editPresentation($data, $dataID, $key) {
        /*
        $data = array(
            'name' => $_POST['name'],
            'companyId' => $_POST['company_id'],
            'frame1' => $_POST['frame_1'],
            'frame2' => $_POST['frame_2'],
            'frame3' => $_POST['frame_3'],
            'frame4' => $_POST['frame_4'],
            'frame5' => $_POST['frame_5'],
            'frame6' => $_POST['frame_6'],
            'frame7' => $_POST['frame_7'],
            'frame8' => $_POST['frame_8'],
            'frame9' => $_POST['frame_9'],
            'frame10' => $_POST['frame_10']
        );
        */
        $response = General::putApi($data, "/api/Presentation/".$dataID, 1, $key);
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
