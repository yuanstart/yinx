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
<link rel="stylesheet" type="text/css" href="css/28009252800959.css">
<!-- css ending -->

<body>

<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->


<?php $arr_hon = getzlrs('group_co' , 1); ?>
<?php $arr = getlmrss('group_lm' , $arr_hon['lm'] , false , '' , ',`pic_sl_lm`' , 'AND `hot` = 1'); ?>
<div id="layout_1589549107732" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" >
	<div class="view_contents">
		<div id="image_style_12_1_1589549107734" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
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

<?php $arr = getplrss('' , 3 , 'pl_image' , 24); ?>
<div id="layout_1589513984616" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 858px;">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589513984620" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 828px;">
			<div names="div" class="view_contents">
				<div id="image_style_11_1589545967144" class="view style_11 image  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="image" class="view_contents">
						<div class="imgStyle_11">
							<ul id="content_1589545967144">
							<?php foreach ($arr as $key => $value): ?>
								<li class="imgItems modSet">
									<a href="javascript:;">
										<img class="noimgLoadLate" src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>" style="display: none; width: 100%; height: auto;">
										<div style="background:url(<?php echo getimgj($value['img_sl'] , '') ?>);height: calc(100% - 30px);" class="theimgdiv"></div>
									</a>
									<div class="ratio" style="margin-top:133%;"></div>
									<a href="javascript:;"> <p class="theimgtext titSet"><?php echo $value['title'] ?></p></a>
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

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script src="js/28009252800959.js"></script>
<script src="js/common.js"></script>
<script src="js/honor.js"></script>
<!-- js ending -->

</body>
</html>