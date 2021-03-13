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
if($ac=='del'){
	//检查权限
	checkaction('email_co_del');
	//添加日志
	$rss=$db->getrss('select `title` from '.table('email_co').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('删除邮件：'.$row['title'].'');	
	}
	//处理数据
	$db->execute('delete from '.table('email_co').' where `id` in ('.$id.')');
}

msg('操作成功','location="'.$url.'"');
?>