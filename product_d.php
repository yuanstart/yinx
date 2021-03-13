<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 5;
$id = $_GET['id'];
$prco = getcors('pro_co',"$id");
$lm = $prco['lm'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0079)procuct_d.html?pid=2956935&_t=1589954437 -->
<html>
<head>
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/countdown.js"></script>
<script type="text/javascript" src="js/jquery.tabs.js"></script>
<script type="text/javascript" src="js/prodinfoV9.js"></script>
<script type="text/javascript" src="js/jquery.commentImg.js"></script>
<script type="text/javascript" src="js/countdown.js(1)"></script>
<script type="text/javascript" src="js/jquery.tabs.js"></script>
<script type="text/javascript" src="js/prodinfoV9.js"></script>
<script type="text/javascript" src="js/jquery.commentImg.js"></script>
</head><body style="width: auto;">
<script type="text/javascript" src="js/28009272800955.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/28009272800955.css">
<link href="./up.php_files/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="./up.php_files/font-awesome.min.css">
<link href="./up.php_files/saved_resource" rel="stylesheet" type="text/css">
<style>
.txt {
    height: 34px;
    font-size: 14px;
    color: #333;
    padding: 0 5px;
    box-sizing: border-box;
    width: 100%;
    border: 1px solid #aaa;
   }
.gbt {
    font-size: 12px;
    padding: 6px 35px 6px 35px;
    line-height: 150%;
    width: 100%;
    margin-top: 20px;
    background: #c00;
    color: #fff;
    border: 0;
    height: 36px;
    font-size: 14px;
    font-family: microsoft yahei;
    cursor: pointer;
}
.textarea {
    max-width: 100%;
    min-width: 100%;
    width: 100%;
    min-height: 80px;
    box-sizing: border-box;
    border: 1px solid #aaa;
}
</style>
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
					<div id="layout_1578625034106" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="prodKind_style_05_1589615039639" class="view style_05 prodKind  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="prodKind" class="view_contents">
<script type="text/javascript" src="js/default.js"></script>
<script>
function clickli(){
	var pid="2956935";
	var pgids='839287';
	$(".level1[pid="+pgids+"]").find("em").trigger("click");
	if($(".level1[pid="+pgids+"]").length==0) $(".le2[pid="+pgids+"]").parents(".level1").find("em").trigger("click");
}

window.onload = function() {
	var pid="2956935";
	var pgids='839287';
	if(!pgids) pgids=Request('pgid');
	console.log("pid:"+pid);
	console.log("pgids:"+pgids);
	setTimeout('clickli()', 1000);
	$(".level1[pid="+pgids+"]").find("em").trigger("click");
	if($(".level1[pid="+pgids+"]").length==0) $(".le2[pid="+pgids+"]").parents(".level1").find("em").trigger("click");

}
</script>
<!---产品分类区域-->
<link rel="stylesheet" href="images/default.css">
<div class="prodcateStyle_5">
	<ul class="oneBgSet">
	<?php
	$pro = getlmrss('pro_lm','1',false);
	foreach ($pro as $kpro => $vpro) {
	 ?>
		<li class="oneSet"><a href="product.php?id_lm=<?php echo $vpro['id_lm']?>" target="_self"><?php echo $vpro['title_lm']?></a></li>

		<?php }?>
	</ul>
</div>
<!--产品分类区域 结束--><script>
			window.resizeTimeoutprodKind_style_05_1589615039639=setTimeout(function(){
				diyAutoHeight($('#prodKind_style_05_1589615039639'));
				window.resizeTimeoutprodKind_style_05_1589615039639=null;
			},350);</script>
</div>
			</div>
						</div>
			</div>
					<div id="layout_1496303516196" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 580px;">
				<div class="view_contents">
								<div id="div_a_includeBlock_1578576197386" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 550px;">
				<div names="div" class="view_contents">
								<div id="prodPic_style_02_1578575795020" class="view style_01 prodPic  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="prodPic" class="view_contents" style=""><!---Banner区域---->
<div id="banner" class="bannerStyle_1">
	<div class="main_visual">

		<div class="main_image">
			<ul>
		<?php
			$im = getplrss('pro_co',"$lm",'pl_image','7',''," and pl_id=$id");
			foreach ($im as $kim => $vim) {
		 ?>
				<li style="display: block; float: none; left: 0%; top: 0px; position: absolute;">
						<span class="img_0" style="background:url(&#39;<?php echo $vim['img_sl']?>&#39;) center top no-repeat"></span>
				</li>
		<?php }?>
			</ul>
			<a href="javascript:;" id="btn_prev"></a>
			<a href="javascript:;" id="btn_next"></a>
		</div>
	</div>
