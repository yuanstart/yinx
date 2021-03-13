<?php
require('../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配置
	$sy_id=$conf['sy']['id']=(!empty($_POST['id']))?(int)html($_POST['id']):16;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'kf';
	$conf['sy']['name']=(!empty($_POST['name']))?html($_POST['name']):'客服';
	$conf['sy']['table_lm']=(!empty($_POST['table_lm']))?html($_POST['table_lm']):'kf_lm';
	$conf['sy']['table_lx']=(!empty($_POST['table_lx']))?html($_POST['table_lx']):'kf_lx';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'kf_co';
	$conf['sy']['need_lm']=(!empty($_POST['need_lm']))?changety(html($_POST['need_lm'])):true;
	$conf['sy']['need_lx']=(!empty($_POST['need_lx']))?changety(html($_POST['need_lx'])):true;
	$conf['sy']['level_lm']=(!empty($_POST['level_lm']))?(int)html($_POST['level_lm']):0;
	$conf['sy']['tb_size']=(!empty($_POST['tb_size']))?html($_POST['tb_size']):'d';
	$conf['sy']['tb_type']=(!empty($_POST['tb_type']))?html($_POST['tb_type']):'web';
	$conf['sy']['rename_show']=(!empty($_POST['rename_show']))?changety(html($_POST['rename_show'])):true;
	//获取分类配置
	$conf['lm']['mlang']=(!empty($_POST['mlang_lm']))?changety(html($_POST['mlang_lm'])):true;
	$conf['lm']['add_lm']=(!empty($_POST['add_lm']))?changety(html($_POST['add_lm'])):true;
	$conf['lm']['con_att']=(!empty($_POST['con_att_lm']))?changety(html($_POST['con_att_lm'])):true;
	$conf['lm']['tuijian']=(!empty($_POST['tuijian_lm']))?changety(html($_POST['tuijian_lm'])):false;
	$conf['lm']['hot']=(!empty($_POST['hot_lm']))?changety(html($_POST['hot_lm'])):false;
	$conf['lm']['pass']=(!empty($_POST['pass_lm']))?changety(html($_POST['pass_lm'])):false;
	//获取信息配置
	$conf['co']['mlang']=(!empty($_POST['mlang']))?changety(html($_POST['mlang'])):true;
	$conf['co']['add_xx']=(!empty($_POST['add_xx']))?changety(html($_POST['add_xx'])):true;
	$conf['co']['rename']=(!empty($_POST['rename']))?changety(html($_POST['rename'])):true;
	$conf['co']['uename']=(!empty($_POST['uename']))?changety(html($_POST['uename'])):true;
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
