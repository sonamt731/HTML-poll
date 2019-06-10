<?php 

$w = $_GET["w"];

$image = imagecreatetruecolor($w, 30);
$color_rect = imagecolorallocate($image, 240, 230, 140);
imagefilledrectangle($image, 0, 0, 0, 0, $color_rect);
header('content-type: image/png');
imagepng($image);

?>