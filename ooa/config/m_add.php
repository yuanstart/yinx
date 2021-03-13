<?php
require('../../include/common.inc.php');

checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加导航</title>
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
    <td colspan="2">添加导航</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="m_default.php">管理首页</a>&nbsp;|&nbsp;<a href="m_add.php">添加导航</a></td>
  </tr>
</table>

<br />
<FORM name="form1" method="post" action="m_addd.php" onSubmit="return check()">
<div id="tits" class="subnav">
<ul></ul>
</div>
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
    </select>    </td>
  </tr>
  <tr class="tdbg"  id="dis_ty" style="display:none;">
    <td width="120" align="right">导航类型：</td>
    <td>
     <input name="ty" type="radio" class="radio" id="ty" value="1" checked />
        普通导航连接
     <input name="ty" type="radio" class="radio" id="ty2" value="2" />
        系统设置连接
     <input name="ty" type="radio" class="radio" id="ty3" value="3" />
        SEO设置连接
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">导航名称：</td>
    <td><INPUT name="title" type="text" id="title" size="30" maxlength="100"> 
    <span class="red">*</span>&nbsp;
    <span id="dis_title2" style="display:none;"> 导航名称：
    <input name="title2" type="text" id="title2" size="30" maxlength="100" />
    </span>
    </td>
  </tr>
  <tr class="tdbg" id="dis_link_url2" style="display:none;">
    <td width="120" align="right">连接地址：</td>
    <td><INPUT name="link_url" type="text" id="link_url" size="30" maxlength="100">
     &nbsp;&nbsp;&nbsp; 连接地址：
      <input name="link_url2" type="text" id="link_url2" size="30" maxlength="100" /></td>
  </tr>
  <tr class="tdbg" >
    <td width="120" align="right">导航状态：</td>
    <td>
    <input name="pass" type="radio" class="radio" id="pass" value="1" checked="checked">
    启用
    <input name="pass" type="radio" class="radio" id="pass2" value="0">			
    停用
    </td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="1" size="5" maxlength="11" >
     <span class="red">* (从小到大排序)</span></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="122">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='m_default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
