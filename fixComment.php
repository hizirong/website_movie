<?php
    session_start();
    $inAccount=$_SESSION["inAccount"];
    if(isset($_GET["movie_id"])){$id=$_GET["movie_id"];}
    
    require_once("connMysql.php");
    $id=$_GET["movie_id"];
    $score=$_POST["fixscore"];    
    $message=$_POST["fixmessage"];
    $sqlFC = "UPDATE `comment` SET `score`='$fixscore',`message`='$fixmessage',`c_time`=NOW() 
    WHERE `user_id`='$inAccount' AND `movie_id`='$id'";	
    $result =$db_link->query($sqlFC);	
    header("location:moviecontent.php?movie_id=$id");
  
?>
