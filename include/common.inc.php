<?php
//dezend by http://www.yunlu99.com/

define('IN_MO', true);
define('MO_ROOT', str_replace('\\\\', '/', dirname(dirname(preg_replace('@\\(.*\\(.*$@', '', __FILE__)))));
require_once MO_ROOT . '/include/config.inc.php';
require_once MO_ROOT . '/include/common.func.php';
require_once MO_ROOT . '/include/db.class.php';
require_once MO_ROOT . '/include/page.class.php';
require_once MO_ROOT . '/include/session.class.php';
require_once MO_ROOT . '/include/common.lib.php';
header('Content-type:text/html; charset=' . $charset . '');

if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set($timezone);
}

unset($HTTP_ENV_VARS);
unset($HTTP_POST_VARS);
unset($HTTP_GET_VARS);
unset($HTTP_POST_FILES);
unset($HTTP_COOKIE_VARS);
$_GET = resql($_GET);
$_POST = resql($_POST);
$_COOKIE = resql($_COOKIE);
$magic_quotes_gpc = get_magic_quotes_gpc();

if (!$magic_quotes_gpc) {
	if (!empty($_GET)) {
		$_GET = addslash($_GET);
	}

	if (!empty($_POST)) {
		$_POST = addslash($_POST);
	}

	$_COOKIE = addslash($_COOKIE);
	$_REQUEST = addslash($_REQUEST);
}

$db = new db($db_host, $db_user, $db_pass, $db_name);
$db_host = $db_user = $db_pass = NULL;
error_reporting(30719);
set_error_handler('myErrorHandler');
$sess = new cls_session($db, table('sessions'), table('sessions_data'));

if (!file_exists(MO_ROOT . '/include/code.class.php')) {
	exit('1未授权');
}
else {
	include_once MO_ROOT . '/include/code.class.php';
}

if (empty($ck_data)) {
	exit('2未授权');
}

if (strpos($ck_data, '_') === false) {
	exit('3未授权');
}

$tx_arr = explode('_', $ck_data);

if (count($tx_arr) != 3) {
	exit('4未授权');
}

if (strlen($tx_arr[0]) < 25 || strlen($tx_arr[2]) < 38) {
	exit('5未授权');
}

$fi_rnd1 = substr($tx_arr[0], -10, 3);
$fi_rnd2 = substr($tx_arr[0], -5, 5);
$fi_rnd3 = substr($fi_rnd1, 0, 1);
$fi_rnd4 = substr($fi_rnd1, 1, 1);
$fi_rnd5 = substr($fi_rnd1, 2, 1);
$fi_rnd6 = substr($fi_rnd2, 0, 2);
$fi_rnd7 = substr($fi_rnd2, 2, 1);
$fi_rnd8 = substr($fi_rnd2, 3, 2);
$tx_arr[0] = substr($tx_arr[0], 0, strlen($tx_arr[0]) - 5);
$tx_arr[0] = substr($tx_arr[0], 0, strlen($tx_arr[0]) - 5) . substr($tx_arr[0], -2, 2);
$fi_time = substr($tx_arr[0], 1, 3) . substr($tx_arr[0], 7, 3) . substr($tx_arr[0], 13);

if (substr($tx_arr[0], 0, 1) == 1) {
	$fi_data_1 = substr($tx_arr[2], $fi_rnd5, $fi_rnd4);
	$fi_data_2 = substr(substr($tx_arr[2], 0, $fi_rnd5) . substr($tx_arr[2], $fi_rnd5 + $fi_rnd4), $fi_rnd8, $fi_rnd7);
}
else if (substr($tx_arr[0], 0, 1) == 2) {
	$fi_data_2 = substr($tx_arr[2], $fi_rnd5, $fi_rnd7);
	$fi_data_1 = substr(substr($tx_arr[2], 0, $fi_rnd5) . substr($tx_arr[2], $fi_rnd5 + $fi_rnd7), $fi_rnd8, $fi_rnd4);
}

$fi_code_1 = substr($tx_arr[1], 0, $fi_rnd3) . $fi_data_1 . substr($tx_arr[1], $fi_rnd3);
$fi_code = substr($fi_code_1, 0, $fi_rnd6) . $fi_data_2 . substr($fi_code_1, $fi_rnd6);

if (substr($tx_arr[0], 0, 1) == 1) {
	$fi_md5 = substr($tx_arr[2], 0, $fi_rnd5) . substr($tx_arr[2], $fi_rnd5 + $fi_rnd4, $fi_rnd8 - $fi_rnd5) . substr($tx_arr[2], $fi_rnd8 + $fi_rnd4 + $fi_rnd7);
}
else if (substr($tx_arr[0], 0, 1) == 2) {
	$fi_md5 = substr($tx_arr[2], 0, $fi_rnd5) . substr($tx_arr[2], $fi_rnd5 + $fi_rnd7, $fi_rnd8 - $fi_rnd5) . substr($tx_arr[2], $fi_rnd8 + $fi_rnd4 + $fi_rnd7);
}

$fi_rnd10 = substr($fi_md5, -4);
$fi_md5 = substr($fi_md5, 0, strlen($fi_md5) - 4);
$fi_md55 = md5(md5('mo$%vi&*on*!#$$90m&' . $fi_time . $fi_code . $fi_rnd10) . 'luouwe709ljn34&)*%&*%*');

if ($fi_md5 != $fi_md55) {
	exit('6未授权');
}


?>
