<?php
if(!defined('IN_MO')){
	exit('Access Denied');
}

$db_host = 'localhost'; //数据库服务器

$db_name = 'yinx';   //数据库名

$db_user = 'root';      //数据库用户名

$db_pass = '123456';          //数据库密码

$db_charset = 'utf8';   //数据库字符集

$db_pconnect =0;        //持久链接

$timezone = 'PRC';      //时区

$charset='utf-8';       //字符编码

$tablepre='';           //表前缀

$cookie_path= "/";      //规定 cookie 的服务器路径

$cookie_domain="";      //规定 cookie 的域名

$cookie_secure="";      //规定是否通过安全的 HTTPS 连接来传输 cookie

$data_cache=true;      //是否缓存，默认开启缓存，如果网站的后台没在这里(这个网站要调用主网站的数据)时，一定要关闭缓存，否则无法读取最新数据

$error_tip=true;        //是否显示错误

$appuid='611eb55ba2012550a4e556d127c86a96';
?>
