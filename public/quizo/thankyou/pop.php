<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="percentage">75%</div>
    <div class="score">Congradulations you completed our quiz!</div>
</div>

<?php

$sconn = mysqli_connect('localhost', 'root', '', "myquiz") ;
$lconn = mysqli_connect('localhost', 'root', '', "myquiz") ;
$dconn = mysqli_connect('localhost', 'root', '', "myquiz") ;
$xconn = mysqli_connect('localhost', 'root', '', "myquiz") ;
// first
$s = $_POST["stp_1_select_option"];
$ssql = "INSERT INTO user_answers (answer_id , question_id, is_correct)
SELECT id , question_id, correct  from answers where title = '$s'";
$sconn->query($ssql) ;
$sconn->close();
// second
$l = $_POST["stp_2_select_option"];
$lsql = "INSERT INTO user_answers (answer_id , question_id, is_correct)
SELECT id , question_id, correct  from answers where title = '$l'";
$lconn->query($lsql) ;
$lconn->close();
//third
$d = $_POST["stp_3_select_option"];
$dsql = "INSERT INTO user_answers (answer_id , question_id, is_correct)
SELECT id , question_id, correct  from answers where title = '$d'";
$dconn->query($dsql) ;
$dconn->close();
//fourth
$x = $_POST["stp_4_select_option"];
$xsql = "INSERT INTO user_answers (answer_id , question_id, is_correct)
SELECT id , question_id, correct  from answers where title = '$x'";
$xconn->query($xsql) ;
$xconn->close();

?>
<style>
    body{
        background-color:green ;
    }
 .percentage {
     height: 180px;
     width: 180px;
     background-color: white;
     border-radius: 50%;
     text-align: center;
     color: green;
     font-size: 70px;
     font-family: monospace;
     line-height: 180px;
     padding: 10px;
     position: absolute;
     top: 10%;
     left: 40%;
 }

 .score{
     color: white;
     font-family: monospace;
     font-size: 50px;
     position: absolute;
     left: 15%;
     top: 55%;
 }

</style>
</body>
</html>
