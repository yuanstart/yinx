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
	checkaction('email_fj_edit');
	//处理数据
	$db->execute('update '.table('email_fj').' set `pass`=1 where `id` in ('.$id.')');
	//添加日志
	$rss=$db->getrss('select `email` from '.table('email_fj').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('取消屏蔽发件邮箱：'.$row['email'].'');	
	}	
//屏蔽
}elseif($ac=='pass2'){
	//检查权限
	checkaction('email_fj_edit');
	//处理数据
	$db->execute('update '.table('email_fj').' set `pass`=0 where `id` in ('.$id.')');
	//添加日志
	$rss=$db->getrss('select `email` from '.table('email_fj').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('屏蔽发件邮箱：'.$row['email'].'');	
	}
//删除
}elseif($ac=='del'){
	//检查权限
	checkaction('email_fj_del');
	//添加日志
	$rss=$db->getrss('select `email` from '.table('email_fj').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('删除发件邮箱：'.$row['email'].'');	
	}
	//删除数据
	$db->execute('delete from '.table('email_fj').' where `id` in ('.$id.')');
}

msg('操作成功','location="'.$url.'"');
?>