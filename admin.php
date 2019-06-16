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
	$sql = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date FROM repair_data  WHERE result=1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$x=$result->num_rows;			
	}
	else {
		$x=0;
	}
	//已解决报修订单读取
	$sql5 = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date FROM repair_data  WHERE result=3";
	$afresult = $conn->query($sql5);
	$fx=$afresult->num_rows;
	//待解决报修订单读取
	$sql2 = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date FROM repair_data  WHERE result=2";
	$rpresult = $conn->query($sql2);
	 
	if ($rpresult->num_rows >=0 and $rpresult->num_rows <10) {	
        $sql3 = "SELECT id,name,schoolid,dromnum,number,repairtype,rexq,date FROM repair_data  WHERE result=4";
	    $fresult = $conn->query($sql3);	
        $x2=$rpresult->num_rows;		
	}
	elseif($rpresult->num_rows >=10) {
		$x2=$rpresult->num_rows;
	}
	else{
		$x2=0;
	}
	$conn->close();	
}	
else{
	header("location:admin.php");
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
		<script type="text/javascript" src="js/jquery.table2excel.js"></script>
		<link rel="stylesheet" href="css/admin.css" />
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="color:white;background: blue;">
		    <div class="container-fluid">
		    <div class="navbar-header"> 
		        <a class="navbar-brand" href="#" style="color:white;">欢迎管理员：<?=$_SESSION['admin']?></a>
		        <a class="navbar-brand" href="login.php" style="color:red;">退出</a>
				<a class="navbar-brand" href="fbadmin.php" style="color:red;">反馈信息</a>
		    </div>		    
		    </div>
		</nav>
        <div class="news_info">
        	<table class="table_info" style="width: 100%;">
			   <p style="background: #46A3FF;color: white;">最新报修信息(<span style="color:red"><?=$x?></span>)</p>
			  <thead>
			    <tr>
			      <th>姓名</th>
			      <th>学号</th>
			      <th>宿舍号</th>
			      <th>电话</th>
			      <th>维修类别</th>
			      <th>详情</th>
			      <th>报修日期</th>
				  <th>操作</th>
				  <th>备注</th>
			    </tr>
			  </thead>
			  <tbody style="background: bisque;">
			  <?php 
			        if ($x>0){
						while($row = $result->fetch_assoc()){
							$url='look.php?num='.$row["id"];
							echo "<tr>";
							echo '<td class="'.'td1">'.$row["name"]."</td>";
							echo '<td class="'.'td2">'.$row["schoolid"]."</td>";
							echo '<td class="'.'td3">'.$row["dromnum"]."</td>";
							echo '<td class="'.'td4">'.$row["number"]."</td>";
							echo '<td class="'.'td5">'.$row["repairtype"]."</td>";
							echo '<td class="'.'td6">'.$row["rexq"]."</td>";
							echo '<td class="'.'td7">'.$row["date"]."</td>";
							echo ' <td class="td8"><a class="a1" href="'.$url.'">已查看</a></td>';
							echo ' <td class="td8"><a class="a1" href="'.$url.'">发送消息</a></td>';
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
        	<table class="table_info table2excel1" style="width: 100%;">
			  <p style="background: #46A3FF;color: red;">待解决宿舍报修:</p>
			  <thead>
			    <tr>
			      <th>姓名</th>
			      <th>学号</th>
			      <th>宿舍号</th>
			      <th>电话</th>
			      <th>维修类别</th>
			      <th>详情</th>
			      <th>报修日期</th>
			      <th>操作</th>
				  <th>选择导出</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php
				    if($x2>=0 and $x2<10){
						while($row = $rpresult->fetch_assoc()){
							$urlf='finish.php?f=3&num='.$row["id"];
							$urln='finish.php?f=4&num='.$row["id"];
							echo "<tr>";
							echo '<td class="'.'td1">'.$row["name"]."</td>";
							echo '<td class="'.'td2">'.$row["schoolid"]."</td>";
							echo '<td class="'.'td3">'.$row["dromnum"]."</td>";
							echo '<td class="'.'td4">'.$row["number"]."</td>";
							echo '<td class="'.'td5">'.$row["repairtype"]."</td>";
							echo '<td class="'.'td6">'.$row["rexq"]."</td>";
							echo '<td class="'.'td7">'.$row["date"]."</td>";
							echo '<td class="td8"><a href="'.$urlf.'" class="a1">已解决</a><a class="a2" href="'.$urln.'">转后勤</a></td';
							echo "</tr>";
					    }
						$y=0;
						while($row = $fresult->fetch_assoc()){
							$y+=1;
							if ($y<=5){
								$urlf='finish.php?f=3&num='.$row["id"];
								$urln='finish.php?f=4&num='.$row["id"];
								echo "<tr>";
								echo '<td class="'.'td1">'.$row["name"]."</td>";
								echo '<td class="'.'td2">'.$row["schoolid"]."</td>";
								echo '<td class="'.'td3">'.$row["dromnum"]."</td>";
								echo '<td class="'.'td4">'.$row["number"]."</td>";
								echo '<td class="'.'td5">'.$row["repairtype"]."</td>";
								echo '<td class="'.'td6">'.$row["rexq"]."</td>";
								echo '<td class="'.'td7">'.$row["date"]."</td>";
								echo '<td class="td8"><a href="'.$urlf.'" class="a1">已解决</a><a class="a2" href="#">已转后勤</a></td';
								echo "</tr>";
							}
							else{
								break;
							}												
					    }			        					
					}
					elseif($x2>10){
						while($row = $rpresult->fetch_assoc()){
							$urlf='finish.php?f=3&num='.$row["id"];
							$urln='finish.php?f=4&num='.$row["id"];
							echo "<tr>";
							echo '<td class="'.'td1">'.$row["name"]."</td>";
							echo '<td class="'.'td2">'.$row["schoolid"]."</td>";
							echo '<td class="'.'td3">'.$row["dromnum"]."</td>";
							echo '<td class="'.'td4">'.$row["number"]."</td>";
							echo '<td class="'.'td5">'.$row["repairtype"]."</td>";
							echo '<td class="'.'td6">'.$row["rexq"]."</td>";
							echo '<td class="'.'td7">'.$row["date"]."</td>";
							echo '<td class="td8"><a href="'.$urlf.'" class="a1">已解决</a><a class="a2" href="'.$urln.'">转后勤</a></td';
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
        	<table class="table_info table2excel2" style="width: 100%;" >
			  <p style="background: #46A3FF;color: white;">已解决宿舍保修:</p>
			  <thead>
			    <tr>
			      <th>姓名</th>
			      <th>学号</th>
			      <th>宿舍号</th>
			      <th>电话</th>
			      <th>维修类别</th>
			      <th>详情</th>
			      <th>报修日期</th>
			      <th>操作</th>
				  <th>维修结果评价</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php
			    if($fx>0){
					    $servername = "localhost";
						$username = "root";
						$password = "wyl336339";
						$dbname = "play";
						
						$conn = new mysqli($servername, $username, $password, $dbname);
						while($row = $afresult->fetch_assoc()){
							echo "<tr>";
							echo '<td class="'.'td1">'.$row["name"]."</td>";
							echo '<td class="'.'td2">'.$row["schoolid"]."</td>";
							echo '<td class="'.'td3">'.$row["dromnum"]."</td>";
							echo '<td class="'.'td4">'.$row["number"]."</td>";
							echo '<td class="'.'td5">'.$row["repairtype"]."</td>";
							echo '<td class="'.'td6">'.$row["rexq"]."</td>";
							echo '<td class="'.'td7">'.$row["date"]."</td>";
							echo '<td class="td8"><a href="#" class="a1">已解决</a></td>';
							$psql = "SELECT i,j FROM review_db WHERE bxid=".$row["id"];						
							$presult = $conn->query($psql);
							if ($presult->num_rows > 0) {
								while($row1 = $presult->fetch_assoc()){
									echo '<td style="'.'text-align:center;color:red;">维修质量:'.$row1["i"].'星,服务态度:'.$row1["j"].'星</td>';
								}			
							}
							else{
								echo "";
							}							
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
		    <button style="width:80px;height:50px;background:blue;color:#FFFFFF;"><a href="allrepair.php" style="color:#FFFFFF;">查看全部</a></button>
        	<a href="allrepair.php" style="color:#FFFFFF;width:80px;height:50px;background:blue;color:">查看全部</a>
			<input type="button" value="待解决导出表格" class="btn btn-primary" onclick="table2Excel1('待解决报修信息')"/>
			<input type="button" value="已解决导出表格" class="btn btn-primary" onclick="table2Excel2('已解决报修信息')"/>
        </div>
               
       <nav class="navbar navbar-default navbar-fixed-bottom footer" role="navigation" style="position: fixed;width:100%;height: 35px; background: #4F4F4F;bottom: 3px;">
		    <div class="bottom_xp">Copyright@五邑大学易班工作站 AllRightsReserved.开发者:jjl</div>
		</nav>
	</body>
	<script>
	    function table2Excel1(filename){
			$(".table2excel1").table2excel({
				exclude: ".noExl",//class="noExl"的列不导出
				name: "Excel Document Name",
				filename: filename,//文件名称
				fileext: ".xls",//文件后缀名
				exclude_img: true,//导出图片
				exclude_links: true,//导出超链接
				exclude_inputs: true//导出输入框内容
			});
		}
		function table2Excel2(filename){
			$(".table2excel2").table2excel({
				exclude: ".noExl",//class="noExl"的列不导出
				name: "Excel Document Name",
				filename: filename,//文件名称
				fileext: ".xls",//文件后缀名
				exclude_img: true,//导出图片
				exclude_links: true,//导出超链接
				exclude_inputs: true//导出输入框内容
			});
		}
	</script>
	
</html>
