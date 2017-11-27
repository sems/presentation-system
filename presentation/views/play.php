<?php
    require_once "classes/play.class.php";
    require_once "classes/receiver.class.php";
    require_once "classes/frame.class.php";
    session_start();

    $key = $_SESSION['key'];
?>

<?php
if(!isset($_POST['selectedItem'])) {
    ?>
<form method="post" action="#">

    <select name="selectedItems">
    <?php
    $receivers = Receiver::getReceivers($key);
        foreach($receivers as $r){
            ?>
        <option value="<?php echo $r["id"]; ?>"><?php echo $r["name"]; ?></option>
    <?php
        }
    ?>
</select>
    <button name="send" class="selected">Ok</button>
    </form>
<?php
}

    // echo $idToView."<br/>";
    else {
        if(isset($_POST["send"])){

        //something posted

        if ($idToView == "sel" || $idToView == "NaN" || $idToView == "") {
            $message = "Maak aub een geldige keuze";
            //echo $message;
            $_SESSION['msg'] = $message;
            //header('location: select.php');
        } else {
            $getPresentation =  Play::getPlay($idToView, $key);
            $getPresentation = json_decode($getPresentation);

            function checkRemoteFile($url) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                // don't download content
                curl_setopt($ch, CURLOPT_NOBODY, 1);
                curl_setopt($ch, CURLOPT_FAILONERROR, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                if(curl_exec($ch)!==FALSE) {
                    return true;
                }
                else {
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
            <div class="lightbox">
                <div class="lb-images">
                    <div class="slider">
                    <?php
                    foreach ($arr as $value) {
                        $n = $getPresentation;
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

                        $localLink  = "http://presentatiesysteem-2017-2018.saldev.nl/img/uploads/".$media;
                        $checkLocal = checkRemoteFile($localLink);
                        ?>
                        <div class="slider__item lb-slides" data-time="<?php echo $duration; ?>">
                            <?php
                            if ($med == true || $med == "1" || $med == 1) {
                                echo "<div class='img-fill'>";
                                    echo '<img src="'.$media.'"/>';
                                echo "</div>";
                            }
                            if ($checkLocal == true || $checkLocal == "1" || $checkLocal == 1) {
                                echo "<div class='img-fill'>";
                                    echo '<img src="'.$localLink.'"/>';
                                echo "</div>";
                            }
                            if (yt_exists($media)) {
                                //  Yep, video is still up and running :)
                                echo "<div class='img-fill'>";
                                    echo '<iframe class="yt_vid" width="" height="" src="https://www.youtube.com/embed/'. $media .'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
                                echo "</div>";
                            }
                            ?>
                            <div class="container_preview">
                                <div class="content">
                                  <header>
                                    <div class="header-container">
                                      <h1 align="center" class="slide-head"><?php echo $title; ?> </h1>
                                      <hr>
                                      <p> <?php echo $text; ?> </p>
                                    </div>
                                  </header>
                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    }
?>
