<?php
// Добавление изображения на сервер
include_once "resizeImage.php";

if (!empty($_FILES['userfile']['tmp_name'])) {
    if (!empty($_FILES['userfile']['error'])) {
        echo "Произошла ошибка";
    }

    $check = true;
    switch ($_FILES['userfile']['type']) {
        case 'image/jpeg':
            $type = 'jpeg';
            break;
        case 'image/png':
            $type = 'png';
            break;
        case 'image/gif':
            $type = 'gif';
            break;
        default:
            $check = false;
            echo "Неправильный тип изображения";
    }

    $origin = iconv("UTF-8", "windows-1251",  $_FILES["userfile"]["tmp_name"]);
    $temporary = iconv("UTF-8", "windows-1251",  $_FILES["userfile"]["name"]);

    if ($check && !move_uploaded_file("$origin", "../pictures/original/" . "$temporary")) {
        echo "Не удалось загрузить файл";
    }

    //вызов функции для уменьшение размера изображения
    if ($check && !resize_image($type, "../pictures/original/" . "$temporary")) {
        echo "Не удалось уменьшить изображение";
    }
}
?>