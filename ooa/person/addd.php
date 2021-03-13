<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_add');//检查权限

$username=isset($_POST['username'])?html(strtolower(trim($_POST['username']))):'';
$password=isset($_POST['password'])?html(strtolower(trim($_POST['password']))):'';
$rename=isset($_POST['rename'])?html(trim($_POST['rename'])):'';
$sex=isset($_POST['sex'])?html(trim($_POST['sex'])):'';
$phone=isset($_POST['phone'])?html(trim($_POST['phone'])):'';
$fax=isset($_POST['fax'])?html(trim($_POST['fax'])):'';
$email=isset($_POST['email'])?html(trim($_POST['email'])):'';
$qq=isset($_POST['qq'])?html(trim($_POST['qq'])):'';
$wx=isset($_POST['wx'])?html(trim($_POST['wx'])):'';
$compname=isset($_POST['compname'])?html(trim($_POST['compname'])):'';
$address=isset($_POST['address'])?html(trim($_POST['address'])):'';
$post=isset($_POST['post'])?html(trim($_POST['post'])):'';
$z_body=isset($_POST['z_body'])?html($_POST['z_body']):'';
$pass=isset($_POST['pass'])?html(trim($_POST['pass'])):'';


if (strlen($username)<4||strlen($username)>20||!checkusername($username)){
	msg('错误的用户名格式');
}

if (strlen($password)<4||strlen($password)>20||!checkpassword($password)){
	msg('错误的登录密码格式');
}

$row=$db->getrs('select `username` from '.table($conf['sy']['table_co']).' where `username`="'.$username.'"');
if ($row){
	msg('该用户名已有人使用');
}else{
	$sql='insert into '.table($conf['sy']['table_co']).' (`username`,`password`,`rename`,`sex`,`phone`,`fax`,`email`,`qq`,`wx`,`compname`,`address`,`post`,`z_body`,`login_num`,`pass`,`wtime`,`wip`)values("'.$username.'","'.$password.'","'.$rename.'","'.$sex.'","'.$phone.'","'.$fax.'","'.$email.'","'.$qq.'","'.$wx.'","'.$compname.'","'.$address.'","'.$post.'","'.$z_body.'",0,'.$pass.','.time().',"'.getip().'")';
	$db->execute($sql);
}

//添加日志
master_log('添加'.$conf['sy']['name'].'信息：'.$username.'');

msg('添加成功','location="default.php"');
?>