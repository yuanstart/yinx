<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 5;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0051)product.html -->
<html>
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/02800927.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/02800927.css">
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
<body>
<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->
					<div id="layout_1589530608584" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="image_style_01_1589530608590" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
					<div class="imgStyle CompatibleImg picSet">
		<a href="javascript:;" target="">
			<img class="link-type-" src="images/15895305538622d16b2d17f723b1f.jpg" title="" alt="描述" id="imageModeShow">
		</a>
</div>
<!-- 新加的js  -->
				</div>
			</div>
						</div>
			</div>
<script type="text/javascript" src="js/default.js"></script>
<script>
function clickli(){
	var pid="";
	var pgids='';
	$(".level1[pid="+pgids+"]").find("em").trigger("click");
	if($(".level1[pid="+pgids+"]").length==0) $(".le2[pid="+pgids+"]").parents(".level1").find("em").trigger("click");
}

window.onload = function() {
	var pid="";
	var pgids='';
	if(!pgids) pgids=Request('pgid');
	console.log("pid:"+pid);
	console.log("pgids:"+pgids);
	setTimeout('clickli()', 1000);
	$(".level1[pid="+pgids+"]").find("em").trigger("click");
	if($(".level1[pid="+pgids+"]").length==0) $(".le2[pid="+pgids+"]").parents(".level1").find("em").trigger("click");

}
</script>
<style>
#image_style_12_1_1589612082109 ul li {
    width: 10%;
}
</style>
<?php $pro = getlmrss('pro_lm' , 1 , false); ?>
<div id="layout_1589612082104" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_12_1_1589612082109" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="image" class="view_contents">
				<div class="imgStyle_12">
					<ul class="imgTextUl">
					<?php foreach ($pro as $key => $value): ?>
						<li class="imgTextLi modSet">
							<a href="idea.php" style="display: block;">
								<div class="imgTBoxArea">
									<div class="image-box">
										<div class="imgTBox">
											<img class="picSet picFit" src="<?php echo $value['img_sl_lm'] ?>">
										</div>
									</div>
									<div class="ratio" style="margin-top:100%;"></div>
								</div>
							</a>
							<div class="cont">
								<div class="name titProSet"><?php echo $value['title_lm'] ?></div>
							</div>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!--产品分类区域 结束--><script>
			window.resizeTimeoutprodKind_style_05_1589531764263=setTimeout(function(){
				diyAutoHeight($('#prodKind_style_05_1589531764263'));
				window.resizeTimeoutprodKind_style_05_1589531764263=null;
			},350);</script>
					<div id="layout_1578470160105" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 821px;">
				<div class="view_contents">
								<div id="productList_style_01_1578574977319" class="view style_23 productList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="productList" class="view_contents" style="">
<!-- protypeSet pageSet pagecurSet-->
<div class="prod_default23">
	<ul id="prod_Ulist">
<?php
if(empty($_GET['id_lm'])){
$sql = "SELECT `id` , `title".$cong['lang']."`, `link_url` , `z_body".$cong['lang']."` , `img_sl` , `wtime`  FROM ".table('pro_co')." WHERE 1 = 1 AND `pass` = 1 order by px desc , id asc";
$p = new page(array('pagesize'=>8));
$arr = $p->getrss($db,$sql);
}else{
$id_lm = $_GET['id_lm'];
$sql = "SELECT `id` , `title".$cong['lang']."`, `link_url` , `z_body".$cong['lang']."` , `img_sl` , `wtime`  FROM ".table('pro_co')." WHERE 1 = 1 AND `lm` = $id_lm AND  `pass` = 1 order by px desc , id asc";
$p = new page(array('pagesize'=>8));
$arr = $p->getrss($db,$sql);
}
foreach ($arr as $kp => $vp):
?>
			<li class="prod_Item prod modSet">
				<div class="relative">
					<!-- 产品图片 -->
					<div class="prodImg_box imgSet">
						<div class="prod_img"><a href="product_d.php?id=<?php echo $vp['id']?>" target="_blank"><img class="pro_img horizontal" src="<?php echo $vp['img_sl']?>" alt="<?php echo $vp['title']?>"><span></span></a></div>
						<div class="dummy" style="margin-top:100%"></div>
					</div>
					<!-- 内容 -->
					<div class="prod_info">
							<div class="p_name titleSet pc" style="-webkit-line-clamp:;"><a class="overhide" href="product_d.php?id=<?php echo $vp['id']?>" target="_blank"><span class="status protypeSet showStatus">NEW</span><?php echo $vp['title']?></a></div>
							<div class="p_name titleSet pad" style="-webkit-line-clamp:;"><a class="overhide" href="product_d.php?id=<?php echo $vp['id']?>" target="_blank"><span class="status protypeSet showStatus">NEW</span><?php echo $vp['title']?></a></div>
							<div class="p_name titleSet mobile" style="-webkit-line-clamp:;"><a class="overhide" href="product_d.php?id=<?php echo $vp['id']?>" target="_blank"><span class="status protypeSet showStatus">NEW</span><?php echo $vp['title']?></a></div>

					</div>
				</div>
			</li>
<?php endforeach ?>
	</ul>


		<div class="page_btn">
						    <?php if ($p->counter >0): ?>
						    	<?php $p->getpagenum1($home ='首页' , $prev = '上一页', $next = '下一页', $last = '尾页'); ?>
								<input type="text" id="page_set" name="page" class="page pageSet"> 页
								<input class="page_submit page pageSet" style="width: 60px;cursor: pointer;" type="submit" value="确定">
						    <?php endif ?>
						</div>
</div>


</div>
			</div>
						</div>
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