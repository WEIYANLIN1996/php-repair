<?php
session_start();
if ($_SESSION['admin']=="ybadmin"){
	$servername = "localhost";
	$username = "root";
	$password = "wyl336339";
	$dbname = "play";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
    //最新信息读取	
	$sql = "SELECT id,ybid,fbcontent,date FROM fb_db WHERE result=1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$x=$result->num_rows;			
	}
	else {
		$x=0;
	}
	$sql2 = "SELECT id,ybid,fbcontent,date FROM fb_db WHERE result=2";
	$lresult = $conn->query($sql2);
	if ($lresult->num_rows > 0) {
		$x2=$lresult->num_rows;			
	}
	else {
		$x2=0;
	}
	//已解决报修订单读取	
	$conn->close();	
}	
else{
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>宿舍报修后台</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="js/jquery.min.js" ></script>
		<script type="text/javascript" src="js/activejs.js" ></script>
		<link rel="stylesheet" href="css/admin.css" />
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="color:white;background: blue;">
		    <div class="container-fluid">
		    <div class="navbar-header"> 
		        <a class="navbar-brand" href="#" style="color:white;">欢迎管理员：<?=$_SESSION['admin']?></a>
		        <a class="navbar-brand" href="login.php" style="color:red;">退出</a>
		    </div>		    
		    </div>
		</nav>
        <div class="news_info">
        	<table class="table_info" style="width: 100%;">
			   <p style="background: #46A3FF;color: white;">最新反馈(<span style="color:red"><?=$x?></span>)</p>
			  <thead>
			    <tr>
			      <th>易班id</th>
			      <th>反馈内容</th>
			      <th>反馈日期</th>
				  <th>操作</th>
			    </tr>
			  </thead>
			  <tbody style="background: bisque;">
			  <?php 
			        if ($x>0){
						while($row = $result->fetch_assoc()){
							$url='fblook.php?num='.$row["id"];
							echo "<tr>";
							echo '<td class="'.'td1">'.$row["ybid"]."</td>";
							echo '<td class="'.'td2">'.$row["fbcontent"]."</td>";
							echo '<td class="'.'td3">'.$row["date"]."</td>";
							echo ' <td class="td8"><a class="a1" href="'.$url.'">已查看</a></td>';
							echo "</tr>";						
					    }
					}
			        else{
						echo "<tr>";
					}                 			 			  
			  ?>
			  </tbody>
			</table>
        </div>
		<div class="news_info">
        	<table class="table_info" style="width: 100%;">
			   <p style="background: #46A3FF;color: white;">报修反馈(<span style="color:red"><?=$x2?></span>)</p>
			  <thead>
			    <tr>
			      <th>易班id</th>
			      <th>反馈内容</th>
			      <th>反馈日期</th>
			    </tr>
			  </thead>
			  <tbody style="background: bisque;">
			  <?php 
			        if ($x2>0){
						while($row = $lresult->fetch_assoc()){
							echo "<tr>";
							echo '<td class="'.'td1">'.$row["ybid"]."</td>";
							echo '<td class="'.'td2">'.$row["fbcontent"]."</td>";
							echo '<td class="'.'td3">'.$row["date"]."</td>";
							echo "</tr>";						
					    }
					}
			        else{
						echo "";
					}                 			 			  
			  ?>
			  </tbody>
			</table>
        </div>
		<div class="jumpp">
        	<a href="admin.php" style="color:#FFFFFF;width:80px;height:50px;background:blue;color:">返回</a>
        </div>
               
       <nav class="navbar navbar-default navbar-fixed-bottom footer" role="navigation" style="position: fixed;width:100%;height: 35px; background: #4F4F4F;bottom: 3px;">
		    <div class="bottom_xp">Copyright@五邑大学易班工作站 AllRightsReserved.开发者:jjl</div>
		</nav>
	</body>
</html>