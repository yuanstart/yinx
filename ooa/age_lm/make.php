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
	if($ac=='del'){
		//检查权限
		checkaction($conf['sy']['pre'].'_lm_del');
		//单图配置文件
		$conf_um=read_config('conf_um','../');
		//开始删除
		$rsk=$db->getrss('select * from '.table($conf['sy']['table_lm']).' where `id_lm` in ('.$id.')');
		foreach ($rsk as $rst){
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
					delfile($row['pic_sl']);
				}
			}
			//删除分类的记录
			$db->execute('delete from '.table($conf['sy']['table_lm']).' where `id_lm`='.$rst['id_lm'].'');
			//添加日志
			master_log('删除'.$conf['sy']['name'].'分类：'.$rst['title_lm'].'');
		}
	}
}

msg('操作成功','location="default.php"');
?>