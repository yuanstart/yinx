<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_fj_edit');

$id =isset($_POST['id'])?html(trim($_POST['id'])):'';
$email=isset($_POST['email'])?html(trim($_POST['email'])):'';
$username=isset($_POST['username'])?html(trim($_POST['username'])):'';
$password=isset($_POST['password'])?html(trim($_POST['password'])):'';
$server=isset($_POST['server'])?html(trim($_POST['server'])):'';
$url =isset($_POST['url'])?html(trim($_POST['url'])):'';

if($id==''||!checknum($id)||$email==''){
	msg('参数错误');
}

$rs=$db->getrs('select * from '.table('email_fj').' where email="'.$email.'" and `id`<>'.$id.'');
if ($rs){
	msg("邮箱已存在");
}

$sql='update '.table('email_fj').' set `email`="'.$email.'",`username`="'.$username.'",`password`="'.$password.'",`server`="'.$server.'"  where id='.$id.'';
$db->execute($sql);

//添加日志
master_log('修改发件邮箱：'.$email.'');

msg('保存成功','location="'.$url.'"');
?>