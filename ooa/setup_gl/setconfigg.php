<?php
require('../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//获取配置
$conf['co']['ym_hcode']=(!empty($_POST['ym_hcode']))?changety(html($_POST['ym_hcode'])):true;
$conf['co']['ym_bot']=(!empty($_POST['ym_bot']))?changety(html($_POST['ym_bot'])):true;
$conf['co']['ym_bcode']=(!empty($_POST['ym_bcode']))?changety(html($_POST['ym_bcode'])):true;
$conf['co']['map']=(!empty($_POST['map']))?changety(html($_POST['map'])):true;
$conf['co']['email']=(!empty($_POST['email']))?changety(html($_POST['email'])):true;
$conf['co']['r_email']=(!empty($_POST['r_email']))?changety(html($_POST['r_email'])):true;
//保存系统的配置文件
write_config('config',$conf,$ympath);
unset($conf);

//添加日志
master_log('修改网站设置：配置文件');

msg('保存成功','location="setconfig.php"');
?>
