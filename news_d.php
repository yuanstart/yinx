<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 6;

$id = $_GET['id'];
/* 点击量 */
setread('news_co' , $id);
$neirong = getcors('news_co',"$id");
$time = $neirong['wtime'];
$lms = $neirong['lm'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0079)news_d.html?newsid=2399611&_t=1589954436 -->
<html>
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/28009292800945.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/28009292800945.css">
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
					<div id="layout_1589531270825" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="margin-top: 110px;">
				<div class="view_contents">
								<div id="newsKind_style_04_1589531270834" class="view style_04 newsKind  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="newsKind" class="view_contents">
					<script src="ns.js"></script>
					<div class="newscateStyle_4 modSet swiper-container swiper-container-horizontal">
	<ul class="newscate swiper-wrapper">
	<?php
		$lm = getlmrss('news_lm','1',false);
		foreach ($lm as $klm => $vlm) {
	 ?>
			<li class="sidebar1 swiper-slide swiper-slide-active">
				<a class="oneSet" idnewsg="310627" href="news.php?lm=<?php echo $vlm['id_lm']?>" target="" id="currentSet"><?php echo $vlm['title_lm']?></a>
			</li>
	<?php }?>
	</ul>
</div>
<script>
var mySwiper4 = new Swiper ('#newsKind_style_04_1589531270834 .swiper-container', {
    direction: 'horizontal',
    slidesPerView: 'auto',
    slidesOffsetAfter : 40,
  })
</script>	<script type="text/javascript">
		$(function () {
			var newgid = getQueryString('gid');
            newgid = newgid ? newgid : 310627;
            $("#newsKind_style_04_1589531270834 .sidebar1 .oneSet").each(function () {
				var IDNewsg = $(this).attr('IDNewsg');
				if (IDNewsg == newgid) {
				    $(this).attr('id','currentSet');
				}
            })
        })
        function getQueryString(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return decodeURI(r[2]);
            return null;
        }
	</script>
				</div>
			</div>
						</div>
			</div>
					<div id="layout_1578468457337" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1157px;">
				<div class="view_contents">
								<div id="div_a_includeBlock_1578468457353" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1127px;">
				<div names="div" class="view_contents">
								<div id="newsDetail_style_02_1578468457564" class="view style_02 newsDetail  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="newsDetail" class="view_contents">
