<?php
/**
 * 特有的session类库
*/

if(!defined('IN_MO')){
	exit('Access Denied');
}

class cls_session
{
    var $db             = NULL;
    var $session_table  = '';
    var $max_life_time  = 3600; // SESSION 过期时间
    var $session_name   = '';
    var $session_id     = '';
    var $session_expiry = '';
    var $session_md5    = '';
	var $session_str    = '';
    var $session_cookie_path   = '/';
    var $session_cookie_domain = '';
    var $session_cookie_secure = false;
    var $_ip   = '';
    var $_time = 0;

    function __construct(&$db, $session_table, $session_data_table, $session_name = 'MO_ID', $session_id = ''){
        $this->cls_session($db, $session_table, $session_data_table, $session_name, $session_id);
    }

    function cls_session(&$db, $session_table, $session_data_table, $session_name = 'MO_ID', $session_id = ''){
       
	    $GLOBALS['_SESSION'] = array();
        if (!empty($GLOBALS['cookie_path'])){
            $this->session_cookie_path = $GLOBALS['cookie_path'];
        }else{
            $this->session_cookie_path = '/';
        }
        if (!empty($GLOBALS['cookie_domain'])){
            $this->session_cookie_domain = $GLOBALS['cookie_domain'];
        }else{
            $this->session_cookie_domain = '';
        }
        if (!empty($GLOBALS['cookie_secure'])){
            $this->session_cookie_secure = $GLOBALS['cookie_secure'];
        }else{
            $this->session_cookie_secure = false;
        }
		
        $this->session_name       = $session_name;
        $this->session_table      = $session_table;
        $this->session_data_table = $session_data_table;
        $this->db    = &$db;
        $this->_ip   = getip();
		$this->_time = time();
		
        if ($session_id == '' && !empty($_COOKIE[$this->session_name])){
            $this->session_id = $_COOKIE[$this->session_name];
        }else{
            $this->session_id = $session_id;
        }

        if ($this->session_id){
            $tmp_session_id = substr($this->session_id, 0, 32);
            if ($this->create_session_key($tmp_session_id) == substr($this->session_id, 32)){
                $this->session_id = $tmp_session_id;
            }else{
                $this->session_id = '';
            }
        }

        if ($this->session_id){
            $this->load_session();
        }else{
            $this->create_session_id();
            setcookie($this->session_name, $this->session_id . $this->create_session_key($this->session_id), 0, $this->session_cookie_path, $this->session_cookie_domain, $this->session_cookie_secure);
        }
		
        register_shutdown_function(array(&$this, 'close_session'));
    }
	
	//创建sessionid并插入记录
    function create_session_id(){
        $this->session_id = md5(uniqid(mt_rand(), true)); //这里有技巧,uniqid创建的是以当前微秒时间的id，同时以mt_rand随机数为前缀，同时true还会为末尾添加额外字符这样唯一性更好
        return $this->insert_session();
    }
	
	//插入session记录$data为空数组
    function insert_session(){
        return $this->db->query('INSERT INTO ' . $this->session_table . " (sesskey, expiry, ip, data) VALUES ('" . $this->session_id . "', '". $this->_time ."', '". $this->_ip ."', 'a:0:{}')");
    }
	
	//创建session效验值
    function create_session_key($session_id){
        static $ip = '';
//        if ($ip == ''){
//            $ip = substr($this->_ip, 0, strrpos($this->_ip, '.'));
//        }
        return sprintf('%08x', crc32(MO_ROOT . $ip . $session_id));
    }
	
