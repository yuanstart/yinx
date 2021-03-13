<?php
require('../../include/common.inc.php');
checklogin();
checkaction('code_pl_add');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>批量导入</title>
<link href="../css/admin_style.css"  type="text/css" rel="stylesheet">
<script src="../scripts/function.js" language="javascript"></script>
<script language="javascript">
function check(){
	var sAllowExt="csv";
	var file_up=document.formn.file_up;
	if (file_up.value==""){
	  alert("请选择要导入的文件");
	  return false;
	}
	if (!IsExt(sAllowExt,file_up.value)){
		alert("请选择一个有效的文件，\n\n支持的格式有（"+sAllowExt+"）");
		return false;
	}
} 
function IsExt(opt,url){
	var sTemp;
	var b=false;
	var s=opt.toUpperCase().split("|");
	ext=url.substr(url.lastIndexOf( ".")+1);
	ext=ext.toUpperCase();
	for (var i=0;i<s.length ;i++ ){
		if (s[i]==ext){
			b=true;
			break;
		}
	}
	return b;
}
</script>
</head>

<body >
<table width="100%"  border="0" cellpadding="2" cellspacing="1" class="border">
  <tr align="center" class="topbg">
    <td >批量导入</td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
<form name="formn" method="POST" action="pl_addd.php" enctype="multipart/form-data" onsubmit="return check()">
  <tr class="tdbgo">
    <td width="8%" align="right"></td>
    <td ><input type="file" name="file_up" id="file_up" size="20" enctype="multipart/form-data" >&nbsp;<input name=mysubm  type="submit" value="导入" class="btn" ></td>
  </tr>
</form>
</table>
</body>
</html>
