//代码
$(function(){
	var topheight=50;
	$('#rightsead').css('top',topheight);
	$("#rightsead a").hover(function(){
		if($(this).prop("className")=="weixin"){
			$(this).children("img.hides").fadeIn(400);
		}else{
			$(this).children("img.hides").show();
			$(this).children("img.shows").hide();
			$(this).children("img.hides").animate({marginRight:'0px'},'slow'); 
		}
	},function(){ 
		if($(this).prop("className")=="weixin"){
			$(this).children("img.hides").fadeOut(700);
		}else{
			$(this).children("img.hides").animate({marginRight:'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
		}
	});

	$("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({scrollTop: 0}, 600);});

});