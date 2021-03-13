<?php
include 'conn.php';

 ?>
 <!DOCTYPE html>
 <html lang="en">

<!-- head start -->
<?php showseo(); ?>
<?php include "head.php"; ?>
<!-- head ending -->


<body>
<!-- <div style="display: none; z-index: 2147483640; top: 0px; left: 0px; position: fixed; height: 100%; width: 100%;"></div> -->

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

<!-- 导航栏目有下级时禁止跳转 -->
<!-- 二级菜单宽度自适应 -->
<script>
function navSwtich(obj) {
	$(obj).siblings(".menuUlCopy").slideToggle(200);
	$(obj).toggleClass('ontoggle');
	$(obj).parent().siblings().find(".menuUlCopy").slideUp(200);
	$(obj).parent().siblings().find(".fa-angle-down").removeClass('ontoggle');
}
function subLeft_dh_style_28_1578629663716(){
	$("#dh_style_28_1578629663716 .menuUl>li").each(function(){
		$(this).find(".menuUl03").css("left",'100%');
	})
}
$(window).resize(function() {
	subLeft_dh_style_28_1578629663716();
})
$(function(){
	$("#dh_style_28_1578629663716 .fa-navicon").click(function(){
		$("#dh_style_28_1578629663716 .menuUlCopy").each(function(){
			$(this).siblings(".fa").show();
		})
	})
	subLeft_dh_style_28_1578629663716();
		$("#dh_style_28_1578629663716 .subBox").css("top",$("#dh_style_28_1578629663716 .menuUl_box").height());
	if($("#dh_style_28_1578629663716 .menuUl").hasClass("noHover")){
		var tabNum = 0;
		$("#dh_style_28_1578629663716 .menuUl>li").find(".Onsub").each(function(){
			tabNum += 1;
			$(this).parent().attr("tabNum",tabNum)
		})
		$("#dh_style_28_1578629663716 .menuUl>li .Onsub").mouseover(function(){
			$("#dh_style_28_1578629663716 .subBox").show();
			var index = $(this).parent().attr("tabNum");
			$("#dh_style_28_1578629663716 .subBox .subItems").eq(index-1).fadeIn(100).siblings().hide();
							$("#dh_style_28_1578629663716 .subBox .subMenuImgArea .subMenuImgCon").eq(0).fadeIn(100).siblings().hide();
					})
		$("#dh_style_28_1578629663716 .subBox").mouseleave(function(){
			$(this).hide();
		})
		$("#dh_style_28_1578629663716 .menuUl>li .Nosub").mouseover(function(){
			$("#dh_style_28_1578629663716 .subBox").hide();
		})
		//风格41 42
	}
})
</script>


<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<div id="layout_1578626271523" class="layout  none" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" >
<!-- style="margin-top: 110px;" -->
	<div class="view_contents">
		<div id="banner_style_01_1578626271528" class="view style_01 banner  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<!-- Banner start -->
			<div names="banner" class="view_contents">
				<div class="bannerStyle_1 normal">
					<div class="main_visual">
						<div class="flicking_con">
						<?php
								$ban = getcorss('ban_co','1',false);
								foreach ($ban as $kban => $vban) {
								if($kban =='0'){
									$on = "on";
								}
							 ?>
								<a href="index.html#" class="<?php echo $on?>"></a>
						<?php }?>
						</div>
						<div class="ground_glass"></div>
						<div class="main_image">
							<!-- 默认 动画效果 HTML -->
							<div class="img-list">
							<?php
								$ban = getcorss('ban_co','1',false);
								foreach ($ban as $kban => $vban) {
							 ?>
									<div class="img-item" style="left: -100%;"><a href="javascript:;" class="picSet"><span style="background: url(<?php echo $vban['img_sl']?>) center top no-repeat;"></span></a></div>
							<?php }?>
							</div>
							<a href="javascript:;" class="btn_prev" style="display: none;"></a>
							<a href="javascript:;" class="btn_next" style="display: none;"></a>
						</div>
					</div>
				</div>
			</div>
			<!-- Banner ending -->
		</div>




<script src="js/index.js"></script>

