var topheight=150;	  //与顶部的距离
var default_view=0;   //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie
(function($){
	var _open = $("#box-kefu").find(".kefu-open");
    var _close = $("#box-kefu").find(".kefu-close");
	showDefaultView(default_view);
	
    _open.find(".close").click(function(){
        _open.animate({width:148},200,function(){
            _open.animate({width:0},200,function(){
                _close.animate({width:34},200);
            });
        });
		addCookie('kf_1', 0, 0);
    });
    _close.click(function(){
        _close.animate({width:44},200,function(){
            _close.animate({width:0},200,function(){
                _open.animate({width:138},200);
            });
        });
		addCookie('kf_1', 1, 0);
    });

})(jQuery)

//设置默认展开或收缩状态
function showDefaultView(status) {
	var cookieValue = getCookie('kf_1');
	if (cookieValue != "") {
		status = cookieValue;
	}
	$('#box-kefu').css('top',topheight);
	if (status == 1) {
		$('.kefu-open').css('width',138);
		$('.kefu-close').css('width',0);
	} else {
		$('.kefu-open').css('width',0);
		$('.kefu-close').css('width',34);
	}
	addCookie('kf_1', status, 0);
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
