<?php
if(isSet($_SESSION['msg'])){
    //Access your POST variables
    $temp = $_SESSION['msg'];
    ?>
    <div class="alert"><?php  echo $temp; ?></div>
    <?php
    //Unset the useless session variable
    unset($_SESSION['msg']);
}
if(isSet($_SESSION['dngr_msg'])){
    //Access your POST variables
    $temp = $_SESSION['dngr_msg'];
    ?>
    <div class="error"><?php  echo $temp; ?></div>
    <?php
    //Unset the useless session variable
    unset($_SESSION['dngr_msg']);
}
?>
