<?php

$ybid=10889205;
$name=$_POST["name"];
$schoolid=$_POST["schoolid"];
$roomnum=$_POST["roomnum"];
$roomid=$_POST["roomid"];
$dromnum=$roomnum."-".$roomid;
$number=$_POST["number"];
$repairtype=$_POST["repairtype"];
$rexq=$_POST["rexq"];
$date=date("Y-m-d");
$result=1;

$servername = "localhost";
$username = "root";
$password = "wyl336339";
$dbname = "play";

/**
$name=1;
$schoolid=1;
$dromnum=1 ;
$number=1;
$repairtype=1;
$rexq=1;
**/
if($name!="" and $schoolid!="" and $dromnum!="" and $number!="" and $repairtype!="" and $rexq!=""){
	try {
		$conn = new mysqli($servername, $username, $password,$dbname);
		mysqli_set_charset($conn,'utf8');
		if ($conn->connect_error) {
			die("数据库连接失败: " . $conn->connect_error);
		} 
		//创建数据表
		/**
		$sql = "CREATE TABLE repair_data (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		ybid VARCHAR(100) NOT NULL,
		name VARCHAR(30) NOT NULL,
		schoolid VARCHAR(30) NOT NULL,
		dromnum VARCHAR(50) NOT NULL,
		number VARCHAR(50) NOT NULL,
		repairtype VARCHAR(50) NOT NULL,
		rexq VARCHAR(300) NOT NULL,
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
		$sql = "INSERT INTO repair_data ( ybid,name,schoolid,dromnum,number,repairtype,rexq,date,result)
		VALUES ('".$ybid."','".$name."','".$schoolid."','".$dromnum."','".$number."','".$repairtype."','".$rexq."','".$date."',$result)";
		// 使用 exec() ，没有结果返回 
		if ($conn->query($sql) === TRUE) {
			echo '<p style="width: 100%;height:30px;margin-top: 150px;text-align: center;">报修信息已成功提交，2秒后返回</p>';
			header("Refresh:2;url=http://f.yiban.cn/iapp192531");
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
// 数据库存入



?>