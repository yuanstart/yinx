<?php
require('../../../include/common.inc.php');
checklogin();
$conf=read_config('config');//读取本系统配置文件
$act=(!empty($_GET['act']))?html($_GET['act']):'';
if ($act=='post'){
	$tabname=(!empty($_GET['tabname']))?html($_GET['tabname']):'';
	if ($tabname==''){
		echo '参数错误';
		exit();
	}
	echo '<input type="checkbox" class="checkbox yi" name="s_email_all"/>全选';
    echo '<ul class="fields_list">';
	$arr=$db->getrss('show fields from '.table($tabname).'');
    foreach ($arr as $v){
		$str='';
		if (strpos(','.$conf['sy']['fields'].',',','.$v['Field'].',')!==false){
			$str='checked="checked"';
		}
		echo '<li><input type="checkbox" class="checkbox er" name="fields[]" value="'.$v['Field'].'" '.$str.' />'.$v['Field'].'</li>';
	}
    echo '</ul>';
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批量导入设置</title>
<link href="../../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../../scripts/function.js"></script>
<script src="../../scripts/jquery.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">批量导入设置</td>
  </tr>
</table>
<br />
<FORM name="form1" method="post" action="setconfigg.php">
<div class="subnav">
    <ul></ul>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="120" align="right">使用分类：</td>
    <td>
    	<input name="need_lm" type="radio" class="radio" id="need_lm" value="true"  <?php if ($conf['sy']['need_lm']==true){echo' checked="checked"';}?> onclick="disdiv('tb_s')" />
        <label for="need_lm">使用</label>
        <input name="need_lm" type="radio" class="radio" id="need_lm2" value="false"  <?php if ($conf['sy']['need_lm']==false){echo' checked="checked"';}?> onclick="clodiv('tb_s')"/>
        <label for="need_lm2">不使用</label>
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">权限前缀：</td>
    <td><input name="pre" type="text" id="pre" size="20" maxlength="50" value="<?php echo $conf['sy']['pre']?>"> 每个系统的权限前缀标识 &nbsp;例如：新闻系统的权限前缀为news</td>
  </tr>
  <tr class="tdbg" id="tb_s"  <?php if ($conf['sy']['need_lm']!=true){echo ' style="display:none;"';}?>>
    <td align="right">分类表名：</td>
    <td><input name="table_lm" type="text" id="table_lm" size="20" maxlength="50" value="<?php echo $conf['sy']['table_lm']?>"></td>
  </tr>
  <tr class="tdbg">
    <td  align="right">信息表名：</td>
    <td><input name="table_co" type="text" id="table_co" size="20" maxlength="50" value="<?php echo $conf['sy']['table_co']?>" onblur="show_fields()"></td>
  </tr>
  <tr class="tdbg">
    <td align="right">CSV字段：</td>
    <td id="sou_result">
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">表必填默认值字段：</td>
    <td>
        <table border="0" cellspacing="0" cellpadding="2" >
        <tbody>
        <tr><td colspan="9" style="color:#0000FF;"></td></tr>
        <?php
		$b=0;
        foreach($conf['sy']['mr_fields'] as $k=>$v){
        ?>
              <tr>
                  <td>字段名</td>
                  <td><input name="fname[]" type="text" size="8" maxlength="50" value="<?php echo $k?>"></td>
                  <td>默认值</td>
                  <td>
                    <select name="ftype[]" >
                        <option value="str"  <?php if ($conf['sy']['mr_fields_type'][$k]=='str'){echo' selected="selected"';}?>>值</option>
                        <option value="fun" <?php if ($conf['sy']['mr_fields_type'][$k]=='fun'){echo' selected="selected"';}?>>函数</option>
                    </select>
                  </td>
                  <td><input name="fvalue[]"  type="text" size="8" value="<?php echo $v?>"/></td>
                  <?php
                  if ($b==0){
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
		 	$b++;
         }
         ?>
          </tbody>
        </table>
    </td>
  </tr>
</table>
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
	str+='<td>字段名</td>';
	str+='<td><input name="'+name+'fname[]" type="text" size="8" maxlength="50" ></td>';
	str+='<td>默认值</td>';
	str+='<td>';
	str+='<select name="ftype[]" >';
	str+='<option value="str" selected="selected">值</option>';
	str+='<option value="fun">函数</option>';
	str+='</select>';
	str+='</td>';
	str+='<td><input name="'+name+'fvalue[]" type="text" size="8" maxlength="50"/></td>';
	str+='<td><a class="icon jian" onclick="del_tr(this)"></a></td>';
	str+='</tr>';
	$(obj).parent().parent().parent().append(str);
}

function del_tr(obj){
	$(obj).parent().parent().remove();
}

function disdiv(tit_obj){
	$('#'+tit_obj).css('display','');
}
function clodiv(tit_obj){
	$('#'+tit_obj).css('display','none');
}
function show_fields(){
	$.ajax({
		type:'get',
		url:'setconfig.php',
		data:{'act':'post','tabname':$('#table_co').val()},
		cache:false,
		beforeSend:function(){
			$('#sou_result').html('<img id="loader" src="../images/loading.gif">');
			$('#loader').css({position:'absolute',left:250,top:200})
		},
		success:function(data){
			$('#sou_result').html(data);
			$(".yi").click(function(){
				var status=$(this).is(':checked');
				$('.er').each(function(){
					$(this).prop("checked",status);
				});
			})
		}
	});
}
show_fields();
</script>
</body>
</html>
