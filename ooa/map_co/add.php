<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config','../');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_co_add');//检查权限

$act=isset($_GET['act'])?$_GET['act']:'';
//ajax获取城市
if($act=='getshi'){
	$sheng=isset($_POST['sheng'])?html($_POST['sheng']):'';
	$arr=array();
	if ($sheng!=''){
		$sql='select id_lm,title_lm from '.table($conf['sy']['table_lm']).' where `fid`='.$sheng.' order by px desc,id_lm asc';
		$rss=$db->getrss($sql);
		if($rss){
			foreach($rss as $v){
				 $str='<option value="'.$v['id_lm'].'">'.$v['title_lm'].'</option>';
				 $arr[]=$str;
			}
		}
	}
	echo json_encode($arr);
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加<?php echo $conf['sy']['name'];?></title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=VTb1TCueKsL3AZUjAl9DqMQG"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	<?php
	if ($conf['sy']['need_lm']==true){
	?>
	if (gt('shi').value=="0"){
		alert("请选择城市");
		gt('shi').focus();
		return false;
	}
	<?php
	}
	?>
	<?php
	foreach ($cong['mlang'] as $k=>$v){
		if ($v['must']==true){
	?>
	if(gt('title<?php echo $v['lang']?>').value==''){
		alert('<?php echo $v['name']?>标题不能为空');
		gt('title<?php echo $v['lang']?>').focus();
		return false;
	}
	<?php
		}
		if ($conf['co']['mlang']!=true){
			break;
		}
	}
	?>
	if(gt('px').value==''){
		alert('显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}

function tanchuchuang(url,width,height) {
	tit='';
	var winWinth = $(window).width(), winHeight = $(document).height();
	$("body").append("<div class='winbj'></div>");
	$("body").append("<div class='tanChu' style='z-index:100;'><div class='winIframe' ></div></div>");
	str='<iframe id="fra_add" name="fra_add" src="'+url+'" style="width:'+width+'px; height:'+height+'px;" frameborder="0" scrolling="auto"></iframe>';
	$(".winIframe").html(str);
	$(".winbj").css({ width: winWinth, height: winHeight, background: "#000", position: "absolute", left: "0", top: "0" });
	$(".winbj").fadeTo(0, 0.3);
	var tanchuLeft = $(window).width() / 2 - width / 2;
	var tanchuTop = $(window).height() / 2 - height / 2 + $(window).scrollTop();
	$(".tanChu").css({ width: width, height: height, border: "3px #ccc solid",padding:"0px", left: tanchuLeft, top: tanchuTop, background: "#fff", position: "absolute"});
	var winIframeHeight = height - 26;

	$(".tanchuCancle").click(function() {
		$(".winbj").remove();
		$(".tanChu").remove();
		$(".winIframe").remove();
		return false
	});
}

function tanchuCancle(){
	$(".winbj").remove();
	$(".tanChu").remove();
	$(".winIframe").remove();
}
</SCRIPT>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加<?php echo $conf['sy']['name'];?></td>
  </tr>
  <tr class="tdbg" <?php if ($conf['co']['add_xx']==false){echo ' style="display:none;"';}?>>
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加<?php echo $conf['sy']['name'];?></a></td>
  </tr>
</table>
<br />
<FORM name="form1" method="post" action="addd.php" onSubmit="return check()">
<div id="tits" class="subnav">
    <ul>
    	<?php
        if ($cong['sy_seo']==true&&$conf['co']['seo']==true){
			echo '<li onclick="settab(\'tits\',\'con\',1)" class="cur" >详细信息</li>';
			echo '<li onclick="settab(\'tits\',\'con\',2)" class="">seo设置</li>';
        }
		?>
    </ul>
</div>
<div id="con_1">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg" <?php if ($conf['sy']['need_lm']==false){echo ' style="display:none;"';}?>>
    <td width="120" align="right">所属分类：</td>
    <td>
    <select name="sheng" id="sheng" onchange="getshi()">
      <option value="0" selected="selected">请选择省份</option>
    	<?php
        $rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' where fid=0 order by `px` desc,`id_lm` asc');
		foreach($rss as $rs){
			echo'<option value="'.$rs["id_lm"].'">'.$rs["title_lm"].'</option>'."\n";
		}
		?>
    </select>
    <select name="shi" id="shi">
      <option id="fist" value="0" selected="selected">请选择城市</option>
    </select>
    <script>
	function getshi(){
		sheng=$("#sheng").val();
		$.ajax({
			url:'add.php?act=getshi',
			type:'POST',
			dataType:'json',
			data:{'sheng':sheng},
			success:function(data){
				$("#shi").find("#fist").nextAll().remove();
				for(var i in data){
					$("#shi").append(data[i]);
				}
			}
		});
	}
    </script>
    </td>
  </tr>
  <?php
  foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php if ($v['name']!=''){echo $v['name'].'标题';}else{echo '标　　题';}?>：</td>
    <td>
    <INPUT name="title<?php echo $v['lang']?>" type="text" id="title<?php echo $v['lang'];?>" size="50" maxlength="150">
    <?php 
	if ($v['must']==true){
		echo '<span class="red">*</span>';
	}
	?>
    </td>
  </tr>
  <?php
	if ($conf['co']['mlang']!=true){
		break;
	}
  }
  ?>
  <?php
  if ($conf['co']['apname']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">页面名称：</td>
    <td><INPUT name="apname" type="text" id="apname" size="50" maxlength="50"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['keyword']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>关键字：</td>
    <td><INPUT name="keyword<?php echo $v['lang']?>" type="text" id="keyword<?php echo $v['lang']?>" size="50" maxlength="50"></td>
  </tr>
  <?php
		if ($conf['co']['mlang']!=true){
			break;
		}
  	}
  }
  ?>
  <?php
  if ($conf['co']['link_url']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">连接地址：</td>
    <td><INPUT name="link_url" type="text" id="link_url" size="57" maxlength="250"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['phone']==true){
  ?>
 <tr class="tdbg">
    <td width="120" align="right">联系电话：</td>
    <td><INPUT name="phone" type="text" id="phone"  size="50" maxlength="50"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['address']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">联系地址：</td>
    <td>
    <INPUT name="address" type="text" id="address"  size="50" maxlength="250">
	  <?php
      if ($conf['co']['zuobiao']==true){
      ?>
        &nbsp;<input type="button" value="获取坐标" onclick="getpo($('#address').val())" class="btn" />
	  <?php
      }
      ?>
    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['zuobiao']==true){
  ?>
  <tr class="tdbg">
    <td align="right" valign="top">地图坐标：</td>
    <td ><input type="text" id="zuobiao" name="zuobiao" size="50" /><br />
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
  <?php
  if ($conf['co']['f_body']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td align="right"><?php echo $v['name']?>简要介绍：</td>
    <td ><textarea name="f_body<?php echo $v['lang']?>" rows="4" id="f_body<?php echo $v['lang']?>" style="width:450px;"></textarea></td>
  </tr>
  <?php
		if ($conf['co']['mlang']!=true){
			break;
		}
  	}
  }
  ?>
  <?php
  if ($conf['co']['z_body']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>详细介绍：</td>
    <td><textarea id="z_body<?php echo $v['lang']?>" name="z_body<?php echo $v['lang']?>" style="width:670px;height:300px;display:none;"></textarea></td>
  </tr>
  <?php
		if ($conf['co']['mlang']!=true){
			break;
		}
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
		   foreach ($cong['mlang'] as $k=>$v){
		  ?>
			K.create('textarea[name="z_body<?php echo $v['lang']?>"]',options);
		  <?php
			if ($conf['co']['mlang']!=true){
				break;
			}
		  }
		  ?>
        });
  </script>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['img_sl']==true&&$conf_um=read_config('conf_um')){
  ?>
  <tr class="tdbg" >          
    <td width="120" align="right">图片上传：</td>          
    <td >
    <iframe name="frame1" id="frame1" src="up_image_tool/up.php?frameid=frame1&kuang=img_sl" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="img_sl" id="img_sl">
    <?php
    if(!empty($conf_um['up']['text'])){
	?>
        <br /><span class="red"><?php echo $conf_um['up']['text']?></span>
    <?php
    }
	?>
    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['pic_sl']==true&&$conf_up=read_config('conf_up')){
  ?>
  <tr class="tdbg" >          
    <td width="120" align="right">图片2上传：</td>          
    <td >
    <iframe name="frame4" id="frame4" src="up_image_tool/up.php?frameid=frame4&kuang=pic_sl" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="pic_sl" id="pic_sl">
    <?php
    if(!empty($conf_up['up']['text'])){
	?>
        <br /><span class="red"><?php echo $conf_up['up']['text']?></span>
    <?php
    }
	?>
    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['image']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">多图上传：</td>
    <td >
	<iframe id="fra_image" name="fra_image" src="pl_image_tool/pl_default.php" style="width:670px; height:285px;" frameborder="0" scrolling="auto"></iframe>    </td>
  </tr>
  <?php
  }
  ?>
  <tr class="tdbg" <?php if ($conf['co']['wtime']==false){echo ' style="display:none"';}?>>
    <td width="120" align="right">发布时间：</td>
    <td ><input name="wtime" type="text" id="wtime" value="<?php echo date('Y-m-d H:i:s')?>" maxlength="50"> 时间格式为“年-月-日 时:分:秒”，如：<font color="#0000FF">2003-5-12 12:32:47</font></td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
</table>
</div>
<div id="con_2" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right"><?php echo $v['name']?>页面标题：</td>
    <td>
    <textarea name="ym_tit<?php echo $v['lang']?>" cols="80" rows="3"></textarea><br />
	建议填写不超过80个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['co']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right" ><?php echo $v['name']?>页面关键字：</td>
    <td >
    <textarea name="ym_key<?php echo $v['lang']?>" cols="80" rows="3"></textarea><br />
	建议填写不超过100个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['co']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right" class="tdbg"><?php echo $v['name']?>页面描述：</td>
    <td><textarea name="ym_des<?php echo $v['lang']?>" cols="80" rows="3"></textarea><br />
    建议填写不超过200个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['co']['mlang']!=true){
		break;
	}
}
?>
</table>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value="提 交" class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value="取 消" onClick="location.href='default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
