<?php	
include 'conn.php';
/* 导航焦点 Num */
$i = 3;
/* 获取 ID 默认 */
$arr = getlmrss('busin_lm' , 0 , false);
$tagId_lm = isset($_GET['tagId_lm']) ? html($_GET['tagId_lm']) : '';

if ($tagId_lm < 0) {
	msg($lang['gl']['par']);
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->

<!-- css start -->
<link rel="stylesheet" type="text/css" href="css/02800941.css">
<!-- css ending -->

<body>
<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->
<div class="" style="clear: both;"></div>

<!-- pic start -->
<?php $arr = getzlrs('ban_co' , 1); ?>
<div id="layout_1589528417253" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_01_1589528417259" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="image" class="view_contents">
				<div class="imgStyle CompatibleImg picSet">
					<a href="javascript:;" target="">
						<img class="link-type-" src="<?php echo $arr['img_sl'] ?>" title="<?php echo $arr['title'] ?>" id="imageModeShow">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pic ending -->

<!-- Busine start -->
<?php $arr = getlmrss('busin_lm' , 0 , false); ?>
<div id="layout_1589536435591" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="newsKind_style_04_1589536435593" class="view style_04 newsKind  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
			<div names="newsKind" class="view_contents">
				<!-- bus - title start -->
				<div class="newscateStyle_4 modSet swiper-container swiper-container-horizontal">
					<ul class="newscate swiper-wrapper">
					<?php foreach ($arr as $key => $value): ?>
						<li class="sidebar1 swiper-slide swiper-slide-active">
							<a class="oneSet" idnewsg="<?php echo $value['id_lm'] ?>" href="field.php?tagId_lm=<?php echo $value['id_lm'] ?>" target="" <?php echo $value['id_lm'] == $tagId_lm ? 'id="currentSet"' : '' ?> ><?php echo $value['title_lm'] ?></a>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
				<!-- bus - title ending -->
			</div>
		</div>
	</div>
</div>

<!-- Busine_list start -->
<?php $arr = getzlrss('busin_co' , $tagId_lm , true); ?>
<div id="layout_1589536416754" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 2950px;">
	<div class="view_contents">
		<div id="newsList_style_04_1589536416759" class="view style_02 newsList  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="newsList" class="view_contents">
				<div class="boxNewsListStyle_2">
					<ul id="boxNewsList">、
					<?php foreach ($arr as $ke => $val): ?>
						<li class="sumary_list modSet">
							<a href='field_d.php?tagId=<?php echo $val['id'] ?>' target="_blank">
								<div class="newPic imgSet">
									<img class="News_img" src="<?php echo $val['img_sl'] ?>" alt="<?php echo $val['title'] ?>">
									<div class="zTm" style="margin-top:67%"></div>
								</div>
							</a>
							<div class="newCont">
								<div class="newTitle ">
									<div class="newName">
										<a class="titleSet newTitle pc" href="field_d.php?tagId=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $val['title'] ?></div>
										</a>
										<a class="titleSet newTitle pad" href="field_d.php?tagId=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $val['title'] ?></div>
										</a>
										<a class="titleSet newTitle mobile" href="field_d.php?tagId=<?php echo $val['id'] ?>" target="_blank" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $val['title'] ?></div>
										</a>
									</div>
									<div class="newB"></div>
								</div>
								<a href="field_d.php?tagId=<?php echo $val['id'] ?>" target="_blank">
									<div class="newDetail detailSet pc" style="-webkit-line-clamp: ;">
										<div class="overhide"><?php echo getstr($val['f_body'] , 0) ?></div>
									</div>

									<div class="newDetail detailSet pad" style="-webkit-line-clamp: ;">
										<div class="overhide"><?php echo getstr($val['f_body'] , 100) ?></div>
									</div>
									<div class="newDetail detailSet mobile" style="-webkit-line-clamp: ;">
										<div class="overhide"><?php echo getstr($val['f_body'] , 100) ?></div>
									</div>
								</a>
								<div class="show_all">
									<a class="btnaSet" href="field_d.php?tagId=<?php echo $val['id'] ?>" target="_blank">查看全文</a>
								</div>
							</div>
							<div class="clear"></div>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!-- Busine_list start -->
<!-- Busine ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<script src="js/ns.js"></script>
<script src="js/field.js"></script>
<script src="js/02800941.js"></script>
<script src="js/common.js"></script>
<!-- js ending -->

</body>
</html>