<?php
require_once 'menu.php';
require_once "classes/account.class.php";
?>
<div class="c_container">
    <?php include 'inc/error.php'; ?>
    <h3>Account gegevens</h3>
    <?php
        $key = $_SESSION['key'];
        $r = Account::getUsers($key);

        $search_results = json_decode($r, true);
        if ($search_results === NULL) die('Error parsing json');
        $results = $search_results["data"];
        if (empty($results) ) {
            $message = "Er zijn geen gebruiker gevonden voor u bedrijf.";
            //Dump your POST variables
            $_SESSION['dngr_msg'] = $message;
            exit();
        } else {
            //print_r($results) ;
            print_r($results[0]);
        }
    ?>
</div>
