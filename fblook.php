<?php
session_start();
$num=$_GET["num"];
$servername = "localhost";
$username = "root";
$password = "wyl336339";
$dbname = "play";

if($_SESSION['admin']=="ybadmin"){
	$con=mysqli_connect($servername, $username, $password,$dbname);
	// 检测连接
	if (mysqli_connect_errno())
	{
		echo "数据库连接失败: " . mysqli_connect_error();
		header("Refresh:3;url=login.php");
	}
	else{
		mysqli_query($con,"UPDATE fb_db SET result=2
		WHERE id=".$num);
		header("location:fbadmin.php");
	}
	mysqli_close($con);
}
else{
	echo "不允许访问的页面 ";
	header("location:login.php");
	
}



?>