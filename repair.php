<?php
   session_start();
   $_SESSION['ybid']="10889205";
   $urlrang=rand(1000000000000, 9999999999999);
   $dataurl="dataget.php?r=".$urlrang;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>宿舍报修</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="js/jquery.min.js" ></script>
		<link rel="stylesheet" href="css/repair.css" />
	</head>
	<body>
       <nav class="navbar navbar-default navbar-fixed-top" style="background:blue;height: 50px;"role="navigation">
		    <div class="container-fluid">
		    <div class="navbar-header">
		        <a class="navbar-brand" href="#"><img src="img/cj.jpg"></a>
		        <a class="navbar-brand" href="#" style="color:white;">jjl</a>
		    </div>
		    </div>
		</nav>
	   <div class="container" style="width:100%">
	   	<div class="banner"><img src="img/repair.png"></div>
	   	<form class="row" method="post" onsubmit="return checkForm()" action="<?=$dataurl?>">
	   		<div class="input_group">
	   			<div class="input_info">
	   				<p>姓名：</p>
	   				<input type="text" id="name" name="name">
	   			</div>
	   			<div class="input_info">
	   				<p>学号：</p>
	   				<input type="text" id="sid" name="schoolid">
	   			</div>
	   		</div>
	   		<div class="input_group">
	   			<div class="input_info">
	   				<p>宿舍房号：</p>
	   				<input type="text" id="dromnum" name="roomid" placeholder="307">
	   			</div>
	   			<div class="input_info">
	   				<p>联系电话：</p>
	   				<input type="text" id="number" name="number">
	   			</div>
	   		</div>
	   		<div class="input_group">
	   			<div class="input_info" name="buildnember">
	   				<p>宿舍楼号(栋)：</p>
	   				<select class="form-control" name="roomnum">
				      <option>7</option>
				      <option>8</option>
				      <option>9</option>
				      <option>10</option>
				      <option>11</option>
				      <option>12</option>
				      <option>13</option>
				      <option>14</option>
				      <option>15</option>
				      <option>16</option>
				      <option>17</option>
				      <option>18</option>
				      <option>19</option>
				      <option>20</option>
				      <option>21</option>
				      <option>22</option>
				      <option>23</option>
				      <option>24</option>
				      <option>25</option>
				      <option>26</option>
				      <option>27</option>
				      <option>28</option>
				      <option>29</option>
				      <option>30</option>
				      <option>31</option>
				      <option>32</option>
				      <option>33</option>
				      <option>34</option>
				      <option>35</option>
				      <option>36</option>
				      <option>37</option>
				      <option>38</option>
				      <option>39</option>
				      <option>40</option>
				      <option>41</option>
				      <option>42</option>
				      <option>43</option>
				      <option>44</option>
				      <option>45</option>
				      <option>46</option>
				      <option>47</option>
				      <option>48</option>
				    </select>
	   			</div>
	   			<div class="input_info">
	   				<p>维修类别：</p>
	   				<select class="form-control" name="repairtype">
				      <option>水电类</option>
				      <option>土建类</option>
				      <option>家具类</option>
				      <option>其他</option>				      
				    </select>
	   			</div>
	   		</div>
	   		<div class="input_group1">
	   			<p>报修问题详情</p>
	   			<textarea name="rexq" id="rpxq" placeholder="请详细描述所需报修的问题，预约报修时间（按上课时间填写段如:4月30日8:00-10:00），以便我们及时为你修复"></textarea>
	   		</div>
	   		<div class="input_group2">
	   			<input type="submit" value="提交">
	   		</div>
	   		
	   	</form>
		   
	   </div>
	    <p>备注：一般问题3天内解决，特殊情况物业会及时跟您沟通维修进度，物业咨询电话3296141（工作时间:8:00~18:00）</p>
	   </div>
		<div id="menu" class="menu">
		    <div id="one" class="subMenu text-center" data-src="repair.php">
		        <img class="menu_img"src="img/jd.jpg" data-imgname="my"/>
		        <div class="menu_name"><a href="repair.php">报修提交</a></div>
		    </div>
		    <div id="two" class="subMenu text-center" data-src="repairindex.php?my=1">
		        <img class="menu_img" src="img/cj.jpg"/>
		        <div class="menu_name"><a href="repairindex.php?my=1">我的报修</a></div>
		    </div>
		    <div id="three" class="subMenu text-center" data-src="feedback.php">
		        <img class="menu_img" src="img/js.jpg"/>
		        <div class="menu_name"><a href="feedback.php">报修反馈</a></div>
		    </div>
		</div		
	</body>
	<script>
		
	function checkForm(){
		var name=$('#name').val();
		var sid=$('#sid').val();
		var dromnum=$('#dromnum').val();
		var num=$('#number').val();
		var rpxq=$('#rpxq').val();
		if(name==''){
			alert("姓名不能为空！");
			return false;
		}
		if(sid==''){
			alert("学号不能为空！");
			return false;
			
		}
		if(sid.length!=10){
			alert("学号格式不正确！");
			return false;
		}
		if(dromnum==''){
			alert("宿舍房号不能为空！");
			return false;
		}
		if(num==''){
			alert("联系电话不能为空！");
			return false;
		}
		if(num.length!=11){
			alert("电话格式不正确！");
			return false;
		}
		if(rpxq==''){
			alert("报修问题详情不能为空！");
			return false;
		}
		else{
			return ture;
			
		}
		    
	}	
	</script>
</html>
