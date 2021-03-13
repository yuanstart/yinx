<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$conf=read_config('config','../');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_lx_add');//检查权限

$title_lm=isset($_POST['title_lm'])?html($_POST['title_lm']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';

if ($title_lm==''||$px==''||!checknum($px)){
	msg('参数错误');
}

//添加类型信息
$sql='insert into '.table($conf['sy']['table_lx']).' (`title_lm`,`pass`,`px`,`wtime`,`ip`) values("'.$title_lm.'",1,'.$px.','.time().',"'.getip().'")';
$db->execute($sql);

//添加日志
master_log('添加'.$conf['sy']['name'].'类型：'.$title_lm.'');

msg('添加成功','location="default.php"');
?>
