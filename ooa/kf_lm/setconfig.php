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
        <li id="tit_2" onclick="setdiv('tit_2','con_2')" class="tit">分类设置</li>
        <li id="tit_3" onclick="setdiv('tit_3','con_3')" class="tit">信息设置</li>
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
    <td  align="right">分类表名：</td>
    <td><input name="table_lm" type="text" id="table_lm" size="20" maxlength="50" value="<?php echo $conf['sy']['table_lm']?>"></td>
  </tr>
  <tr class="tdbg">
    <td  align="right">类型表名：</td>
    <td><input name="table_lx" type="text" id="table_lx" size="20" maxlength="50" value="<?php echo $conf['sy']['table_lx']?>"></td>
  </tr>
  <tr class="tdbg">
    <td  align="right">信息表名：</td>
    <td><input name="table_co" type="text" id="table_co" size="20" maxlength="50" value="<?php echo $conf['sy']['table_co']?>"></td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否需要分类：</td>
    <td>
        <input name="need_lm" type="radio" class="radio" id="need_lm" value="true" <?php if ($conf['sy']['need_lm']==true){echo' checked="checked"';}?>/>
        需要分类
        <input name="need_lm" type="radio" class="radio" id="need_lm2" value="false" <?php if ($conf['sy']['need_lm']==false){echo' checked="checked"';}?> />
        不需要分类    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否需要类型：</td>
    <td>
        <input name="need_lx" type="radio" class="radio" id="need_lx" value="true" <?php if ($conf['sy']['need_lx']==true){echo' checked="checked"';}?>/>
        需要类型
        <input name="need_lx" type="radio" class="radio" id="need_lx2" value="false" <?php if ($conf['sy']['need_lx']==false){echo' checked="checked"';}?> />
        不需要类型    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">图标大小：</td>
    <td>
        <input name="tb_size" type="radio" class="radio" id="tb_size" value="d" <?php if ($conf['sy']['tb_size']=='d'){echo' checked="checked"';}?>/>
        大图标
        &nbsp;&nbsp;&nbsp; <input name="tb_size" type="radio" class="radio" id="tb_size2" value="x" <?php if ($conf['sy']['tb_size']=='x'){echo' checked="checked"';}?> />
        小图标    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">显示昵称：</td>
    <td>
        <input name="rename_show" type="radio" class="radio" id="rename_show" value="true" <?php if ($conf['sy']['rename_show']==true){echo' checked="checked"';}?>/>
        显示昵称
        <input name="rename_show" type="radio" class="radio" id="rename_show2" value="false" <?php if ($conf['sy']['rename_show']==false){echo' checked="checked"';}?> />
        不显示昵称   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">图标类型：</td>
    <td>
        <input name="tb_type" type="radio" class="radio" id="tb_type" value="web" <?php if ($conf['sy']['tb_type']=='web'){echo' checked="checked"';}?>/>
        网上图标
        <input name="tb_type" type="radio" class="radio" id="tb_type2" value="local" <?php if ($conf['sy']['tb_type']=='local'){echo' checked="checked"';}?> />
        本地图标    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">最多几级分类：</td>
    <td>
	<input name="level_lm" type="text" id="level_lm" size="10" maxlength="50" value="<?php echo $conf['sy']['level_lm']?>"> 0为不限制</td>
  </tr>
</table>
</div>

