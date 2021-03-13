<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_mb_edit');

$id =isset($_POST['id'])?html(trim($_POST['id'])):'';
$bname=isset($_POST['bname'])?html(trim($_POST['bname'])):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$fil_sl=isset($_POST['fil_sl'])?html($_POST['fil_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$url =isset($_POST['url'])?html(trim($_POST['url'])):'';
if($id==''||!checknum($id)||$bname==''||$title==''||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='update '.table('email_mb').' set `bname`="'.$bname.'",`title`="'.$title.'",`z_body`="'.$z_body.'",`fil_sl`="'.$fil_sl.'",`px`="'.$px.'"  where id='.$id.'';
$db->execute($sql);

//添加日志
master_log('修改邮件模板：'.$bname.'');

msg('保存成功','location="'.$url.'"');
?>