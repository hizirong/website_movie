<?php
session_start();
$userid=$_SESSION["inAccount"];
$movieid=$_GET["movie_id"];
require_once("connMysql.php");
$sql = "INSERT INTO `following`(`user_id`, `movie_id`) VALUES ('$userid','$movieid')";
$result = $db_link->query($sql);
header("location:moviecontent.php?movie_id=$movieid");
?>