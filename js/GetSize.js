$(function () {
    $body_height = $("body").height();//窗口总高度
    $main_width = $("#main1").width();//主体的宽度
    $main1_height = (parseFloat($main_width) / 5) + 'px';//第一个星级高度
    $main1_top = (parseFloat($body_height) - parseFloat($main1_height))/3 + 'px';//第一个星级高度偏移量
    $("#main1").css('height', $main1_height).css('top', $main1_top);//第一个星级css样式确定

    $main2_top = parseFloat($main1_top) + parseFloat($main1_height) + 20 + 'px';//第二个星级偏移量
    $("#main2").css('height', $main1_height).css('top', $main2_top);//第二个星级css样式确定

    $submit_top = parseFloat($main1_height) + parseFloat($main2_top) + 20 + 'px';//评价按钮偏移量
    $("#submit").css('top',$submit_top)//评价按钮css样式确定

    $("#main1_info").css('top', $main1_top).css('height',$main1_height);

    $("#main2_info").css('top', $main2_top).css('height',$main1_height);
    $fontSize = parseFloat($main1_height)/3 + 'px';
    $("#main1_info").css('fontSize', $fontSize);
    $("#main2_info").css('fontSize', $fontSize);
    var $i = -1;
    //事件
    $(".star_first").mouseover(function () {
        $(this).css('background-image', "url(\"img/star_light.png\")").prevAll().css('background-image', "url(\"img/star_light.png\")");
        $(this).nextAll().css('background-image', "url(\"img/star.png\")");
    }).bind('mouseleave',function () {
        $(".star_first").each(function (index, value) {
            if (index > $i){
                $(this).css('background-image', "url(\"img/star.png\")");
            }else{
                $(this).css('background-image', "url(\"img/star_light.png\")");
            }
        })
        // $(this).css('background-image', "url(\"img/star.png\")").prevAll().css('background-image', "url(\"img/star.png\")");
    }).click(function () {
        $(this).css('background-image', "url(\"img/star_light.png\")").prevAll().css('background-image', "url(\"img/star_light.png\")");
        $(this).nextAll().css('background-image', "url(\"img/star.png\")");
        $i = $(this).index();
    })
    var $j = -1;
    //事件
    $(".star_second").mouseover(function () {
        $(this).css('background-image', "url(\"img/star_light.png\")").prevAll().css('background-image', "url(\"img/star_light.png\")");
        $(this).nextAll().css('background-image', "url(\"img/star.png\")");
    }).bind('mouseleave',function () {
        $(".star_second").each(function (index, value) {
            if (index > $j){
                $(this).css('background-image', "url(\"img/star.png\")");
            }else{
                $(this).css('background-image', "url(\"img/star_light.png\")");
            }
        })
        // $(this).css('background-image', "url(\"img/star.png\")").prevAll().css('background-image', "url(\"img/star.png\")");
    }).click(function () {
        $(this).css('background-image', "url(\"img/star_light.png\")").prevAll().css('background-image', "url(\"img/star_light.png\")");
        $(this).nextAll().css('background-image', "url(\"img/star.png\")");
        $j = $(this).index();
    })
    
    $("#upload").click(function () {
        if ($i == -1 || $j == -1){
            alert("未选择评价");
            return false;
        }
		var id=$(".id").text();
        $i = $i + 1;
        $j = $j + 1;
		window.location.href="review.php?id="+id+"&i="+$i+"&j="+$j;
        /**$.ajax({
            url:"review.php",//提交到的地址
            dataType:'text',
            type:'POST',
            data:{
                maintenance:$i,//维修质量
                attitude:$j,
				id:id,
            },
            success:function () {
                 alert("评价成功");
            },
            error:function () {
                alert("评价失败");
            }
        })**/
    })
})