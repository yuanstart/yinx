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
<link rel="stylesheet" type="text/css" href="css/28009252800961.css">
<!-- css ending -->

<body>

<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<?php $arr_hon = getzlrs('group_co' , 1); ?>
<?php $arr = getlmrss('group_lm' , $arr_hon['lm'] , false , '' , ',`pic_sl_lm`' , 'AND `hot` = 1'); ?>
<div id="layout_1589549122640" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_12_1_1589549122642" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
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

<?php $arr = getplrss('' , 4 , 'pl_info' , 24); ?>
<div id="layout_1589513984616" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1216px;">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589513984620" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1186px;">
			<div names="div" class="view_contents">
				<div id="image_style_23_1589545717097" class="view style_23 image  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
					<div names="image" class="view_contents">
						<div class="imgStyle_23">
							<ul class="imgTextUl" id="content_1589545717097">
							<?php foreach ($arr as $key => $value): ?>
									
								<li class="imgTextLi">
									<div class="content">
									<?php if (!($key + 1) % 2){ ?>
										<div class="right">
									<?php }else{ ?>
										<div class="left">
									<?php } ?>
											<div class="image-box">
												<a href="javascript:;">
													<div class="imgTBox">
														<img class="imgSet" src="<?php echo getimgj($value['img_sl'] , '') ?>" alt="<?php echo $value['title'] ?>">
													</div>
												</a>
											</div>
											<div class="ratio" style="margin-top:67%;"></div>
										</div>
									<?php if (!($key + 1) % 2){ ?>
										<div class="left">
									<?php }else{ ?>
										<div class="right">
									<?php } ?>
											<div class="name titleSet"><?php echo $value['title'] ?></div>
												<div class="subName detailSet"><?php echo $value['z_body'] ?></div>
										</div>
									</div>
									<?php if (!($key + 1) % 2){ ?>
										<div class="line-box">
											<div class="circle-big lineshapeSet">
												<div class="circle lineshapeSet"></div>
											</div>
											<div class="short-line-box lineshapeSet"></div>
										</div>
									<?php }else{ ?>
										<div class="line-box">
											<div class="short-line-box lineshapeSet"></div>
											<div class="circle-big lineshapeSet">
												<div class="circle lineshapeSet"></div>
											</div>
										</div>
									<?php } ?>
								</li>
							<?php endforeach ?>
								<div class="middle-line lineshapeSet">
								</div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 灰色横条 start -->
<div id="layout_1589545838151" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 60px;">
	<div class="view_contents">
		<div id="div_a_includeBlock_1589545884949" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="div" class="view_contents"></div>
		</div>
	</div>
</div>
<div id="layout_1578400875213" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents"></div>
</div>
<!-- 灰色横条 ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script src="js/28009252800961.js"></script>
<script src="js/common.js"></script>
<!-- js ending -->

</body>
</html>