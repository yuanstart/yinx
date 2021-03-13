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
<input type="hidden" name="pl_id" value="<?php echo $pl_id;?>" />
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title"><td colspan="2"></td></tr>
  <?php
  foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="100" align="right"><?php echo $v['name']?>标题：</td>
    <td>
    <INPUT name="title<?php echo $v['lang']?>" type="text" id="title<?php echo $v['lang'];?>" size="25" maxlength="150">
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
  <tr class="tdbg" >          
    <td align="right">图片上传：</td>          
    <td >
    <iframe name="frame1" id="frame1" src="up_image_tool/up.php?frameid=frame1&kuang=img_sl" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="img_sl" id="img_sl">
	<?php
    require('up_image_tool/upcon.php');
    if(!empty($conf['up']['text'])){
    ?>
        <br /><span class="red"><?php echo $conf['up']['text']?></span>
    <?php
    }
    ?>
    </td>
  </tr>
    <tr class="tdbg">
    <td align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从小到大排序)</span></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="100">&nbsp;</td>
    <td><input type="submit" name="Submit" value="提 交" class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value="取 消" onClick="parent.tanchuCancle()" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
