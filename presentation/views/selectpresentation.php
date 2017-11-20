<?php
    require_once "classes/presentation.class.php";
    require_once "classes/frame.class.php";
    session_start();

    $idToView = $_POST['selectedItem'];
    echo $idToView."<br/>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //something posted
        $key = $_SESSION['key'];
        if ($idToView == "sel" || $idToView == "NaN" || $idToView == "") {
            $message = "Maak aub een geldige keuze";
            //echo $message;
            $_SESSION['msg'] = $message;
            header('location: select.php');
        } else {
            $getPresentation =  Presentation::getPresentation($idToView, $key);
            $getPresentation = json_decode($getPresentation);

            $arr = array(
                "frame1",
                "frame2",
                "frame3",
                "frame4",
                "frame5",
                "frame6",
                "frame7",
                "frame8",
                "frame9",
                "frame10"
            );
            ?>
                <div class="slider">
            <?php
            foreach ($arr as &$value) {
                $n = $getPresentation->data->$value;
                //echo $n;
                $r = Frame::frameGet($n, $key);

                $result = json_decode($r, true);
                //print_r($result);
                if ($result === NULL) {
                    break;
                }
                $title     = $result["title"];
                $text      = $result['text'];
                $duration  = $result["duration"]*1000;
                $media     = $result["media"];

                ?>
                <div class="slider__item" data-time="<?php echo $duration; ?>">
                    <?php
                    echo $title."<br/>";
                    echo $text."<br/>";
                    echo $media."<br/>";
                    ?>
                    <img src="https://play.google.com/books/publish/static/images/google-search.png"/>
                </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
    }
?>
