<?php require_once 'menu.php'; ?>
<div class="container">
  <?php
  $responseData = General::getApi("/api/frame");
  print_r($responseData);
  ?>

</div>
