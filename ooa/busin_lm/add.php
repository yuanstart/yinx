<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_lm_add');//检查权限
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加分类</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	<?php
	foreach ($cong['mlang'] as $k=>$v){
		if ($v['must']==true){
	?>
	if(gt('title_lm<?php echo $v['lang']?>').value==''){
		alert('<?php echo $v['name']?>分类名称不能为空');
		gt('title_lm<?php echo $v['lang']?>').focus();
		return false;
	}
	<?php
		}
		if ($conf['lm']['mlang']!=true){
			break;
		}
	}
	?>
	if(gt('px').value==''){
		alert('分类的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加分类</td>
  </tr>
  <tr class="tdbg" <?php if ($conf['lm']['add_lm']==false){echo ' style="display:none;"';}?>>
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加分类</a></td>
  </tr>
</table>

<br />
<FORM name="form1" method="post" action="addd.php" onSubmit="return check()">
<div id="tits" class="subnav">
    <ul>
    	<?php
        if ($cong['sy_seo']==true&&$conf['lm']['seo']==true){
			echo '<li onclick="settab(\'tits\',\'con\',1)" class="cur" >详细信息</li>';
			echo '<li onclick="settab(\'tits\',\'con\',2)" class="">seo设置</li>';
        }
		?>
    </ul>
</div>
<div id="con_1">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="120" align="right">上级分类：</td>
    <td>
    <select name="fid" id="fid">
      <option value="0" selected="selected">无{作为一级分类}</option>
    	<?php
		//把所有分类放到$rss数组里
        $rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' order by `px` desc,`id_lm` asc');
		//无限级分类开始
		addlm($rss,0,'');
		//通过$fid来判读当前循环哪个级别，然后不断地递归循环
		function addlm($rss,$fid,$i){
			//通过判断$i为空设定一级分类的标志为"• "，同时为二级判断留下标志
			if ($i==''){
				$i='• ';
			//通过判断$i为"• "设定二级分类的标志为" 　|—"
			}elseif ($i=='• '){
				$i=' 　|—';
			//其他级别的标志全部都是" 　|"加上上一级的标志
			}else{
				$i=' 　|'.$i;
			}
			//遍历所有分类数组根据传入的$fid来显示哪个级别，同时继续执行自己
			foreach($rss as $rs){
				if($rs['fid']==$fid&&$rs['add_xia']=='yes'){
					echo'<option value="'.$rs["id_lm"].'">'.$i.$rs["title_lm"].'</option>'."\n";
					addlm($rss,$rs['id_lm'],$i);
				}
			}
		}
		?>
    </select>
    </td>
  </tr>
  <?php
  foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>分类名称：</td>
    <td>
    <INPUT name="title_lm<?php echo $v['lang']?>" type="text" id="title_lm<?php echo $v['lang']?>" size="30" maxlength="150">
    <?php 
	if ($v['must']==true){
		echo '<span class="red">*</span>';
	}
	?>
    </td>
  </tr>
  <?php
	if ($conf['lm']['mlang']!=true){
		break;
	}
  }
  ?>
  <?php
  if ($conf['lm']['apname_lm']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">页面名称：</td>
    <td><INPUT name="apname_lm" type="text" id="apname_lm" size="30" maxlength="50"> 
    <span class="hui">用作自定义页面名称的伪静态,不用填写后缀 例如 product.html 填写 product</span></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['lm']['url_lm']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">连接地址：</td>
    <td><INPUT name="url_lm" type="text" id="url_lm" size="57" maxlength="250"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['lm']['f_body_lm']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td align="right"><?php echo $v['name']?>简要介绍：</td>
    <td ><textarea name="f_body_lm<?php echo $v['lang']?>" rows="4" id="f_body_lm<?php echo $v['lang']?>" style="width:450px;"></textarea></td>
  </tr>
  <?php
		if ($conf['lm']['mlang']!=true){
			break;
		}
  	}
  }
  ?>
  <?php
  if ($conf['lm']['z_body_lm']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>详细介绍：</td>
    <td>
    <textarea id="z_body_lm<?php echo $v['lang']?>" name="z_body_lm<?php echo $v['lang']?>" style="width:670px;height:300px;display:none;"></textarea>
    </td>
  </tr>
  <?php
		if ($conf['lm']['mlang']!=true){
			break;
		}
  	}
  ?>
    <link rel="stylesheet" href="../kd_html/themes/default/default.css" />
    <script charset="utf-8" src="../kd_html/kindeditor.js"></script>
    <script charset="utf-8" src="../kd_html/lang/zh_CN.js"></script>
    <script>
        var editor;
		//设置参数
        var options = {
			allowFileManager : true,
			newlineTag : 'br'
		};
        KindEditor.ready(function(K) {
			//创建编辑器,如需创建多个编辑器，只要复制多下面这行代码，然后改一下名字
		  <?php
		   foreach ($cong['mlang'] as $k=>$v){
		  ?>
			K.create('textarea[name="z_body_lm<?php echo $v['lang']?>"]',options);
		  <?php
			if ($conf['lm']['mlang']!=true){
				break;
			}
		  }
		  ?>
        });
    </script>
  <?php
  }
  ?>
  <?php
  if ($conf['lm']['img_sl_lm']==true&&$conf_ul=read_config('conf_ul')){
  ?>
  <tr class="tdbg" >          
    <td width="120" align="right">图片上传：</td>          
    <td >
    <IFRAME name="frame1" id="frame1" src="up_image_tool/up.php?frameid=frame1&kuang=img_sl_lm" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="img_sl_lm" id="img_sl_lm">
    <?php
    if(!empty($conf_ul['up']['text'])){
	?>
        <br /><span class="red"><?php echo $conf_ul['up']['text']?></span>
    <?php
    }
	?>
    </td>
  </tr>
  <?php
  }
  ?>
