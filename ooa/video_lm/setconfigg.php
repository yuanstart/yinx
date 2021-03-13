<?php
require('../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配置
	$sy_id=$conf['sy']['id']=(!empty($_POST['id']))?(int)html($_POST['id']):5;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'video';
	$conf['sy']['name']=(!empty($_POST['name']))?html($_POST['name']):'视频';
	$conf['sy']['table_lm']=(!empty($_POST['table_lm']))?html($_POST['table_lm']):'video_lm';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'video_co';
	$conf['sy']['need_lm']=(!empty($_POST['need_lm']))?changety(html($_POST['need_lm'])):true;
	$conf['sy']['level_lm']=(!empty($_POST['level_lm']))?(int)html($_POST['level_lm']):0;
	//获取分类配置
	$conf['lm']['mlang']=(!empty($_POST['mlang_lm']))?changety(html($_POST['mlang_lm'])):false;
	$conf['lm']['seo']=(!empty($_POST['seo_lm']))?changety(html($_POST['seo_lm'])):false;
	$conf['lm']['add_lm']=(!empty($_POST['add_lm']))?changety(html($_POST['add_lm'])):true;
	$conf['lm']['apname_lm']=(!empty($_POST['apname_lm']))?changety(html($_POST['apname_lm'])):false;
	$conf['lm']['url_lm']=(!empty($_POST['url_lm']))?changety(html($_POST['url_lm'])):false;
	$conf['lm']['f_body_lm']=(!empty($_POST['f_body_lm']))?changety(html($_POST['f_body_lm'])):false;
	$conf['lm']['z_body_lm']=(!empty($_POST['z_body_lm']))?changety(html($_POST['z_body_lm'])):false;
	$conf['lm']['img_sl_lm']=(!empty($_POST['img_sl_lm']))?changety(html($_POST['img_sl_lm'])):false;
	$conf['lm']['con_att']=(!empty($_POST['con_att_lm']))?changety(html($_POST['con_att_lm'])):true;
	$conf['lm']['tuijian']=(!empty($_POST['tuijian_lm']))?changety(html($_POST['tuijian_lm'])):false;
	$conf['lm']['hot']=(!empty($_POST['hot_lm']))?changety(html($_POST['hot_lm'])):false;
	$conf['lm']['pass']=(!empty($_POST['pass_lm']))?changety(html($_POST['pass_lm'])):false;
	//获取信息配置
	$conf['co']['mlang']=(!empty($_POST['mlang']))?changety(html($_POST['mlang'])):false;
	$conf['co']['seo']=(!empty($_POST['seo']))?changety(html($_POST['seo'])):false;
	$conf['co']['add_xx']=(!empty($_POST['add_xx']))?changety(html($_POST['add_xx'])):true;
	$conf['co']['apname']=(!empty($_POST['apname']))?changety(html($_POST['apname'])):false;
	$conf['co']['keyword']=(!empty($_POST['keyword']))?changety(html($_POST['keyword'])):false;
	$conf['co']['link_url']=(!empty($_POST['link_url']))?changety(html($_POST['link_url'])):false;
	$conf['co']['f_body']=(!empty($_POST['f_body']))?changety(html($_POST['f_body'])):false;
	$conf['co']['z_body']=(!empty($_POST['z_body']))?changety(html($_POST['z_body'])):true;
	$conf['co']['img_sl']=(!empty($_POST['img_sl']))?changety(html($_POST['img_sl'])):false;
	$conf['co']['pic_sl']=(!empty($_POST['pic_sl']))?changety(html($_POST['pic_sl'])):false;
	$conf['co']['fil_sl']=(!empty($_POST['fil_sl']))?changety(html($_POST['fil_sl'])):false;
	$conf['co']['vid_sl']=(!empty($_POST['vid_sl']))?changety(html($_POST['vid_sl'])):false;
	$conf['co']['image']=(!empty($_POST['image']))?changety(html($_POST['image'])):false;
	$conf['co']['info']=(!empty($_POST['info']))?changety(html($_POST['info'])):false;
	$conf['co']['file']=(!empty($_POST['file']))?changety(html($_POST['file'])):false;
	$conf['co']['video']=(!empty($_POST['video']))?changety(html($_POST['video'])):false;
	$conf['co']['zu']=(!empty($_POST['zu']))?changety(html($_POST['zu'])):false;
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

//保存分类图片上传
if (read_config('conf_ul')){
	$conf['up']['path']=(!empty($_POST['ul_path']))?html($_POST['ul_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['ul_maxsize']))?html($_POST['ul_maxsize']):'200000';
	$conf['up']['text']=(!empty($_POST['ul_text']))?html($_POST['ul_text']):'';
	$conf['up']['sm']=(!empty($_POST['ul_sm']))?changety(html($_POST['ul_sm'])):false;
	if (!empty($_POST['ul_s_typ'])){
		foreach($_POST['ul_s_typ'] as $k=>$v){
			$ul_s_nam=(!empty($_POST['ul_s_nam'][$k]))?html($_POST['ul_s_nam'][$k]):'';
			$ul_s_typ=(!empty($_POST['ul_s_typ'][$k]))?changety(html($_POST['ul_s_typ'][$k])):false;
			$ul_s_wid=(!empty($_POST['ul_s_wid'][$k]))?html($_POST['ul_s_wid'][$k]):0;
			$ul_s_hei=(!empty($_POST['ul_s_hei'][$k]))?html($_POST['ul_s_hei'][$k]):0;
			if ($ul_s_nam!=''||$ul_s_wid!=''||$ul_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$ul_s_nam,'s_typ'=>$ul_s_typ,'s_wid'=>$ul_s_wid,'s_hei'=>$ul_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	//保存配置文件
	write_config('conf_ul',$conf,$ympath);
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

//保存图片2上传
if (read_config('conf_up','../')){
	$conf['up']['path']=(!empty($_POST['up_path']))?html($_POST['up_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['up_maxsize']))?html($_POST['up_maxsize']):'200000';
	$conf['up']['text']=(!empty($_POST['up_text']))?html($_POST['up_text']):'';
	$conf['up']['sm']=(!empty($_POST['up_sm']))?changety(html($_POST['up_sm'])):false;
	if (!empty($_POST['up_s_typ'])){
		foreach($_POST['up_s_typ'] as $k=>$v){
			$up_s_nam=(!empty($_POST['up_s_nam'][$k]))?html($_POST['up_s_nam'][$k]):'';
			$up_s_typ=(!empty($_POST['up_s_typ'][$k]))?changety(html($_POST['up_s_typ'][$k])):false;
			$up_s_wid=(!empty($_POST['up_s_wid'][$k]))?html($_POST['up_s_wid'][$k]):0;
			$up_s_hei=(!empty($_POST['up_s_hei'][$k]))?html($_POST['up_s_hei'][$k]):0;
			if ($up_s_nam!=''||$up_s_wid!=''||$up_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$up_s_nam,'s_typ'=>$up_s_typ,'s_wid'=>$up_s_wid,'s_hei'=>$up_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	//保存配置文件
	write_config('conf_up',$conf,$ympath,'../');
	unset($conf);
}

//保存文件上传
if (read_config('conf_uf','../')){
	$conf['up']['path']=(!empty($_POST['uf_path']))?html($_POST['uf_path']):'upfile';
	$conf['up']['allowext']='gz|rar|zip|tar|tgz|gzip|gif|jpg|png|bmp|tif|tiff|pdf|csv|txt|xml|doc|docx|ppt|pptx|xls|xlsx';
	$conf['up']['maxsize']=(!empty($_POST['uf_maxsize']))?html($_POST['uf_maxsize']):'20000000';
	$conf['up']['text']=(!empty($_POST['uf_text']))?html($_POST['uf_text']):'';
	$conf['up']['kname']=(!empty($_POST['uf_kname']))?changety(html($_POST['uf_kname'])):true;
	$conf['up']['sm']=false;
	$conf['sm']=array();
	//保存配置文件
	write_config('conf_uf',$conf,$ympath,'../');
	unset($conf);
}

//保存视频上传
if (read_config('conf_uv','../')){
	$conf['up']['path']=(!empty($_POST['uv_path']))?html($_POST['uv_path']):'upvideo';
	$conf['up']['allowext']='aiff|asf|avi|fla|flv|mid|mov|mp3|mp4|mpc|mpeg|mpg|qt|ram|rm|rmi|rmvb|swf|wav|wma|wmv';
	$conf['up']['maxsize']=(!empty($_POST['uv_maxsize']))?html($_POST['uv_maxsize']):'20000000';
	$conf['up']['text']=(!empty($_POST['uv_text']))?html($_POST['uv_text']):'';
	$conf['up']['sm']=false;
	$conf['sm']=array();
	//保存配置文件
	write_config('conf_uv',$conf,$ympath,'../');
	unset($conf);
}

//保存多图上传
if (read_config('conf_pm','../')){
	$conf['pl']['table']=(!empty($_POST['pm_table']))?html($_POST['pm_table']):'pl_img';
	$conf['pl']['sy_id']=(!empty($_POST['id']))?(int)html($_POST['id']):$sy_id;
	$conf['pl']['sesname']=(!empty($_POST['pm_sesname']))?html($_POST['pm_sesname']):'demo_img_id';
	$conf['pl']['mlang']=(!empty($_POST['pm_mlang']))?changety(html($_POST['pm_mlang'])):false;
	$conf['pl']['title']=(!empty($_POST['pm_title']))?changety(html($_POST['pm_title'])):false;
	$conf['pl']['px']=(!empty($_POST['pm_px']))?changety(html($_POST['pm_px'])):true;
	$conf['up']['path']=(!empty($_POST['pm_path']))?html($_POST['pm_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['pm_maxsize']))?html($_POST['pm_maxsize']):'200000';
	$conf['up']['allownum']=(!empty($_POST['pm_allownum']))?html($_POST['pm_allownum']):'0';
	$conf['up']['text']=(!empty($_POST['pm_text']))?html($_POST['pm_text']):'';
	$conf['up']['sm']=(!empty($_POST['pm_sm']))?changety(html($_POST['pm_sm'])):false;
	if (!empty($_POST['pm_s_typ'])){
		foreach($_POST['pm_s_typ'] as $k=>$v){
			$pm_s_nam=(!empty($_POST['pm_s_nam'][$k]))?html($_POST['pm_s_nam'][$k]):'';
			$pm_s_typ=(!empty($_POST['pm_s_typ'][$k]))?changety(html($_POST['pm_s_typ'][$k])):false;
			$pm_s_wid=(!empty($_POST['pm_s_wid'][$k]))?html($_POST['pm_s_wid'][$k]):0;
			$pm_s_hei=(!empty($_POST['pm_s_hei'][$k]))?html($_POST['pm_s_hei'][$k]):0;
			if ($pm_s_nam!=''||$pm_s_wid!=''||$pm_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$pm_s_nam,'s_typ'=>$pm_s_typ,'s_wid'=>$pm_s_wid,'s_hei'=>$pm_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	//保存配置文件
	write_config('conf_pm',$conf,$ympath,'../');
	unset($conf);
}

//保存相关信息
if (read_config('conf_pi','../')){
	$conf['pl']['table']=(!empty($_POST['pi_table']))?html($_POST['pi_table']):'pl_info';
	$conf['pl']['sy_id']=(!empty($_POST['id']))?(int)html($_POST['id']):$sy_id;
	$conf['pl']['sesname']=(!empty($_POST['pi_sesname']))?html($_POST['pi_sesname']):'demo_info_id';
	$conf['pl']['mlang']=(!empty($_POST['pi_mlang']))?changety(html($_POST['pi_mlang'])):false;
	$conf['pl']['seo']=(!empty($_POST['pi_seo']))?changety(html($_POST['pi_seo'])):false;
	$conf['pl']['link_url']=(!empty($_POST['pi_link_url']))?changety(html($_POST['pi_link_url'])):true;
	$conf['pl']['img_sl']=(!empty($_POST['pi_img_sl']))?changety(html($_POST['pi_img_sl'])):true;
	$conf['up']['path']=(!empty($_POST['pi_path']))?html($_POST['pi_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['pi_maxsize']))?html($_POST['pi_maxsize']):'200000';
	$conf['up']['text']=(!empty($_POST['pi_text']))?html($_POST['pi_text']):'';
	$conf['up']['sm']=(!empty($_POST['pi_sm']))?changety(html($_POST['pi_sm'])):false;
	if (!empty($_POST['pi_s_typ'])){
		foreach($_POST['pi_s_typ'] as $k=>$v){
			$pi_s_nam=(!empty($_POST['pi_s_nam'][$k]))?html($_POST['pi_s_nam'][$k]):'';
			$pi_s_typ=(!empty($_POST['pi_s_typ'][$k]))?changety(html($_POST['pi_s_typ'][$k])):false;
			$pi_s_wid=(!empty($_POST['pi_s_wid'][$k]))?html($_POST['pi_s_wid'][$k]):0;
			$pi_s_hei=(!empty($_POST['pi_s_hei'][$k]))?html($_POST['pi_s_hei'][$k]):0;
			if ($pi_s_nam!=''||$pi_s_wid!=''||$pi_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$pi_s_nam,'s_typ'=>$pi_s_typ,'s_wid'=>$pi_s_wid,'s_hei'=>$pi_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	//保存配置文件
	write_config('conf_pi',$conf,$ympath,'../');
	unset($conf);
}

//保存相关文件
if (read_config('conf_pf','../')){
	$conf['pl']['table']=(!empty($_POST['pf_table']))?html($_POST['pf_table']):'pl_file';
	$conf['pl']['sy_id']=(!empty($_POST['id']))?(int)html($_POST['id']):$sy_id;
	$conf['pl']['sesname']=(!empty($_POST['pf_sesname']))?html($_POST['pf_sesname']):'demo_file_id';
	$conf['pl']['mlang']=(!empty($_POST['pf_mlang']))?changety(html($_POST['pf_mlang'])):false;
	$conf['pl']['seo']=(!empty($_POST['pf_seo']))?changety(html($_POST['pf_seo'])):false;
	$conf['pl']['link_url']=(!empty($_POST['pf_link_url']))?changety(html($_POST['pf_link_url'])):true;
	$conf['pl']['z_body']=(!empty($_POST['pf_z_body']))?changety(html($_POST['pf_z_body'])):true;
	$conf['pl']['img_sl']=(!empty($_POST['pf_img_sl']))?changety(html($_POST['pf_img_sl'])):true;
	$conf['up']['path']=(!empty($_POST['pf_path']))?html($_POST['pf_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['pf_maxsize']))?html($_POST['pf_maxsize']):'200000';
	$conf['up']['text']=(!empty($_POST['pf_text']))?html($_POST['pf_text']):'';
	$conf['up']['sm']=(!empty($_POST['pf_sm']))?changety(html($_POST['pf_sm'])):false;
	if (!empty($_POST['pf_s_typ'])){
		foreach($_POST['pf_s_typ'] as $k=>$v){
			$pf_s_nam=(!empty($_POST['pf_s_nam'][$k]))?html($_POST['pf_s_nam'][$k]):'';
			$pf_s_typ=(!empty($_POST['pf_s_typ'][$k]))?changety(html($_POST['pf_s_typ'][$k])):false;
			$pf_s_wid=(!empty($_POST['pf_s_wid'][$k]))?html($_POST['pf_s_wid'][$k]):0;
			$pf_s_hei=(!empty($_POST['pf_s_hei'][$k]))?html($_POST['pf_s_hei'][$k]):0;
			if ($pf_s_nam!=''||$pf_s_wid!=''||$pf_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$pf_s_nam,'s_typ'=>$pf_s_typ,'s_wid'=>$pf_s_wid,'s_hei'=>$pf_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	$conf['file']['up']['path']=(!empty($_POST['file_pf_path']))?html($_POST['file_pf_path']):'upfile';
	$conf['file']['up']['allowext']='gz|rar|zip|tar|tgz|gzip|gif|jpg|png|bmp|tif|tiff|pdf|csv|txt|xml|doc|docx|ppt|pptx|xls|xlsx';
	$conf['file']['up']['maxsize']=(!empty($_POST['file_pf_maxsize']))?html($_POST['file_pf_maxsize']):'20000000';
	$conf['file']['up']['text']=(!empty($_POST['file_pf_text']))?html($_POST['file_pf_text']):'';
	$conf['file']['up']['kname']=(!empty($_POST['file_pf_kname']))?changety(html($_POST['file_pf_kname'])):false;
	$conf['file']['up']['sm']=false;
	$conf['file']['sm']=array();
	//保存配置文件
	write_config('conf_pf',$conf,$ympath,'../');
	unset($conf);
}

//保存相关视频
if (read_config('conf_pv','../')){
	$conf['pl']['table']=(!empty($_POST['pv_table']))?html($_POST['pv_table']):'pl_video';
	$conf['pl']['sy_id']=(!empty($_POST['id']))?(int)html($_POST['id']):$sy_id;
	$conf['pl']['sesname']=(!empty($_POST['pv_sesname']))?html($_POST['pv_sesname']):'demo_video_id';
	$conf['pl']['mlang']=(!empty($_POST['pv_mlang']))?changety(html($_POST['pv_mlang'])):false;
	$conf['pl']['seo']=(!empty($_POST['pv_seo']))?changety(html($_POST['pv_seo'])):false;
	$conf['pl']['link_url']=(!empty($_POST['pv_link_url']))?changety(html($_POST['pv_link_url'])):true;
	$conf['pl']['z_body']=(!empty($_POST['pv_z_body']))?changety(html($_POST['pv_z_body'])):true;
	$conf['pl']['img_sl']=(!empty($_POST['pv_img_sl']))?changety(html($_POST['pv_img_sl'])):true;
	$conf['up']['path']=(!empty($_POST['pv_path']))?html($_POST['pv_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['pv_maxsize']))?html($_POST['pv_maxsize']):'200000';
	$conf['up']['text']=(!empty($_POST['pv_text']))?html($_POST['pv_text']):'';
	$conf['up']['sm']=(!empty($_POST['pv_sm']))?changety(html($_POST['pv_sm'])):false;
	if (!empty($_POST['pv_s_typ'])){
		foreach($_POST['pv_s_typ'] as $k=>$v){
			$pv_s_nam=(!empty($_POST['pv_s_nam'][$k]))?html($_POST['pv_s_nam'][$k]):'';
			$pv_s_typ=(!empty($_POST['pv_s_typ'][$k]))?changety(html($_POST['pv_s_typ'][$k])):false;
			$pv_s_wid=(!empty($_POST['pv_s_wid'][$k]))?html($_POST['pv_s_wid'][$k]):0;
			$pv_s_hei=(!empty($_POST['pv_s_hei'][$k]))?html($_POST['pv_s_hei'][$k]):0;
			if ($pv_s_nam!=''||$pv_s_wid!=''||$pv_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$pv_s_nam,'s_typ'=>$pv_s_typ,'s_wid'=>$pv_s_wid,'s_hei'=>$pv_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	$conf['video']['up']['path']=(!empty($_POST['video_pv_path']))?html($_POST['video_pv_path']):'upvideo';
	$conf['video']['up']['allowext']='aiff|asf|avi|fla|flv|mid|mov|mp3|mp4|mpc|mpeg|mpg|qt|ram|rm|rmi|rmvb|swf|wav|wma|wmv';
	$conf['video']['up']['maxsize']=(!empty($_POST['video_pv_maxsize']))?html($_POST['video_pv_maxsize']):'20000000';
	$conf['video']['up']['text']=(!empty($_POST['video_pv_text']))?html($_POST['video_pv_text']):'';
	$conf['video']['up']['sm']=false;
	$conf['video']['sm']=array();
	//保存配置文件
	write_config('conf_pv',$conf,$ympath,'../');
	unset($conf);
}

//保存组图上传
if (read_config('conf_pz','../')){
	$conf['pl']['table']=(!empty($_POST['pz_table']))?html($_POST['pz_table']):'pl_zu';
	$conf['pl']['table_img']=(!empty($_POST['pz_table_img']))?html($_POST['pz_table_img']):'pl_zu_img';
	$conf['pl']['sy_id']=(!empty($_POST['id']))?(int)html($_POST['id']):$sy_id;
	$conf['pl']['sesname']=(!empty($_POST['pz_sesname']))?html($_POST['pz_sesname']):'demo_zu_id';
	$conf['pl']['mlang']=(!empty($_POST['pz_mlang']))?changety(html($_POST['pz_mlang'])):false;
	$conf['pl']['title']=(!empty($_POST['pz_title']))?changety(html($_POST['pz_title'])):false;
	$conf['pl']['px']=(!empty($_POST['pz_px']))?changety(html($_POST['pz_px'])):true;
	$conf['image']['up']['path']=(!empty($_POST['image_pz_path']))?html($_POST['image_pz_path']):'upimg';
	$conf['image']['up']['allowext']='jpg|gif|png|bmp';
	$conf['image']['up']['maxsize']=(!empty($_POST['image_pz_maxsize']))?html($_POST['image_pz_maxsize']):'200000';
	$conf['image']['up']['text']=(!empty($_POST['image_pz_text']))?html($_POST['image_pz_text']):'';
	$conf['image']['up']['sm']=(!empty($_POST['image_pz_sm']))?changety(html($_POST['image_pz_sm'])):false;
	if (!empty($_POST['image_pz_s_typ'])){
		foreach($_POST['image_pz_s_typ'] as $k=>$v){
			$image_pz_s_nam=(!empty($_POST['image_pz_s_nam'][$k]))?html($_POST['image_pz_s_nam'][$k]):'';
			$image_pz_s_typ=(!empty($_POST['image_pz_s_typ'][$k]))?changety(html($_POST['image_pz_s_typ'][$k])):false;
			$image_pz_s_wid=(!empty($_POST['image_pz_s_wid'][$k]))?html($_POST['image_pz_s_wid'][$k]):0;
			$image_pz_s_hei=(!empty($_POST['image_pz_s_hei'][$k]))?html($_POST['image_pz_s_hei'][$k]):0;
			if ($image_pz_s_nam!=''||$image_pz_s_wid!=''||$image_pz_s_hei!=''){
				$conf['image']['sm'][]=array('s_nam'=>$image_pz_s_nam,'s_typ'=>$image_pz_s_typ,'s_wid'=>$image_pz_s_wid,'s_hei'=>$image_pz_s_hei);
			}
		}
	}else{
		$conf['image']['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['image']['up']['sm']==true&&empty($conf['image']['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	$conf['up']['path']=(!empty($_POST['pz_path']))?html($_POST['pz_path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['pz_maxsize']))?html($_POST['pz_maxsize']):'200000';
	$conf['up']['allownum']=(!empty($_POST['pz_allownum']))?html($_POST['pz_allownum']):'0';
	$conf['up']['text']=(!empty($_POST['pz_text']))?html($_POST['pz_text']):'';
	$conf['up']['sm']=(!empty($_POST['pz_sm']))?changety(html($_POST['pz_sm'])):false;
	if (!empty($_POST['pz_s_typ'])){
		foreach($_POST['pz_s_typ'] as $k=>$v){
			$pz_s_nam=(!empty($_POST['pz_s_nam'][$k]))?html($_POST['pz_s_nam'][$k]):'';
			$pz_s_typ=(!empty($_POST['pz_s_typ'][$k]))?changety(html($_POST['pz_s_typ'][$k])):false;
			$pz_s_wid=(!empty($_POST['pm_s_wid'][$k]))?html($_POST['pm_s_wid'][$k]):0;
			$pz_s_hei=(!empty($_POST['pm_s_hei'][$k]))?html($_POST['pm_s_hei'][$k]):0;
			if ($pz_s_nam!=''||$pz_s_wid!=''||$pz_s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$pz_s_nam,'s_typ'=>$pz_s_typ,'s_wid'=>$pz_s_wid,'s_hei'=>$pz_s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	//保存配置文件
	write_config('conf_pz',$conf,$ympath,'../');
	unset($conf);
}

//添加日志
if($conf=read_config('config')){
	master_log('修改'.$conf['sy']['name'].'系统：配置文件');
}

msg('保存成功','location="setconfig.php"');
?>
