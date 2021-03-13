<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config','../');

$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
$url=(previous())?previous():'yp_default.php';

if ($ac==''||$id==''||!checknum($id)){
	msg('参数错误');
}

if (is_array($id)){
	$id=implode(',',$id);
}
	
//删除
if ($ac=='del'){
	//检查权限
	checkaction($conf['sy']['pre'].'_yp_del');
	$db->execute('delete from '.table($conf['sy']['table_yp']).' where `id` in ('.$id.')');
}

msg('操作成功','location="'.$url.'"');
?>