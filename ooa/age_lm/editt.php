<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');
checkaction($conf['sy']['pre'].'_lm_edit');

$id=isset($_POST['id'])?html($_POST['id']):'';
$title_lm=isset($_POST['title_lm'])?html($_POST['title_lm']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';

if ($id==''||!checknum($id)||$title_lm==''||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='update '.table($conf['sy']['table_lm']).' set `title_lm`="'.$title_lm.'",`px`='.$px.' where `id_lm`='.$id.'';
$db->execute($sql);

//添加日志
master_log('修改'.$conf['sy']['name'].'分类：'.$title_lm.'');

msg('保存成功','location="default.php"');
?>