<script type="text/javascript">
if(typeof showcart !== 'function'){
	function showcart(){
		if(window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767)){
		location.href = "//box6js.nicebox.cn/exusers/u_cart.php?idweb=125603&act=show&lang=0&v=9";
		}else{
		document.getElementById("boxName").innerHTML="";
		if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
		document.getElementById("showiframe").src="//box6js.nicebox.cn/exusers/u_cart.php?idweb=125603&act=show&lang=0&v=9";
		box.Show({width:'1000px', height:'600px'});
		}
	}
}
</script>
						</div>
			</div>

					<div id="layout_1589024853135" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
									</div>
			</div>





<div id="layout_1589024589330" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 320px;">
	<div class="view_contents">
			<?php
			$yewu = getlmrss('busin_lm','0',false,'4');
			foreach ($yewu as $kyewu => $vyewu) {
			if($kyewu=="0"){
			$idd = "div_a_includeBlock_1589444246143";
			$ig = "images/15890252389986030241cbae46568.png";
			}elseif($kyewu=="1"){
			$idd = "div_a_includeBlock_1589619862309";
			$ig = "images/158902523900149eccba76633e838.png";
			}elseif($kyewu=="2"){
			$idd = "div_a_includeBlock_1589619893971";
			$ig = "images/1589025239002f9ca1b04ba5a09b4.png";
			}elseif($kyewu=="3"){
			$idd = "div_a_includeBlock_15896198939711";
			}
			 ?>
		<div id="<?php echo $idd ?>" class="view a_includeBlock div  ev_c_tabView includeView" data-wow-duration="1.5s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
				<div id="image_style_01_1589444246316" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="image" class="view_contents">
						<div class="imgStyle CompatibleImg picSet"></div>
					</div>
				</div>

				<div id="text_style_01_1589619894180" class="view style_01 text  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
						<a href="javascript:void(0);" target="" style="color:inherit" class="editor-view-extend link-type-1-3"><?php echo $vyewu['title_lm']?></a>
					</div>
				</div>
				
				<div id="image_style_01_1589619894189" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="image" class="view_contents">
						<div class="imgStyle CompatibleImg" style="background: url(<?php echo $vyewu['img_sl_lm']?>);background-size: cover;background-position: 50% 50% !important;border-radius: 5px;">
							<a href="field.php?tagId_lm=<?php echo $vyewu['id_lm']?>" target="">
	<?php
	$bas = getcorss('ban_co','6',false,'4',''," and link_url=$kyewu+1");
	foreach ($bas as $kbas => $vbas) {?>
								<img style="display:none" class="link-type- mouseimg" src="<?php echo $vbas['img_sl']?>" title="" alt="描述" id="imageModeShow">
	<?php }?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php }?>
	</div>
</div>




			<script>
			$(".CompatibleImg").hover(function(){
			$(".mouseimg").show().eq(index);
			},function(){
			$(".mouseimg").hide().eq(index);
			});
			</script>
					<div id="layout_1589025638342" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
									</div>
			</div>


					<div id="layout_1579162373618" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="div_a_includeBlock_1579162373622" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="div" class="view_contents">
								<div id="text_style_01_1579162373875" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
				<div names="text" class="view_contents">
					PRODUCT CENTER
				</div>
			</div>
					<div id="text_style_01_1579162373891" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
				<div names="text" class="view_contents">
					产品中心
				</div>
			</div>
						</div>
			</div>
						</div>
			</div>
					<div id="layout_1579162417284" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="image_style_22_1589187734303" class="view style_22 image  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
<!-- modSet titleSet imgSet detailSet-->
<div class="imgStyle_22">
	<input type="hidden" id="current_page_1589187734303" value="4">
	<input type="hidden" id="show_per_page_1589187734303" value="12">
	<ul class="imgTextUl" id="content_1589187734303">
		<?php
			$pr = getcorss('pro_co','1',true,'8','',' and ding=1');
			foreach ($pr as $kpr => $vpr) {
		 ?>
			<li class="imgTextLi modSet mainMenuSet">
				<div class="left">
					<div class="image-box">
						<a href="product.php?id_lm=<?php echo $vpr['id']?>">
							<div class="imgTBox">
								<img class="imgSet" src="<?php echo $vpr['img_sl']?>" alt="<?php echo $vpr['title']?>">
							</div>
						</a>
					</div>
					<div class="ratio" style="margin-top:100%;"></div>
				</div>
				<div class="cont">
					<div class="title">
						<div class="name titleSet"><?php echo $vpr['title']?></div>
							<div class="subName subtitle"></div>
					</div>
						<div class="imgDetail detailSet"><?php echo $vpr['f_body']?></div>
						<div class="btn">
							<a class="btnSet" target="_self" href="product.php?id_lm=<?php echo $vpr['id']?>">MORE</a>
						</div>
				</div>
			</li>
			<?php }?>
	</ul>