</div>

<script type="text/javascript">
	setTimeout(function(){prodPic_style_02_1578575795020startProdPic();},50);
	function prodPic_style_02_1578575795020startProdPic(){
		var timeSet=parseFloat('3')*1000;
		var timeAnimi=parseFloat('0.5')*1000;
		var obj=$("#prodPic_style_02_1578575795020");

	    var hasVideo = false;
	    var FileExtend0 = getFileExtend('https://cdn.yun.sooce.cn/2/125311/jpg/158950547320235278bfd3a13a245.jpg?version=1589505488');
			FileExtend0 = FileExtend0.split('?')[0];
			hasVideo = (['mp4','m4v','mov','webmv','ogv','flv'].indexOf(FileExtend0)>-1);
			console.info(hasVideo);
		if(obj&&obj.length>0){
			/*初始化参数*/
			var timeoutObj=null;/*定义计时器*/
			var nowItem=0;/*当前的*/
			var father=obj.find(".bannerStyle_1 .main_image ul");
			var Ulen = father.children("li").length;

			/*初始化视图*/
			father.children("li").eq(nowItem).css({"display":"block","float":"none","left":"0%","top":"0px","position":"absolute"}).siblings("li").css({"display":"block","float":"none","left":"100%","top":"0px","position":"absolute"});
			obj.find(".bannerStyle_1 .flicking_con").children("a").eq(0).addClass("on").siblings().removeClass("on");
			obj.find(".bannerStyle_1 .flicking_con").children("a").click(function(){
				if(Ulen>1 && $(this).index() != nowItem){
					var now=nowItem;
					var next=$(this).index();
					obj.find(".bannerStyle_1 .flicking_con").children("a").eq(next).addClass("on").siblings().removeClass("on");
					father.children("li").eq(now).stop().animate({"left":"-100%"},timeAnimi,function(){
						if(typeof(callback)=="function"){
							timeoutObj=setTimeout(function(){
								if(!hasVideo){
									callback(callback);
								}
							},timeSet);
						}
					});
					father.children("li").eq(next).css({"left":"100%"}).stop().animate({"left":"0%"},timeAnimi);
					nowItem=next;
				}

			});

			obj.hover(function(){
				if(timeoutObj){
					if(!hasVideo){
						window.clearTimeout(timeoutObj);
					}
				}
				obj.find(".bannerStyle_1 #btn_prev, .bannerStyle_1 #btn_next").fadeIn()
			},function(){
				timeoutObj=setTimeout(function(){
					if(!hasVideo){
						animiIn(animiIn);
					}
				},timeSet);
				obj.find(".bannerStyle_1 #btn_prev, .bannerStyle_1 #btn_next").fadeOut()
			});
			$("#btn_prev").click(function(){
				animiOut();
			});
			$("#btn_next").click(function(){
				animiIn();
			});
			var touchVal=null;
			document.addEventListener("touchstart", function(e){
				if($(e.target).is(obj)||$(e.target).parents("#"+obj.attr("id")).length>0){
					touchVal={};
					touchVal.downX=e.touches[0].clientX;
					if (e.preventDefault) {
				       // e.preventDefault();//禁止默认事件，就不能上下滑动了
				    }
				    else {
				        e.returnvalue = false;
				    }
				}
			}, false);
			document.addEventListener("touchmove", function(e){
				if(touchVal&&touchVal.downX){
					touchVal.moveX=e.touches[0].clientX-touchVal.downX;
					if (e.preventDefault) {
				       // e.preventDefault();
				    }
				    else {
				        e.returnvalue = false;
				    }
				}
			}, false);
			document.addEventListener("touchend", function(e){
				if(touchVal&&touchVal.moveX){
					if(touchVal.moveX>30){
						animiOut(animiIn);
					}else if(touchVal.moveX<-30){
						animiIn(animiIn);
					}
					if (e.preventDefault) {
				        //e.preventDefault();
				    }
				    else {
				        e.returnvalue = false;
				    }
				}
				touchVal=null;
			}, false);
			/*定义进入事件*/
			function animiIn(callback){
				if(timeoutObj){
					window.clearTimeout(timeoutObj);
				}
				if(Ulen>1){
					/*当个数大于1个的时候才会切换*/
					var now=nowItem;
					var next=now+1;
					if(next>=Ulen){
						next=0;
					}
					obj.find(".bannerStyle_1 .flicking_con").children("a").eq(next).addClass("on").siblings().removeClass("on");
					father.children("li").eq(now).stop().animate({"left":"-100%"},timeAnimi,function(){
						if(typeof(callback)=="function"){
							timeoutObj=setTimeout(function(){
								if(!hasVideo){
									callback(callback);
								}
							},timeSet);
						}
					});
					father.children("li").eq(next).css({"left":"100%"}).stop().animate({"left":"0%"},timeAnimi);
					nowItem=next;
				}
			}
			/*定义离开事件*/
			function animiOut(){
				if(timeoutObj){
					window.clearTimeout(timeoutObj);
				}
				if(Ulen>1){
					/*当个数大于1个的时候才会切换*/
					var now=nowItem;
					var next=now-1;
					if(next<0){
						next=Ulen-1;
					}
					obj.find(".bannerStyle_1 .flicking_con").children("a").eq(next).addClass("on").siblings().removeClass("on");
					father.children("li").eq(now).stop().animate({"left":"100%"},timeAnimi,function(){
						if(typeof(callback)=="function"){
							timeoutObj=setTimeout(function(){
								if(!hasVideo){
									callback(callback);
								}
							},timeSet);
						}
					});
					father.children("li").eq(next).css({"left":"-100%"}).stop().animate({"left":"0%"},timeAnimi);
					nowItem=next;
				}
			}
			/*运行*/
		}
	}
	function getFileExtend(fileName) {
        if (fileName) {
            return fileName.replace(/.+\./,"");;
        } else {
            return '';
        }
    }
