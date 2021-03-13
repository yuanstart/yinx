<?php
require('../../include/common.inc.php');
checklogin();

//查询记录
$row=$db->getrs('select * from '.table('setup_gl').' where `id`=1');
if (!$row){
	msg('该信息不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站配置</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/jquery.js"></script>
<script src="../scripts/function.js"></script>
</head>

<body>
<?php
$nav=1;
require('menu.php');
?>
<FORM name="form1" method="post" action="make.php?act=post" onSubmit="return check()">
<div id="tits" class="subnav">
<ul></ul>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td align="right" width="150">是否 启用伪静态：</td>
    <td>
        <input name="rewrite" type="radio" class="radio" id="rewrite" value="1" <?php if ($row['rewrite']==1){ echo ' checked="checked"';}?> />
        启用普通伪静态
        <input name="rewrite" type="radio" class="radio" id="rewrite" value="2" <?php if ($row['rewrite']==2){ echo ' checked="checked"';}?> />
        启用自定义名称伪静态
        <input name="rewrite" type="radio" class="radio" id="rewrite2" value="0"  <?php if ($row['rewrite']==0){ echo ' checked="checked"';}?>/>
        不启用
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否 启用各系统seo：</td>
    <td>
        <input name="sy_seo" type="radio" class="radio" id="sy_seo" value="1"  <?php if ($row['sy_seo']==1){ echo ' checked="checked"';}?>/>
        启用
        <input name="sy_seo" type="radio" class="radio" id="sy_seo2" value="0"  <?php if ($row['sy_seo']==0){ echo ' checked="checked"';}?> />
        不启用
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否 启用日志：</td>
    <td>
        <input name="log" type="radio" class="radio" id="log" value="1" <?php if ($row['log']==1){ echo ' checked="checked"';}?> />
        启用
        <input name="log" type="radio" class="radio" id="log2" value="0"  <?php if ($row['log']==0){ echo ' checked="checked"';}?>/>
        不启用
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否 启用关键词内链：</td>
    <td>
        <input name="key" type="radio" class="radio" id="key" value="1" <?php if ($row['key']==1){ echo ' checked="checked"';}?> />
        启用
        <input name="key" type="radio" class="radio" id="key2" value="0"  <?php if ($row['key']==0){ echo ' checked="checked"';}?>/>
        不启用
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">多语言设置：</td>
    <td> 
        <table border="0" cellspacing="0" cellpadding="2" >
        <tbody>
        <tr><td colspan="9" style="color:#0000FF;"></td></tr>
        <?php
		$mlang=unserialize($row['mlang']);
        foreach($mlang as $k=>$v){
        ?>
              <tr>
                  <td>语言名称</td>
                  <td><input name="name[]" type="text" size="8" maxlength="50" value="<?php echo $v['name']?>"></td>
                  <td>文件路径</td>
                  <td><input name="path[]"  type="text" size="8" value="<?php echo $v['path']?>"/></td>
                  <td>字段后缀</td>
                  <td><input name="lang[]"  type="text" size="8" value="<?php echo $v['lang']?>"/></td>
                  <td>必填项</td>
                  <td>
                    <select name="must[]" >
                        <option value="true"  <?php if ($v['must']==true){echo' selected="selected"';}?>>必填</option>
                        <option value="false" <?php if ($v['must']==false){echo' selected="selected"';}?>>选填</option>
                    </select>
                  </td>
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
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="150">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 提 交 " class="btn"></td>
  </tr>
</table>
</FORM>
<script>
function add_tr(obj,name){
	str ='<tr>';
	str+='<td>语言名称</td>';
	str+='<td><input name="'+name+'name[]" type="text" size="8" maxlength="50" value=""></td>';
	str+='<td>文件路径</td>';
	str+='<td><input name="'+name+'path[]"  type="text" size="8"/></td>';
	str+='<td>字段后缀</td>';
	str+='<td><input name="'+name+'lang[]"  type="text" size="8"/></td>';
	str+='<td>必填项</td>';
	str+='<td>';
	str+='<select name="'+name+'must[]" >';
	str+='<option value="true" >必填</option>';
	str+='<option value="false" selected="selected">选填</option>';
	str+='</select>';
	str+='</td>';
	str+='<td><a class="icon jian" onclick="del_tr(this)"></a></td>';
	str+='</tr>';
	$(obj).parent().parent().parent().append(str);
}

function del_tr(obj){
	$(obj).parent().parent().remove();
}
</script>
</body>
</html>
