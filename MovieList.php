<?php
session_start();
if(isset($_GET["Type"])){$Type=$_GET["Type"];}
else $Type=0;
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
    <title>StarMovie-MovieList</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<form action="MovieList.php" method="post">
    <?php
      require_once("connMysql.php");  
    ?>
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
      //====分類
      var type0=document.getElementById("type0");
      type0.onclick=selectType0;
      var type1=document.getElementById("type1");
      type1.onclick=selectType1;
      function selectType0()
      {
        location.href="MovieList.php?Type=0";
      }
      function selectType1()
      {       
        location.href="MovieList.php?Type=1";
      }
      //==== 類別搜尋 
    
      function filter()
      {
        var myselect;
        myselectC=document.getElementById("country").value;
        //alert(myselectC);
        myselectG=document.getElementById("genre").value;
        //alert(myselectG);
        location.href="MovieList.php?Type=<?php echo $Type?>&country="+myselectC+"&genre="+myselectG;      
        return false;
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
    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="tags" align=center>
            <table align="center" border="1" width="50%">
            <tr align="center">
            <th><a  href=# onClick=selectType0() id=type0>現正熱映</a></th>
            <th><a  href=# onClick=selectType1() id=type1>即將上映</a></th>
                <?php 
                 if(isset($_SESSION['inAccount'])&&isset($_SESSION["level"])){$level=$_SESSION["level"];                     
                if($level=="1"){
       echo"<th><a href=uploadMovie.php>上新片</a></th>";}} ?> 
             </tr></table></div>
            <br><br>           
                        
            <!--篩選-->
            <div class="tags" align=center>    
                <?php
                require("connMysql.php");	
                $sqloption="SELECT DISTINCT country from movie";
                $resultO = $db_link->query($sqloption);?>
                <label>國家:</label>
                <select name="country" id="country">   
                <option value="'*'">  
                <?php
                while ($row = mysqli_fetch_assoc($resultO))
                {
                  
                  echo "<option value=".$row["country"].">";
                  echo $row["country"];
                  echo "</option>";
                 
                }   echo "</select>&nbsp;";

                $sqloption="SELECT DISTINCT type from movie";
                $resultT = $db_link->query($sqloption);?>
                <label>類型:</label>
                <select name="genre" id="genre">
                <option value="'*'">                   
                <?php
                while ($row = mysqli_fetch_assoc($resultT))
                {
                  
                  echo "<option value=".$row["type"].">";
                  echo $row["type"];
                  echo "</option>";
                 
                }   echo "</select>";
                $db_link->close();?>      
                 &nbsp;&nbsp;<a href=# onClick=filter()>搜尋</a>                          
            </div><br><br>
            
            <?php 
            require("connMysql.php");	
            if(isset($_GET["country"])){$c=$_GET["country"];}else{$c="'*'";}
            if(isset($_GET["genre"])){$g=$_GET["genre"];}else{$g="'*'";}
            if($Type==0)
            {
                //$sql0 = "SELECT * from movie where release_date<CURDATE()";
                $sql0="SELECT * from movie where type='$g' AND country='$c' AND release_date<=CURDATE()";
                //echo $sql0;
                $result = $db_link->query($sql0);
				if(mysqli_num_rows($result) == 0){echo "找不到符合條件的電影 :( ";}
            }
            if($Type==1)
            {
                //$sql1 = "SELECT * from movie where release_date>CURDATE()";
                $sql1="SELECT * from movie where type='$g' AND country='$c' AND release_date>CURDATE()";
                $result = $db_link->query($sql1);
				if(mysqli_num_rows($result) == 0){echo "找不到符合條件的電影 :( ";}
            }			
			$db_link->close();?>
			<div class="row align-items-end">
			    <?php while ($row = mysqli_fetch_object($result)){?>
                <div class="col-12 col-md-6 col-lg-4">
				<?php echo"<a href='MovieContent.php?movie_id=$row->movie_id'>";?>
				<div class="single-catagory-area clearfix mb-100">
                    <img src="img/movie/<?php echo "$row->photo";?>" alt=<?php echo "$row->photo";?>></a>
                    <div class="single-blog-content">
                            <div class="line"></div>
                            <h4><a href="#" class="post-headline"><?php echo "$row->movie_name";?></a></h4>  
                    </div><!--End of single-blog-content-->
                </div> 
                </div><!--End of col-12 col-md-6 col-lg-4--><?php }?> 
                </div>
            </div>
        </div><!--container-->
    </div>
    <!-- ##### Blog Wrapper End ##### -->

    <!-- ##### Instagram Feed Area Start ##### -->
    <div class="instagram-feed-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="insta-title">
                        <h5>/Star movie/</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram Slides -->
        
    </div>
    <!-- ##### Instagram Feed Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area text-center">
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