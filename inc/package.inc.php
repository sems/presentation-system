<?php
    if (isset($_SESSION['logged_in']) && (time() - $_SESSION['logged_in'] > 28800)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
    }
    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo "<script>console.log( '%c Debug Objects: ".$output ."', 'background: #F00; color: #FF0' );</script>";
    }
    $template 	= "template.php";
?>
