<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_dy_edit');

$id =isset($_POST['id'])?html(trim($_POST['id'])):'';
$url =isset($_POST['url'])?html(trim($_POST['url'])):'';
$email=isset($_POST['email'])?html(trim($_POST['email'])):'';

if($id==''||!checknum($id)||$email==''){
	msg('参数错误');
}

$rs=$db->getrs('select * from '.table('email_dy').' where email="'.$email.'" and `id`<>'.$id.'');
if ($rs){
	msg("邮箱已存在");
}

$sql='update '.table('email_dy').' set `email`="'.$email.'"  where id='.$id.'';
$db->execute($sql);

//添加日志
master_log('修改订阅邮箱：'.$email.'');

msg('保存成功','location="'.$url.'"');
?>