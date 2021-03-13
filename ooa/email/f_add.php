<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_fj_add');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加邮箱</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加邮箱</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="f_default.php">管理首页</a>&nbsp;|&nbsp;<a href="f_add.php">添加邮箱</a></td>
  </tr>
</table>
<br />
<FORM name="form1" method="post" action="f_addd.php" onSubmit="return checkForm('form1')">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">发件箱：</td>
    <td  class="tdbg"><input name="email" type="text" class="input_m"  size="30" maxlength="100" canEmpty="N" checkType="email" checkStr="发件箱" /> <span class="red">*</span> </td>
  </tr>
  <tr class="tdbg">
    <td width="120" height="22" align="right">发件箱用户：</td>
    <td><input name="username" type="text" maxlength="50" size="30"></td>
  </tr>
  <tr class="tdbg">
    <td width="120" height="22" align="right" >发件箱密码：</td>
    <td><input name="password" type="text" maxlength="50" size="30"/></td>
  </tr>
  <tr class="tdbg">
    <td width="120" height="22" align="right" class="tdbg">发件服务器：</td>
    <td><input name="server" type="text" maxlength="50" size="30"/><br />
	QQ邮箱：smtp.qq.com  &nbsp; 163邮箱：smtp.163.com  &nbsp; 网易企业邮箱：smtp.qiye.163.com
	</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value="提 交" class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value="取 消" onClick="location.href='f_default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
