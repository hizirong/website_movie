<?php
session_start();
$userid=$_SESSION["inAccount"];
$movieid=$_GET["movie_id"];
require_once("connMysql.php");
$sql = "DELETE FROM `following` WHERE (user_id='$userid'AND movie_id='$movieid')";
$result = $db_link->query($sql);
header("location:moviecontent.php?movie_id=$movieid");
?>