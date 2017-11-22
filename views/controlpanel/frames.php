<?php
    require_once 'menu.php';
    require_once "classes/frame.class.php";
    session_start();
    $key = $_SESSION['key'];
?>
<div class="c_container">
    <?php include 'inc/error.php'; ?>
    <button type="button" class="btn-add btn" name="button">Frame aanmaken</button>
    <table class="user-table" method="get">
        <tr>
            <th>Id</th>
            <th>Company id</th>
            <th>Titel</th>
            <th>Lengte</th>
            <th>Media</th>
            <th>Tekst</th>
            <th>Bewerken</th>
            <th>Preview</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $r = Frame::getFrames($key);

            $search_results = json_decode($r, true);
            if ($search_results === NULL) {
            echo 'Geen resultaten';
            }
            //print_r($search_results);

            foreach ($search_results as $data) {

                $id = $data["id"];
                $c_id = $_SESSION['companyId'];
                $duration = $data["duration"];
                $title = $data["title"];
                $media = $data["media"];
                $tekst = $data["text"];
                echo "<tr>";
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$c_id.'</td>';
                    echo '<td>'.$title.'</td>';
                    echo '<td>'.$duration.'</td>';
                    echo '<td>'.$media.'</td>';
                    echo '<td>'.$tekst.'</td>';
                    echo "<td>";
                        echo '<button class="btn btn-edit" type="submit" name="edit" value="'.$id.'" >Bewerken</button>';
                    echo "</td>";
                    echo "<td>";
                        echo '<a class="btn btn-primary" href="previewframe.php?id='.$id.'">Preview</a>';
                    echo "</td>";
                    echo "<td>";
                        echo '<button class="btn btn-primary btn-del" type="submit" name="id" value="'.$id.'" >Verwijderen</button>';
                    echo "</td>";
                echo "</tr>";
            }

        ?>
    </table>
    <button type="button" class="btn-add btn" name="button">Frame aanmaken</button>
</div>




<div class="add-modal">
  <header>Aanmaken</header>
  <div class="content">
    <form action="createframe.php" method="post" enctype="multipart/form-data">
      <p>Frame aanmaken</p>
      <div class='field'>
        <label for="title">Titel<span class="required">*</span></label>
        <input required name="title" type='text' id="title"/>
      </div>
      <div class='field'>
        <label for="duration">Looptijd(in seconden)<span class="required">*</span></label>
        <input required name="duration" type='text' />
      </div>
      <div class='field'>
        <label for="afbeelding">Video of afbeelding. Vul er maar een in. <span class="required">Niet meer als een!</span></label>
        <input name="img_link" type='text' placeholder="http://0xd.nl/troll.png"/>
        <input name="yt_link" type='text' placeholder="https://www.youtube.com/watch?v=W0ay1F3mhOE"/>
        <input type="file" name="afbeelding" />
      </div>
      <div class='field'>
        <label for="text">Omschrijving<span class="required">*</span></label>
        <textarea required name="text" rows="8" cols="80"></textarea>
      </div>
      <div class='field'>
        <input type='submit' name="createframe" class='btn-primary' value="Aanmaken" />
      </div>
    </form>
  </div>
</div>

<div class='del-modal'>
    <header>Verwijderen</header>
    <div class='content'>
        <form action="deleteframe.php" method="POST">
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
        <form action="editframe.php" method="POST">
            <input class="in-awnser" name="idtoedit" type="hidden" value="">
			<div class='field'>
				<label for="edit_slide_title">Title<span class="required">*</span></label>
				<input required id="edit_slide_title" name="edit_slide_title" type='text' />
			</div>
            <div class='field'>
				<label for="edit_slide_dur">Duration<span class="required">*</span></label>
				<input required id="edit_slide_dur" name="edit_slide_dur" type='text' />
			</div>
            <div class='field'>
				<label for="edit_slide_media">Media<span class="required">*</span></label>
				<input id="edit_slide_media" name="edit_slide_media" type='text' />
			</div>
            <div class='field'>
				<label for="edit_slide_text">Text<span class="required">*</span></label>
				<textarea required id="edit_slide_text" name="edit_slide_text"></textarea>
			</div>

            <div class='field'>
				<input name="b_edit_submit" type='submit' class='btn btn-primary' value="Bijwerken" />
			</div>
            <p>Velden met een <span class="required">*</span> zijn verplicht.</p>
        </form>

    </div>
</div>
