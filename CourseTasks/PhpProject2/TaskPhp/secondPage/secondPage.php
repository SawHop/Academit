<?php
include_once "addPictures.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form enctype="multipart/form-data" action="addPictures.php" method="POST" accept-charset="utf-8">
    <input type="file" name="userfile">
    <input type="submit" name="send" value="Отправить файл">
</form>

<div class="showPictures">
<!--Вывод изображения при добавление-->
<?php
$dir = opendir('../pictures/mini');
$dir1 = opendir('../pictures/original');
while (false != ($row = readdir($dir))) {
    $roww = readdir($dir1);
    if ($row == "." || $row == "..") {
        continue;
    }
    echo '<a href="../pictures/original/' . $roww . '" class="gallary"><img src="../pictures/mini/' . $row . '"></a>';
}
?>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="../JS/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="../JS/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="../JS/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script src="../JS/script.js"></script>
<script src="../JS/deletePictures.js"></script>
</body>
</html>