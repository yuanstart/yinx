<?php
include 'conn.php';
/* 导航焦点 Num */
$i = 6;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- head start -->
<?php include "head.php"; ?>
<!-- head ending -->
<script type="text/javascript" src="js/02800929.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/02800929.css">
<link rel="stylesheet" type="text/css" href="css/02800927.css">
<link rel="stylesheet" type="text/css" href="css/28009312800935.css">


<!-- top start -->
<?php include "top.php"; ?>
<!-- top ending -->
					<div id="layout_1579509069553" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="image_style_01_1589523075730" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div names="image" class="view_contents">
					<div class="imgStyle CompatibleImg picSet">
		<a href="javascript:;" target="">
			<img class="link-type-" src="images/1589523088780c655036abb8d3e1e.jpg" title="" alt="描述" id="imageModeShow">
		</a>
</div>
<!-- 新加的js  -->
				</div>
			</div>
						</div>
			</div>


<style>
#image_style_12_1_1589612082109 ul li {
    width: 10%;
}
</style>
<?php $arr = getlmrss('news_lm' , 1 , false); ?>
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

			
<script>
var mySwiper4 = new Swiper ('#newsKind_style_04_1589531054053 .swiper-container', {
    direction: 'horizontal',
    slidesPerView: 'auto',
    slidesOffsetAfter : 40,
  })