</div>
				</div>
			</div>
						</div>
			</div>
<!-- 合作夥伴-多图 start -->
<?php $arr = getcorss('pro_co','1',true,'24','',' and tuijian=1'); ?>
<div id="layout_1579315397967" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="banner_style_04_15892649974671" class="view style_04 banner  none lade" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="banner" class="view_contents">
				<div class="bannerStyle_4">
					<div class="imgMove" id="banner_style_04_15892649974671imgMove">
						<div class="subMove">
							<ul id="banner_style_04_15892649974671itemOne">
							<?php foreach ($arr as $key => $value): ?>
								<li class="list_mode picSet">
									<a class="a_mode" href="javascript:;">
										<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
									</a>
								</li>
							<?php endforeach ?>
							</ul>
							<ul id="banner_style_04_15892649974671itemTwo">
							<?php foreach ($arr as $key => $value): ?>
								<li class="list_mode picSet">
									<a class="a_mode" href="javascript:;">
										<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
									</a>
								</li>
							<?php endforeach ?>
							</ul>
							<ul id="banner_style_04_15892649974671itemThree">
							<?php foreach ($arr as $key => $value): ?>
								<li class="list_mode picSet">
									<a class="a_mode" href="javascript:;">
										<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
									</a>
								</li>
							<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 合作夥伴-多图 ending -->
<div id="layout_1579162373618" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
                <div class="view_contents">
                                <div id="div_a_includeBlock_1579162373622" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
                <div names="div" class="view_contents">
                                <div id="text_style_01_1579162373875" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
                <div names="text" class="view_contents">
                    VIDEO CENTER
                </div>
            </div>
                    <div id="text_style_01_1579162373891" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
                <div names="text" class="view_contents">
                    视频中心
                </div>
            </div>
                        </div>
            </div>
                        </div>
            </div>
                <div id="vide" style="">
                <?php
                $vid = getcorss('video_co','2',true,'4',',`vid_sl`');
                foreach ($vid as $keyvid => $vvid) {
                ?>
                <div class="vid" style="">
                        <video style="width:100%;height:100%;" controls="controls" playsinline="true" webkit-playsinline="true" loop="" poster="<?php echo $vvid['img_sl']?>">
                        <source src="<?php echo $vvid['vid_sl']?>" type="video/mp4">
                        请升级您的浏览器或更换主流浏览器打开。
                        </video>
                </div>
                <?php }?>
                </div>
                <div style="clear:both">

                </div>

<!-- case-tit start -->
<div id="layout_1589026298063" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589026298066" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
				<div id="text_style_01_1589026298263" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
					<div names="text" class="view_contents">
					PRODUCT CENTER
					</div>
				</div>
				<div id="text_style_01_1589026298275" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
					<div names="text" class="view_contents">
					工程案例
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- case-tit ending -->

<!-- case-con start -->
<?php $arr_lis = getlmrss('cases_lm' , 0 , false); ?>
<div id="layout_1589026501197" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 638px;">
	<div class="view_contents">
		<div id="newsList_style_04_1589026501199" class="view style_04 newsList  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="newsList" class="view_contents">
				<div class="boxNewsListStyle_4">
					<ul id="boxNewsList">
<?php foreach ($arr_lis as $key => $value): ?>
	<?php $arr_con = getzlrss('cases_co' , $value['id_lm'] , false , 6 , '' , 'AND `ding` = 1'); ?>
					<?php foreach ($arr_con as $k => $val): ?>
						<li class="sumary_list modSet">
							<div class="newPic imgSet">
								<a href="case_d.php?tagId=<?php echo $val['id'] ?>" target="_blank">
									<img class="News_img" src="<?php echo getimgj($val['img_sl'] , '') ?>">
								</a>
								<div class="zTm" style="margin-top:75%"></div>
							</div>
							<div class="newCont">
								<div class="newTitle">
									<div class="newName">
										<a class="titleSet newTitle pc" href="case_d.php?tagId=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $val['title'] ?></div>
										</a>
										<a class="titleSet newTitle pad" href="case_d.php?tagId=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $val['title'] ?></div>
										</a>
									</div>
								<div class="newB"></div>
								</div>
							</div>
						</li>
					<?php endforeach ?>
