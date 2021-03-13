<?php
require('../../include/common.inc.php');
checklogin();
checkaction('setup_gl');
$cong=load_config('setup');
$conf=read_config('config');

$row=$db->getrs('select * from '.table('setup_gl').' where `id`=1');
if (!$row){
	msg('该信息不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>网站基本设置</title>
<LINK href="../css/admin_style.css" rel="stylesheet" type="text/css">
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=VTb1TCueKsL3AZUjAl9DqMQG"></script>
</head>
<body >
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
	 <tr class="topbg">
		 <td   align="center">网站基本设置</td>
	 </tr>
</table>
<br />
<form action="editt.php" method="post" name="form1" >
<input type="hidden" name="id"  value="1">
<div id="tits" class="subnav">
    <ul>
    	<?php
			if ($conf['co']['email']==true){
				echo '<li onclick="settab(\'tits\',\'con\',1)" class="cur" >基本设置</li>';
				echo '<li onclick="settab(\'tits\',\'con\',2)" class="">邮箱设置</li>';
			}
		?>
    </ul>
</div>

<div id="con_1">
<table width="100%"  border="0" cellpadding="2" cellspacing="1" class="border_tab">
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="140" height="22" align="right"><?php echo $v['name']?>网站标题：</td>
    <td><textarea name="ym_tit<?php echo $v['lang']?>" cols="80" rows="3"  ><?php echo $row['ym_tit'.$v['lang']]?></textarea><br />
	建议填写不超过80个字，不要使用“回车键”换行
      </td>
  </tr>
<?php
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td  height="22" align="right" ><?php echo $v['name']?>网站关键字：</td>
    <td ><textarea name="ym_key<?php echo $v['lang']?>" cols="80" rows="3"   ><?php echo $row['ym_key'.$v['lang']]?></textarea><br />
	建议填写不超过100个字，不要使用“回车键”换行</td>
  </tr>
<?php
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td  height="22" align="right" class="tdbg"><?php echo $v['name']?>网站描述：</td>
    <td><textarea name="ym_des<?php echo $v['lang']?>" cols="80" rows="3"   ><?php echo $row['ym_des'.$v['lang']]?></textarea><br />
    建议填写不超过200个字，不要使用“回车键”换行</td>
  </tr>
<?php
}
?>
  <?php
  if ($conf['co']['ym_hcode']==true){
  	foreach($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td  height="22" align="right" class="tdbg"><?php echo $v['name']?>放在&lt;/head&gt;前代码：</td>
    <td><textarea name="ym_hcode<?php echo $v['lang']?>" cols="80" rows="3"   ><?php echo $row['ym_hcode'.$v['lang']]?></textarea><br />
    代码尽量不要放在head内，最好放在底部，百度商桥除外</td>
  </tr>
  <?php
  	}
  }
  ?>
  <?php
  if ($conf['co']['ym_bot']==true){
  	foreach($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td  align="right"><?php echo $v['name']?>网站底部：</td>
    <td>
    <textarea id="ym_bot<?php echo $v['lang']?>" name="ym_bot<?php echo $v['lang']?>" style="width:670px;height:200px;display:none;"><?php echo $row['ym_bot'.$v['lang']]?></textarea>
    </td>
  </tr>
  <?php
  	}
  ?>
  <link rel="stylesheet" href="../kd_html/themes/default/default.css" />
  <script charset="utf-8" src="../kd_html/kindeditor.js"></script>
  <script charset="utf-8" src="../kd_html/lang/zh_CN.js"></script>
  <script>
		//设置参数
        var options = {
			allowFileManager : true,
			newlineTag : 'br'
		};
        KindEditor.ready(function(K) {
            //如需创建多个编辑器：
			//1.添加一个文本区域
			//2.只要复制多下面这行代码"K.create('textarea[name="z_body"]',options);"
			//3.然后改一下文本区域的名字
			<?php
			foreach($cong['mlang'] as $k=>$v){
			?>
			K.create('textarea[name="ym_bot<?php echo $v['lang']?>"]',options);
			<?php
			}
			?>
        });
  </script>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['ym_bcode']==true){
  	foreach($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td height="22" align="right" class="tdbg"><?php echo $v['name']?>放在&lt;/body&gt;前代码：</td>
    <td><textarea name="ym_bcode<?php echo $v['lang']?>" cols="80" rows="3"   ><?php echo $row['ym_bcode'.$v['lang']]?></textarea><br />
    放流量统计、EC在线客服等等代码</td>
  </tr>
  <?php
  	}
  }
  ?>
  <?php
  if ($conf['co']['map']==true){
  ?>
   <tr class="tdbg2">
    <td  align="right" style="padding-right:10px;"><strong>公司地图</strong></td>
    <td></td>
  </tr>
   <tr class="tdbg">
    <td  align="right">公司名称：</td>
    <td><INPUT name="title" type="text" id="title"  size="50" maxlength="50"  value="<?php echo $row['title']?>"></td>
  </tr>
  <tr class="tdbg">
    <td align="right" valign="top">联系电话：<br />公司地址：</td>
    <td ><textarea name="f_body" rows="4" id="f_body" style="width:450px;"><?php echo rehtml($row['f_body'])?></textarea></td>
  </tr>
  <tr class="tdbg">
    <td align="right">公司地址：</td>
    <td>
    <INPUT name="address" type="text" id="address"  size="50" maxlength="250"  value="<?php echo $row['address']?>">
    &nbsp;<input type="button" value="获取坐标" onclick="getpo($('#address').val())" class="btn" />
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right" valign="top">地图坐标：</td>
    <td ><input type="text" id="zuobiao" name="zuobiao" size="50"  value="<?php echo $row['zuobiao']?>"/><br />
        <div id="allmap" style="width: 600px;height: 300px;overflow: hidden;margin:0;font-family:微软雅黑;"></div>
        <script type="text/javascript">
            var map = new BMap.Map("allmap");
            var point = new BMap.Point(116.331398,39.897445);
            map.centerAndZoom(point,12);
            map.enableScrollWheelZoom(); // 允许滚轮缩放
            map.enableKeyboard = true;
            map.addControl(new BMap.NavigationControl());
            map.addControl(new BMap.ScaleControl()); // 启用比例尺。            
            map.addControl(new BMap.MapTypeControl()); // 是否启用卫星地图等等
			<?php
			if ($row['zuobiao']!=''){
			?>
			var point = new BMap.Point(<?php echo $row['zuobiao']?>);
			showpo(point);
			<?php
			}
			?>
			// 将地址解析结果显示在地图上,并调整地图视野
			function getpo(str){
				var myGeo = new BMap.Geocoder();
				myGeo.getPoint(str, function(point){
					if (point) {
						showpo(point);
					}else{
						alert("您选择地址没有解析到结果!");
					}
				}, "北京市");
			}
			function showpo(point){
				map.clearOverlays(); 
				$('#zuobiao').val(point.lng+","+point.lat);
				map.centerAndZoom(point, 20);
				marker=new BMap.Marker(point);
				map.addOverlay(marker);
				marker.enableDragging();//可拖动
				marker.addEventListener("dragend",getAttr);
				function getAttr(){
					var p = marker.getPosition();       //获取marker的位置
					$('#zuobiao').val(p.lng+","+p.lat); 
				}
			}
        </script>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
</div>

<div id="con_2" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="140" height="22" align="right">发件箱：</td>
    <td><input name="s_email" type="text" maxlength="100" size="30" value="<?php echo $row['s_email']?>"/></td>
  </tr>
  <tr class="tdbg">
    <td height="22" align="right">发件箱用户：</td>
    <td><input name="s_username" type="text" maxlength="50" size="30" value="<?php echo $row['s_username']?>"/></td>
  </tr>
  <tr class="tdbg">
    <td height="22" align="right" >发件箱密码：</td>
    <td><input name="s_password" type="text" maxlength="50" size="30" value="<?php echo $row['s_password']?>"/></td>
  </tr>
  <tr class="tdbg">
    <td height="22" align="right" class="tdbg">发件服务器：</td>
    <td><input name="s_server" type="text" maxlength="50" size="30" value="<?php echo $row['s_server']?>"/><br />
	QQ邮箱：smtp.qq.com  &nbsp; 163邮箱：smtp.163.com  &nbsp; 网易企业邮箱：smtp.qiye.163.com
	</td>
  </tr>
  <?php
  if ($conf['co']['r_email']==true){
  ?>
  <tr class="tdbg">
    <td height="22" align="right" class="tdbg">收件箱：</td>
    <td><textarea name="r_email" cols="80" rows="3"><?php echo rehtml($row['r_email'])?></textarea><br />
	多个收件箱请用"|"隔开
    </td>
  </tr>
  <?php
  }
  ?>
</table>
</div>

<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="140">&nbsp;</td>
    <td><input type="submit" name="Submit" value="保 存" class="btn"></td>
  </tr>
</table>

</form>
</body>
</html>
