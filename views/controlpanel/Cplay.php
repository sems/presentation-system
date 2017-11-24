<?php
require_once 'menu.php';
require_once "classes/account.class.php";
 ?>
<div class="c_container">
    <?php include 'inc/error.php'; ?>
    <table class="user-table" method="get">
        <tr>
            <th>Id</th>
            <th>CompanyId</th>
            <th>ReceiverId</th>
            <th>PresentationId</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $key = $_SESSION['key'];
            $r = Play::getPlays($key);

            $search_results = json_decode($r, true);
            if ($search_results === NULL){
                echo 'Error parsing json';
                die();
            } 
            $results = $search_results;

            if (empty($results) ) {
              $message = "Er zijn geen afspelende presentaties gevonden voor uw bedrijf.";
              //Dump your POST variables
              $_SESSION['msg'] = $message;
              exit();
            } else {
              foreach ($results as $data) {
                  $id = $data["Id"];
                  $receiverid = $data["ReceiverId"];
                  $companyid = $data["CompanyId"];
                  $presentationid = $data["PresentationId"];
                  echo "<tr>";
                      echo '<td>'.$id.'</td>';
                      echo '<td>'.$receiverid.'</td>';
                      echo '<td>'.$companyid.'</td>';
                    echo '<td>'.$presentationid.'</td>';
                      echo "<td>";
                          echo '<button class="btn btn-edit" type="submit" name="edit" value="'.$id.'" >Bewerken</button>';
                      echo "</td>";
                      echo "<td>";
                          echo '<button class="btn btn-del" type="submit" name="id" value="'.$id.'" >Verwijderen</button>';
                      echo "</td>";
                  echo "</tr>";
              }
            }
        ?>
    </table>
</div>
<div class='del-modal'>
    <header>Verwijderen</header>
    <div class='content'>
        <form action="deleteuser.php" method="POST">
            <p>Weet u zeker dat u dit account wil verwijderen.</p>

            <input class="in-awnser" name="idtodel" type="hidden" value="">

            <button class="btn btn-primary" type="submit" name="delno" >Annuleer</button>

            <button class="btn btn-danger " type="submit" name="delyes" >Verwijder</button>


        </form>

    </div>
</div>
<div class='edit-modal'>
    <header>Bijwerking</header>
    <div class='content'>
        <form action="edituser.php" method="POST">

            <input class="in-awnser" name="idtoedit" type="hidden" value="">
            <div class='field'>
				<label for="username">Gebruikers naam<span class="required">*</span></label>
				<input required name="b_edit_name" type='text' id="username" />
			</div>
			<div class='field'>
				<label for="email">Email Address<span class="required">*</span></label>
				<input required name="b_edit_email" type='email' />
			</div>
			<div class='field'>
				<label for="password">Wachtwoord<span class="required">*</span></label>
				<input required name="b_edit_password" type='password' />
			</div>
			<div class='field'>
				<label for="password">Herhaal wachtwoord<span class="required">*</span></label>
				<input required name="b_edit_repeat_password" type='password' />
			</div>
            <div class='field'>
				<input name="b_edit_submit" type='submit' class='btn btn-edit' value="Bijwerken" />
			</div>
            <p>Velden met een <span class="required">*</span> zijn verplicht.</p>
        </form>

    </div>
</div>
