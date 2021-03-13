<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');

$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
$url=(previous())?previous():'default.php';

if ($ac==''){
	msg('参数错误');
}

//排序
$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误','',$db);
}
if (is_array($id)){
	$id=implode(',',$id);
}
//取消屏蔽
if($ac=='ping1'){
	//检查权限
	checkaction($conf['sy']['pre'].'_edit');
	//处理数据
	$db->execute('update '.table($conf['sy']['table_co']).' set `pass`=1 where `id` in ('.$id.')');	
	//添加日志
	$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('取消屏蔽'.$conf['sy']['name'].'：'.$row['title'].'');	
	}
//屏蔽
}elseif($ac=='ping2'){
	//检查权限
	checkaction($conf['sy']['pre'].'_edit');
	//处理数据
	$db->execute('update '.table($conf['sy']['table_co']).' set `pass`=0 where `id` in ('.$id.')');	
	//添加日志
	$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('屏蔽'.$conf['sy']['name'].'信息：'.$row['title'].'');	
	}
//删除
}elseif($ac=='del'){
	//检查权限
	checkaction($conf['sy']['pre'].'_del');
	//开始删除
	$rss=$db->getrss('select * from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
	foreach($rss as $row){
		//删除信息
		$db->execute('delete from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		//添加日志
		master_log('删除'.$conf['sy']['name'].'信息：'.$row['title'].'');
	}
}

msg('操作成功','location="'.$url.'"');
?>