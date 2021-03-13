<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$conf=read_config('config');//读取本系统配置文件

$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
(previous())?$url=previous():$url='default.php';

if ($ac==''){
	msg('参数错误');
}
if ($id==''||!checknum($id)){
	msg('参数错误');
}
if (is_array($id)){
	$id=implode(',',$id);
}

//删除
if ($ac=='del'){
	//检查权限
	checkaction($conf['sy']['pre'].'_del');
	//开始删除
	$rss=$db->getrss('select * from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
	foreach($rss as $row){
		//删除信息
		$sql='delete from '.table($conf['sy']['table_co']).' where `id`='.$row['id'].'';
		$db->execute($sql);
		//添加日志
		master_log('删除'.$conf['sy']['name'].'信息：'.$row['username'].'');
	}
}


msg('操作成功','location="'.$url.'"');
?>