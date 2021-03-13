<div id="online_service_bar">
	<div id="online_service_minibar">
	</div>
	<div id="online_service_fullbar">
		<div class="service_bar_head">
		<span id="service_bar_close" title="点击关闭">点击关闭</span></div>
		<div class="service_bar_main">
			<ul class="service_menu">
				<li class="hover">
					<dl>
						<dd>
							<!--在线客服开始-->

 <?php
  $sql='select * from `'.$tablepre.'kf_co` where lx=1 order by px desc,id desc limit 5';
  $result = $db->query($sql);
  while($row=$db->getrow($result)){
 ?>   
<dd>
              <!--在线客服开始-->
              <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $row['title']?>&site=qq&menu=yes">
                <img width="74" height="22" border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $row['title']?>:41" alt="<?php echo $row['rename']?>" title="<?php echo $row['rename']?>" />
              </a>
</dd>
  <?php
  }
  $db->freeresult($result);
  
  ?>

							<!--在线客服结束-->
						</dd>
					</dl>
				</li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
var default_view = 1; <!--1是默认展开，0是默认关闭，新开窗口看效果，别在原页面刷新-->
</script>
<script type="text/javascript" src="lineservice/js/script.js"></script>