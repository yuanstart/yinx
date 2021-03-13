	
// 是否是手机版
$(function(){
	//set_is_mobile();
	var u = navigator.userAgent;
	var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
	
});

// 清除V11的缓存
function removeV11Cache() {
	localStorage.removeItem('UserCenterAccessToken');
	localStorage.removeItem('UserCenterAccessTokenLife');
}

function is_mobile(){
	return window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767);
}
/* function set_is_mobile(){
	var v = is_mobile() ? 1 : 0;
	$('.niceUserLogin input[name="ismobile"]').val(v);
	// 设置退出按钮链接
	var lg_out = $('.v9_login_out'), url = lg_out.attr('href');
	url = url_params_add(url, 'ismobile', v);
	url = url_params_add(url, 'version', 9);
	lg_out.attr('href', url);
} */

function show_userpanel(){

   //解决繁体语言跳会员中心变简体问题
    var langId = 0;
    langId = getThisLangId(langId);
    var url = "http://demo.mifwl.com/uc/#/clean?idweb=125603&lang=0";
    if (langId<=1 && url.indexOf("lang=0") != -1) {
        if (langId == 1) url = url.replace('lang=0','lang=1');
     }
	if(is_mobile()){
		location.href = url;
	}else{
		//location.href = "http://demo.mifwl.com/uc/#/clean?idweb=125603&lang=0";
		//var newTab=window.open('http://demo.mifwl.com/uc/#/clean?idweb=125603&lang=0');
		//解决新窗口被拦截问题 wujianchao 2017-9-1
		var a = $("<a href='"+url+"' target='_blank'>tourl</a>").get(0);
		var e = document.createEvent('MouseEvents');
		e.initEvent( 'click', true, true );
		a.dispatchEvent(e);
	}
}




function show_myorder(){
	if(is_mobile()){
		location.href = "http://demo.mifwl.com/uc/#/clean?idweb=125603&lang=0?lang=0&redirect=%2Fuc%2F%23%2Forder%2Flist%2Fall";
	}else{
		window.open("http://demo.mifwl.com/uc/#/clean?idweb=125603&lang=0?lang=0&redirect=%2Fuc%2F%23%2Forder%2Flist%2Fall");
	}
}

function check_login(form){
	//set_is_mobile();
	//alert(form.username.value);
	//alert(form.pwd.value);
	var tips = "用户名和密码必须填写";
	if(tips=="") tips ="信息尚未完整";
	if(!form.username.value || !form.pwd.value){alert(tips);return false;}
	//setTimeout(function(){location.reload();})
	return true;
}

//忘记密码
$(function(){
	$('[id="idBoxFpass"]').click(function(){
	if(is_mobile()){
		location.href = "//box6js.nicebox.cn/exusers/forget.php?id=125603&lang=0&noajax=1";
	}else{
		var forget ="忘记密码";
				var url = "//box6js.nicebox.cn/exusers/forget.php?id=125603&lang=0&ispc=1";	
		document.getElementById("boxName").innerHTML="忘记密码";
		if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×"; 
		document.getElementById("showiframe").src=url;
		box.Show({width:"450px",height:"200px"});

		//user_dialog(forget,url);	
		//弹出框
		//$('.dialog_bg .dialog').css({"height":"230px","top":"calc(50% - 115px)"});
		//改变弹出框的高宽
	}
	});
});
                function getCookie(name)//取cookies函数
        {
            var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
            if(arr != null) return unescape(arr[2]); return null;
        }
    function getThisLangId(id){
        if (id=='0' || id==undefined) {
            var JF_cn="ft"+self.location.hostname.toString().replace(/\./g,"");
            if (getCookie(JF_cn) != null) {
            id = getCookie(JF_cn);
            }
        }else{
                }
        if (id==undefined) {
        id=0;
        }
        return id;
    }
//注册
function OnRegister(id){
        id = getThisLangId(id);

			var s_PostUrl = "//box6js.nicebox.cn/fenxiaosrc/getFXIDUser.php?callback=?";
		var arr_PostData = {};
	    var sessionWeb = true;
    var issafariBrowser = /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent);
	if(is_mobile() || (!sessionWeb && issafariBrowser)){
		var mobileUrl = "//box6js.nicebox.cn/exusers/register.php?id=125603&lang="+id+"&noajax=1";
					$.getJSON(s_PostUrl,arr_PostData,function(data){
			var i_FIDUser = data.FXIDUser;
			mobileUrl+= "&FIDUser="+i_FIDUser;
			location.href = mobileUrl;
			});
			}else{ 
		var srcUrl = "//box6js.nicebox.cn/exusers/register.php?id=125603&lang="+id+"&ispc=1";
		document.getElementById("boxName").innerHTML="会员注册";
		if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
					var url = "//box6js.nicebox.cn/exusers/register.php?id=125603&lang="+id+"&ispc=1";	//iframe的链接;
			document.getElementById("showiframe").src = url;
			box.Show({width:"500px",height:"380px"});
			//user_dialog(title,url); //弹出框
			}
}

