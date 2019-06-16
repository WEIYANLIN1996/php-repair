<?php
session_start();
$ybid=$_SESSION['ybid'];
$fbcontent=$_POST["content"];
$date=date("Y-m-d");
$result=1;
/**
$ybid=1;
$fbcontent=1;
**/
$servername = "localhost";
$username = "root";
$password = "wyl336339";
$dbname = "play";
if($ybid!="" and $fbcontent!=""){
	try {
		$conn = new mysqli($servername, $username, $password,$dbname);
		mysqli_set_charset($conn,'utf8');
		if ($conn->connect_error) {
			die("数据库连接失败: " . $conn->connect_error);
		} 
		//创建数据表
	    /**
		$sql = "CREATE TABLE fb_db (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		ybid VARCHAR(100) NOT NULL,
		fbcontent VARCHAR(300) NOT NULL,
		date VARCHAR(100) NOT NULL,
		result INT(6) NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8";
		if ($conn->query($sql) === TRUE) {
			echo "Table MyGuests created successfully";
		} else {
			echo "创建数据表错误: " . $conn->error;
		}
		**/
		//保存保修信息到数据库
		$sql = "INSERT INTO fb_db ( ybid,fbcontent,date,result)
		VALUES ('".$ybid."','".$fbcontent."','".$date."','".$result."')";
		// 使用 exec() ，没有结果返回 
		if ($conn->query($sql) === TRUE) {
			echo '<p style="width: 100%;height:30px;margin-top: 150px;text-align: center;">报修信息已成功提交，2秒后返回</p>';
			header("Refresh:2;url=repair.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<p>提交失败！<p>";
			header("Refresh:3;url=repair.php");
		}	 
		$conn->close();		
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
		echo "<p>提交失败！<p>";
		header("Refresh:3;url=repair.php");

	}
}
else{
	echo "<p>页面不存在！<p>";
	header("Refresh:3;url=repair.php");
}


?>