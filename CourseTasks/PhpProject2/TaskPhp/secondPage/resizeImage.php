<?php
//Функция для уменьшения размера изображения
function resize_image($type, $name)
{
    switch ($type) {
        case 'jpeg':
            $img = imagecreatefromjpeg($name);
            break;
        case 'png':
            $img = imagecreatefrompng($name);
            break;
        case 'gif':
            $img = imagecreatefromgif($name);
            break;
    }

    $img_width = imageSX($img);
    $img_height = imageSY($img);

    $miniWidth = 100;
    $miniHeight = 100;

    $origin = iconv("UTF-8", "windows-1251", $_FILES["userfile"]["name"]);
    
    $newImg = imagecreatetruecolor($miniWidth, $miniHeight);
    imagecopyresampled($newImg, $img, 0, 0, 0, 0, $miniWidth, $miniHeight, $img_width, $img_height);

    switch ($type) {
        case 'jpeg':
            $result = imagejpeg($newImg, "../pictures/mini/" . "$origin");
            break;
        case 'png':
            $result = imagepng($newImg, "../pictures/mini/" . "$origin");
            break;
        case 'gif':
            $result = imagegif($newImg, "../pictures/mini/" . "$origin");
            break;
    };

    imagedestroy($img);
    imagedestroy($newImg);

    return $result;
}
?>