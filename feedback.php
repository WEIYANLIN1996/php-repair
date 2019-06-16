<?php
session_start();
if ($_SESSION['ybid']!=""){
	$url='fbget.php';
}
else{
	header("location:repair.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>保修反馈</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="js/jquery.min.js" ></script>
		<link rel="stylesheet" href="css/repair.css"/>
	</head>
	<body>
		<div style="width: 100%">
			<form class="row" method="post" onsubmit="return checkForm()" action="<?=$url?>" style="width: 100%">	   		
		   		<div class="input_group1" style="width: 100%;margin-left:20px ">
		   			<p>反馈信息详情</p>
		   			<textarea name="content" id="rpxq" style="width:80%;height: 200px;" placeholder="请认真填写你的反馈信息，我们会及时查看并解决"></textarea>
		   		</div>
		   		<input type="hidden" style="width: 100%;" name="ybid" value="<?=$_SESSION['ybid']?>">
		   		<div class="input_group2" style="bottom: 5px;position: absolute;width: 95%;margin-left:20px ;">
		   			<input type="submit" style="width: 100%;" value="提交">
		   		</div>	   		
	   	   </form>	   	    
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
