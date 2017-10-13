<?php
require_once "classes/general.class.php";

class Get extends General
{
    public function getUsers() {
        General::getApi("/api/Account");
    }
    public function getFrame() {
        General::getApi("/api/Frame");
    }
}
?>