<div id="con_2" class="con" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">是否启用多语言：</td>
    <td>
        <input name="mlang_lm" type="radio" class="radio" id="mlang_lm" value="true" <?php if ($conf['lm']['mlang']==true){echo' checked="checked"';}?> />
        启用
        <input name="mlang_lm" type="radio" class="radio" id="mlang_lm2" value="false" <?php if ($conf['lm']['mlang']==false){echo' checked="checked"';}?> />
        不启用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否可以 添加分类：</td>
    <td>
        <input name="add_lm" type="radio" class="radio" id="add_lm" value="true" <?php if ($conf['lm']['add_lm']==true){echo' checked="checked"';}?> />
        可以
        <input name="add_lm" type="radio" class="radio" id="add_lm2" value="false" <?php if ($conf['lm']['add_lm']==false){echo' checked="checked"';}?>/>
        不可以    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 分类属性：</td>
    <td>
        <input name="con_att_lm" type="radio" class="radio" id="con_att_lm" value="true"  <?php if ($conf['lm']['con_att']==true){echo' checked="checked"';}?> />
        显示
        <input name="con_att_lm" type="radio" class="radio" id="con_att_lm2" value="false" <?php if ($conf['lm']['con_att']==false){echo' checked="checked"';}?> />
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 推荐按钮：</td>
    <td>
        <input name="tuijian_lm" type="radio" class="radio" id="tuijian_lm" value="true"  <?php if ($conf['lm']['tuijian']==true){echo' checked="checked"';}?> />
        显示
        <input name="tuijian_lm" type="radio" class="radio" id="tuijian_lm2" value="false" <?php if ($conf['lm']['tuijian']==false){echo' checked="checked"';}?> />
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 热门按钮：</td>
    <td>
        <input name="hot_lm" type="radio" class="radio" id="hot_lm" value="true"  <?php if ($conf['lm']['hot']==true){echo' checked="checked"';}?> />
        显示
        <input name="hot_lm" type="radio" class="radio" id="hot_lm2" value="false" <?php if ($conf['lm']['hot']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 屏蔽按钮：</td>
    <td>
        <input name="pass_lm" type="radio" class="radio" id="pass_lm" value="true"  <?php if ($conf['lm']['pass']==true){echo' checked="checked"';}?> />
        显示
        <input name="pass_lm" type="radio" class="radio" id="pass_lm2" value="false" <?php if ($conf['lm']['pass']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
</table>
</div>

<div id="con_3" class="con" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">是否启用多语言：</td>
    <td>
        <input name="mlang" type="radio" class="radio" id="mlang" value="true" <?php if ($conf['co']['mlang']==true){echo' checked="checked"';}?> />
        启用
        <input name="mlang" type="radio" class="radio" id="mlang2" value="false" <?php if ($conf['co']['mlang']==false){echo' checked="checked"';}?> />
        不启用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否可以 添加信息：</td>
    <td>
        <input name="add_xx" type="radio" class="radio" id="add_xx" value="true" <?php if ($conf['co']['add_xx']==true){echo' checked="checked"';}?> />
        可以
        <input name="add_xx" type="radio" class="radio" id="add_xx2" value="false" <?php if ($conf['co']['add_xx']==false){echo' checked="checked"';}?>/>
        不可以    </td>
  </tr>

  <tr class="tdbg">
    <td align="right">是否使用 昵称：</td>
    <td>
        <input name="rename" type="radio" class="radio" id="rename" value="true" <?php if ($conf['co']['rename']==true){echo' checked="checked"';}?> />
        使用
        <input name="rename" type="radio" class="radio" id="rename2" value="false" <?php if ($conf['co']['rename']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 使用人：</td>
    <td>
        <input name="uename" type="radio" class="radio" id="uename" value="true" <?php if ($conf['co']['uename']==true){echo' checked="checked"';}?> />
        使用
        <input name="uename" type="radio" class="radio" id="uename2" value="false" <?php if ($conf['co']['uename']==false){echo' checked="checked"';}?>/>
        不使用    
      </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 发布时间：</td>
    <td>
        <input name="wtime" type="radio" class="radio" id="wtime" value="true" <?php if ($conf['co']['wtime']==true){echo' checked="checked"';}?> />
        使用
        <input name="wtime" type="radio" class="radio" id="wtime2" value="false" <?php if ($conf['co']['wtime']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 置顶按钮：</td>
    <td>
        <input name="ding" type="radio" class="radio" id="ding" value="true" <?php if ($conf['co']['ding']==true){echo' checked="checked"';}?> />
        显示
        <input name="ding" type="radio" class="radio" id="ding2" value="false" <?php if ($conf['co']['ding']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 推荐按钮：</td>
    <td>
        <input name="tuijian" type="radio" class="radio" id="tuijian" value="true" <?php if ($conf['co']['tuijian']==true){echo' checked="checked"';}?> />
        显示
        <input name="tuijian" type="radio" class="radio" id="tuijian2" value="false" <?php if ($conf['co']['tuijian']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 热门按钮：</td>
    <td>
        <input name="hot" type="radio" class="radio" id="hot" value="true" <?php if ($conf['co']['hot']==true){echo' checked="checked"';}?> />
        显示
        <input name="hot" type="radio" class="radio" id="hot2" value="false" <?php if ($conf['co']['hot']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 屏蔽按钮：</td>
    <td>
        <input name="pass" type="radio" class="radio" id="pass" value="true" <?php if ($conf['co']['pass']==true){echo' checked="checked"';}?> />
        显示
        <input name="pass" type="radio" class="radio" id="pass2" value="false" <?php if ($conf['co']['pass']==false){echo' checked="checked"';}?>/>
        不显示    </td>
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

<script>
function setdiv(tit_obj,con_obj){
	$('.tit').removeClass('cur');
	$('#'+tit_obj).addClass('cur');
	$('.con').css('display','none');
	$('#'+con_obj).css('display','');
}
</script>
<?php
}
?>
</body>
</html>
