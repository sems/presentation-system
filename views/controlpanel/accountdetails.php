<?php require_once 'menu.php'; ?>
<div class="c_container">
  <?php include 'inc/error.php'; ?>
  <h3>Account gegevens</h3>
  <?php
   $userid = $_SESSION['userid'];
   echo $userid;
   ?>
</div>
