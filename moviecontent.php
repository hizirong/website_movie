<?php
    session_start();
    if(isset($_GET["movie_id"])){$id=$_GET["movie_id"];}
    if(isset($_POST["account"])&&isset($_POST["password"])){
		require_once("connMysql.php");
		$inAccount=$_POST["account"];
		$inPassword=$_POST["password"];		
		$sql_query="SELECT *FROM user Where user_id = '$inAccount'
            AND pw = '$inPassword'";
		$result=$db_link->query($sql_query);
		$db_link->close();					
		if(mysqli_num_rows($result) == 0)
		{
			$db_link->close();
			echo "<script type='text/javascript'>";
			echo "alert('帳號密碼錯誤，請查明後再登入');";
			echo "history.back();";
			echo "</script>";			
		}
		else
		{
			//將使用者資料加入 Session
			session_start();
			$row = mysqli_fetch_object($result);	
			$_SESSION["inAccount"] = $row->user_id;	
            $_SESSION["inPassword"] = $row->password;
            $_SESSION["level"] = $row->level;
						
            $userid=$row->user_id;
            $username=$row->user_name;
            //$level=$row->level;
		   			
			mysqli_free_result($result);
			echo "<script type='text/javascript'>";
			echo "alert('登入成功!!');";
			echo "history.go(-2);";
			echo "</script>";
			
			//關閉資料連接	
			mysqli_close($db_link);					
			header("location:index.php?id=$userid");
		}		
		
    }
