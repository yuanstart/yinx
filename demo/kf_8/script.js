var topheight=150;	  //与顶部的距离
var default_view=0;   //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie

$(function() {
	showDefaultView(default_view);
	$('.q_list li a,.backtop li a').hover(
		function(){
			$(this).children("span").stop(true,true).animate({ left: '0px' }, 'fast')
		},
		function(){
			$(this).children("span").stop(true,true).animate({ left: '-84px' }, 'fast')
		}
	)
	$(".wb_s a").hover(function() {
		$(this).children("span").show();
		$(this).children("span").stop(true,true).animate({left: '-52px' },400);
	}, function() {
		$(this).children("span").stop(true,true).animate({left: '0px'},400,function(){$(this).hide();});
	});
	$(".wb_s1 a").hover(function() {
		$(this).children("span").show();
		$(this).children("span").stop(true,true).animate({left: '-38px' },400);
	}, function() {
		$(this).children("span").stop(true,true).animate({left: '0px'},400,function(){$(this).hide();});
	});
	
	$(".wx_s a").hover(function() {
		$(this).children("span").stop(true,true).fadeIn(400);
	}, function() {
		$(this).children("span").stop(true,true).fadeOut(700);
	});
	$(".wx_s1 a").hover(function() {
		$(this).children("span").stop(true,true).fadeIn(400);
	}, function() {
		$(this).children("span").stop(true,true).fadeOut(700);
	});
	
});

//显示隐藏方法
function HideFoot(){
	var winHeight = $(window).height();
	var objHeight = $(".qq_s").height();
	var objTop = winHeight - objHeight - 15;
	$(".qq_s").animate({top:objTop},400,function(){
		$('.qq_s').css("display","none");
		$('.qq_s1').css("display","block");		
	});
	 addCookie('kf_8', 0, 0);
}
function showFoot(){
	$(".qq_s").css("display", "block");
	$(".qq_s1").css("display", "none");
	$(".qq_s").animate({top:topheight},400);
	addCookie('kf_8', 1, 0);
}
//返回顶部
function backToTop(){
	$("html,body").animate({ scrollTop: 0 },100,function(){
	});
}

//设置默认展开或收缩状态
function showDefaultView(status) {
	var cookieValue = getCookie('kf_8');
	if (cookieValue != "") {
		status = cookieValue;
	}
	$('.qq_s').css('top',topheight);
	if (status == 1) {
       $(".qq_s").css("display", "block");
	   $(".qq_s1").css("display", "none");
	} else {
		$('.qq_s').css("display","none");
		$('.qq_s1').css("display","block");
	}
	addCookie('kf_8', status, 0);
}

//写Cookie
function addCookie(objName, objValue, objHours) {
	var str = objName + "=" + escape(objValue);
	if (objHours > 0) {//为0时不设定过期时间，浏览器关闭时cookie自动消失
		var date = new Date();
		var ms = objHours * 3600 * 1000;
		date.setTime(date.getTime() + ms);
		str += "; expires=" + date.toGMTString();
	}
	document.cookie = str;
}

//读Cookie
function getCookie(objName) {//获取指定名称的cookie的值
	var arrStr = document.cookie.split("; ");
	for (var i = 0; i < arrStr.length; i++) {
		var temp = arrStr[i].split("=");
		if (temp[0] == objName) return unescape(temp[1]);
	}
	return "";
}