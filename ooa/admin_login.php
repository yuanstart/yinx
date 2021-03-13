<?php
require('../include/common.inc.php');

$username=isset($_POST['username'])?html(strtolower(trim($_POST['username']))):'';
$password=isset($_POST['username'])?html(strtolower(trim($_POST['password']))):'';
$safecodes=isset($_POST['safecode'])?strtolower(trim($_POST['safecode'])):'';
if (empty($username)||empty($password)||empty($safecodes)){
	msg('参数错误');
}
if (empty($_SESSION['safecode'])||$safecodes==''||$safecodes!=$_SESSION['safecode']){
	msg('验证码错误');
}

$row=$db->getrs('select * from '.table('master').' where `username`="'.$username.'"');
// echo "<pre>";
// print_r($row);die;

if (!$row){
	msg('用户名不存在');
}else{
	if($row['password']!=$password){
		master_log('登录后台：密码错误 '.$password,$username);
		msg('密码错误');
	}else{
		$db->execute('update '.table('master').' set `lip`=`eip`,`ltime`=`etime`,`eip`="'.getip().'",`etime`='.time().',`login_num`=`login_num`+1 where `username`="'.$username.'"');
		$_SESSION['hyadmin']=$row['username'];
		$_SESSION['menu_list']=$row['menu_list'];
		$_SESSION['action_list']=$row['action_list'];
		$_SESSION['hylastcheck']=time();
		master_log('登录后台：'.$username,$username);
		msg('','parent.location="system.php"');
	}
}
?>