<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- Custom CSS-->
        <link rel="stylesheet" href="css/main.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.8.0/slick.css"/>
        <title><?php echo $sectionActive ?></title>
    </head>
    <body>
        <nav>
            <ul>
                <li class="brand brand-Desktop"><h1>Knoop</h1></li>
                <li class="nav-items <?php if($sectionActive == "Home") { echo "active";} ?> "><a href="/">Home</a></li>
                <li class="nav-items <?php if($sectionActive == "About") { echo "active";} ?> "><a href="about.php">Over ons</a></li>
                <li class="nav-items <?php if($sectionActive == "Prices") { echo "active";} ?> "><a href="prices.php">Prijzen</a></li>
                <li class="nav-items <?php if($sectionActive == "Contact") { echo "active";}?> "><a href="contact.php">Contact</a></li>
                <?php
                    if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false)) {
                        ?><li class="nav-items <?php if($sectionActive == "Login") { echo "active";}?> "><a href="login.php">Login</a></li><?php
                    } else {

                        echo "<li class='nav-items";
                        if($sectionActive == 'Controlpanel') {
                            echo ' active';
                        }
                        echo "'><a href='accountdetails.php'>CP</a></li>";

                        echo "<li class='nav-items'><a href='logout.php'>Logout</a></li>";
                    };

                ?>
            </ul>
        </nav>

        <?php
        include $view;
        include ("inc/footer.php");
        ?>
        <script
          src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
          <script src="js/parallax.min.js"></script>
          <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.8.0/slick.min.js"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>
