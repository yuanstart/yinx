<?php	
include 'conn.php';
/* 导航焦点 Num */
$i = 2;

/* 表单 */
if (!empty($_POST)) {
	/* 接收数据 */
	$name = isset($_POST['name']) ? html(strtolower(trim($_POST['name']))) : '';
	$mobile = isset($_POST['mobile']) ? html(strtolower(trim($_POST['mobile']))) : '';
	$email = isset($_POST['email']) ? html(strtolower(trim($_POST['email']))) : '';
	$safecode = isset($_POST['verification_code']) ? html(strtolower(trim($_POST['verification_code']))) : '';
	$message = isset($_POST['message']) ? html(strtolower(trim($_POST['message']))) : '';
	$time = time();
	$ip =  getip();
	/* 判断验证码 */
	if($safecode != $_SESSION['safecode']){
		msg('验证码不正确!');
	}
	/* 插入数据 */
	$sql = "INSERT INTO ".table('book')." (`rename`,`phone`,`z_body`,`wtime`,`ip`) VALUES ('$name','$mobile','$message','$time','$ip')";
	$db->execute($sql);
	msg('添加成功','location="contact.php"');
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->

<!-- css start -->
<link rel="stylesheet" type="text/css" href="css/28009252800939.css">
<link rel="stylesheet" type="text/css" href="http://api.map.baidu.com/res/11/bmap.css">
<!-- css ending -->

<body>

<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->

<?php $arr = getzlrs('ban_co' , 4); ?>
<div id="layout_1589530672244" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_01_1589530672250" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
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

<?php $arr = getplrss('' , 5 , 'pl_info' , 24); ?>
<div id="layout_1578481646615" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="image_style_12_1_1578481646631" class="view style_12_1 image  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
			<div names="image" class="view_contents">
				<div class="imgStyle_12">
					<ul class="imgTextUl">
					<?php foreach ($arr as $key => $value): ?>
						<li class="imgTextLi modSet">
							<a href="javascript:;" style="display: block;">
							<div class="imgTBoxArea">
								<div class="image-box">
									<div class="imgTBox">
										<img class="picSet picFit" src="<?php echo getimgj($value['img_sl'] , '') ?>">
									</div>
								</div>
								<div class="ratio" style="margin-top:100%;"></div>
							</div>
							</a>
							<div class="cont">
								<div class="name titProSet"><?php echo $value['title'] ?></div>
								<div class="subName defProSet"><?php echo $value['z_body'] ?></div>
							</div>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="layout_1578482225599" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="liuyanban_style_07_1578482242388" class="view style_08 liuyanban  none wow fadeInUp lockHeightView animated" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-iteration-count: 1; animation-name: fadeInUp;">
			<div names="liuyanban" class="view_contents">
				<div id="gform" class="gformStyle_8 modSet">
					<form method="post" name="form1" action="?" onsubmit="return CheckForm(this);">
						<div class="gformS">
							<div class="form_main">

								<div class="gformList">
									<h3 class="titleSet">请填写您的姓名</h3>
									<input type="text" name="name" id="wordsname" class="gfInput gf_name userInfoSet">
								</div>

								<div class="gformList" style="display:block">
									<h3 class="titleSet">请填写您的手机号</h3>
									<input type="text" name="mobile" class="gfInput gf_tel userInfoSet" check="^1[0-9]{10}$" warning="手机号码有误">
								</div>

								<div class="gformList" style="display:block">
									<h3 class="titleSet">请填写您的邮箱</h3>
									<input type="text" name="email" class="gfInput gf_email userInfoSet" check="^\s*$|^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$" warning="邮箱地址不对">
								</div>

								<div class="gformList">
									<h3 class="titleSet">请填写5位验证码</h3>
									<input type="text" name="verification_code" autocomplete="off" class="gfInput gf_code userInfoSet" id="code" style="background-image:url(<?php echo $cong['path']?>include/code.php)">
									<a href="javaScript:#" onclick="this.previousElementSibling.style.backgroundImage='url(<?php echo $cong['path']?>include/code.php?t='+Math.random()+')';return false;" class="changeCode"></a>
								</div>
							</div>
							<div class="gformList">
								<h3 class="titleSet">请填写留言信息</h3>
								<textarea name="message" cols="50" rows="5" id="message" class="gf_message messageBoardSet"></textarea>
							</div>
							<!-- 按钮 -->
							<div class="gformList" style="display:block; text-align: center;">
								<input type="submit" name="add" value="提交留言" id="GBbt" class="gbt btnaSet">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="layout_1578482438688" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents"></div>
</div>

<!-- map start -->
<div id="layout_1589530701338" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
	<div class="view_contents">
		<div id="map_style_01_1589530701340" class="view style_01 map  none" data-wow-duration="1.5s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
			<div names="map" class="view_contents">
				<!-- 百度地图容器 start-->
    			<div style="width:100%;height:100%;" id="map"></div>
    			<input type="hidden" id="map_zuobiao" value="<?php echo $cong['zuobiao'] ?>">
    			<input type="hidden" id="map_title" value="<?php echo $cong['title'] ?>">
    			<input type="hidden" id="map_f_body" value="<?php echo $cong['f_body'] ?>">
				<!-- 百度地图容器 ending-->
			</div>
		</div>
	</div>
</div>
<!-- map ending -->

<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

<script src="js/28009252800939.js"></script>
<script src="js/common.js"></script>
<script src="js/contact.js"></script>
<script src="js/v9check.js"></script>
<!-- js ending -->

</body>
</html>
