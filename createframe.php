<?php
    include "inc/img.php";
    require_once "classes/frame.class.php";

    session_start();

    if(isset($_POST['createframe'])) {

        $imgLink = $_POST["img_link"];
        $ytLink = $_POST["yt_link"];

        if( !is_uploaded_file($_FILES['afbeelding']['tmp_name']) && empty($imgLink) && empty($ytLink) ) {
            //: Er is geen img gepost.
            $data = array(
                'Title' => $_POST['title'],
                'duration' => $_POST['duration'],
                'media' => NULL,
                'text' => $_POST['text']
            );
            $message = "Het frame is goed toegevoegd.";
        } elseif (!is_uploaded_file($_FILES['afbeelding']['tmp_name']) && $imgLink!="" && empty($ytLink) && !empty($imgLink)) {
            //: Er is geen img gepost.
            $data = array(
                'Title' => $_POST['title'],
                'duration' => $_POST['duration'],
                'media' => $imgLink,
                'text' => $_POST['text']
            );
            $message = "Het frame is goed toegevoegd, met een directe link..";
        } elseif (isset($ytLink) || $ytLink!="") {
            $url = $ytLink;
            preg_match(
                '/[\\?\\&]v=([^\\?\\&]+)/',
                $url,
                $matches
            );
            $ids = $matches[1];

            $width = '640';
            $height = '385';
            $fullframe =  '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $ids .'?autoplay=1" frameborder="0" allowfullscreen></iframe>';

            //: Er is geen img gepost.
            $data = array(
                'Title' => $_POST['title'],
                'duration' => $_POST['duration'],
                'media' => $fullframe,
                'text' => $_POST['text']
            );
            $message = "Frame is succesvol aangemaakt, met YouTube.";
        } else {
            $afbeelding = $_FILES["afbeelding"];
            if(isSet($afbeelding) && $afbeelding["error"] === 0) {
                // alles ging goed
                $name = $afbeelding["name"];
                $file = $afbeelding["tmp_name"]; // move_uploaded_file
                $size = $afbeelding["size"];

                $data = file_get_contents($file); // lees de inhoud van een bestand
                $gd   = @imageCreateFromString($data); // de @ onderdrukt waarschuwingen
                if($gd) {
                  // nieuw formaat berekenen!
                  $nieuweAfbeelding = scaleImage($gd, 1024, 1024); // maximaal 1024x1024 pixels!!
                  if($nieuweAfbeelding) {
                      imageDestroy($gd); // het origineel sluiten en verder werken met de geschaalde afbeelding
                      $gd = $nieuweAfbeelding;
                  }

                  // nieuwe bestandsnaam bepalen, deze moet uniek zijn.
                  $bestand = "image_".time().sha1_file($file).".png";
                  //echo $bestand."<br/>";
                  // doelmap bepalen
                  $doel = realPath("img/uploads").DIRECTORY_SEPARATOR.$bestand;
                  //echo $doel;
                  // afbeelding opslaan
                  imagePNG($gd, $doel);

                  // Return
                  $message = "Frame is succesvol aangemaakt, met afbeelding.";
                  //$message .= "Bestand is geüpload als ".$bestand;

                  // afbeelding weer sluiten
                  imageDestroy($gd);

                  // tijdelijke upload verwijderen, die hebben we niet meer nodig.
                  unlink($file);

                  $data = array(
                      'Title' => $_POST['title'],
                      'duration' => $_POST['duration'],
                      'media' => $bestand,
                      'text' => $_POST['text']
                  );
                } else {
                    $message = "Bestand is niet in een juist format, probeer PNG, JPEG, BMP of GIF.";
                }
            } else {
                $message = "Bestand niet juist geüpload, het bestand moet kleiner zijn dan 2MiB";
            }
        }

        //Dump your POST variables
        $_SESSION['msg'] = $message;
        // Adding with the api
        $token = $_SESSION['key'];
        $r = Frame::frameCreate($data, $token);
        header( 'location: frames.php');
    } else {
        $message = "Er is geen POST. Neem contact op met uw site adminstrator";
        //Dump your POST variables
        $_SESSION['msg'] = $message;
        //echo $message;
        header('location: frames.php');
    }













?>
