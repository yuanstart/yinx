$(function(){
	var obj = $("#image_style_11_1589545967144");
	var picItems = obj.find("li.imgItems");
	var num = 0;
	var picBox;
	if(1 == 1){
		picItems.click(function(){
			var topH = $(window).scrollTop();
			var index = $(this).index();
			var curPic = $(this).find("img").attr("src");
			num = index;
			var picBoxhtml = $("<div class='imgShowBox'><im"+""+"g src='"+curPic+"' alt=''><div class='imgButton'><span class='prevImg'><i class='fa fa-angle-left'></i></span><span class='closeShowPic'>×</span><span class='nextImg'><i class='fa fa-angle-right'></i></span></div></div>");
			//"+""+"为了躲开图片延时加载的代码替换
			$("body").append(picBoxhtml);
			picBox = $(".imgShowBox");
			pdSize();
			//判断下一张和上一张按钮的显示
			if(picItems.length == 1){
				$("body").find(".imgButton>.nextImg,.imgButton>.prevImg").css("visibility","hidden")
			}
			if(picItems.length-1 == $(this).index()){
				$("body").find(".imgButton>.nextImg").css("visibility","hidden")
			}
			if($(this).index() == 0){
				$("body").find(".imgButton>.prevImg").css("visibility","hidden")
			}
			//关闭
			$("body").find(".imgButton>.closeShowPic").click(function(){
				$(".imgShowBox").remove();
				$("body").removeClass("pos_fixed");
				$(window).scrollTop(topH);
			});
			//下一张
			$("body").find(".imgButton>.nextImg").click(function(){
				$(".imgShowBox img").css("max-height","none");
				var len = obj.find("li:has('img')").length;
				$(this).siblings().css("visibility","visible");
				num++;
				if(num >= len){
					num = len-1;
				}
				if(num == len-1){
					$(this).css("visibility","hidden");
				}
				curPics();
				pdSize();
			});
			//上一张
			$("body").find(".imgButton>.prevImg").click(function(){
				$(".imgShowBox img").css("max-height","none");
				$(this).siblings().css("visibility","visible");
				num--;
				if(num <= 0){
					num = 0;
					$(this).css("visibility","hidden");
				}
				curPics();
				pdSize();
			});
		});
	}
	//切换大图
	function curPics(){
		var newImg = obj.find("li").eq(num).find("img").attr("src");
		picBox.find("img").attr("src",newImg);
	}
	//判断展开显示效果
	function pdSize(){
		var imgH = picBox.find("img").height();
		var winH = $(window).height();
		if(imgH>winH){
			$("body").addClass("pos_fixed");
			picBox.addClass("scroll");
			picBox.animate({"scrollTop":"0px"},200);
		}else{
			$("body").removeClass("pos_fixed");
			picBox.removeClass("scroll");
			$(".imgShowBox img").css("max-height","80%");
		}
	}
	//遍历所有图片宽高定位
	picItems.each(function(){
		var img_W = $(this).find("img").width();
		var img_H = $(this).find("img").height();
		if(img_W < img_H){
			$(this).find("img").css({"width":"100%","height":"auto"})
		}else{
			$(this).find("img").css({"width":"auto","height":"100%"})
		}
	});
});