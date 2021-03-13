<?php
require('../../../include/common.inc.php');
checklogin();
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_daru_add');//检查权限
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>批量导入</title>
<link href="../../css/admin_style.css"  type="text/css" rel="stylesheet">
<script src="../../scripts/function.js" language="javascript"></script>
<script src="../../scripts/jquery.js"></script>
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
<form name="formn" method="POST" action="addd.php" enctype="multipart/form-data" onsubmit="return check()">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <?php
  if ($conf['sy']['need_lm']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"></td>
    <td>
    <select name="lm" id="lm">
      <option value="0" selected="selected">请选择分类</option>
    	<?php
		//把所有分类放到$rss数组里
        $rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' order by `px` desc,`id_lm` desc');
		//无限级分类开始
		addlm($rss,0,'');
		?>
    </select>    </td>
  </tr>
  <?php
  }
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
			if($rs['fid']==$fid){
				if($rs['add_xx']=='yes'){
					echo'<option value="'.$rs["id_lm"].'">'.$i.$rs["title_lm"].'</option>'."\n";
				}else{
					echo'<option value="no">'.$i.$rs["title_lm"].'×</option>'."\n";
				}
				addlm($rss,$rs['id_lm'],$i);
			}
		}
	}
  ?>
  <tr class="tdbg">
    <td width="120" align="right"></td>
    <td><input type="file" name="file_up" id="file_up" size="20" enctype="multipart/form-data" ></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit2" value="提交并导入" class="btn"></td>
  </tr>
</table>
</form>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="122">&nbsp;</td>
    <td>
    <strong> 备注：</strong><br />
    CSV文档第一行是列名称，默认不会读取，请不要放数据<br />
    CSV文档列顺序：<?php echo $conf['sy']['fields'];?>
    </td>
  </tr>
</table>
</body>
</html>
