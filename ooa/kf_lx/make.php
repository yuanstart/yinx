<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$conf=read_config('config','../');//读取本系统配置文件

$ac=isset($_GET['ac'])?$_GET['ac']:'';
if ($ac==''){
	msg('参数错误');
}

//排序
if($ac=='px'){
	//检查权限
	checkaction($conf['sy']['pre'].'_lm_edit');
	$px=isset($_POST['px'])?$_POST['px']:'';
	if ($px==''||!checknum($px)){
		msg('参数错误');
	}
	$id=implode(",",array_keys($px));
	$rss=$db->getrss('select `id_lm`,`title_lm`,`px` from '.table($conf['sy']['table_lx']).' where `id_lm` in ('.$id.')','id_lm');
	foreach($px as $k=>$v){
		if (isset($rss[$k])){
			if ($v!=$rss[$k]['px']){
				//更新数据
				$db->execute('update '.table($conf['sy']['table_lx']).' set `px`='.$v.' where `id_lm`='.$k.'');
				//添加记录
				master_log('排序'.$conf['sy']['name'].'类型：'.$rss[$k]['title_lm'].'');	
			}
		}
	}
}else{
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}
	
	//取消屏蔽
	if($ac=='pass1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lx_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `pass`=1 where `id_lm` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lx']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消屏蔽'.$conf['sy']['name'].'：'.$row['table_lx'].'');	
		}
	//屏蔽
	}elseif($ac=='pass2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lx_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `pass`=0 where `id_lm` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lx']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('屏蔽'.$conf['sy']['name'].'类型：'.$row['table_lx'].'');	
		}
	//删除
	}elseif($ac=='del'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lx_del');
		//开始删除
		$rsk=$db->getrss('select `id_lm`,`title_lm` from '.table($conf['sy']['table_lx']).' where `id_lm` in ('.$id.')');
		foreach($rsk as $rsm){
			//删除分类的记录
			$db->execute('delete from '.table($conf['sy']['table_lx']).' where `id_lm`='.$rsm['id_lm'].'');
			//添加日志
			master_log('删除'.$conf['sy']['name'].'类型：'.$rsm['title_lm'].'');
		}
	}
}

msg('操作成功','location="default.php"');
?>