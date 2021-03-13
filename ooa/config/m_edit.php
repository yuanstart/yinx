<?php
require('../../include/common.inc.php');

checklogin();

$id=isset($_GET['id'])?$_GET['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$row=$db->getrs('select * from '.table('master_menu').' where `id`='.$id.'');
if (!$row){
	msg('该导航不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改导航</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if(gt('title').value==''){
		alert('导航名称不能为空');
		gt('title').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('导航的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
function check_display(str){
	if (str==0){
		gt('dis_ty').style.display='none';
		gt('dis_title2').style.display='none';
		gt('dis_link_url2').style.display='none';
	}else{
		gt('dis_ty').style.display='';
		gt('dis_title2').style.display='';
		gt('dis_link_url2').style.display='';
	}
}
</SCRIPT>
</head>

<body>
<?php
$nav=2;
require('menu.php');
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">修改导航</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="m_default.php">管理首页</a>&nbsp;|&nbsp;<a href="m_add.php">添加导航</a></td>
  </tr>
</table>

<br />
<FORM name="form1" method="post" action="m_editt.php" onSubmit="return check()">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<div id="tits" class="subnav">
    <ul>
    </ul>
</div>
<div id="con_1">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="120" align="right">上级导航：</td>
    <td>
    <select name="fid" id="fid" onchange="check_display(this.value)">
      <option value="0" selected="selected">无{作为一级导航}</option>
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
  <tr class="tdbg"  id="dis_ty" style="display:none;">
    <td width="120" align="right">导航类型：</td>
    <td>
     <input name="ty" type="radio" class="radio" id="ty1" value="1" <?php if ($row['ty']==1){echo' checked="checked"';}?> />
        普通导航连接
     <input name="ty" type="radio" class="radio" id="ty2" value="2" <?php if ($row['ty']==2){echo' checked="checked"';}?> />
        系统设置连接
     <input name="ty" type="radio" class="radio" id="ty3" value="3" <?php if ($row['ty']==3){echo' checked="checked"';}?>/>
        SEO设置连接
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">导航名称：</td>
    <td><INPUT name="title" type="text" id="title" size="30" maxlength="100" value="<?php echo $row['title']?>"> 
      <span class="red">*</span>
      <span id="dis_title2" style="display:none;">
     &nbsp; 导航名称：
      <input name="title2" type="text" id="title2" size="30" maxlength="100" value="<?php echo $row['title2']?>" />
      </span>
    </td>
  </tr>
  <tr class="tdbg" id="dis_link_url2" style="display:none;">
    <td width="120" align="right">连接地址：</td>
    <td><INPUT name="link_url" type="text" id="link_url" size="30" maxlength="100" value="<?php echo $row['link_url']?>">
     &nbsp;&nbsp;&nbsp;&nbsp; 连接地址：
      <input name="link_url2" type="text" id="link_url2" size="30" maxlength="100" value="<?php echo $row['link_url2']?>" /></td>
  </tr>
  <tr class="tdbg" >
    <td width="120" align="right">导航状态：</td>
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
    <td><input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='m_default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
<script>
check_display('<?php echo $row['fid']?>');
</script>
</body>
</html>
