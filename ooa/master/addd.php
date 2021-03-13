<?php
require('../../include/common.inc.php');
checklogin();
checkaction('master_add');

$username=isset($_POST['username'])?html(strtolower(trim($_POST['username']))):'';
$password=isset($_POST['password'])?html(strtolower(trim($_POST['password']))):'';
$rename=isset($_POST['rename'])?html($_POST['rename']):'';
$menu_list=isset($_POST['menu_list'])?html($_POST['menu_list']):'';
$action_list=isset($_POST['action_list'])?html($_POST['action_list']):'';

if (strlen($username)<4||strlen($username)>20||!checkusername($username)){
	msg('错误的用户名格式');
}

if (strlen($password)<4||strlen($password)>20||!checkpassword($password)){
	msg('错误的登录密码格式');
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

$rs=$db->getrs('select * from '.table('master').' where `username`="'.$username.'"');
if ($rs){
	msg("该用户名已被使用");
}else{
	$sql='insert into '.table('master').' (`username`,`password`,`rename`,`menu_list`,`action_list`,`login_num`,`pass`,`wtime`,`wip`) values("'.$username.'","'.$password.'","'.$rename.'","'.$menu_list.'","'.$action_list.'",0,1,'.time().',"'.getip().'")';
	$db->execute($sql);
}

//添加日志
master_log('添加管理员：'.$username.'');

msg('添加成功','location="default.php"');
?>