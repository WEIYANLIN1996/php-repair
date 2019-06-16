<?php
session_start();
$admin=$_POST["admin"];
$psw=$_POST["psw"];
if($admin=="ybadmin" and $psw=="yiban12345"){
	$_SESSION['admin']=$admin;
	header("location:admin.php");
}
elseif($admin=="wyadmin" and $psw=="wy12345"){ 
	$_SESSION['admin']=$admin;
	header("location:admin.php");
}   
elseif($admin=="hqadmin" and $psw=="hq12345"){ 
	$_SESSION['admin']=$admin;
	header("location:hqadmin.php");
}   
else{ 
	echo "<p>账号或密码错误,3秒后返回登录！<p>";
	header("Refresh:3;url=login.php");
}

?>