	//加载session
    function load_session(){
        $session = $this->db->getrs('SELECT expiry, person, `rename`, email, dengji, zhekou, hyadmin, data  FROM ' . $this->session_table . " WHERE sesskey = '" . $this->session_id . "'");
        if (empty($session)){
            $this->insert_session();
            $this->session_expiry = 0;
            $this->session_md5    = '40cd750bba9870f18aada2478b24840a';
			$this->session_str    = '';
            $GLOBALS['_SESSION']  = array();
        }else{
            if (!empty($session['data']) && $this->_time - $session['expiry'] <= $this->max_life_time){
                $this->session_expiry = $session['expiry'];
                $this->session_md5    = md5($session['data']);
				$GLOBALS['_SESSION']  = unserialize($session['data']);
                $GLOBALS['_SESSION']['person']  = $session['person'];
                $GLOBALS['_SESSION']['rename']  = $session['rename'];
                $GLOBALS['_SESSION']['email']   = $session['email'];
                $GLOBALS['_SESSION']['dengji']  = $session['dengji'];
                $GLOBALS['_SESSION']['zhekou']  = $session['zhekou'];
				$GLOBALS['_SESSION']['hyadmin'] = $session['hyadmin'];
				$this->session_str    = serialize(array(
												'person'=>$session['person'],
												'rename'=>$session['rename'],
												'email'=>$session['email'],
												'dengji'=>intval($session['dengji']),
												'zhekou'=>round($session['zhekou'],2),
												'hyadmin'=>$session['hyadmin']));
            }else{
                $session_data = $this->db->getrs('SELECT data, expiry FROM ' . $this->session_data_table . " WHERE sesskey = '" . $this->session_id . "'");
                if (!empty($session_data['data']) && $this->_time - $session_data['expiry'] <= $this->max_life_time){
                    $this->session_expiry = $session_data['expiry'];
                    $this->session_md5    = md5($session_data['data']);
                    $GLOBALS['_SESSION']  = unserialize($session_data['data']);
                    $GLOBALS['_SESSION']['person']  = $session['person'];
                    $GLOBALS['_SESSION']['rename']  = $session['rename'];
                    $GLOBALS['_SESSION']['email']   = $session['email'];
                    $GLOBALS['_SESSION']['dengji']  = $session['dengji'];
                    $GLOBALS['_SESSION']['zhekou']  = $session['zhekou'];
					$GLOBALS['_SESSION']['hyadmin'] = $session['hyadmin'];
					$this->session_str    = serialize(array(
													'person'=>$session['person'],
													'rename'=>$session['rename'],
													'email'=>$session['email'],
													'dengji'=>intval($session['dengji']),
													'zhekou'=>round($session['zhekou'],2),
													'hyadmin'=>$session['hyadmin']));
                }else{
                    $this->session_expiry = 0;
                    $this->session_md5    = '40cd750bba9870f18aada2478b24840a';
					$this->session_str    = '';
                    $GLOBALS['_SESSION']  = array();
                }
            }
        }
    }
	
