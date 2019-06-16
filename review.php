<?php
$id=$_GET["id"];
$i=$_GET["i"];
$j=$_GET["j"];
$date=date("Y-m-d");
/**
$id=$_POST["id"];
$i=$_POST["i"];
$j=$_POST["j"];
echo $id;
echo $i;
echo $j;
**/
session_start();
if ($_SESSION['ybid']!=" "){
	$servername = "localhost";
	$username = "root";
	$password = "wyl336339";
	$dbname = "play";
	try {
		$conn = new mysqli($servername, $username, $password,$dbname);
		mysqli_set_charset($conn,'utf8');
		if ($conn->connect_error) {
			die("数据库连接失败: " . $conn->connect_error);
		} 
		//创建数据表	 
		/**	
		$sql = "CREATE TABLE review_db (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		bxid INT(6) NOT NULL,		
		i INT(6) NOT NULL,
		j INT(6) NOT NULL,
		date VARCHAR(100) NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8";
		if ($conn->query($sql) === TRUE) {
			echo "Table MyGuests created successfully";
		} else {
			echo "创建数据表错误: " . $conn->error;
		}
		**/
		//保存保修信息到数据库
		$ssql = "SELECT id,i,j,date FROM review_db WHERE bxid=".$id;
		$result = $conn->query($ssql);
		if ($result->num_rows > 0) {
			$x=$result->num_rows;	
			echo '<p>你已评价</p>';
			header("Refresh:3;url=appraise.php?n=".$id);
		}
		else {
			$sql = "INSERT INTO review_db (bxid,i,j,date)
			VALUES ('".$id."','".$i."','".$j."','".$date."')";
			// 使用 exec() ，没有结果返回 
			if ($conn->query($sql) === TRUE) {
				echo '<p>评价成功</p>';
				header("Refresh:3;url=appraise.php?n=".$id);
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
				echo "<p>评价失败</p>";
				header("Refresh:3;url=appraise.php?n=".$id);
			}	 
		}	 
		$conn->close();		
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
		echo "<p>提交评价失败！</p>";
		header("Refresh:3;url=appraise.php?n=".$id);

	}
}
else{
	echo "<p>评价失败</p>";
	header("Refresh:3;url=appraise.php?n=".$id);	
}
?>