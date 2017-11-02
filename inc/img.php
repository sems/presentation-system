<?php
    // Lees: http://php.net/manual/en/book.image.php
    /**
     * Controleert de afmetingen van een afbeelding en zorgt dat ze binnen een bepaald maximum blijven.
     * De proporties van de afmetingen blijven intact
     * @param  object  $imageHandle een afbeelding die geladen is met PHP GD
     * @param  integer $maxWidth    maximum breedte
     * @param  integer $maxHeight   maximum hoogte
     * @return object  een nieuwe afbeelding die werkt met de PHP GD functies, met de nieuwe afmetingen.
     */
    function scaleImage($imageHandle, $maxWidth, $maxHeight) {
        $originalWidth  = $width  = imageSX($imageHandle); // afbeelding breedte
        $originalHeight = $height = imageSY($imageHandle); // afbeelding hoogte

        // Is de afbeelding hoger dan toegestaan?
        if($height > $maxHeight) {
            // Nieuwe breedte berekenen en hoogte is maximum.
            $width  = (($maxHeight / $height) * $width);
            $height = $maxHeight;
        }

        // Is de afbeelding breder dan toegestaan?
        if($width > $maxWidth) {
            // Nieuwe hoogte berekenen en breedte is maximum.
            $height = (($maxWidth / $width) * $height);
            $width  = $maxWidth;
        }

        // Nieuwe afbeelding maken van nieuwe afmetingen
        $image = imageCreateTrueColor($width, $height);
        imageAlphaBlending($image, false);
        imageSaveAlpha($image, true); // transparante kleuren ook opslaan!

        // Afbeelding een nieuwe afmeting geven en tekenen op de nieuwe afbeelding, zodat de oude intact blijft!
        imageCopyResampled($image, $imageHandle, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

        return $image;
    }
?>