</script>
</div>
			</div>
					<div id="prodInfor_style_01_1482460665817" class="view style_04 prodInfor  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="prodInfor" class="view_contents" style="">
<div class="proInfoStyle04">
	<!--标题/简介-->
	<div class="proInfo_title">

		<h1 class="prodName titProSet"><?php echo $prco['title']?></h1>


		<p class="proBrief defProSet"><?php echo $prco['f_body']?></p>


	</div>

	<!--规格 colorPorSet-->




	<!--资讯-->
	<div class="probuy">

		<button id="cl" class="Consultation btn1 buyTProSet" >提交意向单</button>


	</div>


	<!--其他链接-->
	<!-- <div class="other-link">
		<ul>
			<li><i></i>收藏商品</li>
		</ul>
	</div> -->
</div><script>
			window.resizeTimeoutprodInfor_style_01_1482460665817=setTimeout(function(){
				diyAutoHeight($('#prodInfor_style_01_1482460665817'));
				window.resizeTimeoutprodInfor_style_01_1482460665817=null;
			},350);</script>	<style>
		 #prodInfor_style_01_1482460665817 input[type='button']{background: #ccc !important; color: #333 !important;border-color:#333 !important	;}
	</style>

</div>
			</div>
						</div>
			</div>
						</div>
			</div>
					<div id="layout_1498112236160" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 2234px;">
				<div class="view_contents">
								<div id="div_a_includeBlock_1589506400154" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 2234px;">
				<div names="div" class="view_contents">
								<div id="customDetail_style_prodDetail_01_1589506414022" class="view style_prodDetail_01 customDetail  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="customDetail" class="view_contents" style=""><script type="text/javascript">
loadExtentFile('http://box6js.nicebox.cn/js/jquery.tabs.js','js');
loadExtentFile('http://box6js.nicebox.cn/js/prodinfoV9.js','js');
loadExtentFile('http://box6js.nicebox.cn/js/jquery.commentImg.js','js');
var ajaxServer = 'http://box6js.nicebox.cn';
var upPicServer = 'http://img.nicebox.cn';
var curIDWebSite = 125603;
</script>
<link rel="stylesheet" type="text/css" href="css/default(1).css">
<script src="images/default.js(1)"></script>
<style>
#customDetail_style_prodDetail_01_1589506414022{height:auto;}
</style>


 <div id="proDetailContent" class="bgareaSet">

	 <div class="prodetail prodetail_1 pcAbout" style="display: block;">
		 <?php echo $prco['z_body']?>
	 </div>



 </div>


<script type="text/javascript">

	if(is_mobile()){
		$(".mobileAbout").css("display","block");
		$(".pcAbout").remove();
	}else{
		$(".mobileAbout").remove();
		$(".pcAbout").css("display","block");
	}

	function is_mobile(){
		return window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767);
	}
</script>
<script>
			window.resizeTimeoutcustomDetail_style_prodDetail_01_1589506414022=setTimeout(function(){
				diyAutoHeight($('#customDetail_style_prodDetail_01_1589506414022'));
				window.resizeTimeoutcustomDetail_style_prodDetail_01_1589506414022=null;
			},350);</script>
<style>

#customDetail_style_prodDetail_01_1589506414022 .view_contents{ display:block !important; }

