<?php
require('../../include/common.inc.php');
checklogin();
checkaction('master_edit');

$id =isset($_POST['id'])?html(trim($_POST['id'])):'';
$url =isset($_POST['url'])?html(trim($_POST['url'])):'';
$password=isset($_POST['password'])?html(strtolower(trim($_POST['password']))):'';
$rename=isset($_POST['rename'])?html($_POST['rename']):'';
$menu_list=isset($_POST['menu_list'])?html($_POST['menu_list']):'';
$action_list=isset($_POST['action_list'])?html($_POST['action_list']):'';

if($id==''||!checknum($id)){
	msg('参数错误');
}

//不能自己修改自己的权限
$row=$db->getrs('select `username` from '.table('master').' where `id`='.$id.'');
if (!$row){
	msg('用户不存在或已删除');
}else{
	if ($row['username']==$_SESSION['hyadmin']){
		msg('不能修改自己的权限，要修改密码请点击导航的\"密码修改\"');
	}else{
		$username=$row['username'];
	}
}

$sq='';
if ($password!=''){
	if (strlen($password)<4||strlen($password)>20||!checkpassword($password)){
		msg('错误的登录密码格式');
	}else{
		$sq.=',password="'.$password.'"';
	}
}

//导航菜单
if ($menu_list){
	$rows=array();
	$rss=$db->getrss('select id from '.table('master_menu').' where fid=0 and pass=1 order by `px` asc,`id` asc');
	foreach($rss as $rs){
		$rows[]=$rs['id'];
	}
	if (!array_diff($rows,$menu_list)){
		$menu_list='all';
	}else{
		$menu_list=implode(',',$menu_list);
	}
}else{
	$menu_list='all';
}

//权限
if ($action_list){
	$rows=array();
	$rss=$db->getrss('select title_val from '.table('master_action').' where fid in (select id from '.table('master_menu').' where fid=0 and pass=1) and pass=1 order by `px` asc,`id` asc');
	foreach($rss as $rs){
		$rows[]=$rs['title_val'];
	}
	if (!array_diff($rows,$action_list)){
		$action_list='all';
	}else{
		$action_list=implode(',',$action_list);
	}
}else{
	$action_list='all';
}

$sql='update '.table('master').' set `rename`="'.$rename.'",`menu_list`="'.$menu_list.'",`action_list`="'.$action_list.'"'.$sq.'  where id='.$id.'';
$db->execute($sql);

//添加日志
master_log('修改管理员：'.$username.'');

$sess->delete_admin_session($username);

msg('保存成功','location="'.$url.'"');
?>