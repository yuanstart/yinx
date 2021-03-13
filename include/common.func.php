<?php
//dezend by http://www.yunlu99.com/
function table($str)
{
	return '`' . $GLOBALS['tablepre'] . $str . '`';
}

function load_config($cache_name)
{
	$arr = array();
	$data = false;

	if (checknum($cache_name)) {
		$sy_id = $cache_name;
		$cache_name = 'setup_' . $cache_name;
	}

	static $result = array();

	if (!empty($result[$cache_name])) {
		return $result[$cache_name];
	}

	if ($GLOBALS['data_cache'] === true) {
		$data = read_static_cache($cache_name);
	}

	if ($data === false) {
		if ($cache_name == 'setup') {
			$arr = $GLOBALS['db']->getrs('select * from ' . table('setup_gl') . ' where id=1');
			$arr['sy_seo'] = changety($arr['sy_seo']);
			$arr['log'] = changety($arr['log']);
			$arr['key'] = changety($arr['key']);
			$arr['mlang'] = unserialize($arr['mlang']);
		}
		else if ($cache_name == 'kf') {
			$arr['lm'] = $GLOBALS['db']->getrss('select * from ' . table('kf_lm') . ' where pass=1 order by px desc,id_lm asc');
			$arr['co'] = $GLOBALS['db']->getrss('select * from ' . table('kf_co') . ' where pass=1 order by ding desc,px desc,id desc');
		}
		else if (checknum($sy_id)) {
			$arr = $GLOBALS['db']->getrs('select * from ' . table('setup_sy') . ' where sy_id=' . $sy_id . '');
			$conf = unserialize($arr['config']);

			if ($conf) {
				foreach ($conf as $k => $v) {
					$arr[$k] = $v;
				}
			}

			unset($arr['config']);
		}
		else {
			exit('读取缓存失败');
		}

		$result[$cache_name] = $arr;

		if ($GLOBALS['data_cache'] === true) {
			write_static_cache($cache_name, $arr);
		}
	}
	else {
		$arr = $data;
	}

	return $arr;
}

function read_static_cache($cache_name)
{
	static $result = array();

	if (!empty($result[$cache_name])) {
		return $result[$cache_name];
	}

	$cache_file_path = MO_ROOT . '/cache/' . $cache_name . '.php';

	if (file_exists($cache_file_path)) {
		include_once $cache_file_path;
		$result[$cache_name] = $data;
		return $result[$cache_name];
	}

	return false;
}

function write_static_cache($cache_name, $cache_value)
{
	$cache_file_path = MO_ROOT . '/cache/' . $cache_name . '.php';

	if (!is_dir(MO_ROOT . '/cache/')) {
		makeDir(MO_ROOT . '/cache/');
	}

	$content = "<?php\r\n";
	$content .= '$data = ' . var_export($cache_value, true) . ";\r\n";
	$content .= '?>';
	file_put_contents($cache_file_path, $content, LOCK_EX);
}

function clear_static_cache()
{
	$dirs = array();
	$dirs[] = MO_ROOT . '/cache/';
	$count = 0;

	foreach ($dirs as $dir) {
		$folder = @opendir($dir);

		if ($folder === false) {
			continue;
		}

		while ($file = readdir($folder)) {
			if ($file == '.' || $file == '..' || $file == 'index.htm' || $file == 'index.html') {
				continue;
			}

			if (is_file($dir . $file)) {
				if (@unlink($dir . $file)) {
					$count++;
				}
			}
		}

		closedir($folder);
	}

	return $count;
}

function makeDir($dir, $mode = 511)
{
	if (is_dir($dir) || mkdir($dir, $mode)) {
		return true;
	}

	if (!makeDir(dirname($dir), $mode)) {
		return false;
	}

	return @mkdir($dir, $mode);
}

function addslash($str)
{
	if (!is_array($str)) {
		$str = addslashes($str);
		return $str;
	}
	else {
		return array_map('addslash', $str);
	}
}

function resql($str)
{
	$sqlkey = array('/\\s+select\\s+/i', '/\\s+delete\\s+/i', '/\\s+update\\s+/i', '/\\s+or\\s+/i', '/\\s+union\\s+/i', '/\\s+outfile\\s+/');
	$replace = array('&nbsp;select&nbsp;', '&nbsp;delete&nbsp;', '&nbsp;update&nbsp;', '&nbsp;or&nbsp;', '&nbsp;union&nbsp;', '&nbsp;outfile&nbsp;');

	if (!is_array($str)) {
		$str = preg_replace($sqlkey, $replace, $str);
		return $str;
	}
	else {
		return array_map('resql', $str);
	}
}

