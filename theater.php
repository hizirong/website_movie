<?php
session_start();
$level=$_SESSION["level"];
if(isset($_GET["theater"])){$Theater=$_GET["theater"];}
if(isset($_POST["pday"]))
{
        $movie=$_POST["movie_select"];
        $auditorium = $_POST["auditorium"];
        $pday = $_POST["pday"];
        require_once("connMysql.php");
        $sql= "INSERT INTO `timetable`(`movie_id`,`auditorium`, `t_time`, `theater_id`) 
        VALUES ('$movie','$auditorium','$pday','$Theater')";
        $result =$db_link->query($sql);
}
if(isset($_POST["account"])&&isset($_POST["password"]))
	{
		require_once("connMysql.php");
		$inAccount=$_POST["account"];
		$inPassword=$_POST["password"];		
		$sql_query="SELECT *FROM user Where user_id = '$inAccount'
            AND pw = '$inPassword'";
		$result=$db_link->query($sql_query);
		$db_link->close();
					
		if(mysqli_num_rows($result) == 0)
		{
			//$db_link->close();
			echo "<script type='text/javascript'>";
			echo "alert('帳號密碼錯誤，請查明後再登入');";
			//echo "history.back();";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>StarMovie - Theater</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<form name="Ftheater" action="theater.php?theater=<?php echo $Theater?>" method="post">
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>
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
      function chooseT()
      {
        choosenT=document.getElementById("TIMES").value;
        var rr=parseInt(choosenT) + 1;
        //alert(rr);
        location.href="theater.php?theater=<?php echo $Theater?>&Time="+choosenT+"%"; 
      }
       function checkEdit()
      {  
        // alert("FUNCTION");

        // editM=document.getElementById("movie_select").value;
        // editA=document.getElementById("auditorium").value;
        // editP=document.getElementById("pday").value;

        // alert(editM);
        // alert(editA);
        // alert(editP);
        document.insertT.submit();     
      }            
    </script>
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
                               <!-- <button class="btn original-btn" onclick=Register();>Register</button>	      -->
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
									<li><a href="MovieList.php">電影總表</a></li>
									<li><a href="theater-list.php">影城資訊</a></li>						           
                                    <?php			  			  	  
                                    if(!isset($_SESSION['inAccount'])){
                                    echo"<li><a data-toggle='modal' data-target='#subsModal'>登入/註冊</a></li>";			  
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
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/theaterBackground.jpg);"> </div>
    <!-- ##### Breadcumb Area End ##### -->


    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">         
                <!-- Single Blog Area -->
                <div class="single-blog-area clearfix mb-100">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div class="line"></div>
                        <?php
                        require("connMysql.php");
                        $a=1;
                        if(isset($_GET["Time"])){$TIME=$_GET["Time"];}else{$TIME="%";}
                        $range=intval($TIME)+intval($a);
                        $sql="SELECT t_name FROM `theater` WHERE t_id=$Theater";
                        $sqlt="SELECT auditorium,t_time,movie.photo,movie.movie_name,movie.movie_id,time_id FROM `timetable` 
                        INNER JOIN movie ON movie.movie_id=timetable.movie_id WHERE theater_id=$Theater 
                        AND (t_time LIKE('%$TIME') OR t_time LIKE('%$range%')) ORDER BY `timetable`.`t_time` ASC";
                        $result = $db_link->query($sql);
                        $resultT = $db_link->query($sqlt);
                        $row = mysqli_fetch_object($result);
                        ?>
                        <a href="#" class="post-tag"><?php echo "$row->t_name";?>  </a>   
                    </div>
                    <div class="tags" align=center>
                        <table align="center" border="1" width="50%">
                        <tr align="center">
                        <th>
                        <a  class="post-tag">依時間搜尋:</a>
                        <select name="TIMES" id="TIMES"><option value="%" SELECT> </option>
                        <option value="09">09</option><option value="10">10</option><option value="11">11</option>
                        <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                        <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                        <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                        <option value="21">21</option><option value="22">22</option></select></th>
                        <th><a href=# class="post-tag" onclick=chooseT()> 搜尋! (顯示兩小時內放映電影)</a></th>
                        </tr></table></div>
                    </div>
                    <br><br>

                <?php if($level=="1"){?>
                    <form  method="post" name="insertT">
                    <?php
                    require("connMysql.php");	
                    $sqloption="SELECT * from movie";
                    $sqlA="SELECT DISTINCT auditorium from timetable WHERE theater_id=$Theater ORDER BY `timetable`.`auditorium` ASC";
                    //$sqloption="SELECT DISTINCT  FROM movie ";
                     $resultO = $db_link->query($sqloption);
                     $resultA = $db_link->query($sqlA);?>
                                       
                    <div class="tags" align=center>
                        <table align="center" border="1" width="70%">
                        <tr align="center">
                        <th>
                        <a  class="post-tag">依時間搜尋:</a>
                        <select name="movie_select" id="movie_select" style="width: 100px" required>
                        <?php while ($row = mysqli_fetch_assoc($resultO)){
                        echo "<option value=".$row["movie_id"].">";
                        echo $row["movie_name"];echo "</option>";}?></select>&nbsp;
                        </th>
                        <th> 
                        <a  class="post-tag">放映廳:</a>
                        <select name="auditorium" id="auditorium" style="width: 100px" required>
                        <?php while ($row = mysqli_fetch_assoc($resultA)){
                        echo "<option value=".$row["auditorium"].">";
                        echo $row["auditorium"];echo "</option>";}?></select>
                        </th>
                        <th>
                        <a  class="post-tag">時刻:</a>
                        <input type="text" name="pday" id="pday" style="width: 200px" required>
                        </th>

                        <th><a type="submit" onclick=checkEdit()>&nbsp;新增時刻表&nbsp;</a></th>
                        </tr></table></div>
                    </div>
                    </form><?php }?>
                </div>
                    
                    
                            
                   
            <!-- ##### Post Content Area ##### -->
            <div class="container">
            <div class="row align-items-end">
            <?php 
            if(mysqli_num_rows($resultT) == 0){echo "<br><br> <br>  這時間沒有放映中的電影 :( ";}
            while ($row = mysqli_fetch_object($resultT)){?>             
            <div class="col-12 col-md-6 col-lg-4">
                    <!-- About Author -->
                    <div class="blog-post-author mt-100 d-flex">
                        <div class="author-thumbnail">
                        
                        <?php echo"<a href='MovieContent.php?movie_id=$row->movie_id'>";?>
                            <img src="img/movie/<?php echo "$row->photo";?>" alt=""></a>
                        </div>
                        <div class="author-info">
                            <div class="line"></div>
                            <span class="author-role"><?php echo "$row->auditorium";?></span>
                            <h4><a href="#" class="author-name"><?php echo "$row->movie_name";?></a></h4>
                            <p><?php echo "$row->t_time";?></p><br>
                            <?php if($level=="1"){?>
                            <ul class='tags'>
                         <li>  <?php echo "<a href='delTimetable.php?time_id=$row->time_id&theater=$Theater'>"?>刪除</a></li>
                         </ul><?php }?>
                        </div>
                    </div>
                </div><?php
            
            }?>
                </div>
                </div>
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

                          
                        </nav>
                    </div>

                   
                </div>
            </div>
        </div>

        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;
        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
            class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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