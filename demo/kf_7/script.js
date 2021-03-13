var topheight=150;	  //与顶部的距离
var default_view=0;   //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie

$(function(){
	$(".qq_btn").click(function(){
	  $(".qq_object").animate({ left: "-157"}, 500 );
	  $(this).hide();
	  $('.qq_btn1').show();
	  addCookie('kf_7', 0, 0);
	});
	
	$(".qq_btn1").click(function(){
	  $(".qq_object").animate({ left: "0"}, 500 );
	  $(this).hide();
	  $('.qq_btn').show();
	  addCookie('kf_7', 1, 0);
	});
	
})

showDefaultView(default_view);

//设置默认展开或收缩状态
function showDefaultView(status) {
	var cookieValue = getCookie('kf_7');
	if (cookieValue != "") {
		status = cookieValue;
	}
	$('.qq_object').css('top',topheight);
	if (status == 1) {
		$('.qq_object').css('left',0);
		$('.qq_btn').show();
		$('.qq_btn1').hide();
	} else {
		$('.qq_object').css('left',-157);
		$('.qq_btn').hide();
		$('.qq_btn1').show();
	}
	addCookie('kf_7', status, 0);
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