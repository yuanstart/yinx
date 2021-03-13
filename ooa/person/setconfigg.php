<?php
require('../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配置
	$sy_id=$conf['sy']['id']=(!empty($_POST['id']))?(int)html($_POST['id']):8;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'person';
	$conf['sy']['name']=(!empty($_POST['name']))?html($_POST['name']):'会员';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'person';
	//获取信息配置
	$conf['co']['rename']=(!empty($_POST['rename']))?changety(html($_POST['rename'])):true;
	$conf['co']['sex']=(!empty($_POST['sex']))?changety(html($_POST['sex'])):false;
	$conf['co']['phone']=(!empty($_POST['phone']))?changety(html($_POST['phone'])):true;
	$conf['co']['fax']=(!empty($_POST['fax']))?changety(html($_POST['fax'])):false;
	$conf['co']['email']=(!empty($_POST['email']))?changety(html($_POST['email'])):true;
	$conf['co']['qq']=(!empty($_POST['qq']))?changety(html($_POST['qq'])):false;
	$conf['co']['wx']=(!empty($_POST['wx']))?changety(html($_POST['wx'])):false;
	$conf['co']['compname']=(!empty($_POST['compname']))?changety(html($_POST['compname'])):false;
	$conf['co']['address']=(!empty($_POST['address']))?changety(html($_POST['address'])):true;
	$conf['co']['post']=(!empty($_POST['post']))?changety(html($_POST['post'])):false;
	$conf['co']['z_body']=(!empty($_POST['z_body']))?changety(html($_POST['z_body'])):true;
	//保存系统的配置文件
	write_config('config',$conf,$ympath);
	//存入数组
	$db->execute('update '.table('setup_sy').' set `title`="'.$conf['sy']['name'].'系统",`config`="'.addslash(serialize($conf)).'" where sy_id='.$sy_id.'');
	//清理缓存
	clear_static_cache();
	unset($conf);
}

//添加日志
if($conf=read_config('config')){
	master_log('修改'.$conf['sy']['name'].'系统：配置文件');
}

msg('保存成功','location="setconfig.php"');
?>
