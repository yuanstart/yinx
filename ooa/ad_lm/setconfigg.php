<?php
require('../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配置
	$sy_id=$conf['sy']['id']=(!empty($_POST['id']))?(int)html($_POST['id']):14;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'ad';
	$conf['sy']['name']=(!empty($_POST['name']))?html($_POST['name']):'广告';
	$conf['sy']['table_lm']=(!empty($_POST['table_lm']))?html($_POST['table_lm']):'ad_lm';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'ad_co';
	$conf['sy']['need_lm']=(!empty($_POST['need_lm']))?changety(html($_POST['need_lm'])):true;
	$conf['sy']['level_lm']=(!empty($_POST['level_lm']))?(int)html($_POST['level_lm']):0;
	//获取分类配置
	$conf['lm']['mlang']=(!empty($_POST['mlang_lm']))?changety(html($_POST['mlang_lm'])):false;
	$conf['lm']['add_lm']=(!empty($_POST['add_lm']))?changety(html($_POST['add_lm'])):true;
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
	$conf['co']['link_url_lang']=(!empty($_POST['link_url_lang']))?changety(html($_POST['link_url_lang'])):false;
	$conf['co']['f_body']=(!empty($_POST['f_body']))?changety(html($_POST['f_body'])):false;
	$conf['co']['z_body']=(!empty($_POST['z_body']))?changety(html($_POST['z_body'])):true;
	$conf['co']['img_sl']=(!empty($_POST['img_sl']))?changety(html($_POST['img_sl'])):false;
	$conf['co']['img_sl_lang']=(!empty($_POST['img_sl_lang']))?changety(html($_POST['img_sl_lang'])):false;
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

//保存图片上传
if (read_config('conf_um','../')){
	$conf['up']['path']=(!empty($_POST['um_path']))?html($_POST['um_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['um_maxsize']))?html($_POST['um_maxsize']):'200000';
	$conf['up']['text']=(!empty($_POST['um_text']))?html($_POST['um_text']):'';
	$conf['up']['sm']=(!empty($_POST['um_sm']))?changety(html($_POST['um_sm'])):false;
	if (!empty($_POST['um_s_typ'])){
		foreach($_POST['um_s_typ'] as $k=>$v){
			$um_s_nam=(!empty($_POST['um_s_nam'][$k]))?html($_POST['um_s_nam'][$k]):'';
			$um_s_typ=(!empty($_POST['um_s_typ'][$k]))?changety(html($_POST['um_s_typ'][$k])):false;
			$um_s_wid=(!empty($_POST['um_s_wid'][$k]))?html($_POST['um_s_wid'][$k]):0;
			$um_s_hei=(!empty($_POST['um_s_hei'][$k]))?html($_POST['um_s_hei'][$k]):0;
			if ($um_s_nam!=''||$um_s_wid!=''||$um_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$um_s_nam,'s_typ'=>$um_s_typ,'s_wid'=>$um_s_wid,'s_hei'=>$um_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	//保存配置文件
	write_config('conf_um',$conf,$ympath,'../');
	unset($conf);
}

//添加日志
if($conf=read_config('config')){
	master_log('修改'.$conf['sy']['name'].'系统：配置文件');
}

msg('保存成功','location="setconfig.php"');
?>
