<?php
require('../../../include/common.inc.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

//获取哪条信息id需要多图，添加信息时是没有id系统自动生成一个临时id用session来保存，等信息添加后，再用信息的id来替换session保存的临时id
$pl_id=isset($_GET['pl_id'])?$_GET['pl_id']:'';
if ($pl_id!=''&&!checknum($pl_id)){
	msg('参数错误');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加信息</title>
<link href="../../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../../scripts/function.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
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
		if ($conf['pl']['mlang']!=true){
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
</SCRIPT>
</head>

<body>
<FORM name="form1" method="post" action="pl_addd.php" onSubmit="return check()">
<div id="tits" class="subnav">
    <ul>
    	<?php
        if ($cong['sy_seo']==true&&$conf['pl']['seo']==true){
			echo '<li onclick="settab(\'tits\',\'con\',1)" class="cur" >详细信息</li>';
			echo '<li onclick="settab(\'tits\',\'con\',2)" class="">seo设置</li>';
        }
		?>
    </ul>
</div>
<div id="con_1">
<input type="hidden" name="pl_id" value="<?php echo $pl_id;?>" />
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <?php
  foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="100" align="right"><?php echo $v['name']?>标题：</td>
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
	if ($conf['pl']['mlang']!=true){
		break;
	}
  }
  ?>
  <?php
  if ($conf['pl']['link_url']==true){
  ?>
  <tr class="tdbg">
    <td align="right">连接地址：</td>
    <td><INPUT name="link_url" type="text" id="link_url" size="57" maxlength="250"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td align="right"><?php echo $v['name']?>详细介绍：</td>
    <td><textarea id="z_body<?php echo $v['lang']?>" name="z_body<?php echo $v['lang']?>" style="width:670px;height:300px;display:none;"></textarea></td>
  </tr>
  <?php
		if ($conf['pl']['mlang']!=true){
			break;
		}
  	}
  ?>
  <link rel="stylesheet" href="../../kd_html/themes/default/default.css" />
  <script charset="utf-8" src="../../kd_html/kindeditor.js"></script>
  <script charset="utf-8" src="../../kd_html/lang/zh_CN.js"></script>
  <script>
		//设置参数
        var options = {
			allowFileManager : true,
			newlineTag : 'br',
			height: '290px'
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
			if ($conf['pl']['mlang']!=true){
				break;
			}
		  }
		  ?>
        });
  </script>
  <?php
  if ($conf['pl']['img_sl']==true){
	require('up_image_tool/upcon.php');
  ?>
  <tr class="tdbg" >          
    <td align="right">图片上传(大)：</td>          
    <td >
    <iframe name="frame1" id="frame1" src="up_image_tool/up.php?frameid=frame1&kuang=img_sl" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="img_sl" id="img_sl">
	<?php
    if(!empty($conf['up']['text'])){
    ?>
        <br /><span class="red"><?php echo $conf['up']['text']?></span>
    <?php
    }else{
      ?>
      <span class="red">集团概况</span>
      <?php
    }
    ?>

    </td>
  </tr>
  <?php
  }
  ?>


    <?php
  if ($conf['pl']['img_sl2']==true){
  require('up_image_tool/upcon.php');
  ?>
  <tr class="tdbg" >          
    <td align="right">图片上传(小)：</td>          
    <td >
    <iframe name="frame1" id="frame1" src="up_image_tool/up.php?frameid=frame1&kuang=img_sl2" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>           
    <input type="hidden" name="img_sl2" id="img_sl2">
  <?php
    if(!empty($conf['up']['text'])){
    ?>
        <br /><span class="red"><?php echo $conf['up']['text']?></span>
    <?php
    }
    ?>
    </td>
  </tr>
  <?php
  }
  ?>



    <tr class="tdbg">
    <td align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从小到大排序)</span></td>
  </tr>
</table>
</div>
<div id="con_2" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="100" height="22" align="right"><?php echo $v['name']?>页面标题：</td>
    <td>
    <textarea name="ym_tit<?php echo $v['lang']?>" cols="75" rows="3"></textarea><br />
	建议填写不超过80个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['pl']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="100" height="22" align="right" ><?php echo $v['name']?>页面关键字：</td>
    <td >
    <textarea name="ym_key<?php echo $v['lang']?>" cols="75" rows="3"></textarea><br />
	建议填写不超过100个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['pl']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="100" height="22" align="right" class="tdbg"><?php echo $v['name']?>页面描述：</td>
    <td><textarea name="ym_des<?php echo $v['lang']?>" cols="75" rows="3"></textarea><br />
    建议填写不超过200个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['pl']['mlang']!=true){
		break;
	}
}
?>
</table>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="100">&nbsp;</td>
    <td><input type="submit" name="Submit" value="提 交" class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value="取 消" onClick="parent.tanchuCancle()" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
