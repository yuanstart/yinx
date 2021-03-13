<?php 
include 'conn.php';
/* 导航焦点 Num */
$i = 4;
/* 获取 ID */
$tagId = isset($_GET['tagId']) ? html($_GET['tagId']) : '';
/* 查询数据 */
$arr_con = getzlrs('cases_co' , $tagId);

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
<link rel="stylesheet" type="text/css" href="css/28009432800947.css">
<link rel="stylesheet" type="text/css" href="images/smartphoto.min.css">
<script type="text/javascript" src="js/28009432800947.js" charset="utf-8"></script>
<!-- css ending -->

<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->


<!-- case-title start -->
<?php $arr = getlmrss('cases_lm' , 0 , false); ?>
<div id="layout_1589610788613" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="newsKind_style_04_1589610788618" class="view style_04 newsKind  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="newsKind" class="view_contents">
				<div class="newscateStyle_4 modSet swiper-container swiper-container-horizontal">
					<ul class="newscate swiper-wrapper">
					<?php foreach ($arr as $key => $value): ?>
						<li class="sidebar1 swiper-slide swiper-slide-active">
							<a class="oneSet" idnewsg="<?php echo $value['id_lm'] ?>" href="case.php?tagId_lm=<?php echo $value['id_lm'] ?>" target="" <?php echo $value['id_lm'] == $arr_con['lm'] ? 'id="currentSet"' : '' ?> ><?php echo $value['title_lm'] ?>
							</a>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- case-title ending -->


<!-- case-con start -->
<div id="layout_1589532767780" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1000px;">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589532767787" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1000px;">
			<div names="div" class="view_contents">
				<div id="newsDetail_style_02_1589532767928" class="view style_02 newsDetail  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="newsDetail" class="view_contents">
						<div class="LNewsCon modSet detail_2">
							<h2 class="newsBigTit titleSet"><?php echo $arr_con['title'] ?></h2>
							<div class="arrow" style="position:relative;"></div>
								<div id="newsInfo" class="newsText songti contSet" style="overflow:hidden;" data-dvused="0" data-dvflag="1" data-dvsize="0" data-dvstyle="0">
									<p style="line-height: 2em;text-align: center;"><?php echo $arr_con['z_body'] ?></p>
								</div>
						</div>
						<div style="clear:both"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- case-con ending -->


<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->

<script src="js/common.js"></script>
<!-- js ending -->

</body>
</html>
<script>
var mySwiper4 = new Swiper ('#newsKind_style_04_1589610788618 .swiper-container', {
    direction: 'horizontal',
    slidesPerView: 'auto',
    slidesOffsetAfter : 40,
  })
</script>	