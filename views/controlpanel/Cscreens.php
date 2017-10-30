<?php
    require_once 'menu.php';
    require_once "classes/receiver.class.php";
?>
<div class="c_container">
    <?php
    if(isSet($_SESSION['msg'])){
        //Access your POST variables
        $temp = $_SESSION['msg'];
        echo $temp."<br/>";
        //Unset the useless session variable
        unset($_SESSION['msg']);
    }
    ?>
    <button class="btn btn-add" type="submit" name="add">Toevoegen</button>
    <table class="user-table" method="get">
        <tr>
            <th>Id</th>
            <th>Gebruikers Id</th>
            <th>Naam</th>
            <th>Actief</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $token = $_SESSION['key'];
            $r = Receiver::getReceivers($token);

            $search_results = json_decode($r, true);
            if ($search_results === NULL) die('Error parsing json');

            foreach ($search_results as $data) {

                $id = $data["id"];
                $userId = $data["userId"];
                $name = $data["name"];
                $active = $data["active"];
                if ($active == 1) {
                    $active = "Ja";
                } else {
                    $active = "Nee";
                };
                echo "<tr>";
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$userId.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$active.'</td>';
                    echo "<td>";
                        echo '<button class="btn btn-edit" type="submit" name="edit" value="'.$id.'" >Bewerken</button>';
                    echo "</td>";
                    echo "<td>";
                        echo '<button class="btn btn-del" type="submit" name="id" value="'.$id.'" >Verwijderen</button>';
                    echo "</td>";
                echo "</tr>";
            }

        ?>
    </table>
</div>

<div class='add-modal'>
    <header>Toevoegen</header>
    <div class='content'>
        <form action="addscreen.php" method="POST">

            <div class='field'>
				<label >Gebruikers ID<span class="required">*</span></label>
				<input required name="add_screen_user_id" type='text' />
			</div>
			<div class='field'>
				<label >Naam<span class="required">*</span></label>
				<input required name="add_screen_name" type='text' />
			</div>
            <div class='field'>
				<label for="planselect">Direct actief?<span class="required">*</span></label>
				<select name="add_screen_active" required id="planselect">
					<option val="" disabled>Kies hier</option>
					<option val="1">Ja</option>
					<option val="0">Nee</option>
				</select>
			</div>
            <div class='field'>
				<input name="b_edit_submit" type='submit' class='btn btn-edit' value="Bijwerken" />
			</div>
            <p>Velden met een <span class="required">*</span> zijn verplicht.</p>
        </form>

    </div>
</div>

<div class='del-modal'>
    <header>Verwijderen</header>
    <div class='content'>
        <form action="deletescreen.php" method="POST">
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
        <form action="editscreen.php" method="POST">

            <input class="in-awnser" name="idtoedit" type="hidden" value="">
			<div class='field'>
				<label for="email">Naam<span class="required">*</span></label>
				<input required name="edit_screen_name" type='text' />
			</div>
            <div class='field'>
				<label for="planselect">Actief?<span class="required">*</span></label>
				<select name="edit_screen_active" required id="planselect">
					<option val="" disabled>Kies hier</option>
					<option val="true">Ja</option>
					<option val="false">Nee</option>
				</select>
			</div>
            <div class='field'>
				<input name="b_edit_submit" type='submit' class='btn btn-primary' value="Bijwerken" />
			</div>
            <p>Velden met een <span class="required">*</span> zijn verplicht.</p>
        </form>

    </div>
</div>
