function GetStatusName(i_Status){
	if(i_Status==1)return "未开始";
	if(i_Status==2)return "进行中";
	if(i_Status==3)return "已结束";
}
//灰化~~~套装促销-风格1
function Gray_style_2_1(s_Hash,i_IDPackage,i_Status){
	var addBuyID	=	"addBuy_"+s_Hash+"_"+i_IDPackage;
	var addCartID	=	"addCart_"+s_Hash+"_"+i_IDPackage;

	$("#"+addBuyID).html(GetStatusName(i_Status));
	$("#"+addCartID).html(GetStatusName(i_Status));
	$("#"+addBuyID).val(GetStatusName(i_Status));
	$("#"+addCartID).val(GetStatusName(i_Status));
	if(i_Status==1){//未开始才需要保存href
		if(!SaveClickSome[s_Hash])SaveClickSome[s_Hash] = {};
		if(!SaveClickSome[s_Hash]["Package_"+i_IDPackage])SaveClickSome[s_Hash]["Package_"+i_IDPackage] = {};

		SaveClickSome[s_Hash]["Package_"+i_IDPackage]["BuyHref"] = $("#"+addBuyID).attr("href");
		SaveClickSome[s_Hash]["Package_"+i_IDPackage]["CartHref"] = $("#"+addCartID).attr("href");
	}

	$("#"+addBuyID).attr("href","javascript:void(0);");
	$("#"+addCartID).attr("href","javascript:void(0);");

	$("#"+addBuyID).addClass('grayseckill');
	$("#"+addCartID).addClass('grayseckill');
}

//恢复~~~套装促销-风格1
function Act_style_2_1(s_Hash,i_IDPackage,i_Status){
	var addBuyID	=	"addBuy_"+s_Hash+"_"+i_IDPackage;
	var addCartID	=	"addCart_"+s_Hash+"_"+i_IDPackage;

	//$("#"+addBuyID).html("立即购买");
	//$("#"+addCartID).html("加入购物车");

	$("#"+addBuyID).removeClass('grayseckill');
	$("#"+addCartID).removeClass('grayseckill');

	if(!SaveClickSome[s_Hash])return false;
	else if(!SaveClickSome[s_Hash]["Package_"+i_IDPackage])return false;

	if(SaveClickSome[s_Hash]["Package_"+i_IDPackage]['BuyHref']){
		$("#"+addBuyID).attr("href",SaveClickSome[s_Hash]["Package_"+i_IDPackage]['BuyHref']);
	}
	if(SaveClickSome[s_Hash]["Package_"+i_IDPackage]['CartHref']){
		$("#"+addCartID).attr("href",SaveClickSome[s_Hash]["Package_"+i_IDPackage]['CartHref']);
	}
}

//灰化~~~套装促销-固定套餐-风格2
function Gray_style_2_2(s_Hash,i_IDPackage,i_Status){
	var addBuyID	=	"addBuy_"+s_Hash+"_"+i_IDPackage;
	var addCartID	=	"addCart_"+s_Hash+"_"+i_IDPackage;

	$("#"+addBuyID).html(GetStatusName(i_Status));
	$("#"+addCartID).html(GetStatusName(i_Status));
	if(i_Status==1){//未开始才需要保存href
		if(!SaveClickSome[s_Hash])SaveClickSome[s_Hash] = {};
		if(!SaveClickSome[s_Hash]["Package_"+i_IDPackage])SaveClickSome[s_Hash]["Package_"+i_IDPackage] = {};
		SaveClickSome[s_Hash]["Package_"+i_IDPackage]["BuyHref"] = $("#"+addBuyID).attr("href");
		SaveClickSome[s_Hash]["Package_"+i_IDPackage]["CartHref"] = $("#"+addCartID).attr("href");
	}

	$("#"+addBuyID).attr("href","javascript:void(0);");
	$("#"+addCartID).attr("href","javascript:void(0);");

	$("#"+addBuyID).addClass('grayseckill');
	$("#"+addCartID).addClass('grayseckill');
}