?>
<?php
    if(isset($_GET["movie_id"])){$id=$_GET["movie_id"];}
    if (isset($_POST["name"]))
    {
    require_once("connMysql.php");
    $userid=$_SESSION["inAccount"];
    $id=$_GET["movie_id"];
    $score=$_POST["score"];
    $message=$_POST["message"];
    $sqlFC = "UPDATE comment SET score='$score',message='$message' WHERE user_id = $userid";	
    $result =$db_link->query($sqlFC);	
   header("location:moviecontent.php?movie_id=$id");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <form name=""action="fixComment.php?movie_id=<?php echo $id?>" method="post">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>StarMovie - movieconctent</title>

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
    <!-- Function 登入-->
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
      function checkComment()
      {

        if(!isset($_SESSION['inAccount'])){
            alert("請先登入");
            return false;}
        else{
        if (document.moviecontent.message.value.length =="")
		{
			alert("留言不可為空白");
			document.moviecontent.message.focus();
			return false;
		}
		         
        if (document.moviecontent.score.value.length =="")
		{			
			alert("記得評分!");
			document.moviecontent.score.focus();
			return false;
		}
        document.moviecontent.submit();
        }
        
      }    
      </script>
    <!-- Subscribe Modal 登入視窗 -->
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
                               <!-- <button class="btn original-btn" onclick=Register();>Register</button>	      -->
                               <a href=register.php size="5">我要註冊新帳號!</a>                   			
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form name="moviecontent"action="comment.php?movie_id=<?php echo $id?>" method="post">
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

        <!-- Nav Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" >
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
									<li><a href="movielist.php">電影總表</a></li>
									<li><a href="theater-list.php">影城資訊</a></li>						           
                                    <?php			  			  	  
                                    if(!isset($_SESSION['inAccount'])){
                                    echo"<li><a class='btn subscribe-btn' data-toggle='modal' data-target='#subsModal'>登入/註冊</a></li>";			  
                                    }
                                    if(isset($_SESSION['inAccount'])){                                         
                                    echo"<li> <a href='Member.php'>會員畫面</a></li>";
                                    echo"<li> <a href='logout.php'>登出</a></li>";}			  
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

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-50 clearfix">
        <div class="container"> </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1000ms">                        
                        <?php require_once("connMysql.php");
                        if(isset($_SESSION['inAccount'])&&isset($_SESSION["level"]))
                        {
                            $userid=$_SESSION["inAccount"];
                            $level=$_SESSION["level"];
                            $sqlfollow="SELECT * FROM following where (user_id=$userid AND movie_id = $id)";
                            $resultF = $db_link->query($sqlfollow);
                            $sqlFC="SELECT * FROM comment where (user_id=$userid AND movie_id = $id)";
                            $resultFC = $db_link->query($sqlFC);                             
                            if($level=="1")
                            {
                                echo"<div class='sidebar-widget-area'><div class='widget-content'>
                                    <ul class='tags'>
                                        <li><a href='editMovie.php?movie_id=$id'>編輯</a></li>
                                        <li><a href='delMovie.php?movie_id=$id'>下片</a></li>                                   
                                    </ul>
                                    </div></div>";
                            }
                        }                                                 
                        $sqlS="SELECT round(AVG(score),1) AS S FROM comment  JOIN movie ON comment.movie_id = $id";//分數平均
                        $sqlC="SELECT * FROM comment,user where comment.user_id = user.user_id and movie_id=$id ORDER BY `comment`.`c_time` DESC";
                        $sqlDetial="SELECT * FROM movie where movie_id = $id";//選movie裡面電影資訊
                        $resultS = $db_link->query($sqlS);
                        $resultD = $db_link->query($sqlDetial); 
                        $resultC = $db_link->query($sqlC);
                        $db_link->close();                                                       			  	  
                        while($row=mysqli_fetch_object($resultD)){ ?> 
                        
                          <!--$resultD 跑$sqlDetial抓電影資料-->    
                            <img src="img/movie/<?php echo $row->photo?>"> 
                                 <br> <br>
                            <div class='sidebar-widget-area'><div class='widget-content'>
                            <ul class='tags'>
                               <?php 
                               if(isset($_SESSION['inAccount'])){
                               if (mysqli_num_rows($resultF)!= 0){echo"<li><a href='unfollow.php?movie_id=$row->movie_id'>取消追蹤</a></li>";} 
                                else{echo"<li><a href='follow.php?movie_id=$row->movie_id'>追蹤</a></li>";}
                                }?>
                                <li><a href='time-table.php?movie_id=<?php echo $id?>'>查詢時刻表</a></li>
                            </ul>
                            </div></div>

                            <div class="col-12">
                                <!-- Blog Content -->
                                <div class="single-blog-content mt-50">
                                    <div class="line"></div>               
                                    <p><?php echo $row->type?></p>                           
                                    <h1><?php echo $row->movie_name?></h1>                                 
                                    <h6><?php echo $row->rating?>&emsp;&emsp;片長:<?php echo $row->runtime?>分</h6>
                                    <p><?php echo $row->intro?></p>
                                    <div class="post-meta">
                                        <p>主要演員:<?php echo $row->actors?></a></p>                                  
                            <?php }//$sqlDetial抓電影資料的部分都抓完了 換抓comment裡面的
                            $row=mysqli_fetch_object($resultS)?>  <!--這邊換成$result-->                                                            
                                        <br>
                                        <p>綜合評分:<?php echo $row->S ?></p>
                                    </div>
                                </div>
                                <br>                                                    
                            </div>
                    </div>
                    <!-- 留言板 -->
                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mt-70">
                        <h5 class="title">評論留言板</h5>
                        <form action="fixComment.php" method="post">
                        <ol>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">                                  
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <?php while($row=mysqli_fetch_object($resultC)){?> 
                                        <p><a href="#" class="post-author"><?php echo $row->user_name?>&nbsp;&nbsp;
                                        (<?php echo $row->c_time?>)</a></p>
                                        <!-- <p><a class="post-date">評分: <?php echo $row->score?>/5</a></p> -->
                                        
                                        <?php 
                                        if(isset($_SESSION['inAccount']))
                                        {
                                            $userid=$_SESSION["inAccount"];
                                            if(($row->user_id)==$userid){ ?>

                                            <!-- Button trigger modal -->
                                            <div class='sidebar-widget-area'>
                                                <div class='widget-content'>
                                                    <ul class='tags'>                       
                                                    <a type="button" data-toggle="modal" data-target="#exampleModal">修改留言</a>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">留言修改</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="group">
                                                            <label>分數:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <select name="fixscore" id="fixscore" required>   
                                                                <option value="<? echo $row->score ?>"><? echo $row->score  ?>             
                                                                <option value="1">1
                                                                <option value="2">2
                                                                <option value="3">3
                                                                <option value="4">4
                                                                <option value="5">5
                                                            </select>                                               
                                                        </div>
                                                        <div class="group">
                                                            <textarea name="fixmessage" id="fixmessage" placeholder="comment" value="<? echo $row->message ?>"required><? echo $row->message  ?> </textarea>
                                                        </div>        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href='fixComment.php?movie_id=<?php echo $id ?>' class="btn btn-secondary ">Save changes</a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>   








                                            <?php
                                                echo"<p><a class='post-date'>評分:
                                                 $row->score/5</a></p>";
                                                echo"$row->message";}
                                            else{
                                                echo"<p><a class='post-date'>評分:$row->score/5</a></p>";
                                                echo"<p>$row->message</p>";}
                                        
                                        }
                                        else{
                                            echo"<p><a class='post-date'>評分:$row->score/5</a></p>";
                                            echo"<p>$row->message</p>";}
                                        
                                        }//while 
                                        ?>
                                    </div>    
                                          
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                    
                    <div class="post-a-comment-area mt-70">
                        <h5>發表評論</h5>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <label>分數:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <select name="score" id="score">   
                                        <option value="'0'">               
                                        <option value="1">1
                                        <option value="2">2
                                        <option value="3">3
                                        <option value="4">4
                                        <option value="5">5
                                        </select>                                               
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="message" id="message" placeholder="請先登入" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Comment</label>
                                    </div>
                                </div>
                                <div class="col-12">                                                             
                                <button type="submit" name="subcomment" class="btn original-btn" onclick=checkComment()> 送出評論</button>
                                </div>
                            </div>                   
                    </div>
                    

                </div>                    

                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail"> </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1000ms"> </div>

                    <!-- Load More -->                </div>

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