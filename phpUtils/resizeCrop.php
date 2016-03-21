<?php
class resizeCrop {
  //http://stackoverflow.com/questions/1855996/crop-image-in-php
  public function resizeCropImage($src, $dst, $thumb_width, $thumb_height) {
    $type = exif_imagetype($src);
    switch ($type) {
        case 2:
            $image = imagecreatefromjpeg($src);
        break;
        case 3:
            $image = imagecreatefrompng($src);
        break;
    }

    $filename = $dst;

    $width = imagesx($image);
    $height = imagesy($image);

    $original_aspect = $width / $height;
    $thumb_aspect = $thumb_width / $thumb_height;

    if ( $original_aspect >= $thumb_aspect ) {
       // If image is wider than thumbnail (in aspect ratio sense)
       $new_height = $thumb_height;
       $new_width = $width / ($height / $thumb_height);
    } else {
       // If the thumbnail is wider than the image
       $new_width = $thumb_width;
       $new_height = $height / ($width / $thumb_width);
    }

    $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

    // Resize and crop
    imagecopyresampled($thumb,
                       $image,
                       0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                       0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                       0, 0,
                       $new_width, $new_height,
                       $width, $height);
    imagejpeg($thumb, $filename, 80);
  }
}
