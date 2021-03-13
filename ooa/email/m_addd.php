<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_mb_add');

$bname=isset($_POST['bname'])?html(trim($_POST['bname'])):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$fil_sl=isset($_POST['fil_sl'])?html($_POST['fil_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($bname==''||$title==''||$px==''||!checknum($px)){
	msg('参数错误!');
}

$sql='insert into '.table('email_mb').' (`bname`,`title`,`z_body`,`fil_sl`,`pass`,`px`,`wtime`) values("'.$bname.'","'.$title.'","'.$z_body.'","'.$fil_sl.'",1,'.$px.','.time().')';
$db->execute($sql);

//添加日志
master_log('添加邮件模板：'.$bname.'');

msg('添加成功','location="m_default.php"');
?>