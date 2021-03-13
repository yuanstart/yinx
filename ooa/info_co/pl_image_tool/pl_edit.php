<?php
require('../../../include/common.inc.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

$id=isset($_GET['id'])?$_GET['id']:'';
$pl_id=isset($_GET['pl_id'])?$_GET['pl_id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}
if ($pl_id!=''&&!checknum($pl_id)){
	msg('参数错误');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多图上传</title>
<link href="../../css/admin_style.css" rel="stylesheet" />
<style>
body{margin:0px; padding:0px;overflow:hidden;}
html{margin:0px; padding:0px;overflow:hidden;}
.btn{ height:20px;}
input{ font-size:12px;}
.inputclass { width:150px; height:15px; line-height:15px; margin-top:1px; padding:1px;}
</style>
<script language="javascript">
function check(){
	var sAllowExt="<?php echo $conf['up']['allowext']?>";
	var file_up=document.formn.file_up;
	if (file_up.value==""){
	  alert("请选择要上传的文件");
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

<body>
<?php
$sql='select * from '.table($conf['pl']['table']).' where `id`='.$id.'';
$row=$db->getrs($sql);
if($row){
?>
    <table border="0" cellpadding="1" cellspacing="0" style="margin:8px 0 0 6px;" >
    <form name="formn" method="POST" action="pl_editt.php" enctype="multipart/form-data" >
    <input id="id"  type="hidden" name="id" value="<?php echo $id?>"/>
    <input id="pl_id"  type="hidden" name="pl_id" value="<?php echo $pl_id?>"/>
      <tr>
        <td>图片</td>
        <td><input type="file" name="file_up" id="file_up" size="15"  style="width:150px;" enctype="multipart/form-data" ></td>
      </tr>
	  <?php
	  if ($conf['pl']['title']==true){
		  foreach ($cong['mlang'] as $k=>$v){
	  ?>
		  <tr>
			<td  align="right">标题：</td>
			<td><INPUT name="title<?php echo $v['lang']?>" type="text" class="inputclass" value="<?php echo $row['title'.$v['lang']]?>">
			</td>
		  </tr>
	  <?php
			if ($conf['pl']['mlang']!=true){
				break;
			}
		  }
	  }
      ?>
      <tr <?php if ($conf['pl']['px']==false){echo ' style="display:none;"';}?>>
        <td>排序</td>
        <td><input name="px" type="text" class="inputclass" value="<?php echo $row['px']?>"></td>
      </tr>
      <tr >
        <td></td>
        <td><input name=mysubm  type="submit" value="保存" class="btn">  <input name=mysubm  type="button" value="返回" onclick="history.back()" class="btn" ></td>
      </tr>
    </form>
    </table>
<?php
}
?>
</body>
</html>
