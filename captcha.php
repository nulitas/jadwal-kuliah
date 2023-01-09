<?php
session_start();

header("Content-type: image/png");
$_SESSION["captcha"] = "";

// tentukan ukuran gambar

$pic = imagecreate(100, 30);
// warna background gambar
imagecolorallocate($pic, 0, 0, 0);
// $grey = imagecolorallocate($pic, 128, 128, 128);
$black = imagecolorallocate($pic, 255, 255, 255);
//tentukan font
$font = "saxmono.ttf";
// membuat nomor acak dan ditampilkan pada gambar

for ($i = 0; $i <= 5; $i++) {

    // jumlah karakter
    $num = rand(0, 9);
    $_SESSION["captcha"] .= $num;
    $corner = rand(-25, 25);
    imagettftext($pic, 20, $corner, 8 + 15 * $i, 25, $black, $font, $num);
    // efek shadow
    // imagettftext($pic, 20, $corner, 9 + 15 * $i, 26, $grey, $font, $num);
}

// membuat gambar
imagepng($pic);
imagedestroy($pic);
