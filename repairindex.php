<?php
session_start();
$my=$_GET["my"];
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
    if($my==1){	
		$sql = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date,result FROM repair_data WHERE ybid=".$_SESSION['ybid'];
		$result = $conn->query($sql);	 
		if ($result->num_rows > 0) {
			$x=$result->num_rows;			
		}
		else {
			$x=0;
		}
	}
	elseif($my==2){
		$sql2 = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date,result FROM repair_data  WHERE result=3 AND ybid=".$_SESSION['ybid'];
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
			$x=$result->num_rows;			
		}
		else {
			$x=0;
		}
	}
	elseif($my==3){	
        $sql3 = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date,result FROM repair_data  WHERE result=2 AND ybid=".$_SESSION['ybid'];
	    $result = $conn->query($sql3);	
        if ($result->num_rows > 0) {
			$x=$result->num_rows;			
		}
		else {
			$x=0;
		}
        $sql4 = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date,result FROM repair_data  WHERE result=4 AND ybid=".$_SESSION['ybid'];
	    $result4 = $conn->query($sql4);	
        if ($result->num_rows > 0) {
			$x4=$result->num_rows;			
		}
		else {
			$x4=0;
		}	 		
	}
	else{
		$x=0;
	}
	$conn->close();	
}
else{
	header("location:repair.php");	
}



?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>我的报修</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/repair.css" />
		<link rel="shortcut icon" href="img/m.ico" />
		<script type="text/javascript" src="js/jquery-3.3.1.min.js" ></script>
		<script type="text/javascript" src="js/math.js" ></script>
	</head>	
	<body>	
		<nav class="navbartop" role="navigation">
		
			<a href="repairindex.php?my=1">全部</a>
			<a href="repairindex.php?my=2">已解决</a>
			<a href="repairindex.php?my=3">待解决</a>  
        </nav>
	    <div class="repair_order">
	    	<div class="list-group">
			     <?php 
			        if ($x>0){
						while($row = $result->fetch_assoc()){
							//$$urlf='finish.php?f=3&num='.$row["id"];
                            if ($row["result"]==1){
								echo '<a href="#" class="list-group-item">';
								echo'<h4 class="list-group-item-heading">'.$row["rexq"].'</h4>';
								echo'<p class="list-group-item-text">报修时间：'.$row["date"].'<span class="badge">未查看</span></p>';		        
								echo'</a>';
							}						
							elseif($row["result"]==2){							
							    echo '<a href="#" class="list-group-item">';
								echo'<h4 class="list-group-item-heading">'.$row["rexq"].'</h4>';
								echo'<p class="list-group-item-text">报修时间：'.$row["date"].'<span class="badge">待解决</span></p>';		        
								echo'</a>';
							}
                            elseif($row["result"]==3){							
							    echo '<div href="#" class="list-group-item">';
								echo'<h4 class="list-group-item-heading">'.$row["rexq"].'<span class="badge" style="color:red;">已结单</span></h4>';
								echo'<div class="list-group-item-text">报修时间：'.$row["date"].'<a href="appraise.php?n='.$row["id"].'">评价</a></div>';										
								echo'</div>';
							}
                            else{
								echo " ";
							}							
					    }
					}
					elseif($x4>0){							
						echo '<a href="#" class="list-group-item">';
						echo'<h4 class="list-group-item-heading">'.$row["rexq"].'<span class="badge" style="color:red;">已转后勤处</span></h4>';
						echo'<p class="list-group-item-text">报修时间：'.$row["date"].'<span class="badge">待解决</span></p>';		        
						echo'</a>';							
					}
			        else{
						echo " ";
					}                 			 			  
			    ?>			    
			</div>
	    </div>
        <div id="menu" class="menu">
		    <div id="one" class="subMenu text-center" data-src="repair.php">
		        <img class="menu_img"src="img/jd.jpg" data-imgname="my"/>
		        <div class="menu_name"><a href="repair.php">报修提交</a></div>
		    </div>
		    <div id="two" class="subMenu text-center" data-src="repairindex.php">
		        <img class="menu_img" src="img/cj.jpg"/>
		        <div class="menu_name"><a href="repairindex.php?my=1">我的报修</a></div>
		    </div>
		    <div id="three" class="subMenu text-center" data-src="feedback.php">
		        <img class="menu_img" src="img/js.jpg"/>
		        <div class="menu_name"><a href="feedback.php">报修反馈</a></div>
		    </div>
		</div			
	</body>
</html>