function rekey($text)
{
	$conf = load_config('setup');

	if ($conf['key'] == true) {
		$arr = read_key();

		if ($arr[0] != 'kong') {
			foreach ($arr as $v) {
				if (preg_match('/' . $v['title'] . '/iSU', $text)) {
					if (!preg_match('/<a([^>]*)>' . $v['title'] . '<\\/a>/iSU', $text)) {
						$text = str_replace($v['title'], addslash('<a href="' . $v['link_url'] . '" target="_blank">' . $v['title'] . '</a>'), $text);
					}
				}
			}
		}
	}

	return $text;
}

function read_key()
{
	static $result = array();

	if (!empty($result)) {
		return $result;
	}
	else {
		$conf = load_config('setup');
		$arr = $GLOBALS['db']->getrss('select * from ' . table('key_co') . ' where pass=1');

		foreach ($arr as $v) {
			foreach ($conf['mlang'] as $ev) {
				$result[] = array('title' => $v['title' . $ev['lang']], 'link_url' => $v['link_url' . $ev['lang']]);
			}
		}

		if (empty($result)) {
			$result[0] = 'kong';
		}

		return $result;
	}
}

function changety($str)
{
	if ($str == 'true' || $str == 1) {
		return true;
	}
	else {
		if ($str == 'false' || $str == 0) {
			return false;
		}
		else {
			return false;
		}
	}
}

function zusql($field, $keyword)
{
	$str = '';
	if ($field && $keyword) {
		$arr1 = explode(',', $field);
		$arr2 = explode('|', $keyword);
		$a1 = 1;

		foreach ($arr1 as $v1) {
			$a2 = 1;

			foreach ($arr2 as $v2) {
				if ($a1 == 1 && $a2 == 1) {
					$str = $v1 . ' like "%' . $v2 . '%"';
				}
				else {
					$str .= ' or ' . $v1 . ' like "%' . $v2 . '%"';
				}

				$a2++;
			}

			$a1++;
		}
	}

	return $str;
}

function previous()
{
	if (isset($_SERVER['HTTP_REFERER'])) {
		$url = $_SERVER['HTTP_REFERER'];
		return $url;
	}
}

function getpageurl()
{
	if (!isset($_SERVER['REQUEST_URI'])) {
		$_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1);

		if (isset($_SERVER['QUERY_STRING'])) {
			$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
		}
	}

	$pageURL = 'http://';
	if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off') {
		$pageURL = 'https://';
	}

	if (!empty($_SERVER['HTTP_HOST'])) {
		$pageURL .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
	else {
		if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
			$pageURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
		}
		else {
			$pageURL .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		}
	}

	return $pageURL;
}

function getip()
{
	static $realip;

	if ($realip !== NULL) {
		return $realip;
	}

	if (isset($_SERVER)) {
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);

			foreach ($arr as $ip) {
				$ip = trim($ip);

				if ($ip != 'unknown') {
					$realip = $ip;
					break;
				}
			}
		}
		else if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$realip = $_SERVER['HTTP_CLIENT_IP'];
		}
		else if (isset($_SERVER['REMOTE_ADDR'])) {
			$realip = $_SERVER['REMOTE_ADDR'];
		}
		else {
			$realip = '0.0.0.0';
		}
	}
	else if (getenv('HTTP_X_FORWARDED_FOR')) {
		$realip = getenv('HTTP_X_FORWARDED_FOR');
	}
	else if (getenv('HTTP_CLIENT_IP')) {
		$realip = getenv('HTTP_CLIENT_IP');
	}
	else {
		$realip = getenv('REMOTE_ADDR');
	}

	preg_match('/[\\d\\.]{7,15}/', $realip, $onlineip);
	$realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
	return $realip;
}

