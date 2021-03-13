<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 7;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0049)human.html -->
<html>
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/02800931.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/02800931.css">
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

					<div id="layout_1579509093338" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="margin-top: 110px;">
				<div class="view_contents">
								<div id="image_style_01_1589519335713" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
					<div class="imgStyle CompatibleImg picSet">
		<a href="javascript:;" target="">
			<img class="link-type-" src="images/15892644080689a1b2e5aef2ebe76.jpg" title="" alt="描述" id="imageModeShow">
		</a>
</div>
<!-- 新加的js  -->
				</div>
			</div>
						</div>
			</div>
					<div id="layout_1589522214210" class="layout " data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="image_style_22_1589522214215" class="view style_22 image  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
<!-- modSet titleSet imgSet detailSet-->
<div class="imgStyle_22">
	<input type="hidden" id="current_page_1589522214215" value="4">
	<input type="hidden" id="show_per_page_1589522214215" value="4">
	<ul class="imgTextUl" id="content_1589522214215">
	<?php
	$hum = getlmrss('info_lm','0');
	foreach ($hum as $khum => $vhum) {
	 ?>
			<li class="imgTextLi modSet mainMenuSet">
				<div class="left">
					<div class="image-box">
						<a href="<?php echo $vhum['url_lm']?>">
							<div class="imgTBox">
								<img class="imgSet" src="<?php echo $vhum['img_sl_lm']?>" alt="<?php echo $vhum['title_lm']?>">
							</div>
						</a>
					</div>
					<div class="ratio" style="margin-top:67%;"></div>
				</div>
				<div class="cont">
					<div class="title">
						<div class="name titleSet"><?php echo $vhum['title_lm']?></div>
					</div>
						<div class="imgDetail detailSet"><?php echo $vhum['f_body_lm']?></div>
				</div>
			</li>
<?php }?>
	</ul>
</div>
				</div>
			</div>
						</div>
			</div>
					<div id="layout_1579438874589" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
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
<script src="js/28009252800959.js"></script>
<script src="js/common.js"></script>
<script src="js/honor.js"></script>
<!-- js ending -->
</body></html>