<link rel="stylesheet" type="text/css" href="images/smartphoto.min.css">
<script src="js/jquery-smartphoto.js"></script>
<style>
.LNewsCon { width: 100%; float: left; overflow: hidden;}
.LNewsCon img{max-width: 100%;}
.LNewsCon .smallC { text-align: center;}
.LNewsCon .smallC font { text-align: center; color: #999; padding: 0 15px;}
.LNewsCon .abstract { width: 100%; position: relative; border: 1px solid #e1e1e7; margin: 30px auto; overflow: hidden; box-sizing:border-box; padding: 18px; border-left: 4px solid #e1e1e7;}
.LNewsCon .newsMoreA { width: 90%; height: 50px; margin: 30px auto; border: 1px solid #efefef; box-sizing:border-box;}
.LNewsCon .newsText{padding: 10px; height: auto !important; box-sizing: border-box;}
.LNewsCon .songti { font-family: Verdana, Tahoma, 宋体; font-size: 12px;}
.backNews { text-align: left; height: 50px; line-height: 50px; padding-left: 20px; width: 45%; float: left; word-break: keep-all; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 12px; color: #999;}
.newsMoreA a { font-size: 12px; color: #999;}
.nextNews { text-align: right; height: 50px; line-height: 50px; padding-right: 20px; width: 45%; float: right; word-break: keep-all; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 12px; color: #999;}

/*测试*/
:root{--ck-highlight-marker-yellow:#fdfd77;--ck-highlight-marker-green:#63f963;--ck-highlight-marker-pink:#fc7999;--ck-highlight-marker-blue:#72cdfd;--ck-highlight-pen-red:#e91313;--ck-highlight-pen-green:#180}.marker-yellow{background-color:var(--ck-highlight-marker-yellow)}.marker-green{background-color:var(--ck-highlight-marker-green)}.marker-pink{background-color:var(--ck-highlight-marker-pink)}.marker-blue{background-color:var(--ck-highlight-marker-blue)}.pen-red{color:var(--ck-highlight-pen-red)}.pen-green,.pen-red{background-color:transparent}.pen-green{color:var(--ck-highlight-pen-green)}
.LNewsCon .newsText{font-size:14px;}
@media only screen and (max-width: 640px) {
    .LNewsCon .newsText iframe,.LNewsCon .newsText img,.LNewsCon .newsText video,.LNewsCon .newsText table{width:100% !important;height:auto !important}
    .LNewsCon .newsText ul,.LNewsCon .newsText ol {margin-left: 1.333em}
    .LNewsCon .newsText h2 {font-size: 1.5em}
    .LNewsCon .newsText h1 {font-size: 1.9em}
	.LNewsCon .newsText table{display: block;overflow: auto;}
}
@media only screen and (max-width: 1200px) {
	.LNewsCon .newsText table{width:calc(95vw - 40px)}
}
.LNewsCon .newsText p,.LNewsCon .newsText ul,.LNewsCon .newsText ol,.LNewsCon .newsText blockquote,.LNewsCon .newsText pre {font-size: 1.2em;line-height: 1.6em;padding-top: 0.2em;margin-bottom: 0.8em}
.LNewsCon .newsText h1 {font-size: 2.36em;line-height: 1.33em;padding-top: 1em;margin-bottom: 1.67em}
.LNewsCon .newsText h1+dl {margin-top: 1em}
.LNewsCon .newsText dd {margin-bottom: 1em}
.LNewsCon .newsText h1:first-of-type {width: 100%;padding-top: .5em;margin-bottom: 1.17em}
.LNewsCon .newsText h1:first-of-type+h2 {padding-top: 0}
.LNewsCon .newsText h2 {font-size: 1.68em;line-height: 1.68em;padding-top: 0.8em;margin-bottom: 0.4em;padding-bottom: .2em;font-weight: 400}
.LNewsCon .newsText h2:first-of-type {clear: both}
.LNewsCon .newsText h3 {font-size: 1.36em;line-height: 1.5em;padding-top: 0.8em;margin-bottom: 0.2em;font-weight: 400}
.LNewsCon .newsText h4 {font-size: 1.2em;line-height: 1.4em;padding-top: 0.8em;margin-bottom: 0.2em;margin-bottom: 0.2em;padding-top: 0.8em;font-weight: 400}
.LNewsCon .newsText h5 {font-size: 1em;line-height: 1.6em;padding-top: 0.2em;margin-bottom: 0.8em;font-weight: 400}
.LNewsCon .newsText .info-box>h2,.LNewsCon .newsText .info-box>h3,.LNewsCon .newsText .info-box>h4 {padding-top: 0}
.LNewsCon .newsText strong,.LNewsCon .newsText b {font-weight: 600}
.LNewsCon .newsText i,.LNewsCon .newsText em {font-style: italic}
.LNewsCon .newsText pre {overflow: hidden}
.LNewsCon .newsText code {font-family: "SF Mono",menlo,monaco,"Roboto Mono",Consolas,"Lucida Console",monospace;font-size: .866666em;padding: 1.333em}
.LNewsCon .newsText code:not(.hljs) {background: rgba(202,205,207,0.3);padding: .1em .25em;border-radius: 3px}
.LNewsCon .newsText code:not(.hljs):after {letter-spacing: -1em;content: "\00a0"}
.LNewsCon .newsText code:not(.hljs):before {letter-spacing: -1em;content: "\00a0"}
.LNewsCon .newsText a code:not(.hljs) {color: #1b3af2}
.LNewsCon .newsText .hljs {background: #2b2c26}
.LNewsCon .newsText .hljs a {color: #fff}
.LNewsCon .newsText .hljs code {background: none;padding: 0;font-size: 1em}
.LNewsCon .newsText blockquote {border-left: 1px solid #bdbdbd;padding-left: 10px;padding-top: 0;font-style: italic}
.LNewsCon .newsText kbd {display: inline-block;background: #f5f5f5;border: solid 1px #b5c6d2;border-bottom-color: #97afbf;box-shadow: inset 0 -1px 0 #97afbf;font-family: "SF Mono",menlo,monaco,"Roboto Mono",Consolas,"Lucida Console",monospace;font-size: .8em;padding: .25em .5em;line-height: 1em;vertical-align: middle;border-radius: 3px}
.LNewsCon .newsText ul,.LNewsCon .newsText ol {margin-left: 2.666em;margin-bottom: 0.8em}
.LNewsCon .newsText ul ul,.LNewsCon .newsText ul ol,.LNewsCon .newsText ol ul,.LNewsCon .newsText ol ol {padding-top: 0;margin-bottom: 0}
.LNewsCon .newsText ul ul:last-of-type,.LNewsCon .newsText ul ol:last-of-type,.LNewsCon .newsText ol ul:last-of-type,.LNewsCon .newsText ol ol:last-of-type {margin-bottom: .33333em}
.LNewsCon .newsText ul li:last-of-type,.LNewsCon .newsText ol li:last-of-type {margin-bottom: 0}
.LNewsCon .newsText p img {margin: 0 auto;box-sizing: content-box}
.LNewsCon .newsText iframe:not(.cke_wysiwyg_frame) {display: block;margin: 0 auto}
.LNewsCon .newsText ol {list-style-type: decimal}
.LNewsCon .newsText table {margin: 0;border-collapse: collapse;max-width:1180px;}
.LNewsCon .newsText table code {word-break: break-word;white-space: normal}
.LNewsCon .newsText table[align=left]{margin: 0 auto 0 0;}
.LNewsCon .newsText table[align=center]{margin: 0 auto;}
.LNewsCon .newsText table[align=right]{margin: 0 0 0 auto;}
.LNewsCon .newsText td,.LNewsCon .newsText th {border: 1px solid #e9e9e9;min-width: 2em;padding: .4em !important;}
.LNewsCon .newsText th {font-weight: bold;background: #fafafa;}
.LNewsCon .newsText abbr {position: relative;cursor: default;text-decoration: none;border-bottom: 1px dotted #000}
.LNewsCon .newsText abbr::before {content: attr(title);display: none;position: absolute;bottom: calc( -100% - 15px);left: 50%;transform: translateX(-50%);padding: 3px 5px;font-size: 0.9em;font-weight: bold;border-radius: 3px;color: #fff;background: black;white-space: nowrap}
.LNewsCon .newsText abbr::after {content: '';display: none;position: absolute;bottom: -5px;left: 50%;transform: translateX(-50%);width: 0;height: 0;border-style: solid;border-width: 0 5px 5px 5px;border-color: transparent transparent #000 transparent;}
.LNewsCon .newsText abbr:hover::before,.LNewsCon .newsText abbr:hover::after {display: block}
.LNewsCon .newsText ol{display: block;list-style-type: decimal;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;padding-inline-start: 40px;}
.LNewsCon .newsText ol li{list-style: decimal;font-size:1em;}
.LNewsCon .newsText ul{display: block;list-style-type: disc;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;padding-inline-start: 40px;}
.LNewsCon .newsText ul li{list-style: disc;font-size:1em;}
.LNewsCon .newsText a{color: -webkit-link;cursor: pointer;text-decoration: underline;}
.LNewsCon .newsText sub{vertical-align: sub;font-size: smaller;}
.LNewsCon .newsText sup{vertical-align: super;font-size: smaller;}
.LNewsCon .newsText .media{margin: 10px auto;max-width: 100%;}

</style>
<script language="javascript" src="images/divipage.js"></script><div class="LNewsCon modSet detail_2">

	<h2 class="newsBigTit titleSet"><?php echo $neirong['title']?></h2>

	<div class="arrow" style="position:relative;">


		<label class="newsInfoSet">时间 ：<?php echo date('Y-m-d',"$time")?></label>


		<label class="newsInfoSet">作者 ：<?php echo $neirong['apname']?></label>


		<label class="newsInfoSet">来源：<?php echo $neirong['link_url']?></label>




		<label class="pd newsInfoSet">浏览 ：<?php echo $neirong['keyword']?></label>



	</div>

   <div class="abstract songti detailSet">
		<?php echo $neirong['f_body']?>
   </div>





   <div id="newsInfo" class="newsText songti contSet" style="overflow:hidden;" data-dvused="0" data-dvflag="1" data-dvsize="0" data-dvstyle="0">
		   <?php echo $neirong['z_body']?>
   </div>


   <div class="newsMoreA page">
	<?php
	//下一个
	$sql = "select * from news_co where lm=$lms and id>$id limit 1 ";
	$aru = getRow($sql);
	$titles = $aru['title'];
	$prid = $aru['id'];
	if(empty($titles)){
		$iid = "无";
		$hre = "";
	}else{
		$iid = "$titles";
		$hre = "news_d.php?id=$prid";
	}
	//上一个
	$sql1 = "select * from news_co where lm=$lms and id<$id order by id desc limit 1  ";
	$aru1 = getRow($sql1);
	$titles1 = $aru1['title'];
	$prid1 = $aru1['id'];
	if(empty($titles1)){
		$iid1 = "无";
		$hre1 = "";
	}else{
		$iid1 = "$titles1";
		$hre1 = "news_d.php?id=$prid1";
	}
	?>

	  <p><span>上一篇</span>：<a href="<?php echo $hre1?>" class="s backnewsSet"><?php echo $iid1 ?></a></p>
		<p><span>下一篇</span>：<a href="<?php echo $hre?>" class="x nextnewsSet"><?php echo $iid ?></a></p>
   </div>

</div>
<div style="clear:both"></div><script>
			window.resizeTimeoutnewsDetail_style_02_1578468457564=setTimeout(function(){
				diyAutoHeight($('#newsDetail_style_02_1578468457564'));
				window.resizeTimeoutnewsDetail_style_02_1578468457564=null;
			},350);</script><script>
$(function(){
	var num = parseInt($('#'+"newsDetail_style_02_1578468457564").parent().parent().css("height"))-270+parseInt($('#'+"newsDetail_style_02_1578468457564").css("height"));
	$('#'+"newsDetail_style_02_1578468457564").parent().parent().css("height",num+'px');
});
// 点击放大图片
if($("body").width()<=640){
	$("#newsDetail_style_02_1578468457564 .newsText").find("img").each(function(){
		var num = $(this).parents('a').index();
		if(num>=0){
			var url = $(this).parents('a').attr('href');
			if(url){return true;}
		}
		$(this).wrap("<a class='js-smart'></a>");  //详情
	});
	$("#newsDetail_style_02_1578468457564 .newsDetailsImg").wrap("<a class='js-smart'></a>");  //缩略图
	$("#newsDetail_style_02_1578468457564 .js-smart").each(function(){
		$(this).attr('href',$(this).find("img").attr('src'));
	})
	$("#newsDetail_style_02_1578468457564 .js-smart").smartPhoto();
}
</script>
<script>
$(function(){
	$('title').html('<?php echo $neirong['title']?>');
	    $('meta[name=KeyWords]').attr('content','<?php echo $neirong['title']?>');
            $('meta[name=description]').attr('content','<?php echo $neirong['f_body']?>');
    });
</script>

<style>
        	.LNewsCon .newsBigTit { font-size: 36px; color: #333333; margin-bottom: 20px; text-align: center;font-weight:;}
	.smartphoto-list{width:100%!important;height: 100%!important;}
	.smartphoto-img-wrap{width: 100%!important;transform: translateY(-50%)!important;top: 50%;position: relative;}
	.smartphoto-img-wrap>img{width:100%!important;height: auto!important;}

</style>


</div>
			</div>
						</div>
			</div>
						</div>
			</div>
					<div id="layout_1506318122695" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="div_a_includeBlock_1578469285908" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="div" class="view_contents">
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
</body></html>