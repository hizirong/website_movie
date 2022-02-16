<?php
$Theater=$_GET["theater"];
$timeid=$_GET["time_id"];
require_once("connMysql.php");
$sql = "DELETE FROM `timetable` WHERE time_id=$timeid";
$result = $db_link->query($sql);
header("location:theater.php?theater=$Theater");
?>