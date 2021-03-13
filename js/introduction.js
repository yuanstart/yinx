/* 轮播图 */
$(document).stop().ready(function(){
	var flag = 2;
	var speed = ""+30+"";
	var itemMove = document.getElementById("banner_style_04_1589585936771imgMove");
	var itemOne = document.getElementById("banner_style_04_1589585936771itemOne");
	var itemTwo = document.getElementById("banner_style_04_1589585936771itemTwo");
	var itemThree = document.getElementById("banner_style_04_1589585936771itemThree");
	itemTwo.innerHTML = itemOne.innerHTML;
	itemThree.innerHTML = itemOne.innerHTML;
	var imgScroll=setInterval(Marquee,speed);
	if(flag==1){
		var banner4BoxHtml = $("<div class='banner4Box'><div class='boxExit'><img src='img/banner/style_04/hover_close.png'/></div><div class='subBox'><div class='boxCon'><div class='boxBefore'><img src='img/banner/style_04/hover_left.png'/></div><div class='boxAfter'><img src='img/banner/style_04/hover_right.png'/></div><ul class='boxScroll' id='boxScroll'></ul></div></div></div>");
		$("body").append(banner4BoxHtml);
		flag = 0;
	}
	var moveLeft;
	var imgWidth;
	var imgHeight;
	var screenWidth;
	var screenHeight;
	var imgIndex= $('.boxScroll').children('li').length;
	var imgMax = imgIndex - 2;
	function Marquee(){
		if(itemTwo.offsetWidth - itemMove.scrollLeft <= 0)
			itemMove.scrollLeft = itemMove.scrollLeft - itemTwo.offsetWidth;
		else{
			itemMove.scrollLeft++;
		}
	}
	$('#imgMove img').hover(function(){
		clearInterval(imgScroll);
	},function(){
		imgScroll = setInterval(Marquee,speed);
	});
	$('.boxExit img').click(function(){
		speed = 15;
		imgScroll = setInterval(Marquee,speed);
		$('.banner4Box').css({'display':'none'});
	});
	$('#imgMove img').click(function(){
		speed = 999999;
		imgIndex = $(this).parent().parent().index();
		$('.banner4Box').css({'display':'block'});
		$(window).resize();
	});
	$(window).resize(function(){
		imgWidth = $('.boxCon').width();
		imgHeight = $('.boxCon').height();
		screenWidth = $(document).width();
		screenHeight = $(document).height();
		if(screenWidth>screenHeight){
			imgWidth = imgHeight*3/2;
		}else{
			imgWidth = screenWidth*0.6;
			imgHeight = imgWidth*2/3;
		}
		imgIndex++;
		moveLeft = '-' + imgIndex*imgWidth;
		$('.boxScroll').stop().animate({left:moveLeft},500);
		$('.boxScroll').css({'width':(imgMax+2)*100+'%','left':-imgWidth+'px'});
		$('.boxCon').css({'width':imgWidth});
		$('.subBox').css({'height':imgHeight});
	});
	$('.boxAfter').click(function(){
		imgIndex++;
		if(imgIndex > imgMax){
			imgIndex=1;
			$('.boxScroll').css('left','0px');
			$('.boxScroll').stop().animate({left:-imgIndex*imgWidth},500);
		}else{
			$('.boxScroll').stop().animate({left:-imgIndex*imgWidth},500);
		}
	});
	$('.boxBefore').click(function(){
		imgIndex--;
		if(imgIndex < 1){
			imgIndex = imgMax;
			$('.boxScroll').css('left',-(imgMax+2)*imgWidth+'px');
			$('.boxScroll').stop().animate({left:-imgIndex*imgWidth},500);
		}else{
			$('.boxScroll').stop().animate({left:-imgIndex*imgWidth},500);
		}
	});
	if(typeof(imgLazyloadLib)=="function")imgLazyloadLib($("#banner_style_04_1589585936771imgMove img"));
});