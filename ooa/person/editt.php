<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_edit');//检查权限

$id=isset($_POST['id'])?html($_POST['id']):'';
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
$url=isset($_POST['url'])?$_POST['url']:'default.php';

$sq='';
if ($password!=''){
	if (strlen($password)<4||strlen($password)>20||!checkpassword($password)){
		msg('错误的登录密码格式');
	}else{
		$sq.=',password="'.$password.'"';
	}
}

$sql='update '.table($conf['sy']['table_co']).' set `rename`="'.$rename.'",`sex`="'.$sex.'",`phone`="'.$phone.'",`fax`="'.$fax.'",`email`="'.$email.'",`qq`="'.$qq.'",`wx`="'.$wx.'",`compname`="'.$compname.'",`address`="'.$address.'",`post`="'.$post.'",`z_body`="'.$z_body.'",pass="'.$pass.'"'.$sq.'  where id="'.$id.'" ';
$result=$db->execute($sql);

$username=$db->getvalue('select username from '.table($conf['sy']['table_co']).' where id='.$id.'');

//添加日志
master_log('修改'.$conf['sy']['name'].'信息：'.$username.'');

msg('保存成功','location="'.$url.'"');
?>