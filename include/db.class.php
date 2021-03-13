<?php
if(!defined('IN_MO')){
	exit('Access Denied');
}

class db{

	public $link_id=NULL;      //数据库连接标识符
	protected $sets = array(); //配置数组
	public $ti=0;
	public $ti_str='';

	/**
	 *构造函数
	 */
	public function __construct($host='',$user='',$pwd='',$database='',$charset='utf8',$pconnect=0){
		$this->sets = array(
		'dbhost'=> $host,
		'dbuser'=> $user,
		'dbpwd'=> $pwd,
		'dbname'=> $database,
		'charset'=> $charset,
		'pconnect' => $pconnect
		);
	}

	/**
	 * 连接数据库
	 * @access public
	 * @param string - $host MYSQL主机
	 * @param string - $user MYSQL用户名
	 * @param string - $pwd  MYSQL用户密码
	 * @param string - $database MYSQL数据库名
	 * @param string - $charset 数据库使用的字符集
	 * @param boolean - $pconnect = false 是否开启之久性连接
	 */
	public function connect($host='',$user='',$pwd='',$name='',$charset='utf8',$pconnect=0){
		if(!$pconnect){
			$this->link_id = mysqli_connect($host,$user,$pwd) or $this->err();
		}else{
			$this->link_id = mysqli_pconnect($host,$user,$pwd,true) or $this->err();
		}
		$this->selectdb($name);
		$this->setcharset($charset);
	}

	/**
	 * 执行SQL语句返回记录资源id
	 * @access public
	 * @param  string - $sql SQL语句
	 * @returm resource 记录资源id
	 */
	public function query($sql){
        if ($this->link_id=== NULL)
        {
            $this->connect($this->sets['dbhost'], $this->sets['dbuser'], $this->sets['dbpwd'], $this->sets['dbname'], $this->sets['charset'], $this->sets['pconnect']);
            $this->sets = array();
        }
		$result = mysqli_query($this->link_id,$sql) or $this->err($sql);
		$this->ti++;
		$this->ti_str.=$sql.'<br/>';
		return $result;
	}

	/**
	 * 执行SQL语句，不返回任何信息 如使用 INSET UPDATE 等
	 * @access public
	 * @param  string - $sql SQL语句
	 */
	public function execute($sql){
        if ($this->link_id=== NULL)
        {
            $this->connect($this->sets['dbhost'], $this->sets['dbuser'], $this->sets['dbpwd'], $this->sets['dbname'], $this->sets['charset'], $this->sets['pconnect']);
            $this->sets = array();
        }
		mysqli_query($this->link_id,$sql) or $this->err($sql);
		$this->ti++;
		$this->ti_str.=$sql.'<br/>';
	}

	/**
	 * 从资源标识符里得到一条记录的数组
	 * @access public
	 * @param resource - $result 数据库结果集
	 * @param string - $type=MYSQLI_ASSOC 返回类型 MYSQLI_ASSOC MYSQLI_NUM 等
	 * @return array
	 */
	public function getrow($result,$type = MYSQLI_ASSOC){
		$row = mysqli_fetch_array($result,$type);
		return $row;
	}

	/**
	 * 从资源标识符里得到多条记录的数组
	 * @access public
	 * @param resource - $result 数据库结果集
	 * @param string - $type=MYSQLI_ASSOC 返回类型 MYSQLI_ASSOC 等
	 * @return array
	 */
	public function getrows($result,$type = MYSQLI_ASSOC){
		$rows = array();
		while($row = $this->getrow($result,$type)){
			$rows[] = $row;
		}
		return $rows;
	}

	/**
	 * 执行sql语句得到单条记录集的数组
	 * @access public
	 * @param string - $sql SQL语句
	 * @param string - $type=MYSQLI_ASSOC 返回类型 MYSQLI_ASSOC MYSQLI_NUM 等
	 * @return array
	 */
	public function getrs($sql,$type=MYSQLI_ASSOC){
		$row = array();
		$result = $this->query($sql);
		$row = mysqli_fetch_array($result,$type);
		$this->freeresult($result);
		return $row;
	}

	/**
	 * 执行sql语句得到多条记录集的数组
	 * @access public
	 * @param string - $sql SQL语句
	 * @param string - $key 默认为空，如有值的话代表得到由那个字段的值作为主键
	 * @param string - $type=MYSQLI_ASSOC 返回类型 MYSQLI_ASSOC MYSQLI_NUM 等
	 * @return array
	 */
	public function getrss($sql,$key='',$type=MYSQLI_ASSOC){
		$rows = array();
		$result = $this->query($sql);
		while($row = mysqli_fetch_array($result,$type)){
			if ($key!=''){
				$rows[$row[$key]] = $row;
			}else{
				$rows[] = $row;
			}
		}
		$this->freeresult($result);
		return $rows;
	}

