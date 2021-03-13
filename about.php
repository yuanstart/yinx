<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 2;
/* 获取 ID 默认 */
// $arr = getlmrss('busin_lm' , 0 , false);
// $tagId_lm = isset($_GET['tagId_lm']) ? html($_GET['tagId_lm']) : $arr[0]['id_lm'];

// if (!$tagId_lm || $tagId_lm < 0) {
// 	msg($lang['gl']['par']);
// }
?>

<!DOCTYPE html>
<html lang="en">

<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->

<!-- css start -->
<link rel="stylesheet" type="text/css" href="css/02800925.css">
<!-- css ending -->
<script>
	var batchArr = [];
	var checkLoad = 0;//判断是否是回调完成的
</script>
<script>
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
var DIY_WEBSITE_ID = "125603";
var DIY_JS_SERVER = "box6js.nicebox.cn";
</script>

<script type="text/javascript">var Default_isFT = 0;</script>
<script type="text/javascript" src="js/transform.js"></script>
<body>
<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<!-- pic start -->
<?php $arr = getzlrs('ban_co' , 3); ?>
<div id="layout_1579336876497" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_01_1589522950371" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="image" class="view_contents">
				<div class="imgStyle CompatibleImg picSet">
					<a href="javascript:;" target="">
						<img class="link-type-" src="<?php echo $arr['img_sl'] ?>" title="<?php echo $arr['title'] ?>" id="imageModeShow">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pic ending -->

<?php $arr_hon = getzlrs('group_co' , 1); ?>
<div id="layout_1579507233932" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<!-- title-font start -->
		<div id="div_a_includeBlock_1579507233935" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
				<div id="text_style_01_1579507234071" class="view style_01 text  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
						<a href="javascript:void(0);" target="" style="color:inherit" class="editor-view-extend link-type-1-3"><?php echo $arr_hon['title'] ?></a>
					</div>
				</div>
				<div id="text_style_01_1579507234082" class="view style_01 text  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
					<?php echo $arr_hon['f_body'] ?>
					</div>
				</div>
				<div id="text_style_01_1579507234090" class="view style_01 text  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
						<a href="introduction.php" target="" style="color:inherit" class="editor-view-extend link-type-1-1">了解更多</a>
					</div>
				</div>
			</div>
		</div>
		<!-- title-font ending -->

		<!-- pic-font start -->
<?php $arr = getlmrss('group_lm' , $arr_hon['lm'] , false , '' , '' , 'AND `tuijian` = 1'); ?>
		<div id="image_style_22_1589520732896" class="view style_22 image  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="image" class="view_contents">
				<div class="imgStyle_22">
					<ul class="imgTextUl" id="content_1589520732896">
					<?php foreach ($arr as $key => $value): ?>
						<li class="imgTextLi modSet mainMenuSet">
							<div class="left">
								<div class="image-box">
									<a href="<?php echo $value['url_lm'] ?>">
										<div class="imgTBox">
											<img class="imgSet" src="<?php echo getimgj($value['img_sl_lm'] , '') ?>" alt="<?php echo $value['title_lm'] ?>">
										</div>
									</a>
								</div>
								<div class="ratio" style="margin-top:133%;"></div>
							</div>
							<div class="cont">
								<div class="title">
									<div class="name titleSet"><?php echo $value['title_lm'] ?></div>
								</div>
							</div>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- pic-font ending -->
	</div>
</div>

<div id="layout_1579507398172" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="counter_style_3_1579507398175" class="view style_3 counter  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="counter" class="view_contents">
				<div class="counterStyle03">
					<ul class="numberUl listBlocksSet" id="CounterStyleUl">
						<li class="li numberLi ">
							<div class="numberItem modSet">
								<div class="number">
									<span class="span num numtSet">2001</span>
									<span class="span unit unitSet">年</span>
								</div>
								<div class="text titleSet">公司成立</div>
							</div>
						</li>

						<li class="li numberLi ">
							<div class="numberItem modSet">
								<div class="number">
									<span class="span num numtSet">100</span>
									<span class="span unit unitSet">+</span>
								</div>
							<div class="text titleSet">团队人数</div>
							</div>
						</li>

						<li class="li numberLi ">
							<div class="numberItem modSet">
								<div class="number">
									<span class="span num numtSet">10000</span>
									<span class="span unit unitSet">+</span>
								</div>

							<div class="text titleSet">合作企业</div>
							</div>
						</li>

						<li class="li numberLi ">
							<div class="numberItem modSet">
								<div class="number">
									<span class="span num numtSet">30</span>
									<span class="span unit unitSet">+</span>
								</div>

							<div class="text titleSet">合作领域</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="layout_1579507426335" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="div_a_includeBlock_1579507426338" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
				<div id="text_style_01_1579507426453" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
					<div names="text" class="view_contents">COOPERATIVE PARTNER</div>
				</div>
				<div id="text_style_01_1579507426463" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
					<div names="text" class="view_contents">合作伙伴</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 合作伙伴 start -->
