<?php
require('../../include/common.inc.php');
checklogin();
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
$url=(previous())?previous():'default.php';

if ($ac==''){
	msg('参数错误');
}

$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}
if (is_array($id)){
	$id=implode(',',$id);
}
//取消屏蔽
if($ac=='pass1'){
	//检查权限
	checkaction('key_edit');
	//处理数据
	$db->execute('update '.table('key_co').' set `pass`=1 where `id` in ('.$id.')');
	//添加日志
	$rss=$db->getrss('select `title` from '.table('key_co').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('取消屏蔽关键词：'.$row['title'].'');	
	}	
//屏蔽
}elseif($ac=='pass2'){
	//检查权限
	checkaction('key_edit');
	//处理数据
	$db->execute('update '.table('key_co').' set `pass`=0 where `id` in ('.$id.')');
	//添加日志
	$rss=$db->getrss('select `title` from '.table('key_co').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('屏蔽关键词：'.$row['title'].'');	
	}
//删除
}elseif($ac=='del'){
	//检查权限
	checkaction('key_del');
	//添加日志
	$rss=$db->getrss('select `title` from '.table('key_co').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('删除关键词：'.$row['title'].'');	
	}
	//删除数据
	$db->execute('delete from '.table('key_co').' where `id` in ('.$id.')');
}

msg('操作成功','location="'.$url.'"');
?>