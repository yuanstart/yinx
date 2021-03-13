<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_dy_add');

$email=isset($_POST['email'])?html(trim($_POST['email'])):'';
if ($email==''){
	msg('参数错误!');
}

$rs=$db->getrs('select * from '.table('email_dy').' where `email`="'.$email.'"');
if ($rs){
	msg("邮箱已存在");
}else{
	$sql='insert into '.table('email_dy').' (`email`,`pass`,`ip`,`wtime`) values("'.$email.'",1,"'.getip().'",'.time().')';
	$db->execute($sql);
}

//添加日志
master_log('添加订阅邮箱：'.$email.'');

msg('添加成功','location="d_default.php"');
?>