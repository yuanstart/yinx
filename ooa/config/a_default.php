<?php
require('../../include/common.inc.php');

checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限管理</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/jquery.js"></script>
<script src="../scripts/function.js"></script>
</head>

<body>
<?php
$nav=3;
require('menu.php');
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">权限管理</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理权限：</strong></td>
    <td><a href="a_default.php">管理首页</a>&nbsp;|&nbsp;<a href="a_add.php">添加权限</a></td>
  </tr>
</table>
<br />
<div id="show_list"></div>
<script>
atype='';aurl='';adata='';
function ajax_make(ac,id){
	if (ac=='del'&&!confirm('真的要删除该权限吗?')){
		return false;
	}
	if(ac=='px'){
	    atype="post";
		aurl="a_make.php?ac="+ac
		adata=$("#form1").serialize();
	}else if (ac=='pass1'||ac=='pass2'||ac=='del'){
		atype="get";
		aurl="a_make.php?ac="+ac
		adata={'id':id};
	}else{
		atype="get";
		aurl="a_make.php"
		adata="";
	}
	$.ajax({
		 type:atype,
		 url:aurl,
		 data:adata,
		 success:function(data){
			$('#show_list').html(data);
			//如果鼠标移到class为msgtable的表格的tr上时，执行函数
			$(".listtable tr").mouseover(function(){
			//给这行添加class值为over，并且当鼠标移出该行时执行函数
			$(this).addClass("over");}).mouseout(function(){ 
			//移除该行的class
			$(this).removeClass("over");}).click(function(){ 
				$(".listtable tr").removeClass("click");
				$(this).addClass("click");
			})
		 }
	});     
}

$(function(){
	ajax_make();
})

</script>
</body>
</html>
