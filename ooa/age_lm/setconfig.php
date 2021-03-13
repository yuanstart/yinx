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
    <td  align="right">分类表名：</td>
    <td><input name="table_lm" type="text" id="table_lm" size="20" maxlength="50" value="<?php echo $conf['sy']['table_lm']?>"></td>
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
</table>
</div>

<div id="con_2" class="con" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">是否启用 信息seo：</td>
    <td>
        <input name="seo" type="radio" class="radio" id="seo" value="true"  <?php if ($conf['co']['seo']==true){echo' checked="checked"';}?> />
        启用
        <input name="seo" type="radio" class="radio" id="seo2" value="false" <?php if ($conf['co']['seo']==false){echo' checked="checked"';}?>/>
        不启用
     </td>
  </tr>

  <tr class="tdbg">
    <td align="right">是否使用 代理编号：</td>
    <td>
        <input name="ageno" type="radio" class="radio" id="ageno" value="true" <?php if ($conf['co']['ageno']==true){echo' checked="checked"';}?> />
        使用
        <input name="ageno" type="radio" class="radio" id="ageno2" value="false" <?php if ($conf['co']['ageno']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 代理地区：</td>
    <td>
        <input name="area" type="radio" class="radio" id="area" value="true" <?php if ($conf['co']['area']==true){echo' checked="checked"';}?> />
        使用
        <input name="area" type="radio" class="radio" id="area2" value="false" <?php if ($conf['co']['area']==false){echo' checked="checked"';}?>/>
        不使用
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 身&nbsp;&nbsp; 份 证：</td>
    <td>
        <input name="idcard" type="radio" class="radio" id="idcard" value="true" <?php if ($conf['co']['idcard']==true){echo' checked="checked"';}?> />
        使用
        <input name="idcard" type="radio" class="radio" id="idcard2" value="false" <?php if ($conf['co']['idcard']==false){echo' checked="checked"';}?>/>
        不使用
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 微&nbsp; 信&nbsp; 号：</td>
    <td>
        <input name="wx" type="radio" class="radio" id="wx" value="true" <?php if ($conf['co']['wx']==true){echo' checked="checked"';}?> />
        使用
        <input name="wx" type="radio" class="radio" id="wx2" value="false" <?php if ($conf['co']['wx']==false){echo' checked="checked"';}?>/>
        不使用
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 QQ号：</td>
    <td>
        <input name="qq" type="radio" class="radio" id="qq" value="true" <?php if ($conf['co']['qq']==true){echo' checked="checked"';}?> />
        使用
        <input name="qq" type="radio" class="radio" id="qq2" value="false" <?php if ($conf['co']['qq']==false){echo' checked="checked"';}?>/>
        不使用
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 电话号码：</td>
    <td>
        <input name="phone" type="radio" class="radio" id="phone" value="true" <?php if ($conf['co']['phone']==true){echo' checked="checked"';}?> />
        使用
        <input name="phone" type="radio" class="radio" id="phone2" value="false" <?php if ($conf['co']['phone']==false){echo' checked="checked"';}?>/>
        不使用
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 授权日期：</td>
    <td>
        <input name="stime" type="radio" class="radio" id="stime" value="true" <?php if ($conf['co']['stime']==true){echo' checked="checked"';}?> />
        使用
        <input name="stime" type="radio" class="radio" id="stime2" value="false" <?php if ($conf['co']['stime']==false){echo' checked="checked"';}?>/>
        不使用
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 到期日期：</td>
    <td>
        <input name="etime" type="radio" class="radio" id="etime" value="true" <?php if ($conf['co']['etime']==true){echo' checked="checked"';}?> />
        使用
        <input name="etime" type="radio" class="radio" id="etime2" value="false" <?php if ($conf['co']['etime']==false){echo' checked="checked"';}?>/>
        不使用
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 简要介绍：</td>
    <td>
        <input name="f_body" type="radio" class="radio" id="f_body" value="true" <?php if ($conf['co']['f_body']==true){echo' checked="checked"';}?> />
        使用
        <input name="f_body" type="radio" class="radio" id="f_body2" value="false" <?php if ($conf['co']['f_body']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 详细介绍：</td>
    <td>
        <input name="z_body" type="radio" class="radio" id="z_body" value="true" <?php if ($conf['co']['z_body']==true){echo' checked="checked"';}?> />
        使用
        <input name="z_body" type="radio" class="radio" id="z_body2" value="false" <?php if ($conf['co']['z_body']==false){echo' checked="checked"';}?>/>
        不使用    
      </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 图片上传：</td>
    <td>
        <input name="img_sl" type="radio" class="radio" id="img_sl" value="true" onclick="disdiv('um')" <?php if ($conf['co']['img_sl']==true){echo' checked="checked"';}?> />
        使用
        <input name="img_sl" type="radio" class="radio" id="img_sl2" value="false" onclick="clodiv('um')" <?php if ($conf['co']['img_sl']==false){echo' checked="checked"';}?>/>
        不使用
		<?php
        //加载信息图片上传的配置文件
        if($conf_um=read_config('conf_um','../')){
        ?>
        <table border="0" cellpadding="2" cellspacing="1"  id="um" <?php if ($conf['co']['img_sl']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">上传目录：</td>
            <td><input name="um_path" type="text" size="20" maxlength="50" value="<?php echo $conf_um['up']['path']?>"> 放在网站目录下的文件夹</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >上传大小：</td>
            <td ><input name="um_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_um['up']['maxsize']?>">
            B</td>
          </tr>
          <tr class="tdbg2">
            <td align="right">上传提醒：</td>
            <td><input name="um_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_um['up']['text']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >缩&nbsp; 略&nbsp; 图：</td>
            <td>
              <input name="um_sm" type="radio" class="radio"  value="true" onclick="disdiv('um_tb_s')" <?php if ($conf_um['up']['sm']==true){echo' checked="checked"';}?> >
              是
              <input name="um_sm" type="radio" class="radio"  value="false" onclick="clodiv('um_tb_s')" <?php if ($conf_um['up']['sm']==false){echo' checked="checked"';}?> >
              否 
            <table border="0" cellspacing="0" cellpadding="2" id="um_tb_s" <?php if ($conf_um['up']['sm']!=true){echo ' style="display:none;"';}?>>
            <tbody>
            <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
            <?php
            foreach($conf_um['sm'] as $k=>$v){
            ?>
                  <tr>
                      <td>名称</td>
                      <td><input name="um_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                      <td>类型</td>
                      <td>
                        <select name="um_s_typ[]" >
                            <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                            <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                        </select>
                      </td>
                      <td>宽度</td>
                      <td><input name="um_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                      <td>高度</td>
                      <td><input name="um_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
                      <?php
                      if ($k==0){
					  ?>
                      <td><a class="icon jia" onclick="add_tr(this,'um')"></a></td>
                      <?php
                      }else{
					  ?>
                      <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                      <?php
                      }
					  ?>
                  </tr>
             <?php
             }
             ?>
              </tbody>
            </table>
            </td>
          </tr>
        </table>
        <?php
        }
		?>
     </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 生成证书：</td>
    <td>
        <input name="pic_sl" type="radio" class="radio" id="pic_sl" value="true"  onclick="disdiv('pic')"  <?php if ($conf['co']['pic_sl']==true){echo' checked="checked"';}?> />
        使用
        <input name="pic_sl" type="radio" class="radio" id="pic_sl2" value="false" onclick="clodiv('pic')"  <?php if ($conf['co']['pic_sl']==false){echo' checked="checked"';}?>/>
        不使用
        <table border="0" cellspacing="0" cellpadding="2" id="pic" <?php if ($conf['co']['pic_sl']!=true){echo ' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td colspan="11">模板图片：<input name="pic_mb_sl" type="text" size="25" maxlength="50" value="<?php echo $conf['co']['mb_sl']?>"> 相对于网站根目录下的图片</td>
           </tr>
           <tr class="tdbg2">
            <td colspan="11">保存目录：<input name="pic_path" type="text" size="25" maxlength="50" value="<?php echo $conf['co']['path']?>"> 相对于网站根目录下的目录</td>
          </tr>
            <?php
            foreach($conf['pic_sl'] as $k=>$v){
            ?>
                  <tr class="tdbg2">
                      <td>X坐标</td>
                      <td><input name="pic_x[]"  type="text" size="5" value="<?php echo $v['x']?>"/></td>
                      <td>Y坐标</td>
                      <td><input name="pic_y[]"  type="text" size="5" value="<?php echo $v['y']?>"/></td>
                      <td>字体大小</td>
                      <td><input name="pic_s[]" type="text" size="5" maxlength="3" value="<?php echo $v['s']?>"></td>
                      <td>字体文件</td>
                      <td><input name="pic_f[]" type="text" size="20" maxlength="50" value="<?php echo $v['f']?>"></td>
                      <td>获取内容字段</td>
                      <td><input name="pic_t[]" type="text" size="10" maxlength="50" value="<?php echo $v['t']?>"></td>
                      <?php
                      if ($k==0){
					  ?>
                      <td><a class="icon jia" onclick="add_tr_age(this,'pic')"></a></td>
                      <?php
                      }else{
					  ?>
                      <td><a class="icon jian" onclick="del_tr_age(this)"></a></td>
                      <?php
                      }
					  ?>
                  </tr>
             <?php
             }
             ?>
		</table>

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

function add_tr_age(obj,name){
	str ='<tr class="tdbg2">';
	str+='<td>X坐标</td>';
	str+='<td><input name="'+name+'_x[]"  type="text" size="5"/></td>';
	str+='<td>Y坐标</td>';
	str+='<td><input name="'+name+'_y[]"  type="text" size="5"/></td>';
	str+='<td>字体大小</td>';
	str+='<td><input name="'+name+'_s[]"  type="text" size="5" maxlength="3"/></td>';
	str+='<td>字体文件</td>';
	str+='<td><input name="'+name+'_f[]" type="text" size="20" maxlength="50" value=""></td>';
	str+='<td>获取内容字段</td>';
	str+='<td><input name="'+name+'_t[]" type="text" size="10" maxlength="50" value=""></td>';
	str+='<td><a class="icon jian" onclick="del_tr_age(this)"></a></td>';
	str+='</tr>';
	$(obj).parent().parent().parent().append(str);
}

function del_tr_age(obj){
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