//恢复~~~套装促销-固定套餐-风格2
function Act_style_2_2(s_Hash,i_IDPackage,i_Status){
	var addBuyID	=	"addBuy_"+s_Hash+"_"+i_IDPackage;
	var addCartID	=	"addCart_"+s_Hash+"_"+i_IDPackage;

	//$("#"+addBuyID).html("立即购买");
	//$("#"+addCartID).html("加入购物车");

	$("#"+addBuyID).removeClass('grayseckill');
	$("#"+addCartID).removeClass('grayseckill');

	if(!SaveClickSome[s_Hash])return false;
	else if(!SaveClickSome[s_Hash]["Package_"+i_IDPackage])return false;

	if(SaveClickSome[s_Hash]["Package_"+i_IDPackage]['BuyHref']){
		$("#"+addBuyID).attr("href",SaveClickSome[s_Hash]["Package_"+i_IDPackage]['BuyHref']);
	}
	if(SaveClickSome[s_Hash]["Package_"+i_IDPackage]['CartHref']){
		$("#"+addCartID).attr("href",SaveClickSome[s_Hash]["Package_"+i_IDPackage]['CartHref']);
	}
}

//灰化~~~团购秒杀-风格1
function Gray_style_4_1(s_Hash,i_IDProduct,i_Status){
	var seckillID = "seckill_"+s_Hash+"_"+i_IDProduct;
	var gBottomID = "gBottom_"+s_Hash+"_"+i_IDProduct;

	if(!SaveClickSome[s_Hash])SaveClickSome[s_Hash] = {};

	SaveClickSome[s_Hash]["Product_"+i_IDProduct] = $("#"+seckillID).attr("href");

	$("#"+gBottomID).addClass('grayGBottom');
	$("#"+seckillID).html(GetStatusName(i_Status));
	$("#"+seckillID).attr("href","javascript:void(0);");
}

//恢复~~~团购秒杀-风格1
function Act_style_4_1(s_Hash,i_IDProduct,i_PackageTypeSub){
	var seckillID = "seckill_"+s_Hash+"_"+i_IDProduct;
	var gBottomID = "gBottom_"+s_Hash+"_"+i_IDProduct;
	//$("#"+seckillID).html(i_PackageTypeSub==1?"马上抢！":"即刻秒杀");
	$("#"+gBottomID).removeClass('grayGBottom');

	if(!SaveClickSome[s_Hash])return false;
	else if(!SaveClickSome[s_Hash]["Product_"+i_IDProduct])return false;

	$("#"+seckillID).attr("href",SaveClickSome[s_Hash][i_IDProduct]);
}

//灰化~~~团购秒杀-风格2
function Gray_style_4_2(s_Hash,i_IDProduct,i_Status){
	var seckillID = "seckill_"+s_Hash+"_"+i_IDProduct;

	if(!SaveClickSome[s_Hash])SaveClickSome[s_Hash] = {};

	SaveClickSome[s_Hash]["Product_"+i_IDProduct] = $("#"+seckillID).attr("href");

	$("#"+seckillID).html(GetStatusName(i_Status));
	$("#"+seckillID).addClass('grayseckill');
	$("#"+seckillID).attr("href","javascript:void(0);");
	$('.gDetail>.n>a').attr("href","javascript:void(0);");
	$(".gprodimg a").attr("href","javascript:void(0);");
	// console.log("1");
}

//恢复~~~团购秒杀-风格2
function Act_style_4_2(s_Hash,i_IDProduct,i_PackageTypeSub){
	var seckillID = "seckill_"+s_Hash+"_"+i_IDProduct;
	//$("#"+seckillID).html(i_PackageTypeSub==1?"立马抢！":"即刻秒杀");
	$("#"+seckillID).removeClass('grayseckill');

	if(!SaveClickSome[s_Hash])return false;
	else if(!SaveClickSome[s_Hash]["Product_"+i_IDProduct])return false;
	$("#"+seckillID).attr("href",SaveClickSome[s_Hash][i_IDProduct]);
}

var SaveClickSome = {};

