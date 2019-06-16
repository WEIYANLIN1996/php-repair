<?php 
session_start();
session_destroy();
session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>后台登录</title>
		<link rel="stylesheet" href="css/admin.css" />
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
	</head>
	<body style="background: deepskyblue;">		
		<div class="login_groupl">
			<form action="adminget.php" method="post">
				<p>管理员用户名：</p>
				<input type="text" name="admin" />
				<p>密码：</p>
				<input type="password" name="psw" />
				<p></p>
				<input type="submit"  value="登录" style="background: blue; color: white;height: 50px;"/>
			</form>
		</div>		
	</body>
</html>
