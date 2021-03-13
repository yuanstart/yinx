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
	checkaction('master_edit');
	//处理数据
	$db->execute('update '.table('master').' set `pass`=1 where `id` in ('.$id.') and `username`<>"'.$_SESSION['hyadmin'].'"');
	//添加日志
	$rss=$db->getrss('select `username` from '.table('master').' where `id` in ('.$id.') and `username`<>"'.$_SESSION['hyadmin'].'"');
	foreach($rss as $row){
		master_log('取消屏蔽管理员：'.$row['username'].'');	
	}
	$userid=$db->getvalue('select `id` from '.table('master').' where `username`="'.$_SESSION['hyadmin'].'"');
	if ($userid&&strpos(','.$id.',',','.$userid.',')!==false){
		if(count(explode(',',$id))>1){
			msg('其他管理员已取消屏蔽，但不能取消屏蔽自己','location="'.$url.'"');
		}else{
			msg('不能取消屏蔽自己','location="'.$url.'"');
		}
	}
//屏蔽
}elseif($ac=='pass2'){
	//检查权限
	checkaction('master_edit');
	//处理数据
	$db->execute('update '.table('master').' set `pass`=0 where `id` in ('.$id.') and `username`<>"'.$_SESSION['hyadmin'].'"');
	//添加日志
	$rss=$db->getrss('select `username` from '.table('master').' where `id` in ('.$id.') and `username`<>"'.$_SESSION['hyadmin'].'"');
	foreach($rss as $row){
		master_log('屏蔽管理员：'.$row['username'].'');	
		$sess->delete_admin_session($row['username']);
	}
	$userid=$db->getvalue('select `id` from '.table('master').' where `username`="'.$_SESSION['hyadmin'].'"');
	if ($userid&&strpos(','.$id.',',','.$userid.',')!==false){
		if(count(explode(',',$id))>1){
			msg('其他管理员已屏蔽，但不能屏蔽自己','location="'.$url.'"');
		}else{
			msg('不能屏蔽自己','location="'.$url.'"');
		}
	}
//删除
}elseif($ac=='del'){
	//检查权限
	checkaction('master_del');
	//添加日志
	$rss=$db->getrss('select `username` from '.table('master').' where `id` in ('.$id.') and `username`<>"'.$_SESSION['hyadmin'].'"');
	foreach($rss as $row){
		master_log('删除管理员：'.$row['username'].'');	
		$sess->delete_admin_session($row['username']);
	}
	//判断不能删除自己
	$userid=$db->getvalue('select `id` from '.table('master').' where `username`="'.$_SESSION['hyadmin'].'"');
	if ($userid&&strpos(','.$id.',',','.$userid.',')!==false){
		if(count(explode(',',$id))>1){
			msg('其他管理员已删除，但不能删除自己','location="'.$url.'"');
		}else{
			msg('不能删除自己','location="'.$url.'"');
		}
	}
	//删除数据
	$db->execute('delete from '.table('master').' where `id` in ('.$id.') and `username`<>"'.$_SESSION['hyadmin'].'"');
}

msg('操作成功','location="'.$url.'"');
?>