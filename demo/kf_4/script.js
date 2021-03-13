var topheight=150;	  //与顶部的距离
var default_view=0;   //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie
(function($){
	var _open = $("#SonlineBox").find(".contentBox");
    var _close = $("#SonlineBox").find(".openTrigger");
	showDefaultView(default_view);
	
    _open.find(".closeTrigger").click(function(){
        _open.animate({width:172},200,function(){
            _open.animate({width:0},200,function(){
                _close.animate({width:30},200);
            });
        });
		addCookie('kf_4', 0, 0);
    });
    _close.click(function(){
        _close.animate({width:40},200,function(){
            _close.animate({width:0},200,function(){
                _open.animate({width:162},200);
            });
        });
		addCookie('kf_4', 1, 0);
    });

})(jQuery)

//设置默认展开或收缩状态
function showDefaultView(status) {
	var cookieValue = getCookie('kf_4');
	if (cookieValue != "") {
		status = cookieValue;
	}
	$('#SonlineBox').css('top',topheight);
	if (status == 1) {
		$('.contentBox').css('width',162);
		$('.openTrigger').css('width',0);
	} else {
		$('.contentBox').css('width',0);
		$('.openTrigger').css('width',30);
	}
	addCookie('kf_4', status, 0);
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
