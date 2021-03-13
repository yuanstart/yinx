<?php
require('../../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配
	$conf['sy']['mlang']=(!empty($_POST['mlang']))?changety(html($_POST['mlang'])):true;
	$conf['sy']['need_lm']=(!empty($_POST['need_lm']))?changety(html($_POST['need_lm'])):true;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'pro';
	$conf['sy']['table_lm']=(!empty($_POST['table_lm']))?html($_POST['table_lm']):'demo_lm';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'demo_co';

	//保存图片上传
	$conf['up']['path']=(!empty($_POST['path']))?html($_POST['path']):'upimg';
	$conf['up']['allowext']='jpg|gif|png|bmp';
	$conf['up']['maxsize']=(!empty($_POST['maxsize']))?html($_POST['maxsize']):'200000';
	$conf['up']['text']=(!empty($_POST['text']))?html($_POST['text']):'';
	$conf['up']['sm']=(!empty($_POST['sm']))?changety(html($_POST['sm'])):false;
	if (!empty($_POST['s_typ'])){
		foreach($_POST['s_typ'] as $k=>$v){
			$s_nam=(!empty($_POST['s_nam'][$k]))?html($_POST['s_nam'][$k]):'';
			$s_typ=(!empty($_POST['s_typ'][$k]))?changety(html($_POST['s_typ'][$k])):false;
			$s_wid=(!empty($_POST['s_wid'][$k]))?html($_POST['s_wid'][$k]):0;
			$s_hei=(!empty($_POST['s_hei'][$k]))?html($_POST['s_hei'][$k]):0;
			if ($s_nam!=''||$s_wid!=''||$s_hei!=''){
				$conf['sm'][]=array('s_nam'=>$s_nam,'s_typ'=>$s_typ,'s_wid'=>$s_wid,'s_hei'=>$s_hei);
			}
		}
	}else{
		$conf['sm'][]=array('s_nam'=>'d','s_typ'=>false,'s_wid'=>0,'s_hei'=>0);
	}
	if($conf['up']['sm']==true&&empty($conf['sm'])){
		msg('图片上传选择了生成缩略图，请填写缩略图的参数','');
	}
	//保存系统的配置文件
	write_config('config',$conf,$ympath);
	unset($conf);
}

//添加日志
master_log('修改图片批量上传系统：配置文件');

msg('保存成功','location="setconfig.php"');
?>
