<?php
    require_once "classes/play.class.php";
    require_once "classes/receiver.class.php";
    require_once "classes/frame.class.php";
    session_start();

if(!isset($_POST['selectedItem'])) {
    ?>
    <div class="selected-item">
		<p>Selecteer het scherm</p>
	</div>
    <form class="pres_start" action="select.php" method="POST">
        <select name="view" id="cusSelectbox">
            <option disabled value="sel">Select</option>
            <?php
                  $key = $_SESSION['key'];
                  $r = Receiver::getReceivers($key);

                  $search_results = json_decode($r, true);
                  if ($search_results === NULL) die('Error parsing json');
                  //print_r($search_results);

                  foreach ($search_results as $data) {
                      $name = $data["name"];
                      $id = $data["id"];
                      echo '<option value="'.$id.'">'.$name.'</option>'."\n";
                  }
            ?>
        </select>
        <input type="hidden" name="selectedItem" id="selectedItem" value="">
        <div class="cusSubmit">
            <button class="btn" type="submit" name="id" value="" >Presentatie starten</button>
        </div>
    </form>
<?php
} else {
    // Dit is niet zo goed.
}

?>
