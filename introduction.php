<?php	
include 'conn.php';
/* 导航焦点 Num */
$i = 2;

?>
<!DOCTYPE html>
<html lang="en">

<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->

<!-- css start -->
<link rel="stylesheet" type="text/css" href="css/28009252800951.css">
<!-- css ending -->

<body>

<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<?php $arr_hon = getzlrs('group_co' , 1); ?>
<?php $arr = getlmrss('group_lm' , $arr_hon['lm'] , false , '' , ',`pic_sl_lm`' , 'AND `hot` = 1'); ?>
<div id="layout_1589549094333" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" >
	<div class="view_contents">
		<div id="image_style_12_1_1589549094339" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="image" class="view_contents">
				<div class="imgStyle_12">
					<ul class="imgTextUl">
					<?php foreach ($arr as $key => $value): ?>
						<li class="imgTextLi modSet">
							<a href="<?php echo $value['url_lm'] ?>" style="display: block;">
							<div class="imgTBoxArea">
								<div class="image-box">
									<div class="imgTBox">
										<img class="picSet picFit" src="<?php echo getimgj($value['pic_sl_lm'] , '') ?>">
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

<!-- int-con start -->
<?php $arr_con = getzlrs('group_co' , 2); ?>
<div id="layout_1589513984616" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1400px;">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589513984620" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
				<div id="text_style_01_1589513984741" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<!-- 内容 -->
					<div names="text" class="view_contents">
						<?php echo $arr_con['z_body'] ?>
					</div>
				</div>
				<!-- 图片 -->
				<div id="image_style_01_1589585684258" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="image" class="view_contents">
						<div class="imgStyle CompatibleImg picSet">
							<a href="javascript:;" target="">
								<img class="link-type-" src="<?php echo getimgj($arr_con['img_sl'] , '') ?>" title="" alt="<?php echo $arr_con['title'] ?>" id="imageModeShow">
							</a>
						</div>
					</div>
				</div>
				<!-- 多图 -->
<?php $arr = getplrss('' , $arr_con['id'] , 'pl_image' , 24); ?>
				<div id="banner_style_04_1589585936771" class="view style_04 banner  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="banner" class="view_contents">
						<div class="bannerStyle_4">
							<div class="imgMove" id="banner_style_04_1589585936771imgMove">
								<div class="subMove">
									<ul id="banner_style_04_1589585936771itemOne">
									<?php foreach ($arr as $key => $value): ?>
										<li class="list_mode picSet">
											<a class="a_mode" href="javascript:;">
												<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
											</a>
										</li>
									<?php endforeach ?>
									</ul>
									<ul id="banner_style_04_1589585936771itemTwo">
									<?php foreach ($arr as $key => $value): ?>
										<li class="list_mode picSet">
											<a class="a_mode" href="javascript:;">
												<img src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
											</a>
										</li>
									<?php endforeach ?>
									</ul>
									<ul id="banner_style_04_1589585936771itemThree">
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
	</div>
</div>
<!-- int-con ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script src="js/28009252800951.js"></script>
<script src="js/introduction.js"></script>
<script src="js/common.js"></script>
<!-- js ending -->

</body>
</html>