<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 4;
/* 获取 ID 默认 */
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
<link rel="stylesheet" type="text/css" href="css/02800943.css">
<link rel="stylesheet" type="text/css" href="css/28009312800935.css">
<!-- css ending -->

<body>
<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<!-- pic start -->
<?php $arr = getzlrs('ban_co' , 2); ?>
<div id="layout_1589528697277" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_01_1589528697282" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
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

<!-- case-tiele start -->
<style>
#image_style_12_1_1589612082109 ul li {
    width: 10%;
}
</style>
<?php $arr = getlmrss('cases_lm' , 0 , false); ?>
<div id="layout_1589612082104" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_12_1_1589612082109" class="view style_12_1 image  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="image" class="view_contents">
				<div class="imgStyle_12">
					<ul class="imgTextUl">
					<?php foreach ($arr as $key => $value): ?>
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
<!-- case-tiele ending -->

<!-- cases-list start -->
<?php
$sq = '';
if ($tagId_lm) {
	$sq .= 'AND `lm` = "'.$tagId_lm.'"';
}else{
	$sq .= '';
}
$sql = "SELECT `id` , `title".$cong['lang']."`, `link_url` , `z_body".$cong['lang']."` , `img_sl` , `wtime`  FROM ".table('cases_co')." WHERE 1 = 1 ".$sq." AND `pass` = 1 order by px desc , id asc";
$p = new page(array('pagesize'=>6));
$arr = $p->getrss($db,$sql);
?>
<div id="layout_1578470160105" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 729px;">
	<div class="view_contents">
		<div id="newsList_style_04_1589459807482" class="view style_04 newsList  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="newsList" class="view_contents">
				<div class="boxNewsListStyle_4 newsList_style_04_1589459807482 ">
					<ul id="boxNewsList">
					<?php foreach ($arr as $key => $value): ?>
						<li class="sumary_list modSet">
							<div class="newPic imgSet">
								<a href="case_d.php?tagId=<?php echo $value['id'] ?>" target="_self">
									<img class="News_img" src="<?php echo $value['img_sl'] ?>">
								</a>
								<div class="zTm" style="margin-top:75%"></div>
							</div>
							<div class="newCont">
								<div class="newTitle">
									<div class="newName">
										<a class="titleSet newTitle pc" href="case_d.php?tagId=<?php echo $value['id'] ?>" target="_self" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $value['title'] ?></div>
										</a>
										<a class="titleSet newTitle pad" href="case_d.php?tagId=<?php echo $value['id'] ?>" target="_self" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $value['title'] ?></div>
										</a>
										<a class="titleSet newTitle mobile" href="case_d.php?tagId=<?php echo $value['id'] ?>" target="_self" style="-webkit-line-clamp: ;">
											<div class="overhide"><?php echo $value['title'] ?></div>
										</a>
									</div>
								</div>
								<div class="newB"></div>
							</div>
						</li>
					<?php endforeach ?>
					</ul>
					<!-- <form action="" method="get"> -->
						<!-- 页码 start -->
						<div class="page_btn">
						    <?php if ($p->counter >0): ?>
						    	<?php $p->getpagenum1($home ='首页' , $prev = '上一页', $next = '下一页', $last = '尾页'); ?>
								<input type="text" id="page_set" name="page" class="page pageSet"> 页
								<input class="page_submit page pageSet" style="width: 60px;cursor: pointer;" type="submit" value="确定">
						    <?php endif ?>
						</div>
					<!-- </form> -->
					</div>
					<!-- 页码 ending -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- cases-list ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script src="js/ns.js"></script>
<script src="js/02800943.js"></script>
<script src="js/common.js"></script>
<script src="js/case.js"></script>
<!-- js ending -->

</body>
</html>