<?php
require('../../include/common.inc.php');
checklogin();

$act=isset($_GET['act'])?html($_GET['act']):'';

//添加字段
if ($act=='add'){
	$lang_y=isset($_POST['lang_y'])?html($_POST['lang_y']):'';
	$lang_x=isset($_POST['lang_x'])?html($_POST['lang_x']):'';
	//ad_co
	$sql='ALTER TABLE  `ad_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `link_url'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `link_url'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `img_sl'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `img_sl'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//ad_lm
	$sql='ALTER TABLE  `ad_lm` ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`';
	$db->execute($sql);
	//ban_co
	$sql='ALTER TABLE  `ban_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `link_url'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `link_url'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `img_sl'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `img_sl'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//ban_lm
	$sql='ALTER TABLE  `ban_lm` ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`';
	$db->execute($sql);
	//cases_co
	$sql='ALTER TABLE  `cases_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//cases_lm
	$sql='ALTER TABLE  `cases_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//demo_co
	$sql='ALTER TABLE  `demo_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//demo_lm
	$sql='ALTER TABLE  `demo_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//files_co
	$sql='ALTER TABLE  `files_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//files_lm
	$sql='ALTER TABLE  `files_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//info_co
	$sql='ALTER TABLE  `info_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `info_from'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `info_from'.$lang_y.'`,
		ADD  `info_author'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `info_author'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//info_lm
	$sql='ALTER TABLE  `info_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//job_co
	$sql='ALTER TABLE  `job_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `address'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `address'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//job_lm
	$sql='ALTER TABLE  `job_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//key_co
	$sql='ALTER TABLE  `key_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `link_url'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `link_url'.$lang_y.'`';
	$db->execute($sql);
	//kf_co
	$sql='ALTER TABLE  `kf_co` ADD  `rename'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `rename'.$lang_y.'`';
	$db->execute($sql);
	//kf_lm
	$sql='ALTER TABLE  `kf_lm` ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`';
	$db->execute($sql);
	//link_co
	$sql='ALTER TABLE  `link_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `link_url'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `link_url'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `img_sl'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `img_sl'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//link_lm
	$sql='ALTER TABLE  `link_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//news_co
	$sql='ALTER TABLE  `news_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//news_lm
	$sql='ALTER TABLE  `news_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//pl_file
	$sql='ALTER TABLE  `pl_file`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//pl_image
	$sql='ALTER TABLE  `pl_image` ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`';
	$db->execute($sql);
	//pl_info
	$sql='ALTER TABLE  `pl_info`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//pl_video
	$sql='ALTER TABLE  `pl_video`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//pl_zu
	$sql='ALTER TABLE  `pl_zu` ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`';
	$db->execute($sql);
	//pro_co
	$sql='ALTER TABLE  `pro_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `pro_can1'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `pro_can1'.$lang_y.'`,
		ADD  `pro_can2'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `pro_can2'.$lang_y.'`,
		ADD  `pro_can3'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `pro_can3'.$lang_y.'`,
		ADD  `pro_can4'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `pro_can4'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `t_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `t_body'.$lang_y.'`,
		ADD  `g_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `g_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//pro_lm
	$sql='ALTER TABLE  `pro_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//setup_gl
	$sql='ALTER TABLE  `setup_gl`
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`,
		ADD  `ym_bot'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_bot'.$lang_y.'`,
		ADD  `ym_hcode'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_hcode'.$lang_y.'`,
		ADD  `ym_bcode'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_bcode'.$lang_y.'`';
	$db->execute($sql);
	//setup_sy
	$sql='ALTER TABLE  `setup_sy`
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//tol_co
	$sql='ALTER TABLE  `tol_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//tol_lm
	$sql='ALTER TABLE  `tol_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//video_co
	$sql='ALTER TABLE  `video_co`
		ADD  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title'.$lang_y.'`,
		ADD  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `keyword'.$lang_y.'`,
		ADD  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body'.$lang_y.'`,
		ADD  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	//video_lm
	$sql='ALTER TABLE  `video_lm`
		ADD  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `title_lm'.$lang_y.'`,
		ADD  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `f_body_lm'.$lang_y.'`,
		ADD  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `z_body_lm'.$lang_y.'`,
		ADD  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_tit'.$lang_y.'`,
		ADD  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_key'.$lang_y.'`,
		ADD  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER  `ym_des'.$lang_y.'`';
	$db->execute($sql);
	msg('添加成功','location="d_default.php"');

//修改字段	
}elseif($act=='edit'){
	$lang_y=isset($_POST['lang_y'])?html($_POST['lang_y']):'';
	$lang_x=isset($_POST['lang_x'])?html($_POST['lang_x']):'';
	//ad_co
	$sql='ALTER TABLE  `ad_co` 
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `link_url'.$lang_y.'`  `link_url'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `img_sl'.$lang_y.'`  `img_sl'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//ad_lm
	$sql='ALTER TABLE  `ad_lm` CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//ban_co
	$sql='ALTER TABLE  `ban_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `link_url'.$lang_y.'`  `link_url'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `img_sl'.$lang_y.'`  `img_sl'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//ban_lm
	$sql='ALTER TABLE  `ban_lm` CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//cases_co
	$sql='ALTER TABLE  `cases_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//cases_lm
	$sql='ALTER TABLE  `cases_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//demo_co
	$sql='ALTER TABLE  `demo_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//demo_lm
	$sql='ALTER TABLE  `demo_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//files_co
	$sql='ALTER TABLE  `files_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//files_lm
	$sql='ALTER TABLE  `files_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//info_co
	$sql='ALTER TABLE  `info_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `info_from'.$lang_y.'`  `info_from'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `info_author'.$lang_y.'`  `info_author'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//info_lm
	$sql='ALTER TABLE  `info_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//job_co
	$sql='ALTER TABLE  `job_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `address'.$lang_y.'`  `address'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//job_lm
	$sql='ALTER TABLE  `job_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//key_co
	$sql='ALTER TABLE  `key_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `link_url'.$lang_y.'`  `link_url'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//kf_co
	$sql='ALTER TABLE  `kf_co` CHANGE  `rename'.$lang_y.'`  `rename'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//kf_lm
	$sql='ALTER TABLE  `kf_lm` CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//link_co
	$sql='ALTER TABLE  `link_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `link_url'.$lang_y.'`  `link_url'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `img_sl'.$lang_y.'`  `img_sl'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//link_lm
	$sql='ALTER TABLE  `link_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//news_co
	$sql='ALTER TABLE  `news_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//news_lm
	$sql='ALTER TABLE  `news_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//pl_file
	$sql='ALTER TABLE  `pl_file`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//pl_image
	$sql='ALTER TABLE  `pl_image` CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//pl_info
	$sql='ALTER TABLE  `pl_info`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//pl_video
	$sql='ALTER TABLE  `pl_video`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//pl_zu
	$sql='ALTER TABLE  `pl_zu` CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//pro_co
	$sql='ALTER TABLE  `pro_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `pro_can1'.$lang_y.'`  `pro_can1'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `pro_can2'.$lang_y.'`  `pro_can2'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `pro_can3'.$lang_y.'`  `pro_can3'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `pro_can4'.$lang_y.'`  `pro_can4'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `t_body'.$lang_y.'`  `t_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `g_body'.$lang_y.'`  `g_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//pro_lm
	$sql='ALTER TABLE  `pro_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//setup_gl
	$sql='ALTER TABLE  `setup_gl`
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_bot'.$lang_y.'`  `ym_bot'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_hcode'.$lang_y.'`  `ym_hcode'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_bcode'.$lang_y.'`  `ym_bcode'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//setup_sy
	$sql='ALTER TABLE  `setup_sy`
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//tol_co
	$sql='ALTER TABLE  `tol_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//tol_lm
	$sql='ALTER TABLE  `tol_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//video_co
	$sql='ALTER TABLE  `video_co`
		CHANGE  `title'.$lang_y.'`  `title'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `keyword'.$lang_y.'`  `keyword'.$lang_x.'` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body'.$lang_y.'`  `f_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body'.$lang_y.'`  `z_body'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);
	//video_lm
	$sql='ALTER TABLE  `video_lm`
		CHANGE  `title_lm'.$lang_y.'`  `title_lm'.$lang_x.'` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `f_body_lm'.$lang_y.'`  `f_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `z_body_lm'.$lang_y.'`  `z_body_lm'.$lang_x.'` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_tit'.$lang_y.'`  `ym_tit'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_key'.$lang_y.'`  `ym_key'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
		CHANGE  `ym_des'.$lang_y.'`  `ym_des'.$lang_x.'` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ';
	$db->execute($sql);

	
	msg('修改成功','location="d_default.php"');
	
//删除字段
}elseif($act=='del'){
	$lang=isset($_POST['lang'])?html($_POST['lang']):'';
	//ad_co
	$sql='ALTER TABLE  `ad_co` 
		DROP  `title'.$lang.'` ,
		DROP  `link_url'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `img_sl'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'`';
	$db->execute($sql);
	//ad_lm
	$sql='ALTER TABLE  `ad_lm` DROP  `title_lm'.$lang.'` ';
	$db->execute($sql);
	//ban_co
	$sql='ALTER TABLE  `ban_co`
		DROP  `title'.$lang.'` ,
		DROP  `link_url'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `img_sl'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//ban_lm
	$sql='ALTER TABLE  `ban_lm` DROP  `title_lm'.$lang.'` ';
	$db->execute($sql);
	//cases_co
	$sql='ALTER TABLE  `cases_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//cases_lm
	$sql='ALTER TABLE  `cases_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//demo_co
	$sql='ALTER TABLE  `demo_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//demo_lm
	$sql='ALTER TABLE  `demo_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//files_co
	$sql='ALTER TABLE  `files_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//files_lm
	$sql='ALTER TABLE  `files_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//info_co
	$sql='ALTER TABLE  `info_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `info_from'.$lang.'` ,
		DROP  `info_author'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//info_lm
	$sql='ALTER TABLE  `info_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//job_co
	$sql='ALTER TABLE  `job_co`
		DROP  `title'.$lang.'` ,
		DROP  `address'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//job_lm
	$sql='ALTER TABLE  `job_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//key_co
	$sql='ALTER TABLE  `key_co`
		DROP  `title'.$lang.'` ,
		DROP  `link_url'.$lang.'` ';
	$db->execute($sql);
	//kf_co
	$sql='ALTER TABLE  `kf_co` DROP  `rename'.$lang.'` ';
	$db->execute($sql);
	//kf_lm
	$sql='ALTER TABLE  `kf_lm` DROP  `title_lm'.$lang.'` ';
	$db->execute($sql);
	//link_co
	$sql='ALTER TABLE  `link_co`
		DROP  `title'.$lang.'` ,
		DROP  `link_url'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `img_sl'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//link_lm
	$sql='ALTER TABLE  `link_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//news_co
	$sql='ALTER TABLE  `news_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//news_lm
	$sql='ALTER TABLE  `news_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//pl_file
	$sql='ALTER TABLE  `pl_file`
		DROP  `title'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//pl_image
	$sql='ALTER TABLE  `pl_image` DROP  `title'.$lang.'` ';
	$db->execute($sql);
	//pl_info
	$sql='ALTER TABLE  `pl_info`
		DROP  `title'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//pl_video
	$sql='ALTER TABLE  `pl_video`
		DROP  `title'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//pl_zu
	$sql='ALTER TABLE  `pl_zu` DROP  `title'.$lang.'` ';
	$db->execute($sql);
	//pro_co
	$sql='ALTER TABLE  `pro_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `pro_can1'.$lang.'` ,
		DROP  `pro_can2'.$lang.'` ,
		DROP  `pro_can3'.$lang.'` ,
		DROP  `pro_can4'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `t_body'.$lang.'` ,
		DROP  `g_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//pro_lm
	$sql='ALTER TABLE  `pro_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//setup_gl
	$sql='ALTER TABLE  `setup_gl`
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ,
		DROP  `ym_bot'.$lang.'` ,
		DROP  `ym_hcode'.$lang.'` ,
		DROP  `ym_bcode'.$lang.'` ';
	$db->execute($sql);
	//setup_sy
	$sql='ALTER TABLE  `setup_sy`
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//tol_co
	$sql='ALTER TABLE  `tol_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//tol_lm
	$sql='ALTER TABLE  `tol_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//video_co
	$sql='ALTER TABLE  `video_co`
		DROP  `title'.$lang.'` ,
		DROP  `keyword'.$lang.'` ,
		DROP  `f_body'.$lang.'` ,
		DROP  `z_body'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	//video_lm
	$sql='ALTER TABLE  `video_lm`
		DROP  `title_lm'.$lang.'` ,
		DROP  `f_body_lm'.$lang.'` ,
		DROP  `z_body_lm'.$lang.'` ,
		DROP  `ym_tit'.$lang.'` ,
		DROP  `ym_key'.$lang.'` ,
		DROP  `ym_des'.$lang.'` ';
	$db->execute($sql);
	
	msg('删除成功','location="d_default.php"');
}

?>