<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- case-con ending -->
<div id="layout_1589025620755" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="div_a_includeBlock_1589025620758" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="div" class="view_contents">
								<div id="text_style_01_1589025620989" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
				<div names="text" class="view_contents">
					PRODUCT CENTER
				</div>
			</div>
					<div id="text_style_01_1589025621002" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
				<div names="text" class="view_contents">
					集团概况
				</div>
			</div>
						</div>
			</div>
						</div>
			</div>
					<div id="layout_1579438345915" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="text_style_01_1579438346170" class="view style_01 text  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
				<div names="text" class="view_contents">
					<?php
					$zl = getlmrs('group_lm','33');
					echo $zl['z_body_lm'];
					?>
				</div>
				</div>
					<div id="video_style_02_1589265381462" class="view style_02 video  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="video" class="view_contents">
					<script>$(document).ready(function(){
});</script>
<?php
$vid = getvids('video_co','1',false,'1');
foreach ($vid as $kvd => $vvd) {
?>
<video style="width:100%;height:100%;" controls="controls" loop="" poster="<?php echo $vvd['img_sl']?>">
    <source src="<?php echo $vvd['vid_sl']?>" type="video/mp4">
    请升级您的浏览器或更换主流浏览器打开。
</video>
<?php }?>
				</div>
			</div>
			</div>
			</div>

						</div>
			</div>
					<div id="layout_1589025942579" class="layout " data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
			<?php
			$wh = getlmrss('group_lm','33',false,'3','',' and hot=1');
			foreach ($wh as $kwh => $vwh) {
			if($kwh=="0"){
			$idd1 = "image_style_03_1589270999725";
			}elseif($kwh=="1"){
			$idd1 = "image_style_03_1589026034816";
			}elseif($kwh=="2"){
			$idd1 = "image_style_03_1589026051727";
			}
			 ?>
			<div id="<?php echo $idd1;?>" class="view style_03 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
					<div class="imgStyle_3 CompatibleImg modSet">
		<a href="<?php echo $vwh['url_lm']?>" target="">
			<img class="imgSet" src="<?php echo $vwh['img_sl_lm']?>" title="" alt="企业文化" id="imageModeShow">
			<div class="tipsText">
				<span><?php echo $vwh['title_lm']?></span>
			</div>
		</a>
</div>
<!-- 新加的js  -->
				</div>
			</div>
			<?php }?>

						</div>
			</div>



<script>
window.resizeTimeoutnewsList_style_04_1589026501199=setTimeout(function(){
diyAutoHeight($('#newsList_style_04_1589026501199'));
window.resizeTimeoutnewsList_style_04_1589026501199=null;
},350);</script>



<style>
#newsList_style_04_1589026501199 .newDetail.pc {display:block;}
#newsList_style_04_1589026501199 .newDetail.pad, #newsList_style_04_1589026501199 .newDetail.mobile {display:none;}
#newsList_style_04_1589026501199 .newTitle.pc {display:block;}
#newsList_style_04_1589026501199 .newTitle.pad, #newsList_style_04_1589026501199 .newTitle.mobile {display:none;}
@media screen and (min-width:641px) and (max-width:1200px) {
#newsList_style_04_1589026501199 .newDetail.pad {display:block;}
#newsList_style_04_1589026501199 .newDetail.pc, #newsList_style_04_1589026501199 .newDetail.mobile {display:none;}
#newsList_style_04_1589026501199 .newTitle.pad {display:block;}
#newsList_style_04_1589026501199 .newTitle.pc, #newsList_style_04_1589026501199 .newTitle.mobile {display:none;}
}
@media screen and (max-width:640px) {
#newsList_style_04_1589026501199 .newDetail.mobile {display:block;}
#newsList_style_04_1589026501199 .newDetail.pc, #newsList_style_04_1589026501199 .newDetail.pad {display:none;}
#newsList_style_04_1589026501199 .newTitle.mobile {display:block;}
#newsList_style_04_1589026501199 .newTitle.pc, #newsList_style_04_1589026501199 .newTitle.pad {display:none;}
}
</style>

