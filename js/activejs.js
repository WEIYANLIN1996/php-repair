$(document).ready(function(){
	var num=$(".td3").text();
	var num=$(".td7").text();
	$('.a1').click(function(){
		$.post("aleadly.php",
		{
			num:num,
		},
		function(data){
			if(data.res==0){
				$('.a2').css('display','none');
			}
			else{
				$('.a2').css('display','none');
			}
			
		});	
	});
	$('.a2').click(function(){
		$.post("nofinish.php",
		{
			num:num,
		},
		function(data){
			if(data.res==0){
				$('.a1').css('display','none');
			}
			else{
				$('.a1').css('display','none');
			}
			
		});	
	});
});
