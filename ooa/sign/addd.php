<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');
//处理报名
checkaction($conf['sy']['pre'].'_edit');

$id=isset($_POST['id'])?html($_POST['id']):'';
$h_body=isset($_POST['h_body'])?html($_POST['h_body']):'';
$url=isset($_POST['url'])?$_POST['url']:'';

if ($id==''||!checknum($id)){
	msg('参数错误');
}

$row=$db->getrs('select * from '.table($conf['sy']['table_co']).' where `id`='.$id.'');
if ($row){
	$sq='';
	if ($row['htime']<=0){
		$sq=',`htime`='.time().'';
	}
	$db->execute('update '.table($conf['sy']['table_co']).' set chuli=1,h_body="'.$h_body.'"'.$sq.' where `id`='.$id.'');
	master_log('处理'.$conf['sy']['name'].'信息：'.$row['title'].'');
}

msg('保存成功','location="show.php?id='.$id.'&url='.urlencode($url).'"');
?>