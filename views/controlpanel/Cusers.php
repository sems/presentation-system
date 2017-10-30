<?php
require_once 'menu.php';
require_once "classes/account.class.php";
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
    <table class="user-table" method="get">
        <tr>
            <th>Id</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $r = Account::getUsers();

            $search_results = json_decode($r, true);
            if ($search_results === NULL) die('Error parsing json');
            //print_r($search_results);

            foreach ($search_results as $data) {

                $id = $data["id"];
                $name = $data["name"];
                $email = $data["email"];
                echo "<tr>";
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$email.'</td>';
                    echo "<td>";
                        echo '<button class="btn btn-primary btn-edit-user" type="submit" name="edit" value="'.$id.'" >Bewerken</button>';
                    echo "</td>";
                    echo "<td>";
                        echo '<button class="btn btn-del btn-del-user" type="submit" name="id" value="'.$id.'" >Verwijderen</button>';
                    echo "</td>";
                echo "</tr>";
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
