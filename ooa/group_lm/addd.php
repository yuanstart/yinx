<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_lm_add');//检查权限

$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$apname_lm=isset($_POST['apname_lm'])?html($_POST['apname_lm']):'';
$url_lm=isset($_POST['url_lm'])?html($_POST['url_lm']):'';
$img_sl_lm=isset($_POST['img_sl_lm'])?html($_POST['img_sl_lm']):'';
$pic_sl_lm=isset($_POST['pic_sl_lm'])?html($_POST['pic_sl_lm']):'';
$add_xx=isset($_POST['add_xx'])?html($_POST['add_xx']):'';
$add_xia=isset($_POST['add_xia'])?html($_POST['add_xia']):'';
$con_att=isset($_POST['con_att'])?html($_POST['con_att']):'';
$info_apname=isset($_POST['info_apname'])?html($_POST['info_apname']):'';
$info_keyword=isset($_POST['info_keyword'])?html($_POST['info_keyword']):'';
$info_link=isset($_POST['info_link'])?html($_POST['info_link']):'';
$info_from=isset($_POST['info_from'])?html($_POST['info_from']):'';
$info_f_body=isset($_POST['info_f_body'])?html($_POST['info_f_body']):'';
$info_z_body=isset($_POST['info_z_body'])?html($_POST['info_z_body']):'';
$info_img_sl=isset($_POST['info_img_sl'])?html($_POST['info_img_sl']):'';
$info_img_txt=isset($_POST['info_img_txt'])?html($_POST['info_img_txt']):'';
$info_pic_sl=isset($_POST['info_pic_sl'])?html($_POST['info_pic_sl']):'';
$info_pic_txt=isset($_POST['info_pic_txt'])?html($_POST['info_pic_txt']):'';
$info_fil_sl=isset($_POST['info_fil_sl'])?html($_POST['info_fil_sl']):'';
$info_vid_sl=isset($_POST['info_vid_sl'])?html($_POST['info_vid_sl']):'';
$info_duotu=isset($_POST['info_duotu'])?html($_POST['info_duotu']):'';
$info_info=isset($_POST['info_info'])?html($_POST['info_info']):'';
$info_file=isset($_POST['info_file'])?html($_POST['info_file']):'';
$info_video=isset($_POST['info_video'])?html($_POST['info_video']):'';
$info_zu=isset($_POST['info_zu'])?html($_POST['info_zu']):'';
$info_wtime=isset($_POST['info_wtime'])?html($_POST['info_wtime']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($fid==''||!checknum($fid)||$px==''||!checknum($px)){
	msg('参数错误');
}

$conm['up']['sm']=(!empty($_POST['um_sm']))?changety(html($_POST['um_sm'])):false;
foreach($_POST['um_s_typ'] as $k=>$v){
	$um_s_nam=(!empty($_POST['um_s_nam'][$k]))?html($_POST['um_s_nam'][$k]):'';
	$um_s_typ=(!empty($_POST['um_s_typ'][$k]))?changety(html($_POST['um_s_typ'][$k])):false;
	$um_s_wid=(!empty($_POST['um_s_wid'][$k]))?html($_POST['um_s_wid'][$k]):0;
	$um_s_hei=(!empty($_POST['um_s_hei'][$k]))?html($_POST['um_s_hei'][$k]):0;
	if ($um_s_nam!=''||!empty($um_s_wid)||$um_s_hei!=''){
		$conm['sm'][]=array('s_nam'=>$um_s_nam,'s_typ'=>$um_s_typ,'s_wid'=>$um_s_wid,'s_hei'=>$um_s_hei);
	}
}
if (empty($conm['sm'])){
	$conm['sm'][]=array('s_nam'=>'','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
}
if($conm['up']['sm']==true&&empty($conm['sm'])){
	msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
}
$info_img_sm=$conm;

$conp['up']['sm']=(!empty($_POST['up_sm']))?changety(html($_POST['up_sm'])):false;
foreach($_POST['up_s_typ'] as $k=>$v){
	$up_s_nam=(!empty($_POST['up_s_nam'][$k]))?html($_POST['up_s_nam'][$k]):'';
	$up_s_typ=(!empty($_POST['up_s_typ'][$k]))?changety(html($_POST['up_s_typ'][$k])):false;
	$up_s_wid=(!empty($_POST['up_s_wid'][$k]))?html($_POST['up_s_wid'][$k]):0;
	$up_s_hei=(!empty($_POST['up_s_hei'][$k]))?html($_POST['up_s_hei'][$k]):0;
	if ($up_s_nam!=''||$up_s_wid!=''||$up_s_hei!=''){
		$conp['sm'][]=array('s_nam'=>$up_s_nam,'s_typ'=>$up_s_typ,'s_wid'=>$up_s_wid,'s_hei'=>$up_s_hei);
	}
}
if (empty($conp['sm'])){
	$conp['sm'][]=array('s_nam'=>'','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
}
if($conp['up']['sm']==true&&empty($conp['sm'])){
	msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
}
$info_pic_sm=$conp;

//判断必填项，同时转换为字段名、转换为字段值
$title_lm='';
$title_lm_key='';$title_lm_val='';$f_body_lm_key='';$f_body_lm_val='';$z_body_lm_key='';$z_body_lm_val='';
$ym_tit_key='';$ym_tit_val='';$ym_key_key='';$ym_key_val='';$ym_des_key='';$ym_des_val='';
foreach($cong['mlang'] as $k=>$v){
	//判断必填项
	if($v['must']==true&&empty($_POST['title_lm'.$v['lang']])){
		msg('参数错误');
	}
	//获取第1个标题用于添加日志
	if ($k==0){
		$title_lm=!empty($_POST['title_lm'.$v['lang']])?html($_POST['title_lm'.$v['lang']]):'';
	}
	//转换为字段名、转换为字段值
	$title_lm_key .=',`title_lm'.$v['lang'].'`';
	$title_lm_val .=',"'.(!empty($_POST['title_lm'.$v['lang']])?html($_POST['title_lm'.$v['lang']]):'').'"';
	if ($conf['lm']['f_body_lm']==true){
		$f_body_lm_key.=',`f_body_lm'.$v['lang'].'`';
		$f_body_lm_val.=',"'.(!empty($_POST['f_body_lm'.$v['lang']])?html($_POST['f_body_lm'.$v['lang']]):'').'"';
	}
	if ($conf['lm']['z_body_lm']==true){
		$z_body_lm_key.=',`z_body_lm'.$v['lang'].'`';
		$z_body_lm_val.=',"'.(!empty($_POST['z_body_lm'.$v['lang']])?$_POST['z_body_lm'.$v['lang']]:'').'"';
	}
	$ym_tit_key   .=',`ym_tit'.$v['lang'].'`';
	$ym_tit_val   .=',"'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
	$ym_key_key   .=',`ym_key'.$v['lang'].'`';
	$ym_key_val   .=',"'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
	$ym_des_key   .=',`ym_des'.$v['lang'].'`';
	$ym_des_val   .=',"'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
	if ($conf['co']['mlang']!=true){
		break;
	}
}

//判断系统支持几级分类
if ($fid!=0){
	$rsa=$db->getrs('select * from '.table($conf['sy']['table_lm']).' where id_lm='.$fid.'');
	if(!$rsa){
		msg('上级分类不存在或已删除');
	}else{
		if ($conf['sy']['level_lm']>0&&$rsa['level_lm']>($conf['sy']['level_lm']-1)){
			msg('系统最多可以添加'.$conf['sy']['level_lm'].'级分类');
		}
	}
}

//添加分类信息
$sql='insert into '.table($conf['sy']['table_lm']).' (`fid`'.$title_lm_key.',`apname_lm`,`url_lm`'.$f_body_lm_key.''.$z_body_lm_key.',`img_sl_lm`,`pic_sl_lm`,`add_xx`,`add_xia`,`con_att`,`info_apname`,`info_keyword`,`info_link`,`info_from`,`info_f_body`,`info_z_body`,`info_img_sl`,`info_img_txt`,`info_img_sm`,`info_pic_sl`,`info_pic_txt`,`info_pic_sm`,`info_fil_sl`,`info_vid_sl`,`info_duotu`,`info_info`,`info_file`,`info_video`,`info_zu`,`info_wtime`'.$ym_tit_key.''.$ym_key_key.''.$ym_des_key.',`tuijian`,`hot`,`pass`,`px`,`wtime`,`ip`) values('.$fid.''.$title_lm_val.',"'.$apname_lm.'","'.$url_lm.'"'.$f_body_lm_val.''.$z_body_lm_val.',"'.$img_sl_lm.'","'.$pic_sl_lm.'","'.$add_xx.'","'.$add_xia.'","'.$con_att.'","'.$info_apname.'","'.$info_keyword.'","'.$info_link.'","'.$info_from.'","'.$info_f_body.'","'.$info_z_body.'","'.$info_img_sl.'","'.$info_img_txt.'","'.addslash(serialize($info_img_sm)).'","'.$info_pic_sl.'","'.$info_pic_txt.'","'.addslash(serialize($info_pic_sm)).'","'.$info_fil_sl.'","'.$info_vid_sl.'","'.$info_duotu.'","'.$info_info.'","'.$info_file.'","'.$info_video.'","'.$info_zu.'","'.$info_wtime.'"'.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.',0,0,1,'.$px.','.time().',"'.getip().'")';
$db->execute($sql);

//更新新增的分类的分类列表和分类级别
//获取新增的分类id
$id=$db->insert_id();
//如果没有上级分类，分类列表就是新增的分类id，分类级别就是1级
if ($fid==0){
	$list_lm=",".$id.",";
	$level_lm=1;
//如果有上级分类，分类列表就在上级分类列表的基础上加上新增的分类id，分类级别就在上级分类级别的基础上加1级
}else{
	$rsa=$db->getrs('select * from '.table($conf['sy']['table_lm']).' where id_lm='.$fid.'');
	if(!$rsa){
		msg('上级分类不存在或已删除');
	}else{
		$list_lm=$rsa['list_lm'].$id.',';
		$level_lm=$rsa['level_lm']+1;
	}
}
//把获取的分类列表和分类级别更新到新增的分类记录里
$db->execute('update '.table($conf['sy']['table_lm']).' set `list_lm`="'.$list_lm.'",level_lm='.$level_lm.' where id_lm='.$id.'');

//添加日志
master_log('添加'.$conf['sy']['name'].'分类：'.$title_lm.'');

msg('添加成功','location="default.php"');
?>
