<?php
    include "inc/img.php";
    require_once "classes/frame.class.php";

    session_start();

    if(isset($_POST['createframe'])) {
        //: Het posten van een frame
        if(empty($_FILES['afbeelding'])) {
            //: Er is geen img gepost.
            $data = array(
                'Title' => $_POST['title'],
                'duration' => $_POST['duration'],
                'text' => $_POST['text']
            );
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
                  $nieuweAfbeelding = scaleImage($gd, 500, 500); // maximaal 500x500 pixels!!
                  if($nieuweAfbeelding) {
                      imageDestroy($gd); // het origineel sluiten en verder werken met de geschaalde afbeelding
                      $gd = $nieuweAfbeelding;
                  }

                  // nieuwe bestandsnaam bepalen, deze moet uniek zijn.
                  $bestand = "image_".time().sha1_file($file).".png";
                  echo $bestand."<br/>";
                  // doelmap bepalen
                  $doel = realPath("img/uploads").DIRECTORY_SEPARATOR.$bestand;
                  echo $doel;
                  // afbeelding opslaan
                  imagePNG($gd, $doel);


                  $message = "Frame is succesvol aangemaakt<br/>";
                  $message .= "Bestand is geüpload als ".$bestand;
                  //Dump your POST variables
                  $_SESSION['msg'] = $message;
                  // afbeelding weer sluiten
                  imageDestroy($gd);

                  // tijdelijke upload verwijderen, die hebben we niet meer nodig.
                  unlink($file);
                } else {
                    $bericht = "Bestand is niet in een juist format, probeer PNG, JPEG, BMP of GIF.";
                }
            } else {
                $bericht = "Bestand niet juist geüpload, het bestand moet kleiner zijn dan 2MiB";
            }
            $data = array(
                'Title' => $_POST['title'],
                'duration' => $_POST['duration'],
                'media' => $bestand,
                'text' => $_POST['text']
            );
        }

        // Adding with the api
        $token = $_SESSION['key'];
        $r = Frame::frameCreate($data, $token);
        //echo $message;
        header( 'location: frames.php');
    } else {
        $message = "Er is geen POST. Neem contact op met uw site adminstrator";
        //Dump your POST variables
        $_SESSION['msg'] = $message;
        //echo $message;
        header('location: frames.php');
    }













?>
