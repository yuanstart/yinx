<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');
checkaction($conf['sy']['pre'].'_lm_view');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类管理</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/jquery.js"></script>
<script src="../scripts/function.js"></script>
<script>
$(document).ready(function(){
	//如果鼠标移到class为msgtable的表格的tr上时，执行函数
	$(".listtable tr").mouseover(function(){  
	//给这行添加class值为over，并且当鼠标移出该行时执行函数
	$(this).addClass("over");}).mouseout(function(){ 
	//移除该行的class
	$(this).removeClass("over");}).click(function(){ 
		$(".listtable tr").removeClass("click");
		$(this).addClass("click");
	})
});
</script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">分类管理</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加分类</a></td>
  </tr>
</table>
<br />

<form id="form1" name="form1" action="make.php?ac=px" method="post" >
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td width="40" align="center">排序</td>
    <td width="40" align="center">ID</td>
    <td>分类名称</td>
    <td width="120" align="center">管理操作</td>
  </tr>
  <?php
	//把所有分类放到$rss数组里
	$rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' order by `px` desc,`id_lm` asc');
	foreach($rss as $rsk){
		echo '<tr class="tdbg" >'."\n";
		echo'<td align="center"><input name="px['.$rsk["id_lm"].']" id="px['.$rsk["id_lm"].']" type="text" value="'.$rsk["px"].'" maxlength="11" class="num"></td>'."\n";
		echo'<td align="center">'.$rsk["id_lm"].'</td>'."\n";
		echo'<td>'.$rsk["title_lm"].'</td>'."\n";
		echo'<td align="center"><A href="edit.php?id='.$rsk["id_lm"].'">修改</A> | <A href="make.php?id='.$rsk["id_lm"].'&ac=del"  onClick="return confirm(\'真的要删除该分类吗?\n\n该分类下的所有信息将被删除！\')" >删除</A></td>'."\n";
		echo'</tr>'."\n";
	}

  ?> 
</table>
<p class="p">
<input name="" type="submit"  class="btn" value="排序"/>
</p>
</form>
</body>
</html>
