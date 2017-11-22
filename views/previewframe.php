<?php
  require_once "classes/frame.class.php";

  //if post does not exists redirect user.
  if($_GET['id'] == ''){
    header('Location: controlpanel');
    exit;
  }

  $key = $_SESSION['key'];
  $viewId = $_GET['id'];
  $r = Frame::frameGet($viewId, $key);
  $search_results = json_decode($r, true);
  if ($search_results === NULL) die('Error parsing json');

  function checkRemoteFile($url) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$url);
      // don't download content
      curl_setopt($ch, CURLOPT_NOBODY, 1);
      curl_setopt($ch, CURLOPT_FAILONERROR, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      if(curl_exec($ch)!==FALSE) {
          return true;
      }
      else {
          return false;
      }
  }
  function yt_exists($videoID) {
      $theURL = "http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$videoID&format=json";
      $headers = get_headers($theURL);

      return (substr($headers[0], 9, 3) !== "404");
  }

  print_r($search_results);


  $title     = $search_results["title"];
  $text      = $search_results['text'];
  $duration  = $search_results["duration"]*1000;
  $media     = $search_results["media"];
  $med       = checkRemoteFile($media);

  $localLink  = "http://presentatiesysteem-2017-2018.saldev.nl/img/uploads/".$media;
  $checkLocal = checkRemoteFile($localLink);

?>
<?php
if ($med == true || $med == "1" || $med == 1) {
    echo '<img id="bg" class="bgwidth" src="'.$media.'"/>';
}
if ($checkLocal == true || $checkLocal == "1" || $checkLocal == 1) {
    echo '<img id="bg" class="bgwidth" src="'.$localLink.'"/>';
}
if (yt_exists($media)) {
    //  Yep, video is still up and running :)
    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $media .'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
}
?>
<div class="container_preview">
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