function OnLogin(id){
        id = getThisLangId(id);
        var sessionWeb = true;
        var issafariBrowser = /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent);
	if(is_mobile() || (!sessionWeb && issafariBrowser)){
		location.href = "//box6js.nicebox.cn/exusers/u8_login.php?idweb=125603&lang="+id+"&qqlogin=&noajax=1";
	}else{
		var url = "//box6js.nicebox.cn/exusers/u8_login.php?idweb=125603&lang="+id+"&qqlogin=";	//iframe的链接
		document.getElementById("boxName").innerHTML="用户登录";
		if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
		document.getElementById("showiframe").src=url;
		box.Show({width:"500px",height:"250px"});
		
		//document.getElementById("idBox").style.height = "38%";
		//user_dialog(title,url);	//弹出框
		//$(".dialog_bg .dialog").addClass("h300");	//改变弹出框的高宽
	}
}


//QQ登录 | 微信登录
$(function(){
        var id = getThisLangId(id);
		$('[id="idQQlogin"]').click(function(){
			if(is_mobile()){
				location = '//box6js.nicebox.cn/exusers/qq_login.php?id=125603&lang='+id;
			}else{
				var title = "QQ登录";	//标题
				var url = "//box6js.nicebox.cn/exusers/qq_login.php?id=125603&lang="+id+"&ispc=1";	//iframe的链接
				document.getElementById("boxName").innerHTML="QQ登录";
				if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
				document.getElementById("showiframe").src=url;
				box.Show(); 
				//user_dialog(title,url);	//弹出框
				//$(".dialog_bg .dialog").addClass("w640");	//改变弹出框的高宽
			}
		});

		$('[id="idWXlogin"]').click(function(){
			if(is_mobile()){
				location = '//box6js.nicebox.cn/exusers/wechat_login.php?id=125603&lang='+id+'&ismobile=1';
			}else{
				var title = "微信登录";	//标题
								var url = "//box6js.nicebox.cn/exusers/wechat_qrcode.php?id=125603&lang="+id;	//iframe的链接
								document.getElementById("boxName").innerHTML="微信登录";
				if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
				document.getElementById("showiframe").src=url;
				
								box.Show({width:"400px",height:"300px"}); 
				
				//user_dialog(title,url);	//弹出框
				//$(".dialog_bg .dialog").addClass("h300");	//改变弹出框的高宽
			}
		});
});


function user_dialog(title,url){	//弹出iframe
	var title = title;		//标题
	var srcUrl	= url;		//iframe的链接
	$("body").append("<div class='dialog_bg'></div>");
	$(".dialog_bg").append("<div class='dialog show-swal2 animi-height'><div class='dialog_top'></div><div class='dialog_content'></div></div>");
	$(".dialog_top").append("<p class='dialog_title'>"+title+"<i class='dialog_close' >×</i></p>");
	$(".dialog_content").append("<iframe src='"+srcUrl+"'></iframe>");
	$(".dialog_close").click(function(){
		$("body").find(".dialog_bg").remove("");
	})

}

$(function(){	//已登录则隐藏登录框
	/* 
	var userCenter = $('.v9_user_logined').is(':hidden');
	if(!userCenter) $('.LoginStatic').hide();
	else $('.LoginStatic').show(); 
	*/
})


/*
 * 获取url中的get参数
 */
function url_params(url){
	var ret = [], s, kvs, i, len, pos;
	if ((pos = url.indexOf("?")) != -1 && (s = url.substr(pos + 1))){
		kvs = s.split("&");
		for(i = 0, len = kvs.length; i < len; ++i) {
			if((pos = kvs[i].indexOf("=")) >= 0) {
				ret.push([kvs[i].substring(0, pos), kvs[i].substring(pos+1)]);
			}
		}
	}
	return ret;
}
/*
 * 获取url中的get参数
 */
function url_addr(url){
	var pos = url.indexOf("?");
	return pos >= 0 ? url.substring(0, pos) : url;
}

/*
 * 合并get参数
 */
function url_params_join(params) {
	var kvs = [], i, len;
	for(i = 0, len = params.length; i < len; ++i) {
		kvs.push(params[i][0] + '='+ params[i][1]);
	}
	return kvs.join('&');
}

/*
 * 向url中添加一个get参数
 */
function url_params_add(url, key, value){
	var params = url_params(url), i, len;
	for(i = 0, len = params.length; i < len; ++i) {
		if(params[i][0] === key) {
			params[i][1] = value;
			break;
		}
	}
	if(i >= len) {
		params.push([key, value]);
	}
	return url_addr(url) + '?' + url_params_join(params);
}

if(typeof(is_weixin)=="undefined"){
	function is_weixin(){  
		var ua = navigator.userAgent.toLowerCase();  
		if(ua.match(/MicroMessenger/i)=="micromessenger") {  
			return true;  
		} else {  
			return false;  
		}  
	}
}