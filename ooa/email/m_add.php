<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_mb_add');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加模板</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加模板</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="m_default.php">管理首页</a>&nbsp;|&nbsp;<a href="m_add.php">添加模板</a></td>
  </tr>
</table>
<br />
<FORM name="form1" method="post" action="m_addd.php" onSubmit="return checkForm('form1')">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">模板名称：</td>
    <td class="tdbg">
    <input name="bname" type="text" class="input_m" size="30" maxlength="50" canEmpty="N" checkType="string,," checkStr="模板名称" />
    <span class="red">*</span>
    </td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">邮件标题：</td>
    <td class="tdbg">
    <input name="title" type="text" class="input_m" size="45" maxlength="100" canEmpty="N" checkType="string,," checkStr="邮件标题" />
    <span class="red">*</span>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">邮件内容：</td>
    <td>
    <textarea id="z_body" name="z_body" style="width:670px;height:300px;display:none;"></textarea>
    </td>
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
   <tr class="tdbg"> 
    <td width="120" align="right" valign="top">附件上传：</td>          
    <td >
      <iframe name="frame2" id="frame2" src="up_file_tool/up.php?frameid=frame2&kuang=fil_sl" style="margin-top:2px; width:auto;width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>
      	<input type="hidden" name="fil_sl" id="fil_sl" maxlength="250" >
		<?php
		require('up_file_tool/upcon.php');
		if(!empty($conf_uf['up']['text'])){
		?>
			<br /><span class="red"><?php echo $conf_uf['up']['text']?></span>
		<?php
		}
		?>   
     </td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td>
    <input type="submit" name="Submit" value="提 交" class="btn"> &nbsp; &nbsp; &nbsp;
    <input name="Cancel" type="button" id="Cancel" value="取 消" onClick="location.href='m_default.php';" class="btn">
    </td>
  </tr>
</table>
</FORM>
</body>
</html>
