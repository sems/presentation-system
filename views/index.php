<div class="container">
    <h1>Welkom bij Knoop!</h1>
    <?php
    if (isset($_GET['message'])){
				$message = $_GET['message'];
				echo $message;
		}
    echo "</br>";
    echo $_SESSION['key'];
    ?>
</div>
