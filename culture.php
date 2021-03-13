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

<link rel="stylesheet" type="text/css" href="css/28009252800957.css">

<body>
<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<?php $arr_hon = getzlrs('group_co' , 1); ?>
<?php $arr = getlmrss('group_lm' , $arr_hon['lm'] , false , '' , ',`pic_sl_lm`' , 'AND `hot` = 1'); ?>
<div id="layout_1589586901057" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_12_1_1589586901063" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
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

<?php $arr_row = getidlm('group_lm' , 35); ?>
<?php $arr_1 = getzlrss('group_co' , $arr_row['id_lm'] , false , 1 , ',`z_body`'); ?>
<!-- content start -->
<div id="layout_1589513984616" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589513984620" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
			<?php foreach ($arr_1 as $key => $value): ?>
				<div id="text_style_01_1589513984741" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
					<?php echo $value['title'] ?><br>
					</div>
				</div>
				<div id="text_style_01_1589547843701" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
					<?php echo $value['f_body'] ?><br>
					</div>
				</div>
				<div id="text_style_01_1589547873663" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
					<?php echo $value['z_body'] ?>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</div>
</div>

<?php $arr_2 = getzlrss('group_co' , $arr_row['id_lm'] , false , '1,1' , ',`z_body`'); ?>
<div id="layout_1589548640168" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589548640173" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
			<?php foreach ($arr_2 as $key => $value): ?>
				<div id="text_style_01_1589548640301" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
					<?php echo $value['title'] ?><br>
					</div>
				</div>
				<div id="text_style_01_1589548640316" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
					<?php echo $value['f_body'] ?><br>
					</div>
				</div>
				<div id="text_style_01_1589548640323" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
					<?php echo $value['z_body'] ?>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</div>
</div>

<?php $arr_3 = getzlrss('group_co' , $arr_row['id_lm'] , false , '2,1' , ',`z_body`'); ?>
<div id="layout_1589585365902" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589585365909" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents">
			<?php foreach ($arr_3 as $key => $value): ?>
				<div id="text_style_01_1589585366081" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
						<?php echo $value['title'] ?><br>
					</div>
				</div>
				<div id="text_style_01_1589585366092" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
						<?php echo $value['f_body'] ?><br>
					</div>
				</div>
				<div id="text_style_01_1589585366097" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="text" class="view_contents">
						<?php echo $value['z_body'] ?>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<!-- content ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->


<!-- js start -->
<script src="js/common.js"></script>
<script src="js/culture.js"></script>

<!-- js ending -->

</body>
</html>