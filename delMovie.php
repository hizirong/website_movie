<?php
$movieid=$_GET["movie_id"];
require_once("connMysql.php");
$sql = "DELETE FROM `movie` WHERE movie_id=$movieid";
$result = $db_link->query($sql);
header("location:theater.php");
?>