@media screen and (max-width:767px){
#customDetail_style_prodDetail_01_1589506414022 #proDetailContent div,#proDetailContent p,#proDetailContent a,#proDetailContent span, #proDetailContent table { width:100% !important; } }

</style>

<script type="text/javascript">
	if(typeof is_mobile ==='undefined'){
		function is_mobile(){
			return window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767);
		}
	}
	function joinPurchaseTeam(head_lid=0) {
		if(is_mobile()){
			window.location.href="//box6js.nicebox.cn/exusers/purchase_orderdetail.php?isCenter=1&lid="+head_lid;
		}else{
			document.getElementById("boxName").innerHTML="我要参团 - 拼购活动";
			if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
			document.getElementById("showiframe").src="//box6js.nicebox.cn/exusers/purchase_orderdetail.php?isCenter=1&lid="+head_lid;
			box.Show({width:"920px",height:"500px"});
		}
	}


</script>





<style>
    #customDetail_style_prodDetail_01_1589506414022 .imgDiv{ padding-bottom: 67%;}
</style>
</div>
			</div>
						</div>
			</div>
						</div>
			</div>
					<div id="layout_1578577293074" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 160px;">
				<div class="view_contents">
								<div id="div_a_includeBlock_1578578830948" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="div" class="view_contents">
								<div id="customDetail_style_prodPage_01_1578577279806" class="view style_prodPage_01 customDetail  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="customDetail" class="view_contents" style=""><div class="Divz ">
	<?php
	//下一个
	$sql = "select * from pro_co where lm=$lm and id>$id limit 1 ";
	$aru = getRow($sql);
	$titles = $aru['title'];
	$prid = $aru['id'];
	if(empty($titles)){
		$iid = "无";
		$hre = "";
	}else{
		$iid = "$titles";
		$hre = "product_d.php?id=$prid";
	}
	//上一个
	$sql1 = "select * from pro_co where lm=$lm and id<$id order by id desc limit 1  ";
	$aru1 = getRow($sql1);
	$titles1 = $aru1['title'];
	$prid1 = $aru1['id'];
	if(empty($titles1)){
		$iid1 = "无";
		$hre1 = "";
	}else{
		$iid1 = "$titles1";
		$hre1 = "product_d.php?id=$prid1";
	}
	?>
	<a href="<?php echo $hre1?>" class="btn_prev fybnt zyfenyeSet">上一个：<?php echo $iid1 ?></a>
	<a class="dqsp dangqianSet"><?php echo $prco['title']?></a>
	<a href="<?php echo $hre?>" class="btn_next fybnt zyfenyeSet">下一个：<?php echo $iid ?></a>
</div></div>
			</div>
						</div>
			</div>
						</div>
			</div>
<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<style>
#GBForm{
	width:50%;
	margin:0 auto;
}
@media screen and (max-width:640px){#GBForm{width:100%;margin:0 auto}}
</style>
<div style="display:none;position:absolute;width:100%; top:20%;z-index:9999999999999;background-color:white" id="show_order" class="pro_order">
	<div style="float:right">
		<a id="guanbi" style="font-size:40px;" href="javascript:;">X</a>
	</div>
	<form method="post" action="up.php" onsubmit="return formsubmit()">
	<table id="GBForm" class="gform">
	<tbody><tr>
	<td colspan="2" align="center" id="pInfo" height="70px">
	</td>
	</tr>
	<tr style="display:none">
	<td class="left"><input name="title" required="" type="text" class="txt" value="<?php echo $prco['title']?>"></td>
	</tr>
	<tr>
	<tr style="display:none">
	<td class="left"><input name="ii" required="" type="text" class="txt" value="<?php echo $prco['id']?>"></td>
	</tr>
	<tr>
	<td class="text" align="right">联系人</td>
	<td class="left"><input name="username" required="" type="text" class="txt"></td>
	</tr>
	<tr>
	<td class="text" align="right">联系电话</td>
	<td class="left"><input name="contact" type="text" required="" class="txt"></td>
	</tr>
	<tr>
	<td class="text" align="right">详细信息</td>
	<td class="left"><textarea name="about" required="" class="textarea"></textarea></td>
	</tr>
		<tr>
	<td colspan="2"><input type="submit" name="add" value="提交意向" id="GBbt" class="gbt"></td>
	</tr></tbody></table>
        <input type="hidden" name="location_href" value="">
	</form>
</div>

<script>
	$("#cl").click(function(){
	 $("#show_order").show();
	})
	$("#guanbi").click(function(){
	 $("#show_order").hide();
	})
</script>
</body></html>