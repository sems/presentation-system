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

            function checkRemoteFile($url)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                // don't download content
                curl_setopt($ch, CURLOPT_NOBODY, 1);
                curl_setopt($ch, CURLOPT_FAILONERROR, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                if(curl_exec($ch)!==FALSE)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            function yt_exists($videoID) {
                $theURL = "http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$videoID&format=json";
                $headers = get_headers($theURL);

                return (substr($headers[0], 9, 3) !== "404");
            }


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
                $med       = checkRemoteFile($media);
                ?>
                <div class="slider__item" data-time="<?php echo $duration; ?>">
                    <?php
                    echo $title."<br/>";
                    echo $text."<br/>";
                    echo $media."<br/>";
                    echo $med;
                    if ($med == true || $med == "1" || $med == 1) {
                        echo '<img src="'.$media.'"/>';
                    }
                    if (yt_exists($media)) {
                        //  Yep, video is still up and running :)
                        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $media .'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
                    } else {
                        //  These aren't the droids you're looking for :(
                    }
                    ?>

                </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
    }
?>