	/*
	 *往表里插入field_values一条记录，当插入记录的主键跟现有的主键重复的，就用$update_values修改记录
	 *一般用有相应记录就修改，没有的话就插入记录
	 */
   function autoreplace($table, $field_values, $update_values){
   		//得到表结构放入数组里
        $field_descs = $this->getrss('DESC ' . $table);
        $primary_keys = array();
		//得到所有字段放入$field_names,和主键字段放入$primary_keys
        foreach ($field_descs AS $value){
            $field_names[] = $value['Field'];
            if ($value['Key'] == 'PRI'){
                $primary_keys[] = $value['Field'];
            }
        }
		//循环得到插入的字段名放入$fields,值放入$values
        $fields = $values = array();
        foreach ($field_names AS $value){
            if (array_key_exists($value, $field_values) == true){
                $fields[] = $value;
                $values[] = "'" . $field_values[$value] . "'";
            }
        }
		//得到由要更新的字段组合成的sql语句
        $sets = array();
        foreach ($update_values AS $key => $value){
            if (array_key_exists($key, $field_values) == true){
                if (is_int($value) || is_float($value)){
                    $sets[] = $key . ' = ' . $key . ' + ' . $value;
                }else{
                    $sets[] = $key . " = '" . $value . "'";
                }
            }
        }
        $sql = '';
		if (!empty($fields)){
			$sql = 'INSERT INTO ' . $table . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
			//如果有主键字段同时更新数组不为空
			if (!empty($primary_keys)&&!empty($sets)){
				$sql .=  'ON DUPLICATE KEY UPDATE ' . implode(', ', $sets);
			}
		}
        if ($sql){
            return $this->query($sql);
        }else{
            return false;
        }
    }

	/**
	 * 获取语句的单条记录的某个字段的值
	 * @access public
	 * @param string - $sql 语句
	 * @return integer
	 */
	public function getvalue($sql){
		$row= $this->getrs($sql,MYSQLI_NUM);
		return $row[0];
	}

	/*
	 * 获取结果集中的行数
	 * @param resource - $result 数据库结果集
	 * @return integer
	 */
	public function getrowsnum($result){
		return mysqli_num_rows($result);
	}

	/**
	 * 返回先前操作所影响的行数
	 */
	public function getaffnum(){
		return mysqli_affected_rows($this->link_id);
	}

	/**
	 * 返回刚刚插入记录的id
	 */
    public function insert_id(){
        return mysqli_insert_id($this->link_id);
    }

	/**
	 * 返回MYSQL数据库版本
	 */
	public function getversion(){
		return mysql_get_client_info();
	}

	/**
	 * 设置数据库字符集
	 * @access public
	 * @param  string - $charset	数据库编码 如 utf8
	 */
	public function setcharset($charset){
		$this->execute("SET NAMES '{$charset}'");
	}

    /**
	 * 选择数据库
	 * @access public
	 * @param  string - $database 数据库
	 */
	public function selectdb($database){
		mysqli_select_db($this->link_id,$database);
	}

	/**
	 * 释放资源
	 * @access public
	 * @param resource - $result 数据库结果集
	 */
	public function freeresult($result){
		mysqli_free_result($result);
	}

	/**
	 * 关闭数据库连接
	 * @access public
	 * @param resource - $link 数据库连接资源
	 */
	public function close(){
		mysqli_close($this->link_id);
		$this->link_id=NULL;
	}

	/**
	 * 显示错误信息
	 * @access protected
	 * $param  string - $sql 出错的SQL语句
	 */
	protected function err($sql = null){
		if ($GLOBALS['error_tip']){
			echo '<div style="color:#ff0000;font:12px;">出错啦！';
			echo '<br>错误信息：' . $this->getError();
			echo '<br>错误编号：' . $this->getErrno();
			if($sql){
				echo '<br>SQL语句：' . $sql;
			}
			echo '<br><div><hr style="border:1px solid #f69;">';
		}else{
			echo('Mysql Error!');
		}
		exit();
	}

	/**
	 * 返回错误信息
	 * @access protected
	 * @return string
	 */
	protected function geterror(){
		return mysqli_error($this->link_id);
	}

	/**
	 * 返回错误的编号
	 * @access protected
	 * @return string
	 */
	protected function geterrno(){
		return mysqli_errno($this->link_id);
	}
}
?>