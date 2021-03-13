<?php
require('../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配
	$sy_id=$conf['sy']['id']=(!empty($_POST['id']))?(int)html($_POST['id']):20;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'age';
	$conf['sy']['name']=(!empty($_POST['name']))?html($_POST['name']):'经销商';
	$conf['sy']['table_lm']=(!empty($_POST['table_lm']))?html($_POST['table_lm']):'age_lm';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'age_co';
	$conf['sy']['need_lm']=(!empty($_POST['need_lm']))?changety(html($_POST['need_lm'])):true;
	//获取信息配置
	$conf['co']['seo']=(!empty($_POST['seo']))?changety(html($_POST['seo'])):false;
	$conf['co']['ageno']=(!empty($_POST['ageno']))?changety(html($_POST['ageno'])):true;
	$conf['co']['area']=(!empty($_POST['area']))?changety(html($_POST['area'])):true;
	$conf['co']['idcard']=(!empty($_POST['idcard']))?changety(html($_POST['idcard'])):true;
	$conf['co']['wx']=(!empty($_POST['wx']))?changety(html($_POST['wx'])):true;
	$conf['co']['qq']=(!empty($_POST['qq']))?changety(html($_POST['qq'])):true;
	$conf['co']['phone']=(!empty($_POST['phone']))?changety(html($_POST['phone'])):true;
	$conf['co']['stime']=(!empty($_POST['stime']))?changety(html($_POST['stime'])):true;
	$conf['co']['etime']=(!empty($_POST['etime']))?changety(html($_POST['etime'])):true;
	$conf['co']['f_body']=(!empty($_POST['f_body']))?changety(html($_POST['f_body'])):false;
	$conf['co']['z_body']=(!empty($_POST['z_body']))?changety(html($_POST['z_body'])):false;
	$conf['co']['img_sl']=(!empty($_POST['img_sl']))?changety(html($_POST['img_sl'])):false;
	$conf['co']['pic_sl']=(!empty($_POST['pic_sl']))?changety(html($_POST['pic_sl'])):false;
	$conf['co']['mb_sl']=(!empty($_POST['pic_mb_sl']))?html($_POST['pic_mb_sl']):'';
	$conf['co']['path']=(!empty($_POST['pic_path']))?html($_POST['pic_path']):'';
	$conf['co']['wtime']=(!empty($_POST['wtime']))?changety(html($_POST['wtime'])):false;
	$conf['co']['pass']=(!empty($_POST['pass']))?changety(html($_POST['pass'])):true;
	if (!empty($_POST['pic_t'])){
		foreach($_POST['pic_t'] as $k=>$v){
			$pic_x=(!empty($_POST['pic_x'][$k]))?html($_POST['pic_x'][$k]):0;
			$pic_y=(!empty($_POST['pic_y'][$k]))?html($_POST['pic_y'][$k]):0;
			$pic_s=(!empty($_POST['pic_s'][$k]))?html($_POST['pic_s'][$k]):0;
			$pic_f=(!empty($_POST['pic_f'][$k]))?html($_POST['pic_f'][$k]):0;
			$pic_t=(!empty($_POST['pic_t'][$k]))?html($_POST['pic_t'][$k]):'';
			if ($pic_x!=''||$pic_y!=''||$pic_s!=''||$pic_t!=''){
				$conf['pic_sl'][]=array('x'=>$pic_x,'y'=>$pic_y,'s'=>$pic_s,'f'=>$pic_f,'t'=>$pic_t);
			}
		}
	}else{
		$conf['pic_sl'][]=array('x'=>'0','y'=>0,'s'=>0,'f'=>'include/arial.ttf','t'=>'test');
	}
	//保存系统的配置文件
	write_config('config',$conf,$ympath);
	//存入数组
	$db->execute('update '.table('setup_sy').' set `title`="'.$conf['sy']['name'].'系统",`config`="'.addslash(serialize($conf)).'" where sy_id='.$sy_id.'');
	//清理缓存
	clear_static_cache();
	unset($conf);
}

if (read_config('conf_um','../')){
	//保存图片上传
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
