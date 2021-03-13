var topheight=150;	  //与顶部的距离
var default_view=0;   //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie
$(function(){
	
	$("#ke_btn").click(function(){
	  $(".kf_btn").animate({ right: "-130"}, 500);
	  $(this).hide();
	  $('#ke_btn1').show();
	  addCookie('kf_6', 0, 0);
	});
	
	$("#ke_btn1").click(function(){
	  $(".kf_btn").animate({ right: "1"}, 500 );
	  $(this).hide();
	  $('#ke_btn').show();
	  addCookie('kf_6', 1, 0);
	});
})

showDefaultView(default_view);

//设置默认展开或收缩状态
function showDefaultView(status) {
	var cookieValue = getCookie('kf_6');
	if (cookieValue != "") {
		status = cookieValue;
	}
	$('.kf_btn').css('top',topheight);
	if (status == 1) {
		$('.kf_btn').css('right',1);
		$('#ke_btn').show();
		$('#ke_btn1').hide();
	} else {
		$('.kf_btn').css('right',-130);
		$('#ke_btn').hide();
		$('#ke_btn1').show();
	}
	addCookie('kf_6', status, 0);
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