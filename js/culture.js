/* 回到顶部 */
function btnTop(){
	$("html,body").animate({scrollTop:"0px"},1000);
}
function btnBottom(){
	var bodyH = $("html,body").height();
	$("html,body").animate({scrollTop:bodyH},1000);
}