<style>
/*pc*/
#newsList_style_04_1589026501199 li{width: 32%;}
#newsList_style_04_1589026501199 li.sumary_list{margin-bottom:2%;}
@media screen and (max-width: 1024px){/*ipad*/
#newsList_style_04_1589026501199 li{width: 32%;}
#newsList_style_04_1589026501199 li.sumary_list{margin-bottom:2%;}
}
@media screen and (max-width: 768px){/*mobi*/
#newsList_style_04_1589026501199  li{width: 49%;}
#newsList_style_04_1589026501199  li.sumary_list{margin-bottom:2%;}
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
#newsList_style_04_1589026501199 .page_btn{ font-size:14px; text-align: center;}
#newsList_style_04_1589026501199 .page_btn .all_page{ display:inline-block; margin:0 10px; }
#newsList_style_04_1589026501199 .page:hover{ background:red; color:white; cursor:pointer;}
#newsList_style_04_1589026501199 .page_btn .cur{ background:red; color:white; cursor:pointer;}
#newsList_style_04_1589026501199 .submit_div{ display: inline-block; }

#newsList_style_04_1589026501199 .page_btn input{ width:50px; margin:0 5px;}
#newsList_style_04_1589026501199 .page_btn input:hover{ cursor:default; background:white; color:#333;}
#newsList_style_04_1589026501199 .page_submit{margin-left:5px;}
#newsList_style_04_1589026501199 .page{display:inline-block; border:none; background:white; text-align: center; width:auto; padding:0 15px; margin:0 .5px; height:auto; line-height:35px; box-sizing: border-box; -webkit-box-sizing: border-box; border:1px solid #e5e5e5;}
@media screen and (max-width:640px) {
#newsList_style_04_1589026501199 .page_btn{ font-size:12px; }
#newsList_style_04_1589026501199 .submit_div{ display:none; }
}

#newsList_style_04_1589026501199 .page{width:auto; margin:0 5px 10px 5px; border-radius:5px;  }
@media screen and (max-width:640px) {
#newsList_style_04_1589026501199 .page{line-height:30px; padding:0 13px;}
}
</style>


<div id="layout_1589026518358" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents"></div>
</div>

<!-- new-tit start -->
<div id="layout_1579245424453" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="div_a_includeBlock_1579245424455" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
				<div id="text_style_01_1579245424643" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
					<div names="text" class="view_contents">
					NEWS CENTER
					</div>
				</div>
				<div id="text_style_01_1579245424656" class="view style_01 text  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
					<div names="text" class="view_contents">
					新闻动态
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- new-tit ending -->

<!-- new-con start -->
<?php $arr_lis = getlmrss('news_lm' , 1 , false); ?>
<div id="layout_1579245401013" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="newsList_style_12_1589178759989" class="view style_12 newsList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="newsList" class="view_contents">
				<div class="boxNewsListStyle_12">
					<ul>
					<!-- new-left start -->
						<div class="newLeft">
<?php foreach ($arr_lis as $key => $value): ?>
	<?php $arr_con = getzlrss('news_co' , $value['id_lm'] , false , '3' , '' , ' AND `ding` = 1'); ?>
						<?php foreach ($arr_con as $k => $val): ?>
							<li class="leftLi modSet li_mode">
								<div class="newPic imgSet">
									<a href="news_d.php?id=<?php echo $val['id'] ?>" target="_blank">
										<img class="News_img" src="<?php echo getimgj($val['img_sl'] , '') ?>" alt="<?php echo $val['f_body'] ?>">
									</a>
									<div class="zTm" style="margin-top:100%"></div>
									<div class="newCont twoBgSet">
										<div class="newTitle">
											<a class="titleSet newTitle pc" href="news_d.php?id=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
												<div class="overhide"><?php echo $val['title'] ?></div>
											</a>
											<a class="titleSet newTitle pad" href="news_d.php?id=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
												<div class="overhide"><?php echo $val['title'] ?></div>
											</a>
											<a class="titleSet newTitle mobile" href="news_d.php?id=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
												<div class="overhide"><?php echo $val['title'] ?></div>
											</a>
										</div>
										<div class="newDetail detailSet pc" style="-webkit-line-clamp: ;">
											<div class="overhide">
												<?php echo $val['f_body'] ?>
											</div>
										</div>
										<div class="newDetail detailSet pad" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $val['f_body'] ?></div>
										</div>
										<div class="newDetail detailSet mobile" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $val['f_body'] ?></div>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach ?>
<?php endforeach ?>
						</div>
					<!-- new-left ending -->

					<!-- new-right start -->
						<div class="newRight">
							<div class="newsScroll">
								<ul class="ulScroll">
									<div class="news1">
<?php foreach ($arr_lis as $key => $value): ?>
	<?php
	$arr_con = getzlrss('news_co' , $value['id_lm'] , false , '3' , ',`read_num`' , ' AND `ding` = 1');
	?>
									<?php foreach ($arr_con as $k => $val): ?>
										<li class="newsLi li_mode modSet">
											<div class="newsCont">
												<div id="news_list">
													<div class="newsTitle">
														<a class="titleSet newTitle pc" href="news_d.php?id=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
															<div class="overhide"><?php echo $val['title'] ?></div>
														</a>
														<a class="titleSet newTitle pad" href="news_d.php?id=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
															<div class="overhide"><?php echo $val['title'] ?></div>
														</a>
														<a class="titleSet newTitle mobile" href="news_d.php?id=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
															<div class="overhide"><?php echo $val['title'] ?></div>
														</a>
													</div>

													<div class="newsTN">
														<div class="newsTimeSet">
															<span class="newsTime timesSet"><span class="nDate"></span><?php echo date('Y-m-d' , $val['wtime']) ?></span>
														</div>
														<div class="newsName">
															<span class="newSort sortSet"> <?php echo $value['title_lm'] ?></span>
															<span class="nsDate ydSet">阅读量：<?php echo $val['read_num'] ?> </span>
														</div>
													</div>
													<div class="newsDetail_Right">
														<div class="newDetail detailSet pc" style="-webkit-line-clamp: ;">
															<div class="overhide"><?php echo $val['f_body'] ?></div>
														</div>
														<div class="newDetail detailSet pad" style="-webkit-line-clamp: ;">
															<div class="overhide"><?php echo $val['f_body'] ?></div>
														</div>
														<div class="newDetail detailSet mobile" style="-webkit-line-clamp: ;">
															<div class="overhide"><?php echo $val['f_body'] ?></div>
														</div>
													</div>
												</div>
											</div>
										</li>
									<?php endforeach ?>
<?php endforeach ?>
									</div>
								</ul>
							</div>
						</div>
					<!-- new-right start -->
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- new-con ending -->



<style>
@media screen and (min-width: 1025px) {
#newsList_style_12_1589178759989 .newLeft{width: 576px;}
#newsList_style_12_1589178759989 .newRight{width: calc(100% - 576px);}
}
@media screen and (min-width: 640px) and (max-width: 1024px) {
#newsList_style_12_1589178759989 .newLeft{width: 576px;}
#newsList_style_12_1589178759989 .newRight{width: calc(100% - 576px);}
}
@media screen and (max-width: 640px) {
}
.cur_item {
	background: rgb(238, 238, 238);
}
/* 新分页 */
#newsList_style_12_1589178759989 .page_btn{ font-size:14px; text-align: center;}
#newsList_style_12_1589178759989 .page_btn .all_page{ display:inline-block; margin:0 10px; }
#newsList_style_12_1589178759989 .page:hover{ background:red; color:white; cursor:pointer;}
#newsList_style_12_1589178759989 .page_btn .cur{ background:red; color:white; cursor:pointer;}
#newsList_style_12_1589178759989 .submit_div{ display: inline-block; }

#newsList_style_12_1589178759989 .page_btn input{ width:50px; margin:0 5px;}
#newsList_style_12_1589178759989 .page_btn input:hover{ cursor:default; background:white; color:#333;}
#newsList_style_12_1589178759989 .page_submit{margin-left:5px;}
#newsList_style_12_1589178759989 .page{display:inline-block; border:none; background:white; text-align: center; width:auto; padding:0 15px; margin:0 .5px; height:auto; line-height:35px; box-sizing: border-box; -webkit-box-sizing: border-box; border:1px solid #e5e5e5;}
@media screen and (max-width:640px) {
#newsList_style_12_1589178759989 .page_btn{ font-size:12px; }
#newsList_style_12_1589178759989 .submit_div{ display:none; }
}

#newsList_style_12_1589178759989 .page{width:auto; margin:0 5px 10px 5px; border-radius:5px;  }
@media screen and (max-width:640px) {
#newsList_style_12_1589178759989 .page{line-height:30px; padding:0 13px;}
}

</style>

<script>
$(function(){
// 样式控制

// $("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .newLef"').css("height",""+(parseInt($("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .newLef"').css("width"))*2/3)+"px");
// 分割线
$("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .leftLi").first().show();
$("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .leftLi").first().siblings("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .leftLi").hide();

var i=0;
	$("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .newsLi").eq(0).css({background : 'rgb(238, 238, 238)'})
var timer = setInterval(function(){
	$("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .leftLi").eq(i).stop().show();
	$("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .newsLi").eq(i).addClass('cur_item').siblings().removeClass('cur_item');
	$("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .leftLi").eq(i).siblings("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .leftLi").hide();
	$("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .newsLi").eq(i).siblings("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .newsLi").css({background:''});
	if( i >= $("#newsList_style_12_1589178759989 .boxNewsListStyle_12 .leftLi").length-1 ){
		i = 0;
	}else{
		i++;
	};
},3000);

});
window.resizeTimeoutnewsList_style_12_1589178759989=setTimeout(function(){
diyAutoHeight($('#newsList_style_12_1589178759989'));
window.resizeTimeoutnewsList_style_12_1589178759989=null;
},350);</script>

<style>
#newsList_style_12_1589178759989 .newDetail.pc {display:block;}
#newsList_style_12_1589178759989 .newDetail.pad, #newsList_style_12_1589178759989 .newDetail.mobile {display:none;}
#newsList_style_12_1589178759989 .newTitle.pc {display:block;}
#newsList_style_12_1589178759989 .newTitle.pad, #newsList_style_12_1589178759989 .newTitle.mobile {display:none;}
@media screen and (min-width:641px) and (max-width:1200px) {
#newsList_style_12_1589178759989 .newDetail.pad {display:block;}
#newsList_style_12_1589178759989 .newDetail.pc, #newsList_style_12_1589178759989 .newDetail.mobile {display:none;}
#newsList_style_12_1589178759989 .newTitle.pad {display:block;}
#newsList_style_12_1589178759989 .newTitle.pc, #newsList_style_12_1589178759989 .newTitle.mobile {display:none;}
}
@media screen and (max-width:640px) {
#newsList_style_12_1589178759989 .newDetail.mobile {display:block;}
#newsList_style_12_1589178759989 .newDetail.pc, #newsList_style_12_1589178759989 .newDetail.pad {display:none;}
#newsList_style_12_1589178759989 .newTitle.mobile {display:block;}
#newsList_style_12_1589178759989 .newTitle.pc, #newsList_style_12_1589178759989 .newTitle.pad {display:none;}
}
</style>


<div id="layout_1579309794292" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents"></div>
</div>

<!-- 合作夥伴-多图 start -->
<?php $arr_hon = getzlrs('group_co' , 1); ?>
<?php $arr = getplrss('' , $arr_hon['id'] , 'pl_image' , 24); ?>
<div id="layout_1579315397967" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="banner_style_04_1589264997467" class="view style_04 banner  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="banner" class="view_contents">
				<div class="bannerStyle_4">
					<div class="imgMove" id="banner_style_04_1589264997467imgMove">
						<div class="subMove">
							<ul id="banner_style_04_1589264997467itemOne">
							<?php foreach ($arr as $key => $value): ?>
								<li class="list_mode picSet">
									<a class="a_mode" href="javascript:;">
										<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
									</a>
								</li>
							<?php endforeach ?>
							</ul>
							<ul id="banner_style_04_1589264997467itemTwo">
							<?php foreach ($arr as $key => $value): ?>
								<li class="list_mode picSet">
									<a class="a_mode" href="javascript:;">
										<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
									</a>
								</li>
							<?php endforeach ?>
							</ul>
							<ul id="banner_style_04_1589264997467itemThree">
							<?php foreach ($arr as $key => $value): ?>
								<li class="list_mode picSet">
									<a class="a_mode" href="javascript:;">
										<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
									</a>
								</li>
							<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 合作夥伴-多图 ending -->

<div id="layout_1579245360459" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="text_style_01_1589264460177" class="view style_01 text  none wow fadeInDown lockHeightView animated" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-iteration-count: 1; animation-name: fadeInDown;">
			<div names="text" class="view_contents">
			在追逐梦想的道路上且行且歌——电气工程 期待你的加入​​
			</div>
		</div>
		<div id="button_style_04_1589264478252" class="view style_04 button  none wow fadeInDown lockHeightView animated" data-wow-duration="2s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 2s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInDown;">
			<div names="button" class="view_contents">
				<button type="button" class="button_default04  btnaSet" onclick="location.href='human.php'">开启您的梦想</button>
			</div>
		</div>
	</div>
</div>

	<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script src="js/common.js"></script>
<!-- js ending -->

</div>
</body>
</html>
<script type="text/javascript">
$(document).stop().ready(function(){
	var flag = 2;
	console.log("sss:"+30+"");
	var speed = ""+30+"";
	var itemMove = document.getElementById("banner_style_04_15892649974671imgMove");
	var itemOne = document.getElementById("banner_style_04_15892649974671itemOne");
	var itemTwo = document.getElementById("banner_style_04_15892649974671itemTwo");
	var itemThree = document.getElementById("banner_style_04_15892649974671itemThree");
	itemTwo.innerHTML = itemOne.innerHTML;
	itemThree.innerHTML = itemOne.innerHTML;
	var imgScroll=setInterval(Marquee,speed);
	if(flag==1){
		var banner4BoxHtml = $("<div class='banner4Box'><div class='boxExit'><img src='img/banner/style_04/hover_close.png'/></div><div class='subBox'><div class='boxCon'><div class='boxBefore'><img src='img/banner/style_04/hover_left.png'/></div><div class='boxAfter'><img src='img/banner/style_04/hover_right.png'/></div><ul class='boxScroll' id='boxScroll'></ul></div></div></div>");
		$("body").append(banner4BoxHtml);
		flag = 0;
	}
	try{
		var boxScrollHtml = document.getElementById("boxScroll");
		boxScrollHtml.innerHTML = itemTwo.innerHTML;
		$("#boxScroll").prepend("<li><a><img src='https://cdn.yun.sooce.cn/2/125311/png/158892718266296bd0817252e199b.png'/></a></li>");
		$("#boxScroll").append("<li><a><img src='https://cdn.yun.sooce.cn/2/125311/png/1588927182662d038217017a9e193.png'/></a></li>");
	}catch(err){
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
	if(typeof(imgLazyloadLib)=="function")imgLazyloadLib($("#banner_style_04_15892649974671imgMove img"));
});

function btnTop(){
	$("html,body").animate({scrollTop:"0px"},1000);
}
function btnBottom(){
	var bodyH = $("html,body").height();
	$("html,body").animate({scrollTop:bodyH},1000);
}
</script>
<script type="text/javascript">
$(document).stop().ready(function(){
	var flag = 2;
	console.log("sss:"+30+"");
	var speed = ""+30+"";
	var itemMove = document.getElementById("banner_style_04_1589264997467imgMove");
	var itemOne = document.getElementById("banner_style_04_1589264997467itemOne");
	var itemTwo = document.getElementById("banner_style_04_1589264997467itemTwo");
	var itemThree = document.getElementById("banner_style_04_1589264997467itemThree");
	itemTwo.innerHTML = itemOne.innerHTML;
	itemThree.innerHTML = itemOne.innerHTML;
	var imgScroll=setInterval(Marquee,speed);
	if(flag==1){
		var banner4BoxHtml = $("<div class='banner4Box'><div class='boxExit'><img src='img/banner/style_04/hover_close.png'/></div><div class='subBox'><div class='boxCon'><div class='boxBefore'><img src='img/banner/style_04/hover_left.png'/></div><div class='boxAfter'><img src='img/banner/style_04/hover_right.png'/></div><ul class='boxScroll' id='boxScroll'></ul></div></div></div>");
		$("body").append(banner4BoxHtml);
		flag = 0;
	}
	try{
		var boxScrollHtml = document.getElementById("boxScroll");
		boxScrollHtml.innerHTML = itemTwo.innerHTML;
		$("#boxScroll").prepend("<li><a><img src='https://cdn.yun.sooce.cn/2/125311/png/158892718266296bd0817252e199b.png'/></a></li>");
		$("#boxScroll").append("<li><a><img src='https://cdn.yun.sooce.cn/2/125311/png/1588927182662d038217017a9e193.png'/></a></li>");
	}catch(err){
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
	if(typeof(imgLazyloadLib)=="function")imgLazyloadLib($("#banner_style_04_1589264997467imgMove img"));
});

function btnTop(){
	$("html,body").animate({scrollTop:"0px"},1000);
}
function btnBottom(){
	var bodyH = $("html,body").height();
	$("html,body").animate({scrollTop:bodyH},1000);
}
</script>