//倒计时函数
function updateEndTime(){
	var date = new Date();
	var time = date.getTime();  //当前时间距1970年1月1日之间的毫秒数
	var lag = 0; //初始化
	
	$(".settime").each(function(i){
		var startDate			=	this.getAttribute("startTime");//开始时间
		var endDate				=	this.getAttribute("endTime"); //结束时间字符串
		var i_PackageType		=	parseInt(this.getAttribute('packagetype'));
		var i_PackageTypeSub	=	parseInt(this.getAttribute('packagetypesub'));
		var i_PackageStyle		=	parseInt(this.getAttribute('packagestyle'));
		var s_Hash				=	this.getAttribute('hash');
		var i_IDProduct			=	parseInt(this.getAttribute('idproduct'));
		var i_IDPackage			=	parseInt(this.getAttribute('idpackage'));
		var i_IDPackage			=	parseInt(this.getAttribute('idpackage'));
		var isnew				=	parseInt(this.getAttribute('isnew'));

		var startDate1 = eval('new Date(' + startDate.replace(/\d+(?=-[^-]+$)/, function (a) { return parseInt(a, 10) - 1; }).match(/\d+/g) + ')');
		var startTime = startDate1.getTime();

		var lagg = (time-startTime)/1000;
		
		//转换为时间日期类型
		var endDate1 = eval('new Date(' + endDate.replace(/\d+(?=-[^-]+$)/, function (a) { return parseInt(a, 10) - 1; }).match(/\d+/g) + ')');
		var endTime = endDate1.getTime(); //结束时间毫秒数
		lag = (endTime - time) / 1000; //当前时间和结束时间之间的秒数
		//alert(time);
		switch(i_PackageType){
			case 2:
				var s_GrayFuncName	=	"Gray_style_"+i_PackageType+"_"+i_PackageStyle;
				var s_ActFuncName	=	"Act_style_"+i_PackageType+"_"+i_PackageStyle;
				break;
			case 4:
				var s_GrayFuncName	=	"Gray_style_"+i_PackageType+"_"+i_PackageStyle;
				var s_ActFuncName	=	"Act_style_"+i_PackageType+"_"+i_PackageStyle;
				break;
		}
		var GrayFunc = window[s_GrayFuncName];
		var ActFunc = window[s_ActFuncName];

		//i_Status  1:未开始 2:进行中 3:已结束

		if(lagg<0){//未开始
			var i_Status = 1;

			var n_lagg = Math.abs(lagg);
			if(!isnew) $(this).html("距离活动开始:"+ConverTimeStr(n_lagg));
			else $(this).html(ConverTimeStr(n_lagg));
			switch(i_PackageType){
				case 2://套餐
					console.log("未开始("+s_GrayFuncName+")");
					GrayFunc(s_Hash,i_IDPackage,i_Status)
					break;
				case 4://团购秒杀
					GrayFunc(s_Hash,i_IDProduct,i_Status);break;
			}
		}else if(lag > 0){//进行中
			var i_Status = 2;
			switch(i_PackageType){
				case 2://套餐
					ActFunc(s_Hash,i_IDPackage,i_Status);
					break;
				case 4://团购秒杀
					ActFunc(s_Hash,i_IDProduct,i_PackageTypeSub);break;
			}
			$(this).html(ConverTimeStr(lag));
		}else{//结束
			var i_Status = 3;

			$(this).html("已经结束啦！");

			switch(i_PackageType){
				case 2://套餐
					//console.log("已结束("+s_GrayFuncName+")");
					GrayFunc(s_Hash,i_IDPackage,i_Status);
					break;
				case 4://团购秒杀
					GrayFunc(s_Hash,i_IDProduct,i_Status);break;
			}
		}
	});
	if(lag > 0) setTimeout("updateEndTime()",1000);
}

function ConverTimeStr(lag){
	var second = Math.floor(lag % 60);     
	var minite = Math.floor((lag / 60) % 60);
	var hour = Math.floor((lag / 3600) % 24);
	var day = Math.floor((lag / 3600) / 24);
	return (day+"天"+hour+"小时"+minite+"分"+second+"秒");
}

$(function(){
	updateEndTime();
});