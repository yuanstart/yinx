<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 7;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0048)idea.html -->
<html>
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/28009312800933.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/28009312800933.css">
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
					<div id="layout_1579488195410" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="margin-top: 110px;">
				<div class="view_contents">
								<div id="image_style_12_1_1589611909593" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
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
					<div id="layout_1579486165408" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 980px;">
				<div class="view_contents">
								<div id="div_a_includeBlock_1579486165411" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="div" class="view_contents">
								<div id="text_style_01_1579487027389" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="text" class="view_contents">
					才能在实干中展现 价值在贡献里提升
				</div>
			</div>
					<div id="div_a_includeBlock_1579487113547" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
		<?php
			$inf = getcorss('info_co','1',false);
			foreach ($inf as $kinf => $vinf) {
		 ?>
				<div names="div" class="view_contents">
								<div id="image_style_01_1579487187223" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
					<div class="imgStyle CompatibleImg picSet">
		<a href="javascript:;" target="">
			<img class="link-type-" src="<?php echo $vinf['img_sl']?>" title="" alt="描述" id="imageModeShow">
		</a>
</div>
<!-- 新加的js  -->
				</div>
			</div>
					<div id="text_style_01_1579487355652" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="text" class="view_contents">
					<?php echo $vinf['f_body']?>
				</div>
			</div>

						</div>
			<?php }?>
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
<script src="js/02800943.js"></script>
<script src="js/common.js"></script>
<script src="js/case.js"></script>
<!-- js ending -->
</body></html>