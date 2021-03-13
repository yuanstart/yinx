<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 7;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0048)team.html -->
<html>
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/28009312800935.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/28009312800935.css">
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


<div id="layout_1589612082104" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="margin-top: 110px;">
	<div class="view_contents">
		<div id="image_style_12_1_1589612082109" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
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
					<div id="layout_1579490309690" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 608px;">
				<div class="view_contents">
								<div id="div_a_includeBlock_1579490309694" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 578px;">
				<div names="div" class="view_contents">
								<div id="text_style_01_1579490309822" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="text" class="view_contents">
						<?php
						$zb = getcorss('info_co','4',false,'1');
						foreach ($zb as $kzb => $vzb) {
							echo $vzb['z_body'];
						}
						 ?>
					<br>
				</div>
			</div>
					<div id="newsList_style_04_1579490609201" class="view style_04 newsList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="newsList" class="view_contents"><!--新闻列表区域-->
<!--pageSet pagecurSet-->
<div class="boxNewsListStyle_4">
	<ul id="boxNewsList">
	<?php
	$mb = getplrss('info_co','4','pl_info','6');
	foreach ($mb as $kmb => $vmb) {
	 ?>
		<li class="sumary_list modSet">
				<div class="newPic imgSet">
					<a href="team.html" target="_self"><img class="News_img" src="<?php echo $vmb['img_sl']?>"></a>
					<div class="zTm" style="margin-top:133%"></div>
				</div>
			<div class="newCont">
				<div class="newTitle">
					<div class="newName">
							<a class="titleSet newTitle pc" href="team.html" target="_self" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vmb['title']?></div></a>
							<a class="titleSet newTitle pad" href="team.html" target="_self" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vmb['title']?></div></a>
							<a class="titleSet newTitle mobile" href="team.html" target="_self" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vmb['title']?></div></a>
					</div>
						<div class="newDetail detailSet pc" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vmb['z_body']?></div></div>
						<div class="newDetail detailSet pad" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vmb['z_body']?></div></div>
						<div class="newDetail detailSet mobile" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vmb['z_body']?></div></div>

				</div>
				<div class="newB">
				</div>
			</div>
		</li>
<?php }?>
	</ul>

</div><script>
			window.resizeTimeoutnewsList_style_04_1579490609201=setTimeout(function(){
				diyAutoHeight($('#newsList_style_04_1579490609201'));
				window.resizeTimeoutnewsList_style_04_1579490609201=null;
			},350);</script>

<style>
	#newsList_style_04_1579490609201 .newDetail.pc {display:block;}
	#newsList_style_04_1579490609201 .newDetail.pad, #newsList_style_04_1579490609201 .newDetail.mobile {display:none;}
	#newsList_style_04_1579490609201 .newTitle.pc {display:block;}
	#newsList_style_04_1579490609201 .newTitle.pad, #newsList_style_04_1579490609201 .newTitle.mobile {display:none;}
	@media screen and (min-width:641px) and (max-width:1200px) {
		#newsList_style_04_1579490609201 .newDetail.pad {display:block;}
		#newsList_style_04_1579490609201 .newDetail.pc, #newsList_style_04_1579490609201 .newDetail.mobile {display:none;}
		#newsList_style_04_1579490609201 .newTitle.pad {display:block;}
		#newsList_style_04_1579490609201 .newTitle.pc, #newsList_style_04_1579490609201 .newTitle.mobile {display:none;}
	}
	@media screen and (max-width:640px) {
		#newsList_style_04_1579490609201 .newDetail.mobile {display:block;}
		#newsList_style_04_1579490609201 .newDetail.pc, #newsList_style_04_1579490609201 .newDetail.pad {display:none;}
		#newsList_style_04_1579490609201 .newTitle.mobile {display:block;}
		#newsList_style_04_1579490609201 .newTitle.pc, #newsList_style_04_1579490609201 .newTitle.pad {display:none;}
	}
</style>

<style>
/*pc*/
#newsList_style_04_1579490609201 li{width: 23.5%;}
#newsList_style_04_1579490609201 li.sumary_list{margin-bottom:2%;}
@media screen and (max-width: 1024px){/*ipad*/
	#newsList_style_04_1579490609201 li{width: 23.5%;}
	#newsList_style_04_1579490609201 li.sumary_list{margin-bottom:2%;}
}
@media screen and (max-width: 768px){/*mobi*/
	#newsList_style_04_1579490609201  li{width: 49%;}
	#newsList_style_04_1579490609201  li.sumary_list{margin-bottom:2%;}
}
</style>






<style>
@media screen and (min-width: 1025px) {
}
@media screen and (min-width: 640px) and (max-width: 1024px) {
}
@media screen and (max-width: 640px) {
}

/* 新分页 */
#newsList_style_04_1579490609201 .page_btn{ font-size:14px; text-align: center;}
#newsList_style_04_1579490609201 .page_btn .all_page{ display:inline-block; margin:0 10px; }
#newsList_style_04_1579490609201 .page:hover{ background:red; color:white; cursor:pointer;}
#newsList_style_04_1579490609201 .page_btn .cur{ background:red; color:white; cursor:pointer;}
#newsList_style_04_1579490609201 .submit_div{ display: inline-block; }

#newsList_style_04_1579490609201 .page_btn input{ width:50px; margin:0 5px;}
#newsList_style_04_1579490609201 .page_btn input:hover{ cursor:default; background:white; color:#333;}
#newsList_style_04_1579490609201 .page_submit{margin-left:5px;}
#newsList_style_04_1579490609201 .page{display:inline-block; border:none; background:white; text-align: center; width:auto; padding:0 15px; margin:0 .5px; height:auto; line-height:35px; box-sizing: border-box; -webkit-box-sizing: border-box; border:1px solid #e5e5e5;}
@media screen and (max-width:640px) {
		#newsList_style_04_1579490609201 .page_btn{ font-size:12px; }
		#newsList_style_04_1579490609201 .submit_div{ display:none; }
	}

	#newsList_style_04_1579490609201 .page{width:auto; margin:0 5px 10px 5px; border-radius:5px;  }
	@media screen and (max-width:640px) {
		#newsList_style_04_1579490609201 .page{line-height:30px; padding:0 13px;}
	}

</style></div>
			</div>
						</div>
			</div>
						</div>
			</div>
					<div id="layout_1579491255448" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="div_a_includeBlock_1579491255452" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="div" class="view_contents">
									</div>
			</div>
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