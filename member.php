<?php
session_start();
if(!isset($_SESSION["inAccount"]))
{
    echo "<script type='text/javascript'>";
	echo "alert('請先登入');";
	echo "history.back();";
	echo "</script>";
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
    <title>StarMovie - member</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
<form action="member.php" method="post">
    <?php
        require_once("connMysql.php");
        $userid=$_SESSION["inAccount"];
        //$sql="SELECT DISTINCT user.user_id, user.user_name, movie.movie_id,movie.movie_name,movie.photo,comment.score,movie.intro FROM `user`,`movie`,`comment`";
        $sqlU="SELECT * from user where user_id='$userid'";
        $resultU = $db_link->query($sqlU);
        $sqlF="SELECT * FROM movie JOIN following ON movie.movie_id=following.movie_id WHERE user_id='$userid'";
        $resultF = $db_link->query($sqlF);
        $db_link->close();
    ?>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>
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

        <!-- Nav Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" >

                        <!-- Subscribe btn 
                        <div class="subscribe-btn">
                            <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Login/Register</a>
                        </div>-->

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">回首頁</a></li>
									<li><a href="MovieList.php">電影總表</a></li>
									<li><a href="theater-list.php">影城資訊</a></li>					           
                                    <li> <a href='logout.php'>登出</a></li>	

                                    <?php			  			  	  
                                    // if(!isset($_SESSION['inAccount'])){
                                    // echo"<li><a class='btn subscribe-btn' data-toggle='modal' data-target='#subsModal'>登入/註冊</a></li>";			  
                                    // }
                                    // if(isset($_SESSION['inAccount'])){                                         
                                    // echo"<li> <a href='Member.php'>會員畫面</a></li>";
                                    // echo"<li> <a href='logout.php'>登出</a></li>";}			  
                                    ?>

                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->    
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/theaterBackground.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2>your favorite</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
    <?php while ($row=mysqli_fetch_object($resultU)){?>
    <div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">HI ! <?php echo $row->user_name?> :)</a>
                            <h4><a href="#" class="post-headline">你所追蹤的電影 :</a></h4>                           
                        </div>
                    </div>
                </div>               
            </div>      
   <?php }?>
            <div class="row">
            <?php
                while($row=mysqli_fetch_object($resultF)){
                ?>
                <!-- Single Blog Area  -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        

                    
                    <?php echo"<a href='moviecontent.php?movie_id=$row->movie_id'>";?>
                        <div class="single-blog-thumbnail">
                            <img src="img/movie/<?php echo $row->photo?>">  </a>                         
                        </div>
                
                        <!-- Blog Content -->
                        <div class="single-blog-content mt-50">
                            <div class="line"></div>               
                            <h4><a href="#" class="post-headline"><?php echo $row->movie_name?></a></h4>
                        </div>
                    </div>
                </div>    <?php }?>          
            </div>
        </div>
    </div>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Footer Nav Area -->
                    <div class="classy-nav-container breakpoint-off">
                        <!-- Classy Menu -->
                        <nav class="classy-navbar justify-content-center">

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                          <!-- Menu -->
                            <div class="classy-menu">
                                <!-- close btn -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>                                         
                            </div>
                        </nav>
                    </div>                
                </div>
            </div>
        </div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

    </footer>
    <!-- ##### Footer Area End ##### -->

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