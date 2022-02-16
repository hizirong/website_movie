<?php
    session_start();
    if(isset($_GET["movie_id"])){$id=$_GET["movie_id"];}
    if (isset($_POST["name"]))
    {
    require_once("connMysql.php");
    $id=$_GET["movie_id"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    $rating = $_POST["rating"];
    $runtime = $_POST["runtime"];
    $director = $_POST["director"];
    $actors = $_POST["actors"];
    $release_date = $_POST["date"];
    $country = $_POST["country"];
    $photo = $_POST["photo"];
    $intro = $_POST["intro"];
  	
    $sqlE = "UPDATE `movie` SET `movie_name`='$name',`type`='$type',`rating`='$rating',`runtime`='$runtime',
    `director`='$director',`actors`='$actors',`release_date`='$release_date',`country`='$country',`photo`='$photo',`intro`='$intro'
            WHERE movie_id = $id";	
    $result =$db_link->query($sqlE);	
   header("location:moviecontent.php?movie_id=$id");
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
    <title>StarMovie - EditMovie</title>

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
    
    <script> 

    </script>

    <form name="editMovie"action="editMovie.php?movie_id=<?php echo $id?>" method="post">
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
                        <a href="index.html" class="original-logo"><img src="img/core-img/logo.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-50 clearfix">     
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1000ms">
                        <div class="row">      
                        <?php require_once("connMysql.php");                                               
                        $sqlDetial="SELECT * FROM movie where movie_id = $id";                 
                        $resultD = $db_link->query($sqlDetial); 
                        
                        $db_link->close();                                                       			  	  
                        while($row=mysqli_fetch_object($resultD)){ ?>
                            <div class="col-12 col-md-6 col-lg-4">                        
                                <div class="single-blog-thumbnail">電影海報:
                                <img src="img/movie/<?php echo $row->photo?>">
                                <input type="text" name="photo" size="31" value="<?php echo $row->photo ?>">                          
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Blog Content -->
                                <div class="single-blog-content mt-50">
                                    <div class="line"></div>               
                                    <p>電影類型 :<input type="text" name="type" size="31" value="<?php echo $row->type ?>"></p>                           
                                    <h1>電影名稱 : <input type="text" name="name" size="31" value="<?php echo $row->movie_name ?>">   </h1>                                 
                                    <h6>分級 : <input type="text" name="rating" size="31" value="<?php echo $row->rating ?>">   </h6>                              
                                    <h6>片長:<input type="text" name="runtime" size="31" value="<?php echo $row->runtime ?>">   分</h6>
                                    <p><textarea name="intro" rows="5" cols="25"><?php echo $row->intro ?></textarea></p>
                                    <div class="post-meta">
                                        <p>導演:<input type="text" name="director" size="31" value="<?php echo $row->director ?>">   </p>
                                        <p>主要演員:<input type="text" name="actors" size="31" value="<?php echo $row->actors ?>">   </p>
                                        <p>上映日期:<input type="text" name="date" size="31" value="<?php echo $row->release_date ?>">   </p>
                                        <p>國家:<input type="text" name="country" size="31" value="<?php echo $row->country ?>">   </p>                                   
                                    <?php }?> 

                                    <div class="col-12">                                                             
                                    <button type="submit" name="update" class="btn original-btn"> 更新</button>
                                    </div>                                                           
                                      
                                    </div>
                                </div>
                                <br>
                                                     
                            </div>
                        </div>
                    </div>
                    </div>     
                    
                </div>                    

                </div>

                <!-- ##### Sidebar Area ##### -->            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

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