	//页面加载完或在程序中执行exit(),die()后更新session信息
    function update_session(){
		//var_dump($GLOBALS['_SESSION']).'<br/>';
		//以下是固定值（就是说产生session后值不会变的）
        $person  = !empty($GLOBALS['_SESSION']['person'])  ? trim($GLOBALS['_SESSION']['person'])     : '';   //前台会员名session
        $rename  = !empty($GLOBALS['_SESSION']['rename'])  ? trim($GLOBALS['_SESSION']['rename'])     : '';   //前台会员姓名session
		$email   = !empty($GLOBALS['_SESSION']['email'])   ? trim($GLOBALS['_SESSION']['email'])      : '';   //邮箱session(未用)
        $dengji  = !empty($GLOBALS['_SESSION']['dengji'])  ? intval($GLOBALS['_SESSION']['dengji'])   : 0;   //等级session(未用)
        $zhekou  = !empty($GLOBALS['_SESSION']['zhekou'])  ? round($GLOBALS['_SESSION']['zhekou'], 2) : 0.00;   //折扣session(未用)
		$hyadmin = !empty($GLOBALS['_SESSION']['hyadmin']) ? trim($GLOBALS['_SESSION']['hyadmin'])    : '';   //后台管理员名session
        unset($GLOBALS['_SESSION']['person']);
        unset($GLOBALS['_SESSION']['rename']);
        unset($GLOBALS['_SESSION']['email']);
        unset($GLOBALS['_SESSION']['dengji']);
        unset($GLOBALS['_SESSION']['zhekou']);
		unset($GLOBALS['_SESSION']['hyadmin']);
        $data        = serialize($GLOBALS['_SESSION']);
		$session_str    = serialize(array('person'=>$person,'rename'=>$rename,'email'=>$email,'dengji'=>$dengji,'zhekou'=>$zhekou,'hyadmin'=>$hyadmin));
		//如果$hyadmin $person $rename $email $dengji $zhekou 产生后值需要改变的，请放到这里unset,否是改变了值都不会保存到session里

        $this->_time = time();
		
		
		//$content='页面加载前:'.$this->session_str."\n";
		//$content.='页面结束后:'.$session_str.date('H:i:s')."\n";
		//file_put_contents(MO_ROOT.'/1.log', $content,FILE_APPEND);
		
		
		//这个很关键，意思是其他的sesison数据发生变化或者是离上次访问时间超过10秒才会执行下面的更新否则直接退出方法
        if ($this->session_str != $session_str || $this->session_md5 != md5($data) || ($this->_time - $this->session_expiry) >= 10){
		
			//file_put_contents(MO_ROOT.'/1.log','更新数据库:'.$session_str.date('H:i:s')."\n\n",FILE_APPEND);
			
			//var_dump($data).'<br/>';
			$data = addslashes($data);
			//如果超过255个字符，就在另外一个表保存数据，同时把$data清空
			if (isset($data{255})){
				$this->db->autoReplace($this->session_data_table, array('sesskey' => $this->session_id, 'expiry' => $this->_time, 'data' => $data), array('data' => $data));
				$data = '';
			}
			$sql='UPDATE ' . $this->session_table . " SET expiry = '" . $this->_time . "', person = '" . $person . "', `rename`='" . $rename . "', email='" . $email . "', dengji='" . $dengji . "', zhekou='" . $zhekou . "', hyadmin = '" . $hyadmin . "', ip = '" . $this->_ip . "', data = '$data' WHERE sesskey = '" . $this->session_id . "' LIMIT 1";
			//echo $sql;
			return $this->db->execute($sql);
		}else{
			return true;
		}
    }
	
	//页面加载完或在程序中执行exit(),die()触发方法
    function close_session(){
        $this->update_session();
        /* 随机对 sessions_data 的库进行删除操作 */
        if (mt_rand(0, 2) == 2){
            $this->db->query('DELETE FROM ' . $this->session_data_table . ' WHERE expiry < ' . ($this->_time - $this->max_life_time));
        }
        if ((time() % 2) == 0){
            $this->db->query('DELETE FROM ' . $this->session_table . ' WHERE expiry < ' . ($this->_time - $this->max_life_time));
        }
		//关闭数据库连接
		if($this->db->link_id!==NULL){
			$this->db->close();
		}
        return true;
    }
	
	//删除会员的登录数据
    function delete_person_session($person){
        if (!empty($GLOBALS['_SESSION']['person']) && $person){
            return $this->db->query('DELETE FROM ' . $this->session_table . ' WHERE person = "'.$person.'"');
        }else{
            return false;
        }
    }
	
	//删除管理员的登录数据
    function delete_admin_session($hyadmin){
        if (!empty($GLOBALS['_SESSION']['hyadmin']) && $hyadmin){
            return $this->db->query('DELETE FROM ' . $this->session_table . ' WHERE hyadmin = "'.$hyadmin.'"');
        }else{
            return false;
        }
    }
	
	//自己退出登录时清除数据
    function logout(){
        $GLOBALS['_SESSION'] = array();
        setcookie($this->session_name, $this->session_id, 1, $this->session_cookie_path, $this->session_cookie_domain, $this->session_cookie_secure);
        $this->db->query('DELETE FROM ' . $this->session_data_table . " WHERE sesskey = '" . $this->session_id . "' LIMIT 1");
        return $this->db->query('DELETE FROM ' . $this->session_table . " WHERE sesskey = '" . $this->session_id . "' LIMIT 1");
    }
	
	//获取sessionid
    function get_session_id(){
        return $this->session_id;
    }
	
	//获取在线人数（包括会员登录的和未登录的）
    function get_users_count(){
        return $this->db->getOne('SELECT count(*) FROM ' . $this->session_table);
    }
}

?>