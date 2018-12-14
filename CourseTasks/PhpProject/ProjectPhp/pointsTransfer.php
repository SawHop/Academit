<?php
class PointsTransfer
{
    private $from, $to, $enterPoint, $count;

    function __construct()
    {
        $from = $_POST["from"];
        $to = $_POST["to"];
        $enterPoint = $_POST["enterPoint"];
        $count = $_POST["count"];
        $from = htmlspecialchars($from);
        $to = htmlspecialchars($to);
        $enterPoint = htmlspecialchars($enterPoint);
        $count = htmlspecialchars($count);
        $this->from = $from;
        $this->to = $to;
        $this->enterPoint = $enterPoint;
        $this->count = $count;
    }
     
    function enterDatebase()
    {
        global $mysqli;
        global $result_set;

        $mysqli = new mysqli ("localhost", "root", "", "base");
        $mysqli->query ("SET NAMES 'utf8'");
        $result_set = $mysqli->query ("SELECT * FROM `users`");
    }

    function comparison ($result_set) {
        global $checkFromLogin;
        global $checkCount;
        global $checkToLogin;
        $checkFromLogin = false;
        $checkCount = false;
        $checkToLogin = false;
    
        while (($row = $result_set->fetch_assoc()) != false) {
    
            if("$this->from" == $row["login"]){
                    $checkFromLogin = true;
                if($this->enterPoint == "points" ||  $this->enterPoint == "bananas"){
                       
                    if($row[$this->enterPoint] >= $this->count && $this->count > 0) {
                        global $userPointFrom;
                        $userPointFrom = $row[$this->enterPoint];
                        $checkCount = true;
                    }
                }
            }
            if($this->to == $row["login"]){
                global $userPointsTo;
                $userPointsTo = $row[$this->enterPoint];
                $checkToLogin = true;
            }   
        }
    }

    function comparisonCheck($mysqli){
        global $checkFromLogin;
        global $checkCount;
        global $checkToLogin;
        if($this->to == $this->from){
            echo "Отправитель и получатель должны быть разными";
            $mysqli->close ();
            exit();
        }
        else if(($checkFromLogin == true) && ($checkCount == true) && ($checkToLogin == true)){
            global $userPointFrom;
            global $userPointsTo;

            $userPointsTo = $userPointsTo + $this->count;
            $mysqli->query ("UPDATE `users` SET `$this->enterPoint` = '$userPointsTo' WHERE `login` = '$this->to'");
            $userPointFrom = $userPointFrom - $this->count;
            $mysqli->query ("UPDATE `users` SET `$this->enterPoint` = '$userPointFrom' WHERE `login` = '$this->from'");
            header("Location: ".$_SERVER["HTTP_REFERER"]);
            
            $mysqli = new mysqli("localhost", "root", "", "comments");
            $mysqli->query("INSERT INTO `comment` (`id`, `text_comment`) VALUES (NULL,'$this->from перевела $this->to $this->count $this->enterPoint')");

            $mysqli->close ();
            exit();
        }
        else if($checkFromLogin == false){
          echo "Такого отправителя нет";
          $mysqli->close ();
          exit();
        }
        else if($checkToLogin == false){
            echo "Такого получателя нет";
            $mysqli->close ();
            exit();
        }
        else{
            echo "Проверьте еденицу измерения и количество";
            $mysqli->close ();
            exit();
        }
    }
}

global $mysqli;
global $result_set;

$pointsTransfer = new PointsTransfer();
$pointsTransfer->enterDatebase();
$pointsTransfer->comparison($result_set);
$pointsTransfer->comparisonCheck($mysqli);
?>
