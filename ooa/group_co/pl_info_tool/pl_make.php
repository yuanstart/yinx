<?php
require('../../../include/common.inc.php');
require('up_image_tool/upcon.php');
require('pl_config.php');
checklogin();

$act=isset($_GET['act'])?$_GET['act']:'';
if ($act==''){
	msg('参数错误');
}

//启用
if ($act=='pass1'){
	$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';	
	$pl_id=isset($_GET['pl_id'])?$_GET['pl_id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if ($pl_id!=''&&!checknum($pl_id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}
	$db->execute('update '.table($conf['pl']['table']).' set `pass`=1 where `id` in ('.$id.')');
//停用	
}elseif($act=='pass2'){
	$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';	
	$pl_id=isset($_GET['pl_id'])?$_GET['pl_id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if ($pl_id!=''&&!checknum($pl_id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}
	$db->execute('update '.table($conf['pl']['table']).' set `pass`=0 where `id` in ('.$id.')');
//删除
}elseif ($act=='del'){
	$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
	$pl_id=isset($_GET['pl_id'])?$_GET['pl_id']:'';
	if ($pl_id!=''&&!checknum($pl_id)){
		msg('参数错误');
	}
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}
	$sql='select * from '.table($conf['pl']['table']).' where `id` in ('.$id.')';
	$rss=$db->getrss($sql);
	foreach($rss as $row){
		if ($row['img_sl']!=''){
			if($conf['up']['sm']){
				foreach($conf['sm'] as $k=>$v){
					delfile(getimgj($row['img_sl'],$v['s_nam']));
				}
			}else{
				delfile($row['img_sl']);
			}
		}
		if ($row['img_sl2']!=''){
			if($conf['up']['sm']){
				foreach($conf['sm'] as $k=>$v){
					delfile(getimgj($row['img_sl2'],$v['s_nam']));
				}
			}else{
				delfile($row['img_sl2']);
			}
		}
		$db->execute('delete from '.table($conf['pl']['table']).' where `id`='.$row['id'].'');
	}
//排序
}elseif($act=='px'){
	$px=isset($_POST['px'])?$_POST['px']:'';
	$pl_id=isset($_GET['pl_id'])?$_GET['pl_id']:'';
	if ($pl_id!=''&&!checknum($pl_id)){
		msg('参数错误');
	}
	if ($px==''||!checknum($px)){
		msg('参数错误');
	}
	foreach($px as $k=>$v){
		$db->execute('update '.table($conf['pl']['table']).' set px='.$px[$k].' where id='.$k.'');
	}
}

msg('','location="pl_default.php?pl_id='.$pl_id.'"');
?>