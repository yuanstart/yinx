<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_fj_add');

$email=isset($_POST['email'])?html(trim($_POST['email'])):'';
$username=isset($_POST['username'])?html(trim($_POST['username'])):'';
$password=isset($_POST['password'])?html(trim($_POST['password'])):'';
$server=isset($_POST['server'])?html(trim($_POST['server'])):'';
if ($email==''){
	msg('参数错误!');
}

$rs=$db->getrs('select * from '.table('email_fj').' where `email`="'.$email.'"');
if ($rs){
	msg("邮箱已存在");
}else{
	$sql='insert into '.table('email_fj').' (`email`,`username`,`password`,`server`,`pass`) values("'.$email.'","'.$username.'","'.$password.'","'.$server.'",1)';
	$db->execute($sql);
}

//添加日志
master_log('添加发件邮箱：'.$email.'');

msg('添加成功','location="f_default.php"');
?>