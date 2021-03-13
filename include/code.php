<?php
include 'common.inc.php';
$s=isset($_GET['s'])?$_GET['s']:'';//如果需要多个session时，请传入值
$width=isset($_GET['w'])?$_GET['w']:60;
$height=isset($_GET['h'])?$_GET['h']:20;
$len=isset($_GET['l'])?$_GET['l']:4;
if($s!=''&&!is_integer($s)){
	$s='';
}
//创建随机数
$chars=array('A','B','C','D','E','F','H','J','K','M','N','P','R','S','T','W','S','Y','Z',1,2,3,4,5,6,7,8,9);
$charslen=count($chars)-1;
shuffle($chars);
$code="";
for($a=0;$a<$len;$a++){
	$code.=$chars[rand(0,$charslen)];
}
$_SESSION['safecode'.$s]=strtolower($code);
//开始创建图片
$im=imagecreate($width,$height);//根据宽度和高度创建一个图片
$back=imagecolorallocate($im,240,243,248);//创建一个颜色，第一个默认为图片的背景
$pix=imagecolorallocate($im,105,148,220);//点的颜色
$line[0]=imagecolorallocate($im,rand(0,30),rand(0,15),rand(140,260));//创建线条和字体的颜色
$line[1]=imagecolorallocate($im,rand(0,30),rand(0,15),rand(140,260));
$line[2]=imagecolorallocate($im,rand(0,30),rand(0,15),rand(140,260));
$line[3]=imagecolorallocate($im,rand(0,30),rand(0,15),rand(140,260));
//在$im图片上创建100个模糊点
for($i=0;$i<100;$i++){
	imagesetpixel($im,rand(0,$width),rand(0,$height),$pix);
}

//在$im图片上创建随机数
for($i=0;$i<$len;$i++){
	imagestring($im,rand(4,10),$i*rand(13,16)+rand(1,3),rand(0,$height-14),$code[$i],$line[rand(0,$i)]);
}
//头部文件，禁止缓存
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
//把验证码图片image/gif编码 
header("Content-Type:image/jpeg");
//输出jpeg格式图片
imagegif($im);
imagedestroy($im);
?>