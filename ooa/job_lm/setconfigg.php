<?php
require('../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配置
	$sy_id=$conf['sy']['id']=(!empty($_POST['id']))?(int)html($_POST['id']):9;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'job';
	$conf['sy']['name']=(!empty($_POST['name']))?html($_POST['name']):'招聘';
	$conf['sy']['table_lm']=(!empty($_POST['table_lm']))?html($_POST['table_lm']):'job_lm';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'job_co';
	$conf['sy']['table_yp']=(!empty($_POST['table_yp']))?html($_POST['table_yp']):'job_yp';
	$conf['sy']['need_lm']=(!empty($_POST['need_lm']))?changety(html($_POST['need_lm'])):true;
	$conf['sy']['level_lm']=(!empty($_POST['level_lm']))?(int)html($_POST['level_lm']):0;
	$conf['sy']['send']=(!empty($_POST['send']))?changety(html($_POST['send'])):true;
	//获取分类配置
	$conf['lm']['mlang']=(!empty($_POST['mlang_lm']))?changety(html($_POST['mlang_lm'])):false;
	$conf['lm']['seo']=(!empty($_POST['seo_lm']))?changety(html($_POST['seo_lm'])):false;
	$conf['lm']['add_lm']=(!empty($_POST['add_lm']))?changety(html($_POST['add_lm'])):true;
	$conf['lm']['apname_lm']=(!empty($_POST['apname_lm']))?changety(html($_POST['apname_lm'])):false;
	$conf['lm']['url_lm']=(!empty($_POST['url_lm']))?changety(html($_POST['url_lm'])):false;
	$conf['lm']['z_body_lm']=(!empty($_POST['z_body_lm']))?changety(html($_POST['z_body_lm'])):false;
	$conf['lm']['con_att']=(!empty($_POST['con_att_lm']))?changety(html($_POST['con_att_lm'])):true;
	$conf['lm']['tuijian']=(!empty($_POST['tuijian_lm']))?changety(html($_POST['tuijian_lm'])):false;
	$conf['lm']['hot']=(!empty($_POST['hot_lm']))?changety(html($_POST['hot_lm'])):false;
	$conf['lm']['pass']=(!empty($_POST['pass_lm']))?changety(html($_POST['pass_lm'])):false;
	//获取信息配置
	$conf['co']['mlang']=(!empty($_POST['mlang']))?changety(html($_POST['mlang'])):false;
	$conf['co']['seo']=(!empty($_POST['seo']))?changety(html($_POST['seo'])):false;
	$conf['co']['add_xx']=(!empty($_POST['add_xx']))?changety(html($_POST['add_xx'])):true;
	$conf['co']['apname']=(!empty($_POST['apname']))?changety(html($_POST['apname'])):false;
	$conf['co']['link_url']=(!empty($_POST['link_url']))?changety(html($_POST['link_url'])):false;
	$conf['co']['num']=(!empty($_POST['num']))?changety(html($_POST['num'])):false;
	$conf['co']['address']=(!empty($_POST['address']))?changety(html($_POST['address'])):false;
	$conf['co']['stime']=(!empty($_POST['stime']))?changety(html($_POST['stime'])):false;
	$conf['co']['etime']=(!empty($_POST['etime']))?changety(html($_POST['etime'])):false;
	$conf['co']['f_body']=(!empty($_POST['f_body']))?changety(html($_POST['f_body'])):false;
	$conf['co']['z_body']=(!empty($_POST['z_body']))?changety(html($_POST['z_body'])):true;
	$conf['co']['wtime']=(!empty($_POST['wtime']))?changety(html($_POST['wtime'])):false;
	$conf['co']['ding']=(!empty($_POST['ding']))?changety(html($_POST['ding'])):true;
	$conf['co']['tuijian']=(!empty($_POST['tuijian']))?changety(html($_POST['tuijian'])):false;
	$conf['co']['hot']=(!empty($_POST['hot']))?changety(html($_POST['hot'])):false;
	$conf['co']['pass']=(!empty($_POST['pass']))?changety(html($_POST['pass'])):true;
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