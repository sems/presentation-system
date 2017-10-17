<?php require_once 'menu.php';
require_once "classes/get.class.php";
 ?>
<div class="c_container">
  <?php
  Get::getFrame();
  var_dump($output);
  ?>
</div>
