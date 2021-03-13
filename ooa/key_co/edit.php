<?php
require('../../include/common.inc.php');
checklogin();
checkaction('key_view');
$cong=load_config('setup');//加载整站配置文件

$id=isset($_GET['id'])?$_GET['id']:'';
$url=(previous())?previous():'default.php';

if ($id==''||!checknum($id)){
	msg('参数错误！');
}

$row=$db->getrs('select * from '.table('key_co').' where `id`='.$id.'');
if (!$row){
	msg('该信息不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改关键词</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加关键词</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加关键词</a></td>
  </tr>
</table>
<br />
<FORM id="form1" name="form1" onSubmit="return checkForm('form1')" action="editt.php" method="post">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<input name="url" type="hidden" id="url" value="<?php echo $url?>"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <?php
  foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>关键词：</td>
    <td>
    <INPUT name="title<?php echo $v['lang']?>" type="text" id="title<?php echo $v['lang'];?>" size="30" maxlength="150" value="<?php echo $row['title'.$v['lang']]?>">
    <?php 
	if ($v['must']==true){
		echo '<span class="red">*</span>';
	}
	?>
    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>链接地址：</td>
    <td>
    <INPUT name="link_url<?php echo $v['lang']?>" type="text" id="link_url<?php echo $v['lang'];?>" size="57" maxlength="250" value="<?php echo $row['link_url'.$v['lang']]?>">
    </td>
  </tr>
  <?php
  }
  ?>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11"  value="<?php echo $row['px']?>" >
     <span class="red">* (从大到小排序)</span></td>
  </tr></table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value="保 存" class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value="取 消" onClick="location.href='default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
