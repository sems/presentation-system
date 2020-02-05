<?php
    require_once "classes/presentation.class.php";
	session_start();
    //$idToView = $_POST['selectedItem'];
    //echo $idToView;
?>
<div class="container">
    <?php print(getAlert()); ?>
	<div class="selected-item">
		<p>Select Presentation </p>
	</div>
    <form class="pres_start" action="selectpresentation.php" method="POST">
        <select name="view" id="cusSelectbox">
          <option disabled value="sel">Select</option>
          <?php
        		$key = $_SESSION['key'];
        		$r = Presentation::getPresentations($key);

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
	</div>
