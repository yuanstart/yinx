var topheight=150;      //与顶部的距离
var default_view = 0;   //1是默认展开，0是默认关闭，看效果要关闭浏览器后再打开页面，因为有cookie

var isChrome = navigator.userAgent.toLowerCase().match(/chrome/) != null; 

$(function() {
    bindCloseBtn('#service_bar_close'); //为ID为close的DIV添加点击事件
    bindMiniBtn('#online_service_minibar', '#online_service_fullbar'); //绑定Mini按钮事件
    showDefaultView(default_view); //展开方式
    scrollAd('#online_service_bar');
    //当页面大小改变时
    $(window).scroll(function() {
        scrollAd('#online_service_bar');
    });
});



//显示展开或收缩状态
function showDefaultView(status) {
    var cookieValue = getCookie('online_service_status');
    if (cookieValue != "") {
        status = cookieValue;
    }
    if (status == 1) {
        $('#online_service_minibar').hide();
        $('#online_service_fullbar').show();
    } else {
        $('#online_service_fullbar').hide();
        $('#online_service_minibar').show();
    }
    addCookie('online_service_status', status, 0);
}

//为ID为close的DIV添加点击事件
function bindCloseBtn(obj) {
    $(obj).click(function() {
        $('#online_service_fullbar').hide(1000, function() {
            if (isChrome) {
                $('#online_service_minibar').show();
            }
            else {
                $('#online_service_minibar').show(500);
            }
            addCookie('online_service_status', 0, 0);
        });
    });
}

//绑定Mini按钮事件
function bindMiniBtn(hideObj, showObj) {
    $(hideObj).bind('click', function() {
        showMiniBar(hideObj, showObj);
        addCookie('online_service_status', 1, 0);
    });
}


//显示Mini样式
function showMiniBar(hideObj, showObj) {
    $(hideObj).hide(500, function() {
        if (isChrome) {
            $(showObj).show();
        }
        else {
            $(showObj).show(500);
        }
    });
}


//定义一个名字为scrollAD的函数
function scrollAd(obj) {
    //定义位移为floatdiv的高度加上滚动条的顶部距离
    var offset = topheight+ $(document).scrollTop();
    //为floatdiv添加动画为TOP位移offset的高度，持续0.8秒。
    $(obj).stop().animate({ top: offset }, 400);
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