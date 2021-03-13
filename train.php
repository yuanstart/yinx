<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 7;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0049)train.html -->
<html>
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/28009312800937.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/28009312800937.css">
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
<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->
					<div id="layout_1589612136449" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="margin-top: 110px;">
				<div class="view_contents">
								<div id="image_style_12_1_1589612136452" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
					<div class="imgStyle_12">
	<ul class="imgTextUl">
			<li class="imgTextLi modSet">
				<a href="idea.php" style="display: block;">
					<div class="imgTBoxArea">
						<div class="image-box">
							<div class="imgTBox">
								<img class="picSet picFit" src="images/1589516591667e13c41e4f509ec6c.png">
							</div>
						</div>
						<div class="ratio" style="margin-top:100%;"></div>
					</div>
				</a>
				<div class="cont">
					<div class="name titProSet">人才理念</div>
				</div>
			</li>
			<li class="imgTextLi modSet">
				<a href="team.php" style="display: block;">
					<div class="imgTBoxArea">
						<div class="image-box">
							<div class="imgTBox">
								<img class="picSet picFit" src="images/1589516591668d88eab43d0016578.png">
							</div>
						</div>
						<div class="ratio" style="margin-top:100%;"></div>
					</div>
				</a>
				<div class="cont">
					<div class="name titProSet">人员队伍</div>
				</div>
			</li>
			<li class="imgTextLi modSet">
				<a href="train.php" style="display: block;">
					<div class="imgTBoxArea">
						<div class="image-box">
							<div class="imgTBox">
								<img class="picSet picFit" src="images/1589516591669b7727f92eec93a2b.png">
							</div>
						</div>
						<div class="ratio" style="margin-top:100%;"></div>
					</div>
				</a>
				<div class="cont">
					<div class="name titProSet">员工培训</div>
				</div>
			</li>
			<li class="imgTextLi modSet">
				<a href="job.php" style="display: block;">
					<div class="imgTBoxArea">
						<div class="image-box">
							<div class="imgTBox">
								<img class="picSet picFit" src="images/1589516591669a32342ece9482d21.png">
							</div>
						</div>
						<div class="ratio" style="margin-top:100%;"></div>
					</div>
				</a>
				<div class="cont">
					<div class="name titProSet">人才招聘</div>
				</div>
			</li>
	</ul>
</div>
				</div>
			</div>
						</div>
			</div>
					<div id="layout_1579486165408" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1110px;">
				<div class="view_contents">
								<div id="div_a_includeBlock_1579486165411" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="div" class="view_contents">
								<div id="text_style_01_1579489807643" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="text" class="view_contents">
					<?php
						$zb = getcorss('info_co','3',false,'1');
						foreach ($zb as $kzb => $vzb) {
							echo $vzb['z_body'];
						}
						 ?>
				</div>
			</div>
					<div id="banner_style_01_1579490069383" class="view style_01 banner  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="banner" class="view_contents">
					<script></script>
<div class="bannerStyle_1 normal">
	<div class="main_visual">
		<div class="flicking_con">
				<a href="train.html#" class=""></a>
				<a href="train.html#" class="on"></a>
				<a href="train.html#" class=""></a>
		</div>
		<div class="ground_glass"></div>
		<div class="main_image">
			<!-- 默认 动画效果 HTML -->
			<div class="img-list">
	<?php
	$mb = getplrss('info_co','3','pl_image','6');
	foreach ($mb as $kmb => $vmb) {
	 ?>

		<div class="img-item" style="left: -100%;"><a href="javascript:;" class="picSet"><span style="background: url(<?php echo $vmb['img_sl']?>) center top no-repeat;"></span></a></div>
	<?php }?>

			</div>
			<a href="javascript:;" class="btn_prev" style="display: none;"></a>
			<a href="javascript:;" class="btn_next" style="display: none;"></a>
		</div>
	</div>
