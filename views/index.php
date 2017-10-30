<div class="container">
    <h1>Welkom bij Knoop!</h1>
    <?php
    if(isSet($_SESSION['key'])){
        //Access your POST variables
        $key = $_SESSION['key'];
        echo $key."<br/>";
    }else {
        echo "Er is geen token";
    }
    ?>
</div>
