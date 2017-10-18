<?php
require_once 'menu.php';
require_once "classes/get.class.php";
 ?>
<div class="c_container">
    <?php
    if(isSet($done)){
        echo $done;
    }?><br/>
    <table class="user-table" method="get">
        <tr>
            <th>Id</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $r = Get::getUsers();

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
<div class='del-modal'>
<header>Verwijderen</header>
    <div class='content'>
        <form action="deleteuser.php" method="POST">
            <p>Weet u zeker dat u dit account wil verwijderen.</p>

            <button class="btn btn-primary btn-awnser" type="submit" name="delyes" value="" >Ja</button>
            <button class="btn btn-primary" type="submit" name="delno" value="" >Nee</button>


        </form>

    </div>
</div>
