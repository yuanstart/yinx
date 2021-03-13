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
		//多图配置文件
		$conf_pm=read_config('conf_pm');
		//相关信息图片配置文件
		$conf_pi=read_config('conf_pi');
		//相关文件图片配置文件
		$conf_pf=read_config('conf_pf');
		//相关视频图片配置文件
		$conf_pv=read_config('conf_pv');
		//组图配置文件
		$conf_pz=read_config('conf_pz');
		//开始删除
		$rss=$db->getrss('select a.*,b.info_img_sm,b.info_pic_sm from '.table($conf['sy']['table_co']).' a left join '.table($conf['sy']['table_lm']).' b on a.`lm`=b.`id_lm` where `id` in ('.$id.')');
		foreach($rss as $row){
			$conf_um=unserialize($row['info_img_sm']);
			$conf_up=unserialize($row['info_pic_sm']);
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
			//删除文件
			if ($row['fil_sl']!=''){
				delfile($row['fil_sl']);
			}
			//删除视频
			if ($row['vid_sl']!=''){
				delfile($row['vid_sl']);
			}
			//删除多图
			if(!empty($conf_pm)){
				//删除多图的图片
				$sql='select `id`,`img_sl` from '.table($conf_pm['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pm['pl']['sy_id'].'';
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
				$db->execute('delete from '.table($conf_pm['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pm['pl']['sy_id'].'');
			}
			//删除相关信息
			if(!empty($conf_pi)){
				//删除相关信息的图片
				$sql='select `id`,`img_sl` from '.table($conf_pi['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pi['pl']['sy_id'].'';
				$arr=$db->getrss($sql);
				foreach($arr as $rsb){
					if($rsb['img_sl']!=''){
						if(isset($conf_pi['up']['sm'])&&$conf_pi['up']['sm']==true){
							foreach($conf_pi['sm'] as $k=>$v){
								delfile(getimgj($rsb['img_sl'],$v['s_nam']));
							}
						}else{
							delfile($rsb['img_sl']);
						}
					}
				}
				//删除相关信息的记录
				$db->execute('delete from '.table($conf_pi['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pi['pl']['sy_id'].'');
			}
			//删除相关文件
			if(!empty($conf_pf)){
				//删除相关文件的图片、文件
				$sql='select `id`,`img_sl`,`fil_sl` from '.table($conf_pf['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pf['pl']['sy_id'].'';
				$arr=$db->getrss($sql);
				foreach($arr as $rsb){
					if($rsb['img_sl']!=''){
						if(isset($conf_pf['up']['sm'])&&$conf_pf['up']['sm']==true){
							foreach($conf_pf['sm'] as $k=>$v){
								delfile(getimgj($rsb['img_sl'],$v['s_nam']));
							}
						}else{
							delfile($rsb['img_sl']);
						}
					}
					if($rsb['fil_sl']!=''){
						delfile($rsb['fil_sl']);
					}
				}
				//删除相关文件的记录
				$db->execute('delete from '.table($conf_pf['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pf['pl']['sy_id'].'');
			}
			//删除相关视频
			if(!empty($conf_pv)){
				//删除相关视频的图片、视频
				$sql='select `id`,`img_sl`,`vid_sl` from '.table($conf_pv['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pv['pl']['sy_id'].'';
				$arr=$db->getrss($sql);
				foreach($arr as $rsb){
					if($rsb['img_sl']!=''){
						if(isset($conf_pv['up']['sm'])&&$conf_pv['up']['sm']==true){
							foreach($conf_pv['sm'] as $k=>$v){
								delfile(getimgj($rsb['img_sl'],$v['s_nam']));
							}
						}else{
							delfile($rsb['img_sl']);
						}
					}
					if($rsb['vid_sl']!=''){
						delfile($rsb['vid_sl']);
					}
				}
				//删除相关视频的记录
				$db->execute('delete from '.table($conf_pv['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pv['pl']['sy_id'].'');
			}
			//删除组图
			if(!empty($conf_pz)){
				//删除分组的图片
				$sql='select `id`,`img_sl` from '.table($conf_pz['pl']['table']).' where `fid`=0 and `pl_id`='.$row['id'].' and `sy_id`='.$conf_pz['pl']['sy_id'].'';
				$arr=$db->getrss($sql);
				foreach($arr as $rsb){
					if($rsb['img_sl']!=''){
						if(isset($conf_pz['image']['up']['sm'])&&$conf_pz['image']['up']['sm']==true){
							foreach($conf_pz['image']['sm'] as $k=>$v){
								delfile(getimgj($rsb['img_sl'],$v['s_nam']));
							}
						}else{
							delfile($rsb['img_sl']);
						}
					}
					//删除组图的图片
					$sql='select `id`,`img_sl` from '.table($conf_pz['pl']['table']).' where fid='.$rsb['id'].' and `pl_id`='.$row['id'].' and `sy_id`='.$conf_pz['pl']['sy_id'].'';
					$arc=$db->getrss($sql);
					foreach($arc as $rsc){
						if($rsc['img_sl']!=''){
							if(isset($conf_pz['up']['sm'])&&$conf_pz['up']['sm']==true){
								foreach($conf_pz['sm'] as $k=>$v){
									delfile(getimgj($rsc['img_sl'],$v['s_nam']));
								}
							}else{
								delfile($rsc['img_sl']);
							}
						}
					}
					//删除组图的记录
					$db->execute('delete from '.table($conf_pz['pl']['table']).' where fid='.$rsb['id'].' and `pl_id`='.$row['id'].' and `sy_id`='.$conf_pz['pl']['sy_id'].'');
				}
				//删除分组的记录
				$db->execute('delete from '.table($conf_pz['pl']['table']).' where `pl_id`='.$row['id'].' and `sy_id`='.$conf_pz['pl']['sy_id'].'');
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