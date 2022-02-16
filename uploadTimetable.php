<?php
session_start();

if(isset ($_POST["name"])){
$auditorium = $_POST["auditorium"];
$pday = $_POST["t_time"];
$theater=$_POST["theater_id"];
require_once("connMysql.php");
$sql= "INSERT INTO `timetable`(`movie_id`,`auditorium`, `t_time`, `theater_id`) 
VALUES ('$id','$auditorium','$t_time','$theater_id')";
$result =$db_link->query($sql); 

header("location:MovieList.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>starmovie-uplaodTimetable</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>
<form action="uploadTimetable.php" method="post" enctype="multipart/form-data">
    <div class="coming-soon-area bg-img background-overlay" style="background-image: url(img/bg-img/theater.jpg);">
        <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-sm-8">
                        <div class="breaking-news-area">
                            <div id="breakingNewsTicker" class="ticker" >
                                <ul>
                                    <li><a href="#">電影播放中請將您的手機關機</a></li>
                                    <li><a href="#">請留意您的貴重物品</a></li>
                                    <li><a href="#">開演後三十分鐘禁止入場</a></li>
                                    <li><a href="#">禁止攜帶任何錄影錄音設備</a></li>
                                    <li><a href="#">禁止吸煙與嚼食檳榔</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>

        <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a href="index.php" class="original-logo"><img src="img/core-img/logo.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Coming Soon Area Start ##### -->
        <div class="coming-soon-timer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="coming-soon-content">
                            <div class="sonar-wrapper">
                                <div class="sonar-emitter">
                                    <div class="sonar-wave">
                                    </div>
                                </div>
                            </div>
                            <p>UPLOAD NEW TIMETABLE !</p><br><br>
                        </div>
                        <!-- <div id="clock" class="d-flex align-items-center justify-content-between"></div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Coming Soon Area End ##### -->

        <!-- ##### Contact Area Start ##### -->
        <div class="contact-area section-padding-100">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Contact Form Area -->
                    <div class="col-12 col-md-10 col-lg-9">
                        <div class="contact-form">
                            <h5>時刻表資訊</h5>
                            <!-- Contact Form -->
                            <form action="uploadTimetable.php" method="post">
                                <div class="row">
                                  <div class="col-12 col-md-6">
                                        <div class="group">
                                        <?php
                                        require("connMysql.php");	
                                        $sqloption="SELECT DISTINCT movie_name,movie_id from movie";
                                        $sqloption="SELECT DISTINCT FROM movie where (user_id=$userid AND movie_id = $id)";
                                        $resultO = $db_link->query($sqloption);?>
                                        <label>電影</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <select name="movie" required>   
                                        <?php
                                        while ($row = mysqli_fetch_assoc($resultO))
                                        {
                                          echo "<option value=".$row["movie_name"].">";
                                          echo $row["movie_name"];
                                          echo "</option>";
                 
                                        }   echo "</select>&nbsp;";?> 
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <label>電影院</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                            <select name="theater" required>
                                                <option value="國賓影城">國賓影城
                                                <option value="東南亞秀泰">東南亞秀泰
                                                <option value="百老匯">百老匯
                                            </select>  
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                        <label>放映廳</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                                              <select name="auditorium" required>
                                                <option value="1">1
                                                <option value="2">2
                                                <option value="3">3
                                                <option value="4">4
                                                <option value="A">A
                                                <option value="B">B
                                                <option value="C">C
                                                <option value="春風">春風
                                                <option value="百花">百花
                                                <option value="鳥語">鳥語
                                              </select> 
                                            <span class="highlight"></span>
                                            <span class="bar"></span>  
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="pday" id="release_date" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>放映時間</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn original-btn">UPLOAD !</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    </form>
</body>
</html>