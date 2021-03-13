var topheight = 150; //与顶部的距离
var default_view=0;   //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie
$(function () {

	//展开
	function Qust_contachScroll (){
		var st = 0;
		if (document.documentElement && document.documentElement.scrollTop) {
			st = document.documentElement.scrollTop;
		} else if (document.body) {
			st = document.body.scrollTop;
		}
		
		var height = $(".qust_contach").height();
		
		if ( st>300) {
			var top = topheight+st;
			$(".qust_contach").stop().animate(
				{
					top: top
				},300,null,function(){
					$("#toTop").stop().animate({
						height:45
					});
				});
		} else {
			var top = topheight+st;
			if(top<=0)
			{
				top=topheight
			}
			$(".qust_contach").stop().animate(
				{
					top: top
				},300,null,function(){
					$("#toTop").stop().animate({
						height:0
					});
				});
		}
	}
	
	//关闭
	function qust_showScroll(){
		var st = 0;
		if (document.documentElement && document.documentElement.scrollTop) {
			st = document.documentElement.scrollTop;
		} else if (document.body) {
			st = document.body.scrollTop;
		}
		
		//var contactTop = $(".qust_show").offset().top;
		var height = $(".qust_show").height();
		
		if ( st>80) {
			var top = topheight+st;
			
			$(".qust_show").stop().animate(
				{
					top: top
				},300);
		} else {
			var top = topheight+st;
			if(top<=0)
			{
				top=topheight
			}
			$(".qust_show").stop().animate(
				{
					top: top
				},300);
		}
	}
	
	//设置默认展开或收缩状态
	function showDefaultView(status) {
		var cookieValue = getCookie('online_service');
		if (cookieValue != "") {
			status = cookieValue;
		}
		if (status == 1) {
			$('.qust_contach').show();
			$('.qust_show').hide();
		} else {
			$('.qust_contach').hide();
			$('.qust_show').show();
		}
		addCookie('online_service', status, 0);
	}
	
	Qust_contachScroll();
	qust_showScroll();
	showDefaultView(default_view); 
	
	$(window).scroll(function () {
		Qust_contachScroll();
		qust_showScroll();
	});
	$(window).resize(function () {
		Qust_contachScroll();
		qust_showScroll();
	});
	
	$(".qst_close").click(function(){
		$(".qust_contach").fadeOut(function(){$(".qust_show").fadeIn();});
		addCookie('online_service',0,0);
	});
	$(".qust_show").click(function(){
		$(".qust_show").fadeOut(function(){$(".qust_contach").fadeIn();});
		addCookie('online_service',1,0);
	});
	$("#toTop").click(function(){
		$(".qust_contach").stop().animate(
			{
				top: topheight
			},300);
		jQuery("html, body").animate({ scrollTop: 0 }, 300);			
		
	});
});

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