</script>	<script type="text/javascript">
		$(function () {
			var newgid = getQueryString('gid');
            newgid = newgid ? newgid : 310627;
            $("#newsKind_style_04_1589531054053 .sidebar1 .oneSet").each(function () {
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
					<div id="layout_1578466190563" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
				<div class="view_contents">
								<div id="div_a_includeBlock_1578466168969" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1" style="height: 1253px;">
				<div names="div" class="view_contents">
								<div id="newsList_style_23_1578466210917" class="view style_23 newsList  none lockHeightView" data-wow-duration="1s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">
				<div names="newsList" class="view_contents"><!--新闻列表区域-->
<!--pageSet pagecurSet-->
<ul class="newslist_style_23">
<?php
if(empty($_GET['lm'])){
$sql = "SELECT `id` , `title".$cong['lang']."`, `link_url` , `z_body".$cong['lang']."` , `img_sl` , `wtime` , `keyword` , `f_body`  FROM ".table('news_co')." WHERE 1 = 1 AND `pass` = 1 order by px desc , id desc";
$p = new page(array('pagesize'=>4));
$arr = $p->getrss($db,$sql);
}else{
$id_lm = $_GET['lm'];
$sql = "SELECT `id` , `title".$cong['lang']."`, `link_url` , `z_body".$cong['lang']."` , `img_sl` , `wtime` , `keyword` , `f_body`  FROM ".table('news_co')." WHERE 1 = 1 AND `lm` = $id_lm AND  `pass` = 1 order by px desc , id desc";
$p = new page(array('pagesize'=>4));
$arr = $p->getrss($db,$sql);
}
foreach ($arr as $kp => $vp):
$time = $vp['wtime'];
?>
	<li class="modSet">
		<div class="newsDate">
				<span class="newsTime timesSet"><span class="nDate"><?php echo date('Y-m-d',"$time")?></span> </span>

			<div class="newPic imgSet">
				<a href="news_d.php?id=<?php echo $vp['id']?>" target="_blank"><img class="News_img " src="<?php echo $vp['img_sl']?>" alt="<?php echo $vp['title']?>"></a>
				<div class="zTm" style="margin-top:67%"></div>
			</div>
		</div>
		<div class="newsCont">
			<div class="newsTitle titleSet">
					<a class="newTitle pc" href="news_d.php?id=<?php echo $vp['id']?>" target="_blank" style="-webkit-line-clamp: ;"><?php echo $vp['title']?></a>
					<a class="newTitle pad" href="news_d.php?id=<?php echo $vp['id']?>" target="_blank" style="-webkit-line-clamp: ;"><?php echo $vp['title']?></a>
					<a class="newTitle mobile" href="news_d.php?id=<?php echo $vp['id']?>" target="_blank" style="-webkit-line-clamp: ;"><?php echo $vp['title']?></a>
					<span class="titleHr btnaSet"></span>
			</div>
			<p class="nsDate ydSet">阅读量：<?php echo $vp['keyword']?></p>

			<div class="newsBrief">
					<div class="newDetail detailSet pc" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vp['f_body']?></div></div>
					<div class="newDetail detailSet pad" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vp['f_body']?></div></div>
					<div class="newDetail detailSet mobile" style="-webkit-line-clamp: ;"><div class="overhide"><?php echo $vp['f_body']?></div></div>
		    </div>
             <div class="show_all">

                 <a class="btnaSet" href="news_d.php?id=<?php echo $vp['id']?>" target="_blank">查看全文</a>

             </div>

		</div>
	</li>
<?php endforeach ?>

		<div class="page_btn">
						    <?php if ($p->counter >0): ?>
						    	<?php $p->getpagenum1($home ='首页' , $prev = '上一页', $next = '下一页', $last = '尾页'); ?>
								<input type="text" id="page_set" name="page" class="page pageSet"> 页
								<input class="page_submit page pageSet" style="width: 60px;cursor: pointer;" type="submit" value="确定">
						    <?php endif ?>
						</div>

</ul>


<style>
	#newsList_style_23_1578466210917 .newDetail.pc {display:block;}
	#newsList_style_23_1578466210917 .newDetail.pad, #newsList_style_23_1578466210917 .newDetail.mobile {display:none;}
	#newsList_style_23_1578466210917 .newTitle.pc {display:block;}
	#newsList_style_23_1578466210917 .newTitle.pad, #newsList_style_23_1578466210917 .newTitle.mobile {display:none;}
	@media screen and (min-width:641px) and (max-width:1200px) {
		#newsList_style_23_1578466210917 .newDetail.pad {display:block;}
		#newsList_style_23_1578466210917 .newDetail.pc, #newsList_style_23_1578466210917 .newDetail.mobile {display:none;}
		#newsList_style_23_1578466210917 .newTitle.pad {display:block;}
		#newsList_style_23_1578466210917 .newTitle.pc, #newsList_style_23_1578466210917 .newTitle.mobile {display:none;}
	}
	@media screen and (max-width:640px) {
		#newsList_style_23_1578466210917 .newDetail.mobile {display:block;}
		#newsList_style_23_1578466210917 .newDetail.pc, #newsList_style_23_1578466210917 .newDetail.pad {display:none;}
		#newsList_style_23_1578466210917 .newTitle.mobile {display:block;}
		#newsList_style_23_1578466210917 .newTitle.pc, #newsList_style_23_1578466210917 .newTitle.pad {display:none;}
	}
</style>







<style>
@media screen and (min-width: 1025px) {
	#newsList_style_23_1578466210917 .newslist_style_23 .newsDate{width:  288px;}
	#newsList_style_23_1578466210917 .newslist_style_23 .newsCont{width: calc(100% - 288px - 24px);}
	}
@media screen and (min-width: 640px) and (max-width: 1024px) {
	#newsList_style_23_1578466210917 .newslist_style_23 .newsDate{width:  288px;}
	#newsList_style_23_1578466210917 .newslist_style_23 .newsCont{width: calc(100% - 288px - 24px);}

}
@media screen and (max-width: 640px) {
}

/* 新分页 */
#newsList_style_23_1578466210917 .page_btn{ font-size:14px; text-align: center;}
#newsList_style_23_1578466210917 .page_btn .all_page{ display:inline-block; margin:0 10px; }
#newsList_style_23_1578466210917 .page:hover{ background:red; color:white; cursor:pointer;}
#newsList_style_23_1578466210917 .page_btn .cur{ background:red; color:white; cursor:pointer;}
#newsList_style_23_1578466210917 .submit_div{ display: inline-block; }

#newsList_style_23_1578466210917 .page_btn input{ width:50px; margin:0 5px;}
#newsList_style_23_1578466210917 .page_btn input:hover{ cursor:default; background:white; color:#333;}
#newsList_style_23_1578466210917 .page_submit{margin-left:5px;}
#newsList_style_23_1578466210917 .page{display:inline-block; border:none; background:white; text-align: center; width:auto; padding:0 15px; margin:0 .5px; height:auto; line-height:35px; box-sizing: border-box; -webkit-box-sizing: border-box; border:1px solid #e5e5e5;}
@media screen and (max-width:640px) {
		#newsList_style_23_1578466210917 .page_btn{ font-size:12px; }
		#newsList_style_23_1578466210917 .submit_div{ display:none; }
	}

	#newsList_style_23_1578466210917 .page{width:auto; margin:0 5px 10px 5px; border-radius:5px;  }
	@media screen and (max-width:640px) {
		#newsList_style_23_1578466210917 .page{line-height:30px; padding:0 13px;}
	}

</style></div>
			</div>
						</div>
			</div>
						</div>
			</div>
<!-- footer start -->
<?php include "footer.php"; ?>
<!-- footer ending -->

<!-- js start -->
<script src="js/ns.js"></script>
<script src="js/02800943.js"></script>
<script src="js/common.js"></script>
<script src="js/case.js"></script>
<!-- js ending -->

</body></html>