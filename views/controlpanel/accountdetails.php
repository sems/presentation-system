<?php require_once 'menu.php'; ?>
<div class="c_container">
  <?php
  if(isSet($_SESSION['msg'])){
      //Access your POST variables
      $temp = $_SESSION['msg'];
      ?>
      <div class="alert"><?php  echo $temp; ?></div>
      <?php
      //Unset the useless session variable
      unset($_SESSION['msg']);
  }?>
  <h3>Account gegevens</h3>
  <?php
   $userid = $_SESSION['userid'];
   echo $userid; 
   ?>
</div>
