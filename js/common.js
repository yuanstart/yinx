/**********************************************************************************/
/* 手机 兼容 */
var isOpenMobie = 2;
var isOpenPad = 2;
if(isOpenMobie == 1){
    if(isOpenPad == 1){
        $("body").css("width","auto");
    }else{
        //是否手机端判断
        var ua = navigator.userAgent;
        var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
            isIphone =!ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
            isAndroid = ua.match(/(Android)\s+([\d.]+)/),
            isMobile = isIphone || isAndroid;
        if(isMobile){
            $("body").css("width","1280px");
        }else{
            $("body").css("width","auto");
        }
    }
}else{
    $("body").css("width","auto");
    $("head").append("<meta id='headScreen' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport' />");
}
//手机屏幕尺寸兼容 purewinter 2019-03-26
$(window).load(function(){
    bodyScale();
});
function bodyScale(){
    var windowWidth = $(window).width();
    $("#bodyScale").remove();
    if(windowWidth < 680){
        var scale = windowWidth / 375;
        $("#headScreen").remove();
        $("head").append("<meta id='headScreen' content='width=375, initial-scale="+scale+", maximum-scale="+scale+", user-scalable=no' name='viewport' />");
    }else if(windowWidth < 960){
        var scale = windowWidth / 960;
        $("#headScreen").remove();
        $("head").append("<meta id='headScreen' content='width=960, initial-scale="+scale+", maximum-scale="+scale+", user-scalable=no' name='viewport' />");
    }
}
$(window).load(function(){
	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
		setTimeout(function(){
			new WOW().init()
		},150)
	};
});
/**********************************************************************************/
$(window).resize(function(){
    if($("body").width()<640){
        var bottomHeight = $(".bottomMenu").height();
        $("body").css("padding-bottom",bottomHeight+"px");
    }else{
        $("body").css("padding-bottom","0px");
    }
});
/**********************************************************************************/
/* 集团网站下拉框 */
$(function(){
    $("#flink_style_02_1589498627497 .cellSelectSet").click(function(){
        if($("#flink_style_02_1589498627497 .cell").css("display")=="none"){
            $("#flink_style_02_1589498627497 .cell").css("display","block");
            $("#flink_style_02_1589498627497 .cell-box").css("overflow","auto");
        }else{
            $("#flink_style_02_1589498627497 .cell").css("display","none");
            $("#flink_style_02_1589498627497 .cell-box").css("overflow","visible");
        }
    })
})
/**********************************************************************************/
$(function(){
    $(".showSubMenu").click(function(){
        $(this).next().toggle();
        $(this).parent("li").siblings("li").children(".showSubMenu").next().css("display","none");
    });
    /* 底部导航颜色 */
    var bottomLen = $(".bottomMenu > ul > li > a").length;
    var url = window.location.pathname;
    var loc = url.substring(url.lastIndexOf("/")+1, url.length);
    for(var i=0;i<bottomLen;i++){
        var curObj = $(".bottomMenu ul li a").eq(i);
        if(loc == curObj.attr("href")){
            var img = curObj.children(".menuItem").children(".menuIco").children("img").attr("src");
            var menuIcon = curObj.children(".menuItem").children(".menuIcon").val();
            var menuColor = curObj.children(".menuItem").children(".menuColor").val();
            var menuName = curObj.children(".menuItem").children(".menuName").html();
            if(menuIcon != ""){
                curObj.children(".menuItem").children(".menuIco").children("img").attr("src",menuIcon);
            }
            if(menuColor != ""){
                curObj.children(".menuItem").children(".menuName").css("color",menuColor);
            }
        }
    }
});
/**********************************************************************************/
/* 站长统计 */
document.write(
    // unescape("%3Cspan id='cnzz_stat_icon_1278909865'%3E%3C/span%3E%3Cscript src='https://v1.cnzz.com/z_stat.php%3Fid%3D1278909865%26show%3Dpic' type='text/javascript'%3E%3C/script%3E")
);
/******************************************************************************************************/ 
/*<!-- 导航栏目有下级时禁止跳转 -->
<!-- 二级菜单宽度自适应 -->*/
function navSwtich(obj) {
    $(obj).siblings(".menuUlCopy").slideToggle(200);
    $(obj).toggleClass('ontoggle');
    $(obj).parent().siblings().find(".menuUlCopy").slideUp(200);
    $(obj).parent().siblings().find(".fa-angle-down").removeClass('ontoggle');
}
function subLeft_dh_style_28_1578629663716(){
    $("#dh_style_28_1578629663716 .menuUl>li").each(function(){
        $(this).find(".menuUl03").css("left",'100%');
    })
}
$(window).resize(function() {
    subLeft_dh_style_28_1578629663716();
})
$(function(){
    $("#dh_style_28_1578629663716 .fa-navicon").click(function(){
        $("#dh_style_28_1578629663716 .menuUlCopy").each(function(){
            $(this).siblings(".fa").show();
        })
    })
    subLeft_dh_style_28_1578629663716();
        $("#dh_style_28_1578629663716 .subBox").css("top",$("#dh_style_28_1578629663716 .menuUl_box").height());
    if($("#dh_style_28_1578629663716 .menuUl").hasClass("noHover")){
        var tabNum = 0;
        $("#dh_style_28_1578629663716 .menuUl>li").find(".Onsub").each(function(){
            tabNum += 1;
            $(this).parent().attr("tabNum",tabNum)
        })
        $("#dh_style_28_1578629663716 .menuUl>li .Onsub").mouseover(function(){
            $("#dh_style_28_1578629663716 .subBox").show();
            var index = $(this).parent().attr("tabNum");
            $("#dh_style_28_1578629663716 .subBox .subItems").eq(index-1).fadeIn(100).siblings().hide();
                            $("#dh_style_28_1578629663716 .subBox .subMenuImgArea .subMenuImgCon").eq(0).fadeIn(100).siblings().hide();
                    })
        $("#dh_style_28_1578629663716 .subBox").mouseleave(function(){
            $(this).hide();
        })
        $("#dh_style_28_1578629663716 .menuUl>li .Nosub").mouseover(function(){
            $("#dh_style_28_1578629663716 .subBox").hide();
        })
        //风格41 42
    }
})