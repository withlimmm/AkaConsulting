<?php
$imagePath = __DIR__ . '/images/logo_aka.png';

if (!file_exists($imagePath)) {
    die("Error: File not found.");
}

$ext = pathinfo($imagePath, PATHINFO_EXTENSION);
if (strtolower($ext) == 'png') {
    $img = imagecreatefrompng($imagePath);
} elseif (strtolower($ext) == 'jpg' || strtolower($ext) == 'jpeg') {
    $img = imagecreatefromjpeg($imagePath);
} else {
    die("Error: Unsupported image type.");
}

$width = imagesx($img);
$height = imagesy($img);
$rTotal = 0;
$gTotal = 0;
$bTotal = 0;
$totalPixels = 0;

for ($x = 0; $x < $width; $x++) {
    for ($y = 0; $y < $height; $y++) {
        $rgb = imagecolorat($img, $x, $y);
        $colors = imagecolorsforindex($img, $rgb);
        // Ignore fully transparent pixels
        if (isset($colors['alpha']) && $colors['alpha'] == 127) {
            continue;
        }
        // ignore pure white background
        if ($colors['red'] > 250 && $colors['green'] > 250 && $colors['blue'] > 250) {
            continue;
        }
        $rTotal += $colors['red'];
        $gTotal += $colors['green'];
        $bTotal += $colors['blue'];
        $totalPixels++;
    }
}

if ($totalPixels == 0) {
    die("Image is empty or completely transparent/white.");
}

$rAvg = round($rTotal / $totalPixels);
$gAvg = round($gTotal / $totalPixels);
$bAvg = round($bTotal / $totalPixels);

printf("#%02x%02x%02x", $rAvg, $gAvg, $bAvg);
?>
