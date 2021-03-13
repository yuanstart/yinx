<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config','../');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_co_add');//检查权限

$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$lx=isset($_POST['lx'])?html($_POST['lx']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$uename=isset($_POST['uename'])?html($_POST['uename']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';

if ($lm==''||!checknum($lm)||$lx==''||!checknum($lx)||$title==''||$px==''||!checknum($px)){
	msg('参数错误!');
}

$rename_key='';$rename_val='';
foreach($cong['mlang'] as $k=>$v){
	if ($conf['co']['rename']==true){
		$rename_key.=',`rename'.$v['lang'].'`';
		$rename_val.=',"'.(!empty($_POST['rename'.$v['lang']])?html($_POST['rename'.$v['lang']]):'').'"';
	}
	if ($conf['co']['mlang']!=true){
		break;
	}
}

//获取所属分类的分类列表
$list_lm='';
$rs=$db->getrs('select list_lm from '.table($conf['sy']['table_lm']).' where id_lm='.$lm.'');
if ($rs){
	$list_lm=$rs['list_lm'];
}

$sql='insert into '.table($conf['sy']['table_co']).' (`lm`,`list_lm`,`lx`,`title`'.$rename_key.',`uename`,`ding`,`tuijian`,`hot`,`pass`,`read_num`,`px`,`ip`,`wtime`) values('.$lm.',"'.$list_lm.'",'.$lx.',"'.$title.'"'.$rename_val.',"'.$uename.'",0,0,0,1,0,'.$px.',"'.getip().'",'.time().')';
$db->execute($sql);

//清理缓存
clear_static_cache();

//添加日志
master_log('添加'.$conf['sy']['name'].'信息：'.$title.'');

msg('添加成功','location="default.php"');
?>