<tr class="tdbg" <?php if ($conf['lm']['con_att']==false){echo 'style="display:none;"';}?>>
    <td width="120" align="right">分类属性：</td>
    <td><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="23">
              <input name="add_xx" type="radio" class="radio" id="add_xx" value="yes" checked>
              可以添加信息
			  <input name="add_xx" type="radio" class="radio" id="add_xx2" value="no">			
			  不可以添加信息
            </td>
            </tr>
            <tr>
              <td height="23">
              <input name="add_xia" type="radio" class="radio" id="add_xia" value="yes" checked />
                可以添加下级分类
                <input name="add_xia" type="radio" class="radio" id="add_xia2" value="no" />
                不可以添加下级分类
              </td>
            </tr>
            <tr>
              <td height="23">
                <input name="con_att" type="radio" class="radio" id="con_att" value="1" checked="checked" />
                完全控制
                <input name="con_att" type="radio" class="radio" id="con_att2" value="2" />
                只能读取、修改(不能删除)
                <input name="con_att" type="radio" class="radio" id="con_att3" value="3" />
                只能读取(不能修改，不能删除)
              </td>
            </tr>
      </table></td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
</table>
</div>
<div id="con_2" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right"><?php echo $v['name']?>页面标题：</td>
    <td>
    <textarea name="ym_tit<?php echo $v['lang']?>" cols="80" rows="3"></textarea><br />
	建议填写不超过80个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['lm']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right" ><?php echo $v['name']?>页面关键字：</td>
    <td >
    <textarea name="ym_key<?php echo $v['lang']?>" cols="80" rows="3"></textarea><br />
	建议填写不超过100个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['lm']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right" class="tdbg"><?php echo $v['name']?>页面描述：</td>
    <td><textarea name="ym_des<?php echo $v['lang']?>" cols="80" rows="3"></textarea><br />
    建议填写不超过200个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['lm']['mlang']!=true){
		break;
	}
}
?></table>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
