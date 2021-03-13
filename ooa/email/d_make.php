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
	checkaction('email_dy_edit');
	//处理数据
	$db->execute('update '.table('email_dy').' set `pass`=1 where `id` in ('.$id.')');
	//添加日志
	$rss=$db->getrss('select `email` from '.table('email_dy').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('取消屏蔽订阅邮箱：'.$row['email'].'');	
	}
//屏蔽
}elseif($ac=='pass2'){
	//检查权限
	checkaction('email_dy_edit');
	//处理数据
	$db->execute('update '.table('email_dy').' set `pass`=0 where `id` in ('.$id.')');
	//添加日志
	$rss=$db->getrss('select `email` from '.table('email_dy').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('屏蔽订阅邮箱：'.$row['email'].'');	
	}
//删除
}elseif($ac=='del'){
	//检查权限
	checkaction('email_dy_del');
	//添加日志
	$rss=$db->getrss('select `email` from '.table('email_dy').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('删除订阅邮箱：'.$row['email'].'');	
	}
	//处理数据
	$db->execute('delete from '.table('email_dy').' where `id` in ('.$id.')');	
}

msg('操作成功','location="'.$url.'"');
?>