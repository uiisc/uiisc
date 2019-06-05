<?php

session_start();

header("Content-type: image/png");

$font_file = 'fonts/elephant.ttf';

$width = 160;
$height = 30;
$image = imagecreate($width, $height);

imagecolorallocate($image, 238, 238, 238); // background color
$font_color = imagecolorallocate($image, 0, 0, 0);
$line_color = imagecolorallocate($image, 255, 0, 0);
$point_color = imagecolorallocate($image, 255, 255, 255);

// add point to image
for ($i = 0; $i < $width; $i++) {
    imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), $point_color);
}
// add line to image
for ($i = 0; $i < 10; $i++) {
    imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $line_color);
}
// add text to image
$range_chars = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
$code = '';
for ($i = 0; $i < 4; $i++) {
    $str = $range_chars[rand(0, 61)]; // 62 chars: 0-9 and a-z and A-Z
    $code = $code . $str;
    $a = $width / 5 * $i;
    $b = $width / 5 * ($i + 1);
    imagettftext($image, 20, 0, mt_rand($a, $b), mt_rand(20, 30), $font_color, $font_file, $str);
}

$_SESSION['admincaptchacode'] = $code;

imagepng($image);
imagedestroy($image);
