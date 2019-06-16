<?php
session_start();
$n=$_GET["n"];
if ($_SESSION['ybid']!=" "){
	$servername = "localhost";
	$username = "root";
	$password = "wyl336339";
	$dbname = "play";
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
    if($n!=''){	
		$sql = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date,result FROM repair_data WHERE id=".$n;
		$result = $conn->query($sql);	 
		if ($result->num_rows > 0) {
			$x=$result->num_rows;	
		}
		else {
			$x=0;
		}
	}
	else {
			header("location:repair.php");
	}
	
}
else{
	header("location:repair.php");	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/appraiser.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <title>结单评价</title>
</head>
<body>
    <div id="header">
    <p>订单详情:</p>
	<?php  
		while($row = $result->fetch_assoc()){
			echo'<div>订单id:<span class="id">'.$n.'</span></div>';
			echo'<div>订单详情:'.$row['rexq'].'</div>';
			echo'<div>报修日期:'.$row['date'].'</div>';
		}
	?>	 	    
	</div>
    <div id="main1_info">维修<br>质量</div>
    <div id="main1">
        <div id="star1" class="star_first"></div>
        <div id="star2" class="star_first"></div>
        <div id="star3" class="star_first"></div>
        <div id="star4" class="star_first"></div>
        <div id="star5" class="star_first"></div>
    </div>
    <div id="main2_info">服务<br>态度</div>
    <div id="main2">
        <div id="star1" class="star_second"></div>
        <div id="star2" class="star_second"></div>
        <div id="star3" class="star_second"></div>
        <div id="star4" class="star_second"></div>
        <div id="star5" class="star_second"></div>
    </div>
    <div id="submit">
        <input type="button" value="评价" id="upload">
    </div>

<!--底部-->
    <div id="footer"></div>
	<script src="js/GetSize.js"></script>
</body>
</html>