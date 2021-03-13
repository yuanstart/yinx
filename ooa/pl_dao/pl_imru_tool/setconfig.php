<?php
require('../../../include/common.inc.php');
checklogin();
$conf=read_config('config');//读取本系统配置文件
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批量上传设置</title>
<link href="../../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../../scripts/function.js"></script>
<script src="../../scripts/jquery.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">批量上传设置</td>
  </tr>
</table>
<br />
<FORM name="form1" method="post" action="setconfigg.php">
<div class="subnav">
    <ul></ul>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td align="right">多语言：</td>
    <td>
        <input name="mlang" type="radio" class="radio" id="mlang" value="true" <?php if ($conf['sy']['mlang']==true){echo' checked="checked"';}?> />
        启用
        <input name="mlang" type="radio" class="radio" id="mlang" value="false" <?php if ($conf['sy']['mlang']==false){echo' checked="checked"';}?> />
        不启用
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">使用分类：</td>
    <td>
        <input name="need_lm" type="radio" class="radio" id="need_lm" value="true" <?php if ($conf['sy']['need_lm']==true){echo' checked="checked"';}?>/>
        使用
        <input name="need_lm" type="radio" class="radio" id="need_lm2" value="false" <?php if ($conf['sy']['need_lm']==false){echo' checked="checked"';}?> />
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">权限前缀：</td>
    <td><input name="pre" type="text" id="pre" size="20" maxlength="50" value="<?php echo $conf['sy']['pre']?>"> 每个系统的权限前缀标识 &nbsp;例如：新闻系统的权限前缀为news</td>
  </tr>
  <tr class="tdbg">
    <td  width="120" align="right">分类表名：</td>
    <td><input name="table_lm" type="text" id="table_lm" size="20" maxlength="50" value="<?php echo $conf['sy']['table_lm']?>"></td>
  </tr>
  <tr class="tdbg">
    <td  align="right">信息表名：</td>
    <td><input name="table_co" type="text" id="table_co" size="20" maxlength="50" value="<?php echo $conf['sy']['table_co']?>"></td>
  </tr>

  <tr class="tdbg">
    <td align="right">图片上传设置：</td>
    <td>
        <table border="0" cellpadding="2" cellspacing="1" >
          <tr class="tdbg2">
            <td align="right">上传目录：</td>
            <td><input name="path" type="text" size="20" maxlength="50" value="<?php echo $conf['up']['path']?>"> 放在网站目录下的文件夹</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >上传大小：</td>
            <td ><input name="maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf['up']['maxsize']?>">
            B</td>
          </tr>
          <tr class="tdbg2">
            <td align="right">上传提醒：</td>
            <td><input name="text" type="text"  size="40" maxlength="50" value="<?php echo $conf['up']['text']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >缩&nbsp; 略&nbsp; 图：</td>
            <td>
              <input name="sm" type="radio" class="radio"  value="true" onclick="disdiv('tb_s')" <?php if ($conf['up']['sm']==true){echo' checked="checked"';}?> >
              是
              <input name="sm" type="radio" class="radio"  value="false" onclick="clodiv('tb_s')" <?php if ($conf['up']['sm']==false){echo' checked="checked"';}?> >
              否 
            <table border="0" cellspacing="0" cellpadding="2" id="tb_s" <?php if ($conf['up']['sm']!=true){echo ' style="display:none;"';}?>>
            <tbody>
            <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
            <?php
            foreach($conf['sm'] as $k=>$v){
            ?>
                  <tr>
                      <td>名称</td>
                      <td><input name="s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                      <td>类型</td>
                      <td>
                        <select name="s_typ[]" >
                            <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                            <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                        </select>
                      </td>
                      <td>宽度</td>
                      <td><input name="s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                      <td>高度</td>
                      <td><input name="s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
                      <?php
                      if ($k==0){
					  ?>
                      <td><a class="icon jia" onclick="add_tr(this,'')"></a></td>
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
     </td>
  </tr>
</table>
</div>


<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 保 存 " class="btn"></td>
  </tr>
</table>
</FORM>
<script>
function add_tr(obj,name){
	str ='<tr>';
	str+='<td>名称</td>';
	str+='<td><input name="'+name+'s_nam[]" type="text" size="8" maxlength="50" value=""></td>';
	str+='<td>类型</td>';
	str+='<td>';
	str+='<select name="'+name+'s_typ[]" >';
	str+='<option value="true">固定尺寸</option>';
	str+='<option value="false" selected="selected">不超过尺寸</option>';
	str+='</select>';
	str+='</td>';
	str+='<td>宽度</td>';
	str+='<td><input name="'+name+'s_wid[]"  type="text" size="8"/></td>';
	str+='<td>高度</td>';
	str+='<td><input name="'+name+'s_hei[]"  type="text" size="8"/></td>';
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
</body>
</html>
