<?php
require_once "classes/general.class.php";

class Get extends General
{
    public function getUsers() {
        $response = General::getApi("/api/Account");
        return $response;
    }
    public function getFrame() {
        $frameresponse = General::getApi("/api/Frame");
        //$frameresponse;
        $output = json_decode($frameresponse);
    }
}
?>
