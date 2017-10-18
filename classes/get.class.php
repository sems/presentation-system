<?php
require_once "classes/general.class.php";

class Get extends General
{
    public function getUsers() {
        $response = General::getApi("/api/Account");
        return $response;
    }
    public function getFrame() {
        $response = General::getApi("/api/Frame");
        //$frameresponse;
        return $response;
    }
}
?>