</div>
<script type="application/javascript">
    /*
     * Banner 轮播图类
     */
	var intervaltimer;
    function Banner(config) {
        this._default = {
            'list':[],
            'length':0,
            'current':0,
            'timer':undefined,      // 计时器
            'view':undefined,           // 视图
            'flick':undefined,      // 圆点选择器
            'duration':3,               // 切换时间间隔
            'animation':0.5         // 动画时间
        };
        config = $.extend(true, this._default, config);
        this.config = config;
        this.init(config);
    }
    Banner.prototype.init = function(config) {
        this.animateStyle = 'normal';       // 动画效果 ( 根据动画效果, 不同的方法有不同的实现 )
        this.direction = 'right';   // 当前滚动方向
        this.view = this.config.view;
        this.config.length = this.config.list.length;
        this.config.flick = this.view ? this.view.find(".bannerStyle_1 .flicking_con > a") : undefined;
    };
    // 计算下一个要显示的图片的索引
    // by: 如果没有传入参数, 则使用配置中的数据this.config.current, 否则使用传入的参数
    Banner.prototype.nextIndex = function(by) {
        by === undefined && (by = this.config.current);
        var next = this.direction == 'right' ? by + 1 : by - 1;
        next >= this.config.length && (next = 0);
        next < 0 && (next = this.config.length - 1);
        return next;
    };
    //图片链接
    $url_html = new Array();
    $i = 0;
    $url_len = 3;
            $url_html[0] = "";
            $url_html[1] = "";
            $url_html[2] = "";
    $('#banner_style_01_1579490069383 a.img_url').attr('href',$url_html[$i]);
    // 跳到指定图片
    Banner.prototype.animateIndex = function(index) {
        this.endAnimate();
        if(index >= 0 && index < this.config.length && this.config.current != index) {
            if(this.config.current < index) {
                this.direction = 'right';
                this.config.current = index - 1;
            } else {
                this.direction = 'left';
                this.config.current = index + 1;
            }
            this.showIndex(this.config.current);
            this.startAnimate();
        }
    };
    // 向右动画
    Banner.prototype.startAnimateRight = function() {
        this.direction = 'right';
        this.startAnimate();
    };
    // 向左动画
    Banner.prototype.startAnimateLeft = function() {
        this.direction = 'left';
        this.startAnimate();
    };
    // 结束动画
    Banner.prototype.endAnimate = function() {
			clearTimeout(this.config.timer);
    };
	// 结束动画
	Banner.prototype.hoverEndAnimate = function() {
			var that = this;
			intervaltimer = setInterval(function(){
				clearTimeout(that.config.timer);
			},100);
	};
    Banner.prototype.startAnimate = function() {
        switch(this.animateStyle) {
            case 'normal':
                // 默认效果
                this.endAnimate();
                if(this.config.length > 1) {
                    var prev = this.config.current, next = this.nextIndex(),
                            end = this.direction == 'right' ? {prev:"-100%", current:"100%"} : {prev:"100%", current:"-100%"};  // 前一个图片和当前图片的最后停留位置
                    this.config.flick.eq(next).addClass("on").siblings().removeClass("on");
                    // 执行动画
                    var banner = this;
                    this.imgs.eq(prev).stop().animate({"left":end.prev}, this.config.animation, function(){
                        banner.config.timer = setTimeout(function(){
                            banner.startAnimate();
                        },banner.config.duration);
                    });
                    this.imgs.eq(next).css({"left":end.current}).stop().animate({"left":"0%"}, this.config.animation);
                    this.config.current = next;
                }
                break;
            case 'rotate-3d':
                // 3D旋转效果
                this.endAnimate();
                this.updateBgImg();
                if(this.config.length > 1) {
                    var prev = this.config.current, next = this.nextIndex();
                    this.config.flick.eq(next).addClass("on").siblings().removeClass("on");
                    this.config.current = next;
                    this.parts.css("transform", "rotateX(" + ((this.direction == 'right' ? ++this.rotate : --this.rotate) * 90) + "deg)");
                    var banner = this;
                    this.config.timer = setTimeout(function(){
                        banner.startAnimate();
                    },banner.config.duration);
                }
                $('#banner_style_01_1579490069383 a.img_url').attr('href',$url_html[this.config.current]);
                break;
        }
    };
    // 指定显示的图片
    Banner.prototype.showIndex = function(index) {
        switch(this.animateStyle) {
            case 'normal':
                // 默认效果
                this.imgs.eq(index).css("left","0%").siblings(".img-item").css("left","100%");
                this.config.flick.eq(index).addClass("on").siblings().removeClass("on");
                break;
            case 'rotate-3d':
                // 3D旋转效果
                this.updateFaceBottonTopImg(index);
                this.config.flick.eq(index).addClass("on").siblings().removeClass("on");
                break;
        }
    };
    /*
     * ********************************************
     * 3D旋转效果 特有函数 begin
     */
    // 每次旋转前都需要更新背部的图片
    Banner.prototype.updateBgImg = function() {
        // 计算背部要显示的图片
        var bg_image_index = this.nextIndex(this.nextIndex());
        // index: 计算背景图片当前显示在哪个img中( 总共有4个图片, 分别位于正面/底部/背部/顶部, 索引分别为0, 1, 2, 3 )
        var c, index = (c = (this.rotate + 2) % 4) >= 0 ? c : c + 4;
        var banner = this;
        // console.log('第',index,'个面-使用更新为第',bg_image_index,'张图');
        this.parts && this.parts.each(function () {
            $(this).find('.img:eq('+index+')').css({'background-image': 'url("'+banner.config.list[bg_image_index]+'")'});
        });
    };
    // 更新正面/顶部/底部的图片
    // index: 要显示哪张图片
    // 备注: 因为总共有四个面的图片需要更新, 初始化时, 正面/顶部/底部的图片只需更新一次即可 (背部的图片在每次旋转前都需要更新)
    Banner.prototype.updateFaceBottonTopImg = function(index) {
        // face, bottom, top: 计算正面/顶部/底部图片当前显示在哪个img中( 总共有4个图片, 分别位于正面/底部/背部/顶部, 索引分别为0, 1, 2, 3 )
        var c, face = (c = this.rotate % 4) >= 0 ? c : c + 4, bottom, top;
        bottom = face + 1; bottom >= this.config.length && (bottom = 0);
        top = face - 1; top < 0 && (top = this.config.length - 1);
        var banner = this;
        this.parts && this.parts.each(function () {
            // console.log('第',face,'个面-使用更新为第',index,'张图');
            $(this).find('.img:eq('+face+')').css({'background-image': 'url("'+banner.config.list[index]+'")'});
            // console.log('第',bottom,'个面-使用更新为第',index < banner.config.length - 1 ? index + 1 : 0,'张图');
            $(this).find('.img:eq('+bottom+')').css({'background-image': 'url("'+banner.config.list[index < banner.config.length - 1 ? index + 1 : 0]+'")'});
            // console.log('第',top,'个面-使用更新为第',index > 0 ? index - 1 : banner.config.length - 1,'张图');
            $(this).find('.img:eq('+top+')').css({'background-image': 'url("'+banner.config.list[index > 0 ? index - 1 : banner.config.length - 1]+'")'});
        });
    };
    // 初始化旋转部分: 设置3d旋转的四个面的图片, index表示默认显示哪张图片
    Banner.prototype.initImgPart = function(index) {
        var banner = this;
        this.parts && this.parts.each(function () {
            $(this).find('.img').each(function (i) {
                var j = 0;
                switch (i) {
                    case 0: j = index; break;   // 正面
                    case 1: j = index + 1; break;   // 底部
                    case 2: break;  // 背部
                    case 3: j = index - 1; break;   // 顶部
                }
                j >= banner.config.length && (j = 0);
                j < 0 && (j = banner.config.length - 1);
                $(this).css({'background-image': 'url("'+banner.config.list[j]+'")', 'background-repeat':'no-repeat', 'background-color':'#fff'});
            });
        });
    };
    // 更新旋转部分: 之所以使用定时器, 是因为无法实时获取模块宽度
    Banner.prototype.updateImgPart = function() {
        this.parts && this.parts.each(function(index) {
            $(this).css({
                "left":$(this).width() * index + "px"
            });
            $(this).find(".img").css({
                "background-position": -$(this).width() * index + "px"
            });
        });
        var banner = this;
        setTimeout(function () {
            banner.updateImgPart();
        }, 800);
    };
    /*
     * 3D旋转效果 特有函数 end
     * ********************************************
     */
    // 图片数据
    var list_banner_style_01_1579490069383 = [];
    list_banner_style_01_1579490069383.push('https://cdn.yun.sooce.cn/2/125311/jpg/158892718267731314f8c7e7aacd3.jpg');list_banner_style_01_1579490069383.push('https://cdn.yun.sooce.cn/2/125311/jpg/1588927182677d223ed9a54129f00.jpg');list_banner_style_01_1579490069383.push('https://cdn.yun.sooce.cn/2/125311/jpg/1588927182677f7282e11bc350cdb.jpg');
    var banner_banner_style_01_1579490069383;        // 轮播图对象
    $(function(){
        // 创建轮播图
        $arrHref = new Array();
        banner_banner_style_01_1579490069383 = new Banner({
            'list':list_banner_style_01_1579490069383,
            'view':$('#banner_style_01_1579490069383'),
            'duration':parseFloat('4') * 1000,
            'animation':parseFloat('0.5') * 1000
        });
                banner_banner_style_01_1579490069383.animateStyle = 'normal';
        banner_banner_style_01_1579490069383.imgs = banner_banner_style_01_1579490069383.view.find(".bannerStyle_1 .main_image .img-list").children(".img-item");
        banner_banner_style_01_1579490069383.view.find('a').each(function (i) {
            $(this).click(function () {
                if(!$(this).attr('href')) {
                    return false;
                }
            });
        });
        banner_banner_style_01_1579490069383.view.find('a.picSet').each(function(i){
             $arrHref[i] = $(this).attr('href');
        });
        console.log($arrHref);
        // 显示指定索引的图片
        banner_banner_style_01_1579490069383.showIndex(banner_banner_style_01_1579490069383.config.current);
        // 监听 点击圆点
        banner_banner_style_01_1579490069383.config.flick.click(function(){
            banner_banner_style_01_1579490069383.animateIndex($(this).index());
            $('#banner_style_01_1579490069383 a.img_url').attr('href',$url_html[$(this).index()]);
            $i = $(this).index();
            return false;
        });
        // 监听 鼠标悬浮时
        banner_banner_style_01_1579490069383.view.hover(
                function(){
                    banner_banner_style_01_1579490069383.hoverEndAnimate();
                    banner_banner_style_01_1579490069383.view.find(".bannerStyle_1 .btn_prev, .bannerStyle_1 .btn_next").fadeIn();
                },
                function(){
						clearInterval(intervaltimer);
                    banner_banner_style_01_1579490069383.config.timer = setTimeout(function(){
                        banner_banner_style_01_1579490069383.startAnimateRight();
                    },banner_banner_style_01_1579490069383.config.duration);
                    banner_banner_style_01_1579490069383.view.find(".bannerStyle_1 .btn_prev, .bannerStyle_1 .btn_next").fadeOut()
                }
        );
        // 监听 点击左右按钮
        banner_banner_style_01_1579490069383.view.find(".btn_prev").click(function() {
            banner_banner_style_01_1579490069383.startAnimateLeft();
        });
        banner_banner_style_01_1579490069383.view.find(".btn_next").click(function() {
            banner_banner_style_01_1579490069383.startAnimateRight();
        });
        // 监听 触摸事件
        var touchVal = null;
        document.addEventListener("touchstart", function(e){
            if($(e.target).is(banner_banner_style_01_1579490069383.view) || $(e.target).closest("#"+banner_banner_style_01_1579490069383.view.attr("id")).length > 0) {
                touchVal = {};
                touchVal.downX = e.touches[0].clientX;  // 记录触摸起始位置
            }
        }, false);
        document.addEventListener("touchmove", function(e){
            if(touchVal && touchVal.downX) {
                touchVal.moveX = e.touches[0].clientX - touchVal.downX;     // 计算触摸中的偏移位置
            }
        }, false);
        document.addEventListener("touchend", function(e){
            if(touchVal && touchVal.moveX){
                if(touchVal.moveX > 30){
                    banner_banner_style_01_1579490069383.startAnimateLeft();             // 触摸生效
                    if (e.preventDefault) {
                        e.preventDefault();
                    } else {
                        e.returnvalue = false;
                    }
                }else if(touchVal.moveX < -30){
                    banner_banner_style_01_1579490069383.startAnimateRight();                // 触摸生效
                    if (e.preventDefault) {
                        e.preventDefault();
                    } else {
                        e.returnvalue = false;
                    }
                }
            }
            touchVal = null;
        }, false);
        // 运行
        banner_banner_style_01_1579490069383.config.timer = setTimeout(function(){
            banner_banner_style_01_1579490069383.startAnimateRight();
        }, banner_banner_style_01_1579490069383.config.duration);
    });
</script>
				</div>
			</div>
						</div>
			</div>
						</div>
			</div>
					<div id="layout_1579486218994" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
									</div>
			</div>
					<div id="video_style_02_1578479329828" class="view style_02 video  ev_c_hidView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="video" class="view_contents">
					<script>$(document).ready(function(){
});</script>
<video muted="" style="width:100%;height:100%;" controls="controls" autoplay="" loop="" poster="img/video/style_02/player_poster.png">
    <source src="http://web.ls1001.com/inter.mp4" type="video/mp4">
    请升级您的浏览器或更换主流浏览器打开。
</video>
				</div>
			</div>
<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->
<!-- js start -->
<script src="js/ns.js"></script>
<!-- <script src="js/02800943.js"></script> -->
<script src="js/common.js"></script>
<script src="js/case.js"></script>
<!-- js ending -->
</body></html>