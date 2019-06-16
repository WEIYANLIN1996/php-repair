<?php
session_start();
$num=$_GET["num"];
$f=$_GET["f"];
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
		mysqli_query($con,"UPDATE repair_data SET result=".$f."
		WHERE id=".$num);
		mysqli_close($con);
		header("location:admin.php");
	}
}
else{
	echo "不允许访问的页面 ";
	header("location:login.php");
	
}   


?>