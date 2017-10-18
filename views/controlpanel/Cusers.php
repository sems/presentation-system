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
            <th>Change</th>
            <th>Delete</th>
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
                    echo "<td><a href='/editpage?id=".$data['id']."'> Edit</a></td>";
                    echo "<td>";
                        echo '<form action="deleteuser.php?id='.$id.' method="GET">';
                            echo '<button class="btn btn-primary" type="submit" name="id" value="'.$id.'" >Verwijderen</button>';
                        echo '</form>';
                    echo "</td>";
                echo "</tr>";
            }

        ?>
    </table>

</div>
