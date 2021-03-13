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
    <td  align="right">信息表名：</td>
    <td><input name="table_co" type="text" id="table_co" size="20" maxlength="50" value="<?php echo $conf['sy']['table_co']?>"></td>
  </tr>
  <tr class="tdbg">
    <td  align="right">应聘表名：</td>
    <td><input name="table_yp" type="text" id="table_yp" size="20" maxlength="50" value="<?php echo $conf['sy']['table_yp']?>"></td>
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
    <td align="right">最多几级分类：</td>
    <td>
	<input name="level_lm" type="text" id="level_lm" size="10" maxlength="50" value="<?php echo $conf['sy']['level_lm']?>"> 0为不限制</td>
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
    <td width="180" align="right">是否启用多语言：</td>
    <td>
        <input name="mlang_lm" type="radio" class="radio" id="mlang_lm" value="true" <?php if ($conf['lm']['mlang']==true){echo' checked="checked"';}?> />
        启用
        <input name="mlang_lm" type="radio" class="radio" id="mlang_lm2" value="false" <?php if ($conf['lm']['mlang']==false){echo' checked="checked"';}?> />
        不启用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否启用 分类seo：</td>
    <td>
        <input name="seo_lm" type="radio" class="radio" id="seo_lm" value="true" <?php if ($conf['lm']['seo']==true){echo' checked="checked"';}?> />
        启用
        <input name="seo_lm" type="radio" class="radio" id="seo_lm2" value="false" <?php if ($conf['lm']['seo']==false){echo' checked="checked"';}?> />
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
    <td align="right">分类是否使用 页面名称：</td>
    <td>
        <input name="apname_lm" type="radio" class="radio"  value="true"  <?php if ($conf['lm']['apname_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="apname_lm" type="radio" class="radio" value="false" <?php if ($conf['lm']['apname_lm']==false){echo' checked="checked"';}?> />
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否使用 链接地址：</td>
    <td>
        <input name="url_lm" type="radio" class="radio" id="url_lm" value="true"  <?php if ($conf['lm']['url_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="url_lm" type="radio" class="radio" id="url_lm2" value="false" <?php if ($conf['lm']['url_lm']==false){echo' checked="checked"';}?> />
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否使用 详细介绍：</td>
    <td>
        <input name="z_body_lm" type="radio" class="radio" id="z_body_lm" value="true"  <?php if ($conf['lm']['z_body_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="z_body_lm" type="radio" class="radio" id="z_body_lm2" value="false" <?php if ($conf['lm']['z_body_lm']==false){echo' checked="checked"';}?>/>
        不使用    </td>
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
    <td align="right">是否启用 信息seo：</td>
    <td>
        <input name="seo" type="radio" class="radio" id="seo" value="true"  <?php if ($conf['co']['seo']==true){echo' checked="checked"';}?> />
        启用
        <input name="seo" type="radio" class="radio" id="seo2" value="false" <?php if ($conf['co']['seo']==false){echo' checked="checked"';}?>/>
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
    <td align="right">是否使用 页面名称：</td>
    <td>
        <input name="apname" type="radio" class="radio" value="true" <?php if ($conf['co']['apname']==true){echo' checked="checked"';}?> />
        使用
        <input name="apname" type="radio" class="radio" value="false" <?php if ($conf['co']['apname']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 链接地址：</td>
    <td>
        <input name="link_url" type="radio" class="radio" id="link_url" value="true" <?php if ($conf['co']['link_url']==true){echo' checked="checked"';}?> />
        使用
        <input name="link_url" type="radio" class="radio" id="link_url2" value="false" <?php if ($conf['co']['link_url']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 人数：</td>
    <td>
        <input name="num" type="radio" class="radio" id="num" value="true" <?php if ($conf['co']['num']==true){echo' checked="checked"';}?> />
        使用
        <input name="num" type="radio" class="radio" id="num2" value="false" <?php if ($conf['co']['num']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 工作地点：</td>
    <td>
        <input name="address" type="radio" class="radio" id="address" value="true" <?php if ($conf['co']['address']==true){echo' checked="checked"';}?> />
        使用
        <input name="address" type="radio" class="radio" id="address2" value="false" <?php if ($conf['co']['address']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 开始日期：</td>
    <td>
        <input name="stime" type="radio" class="radio" id="stime" value="true" <?php if ($conf['co']['stime']==true){echo' checked="checked"';}?> />
        使用
        <input name="stime" type="radio" class="radio" id="stime2" value="false" <?php if ($conf['co']['stime']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 结束日期：</td>
    <td>
        <input name="etime" type="radio" class="radio" id="etime" value="true" <?php if ($conf['co']['etime']==true){echo' checked="checked"';}?> />
        使用
        <input name="etime" type="radio" class="radio" id="etime2" value="false" <?php if ($conf['co']['etime']==false){echo' checked="checked"';}?>/>
        不使用    
      </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 任职要求：</td>
    <td>
        <input name="f_body" type="radio" class="radio" id="f_body" value="true" <?php if ($conf['co']['f_body']==true){echo' checked="checked"';}?> />
        使用
        <input name="f_body" type="radio" class="radio" id="f_body2" value="false" <?php if ($conf['co']['f_body']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 职位描述：</td>
    <td>
        <input name="z_body" type="radio" class="radio" id="z_body" value="true" <?php if ($conf['co']['z_body']==true){echo' checked="checked"';}?> />
        使用
        <input name="z_body" type="radio" class="radio" id="z_body2" value="false" <?php if ($conf['co']['z_body']==false){echo' checked="checked"';}?>/>
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
function add_tr(obj,name){
	str ='<tr>';
	str+='<td>名称</td>';
	str+='<td><input name="'+name+'_s_nam[]" type="text" size="8" maxlength="50" value=""></td>';
	str+='<td>类型</td>';
	str+='<td>';
	str+='<select name="'+name+'_s_typ[]" >';
	str+='<option value="true">固定尺寸</option>';
	str+='<option value="false" selected="selected">不超过尺寸</option>';
	str+='</select>';
	str+='</td>';
	str+='<td>宽度</td>';
	str+='<td><input name="'+name+'_s_wid[]"  type="text" size="8"/></td>';
	str+='<td>高度</td>';
	str+='<td><input name="'+name+'_s_hei[]"  type="text" size="8"/></td>';
	str+='<td><a class="icon jian" onclick="del_tr(this)"></a></td>';
	str+='</tr>';
	$(obj).parent().parent().parent().append(str);
}

function del_tr(obj){
	$(obj).parent().parent().remove();
}

function setdiv(tit_obj,con_obj){
	$('.tit').removeClass('cur');
	$('#'+tit_obj).addClass('cur');
	$('.con').css('display','none');
	$('#'+con_obj).css('display','');
}

function disdiv(tit_obj){
	$('#'+tit_obj).css('display','');
}
function clodiv(tit_obj){
	$('#'+tit_obj).css('display','none');
}
</script>
<?php
}
?>
</body>
</html>
