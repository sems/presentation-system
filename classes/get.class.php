<?php
require_once "classes/general.class.php";

class Get extends General
{
    public function getUsers() {
        General::getApi("/api/Account");
    }
    public function getFrame() {
        $frameresponse = General::getApi("/api/Frame");
        //$frameresponse;
        $output = json_decode($frameresponse);
    }
}
?>