<?php $arr = getplrss('' , $arr_hon['id'] , 'pl_image' , 24); ?>
<div id="layout_1579507450072" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_11_1579507450075" class="view style_11 image  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
			<div names="image" class="view_contents">
				<div class="imgStyle_11">
					<ul id="content_1579507450075">
					<?php foreach ($arr as $key => $value): ?>
						<li class="imgItems modSet">
							<a href="javascript:;">
								<img class="noimgLoadLate" src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="" style="display: none; width: auto; height: 100%;">
								<div style="background:url(<?php echo getimgj($value['img_sl'] , '') ?>);" class="theimgdiv"></div>
							</a>
							<div class="ratio" style="margin-top:67%;"></div>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<!-- 合作伙伴 ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->
<!-- js start -->

<script src="js/common.js"></script>

<!-- js ending -->
</body>
</html>
<script>
$(function(){
if(!false){
function Timeing(config) {
	this._default = {
		'arrayObj':[],		//总数字
		'arrayTimeObj':[],		//每0.1秒递增数字
		'arrayIndexObj':[],		//初始值0
		'arrayLockObj':[],		//是否计算完成，完成后为true
		'timeNum':30,		//计算所需时间，默认为3秒
		'begin':new Date(),		//开始时间，用来计算耗时多少
		'timer':undefined,		//定时器
		'id':'',		//视图id
		'start':false		//避免滚屏时重复触发生成计数器
	};
	config = $.extend(true, this._default, config);
	this.config = config;
	this.init(config);
}
//初始化各数组
Timeing.prototype.init = function(config) {
	var _this = this;
	$('#'+_this.config.id+' .numberLi').each(function(i){
		_this.config.arrayObj.push($(this).find('.num').html());
		_this.config.arrayTimeObj.push($(this).find('.num').html()/_this.config.timeNum);
		_this.config.arrayIndexObj.push(0);
		_this.config.arrayLockObj.push(false);
		$(this).find('.num').html(0);
	});
}
//规定时间计算完数字
Timeing.prototype.getNumFun = function(config){
	var _this = this;
	if (!_this.config.arrayLockObj.every(item => {return item})) {
		_this.config.timer = setInterval(function () {
		for (var i = 0; i < _this.config.arrayObj.length; i++) {
			if(_this.config.arrayLockObj[i]){
				continue
			}
			_this.config.arrayIndexObj[i] += _this.config.arrayTimeObj[i];
			if (Math.abs(_this.config.arrayIndexObj[i]) < Math.abs(_this.config.arrayObj[i])) {
				$('#'+_this.config.id+' .numberLi').eq(i).find('.num').html(Math.ceil(_this.config.arrayIndexObj[i]));
			}
			if (Math.abs(_this.config.arrayIndexObj[i]) - Math.abs(_this.config.arrayObj[i]) >= 0) {
			//console.info(_this.config.arrayIndexObj[i],_this.config.arrayTimeObj[i],new Date()-_this.config.begin);//计算时间
				$('#'+_this.config.id+' .numberLi').eq(i).find('.num').html(_this.config.arrayObj[i]);
				_this.config.arrayLockObj[i] = true;
				}
			}
			if (_this.config.arrayLockObj.every(item => {return item})) {
				clearInterval(_this.config.timer);
			}
		}, 100);
	}
}
//绑定滚动事件触发，进入可视范围后开始计数功能
Timeing.prototype.bindLoad = function(config){
	var _this = this;
	if(($(window).height() + $(window).scrollTop()) > $("#"+_this.config.id).offset().top) {
		_this.getNumFun();
	}
	$("#"+_this.config.id).one("appear", function() {
		_this.getNumFun();
	});
	$(window).bind("scroll", function(event) {
		var fold;
		if(!_this.config.start){
			fold = $(window).height() + $(window).scrollTop();
			if(fold >= $("#"+_this.config.id).offset().top) {
				_this.config.begin = new Date();
				_this.config.start = true;
				_this.getNumFun();
			}
		}
	});
}
var timeingcounter_style_3_1579507398175 = new Timeing({
	'timeNum':30,
	'id':'counter_style_3_1579507398175'});
	timeingcounter_style_3_1579507398175.init();
	timeingcounter_style_3_1579507398175.bindLoad();
	}
});
/*************************************************************************/
function phSize(){
	$("#image_style_11_1579507450075 li").each(function(){
		var img_W = $(this).find("img").width();
		var img_H = $(this).find("img").height();
		if(img_W < img_H){
			$(this).find("img").css({"width":"100%","height":"auto"})
		}else{
			$(this).find("img").css({"width":"auto","height":"100%"})
		}
	});
}
$(function(){
	var obj = $("#image_style_11_1579507450075");
	var picItems = obj.find("li.imgItems");
	var num = 0;
	var picBox;
	if(0 == 1){
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
</script>