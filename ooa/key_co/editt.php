<?php
require('../../include/common.inc.php');
checklogin();
checkaction('key_edit');
$cong=load_config('setup');//加载整站配置文件

$id =isset($_POST['id'])?html(trim($_POST['id'])):'';
$px=isset($_POST['px'])?html(trim($_POST['px'])):'';
$url =isset($_POST['url'])?html(trim($_POST['url'])):'';

if($id==''||!checknum($id)||$px==''||!checknum($px)){
	msg('参数错误');
}

//多语言的多个字段动态获取，先判断必填项，然后转换为数据表字段名和字段值
$title='';$title_key='';$title_val='';$link_url_key='';$link_url_val='';
foreach($cong['mlang'] as $k=>$v){
	//判断必填项
	if($v['must']==true&&empty($_POST['title'.$v['lang']])){
		msg('参数错误');
	}
	//获取第1个标题用于添加日志
	if ($k==0){
		$title=!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'';
	}
	//转换为字段名、转换为字段值
	$title_val    .=',`title'.$v['lang'].'`="'.(!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'').'"';
	$link_url_val .=',`link_url'.$v['lang'].'`="'.(!empty($_POST['link_url'.$v['lang']])?html($_POST['link_url'.$v['lang']]):'').'"';
}

$sql='update '.table('key_co').' set `px`="'.$px.'"'.$title_val.$link_url_val.'  where id='.$id.'';
$db->execute($sql);

//添加日志
master_log('修改关键词：'.$title.'');

msg('保存成功','location="'.$url.'"');
?>