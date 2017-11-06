<?php
  require_once "classes/frame.class.php";

  //if post does not exists redirect user.
  if($_GET['id'] == ''){
    header('Location: ./');
    exit;
  }

  $key = $_SESSION['key'];
  $viewId = $_GET['id'];
  $r = Frame::frameGet($viewId, $key);

  $search_results = json_decode($r);
  if ($search_results === NULL) die('Error parsing json');
  //print_r($search_results);


  $media = "http://presentatiesysteem-2017-2018.saldev.nl/img/uploads/".$search_results->media;
  $title = $search_results->title;
  $text = $search_results->text;

?>
<div class="container_preview">
  <div class="header-img">
    <div class="img-croppper">
      <?php
        echo '<img class="preview_image" img src="'.$media.'" alt="'.$title.'">';
      ?>
    </div>
  </div>
  <div class="content">
    <header>
      <div class="header-container">
        <h1 align="center" class="slide-head"><?php echo $title; ?> </h1>
        <hr>
        <p> <?php echo $text; ?> </p>
      </div>
    </header>
  </div>

</div>
