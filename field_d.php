<?php 
include 'conn.php';

/* 获取 ID */
$tagId = isset($_GET['tagId']) ? html($_GET['tagId']) : '';
/* 查询数据 */
$arr_con = getzlrs('busin_co' , $tagId);

if (!$tagId || $tagId < 0) {
	msg($lang['gl']['par']);
}
/* 数据不能为空 */
if (!$arr_con || empty($arr_con)) {
	msg($lang['gl']['par']);
}

 ?>
<!DOCTYPE html>
<html lang="en">

<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->

<body>
	
<!-- css start -->
<link rel="stylesheet" type="text/css" href="css/28009412800949.css">
<link rel="stylesheet" type="text/css" href="images/smartphoto.min.css">
<!-- css ending -->

<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<!-- bus - title start -->
<?php $arr = getlmrss('busin_lm' , 0 , false); ?>
<div id="layout_1578476731707" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="newsKind_style_04_1589541715282" class="view style_04 newsKind  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="newsKind" class="view_contents">
				<div class="newscateStyle_4 modSet swiper-container swiper-container-horizontal">
					<ul class="newscate swiper-wrapper">
					<?php foreach ($arr as $key => $value): ?>
						<li class="sidebar1 swiper-slide swiper-slide-active">
							<a class="oneSet" idnewsg="<?php echo $value['id_lm'] ?>" href="field.php?tagId_lm=<?php echo $value['id_lm'] ?>" target="" <?php echo $value['id_lm'] == $arr_con['lm'] ? 'id="currentSet"' : '' ?> ><?php echo $value['title_lm'] ?>
							</a>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bus - title ending -->

<!-- content start -->
<div id="layout_1578627782536" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 917px;">
	<div class="view_contents">
		<div id="div_a_includeBlock_1578627792700" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 887px;">
			<div names="div" class="view_contents">
				<div id="newsDetail_style_02_1578627792803" class="view style_02 newsDetail  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="newsDetail" class="view_contents">
						<div class="LNewsCon modSet detail_2">
							<h2 class="newsBigTit titleSet"><?php echo $arr_con['title'] ?></h2>
							<div class="arrow" style="position:relative;"></div>
							   <div id="newsInfo" class="newsText songti contSet" style="overflow:hidden;" data-dvused="0" data-dvflag="1" data-dvsize="0" data-dvstyle="0">
									<p style="text-align: center;">
										<img src="<?php echo getimgj($arr_con['img_sl'] , 'd') ?>">
									</p>
									<p><?php echo $arr_con['z_body'] ?></p>
							   </div>
							<div style="clear:both"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- content ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script src="js/28009412800949.js"></script>
<script src="js/transform.js"></script>
<script src="js/ns.js"></script>
<script src="js/jquery-smartphoto.js"></script>
<script src="js/divipage.js"></script>
<script src="js/common.js"></script>
<!-- js ending -->

</body>
</html>
<script>
var mySwiper4 = new Swiper ('#newsKind_style_04_1589541715282 .swiper-container', {
    direction: 'horizontal',
    slidesPerView: 'auto',
    slidesOffsetAfter : 40,
  })

// 点击放大图片
if($("body").width()<=640){
	$("#newsDetail_style_02_1578627792803 .newsText").find("img").each(function(){
		var num = $(this).parents('a').index();
		if(num>=0){
			var url = $(this).parents('a').attr('href');
			if(url){return true;}
		}
		$(this).wrap("<a class='js-smart'></a>");  //详情
	});
	$("#newsDetail_style_02_1578627792803 .newsDetailsImg").wrap("<a class='js-smart'></a>");  //缩略图
	$("#newsDetail_style_02_1578627792803 .js-smart").each(function(){
		$(this).attr('href',$(this).find("img").attr('src'));
	})
	$("#newsDetail_style_02_1578627792803 .js-smart").smartPhoto();
}
</script>