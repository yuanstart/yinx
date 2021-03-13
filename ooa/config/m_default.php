<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航管理</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/jquery.js"></script>
<script src="../scripts/function.js"></script>
</head>

<body>
<?php
$nav=2;
require('menu.php');
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">导航管理</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="m_default.php">管理首页</a>&nbsp;|&nbsp;<a href="m_add.php">添加导航</a></td>
  </tr>
</table>
<div style="margin:5px auto;">
<input type="button" name="con_display" value="显示所有系统设置" class="btn"  onclick="ajax_make('cond')" />&nbsp;<input type="button" class="btn" name="con_hidden" value="隐藏所有系统设置" onclick="ajax_make('conh')"  />
<input type="button" name="seo_display" value="显示所有SEO设置" class="btn" onclick="ajax_make('seod')" />&nbsp;<input type="button" class="btn" name="seo_hidden" value="隐藏所有SEO设置" onclick="ajax_make('seoh')" />

</div>
<div id="show_list"></div>
<script>
atype='';aurl='';adata='';
function ajax_make(ac,id){
	if (ac=='del'&&!confirm('真的要删除该导航吗?')){
		return false;
	}
	if(ac=='px'){
	    atype="post";
		aurl="m_make.php?ac="+ac
		adata=$("#form1").serialize();
	}else if (ac=='pass1'||ac=='pass2'||ac=='del'){
		atype="get";
		aurl="m_make.php?ac="+ac
		adata={'id':id};
	}else{
		atype="get";
		aurl="m_make.php?ac="+ac
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
