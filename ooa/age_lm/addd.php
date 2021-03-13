<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');
checkaction($conf['sy']['pre'].'_lm_add');

$title_lm=isset($_POST['title_lm'])?html($_POST['title_lm']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';

if ($title_lm==''||$px==''||!checknum($px)){
	msg('参数错误');
}

//添加分类信息
$sql='insert into '.table($conf['sy']['table_lm']).' (`title_lm`,`px`,`wtime`,`ip`) values("'.$title_lm.'",'.$px.','.time().',"'.getip().'")';
$db->execute($sql);

//添加日志
master_log('添加'.$conf['sy']['name'].'分类：'.$title_lm.'');

msg('添加成功','location="default.php"');
?>
