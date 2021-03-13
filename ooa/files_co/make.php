<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config','../');

$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
$url=(previous())?previous():'default.php';

if ($ac==''){
	msg('参数错误');
}

//排序
if($ac=='px'){
	//检查权限
	checkaction($conf['sy']['pre'].'_co_edit');
	$px=isset($_POST['px'])?$_POST['px']:'';
	if ($px==''||!checknum($px)){
		msg('参数错误');
	}
	$id=implode(",",array_keys($px));
	$rss=$db->getrss('select `id`,`title`,`px` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')','id');
	foreach($px as $k=>$v){
		if (isset($rss[$k])){
			if ($v!=$rss[$k]['px']){
				//更新数据
				$db->execute('update '.table($conf['sy']['table_co']).' set `px`='.$v.' where `id`='.$k.'');
				//添加记录
				master_log('排序'.$conf['sy']['name'].'信息：'.$rss[$k]['title'].'');	
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
	//置顶
	if($ac=='ding1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `ding`=1 where `id` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('置顶'.$conf['sy']['name'].'信息：'.$row['title'].'');	
		}
	//取消置顶
	}elseif($ac=='ding2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `ding`=0 where `id` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消置顶'.$conf['sy']['name'].'：'.$row['title'].'');	
		}
	//推荐
	}elseif($ac=='tuijian1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `tuijian`=1 where `id` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('推荐'.$conf['sy']['name'].'信息：'.$row['title'].'');	
		}
	//取消推荐
	}elseif($ac=='tuijian2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `tuijian`=0 where `id` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消推荐'.$conf['sy']['name'].'：'.$row['title'].'');	
		}
	//热门
	}elseif($ac=='hot1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `hot`=1 where `id` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('热门'.$conf['sy']['name'].'信息：'.$row['title'].'');	
		}	
	//取消热门
	}elseif($ac=='hot2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `hot`=0 where `id` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消热门'.$conf['sy']['name'].'：'.$row['title'].'');	
		}	
	//取消屏蔽
	}elseif($ac=='pass1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `pass`=1 where `id` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消屏蔽'.$conf['sy']['name'].'：'.$row['title'].'');	
		}	
	//屏蔽
	}elseif($ac=='pass2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_co']).' set `pass`=0 where `id` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title` from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			master_log('屏蔽'.$conf['sy']['name'].'信息：'.$row['title'].'');	
		}	
	//删除
	}elseif ($ac=='del'){
		//检查权限
		checkaction($conf['sy']['pre'].'_co_del');
		//单图配置文件
		$conf_um=read_config('conf_um');
		//开始删除
		$rss=$db->getrss('select * from '.table($conf['sy']['table_co']).' where `id` in ('.$id.')');
		foreach($rss as $row){
			//删除单图
			if ($row['img_sl']!=''){
				if(isset($conf_um['up']['sm'])&&$conf_um['up']['sm']==true){
					foreach($conf_um['sm'] as $k=>$v){
						delfile(getimgj($row['img_sl'],$v['s_nam']));
					}
				}else{
					delfile($row['img_sl']);
				}
			}
			//删除文件
			if ($row['fil_sl']!=''){
				delfile($row['fil_sl']);
			}
			//删除信息
			$sql='delete from '.table($conf['sy']['table_co']).' where `id`='.$row['id'].'';
			$db->execute($sql);
			//添加日志
			master_log('删除'.$conf['sy']['name'].'信息：'.$row['title'].'');
		}
	}
}

msg('操作成功','location="'.$url.'"');
?>