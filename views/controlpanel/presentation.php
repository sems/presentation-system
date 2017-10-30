<?php
    require_once 'menu.php';
    require_once "classes/frame.class.php";
?>
<div class="c_container">
    <?php
    if(isSet($_SESSION['msg'])){
        //Access your POST variables
        $temp = $_SESSION['msg'];
        echo $temp."<br/>";
        //Unset the useless session variable
        unset($_SESSION['msg']);
    }?>
    <button type="button" class="btn-pre-add btn-primary btn" name="button">Frame aanmaken</button>
    <table class="user-table" method="get">
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Positie</th>
            <th>Lengte</th>
            <th>Media</th>
            <th>Tekst</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $r = Frame::getFrame();

            $search_results = json_decode($r, true);
            if ($search_results === NULL) die('Error parsing json');
            //print_r($search_results);

            foreach ($search_results as $data) {

                $id = $data["id"];
                $order = $data["orderIndex"];
                $duration = $data["duration"];
                $title = $data["title"];
                $media = $data["media"];
                $tekst = $data["text"];
                echo "<tr>";
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$title.'</td>';
                    echo '<td>'.$order.'</td>';
                    echo '<td>'.$duration.'</td>';
                    echo '<td>'.$media.'</td>';
                    echo '<td>'.$tekst.'</td>';
                    echo "<td>";
                        echo '<button class="btn btn-edit" type="submit" name="edit" value="'.$id.'" >Bewerken</button>';
                    echo "</td>";
                    echo "<td>";
                        echo '<button class="btn btn-primary btn-del" type="submit" name="id" value="'.$id.'" >Verwijderen</button>';
                    echo "</td>";
                echo "</tr>";
            }

        ?>
    </table>
    <?php
    $url = 'https://www.youtube.com/watch?v=t-601tSRnfE';
    preg_match(
        '/[\\?\\&]v=([^\\?\\&]+)/',
        $url,
        $matches
    );
    $ids = $matches[1];

    $width = '640';
    $height = '385';
    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $ids .'" frameborder="0" allowfullscreen></iframe>';
    ?>
</div>




<div class="pre-add-modal">
  <header>Aanmaken</header>
  <div class="content">
    <form method="post" action="POST">
      <p>Frame aanmaken</p>
      <div class='field'>
        <label for="title">Titel<span class="required">*</span></label>
        <input required name="title" type='text' id="title"/>
      </div>
      <div class='field'>
        <label for="orderIndex">Plaats in presentatie(bijv. 1, 2 of 3)<span class="required">*</span></label>
        <input required name="orderIndex" type='text' />
      </div>
      <div class='field'>
        <label for="duration">Looptijd(in seconden)<span class="required">*</span></label>
        <input required name="duration" type='text' />
      </div>
      <div class='field'>
        <label for="media">Video of afbeelding (url) </label>
        <input name="media" type='text' />
      </div>
      <div class='field'>
        <label for="text">Omschrijving</label>
        <textarea name="text" rows="8" cols="80"></textarea>
      </div>
      <div class='field'>
        <input type='submit' class='btn-primary' value="Aanmaken" />
      </div>
    </form>
  </div>
</div>

<div class='del-modal'>
    <header>Verwijderen</header>
    <div class='content'>
        <form action="deleteslide.php" method="POST">
            <p>Weet u zeker dat u dit scherm wil verwijderen.</p>

            <input class="in-awnser" name="idtodel" type="hidden" value="">

            <button class="btn btn-primary" type="submit" name="delno" >Annuleer</button>

            <button class="btn btn-danger " type="submit" name="delyes" >Verwijder</button>

        </form>

    </div>
</div>

<div class='edit-modal'>
    <header>Bijwerking</header>
    <div class='content'>
        <form action="editslide.php" method="POST">
            <input class="in-awnser" name="idtoedit" type="hidden" value="">
            <div class='field'>
				<label for="edit_slide_index">OrderIndex<span class="required">*</span></label>
				<input required id="edit_slide_index" name="edit_slide_index" type='text' />
			</div>
			<div class='field'>
				<label for="edit_slide_title">Title<span class="required">*</span></label>
				<input required id="edit_slide_title" name="edit_slide_title" type='text' />
			</div>
            <div class='field'>
				<label for="edit_slide_text">Text<span class="required">*</span></label>
				<input required id="edit_slide_text" name="edit_slide_text" type='text' />
			</div>
            <div class='field'>
				<label for="edit_slide_dur">Duration<span class="required">*</span></label>
				<input required id="edit_slide_dur" name="edit_slide_dur" type='text' />
			</div>
            <div class='field'>
				<label for="edit_slide_media">Media<span class="required">*</span></label>
				<input required id="edit_slide_media" name="edit_slide_media" type='text' />
			</div>

            <div class='field'>
				<input name="b_edit_submit" type='submit' class='btn btn-primary' value="Bijwerken" />
			</div>
            <p>Velden met een <span class="required">*</span> zijn verplicht.</p>
        </form>

    </div>
</div>
