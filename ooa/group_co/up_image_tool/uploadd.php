<?php
require('../../../include/common.inc.php');
checklogin();
$ympath=str_replace('\\','/',dirname(dirname(__FILE__)));
$shu=explode('/',$ympath);
$cone=read_config('config','../../'.str_replace('_co','_lm',$shu[(count($shu)-1)]));

$ac=(isset($_GET['ac']))?$_GET['ac']:'';
$frameid=(isset($_GET['frameid']))?$_GET['frameid']:'';
$kuang=(isset($_GET['kuang']))?$_GET['kuang']:'';
$img_sl=(isset($_GET['img_sl']))?$_GET['img_sl']:'';
$id=(isset($_REQUEST['id']))?$_REQUEST['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$info_img_sm=$db->getvalue('select `info_img_sm` from '.table($cone['sy']['table_lm']).' where id_lm='.$id.'');
if(!$info_img_sm){
	msg('没有该分类');
}else{
	$conf=unserialize($info_img_sm);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../../css/admin_style.css"  type="text/css" rel="stylesheet">
<style>
body{margin:0px; padding:0px; background-color:#e5ebf1; height:21px; line-height:21px;overflow:hidden;}
html{margin:0px; padding:0px;overflow:hidden;background-color:#e5ebf1;}
</style>
</head>

<body >
<?php
if($ac==''){
	if($img_sl==''){
		echo'<script>location="up.php?frameid='.$frameid.'&kuang='.$kuang.'&id='.$id.'"</script>';
	}else{
		echo'&nbsp;<a href="../../../'.$img_sl.'" target="_blank"><img src="../../images/img.gif" onmouseover="popImage(this,\'../../'.$img_sl.'\');" onmouseout="hideLayer();"></a> <a href="uploadd.php?frameid='.$frameid.'&kuang='.$kuang.'&img_sl='.$img_sl.'&ac=del&id='.$id.'" onclick="return confirm(\'确定要删除文件吗？\')">删除文件,重新上传</a>';
	}
}elseif($ac=='del'){
	if($img_sl!=''){
		if($conf['up']['sm']){
			foreach($conf['sm'] as $k=>$v){
				delfile(getimgj($img_sl,$v['s_nam']));
			}
		}else{
			delfile($img_sl);
		}
	}
	echo'<script>parent.document.getElementById("'.$kuang.'").value="";</script>';
	echo'<script>location="up.php?frameid='.$frameid.'&kuang='.$kuang.'&id='.$id.'"</script>';
}
?>
<script language="javascript">
function hideLayer()
{	
	var layer =parent.document.getElementById("popImageLayer");
	layer.style.visibility='hidden';
}
function popImage(obj,img) 
{ 
	var layer = parent.document.getElementById("popImageLayer");
	obj=parent.document.getElementById("<?php echo $frameid?>")
	
	var t=obj.offsetTop;
	var l=obj.offsetLeft;
	while(obj=obj.offsetParent)
	{
		t+=obj.offsetTop;
		l+=obj.offsetLeft;
	}
	var ext=GetFileExtension(img);
	if ((ext=="gif")||(ext=="jpg")||(ext=="bmp")||(ext=="png"))
	{
	var content ="<br><IMG id='img_m' src='"+img+"' onload='DrawImage(this,220,220);' border='0'   style='FILTER: alpha(opacity=10);' >"; 
	}
	else
	{
	var content ="<br><br><br><IMG id='img_m' src='../images/img/"+ext+".gif' onload='DrawImage(this,220,220);' border='0'   style='FILTER: alpha(opacity=10);' >"; 
	}
	layer.innerHTML=content;
	layer.style.left =(l+20)+'px';
	layer.style.top = (t-10)+'px';
	layer.style.visibility='visible';
}
function GetFileExtension(name) 
{
var ext = name.substring(name.lastIndexOf(".") + 1, name.length);
return ext.toLowerCase(); 
}
</script>
</body>
</html>