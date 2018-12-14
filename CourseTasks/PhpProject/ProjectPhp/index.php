<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="row">

    <div class="col-lg-6">
        <h2>&nbsp;&nbsp;Перечисление очков</h2>
        <form name="pointsTransfer" action="pointsTransfer.php" method="post">
            <div class="form-group">
                <label for="from">От кого</label>
                 <input type="text" class="form-control" id="from" name="from" placeholder="Введите имя">
            </div>
             <div class="form-group">
                <label for="to">Кому</label>
                <input type="text" class="form-control" id="to" name="to" placeholder="Введите имя">
             </div>
             <div class="form-group">
                <label for="enterPoint">Единица измерения</label>
                 <input type="text" class="form-control" id="enterPoint" name="enterPoint" placeholder="Введите единицу измерения">
            </div>
             <div class="form-group">
                <label for="count">Количество</label>
                <input type="text" class="form-control" id="count" name="count" placeholder="Введите количество">
             </div>
             <input type="submit" class="btn btn-success" value="Отправить" />
        </form>
    </div>
    <div class="block">
        <h2 class="logs">Лог операций</h2>
        <br/>
            <?php
                $mysqli = new mysqli("localhost", "root", "", "comments");
                $result_set = $mysqli->query("SELECT * FROM `comment` WHERE `id` < '10000000'");
                while ($row = $result_set->fetch_assoc()) {
                        echo $row["id"].')'.$row["text_comment"];
                        echo "<br />";
                }
            ?>
    </div>

    <div class="col-lg-6">
    <h2>&nbsp;&nbsp;Таблица юзеров</h2>
    <?php

    function printResult ($result_set) {
        echo "<table class='table table-bordered'><tr><th>Id</th><th>login</th><th>points</th><th>bananas</th></tr>";

        while (($row = $result_set->fetch_array()) != false) {
                 echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j){
                echo "<td> $row[$j]</td>";
            }
        echo "</tr>";
        }   
    }
    $mysqli = new mysqli ("localhost", "root", "", "base");
    $mysqli->query ("SET NAMES 'utf8'");

    $result_set = $mysqli->query ("SELECT * FROM `users`");

    printResult ($result_set);
    $mysqli->close ();
    ?>﻿
</div>


</div>

</body>
</html>




