<?php 
  header("Content-Type: text/html; charset=utf8");
  require_once("connMysql.php");
  if(isset($_POST['sub'])){
  

	$name = $_POST['name'];//post獲取表單裏的name
	$id = $_POST['id'];
	$pw = $_POST['pw'];//post獲取表單裏的password


  include('connMysql.php');//鏈接數據庫
  $sql=$sqlString = "INSERT INTO user ( user_id,user_name ,pw)".
					"VALUES ('$id', '$name', '$pw')";//向數據庫插入表單傳來的值的sql
	$result =$db_link->query($sql);  
  if ($result)
  {
	echo "<script type='text/javascript'>alert('註冊成功!');</script>";//成功輸出註冊成功
	header("location:index.php");
  }
  else
  {
    echo "<script type='text/javascript'>alert('註冊失敗')</script>";
  }
  }//判斷是否有submit操作
  mysqli_close($db_link);//關閉數據庫

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
    <title>StarMovie - Register</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<form action="register.php" method="post">
    <script> 
	  function checkData()
      {
        if (document.loginarea.account.value.length =="")
		{
			alert("帳號欄位不可以空白");
			document.loginarea.account.focus();
			return false;
		}
		         
        if (document.loginarea.password.value.length =="")
		{			
			alert("密碼欄位不可以空白");
			document.loginarea.password.focus();
			return false;
		}
        
        document.loginarea.submit();
      }          
    </script> 

    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <!-- Subscribe Modal -->
    <div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                        <h5 class="title">Login / Register</h5>
                        <form action="#" class="newsletterForm" method="post" name="loginarea">
                            <input type="text" name="account" id="account" placeholder="account">
							<input type="password" name="password" id="password" placeholder="password">
                               <button type="submit" class="btn original-btn" onclick=checkData() id=btnlogin>Login</button><br>                     
                               <a href=register.php size="5">我要註冊新帳號!</a>                   			
                        </form>
                    </div>
                </div>
            </div>
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
                            <div id="breakingNewsTicker" class="ticker">
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
                        <a href="index.html" class="original-logo"><img src="img/core-img/logo.jpg" alt=""></a>
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
                                    <li><a href="uploadTimetable.php">時刻表修正</a></li>						           
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


    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">
            <div class="row align-items-end">
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <div class="cool-facts-area section-padding-100-0 bg-img background-overlay" style="background-image: url(img/bg-img/registerBg1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-blog-area blog-style-2 text-center mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">Register</a>
        <!-- ##### Contact Area Start ##### -->
        <div class="contact-area section-padding-100">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Contact Form Area -->
                    <div class="col-12 col-md-10 col-lg-9">
                        <div class="contact-form">
                            <!-- Contact Form -->
                            <form action="#" method="post">

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="name" id="name" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="id" id="id" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>ID</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="password" name="pw" id="pw" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="sub" class="btn original-btn">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area End ##### -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                    </div>
                </div>
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                    </div>
                </div>
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                    </div>
                </div>
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Cool Facts Area End ##### -->


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

</body>

</html>