function msg($str1 = '', $str2 = '')
{
	if ($str1 != '') {
		$str1 = 'alert("' . $str1 . '");';
	}

	if ($str2 == '') {
		$str2 = 'history.back();';
	}

	echo '<script>' . $str1 . $str2 . '</script>';
	exit();
}

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
	if ($GLOBALS['error_tip']) {
		$errfile = str_replace('\\', '/', $errfile);
		$errfile = str_replace(MO_ROOT, 'root', $errfile);
		echo '<div style="color:#ff0000;font:12px;">出错啦！';
		echo '<br>出错文件：' . $errfile;
		echo '<br>出错行数：' . $errline;
		echo '<br>错误信息：' . $errstr;
		echo '<br>错误级别：' . $errno . '<br><div>';
	}
	else {
		echo 'PHP Error!';
	}

	exit();
}

function checklogin()
{
	if (!isset($_SESSION['hyadmin']) || $_SESSION['hyadmin'] == '') {
		msg('未登录或登录已超时', 'location="../default.php"');
	}
}

function chklogin()
{
	if (!isset($_SESSION['hyadmin']) || $_SESSION['hyadmin'] == '') {
		msg('未登录或登录已超时', 'location="default.php"');
	}
}

function checkdefault()
{
	if (isset($_SESSION['hyadmin']) && $_SESSION['hyadmin'] != '') {
		msg('', 'location="system.php"');
	}
}

function master_log($z_body, $username = '')
{
	$conf = load_config('setup');

	if ($conf['log'] == true) {
		if ($username == '') {
			$username = $_SESSION['hyadmin'];
		}

		$GLOBALS['db']->execute('insert into ' . table('master_log') . ' (`username`,`z_body`,`ip`,`wtime`)values("' . $username . '","' . $z_body . '","' . getip() . '",' . time() . ')');
	}
}

function checkaction($str)
{
	$ck = false;

	if (!empty($_SESSION['action_list'])) {
		if ($_SESSION['action_list'] == 'all') {
			$ck = true;
		}
		else if (strpos(',' . $_SESSION['action_list'] . ',', ',' . $str . ',') !== false) {
			$ck = true;
		}
	}

	if ($ck == false) {
		msg('权限不足');
	}
}

function is_utf8($str)
{
	if (preg_match('/^([' . chr(228) . '-' . chr(233) . ']{1}[' . chr(128) . '-' . chr(191) . ']{1}[' . chr(128) . '-' . chr(191) . ']{1}){1}/', $str) == true || preg_match('/([' . chr(228) . '-' . chr(233) . ']{1}[' . chr(128) . '-' . chr(191) . ']{1}[' . chr(128) . '-' . chr(191) . ']{1}){1}$/', $str) == true || preg_match('/([' . chr(228) . '-' . chr(233) . ']{1}[' . chr(128) . '-' . chr(191) . ']{1}[' . chr(128) . '-' . chr(191) . ']{1}){2,}/', $str) == true) {
		return true;
	}
	else {
		return false;
	}
}

