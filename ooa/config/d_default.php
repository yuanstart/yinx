<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据库管理</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/jquery.js"></script>
<script src="../scripts/function.js"></script>
</head>

<body>
<?php
$nav=4;
require('menu.php');
?>
<FORM name="form1" method="post" action="d_make.php?act=add" onSubmit="return checkForm('form1')">
<div id="tits" class="subnav">
<ul></ul>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td align="right" width="150"><strong>增加字段：</strong></td>
    <td>在 <input name="lang_y"  type="text" size="8"/> 后面增加 <input name="lang_x"  type="text" size="8"  canEmpty="N" checkType="string,," checkStr="增加字段后缀"/> <br />
例如：在title_en 后面增加 title_ch 只需要填写在 _en 后面增加 _ch<br />
例如：在title 后面增加 title_en 前面为空，后面填写 _en<br />
</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="150">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 提 交 " class="btn"></td>
  </tr>
</table>
</FORM>

<FORM name="form2" method="post" action="d_make.php?act=edit" onSubmit="return checkForm('form2')">
<div id="tits" class="subnav">
<ul></ul>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td align="right" width="150"><strong>修改字段：</strong></td>
    <td>把 <input name="lang_y"  type="text" size="8"  canEmpty="N" checkType="string,," checkStr="要修改的字段后缀"/> 修改为 <input name="lang_x"  type="text" size="8"   canEmpty="N" checkType="string,," checkStr="字段后缀修改为"/> <br />
      例如：把title_en 后面增加 title_ch 只需要填写把 _en 修改为 _ch</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="150">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 提 交 " class="btn"></td>
  </tr>
</table>
</FORM>

<FORM name="form3" method="post" action="d_make.php?act=del" onSubmit="return checkForm('form3')">
<div id="tits" class="subnav">
<ul></ul>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td align="right" width="150"><strong>删除字段：</strong></td>
    <td><input name="lang"  type="text" size="8"  canEmpty="N" checkType="string,," checkStr="要删除的字段后缀"/> <br />
      例如：删除 title_ch 字段 只需要填写 _ch</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="150">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 提 交 " class="btn"></td>
  </tr>
</table>
</FORM>

</body>
</html>
