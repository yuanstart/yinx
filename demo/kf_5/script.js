/**
 * Dependence jquery-1.7.2.min.js
 * 参数 : 
 * skin         --> 皮肤控制
 * float        --> 悬浮方向[left or right]
 * topheight    --> 与顶部的距离
 * default_view --> 1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie
 **/

(function($){
    $.fn.fix = function(options){
      var defaults = {
			skin : 'gray',         //皮肤 “blue”  “orange”  “green”  “red” “gray” “pink”
			float : 'right',       //位置 “left” or “right” 
			topheight : 150,       //与顶部的距离
			default_view :0,       //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie
    	}
	    var options = $.extend(defaults, options);		
		
	    this.each(function(){
			//获取对象
			var thisBox = $(this),
				closeBtn = thisBox.find('.close_btn' ),
				show_btn = thisBox.find('.show_btn' ),
				sideContent = thisBox.find('.side_content'),
				contentWidth = thisBox.find('.side_list').width(),
				sideList = thisBox.find('.side_list');
				
			thisBox.css('top',options.topheight);
			showDefaultView(options.default_view);
			thisBox.css(options.float, 0);
			//皮肤控制
			if(options.skin) thisBox.addClass('side_'+options.skin);
									
			//核心scroll事件			
			$(window).bind("scroll",function(){
				var offsetTop = options.topheight + $(window).scrollTop() + "px";
				//此动画将不进入动画队列
				thisBox.animate({top: offsetTop},{duration: 400,queue:false});
			});	
			
			//close事件
			closeBtn.bind("click",function(){
				sideContent.animate({width: '0'},200,function(){
					show_btn.stop(true, true).animate({ width: '33px'},200).css('float','right');												 
				});
				addCookie('kf_5', 0, 0);
			});
			
			//show事件
			show_btn.click(function() {
				$(this).animate({width:'0px'},200,function(){
					sideContent.stop(true,true).animate({width:'167px'},200);										   
				});
				addCookie('kf_5', 1, 0);
			});
					
	    });	//end this.each
    };
})(jQuery);

//设置默认展开或收缩状态
function showDefaultView(status) {
	var cookieValue = getCookie('kf_5');
	if (cookieValue != "") {
		status = cookieValue;
	}
	if (status == 1) {
		$('.side_content').css('width',167);
		$('.show_btn').css('width',0);
	} else {
		$('.side_content').css('width',0);
		$('.show_btn').css('width',33);
	}
	addCookie('kf_5', status, 0);
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