<?php
    $width = 200;
    $height = 200;
    $image = new Imagick('item_pic_original/6a2bfa9800cab51d2c76be727e82f467.png');
    $width_org = $image->getImageWidth();
    $height_org = $image->getImageHeight();
    $ratio = $width_org / $height_org;
    if ($width / $height > $ratio) {
        $width = $height * $ratio;
    } else {
        $height = $width / $ratio;
    }
    $image->scaleImage($width, $height);
    $image->setCompressionQuality(80);
    $image->writeImage('item_pic_compressed/hoihoi.png');
    $image->destroy();
