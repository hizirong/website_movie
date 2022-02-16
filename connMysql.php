<?php
	$db_host="127.0.0.1";
	$db_username="root";
	$db_password="";
	$db_name="StarMovie";

	$db_link=@new mysqli($db_host,$db_username,$db_password,$db_name);

	if($db_link->connect_error!="")
	{
		echo"資料庫連結失敗!";
	}
	else
	{
		$db_link->query("SET NAMES 'utf8'");
	}
?>