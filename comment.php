<?php
session_start();

$userid=$_SESSION["inAccount"];
$movieid=$_GET["movie_id"];
$score = $_POST['score'];//post獲取表單裏的name
$message = $_POST['message'];
require_once("connMysql.php");
$sql= "INSERT INTO comment ( `user_id`,`movie_id`,`score`,`message`,`c_time` ) 
VALUES ('$userid','$movieid','$score', '$message',NOW())";
$result =$db_link->query($sql); 

header("location:moviecontent.php?movie_id=$movieid");
?>