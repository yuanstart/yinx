<?php
require('../../include/common.inc.php');
checklogin();
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
$url=(previous())?previous():'default.php';

if ($ac==''){
	msg('参数错误');
}
if($ac=='px'){
	//检查权限
	checkaction('email_mb_edit');
	$px=isset($_POST['px'])?$_POST['px']:'';
	if ($px==''||!checknum($px)){
		msg('参数错误');
	}
	$id=implode(",",array_keys($px));
	$rss=$db->getrss('select `id`,`bname`,`px` from '.table('email_mb').' where `id` in ('.$id.')','id');
	foreach($px as $k=>$v){
		if (isset($rss[$k])){
			if ($v!=$rss[$k]['px']){
				//处理数据
				$db->execute('update '.table('email_mb').' set `px`='.$v.' where `id`='.$k.'');
				//添加记录
				master_log('排序邮件模板：'.$rss[$k]['bname'].'');	
			}
		}
	}
}else{
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
		checkaction('email_mb_edit');
		//处理数据
		$db->execute('update '.table('email_mb').' set `pass`=1 where `id` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title` from '.table('email_mb').' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消屏蔽邮件模板：'.$row['title'].'');	
		}	
	//屏蔽
	}elseif($ac=='pass2'){
		//检查权限
		checkaction('email_mb_edit');
		//处理数据
		$db->execute('update '.table('email_mb').' set `pass`=0 where `id` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title` from '.table('email_mb').' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('屏蔽邮件模板：'.$row['title'].'');	
		}
	//删除
	}elseif($ac=='del'){
		//检查权限
		checkaction('email_mb_del');
		//添加日志
		$rss=$db->getrss('select `bname` from '.table('email_mb').' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('删除邮件模板：'.$row['bname'].'');	
		}
		//处理数据
		$db->execute('delete from '.table('email_mb').' where `id` in ('.$id.')');
	}
}

msg('操作成功','location="'.$url.'"');
?>