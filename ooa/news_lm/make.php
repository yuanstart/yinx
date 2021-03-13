<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');

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
	$rss=$db->getrss('select `id_lm`,`title_lm`,`px` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')','id_lm');
	foreach($px as $k=>$v){
		if (isset($rss[$k])){
			if ($v!=$rss[$k]['px']){
				//更新数据
				$db->execute('update '.table($conf['sy']['table_lm']).' set `px`='.$v.' where `id_lm`='.$k.'');
				//添加记录
				master_log('排序'.$conf['sy']['name'].'分类：'.$rss[$k]['title_lm'].'');	
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
	//推荐
	if($ac=='tuijian1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `tuijian`=1 where `id_lm` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('推荐'.$conf['sy']['name'].'分类：'.$row['title_lm'].'');	
		}
	//取消推荐
	}elseif($ac=='tuijian2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `tuijian`=0 where `id_lm` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消推荐'.$conf['sy']['name'].'：'.$row['title_lm'].'');	
		}
	//热门
	}elseif($ac=='hot1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `hot`=1 where `id_lm` in ('.$id.')');
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('热门'.$conf['sy']['name'].'分类：'.$row['title_lm'].'');	
		}
	//取消热门
	}elseif($ac=='hot2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `hot`=0 where `id_lm` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消热门'.$conf['sy']['name'].'：'.$row['title_lm'].'');	
		}
	//取消屏蔽
	}elseif($ac=='pass1'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `pass`=1 where `id_lm` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('取消屏蔽'.$conf['sy']['name'].'：'.$row['title_lm'].'');	
		}
	//屏蔽
	}elseif($ac=='pass2'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_edit');
		//处理数据
		$db->execute('update '.table($conf['sy']['table_lm']).' set `pass`=0 where `id_lm` in ('.$id.')');	
		//添加日志
		$rss=$db->getrss('select `title_lm` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach($rss as $row){
			master_log('屏蔽'.$conf['sy']['name'].'分类：'.$row['title_lm'].'');	
		}
	//删除
	}elseif($ac=='del'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_del');
		//单图配置文件
		$conf_um=read_config('conf_um','../');
		//单图2配置文件
		$conf_up=read_config('conf_up','../');
		//多图配置文件
		$conf_pm=read_config('conf_pm','../');
		//开始删除
		$rsk=$db->getrss('select `id_lm` from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach($rsk as $rsm){
			$rsn=$db->getrss('select * from '.table($conf['sy']['table_lm']).' where locate(",'.$rsm["id_lm"].',",list_lm)>0');
			foreach ($rsn as $rst){
				//删除分类下的信息以及信息的图片、文件、视频
				$sql='select * from '.table($conf['sy']['table_co']).' where `lm`='.$rst['id_lm'].'';
				$rss=$db->getrss($sql);
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
					//删除单图2
					if ($row['pic_sl']!=''){
						if(isset($conf_up['up']['sm'])&&$conf_up['up']['sm']==true){
							foreach($conf_up['sm'] as $k=>$v){
								delfile(getimgj($row['pic_sl'],$v['s_nam']));
							}
						}else{
							delfile($row['pic_sl']);
						}
					}
					//删除多图
					if(!empty($conf_pm)){
						//删除多图的图片
						$sql='select `id`,`img_sl` from '.table($conf_pm['pl']['table']).' where `sy_id`='.$conf_pm['pl']['sy_id'].' and `pl_id`='.$row['id'].'';
						$arr=$db->getrss($sql);
						foreach($arr as $rsb){
							if($rsb['img_sl']!=''){
								if(isset($conf_pm['up']['sm'])&&$conf_pm['up']['sm']==true){
									foreach($conf_pm['sm'] as $k=>$v){
										delfile(getimgj($rsb['img_sl'],$v['s_nam']));
									}
								}else{
									delfile($rsb['img_sl']);
								}
							}
						}
						//删除多图的记录
						$db->execute('delete from '.table($conf_pm['pl']['table']).' where `sy_id`='.$conf_pm['pl']['sy_id'].' and `pl_id`='.$row['id'].'');
					}					
					//删除信息
					$db->execute('delete from '.table($conf['sy']['table_co']).' where `id`='.$row['id'].'');
				}
				//删除分类的图片
				if ($rst['img_sl_lm']!=''){
					if(isset($conf_ul['up']['sm'])&&$conf_ul['up']['sm']==true){
						foreach($conf_ul['sm'] as $k=>$v){
							delfile(getimgj($rst['img_sl_lm'],$v['s_nam']));
						}
					}else{
						delfile($rst['img_sl_lm']);
					}
				}
				//删除分类的记录
				$db->execute('delete from '.table($conf['sy']['table_lm']).' where `id_lm`='.$rst['id_lm'].'');
				//添加日志
				master_log('删除'.$conf['sy']['name'].'分类：'.$rst['title_lm'].'');
			}
		}
	}
}

msg('操作成功','location="default.php"');
?>