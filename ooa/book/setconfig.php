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
    <ul>
        <li id="tit_1" onclick="setdiv('tit_1','con_1')" class="tit cur" >系统设置</li>
        <li id="tit_2" onclick="setdiv('tit_2','con_2')" class="tit">信息设置</li>
    </ul>
</div>

<div id="con_1" class="con">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">系统ID：</td>
    <td><input name="id" type="text" size="20" maxlength="50" value="<?php echo $conf['sy']['id']?>"> 每个系统的id是唯一的，id用于区分每个系统的多图、相关信息、相关文件等等</td>
  </tr>
  <tr class="tdbg">
    <td width="180" align="right">系统名称：</td>
    <td><input name="name" type="text" id="name" size="20" maxlength="50" value="<?php echo $conf['sy']['name']?>"></td>
  </tr>
  <tr class="tdbg">
    <td width="180" align="right">权限前缀：</td>
    <td><input name="pre" type="text" id="pre" size="20" maxlength="50" value="<?php echo $conf['sy']['pre']?>"> 每个系统的权限前缀标识 &nbsp;例如：新闻系统的权限前缀为news</td>
  </tr>
  <tr class="tdbg">
    <td  align="right">信息表名：</td>
    <td><input name="table_co" type="text" id="table_co" size="20" maxlength="50" value="<?php echo $conf['sy']['table_co']?>"></td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用回复：</td>
    <td>
        <input name="huifu" type="radio" class="radio" id="huifu" value="true" <?php if ($conf['sy']['huifu']==true){echo' checked="checked"';}?>/>
        需要回复
        <input name="huifu" type="radio" class="radio" id="huifu2" value="false" <?php if ($conf['sy']['huifu']==false){echo' checked="checked"';}?> />
        不需要回复    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否发送邮件：</td>
    <td>
        <input name="send" type="radio" class="radio" id="send" value="true" <?php if ($conf['sy']['send']==true){echo' checked="checked"';}?>/>
        需要发送邮件
        <input name="send" type="radio" class="radio" id="send2" value="false" <?php if ($conf['sy']['send']==false){echo' checked="checked"';}?> />
        不需要发送邮件
    </td>
  </tr>
</table>
</div>

<div id="con_2" class="con" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">是否使用 标题：</td>
    <td>
        <input name="title" type="radio" class="radio" id="title" value="true" <?php if ($conf['co']['title']==true){echo' checked="checked"';}?> />
        使用
        <input name="title" type="radio" class="radio" id="title2" value="false" <?php if ($conf['co']['title']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 数量：</td>
    <td>
        <input name="num" type="radio" class="radio" id="num" value="true" <?php if ($conf['co']['num']==true){echo' checked="checked"';}?> />
        使用
        <input name="num" type="radio" class="radio" id="num2" value="false" <?php if ($conf['co']['num']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 姓名：</td>
    <td>
        <input name="rename" type="radio" class="radio" id="rename" value="true" <?php if ($conf['co']['rename']==true){echo' checked="checked"';}?> />
        使用
        <input name="rename" type="radio" class="radio" id="rename2" value="false" <?php if ($conf['co']['rename']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 性别：</td>
    <td>
        <input name="sex" type="radio" class="radio" id="sex" value="true" <?php if ($conf['co']['sex']==true){echo' checked="checked"';}?> />
        使用
        <input name="sex" type="radio" class="radio" id="sex2" value="false" <?php if ($conf['co']['sex']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 电话：</td>
    <td>
        <input name="phone" type="radio" class="radio" id="phone" value="true" <?php if ($conf['co']['phone']==true){echo' checked="checked"';}?> />
        使用
        <input name="phone" type="radio" class="radio" id="phone2" value="false" <?php if ($conf['co']['phone']==false){echo' checked="checked"';}?>/>
        不使用    
      </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 传真：</td>
    <td>
        <input name="fax" type="radio" class="radio" id="fax" value="true" <?php if ($conf['co']['fax']==true){echo' checked="checked"';}?> />
        使用
        <input name="fax" type="radio" class="radio" id="fax2" value="false" <?php if ($conf['co']['fax']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 邮箱：</td>
    <td>
        <input name="email" type="radio" class="radio" id="email" value="true" <?php if ($conf['co']['email']==true){echo' checked="checked"';}?> />
        使用
        <input name="email" type="radio" class="radio" id="email2" value="false" <?php if ($conf['co']['email']==false){echo' checked="checked"';}?>/>
        不使用    
      </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 QQ：</td>
    <td>
        <input name="qq" type="radio" class="radio" id="qq" value="true" <?php if ($conf['co']['qq']==true){echo' checked="checked"';}?> />
        使用
        <input name="qq" type="radio" class="radio" id="qq2" value="false" <?php if ($conf['co']['qq']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 微信：</td>
    <td>
        <input name="wx" type="radio" class="radio" id="wx" value="true" <?php if ($conf['co']['wx']==true){echo' checked="checked"';}?> />
        使用
        <input name="wx" type="radio" class="radio" id="wx2" value="false" <?php if ($conf['co']['wx']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 公司名称：</td>
    <td>
        <input name="compname" type="radio" class="radio" id="compname" value="true" <?php if ($conf['co']['compname']==true){echo' checked="checked"';}?> />
        使用
        <input name="compname" type="radio" class="radio" id="compname2" value="false" <?php if ($conf['co']['compname']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 地址：</td>
    <td>
        <input name="address" type="radio" class="radio" id="address" value="true" <?php if ($conf['co']['address']==true){echo' checked="checked"';}?> />
        使用
        <input name="address" type="radio" class="radio" id="address2" value="false" <?php if ($conf['co']['address']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 邮编：</td>
    <td>
        <input name="post" type="radio" class="radio" id="post" value="true" <?php if ($conf['co']['post']==true){echo' checked="checked"';}?> />
        使用
        <input name="post" type="radio" class="radio" id="post2" value="false" <?php if ($conf['co']['post']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 内容：</td>
    <td>
        <input name="z_body" type="radio" class="radio" id="z_body" value="true" <?php if ($conf['co']['z_body']==true){echo' checked="checked"';}?> />
        使用
        <input name="z_body" type="radio" class="radio" id="z_body2" value="false" <?php if ($conf['co']['z_body']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
</table>
</div>


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
<script>
function setdiv(tit_obj,con_obj){
	$('.tit').removeClass('cur');
	$('#'+tit_obj).addClass('cur');
	$('.con').css('display','none');
	$('#'+con_obj).css('display','');
}
</script>
</body>
</html>
