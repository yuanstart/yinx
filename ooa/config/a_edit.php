<?php
require('../../include/common.inc.php');

checklogin();

$id=isset($_GET['id'])?$_GET['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$row=$db->getrs('select * from '.table('master_action').' where `id`='.$id.'');
if (!$row){
	msg('该权限不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改权限</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if(gt('title').value==''){
		alert('权限名不能为空');
		gt('title').focus();
		return false;
	}
	if(gt('title_val').value==''){
		alert('权限值不能为空');
		gt('title_val').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('权限的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>
</head>

<body>
<?php
$nav=3;
require('menu.php');
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">修改权限</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理权限：</strong></td>
    <td><a href="a_default.php">管理首页</a>&nbsp;|&nbsp;<a href="a_add.php">添加权限</a></td>
  </tr>
</table>

<br />
<FORM name="form1" method="post" action="a_editt.php" onSubmit="return check()">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<div id="tits" class="subnav">
    <ul>
    </ul>
</div>
<div id="con_1">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="120" align="right">所属分组：</td>
    <td>
    <select name="fid" id="fid">
    	<?php
        $rss=$db->getrss('select * from '.table('master_menu').' where fid=0 order by `px` asc,`id` asc');
		foreach($rss as $rs){
			echo'<option value="'.$rs["id"].'">• '.$rs["title"].'</option>'."\n";
		}
		?>
    </select>
    <script>
    gt('fid').value='<?php echo $row['fid']?>';
    </script>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">权限名：</td>
    <td><INPUT name="title" type="text" id="title" size="30" maxlength="100" value="<?php echo $row['title']?>"> 
      <span class="red">*</span>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">权限值：</td>
    <td><INPUT name="title_val" type="text" id="title_val" size="30" maxlength="50" value="<?php echo $row['title_val']?>">
      <span class="red">*</span>&nbsp;  例如：添加新闻 权限值为 news_add、删除新闻 权限值为 news_del</td>
  </tr>
  <tr class="tdbg" >
    <td width="120" align="right">权限状态：</td>
    <td>
    <input name="pass" type="radio" class="radio" id="pass" value="1" <?php if ($row['pass']==1){echo' checked="checked"';}?>>
    启用
    <input name="pass" type="radio" class="radio" id="pass2" value="0" <?php if ($row['pass']==0){echo' checked="checked"';}?>>			
    停用    </td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" size="5" maxlength="10"  value="<?php echo $row['px']?>">
      <span class="red">* (从小到大排序)</span></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="122">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='a_default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
