<?php require_once 'menu.php'; ?>
<link rel="stylesheet" type="text/css" href="/css/cp.min.css"/>
<div class="c_container">
<button type="button" class="btn-pre-add btn-primary btn" name="button">Frame aanmaken</button>
<?php
if(isSet($done)){
    echo $done;
}?><br/>
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
        $r = Get::getFrame();

        $search_results = json_decode($r, true);
        if ($search_results === NULL) die('Error parsing json');
        //print_r($search_results);

        foreach ($search_results as $data) {

            $id = $data["id"];
            $order = $data["OrderIndex"];
            $duration = $data["duration"];
            $Title = $data["Title"];
            $media = $data["Media"];
            $tekst = $data["Text"];
            echo "<tr>";
                echo '<td>'.$id.'</td>';
                echo '<td>'.$Title.'</td>';
                echo '<td>'.$order.'</td>';
                echo '<td>'.$duration.'</td>';
                echo '<td>'.$media.'</td>';
                echo '<td>'.$tekst.'</td>';
                echo "<td>";
                    echo '<button class="btn btn-primary" type="submit" name="edit" value="'.$id.'" >Bewerken</button>';
                echo "</td>";
                echo "<td>";
                    echo '<button class="btn btn-primary btn-del-user" type="submit" name="id" value="'.$id.'" >Verwijderen</button>';
                echo "</td>";
            echo "</tr>";
        }

    ?>
</table>

</div>




<div class="pre-add-modal">
  <header>
    Aanmaken
  </header>
  <div class="content">
    <form method="post" action="">
      <p>Frame aanmaken</p>
      <?php
          if(isSet($rError)){
              echo $rError;
          }?>
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
        <label for="media">Video(url)</label>
        <input name="media" type='text' />
      </div>
      <div class='field'>
        <label for="text">omschrijving</label>
        <textarea name="text" rows="8" cols="80"></textarea>
      </div>
      <div class='field'>
        <input type='submit' class='btn-primary' value="Aanmaken" />
      </div>
    </form>
  </div>
</div>
