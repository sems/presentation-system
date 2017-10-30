<?php
require_once "classes/general.class.php";
/**
 *
 */
class Frame extends General
{

    public function getFrame() {
        $response = General::getApi("/api/Frame", 0);
        //$frameresponse;
        return $response;
    }
}

 ?>
