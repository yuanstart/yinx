<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统设置</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">本系统设置</td>
  </tr>
</table>
<?php
//加载系统配置文件
if($conf=read_config('config')){
?>
<br />
<FORM name="form1" method="post" action="setconfigg.php">
<div class="subnav">
<ul></ul>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td align="right" width="180">是否使用 &lt;/head&gt;前代码：</td>
    <td>
        <input name="ym_hcode" type="radio" class="radio" id="ym_hcode" value="true" <?php if ($conf['co']['ym_hcode']==true){echo' checked="checked"';}?>/>
        使用
        <input name="ym_hcode" type="radio" class="radio" id="ym_hcode2" value="false" <?php if ($conf['co']['ym_hcode']==false){echo' checked="checked"';}?> />
        不使用
     </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 网站底部：</td>
    <td>
        <input name="ym_bot" type="radio" class="radio" id="ym_bot" value="true" <?php if ($conf['co']['ym_bot']==true){echo' checked="checked"';}?>/>
        使用
        <input name="ym_bot" type="radio" class="radio" id="ym_bot2" value="false" <?php if ($conf['co']['ym_bot']==false){echo' checked="checked"';}?> />
        不使用
     </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 &lt;/body&gt;前代码：</td>
    <td>
        <input name="ym_bcode" type="radio" class="radio" id="ym_bcode" value="true" <?php if ($conf['co']['ym_bcode']==true){echo' checked="checked"';}?>/>
        使用
        <input name="ym_bcode" type="radio" class="radio" id="ym_bcode2" value="false" <?php if ($conf['co']['ym_bcode']==false){echo' checked="checked"';}?> />
        不使用
     </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 百度地图：</td>
    <td>
        <input name="map" type="radio" class="radio" id="map" value="true" <?php if ($conf['co']['map']==true){echo' checked="checked"';}?>/>
        使用
        <input name="map" type="radio" class="radio" id="map2" value="false" <?php if ($conf['co']['map']==false){echo' checked="checked"';}?> />
        不使用
     </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 邮箱设置：</td>
    <td>
        <input name="email" type="radio" class="radio" id="email" value="true" <?php if ($conf['co']['email']==true){echo' checked="checked"';}?>/>
        使用
        <input name="email" type="radio" class="radio" id="email2" value="false" <?php if ($conf['co']['email']==false){echo' checked="checked"';}?> />
        不使用
     </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 收件箱：</td>
    <td>
        <input name="r_email" type="radio" class="radio" id="r_email" value="true" <?php if ($conf['co']['r_email']==true){echo' checked="checked"';}?>/>
        使用
        <input name="r_email" type="radio" class="radio" id="r_email2" value="false" <?php if ($conf['co']['r_email']==false){echo' checked="checked"';}?> />
        不使用
     </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="180">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 保 存 " class="btn"></td>
  </tr>
</table>
</FORM>
<?php
}
?>
</body>
</html>
