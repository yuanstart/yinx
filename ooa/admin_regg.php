<?php
require('../include/common.inc.php');
chklogin();
$username=html(strtolower(trim($_POST['username'])));
$password=html(strtolower(trim($_POST['password'])));
$password1=html(strtolower(trim($_POST['password1'])));
$password2=html(strtolower(trim($_POST['password2'])));
if($password==''||$password1==''||$password2==''){
	msg('参数错误');
}
if (strlen($password1)<4||strlen($password1)>20||!checkpassword($password1)){
	msg('错误的登录密码格式');
}
if($password1!=$password2){
	msg('两次输入新密码不一致');
}

$row=$db->getrs('select * from '.table('master').' where `username`="'.$_SESSION['hyadmin'].'" and password="'.$password.'"');
if (!$row){
	msg('原密码错误');
}else{
	$sql='update '.table('master').' set `password`="'.$password1.'" where `username`="'.$username.'"';
	$db->execute($sql);
	msg('成功修改,请重新登录','location="admin_logout.php"');
}
?>