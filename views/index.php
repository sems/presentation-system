<div class="container">
    <h1>Welkom bij Knoop!</h1>
    <?php
    if(isSet($_SESSION['key'])){
        //Access your POST variables
        $key = $_SESSION['key'];
        echo $key."<br/>";
    }
    ?>
</div>