function read_config($ty, $folder = './')
{
	$folder1 = '';
	$folder2 = '';
	$folder3 = '';
	$arr = array();
	$path = dirname(str_replace('\\', '/', $_SERVER['PHP_SELF']));
	$shu = explode('/', $path);
	$str = $shu[count($shu) - 1];

	if (strpos($folder, '../') !== false) {
		$rows = explode('/', $folder);

		if (2 < count($rows)) {
			$folder1 = $rows[0];
			$folder2 = $rows[1];
			$folder3 = $rows[2];
		}
		else if ($rows[1] != '') {
			$folder1 = $rows[0];

			if (strrchr($str, '_co') == '_co') {
				$folder2 = str_replace('_co', '_lm', $str);
			}
			else if (strrchr($str, '_lx') == '_lx') {
				$folder2 = str_replace('_lx', '_lm', $str);
			}
			else {
				$folder2 = str_replace('_lm', '_co', $str);
			}

			$folder3 = $rows[1];
		}
		else if ($rows[1] == '') {
			$folder1 = $rows[0];

			if (strrchr($str, '_co') == '_co') {
				$folder2 = str_replace('_co', '_lm', $str);
			}
			else if (strrchr($str, '_lx') == '_lx') {
				$folder2 = str_replace('_lx', '_lm', $str);
			}
			else {
				$folder2 = str_replace('_lm', '_co', $str);
			}

			$folder3 = '';
		}
	}
	else if (strpos($folder, './') !== false) {
		$rows = explode('/', $folder);

		if (2 < count($rows)) {
			$folder1 = $rows[0];
			$folder2 = $rows[1];
			$folder3 = $rows[2];
		}
		else if ($rows[1] != '') {
			$folder1 = $rows[0];
			$folder2 = '';
			$folder3 = $rows[1];
		}
		else if ($rows[1] == '') {
			$folder1 = $rows[0];
			$folder2 = '';
			$folder3 = '';
		}
	}

	$folder1 = $folder1 != '' ? $folder1 . '/' : '';
	$folder2 = $folder2 != '' ? $folder2 . '/' : '';
	$folder3 = $folder3 != '' ? $folder3 . '/' : '';

	if ($ty == 'config') {
		$path = $folder1 . $folder2 . $folder3 . 'config.php';

		if (file_exists($path)) {
			include $path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_ul') {
		$folder3 = $folder3 != '' ? $folder3 : 'up_image_tool/';
		$path = $folder1 . $folder2 . $folder3 . 'upcon.php';

		if (file_exists($path)) {
			include_once $path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_um') {
		$folder3 = $folder3 != '' ? $folder3 : 'up_image_tool/';
		$path = $folder1 . $folder2 . $folder3 . 'upcon.php';

		if (file_exists($path)) {
			include_once $path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_up') {
		$folder3 = $folder3 != '' ? $folder3 : 'up_pic_tool/';
		$path = $folder1 . $folder2 . $folder3 . 'upcon.php';

		if (file_exists($path)) {
			include_once $path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_uf') {
		$folder3 = $folder3 != '' ? $folder3 : 'up_file_tool/';
		$path = $folder1 . $folder2 . $folder3 . 'upcon.php';

		if (file_exists($path)) {
			include_once $path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_uv') {
		$folder3 = $folder3 != '' ? $folder3 : 'up_video_tool/';
		$path = $folder1 . $folder2 . $folder3 . 'upcon.php';

		if (file_exists($path)) {
			include_once $path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_pm') {
		$folder3 = $folder3 != '' ? $folder3 : 'pl_image_tool/';
		$pl_path = $folder1 . $folder2 . $folder3 . 'pl_config.php';

		if (file_exists($pl_path)) {
			include_once $pl_path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_pi') {
		$folder3 = $folder3 != '' ? $folder3 : 'pl_info_tool/';
		$pl_path = $folder1 . $folder2 . $folder3 . 'pl_config.php';
		$up_path = $folder1 . $folder2 . $folder3 . 'up_image_tool/upcon.php';

		if (file_exists($pl_path)) {
			include_once $pl_path;
			$arr = $conf;
		}

		if (file_exists($up_path)) {
			include_once $up_path;
			$arr = $conf;
		}
	}
	else if ($ty == 'conf_pf') {
		$folder3 = $folder3 != '' ? $folder3 : 'pl_file_tool/';
		$pl_path = $folder1 . $folder2 . $folder3 . 'pl_config.php';
		$upi_path = $folder1 . $folder2 . $folder3 . 'up_image_tool/upcon.php';
		$upf_path = $folder1 . $folder2 . $folder3 . 'up_file_tool/upcon.php';

		if (file_exists($pl_path)) {
			include_once $pl_path;
			$arr = $conf;
		}

		if (file_exists($upi_path)) {
			include_once $upi_path;
			$arr = $conf;
		}

		if (file_exists($upf_path)) {
			include_once $upf_path;
			$arr['file'] = $conf;
		}
	}
	else if ($ty == 'conf_pv') {
		$folder3 = $folder3 != '' ? $folder3 : 'pl_video_tool/';
		$pl_path = $folder1 . $folder2 . $folder3 . 'pl_config.php';
		$upi_path = $folder1 . $folder2 . $folder3 . 'up_image_tool/upcon.php';
		$upv_path = $folder1 . $folder2 . $folder3 . 'up_video_tool/upcon.php';

		if (file_exists($pl_path)) {
			include_once $pl_path;
			$arr = $conf;
		}

		if (file_exists($upi_path)) {
			include_once $upi_path;
			$arr = $conf;
		}

		if (file_exists($upv_path)) {
			include_once $upv_path;
			$arr['video'] = $conf;
		}
	}
	else if ($ty == 'conf_pz') {
		$folder3 = $folder3 != '' ? $folder3 : 'pl_zu_tool/';
		$pl_path = $folder1 . $folder2 . $folder3 . 'pl_config.php';
		$up_path = $folder1 . $folder2 . $folder3 . 'up_image_tool/upcon.php';

		if (file_exists($pl_path)) {
			include_once $pl_path;
			$arr = $conf;
		}

		if (file_exists($up_path)) {
			include_once $up_path;
			$arr['image'] = $conf;
		}
	}
	else {
		$path = $folder1 . $folder2 . $folder3 . '' . $ty . '.php';

		if (file_exists($path)) {
			include $path;
			$arr = $conf;
		}
	}

	return $arr;
}

function write_config($ty, $conf, $path, $folder = './')
{
	$path = dirname(str_replace('\\', '/', $path));
	$shu = explode('/', $path);
	$str = $shu[count($shu) - 1];
	$path = dirname($path) . '/';

	if (strpos($folder, '../') !== false) {
		$rows = explode('/', $folder);

		if (2 < count($rows)) {
			$folder1 = $rows[1];
			$folder2 = $rows[2];
		}
		else if ($rows[1] != '') {
			if (strrchr($str, '_co') == '_co') {
				$folder1 = str_replace('_co', '_lm', $str);
			}
			else {
				$folder1 = str_replace('_lm', '_co', $str);
			}

			$folder2 = $rows[1];
		}
		else if ($rows[1] == '') {
			if (strrchr($str, '_co') == '_co') {
				$folder1 = str_replace('_co', '_lm', $str);
			}
			else {
				$folder1 = str_replace('_lm', '_co', $str);
			}

			$folder2 = '';
		}
	}
	else if (strpos($folder, './') !== false) {
		$rows = explode('/', $folder);

		if (2 < count($rows)) {
			$folder1 = $rows[1];
			$folder2 = $rows[2];
		}
		else if ($rows[1] != '') {
			$folder1 = $str;
			$folder2 = $rows[1];
		}
		else if ($rows[1] == '') {
			$folder1 = $str;
			$folder2 = '';
		}
	}

	$folder1 = $folder1 != '' ? $folder1 . '/' : '';
	$folder2 = $folder2 != '' ? $folder2 . '/' : '';

	if ($ty == 'config') {
		$path = $path . $folder1 . $folder2 . 'config.php';
		$content = "<?php\r\n";

		if (isset($conf['sy'])) {
			$content .= '$conf[\'sy\'] = ' . var_export($conf['sy'], true) . ";\r\n";
		}

		if (isset($conf['lm'])) {
			$content .= '$conf[\'lm\'] = ' . var_export($conf['lm'], true) . ";\r\n";
		}

		if (isset($conf['co'])) {
			$content .= '$conf[\'co\'] = ' . var_export($conf['co'], true) . ";\r\n";
		}

		if (isset($conf['pic_sl'])) {
			$content .= '$conf[\'pic_sl\'] = ' . var_export($conf['pic_sl'], true) . ";\r\n";
		}

		if (isset($conf['up'])) {
			$content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$content .= '?>';
		file_put_contents($path, $content, LOCK_EX);
	}
	else if ($ty == 'conf_ul') {
		$folder2 = $folder2 != '' ? $folder2 : 'up_image_tool/';
		$path = $path . $folder1 . $folder2 . 'upcon.php';
		$content = "<?php\r\n";

		if (isset($conf['up'])) {
			$content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$content .= '?>';
		file_put_contents($path, $content, LOCK_EX);
	}
	else if ($ty == 'conf_um') {
		$folder2 = $folder2 != '' ? $folder2 : 'up_image_tool/';
		$path = $path . $folder1 . $folder2 . 'upcon.php';
		$content = "<?php\r\n";

		if (isset($conf['up'])) {
			$content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$content .= '?>';
		file_put_contents($path, $content, LOCK_EX);
	}
	else if ($ty == 'conf_up') {
		$folder2 = $folder2 != '' ? $folder2 : 'up_pic_tool/';
		$path = $path . $folder1 . $folder2 . 'upcon.php';
		$content = "<?php\r\n";

		if (isset($conf['up'])) {
			$content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$content .= '?>';
		file_put_contents($path, $content, LOCK_EX);
	}
	else if ($ty == 'conf_uf') {
		$folder2 = $folder2 != '' ? $folder2 : 'up_file_tool/';
		$path = $path . $folder1 . $folder2 . 'upcon.php';
		$content = "<?php\r\n";

		if (isset($conf['up'])) {
			$content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$content .= '?>';
		file_put_contents($path, $content, LOCK_EX);
	}
	else if ($ty == 'conf_uv') {
		$folder2 = $folder2 != '' ? $folder2 : 'up_video_tool/';
		$path = $path . $folder1 . $folder2 . 'upcon.php';
		$content = "<?php\r\n";

		if (isset($conf['up'])) {
			$content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$content .= '?>';
		file_put_contents($path, $content, LOCK_EX);
	}
	else if ($ty == 'conf_pm') {
		$folder2 = $folder2 != '' ? $folder2 : 'pl_image_tool/';
		$pl_path = $path . $folder1 . $folder2 . 'pl_config.php';
		$pl_content = "<?php\r\n";

		if (isset($conf['pl'])) {
			$pl_content .= '$conf[\'pl\'] = ' . var_export($conf['pl'], true) . ";\r\n";
		}

		if (isset($conf['up'])) {
			$pl_content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$pl_content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$pl_content .= '?>';
		file_put_contents($pl_path, $pl_content, LOCK_EX);
	}
	else if ($ty == 'conf_pi') {
		$folder2 = $folder2 != '' ? $folder2 : 'pl_info_tool/';
		$pl_path = $path . $folder1 . $folder2 . 'pl_config.php';
		$up_path = $path . $folder1 . $folder2 . 'up_image_tool/upcon.php';
		$pl_content = "<?php\r\n";

		if (isset($conf['pl'])) {
			$pl_content .= '$conf[\'pl\'] = ' . var_export($conf['pl'], true) . ";\r\n";
		}

		$pl_content .= '?>';
		$up_content = "<?php\r\n";

		if (isset($conf['up'])) {
			$up_content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$up_content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$up_content .= '?>';
		file_put_contents($pl_path, $pl_content, LOCK_EX);
		file_put_contents($up_path, $up_content, LOCK_EX);
	}
	else if ($ty == 'conf_pf') {
		$folder2 = $folder2 != '' ? $folder2 : 'pl_file_tool/';
		$pl_path = $path . $folder1 . $folder2 . 'pl_config.php';
		$upi_path = $path . $folder1 . $folder2 . 'up_image_tool/upcon.php';
		$upf_path = $path . $folder1 . $folder2 . 'up_file_tool/upcon.php';
		$pl_content = "<?php\r\n";

		if (isset($conf['pl'])) {
			$pl_content .= '$conf[\'pl\'] = ' . var_export($conf['pl'], true) . ";\r\n";
		}

		$pl_content .= '?>';
		$upi_content = "<?php\r\n";

		if (isset($conf['up'])) {
			$upi_content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$upi_content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$upi_content .= '?>';
		$upf_content = "<?php\r\n";

		if (isset($conf['file']['up'])) {
			$upf_content .= '$conf[\'up\'] = ' . var_export($conf['file']['up'], true) . ";\r\n";
		}

		if (isset($conf['file']['sm'])) {
			$upf_content .= '$conf[\'sm\'] = ' . var_export($conf['file']['sm'], true) . ";\r\n";
		}

		$upf_content .= '?>';
		file_put_contents($pl_path, $pl_content, LOCK_EX);
		file_put_contents($upi_path, $upi_content, LOCK_EX);
		file_put_contents($upf_path, $upf_content, LOCK_EX);
	}
	else if ($ty == 'conf_pv') {
		$folder2 = $folder2 != '' ? $folder2 : 'pl_video_tool/';
		$pl_path = $path . $folder1 . $folder2 . 'pl_config.php';
		$upi_path = $path . $folder1 . $folder2 . 'up_image_tool/upcon.php';
		$upv_path = $path . $folder1 . $folder2 . 'up_video_tool/upcon.php';
		$pl_content = "<?php\r\n";

		if (isset($conf['pl'])) {
			$pl_content .= '$conf[\'pl\'] = ' . var_export($conf['pl'], true) . ";\r\n";
		}

		$pl_content .= '?>';
		$upi_content = "<?php\r\n";

		if (isset($conf['up'])) {
			$upi_content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$upi_content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$upi_content .= '?>';
		$upv_content = "<?php\r\n";

		if (isset($conf['video']['up'])) {
			$upv_content .= '$conf[\'up\'] = ' . var_export($conf['video']['up'], true) . ";\r\n";
		}

		if (isset($conf['video']['sm'])) {
			$upv_content .= '$conf[\'sm\'] = ' . var_export($conf['video']['sm'], true) . ";\r\n";
		}

		$upv_content .= '?>';
		file_put_contents($pl_path, $pl_content, LOCK_EX);
		file_put_contents($upi_path, $upi_content, LOCK_EX);
		file_put_contents($upv_path, $upv_content, LOCK_EX);
	}
	else if ($ty == 'conf_pz') {
		$folder2 = $folder2 != '' ? $folder2 : 'pl_zu_tool/';
		$pl_path = $path . $folder1 . $folder2 . 'pl_config.php';
		$up_path = $path . $folder1 . $folder2 . 'up_image_tool/upcon.php';
		$pl_content = "<?php\r\n";

		if (isset($conf['pl'])) {
			$pl_content .= '$conf[\'pl\'] = ' . var_export($conf['pl'], true) . ";\r\n";
		}

		if (isset($conf['up'])) {
			$pl_content .= '$conf[\'up\'] = ' . var_export($conf['up'], true) . ";\r\n";
		}

		if (isset($conf['sm'])) {
			$pl_content .= '$conf[\'sm\'] = ' . var_export($conf['sm'], true) . ";\r\n";
		}

		$pl_content .= '?>';
		$up_content = "<?php\r\n";

		if (isset($conf['image']['up'])) {
			$up_content .= '$conf[\'up\'] = ' . var_export($conf['image']['up'], true) . ";\r\n";
		}

		if (isset($conf['image']['sm'])) {
			$up_content .= '$conf[\'sm\'] = ' . var_export($conf['image']['sm'], true) . ";\r\n";
		}

		$up_content .= '?>';
		file_put_contents($pl_path, $pl_content, LOCK_EX);
		file_put_contents($up_path, $up_content, LOCK_EX);
	}
	else {
		$path = $path . $folder1 . $folder2 . '/' . $ty . '.php';
		$content = "<?php\r\n";
		$content .= '$conf = ' . var_export($conf, true) . ";\r\n";
		$content .= '?>';
		file_put_contents($path, $content, LOCK_EX);
	}
}

function gt_rnd1($l)
{
	$str = '';

	for ($i = 1; $i <= $l; $i++) {
		$str .= rand(0, 9);
	}

	return $str;
}

function gt_rnd2($l)
{
	$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 's', 'y', 'z', 1, 2, 3, 4, 5, 6, 7, 8, 9);
	$charslen = count($chars) - 1;
	shuffle($chars);
	$code = '';

	for ($a = 0; $a < $l; $a++) {
		$code .= $chars[rand(0, $charslen)];
	}

	return $code;
}

function apipost($posturl, $postdata)
{
	$urlinfo = parse_url($posturl);
	$apihost = $urlinfo['host'];
	$apipath = $urlinfo['path'];
	$apiport = isset($urlinfo['port']) ? $urlinfo['port'] : 80;

	if (gethostbyname($apihost) == 'api.heyou51.cn') {
		exit('请连接网络');
	}

	if (function_exists('stream_socket_client')) {
		$fp = stream_socket_client($apihost . ':' . $apiport, $errno, $errstr, 10);
	}
	else if (function_exists('fsockopen')) {
		$fp = fsockopen($apihost, $apiport, $errno, $errstr, 10);
	}

	if (empty($fp)) {
		exit('请开启stream_socket_client或fsockopen函数');
	}

	$header = 'POST ' . $apipath . " HTTP/1.1\r\n";
	$header .= 'Host:' . $apihost . "\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= 'Content-Length: ' . strlen($postdata) . "\r\n";
	$header .= "Connection: Close\r\n\r\n";
	$header .= $postdata . "\r\n";
	fputs($fp, $header);
	$inheader = 1;
	$result = '';

	while (!feof($fp)) {
		$line = fgets($fp, 1024);
		if ($inheader && ($line == "\n" || $line == "\r\n")) {
			$inheader = 0;
			continue;
		}

		if ($inheader == 0) {
			$result .= $line;
		}
	}

	fclose($fp);
	return $result;
}


if (!defined('IN_MO')) {
	exit('Access Denied');
}

?>
