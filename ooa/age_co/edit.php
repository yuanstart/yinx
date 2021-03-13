<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config','../');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_co_view');//检查权限

$id=isset($_GET['id'])?$_GET['id']:'';
$url=(previous())?previous():'default.php';

if ($id==''||!checknum($id)){
	msg('参数错误');
}

$id_lm='';
$add_xx='';
$row=$db->getrs('select * from '.table($conf['sy']['table_co']).' where `id`='.$id.'');
if (!$row){
	msg('该信息不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改<?php echo $conf['sy']['name'];?></title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	<?php
	if ($conf['sy']['need_lm']==true){
	?>
	if (gt('lm').value=="0"){
		alert("请选择分类");
		gt('lm').focus();
		return false;
	}
	<?php
	}
	?>
	if (gt('lm').value=="no"){
		alert("所选分类不允许添加信息");
		gt('lm').focus();
		return false;
	}
	if(gt('title').value==''){
		alert('经销商名不能为空');
		gt('title').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('显示顺序不能为空');
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
    <td colspan="2">修改<?php echo $conf['sy']['name'];?></td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加<?php echo $conf['sy']['name'];?></a></td>
  </tr>
</table>
<br />
<FORM name="form1" method="post" action="editt.php" onSubmit="return check()">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<input name="url" type="hidden" id="url" value="<?php echo $url?>"/>
<div id="tits" class="subnav">
    <ul>
    	<?php
        if ($cong['sy_seo']==true&&$conf['co']['seo']==true){
			echo '<li onclick="settab(\'tits\',\'con\',1)" class="cur" >详细信息</li>';
			echo '<li onclick="settab(\'tits\',\'con\',2)" class="">seo设置</li>';
        }
		?>
    </ul>
</div>
<div id="con_1">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg" <?php if ($conf['sy']['need_lm']==false){echo ' style="display:none;"';}?>>
    <td width="120" align="right">所属分类：</td>
    <td>
    <select name="lm" id="lm">
      <option value="0" selected="selected">请选择分类</option>
    	<?php
        $rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' order by `px` desc,`id_lm` asc');
		foreach($rss as $rs){
			echo'<option value="'.$rs["title_lm"].'">'.$rs["title_lm"].'</option>'."\n";	
		}
		?>
    </select>
    <?php
	echo '<script>gt("lm").value="'.$row['lm'].'";</script>'."\n";		
	?>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">经销商名：</td>
    <td><INPUT name="title" type="text" id="title" size="25" maxlength="150" value="<?php echo $row['title']?>"> <span class="red">*</span></td>
  </tr>
  <?php
  if ($conf['co']['ageno']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">代理编号：</td>
    <td><INPUT name="ageno" type="text" id="ageno" size="25" maxlength="50" value="<?php echo $row['ageno']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['area']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">代理地区：</td>
    <td><INPUT name="area" type="text" id="area" size="57" maxlength="250" value="<?php echo $row['area']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['idcard']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">身&nbsp;&nbsp; 份 证：</td>
    <td><INPUT name="idcard" type="text" id="idcard" size="25" maxlength="50" value="<?php echo $row['idcard']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['wx']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">微&nbsp; 信&nbsp; 号：</td>
    <td><INPUT name="wx" type="text" id="wx" size="25" maxlength="50" value="<?php echo $row['wx']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['qq']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">QQ号：</td>
    <td><INPUT name="qq" type="text" id="qq" size="25" maxlength="50" value="<?php echo $row['qq']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['phone']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">电话号码：</td>
    <td><INPUT name="phone" type="text" id="phone" size="25" maxlength="50" value="<?php echo $row['phone']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['stime']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">授权日期：</td>
    <td><input name="stime" type="text" id="stime" size="10" maxlength="50"  onFocus="HS_setDate(this)"  value="<?php echo date('Y-m-d',$row['stime'])?>"/></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['etime']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">到期日期：</td>
    <td><input name="etime" type="text" id="etime" size="10" maxlength="50"  onFocus="HS_setDate(this)"  value="<?php echo date('Y-m-d',$row['etime'])?>"/></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['f_body']==true){
  ?>
  <tr class="tdbg">
    <td align="right" valign="top"><br />
      简要介绍：</td>
    <td ><textarea name="f_body" rows="4" id="f_body" style="width:450px;"><?php echo rehtml($row['f_body'])?></textarea></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['z_body']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">详细介绍：</td>
    <td>
    <textarea id="z_body" name="z_body" style="width:670px;height:300px;display:none;"><?php echo $row['z_body']?></textarea>    </td>
  </tr>
  <link rel="stylesheet" href="../kd_html/themes/default/default.css" />
  <script charset="utf-8" src="../kd_html/kindeditor.js"></script>
  <script charset="utf-8" src="../kd_html/lang/zh_CN.js"></script>
  <script>
		//设置参数
        var options = {
			allowFileManager : true,
			newlineTag : 'br'
		};
        KindEditor.ready(function(K) {
            //如需创建多个编辑器：
			//1.添加一个文本区域
			//2.只要复制多下面这行代码"K.create('textarea[name="z_body"]',options);"
			//3.然后改一下文本区域的名字
			K.create('textarea[name="z_body"]',options);
        });
  </script>
    <?php
    }
	?>
  <?php
  if ($conf['co']['img_sl']==true){
  	$conf_um=read_config('conf_um');
  ?>
  <tr class="tdbg" >          
    <td width="120" align="right">图片上传：</td>          
    <td >
    <iframe name="frame1" id="frame1" src="up_image_tool/uploadd.php?frameid=frame1&kuang=img_sl&img_sl=<?php echo $row['img_sl']?>" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="img_sl" id="img_sl" value="<?php echo $row['img_sl']?>" />
    <?php
    if(!empty($conf_um['up']['text'])){
	?>
        <br /><span class="red"><?php echo $conf_um['up']['text']?></span>
    <?php
    }
	?>
    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($row['pic_sl']!=''){
  ?>
  <tr class="tdbg" >          
    <td width="120" align="right">生成证书：</td>          
    <td >&nbsp;<a href="../../<?php echo $row['pic_sl']?>" target="_blank" style="text-decoration:underline;">点击查看证书</a></td>
  </tr>
  <?php
  }
  ?>
  <tr class="tdbg" <?php if ($conf['co']['wtime']==false){echo ' style="display:none"';}?>>
    <td width="120" align="right">发布时间：</td>
    <td ><input name="wtime" type="text" id="wtime" value="<?php echo date('Y-m-d H:i:s',$row['wtime'])?>" maxlength="50">              时间格式为“年-月-日 时:分:秒”，如：<font color="#0000FF">2003-5-12 12:32:47</font></td>
  </tr>

    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" size="5" maxlength="11" value="<?php echo $row['px']?>" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
</table>
</div>
<div id="con_2" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="120" height="22" align="right">页面标题：</td>
    <td>
    <textarea name="ym_tit" cols="80" rows="3"><?php echo rehtml($row['ym_tit'])?></textarea><br />
	建议填写不超过80个字，不要使用“回车键”换行
    </td>
  </tr>
  
  <tr class="tdbg">
    <td width="120" height="22" align="right" >页面关键字：</td>
    <td >
    <textarea name="ym_key" cols="80" rows="3"><?php echo rehtml($row['ym_key'])?></textarea><br />
	建议填写不超过100个字，不要使用“回车键”换行
    </td>
  </tr>
  
  <tr class="tdbg">
    <td width="120" height="22" align="right" class="tdbg">页面描述：</td>
    <td><textarea name="ym_des" cols="80" rows="3"><?php echo rehtml($row['ym_des'])?></textarea><br />
    建议填写不超过200个字，不要使用“回车键”换行
    </td>
  </tr>
</table>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='<?php echo $url?>';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
