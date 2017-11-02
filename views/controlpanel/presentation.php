<?php
    require_once 'menu.php';
    require_once "classes/presentation.class.php";
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
    <button type="button" class="btn-add btn" name="button">Presentatie aanmaken</button>
    <table class="user-table" method="get">
        <tr>
            <th>Id</th>
            <th>Bedr. ID</th>
            <th>Naam</th>
            <th>Frame 1</th>
            <th>Frame 2</th>
            <th>Frame 3</th>
            <th>Frame 4</th>
            <th>Frame 5</th>
            <th>Frame 6</th>
            <th>Frame 7</th>
            <th>Frame 8</th>
            <th>Frame 9</th>
            <th>Frame 10</th>
        </tr>
        <?php
            $key = $_SESSION['key'];
            $r = Presentation::getPresentations($key);

            $search_results = json_decode($r, true);
            if ($search_results === NULL) die('Error parsing json');
            //print_r($search_results);

            foreach ($search_results as $data) {

                $id = $data["id"];
                $name = $data["name"];
                $companyId = $data["companyId"];
                $frame1 = $data["frame1"];
                $frame2 = $data["frame2"];
                $frame3 = $data["frame3"];
                $frame4 = $data["frame4"];
                $frame5 = $data["frame5"];
                $frame6 = $data["frame6"];
                $frame7 = $data["frame7"];
                $frame8 = $data["frame8"];
                $frame9 = $data["frame9"];
                $frame10 = $data["frame10"];
                echo "<tr>";
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$companyId.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$frame1.'</td>';
                    echo '<td>'.$frame2.'</td>';
                    echo '<td>'.$frame3.'</td>';
                    echo '<td>'.$frame4.'</td>';
                    echo '<td>'.$frame5.'</td>';
                    echo '<td>'.$frame6.'</td>';
                    echo '<td>'.$frame7.'</td>';
                    echo '<td>'.$frame8.'</td>';
                    echo '<td>'.$frame9.'</td>';
                    echo '<td>'.$frame10.'</td>';

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
    <button type="button" class="btn-add btn" name="button">Presentatie aanmaken</button>
</div>




<div class="add-modal">
  <header>Aanmaken</header>
  <div class="content">
    <form action="addpresentation.php" method="post">
      <p>Frame aanmaken</p>
      <div class='field'>
        <label for="title">Titel<span class="required">*</span></label>
        <input required name="name" type='text' id="title"/>
      </div>
      <div class='field'>
        <label for="frame_">CompanyId<span class="required">*</span></label>
        <input required name="company_id" type='text' />
      </div>
      <div class='field'>
        <label for="frame_1">Frame 1<span class="required">*</span></label>
        <input required name="frame_1" type='text' />
      </div>
      <div class='field'>
        <label for="frame_2">Frame 2</label>
        <input required name="frame_2" type='text' />
      </div>
      <div class='field'>
        <label for="frame_3">Frame 3</label>
        <input required name="frame_3" type='text' />
      </div>
      <div class='field'>
        <label for="frame_4">Frame 4</label>
        <input required name="frame_4" type='text' />
      </div>
      <div class='field'>
        <label for="frame_5">Frame 5</label>
        <input required name="frame_5" type='text' />
      </div>
      <div class='field'>
        <label for="frame_6">Frame 6</label>
        <input required name="frame_6" type='text' />
      </div>
      <div class='field'>
        <label for="frame_7">Frame 7</label>
        <input required name="frame_7" type='text' />
      </div>
      <div class='field'>
        <label for="frame_8">Frame 8</label>
        <input required name="frame_9" type='text' />
      </div>
      <div class='field'>
        <label for="frame_9">Frame 9</label>
        <input required name="frame_9" type='text' />
      </div>
      <div class='field'>
        <label for="frame_10">Frame 10</label>
        <input required name="frame_10" type='text' />
      </div>
      <div class='field'>
        <input type='submit' name="createpresentation" class='btn btn-primary' value="Aanmaken" />
      </div>
    </form>
  </div>
</div>

<div class='del-modal'>
    <header>Verwijderen</header>
    <div class='content'>
        <form action="deletePresentation.php" method="POST">
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

        <form action="editpresentation.php" method="POST">
            <input class="in-awnser" name="idtoedit" type="hidden" value="">
              <div class='field'>
                <label for="title">Titel<span class="required">*</span></label>
                <input required name="e_name" type='text' id="title"/>
              </div>
              <div class='field'>
                <label for="frame_">CompanyId<span class="required">*</span></label>
                <input required name="e_company_id" type='text' />
              </div>
              <div class='field'>
                <label for="frame_1">Frame 1<span class="required">*</span></label>
                <input required name="e_frame_1" type='text' />
              </div>
              <div class='field'>
                <label for="frame_2">Frame 2<span class="required">*</span></label>
                <input required name="e_frame_2" type='text' />
              </div>
              <div class='field'>
                <label for="frame_3">Frame 3</label>
                <input name="e_frame_3" type='text' />
              </div>
              <div class='field'>
                <label for="frame_4">Frame 4</label>
                <input name="e_frame_4" type='text' />
              </div>
              <div class='field'>
                <label for="frame_5">Frame 5</label>
                <input name="e_frame_5" type='text' />
              </div>
              <div class='field'>
                <label for="frame_6">Frame 6</label>
                <input name="e_frame_6" type='text' />
              </div>
              <div class='field'>
                <label for="frame_7">Frame 7</label>
                <input name="e_frame_7" type='text' />
              </div>
              <div class='field'>
                <label for="frame_8">Frame 8</label>
                <input name="e_frame_8" type='text' />
              </div>
              <div class='field'>
                <label for="frame_9">Frame 9</label>
                <input name="e_frame_9" type='text' />
              </div>
              <div class='field'>
                <label for="frame_10">Frame 10</label>
                <input name="e_frame_10" type='text' />
              </div>

          <div class='field'>
				    <input name="b_edit_submit" type='submit' class='btn btn-primary' value="Bijwerken" />
			    </div>
            <p>Velden met een <span class="required">*</span> zijn verplicht.</p>
        </form>

    </div>
</div>
