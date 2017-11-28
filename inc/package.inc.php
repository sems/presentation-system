<?php
    if (isset($_SESSION['logged_in']) && (time() - $_SESSION['logged_in'] > 28800)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
    }
    $template 	= "template.php";
?>
