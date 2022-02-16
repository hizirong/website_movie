<?php
if(isset ($_POST["name"])){

$upload_dir =  "./img/movie/";
$upload_file = $upload_dir . $to = iconv("UTF-8", "Big5", $_FILES["photo"]["name"]);		
if (move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_file)){$photo=$_FILES["photo"]["name"];}

$name = $_POST["name"];
$type = $_POST["type"];
$rating=$_POST["rating"];
$runtime = $_POST["runtime"];
$director = $_POST["director"];
$actors = $_POST["actors"];
$release_date = $_POST["bday"];
$country = $_POST["country"];
$intro = $_POST["intro"];
require_once("connMysql.php");
$sql= "INSERT INTO `movie`(`movie_name`, `type`, `rating`, `runtime`, `director`, `actors`, `release_date`, `country`, `photo`, `intro`) 
VALUES ('$name','$type','$rating','$runtime','$director','$actors','$release_date','$country','$photo','$intro')";
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
    <title>starmovie-uplaod</title>

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
<form action="uploadMovie.php" method="post" enctype="multipart/form-data">
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
                            <p>UPLOAD NEW MOVIE !</p><br><br>
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
                            <h5>電影資訊</h5>
                            <!-- Contact Form -->
                            <form action="uploadMovie.php" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="name" id="name" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>名稱</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="type" id="type" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>類型</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="date" name="bday" id="release_date" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>上映時間</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                        <label>分級</label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                                            <select name="rating" required>
                                                <option value="輔12級">輔12級
                                                <option value="普遍級">普遍級
                                                <option value="保護級">保護級
                                                <option value="輔導級">輔導級
                                                <option value="限制級">限制級
                                            </select>  
                                            <span class="highlight"></span>
                                            <span class="bar"></span>  
                                                                                 
                                            
                                        </div>
                                    </div>
                                
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="runtime" id="runtime" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>片長(分)</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="director" id="director" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>導演</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="actors" id="actors">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>演員</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="country" id="country" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>國家</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                        <label>海報</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                            <input type="file" name="photo" id="photo" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <textarea name="intro" id="intro" required></textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>簡介</label>
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