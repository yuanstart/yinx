<?php
/**
 * 公共函数库(获取数据数组)
 * ============================================================================
 *
 */

if(!defined('IN_MO')){
	exit('Access Denied');
}


/**
 * 获取资料数据的数组(一条记录或一个字段的数据),没有缓存
 *
 * @parame  $table     表名
 * @parame  $id        记录的id
 * @parame  $field     字段名，字段名为空时就是获取整条记录的数组，不为空时就是获取单个字段名的值
 */
function getzlrs($table,$id,$field=''){
	$arr=array();
	if ($id>0){
		$sql='select * from '.table($table).' where pass=1 and id='.$id.'';
		$arr=$GLOBALS['db']->getrs($sql);
	}
	if ($arr&&$field){
		return $arr[$field];
	}else{
		return $arr;
	}
}
function getidlm($table,$id_lm,$field=''){
	$arr=array();
	if ($id_lm>0){
		$sql='select * from '.table($table).' where pass=1 and id_lm='.$id_lm.'';
		$arr=$GLOBALS['db']->getrs($sql);
	}
	if ($arr&&$field){
		return $arr[$field];
	}else{
		return $arr;
	}
}
/**
 * @param print_r 函数封装
 */
function p($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

/**
 * @param var_dump 函数封装
 */
function v($var) {
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}
/**
 * 查询一条数据
 * @param  $sql 需要执行的SQL
 * @return 执行SQL语句的一条数据
 */
function getRow ($sql){
	$res = mysql_query($sql);
	$one_data = mysql_fetch_assoc($res);
	return $one_data;
}

/**
 * 查询单一结果 sum , avg , max , min , count
 * @param  $sql 需要执行的SQL
 * @return 执行SQL语句的一条数据
 */
function getOne ($sql){
	$res = mysql_query($sql);
	$one_data = mysql_fetch_row($res);
	return $one_data;
}

/**
 * 查询所有数据
 * @param  $sql 需要执行的SQL
 * @return 执行SQL语句后的数据(二维数组)
 */
function getAll ($sql){
	$res = mysql_query($sql);
	$data = array();
	while($one_data = mysql_fetch_assoc($res)){
		$data[] = $one_data;
	}
	return $data;
}

/**
 * 获取信息数据的数组(多条记录),没有缓存
 *
 * @parame  $table     表名
 * @parame  $lm        分类id
 * @parame  $ty        true获取当前分类以及所有下级的信息、false获取当前分类的信息
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $field     附加字段，除了默认字段外的需要加入哪些字段
 * @parame  $where     查询条件
 */
function getzlrss($table,$lm=0,$ty=true,$limit=0,$field='',$where=''){
	$sq='';
	if ($ty==true){
		if ($lm>0){
			$sq=' and locate(",'.$lm.',",list_lm)>0';
		}else{
			$sq='';
		}
	}else{
		$sq=' and lm='.$lm.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$field='id,lm,title'.$GLOBALS['cong']['lang'].',apname,link_url,f_body'.$GLOBALS['cong']['lang'].',img_sl,wtime'.$field;
	$sql='select '.$field.' from '.table($table).' where pass=1 '.$sq.' '.$where.' order by ding desc,px desc,id asc'.$limit;
	return $GLOBALS['db']->getrss($sql);
}

/**
 * 获取信息数据的数组(多条记录),没有缓存
 *
 * @parame  $table     表名
 * @parame  $lm        分类id
 * @parame  $ty        true获取当前分类以及所有下级的信息、false获取当前分类的信息
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $field     附加字段，除了默认字段外的需要加入哪些字段
 * @parame  $where     查询条件
 */
function getzlrssd($table,$lm=0,$ty=true,$limit=0,$field='',$where=''){
	$sq='';
	if ($ty==true){
		if ($lm>0){
			$sq=' and locate(",'.$lm.',",list_lm)>0';
		}else{
			$sq='';
		}
	}else{
		$sq=' and lm='.$lm.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$field='id,lm,title'.$GLOBALS['cong']['lang'].',apname,link_url,f_body'.$GLOBALS['cong']['lang'].',img_sl,wtime'.$field;
	$sql='select '.$field.' from '.table($table).' where pass=1 '.$sq.' '.$where.' order by ding desc,px desc,id asc'.$limit;
	echo $sql;die;
	return $GLOBALS['db']->getrss($sql);
}

/**
 * 获取信息数据的数组(多条记录，视频),没有缓存
 *
 * @parame  $table     表名
 * @parame  $lm        分类id
 * @parame  $ty        true获取当前分类以及所有下级的信息、false获取当前分类的信息
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $field     附加字段，除了默认字段外的需要加入哪些字段
 * @parame  $where     查询条件
 */
function getvids($table,$lm=0,$ty=true,$limit=0,$field='',$where=''){
	$sq='';
	if ($ty==true){
		if ($lm>0){
			$sq=' and locate(",'.$lm.',",list_lm)>0';
		}else{
			$sq='';
		}
	}else{
		$sq=' and lm='.$lm.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$field='id,lm,title'.$GLOBALS['cong']['lang'].',apname,link_url,f_body'.$GLOBALS['cong']['lang'].',img_sl,vid_sl,wtime'.$field;
	$sql='select '.$field.' from '.table($table).' where pass=1 '.$sq.' '.$where.' order by ding desc,px desc,id asc'.$limit;
	return $GLOBALS['db']->getrss($sql);
}

/**
 * 获取分类数据的数组(一条记录或一个字段的数据),没有缓存
 *
 * @parame  $table     表名
 * @parame  $id        记录的id
 * @parame  $field     字段名，字段名为空时就是获取整条记录的数组，不为空时就是获取单个字段名的值
 */
function getlmrs($table,$id,$field=''){
	$arr=array();
	if ($id>0){
		if (!$arr){
			$sql='select * from '.table($table).' where pass=1 and id_lm='.$id.'';
			$arr=$GLOBALS['db']->getrs($sql);
		}
	}
	if ($arr&&$field){
		return $arr[$field];
	}else{
		return $arr;
	}
}

/**
 * 获取分类数据的数组(多条记录),没有缓存
 *
 * @parame  $table     表名
 * @parame  $fid       父类id
 * @parame  $ty        true获取所有下级、false只获取下一级
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $field     附加字段，除了默认字段外的需要加入哪些字段
 * @parame  $where     查询条件
 */
function getlmrss($table,$fid=0,$ty=true,$limit=0,$field='',$where=''){
	$sq='';
	if ($ty==true){
		if ($fid>0){
			$sq=' and locate(",'.$fid.',",list_lm)>0';
		}else{
			$sq='';
		}
	}else{
		$sq=' and fid='.$fid.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$field='id_lm,title_lm'.$GLOBALS['cong']['lang'].',apname_lm,url_lm,z_body_lm'.$GLOBALS['cong']['lang'].',f_body_lm'.$GLOBALS['cong']['lang'].',img_sl_lm,wtime'.$field;
	$sql='select '.$field.' from '.table($table).' where pass=1 '.$sq.' '.$where.' order by px desc,id_lm asc'.$limit;
	return $GLOBALS['db']->getrss($sql);
}

/**
 * 获取信息数据的数组(一条记录或一个字段的数据),没有缓存
 *
 * @parame  $table     表名
 * @parame  $id        记录的id
 * @parame  $field     字段名，字段名为空时就是获取整条记录的数组，不为空时就是获取单个字段名的值
 */
function getcors($table,$id,$field=''){
	$arr=array();
	if ($id>0){
		if (!$arr){
			$sql='select * from '.table($table).' where pass=1 and id='.$id.'';
			$arr=$GLOBALS['db']->getrs($sql);
		}
	}
	if ($arr&&$field){
		return $arr[$field];
	}else{
		return $arr;
	}
}

/**
 * 获取信息数据的数组(多条记录),没有缓存
 *
 * @parame  $table     表名
 * @parame  $lm        分类id
 * @parame  $ty        true获取当前分类以及所有下级的信息、false获取当前分类的信息
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $field     附加字段，除了默认字段外的需要加入哪些字段
 * @parame  $where     查询条件
 */
function getcorss($table,$lm=0,$ty=true,$limit=0,$field='',$where=''){
	$sq='';
	if ($ty==true){
		if ($lm>0){
			$sq=' and locate(",'.$lm.',",list_lm)>0';
		}else{
			$sq='';
		}
	}else{
		$sq=' and lm='.$lm.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$field='id,lm,title'.$GLOBALS['cong']['lang'].',apname,link_url,f_body'.$GLOBALS['cong']['lang'].',z_body,img_sl,wtime'.$field;
	$sql='select '.$field.' from '.table($table).' where pass=1 '.$sq.' '.$where.' order by ding desc,px desc,id desc'.$limit;
	return $GLOBALS['db']->getrss($sql);
}

/**
 * 获取相关信息数组(id为键值)
 *
 * @parame  $table1    信息表 例如：tol_co
 * @parame  $lm        当$table1为空时是批量的信息id，当$table1不为空时是$table1分类id_lm
 * @parame  $sy_id     系统id
 * @parame  $table2    相关信息表 例如：pl_info
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $where     查询条件
 */
function getplrss($table1='',$lm=0,$table2,$sy_id=0,$limit=0,$where=''){
	if ($lm>0){
		if ($table1!=''){
			$sq=' and pl_id in (select id from '.table($table1).' where lm='.$lm.' and pass=1)';
		}else{
			$sq=' and pl_id='.$lm.'';
		}
	}else{
		$sq='';
	}
	if ($sy_id>0){
		$sq.=' and sy_id='.$sy_id.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$sql='select * from '.table($table2).' where pass=1 '.$sq.' '.$where.' order by px desc,id asc'.$limit;
	return $GLOBALS['db']->getrss($sql);
}

/**
 * 更换键值的字段，例如：原来是空的，换成id
 *
 * @parame  $arr       要更换键值的数组
 * @parame  $key       要改为的键值字段名称，当id,id_lm为键值的话设为二维数组，其他的设为三维数组
 */
function trarss($arr,$key){
	$rows=array();
	foreach($arr as $v){
		if($key=='id'||$key=='id_lm'){
			$rows[$v[$key]]=$v;
		}else{

			$rows[$v[$key]][]=$v;
		}
	}
	return $rows;
}

/**
 * 获取资料列表数组(资料id为键值),内存缓存
 *
 * @parame  $table     表名
 * @parame  $lm        分类id
 * @parame  $ty        true获取当前分类以及所有下级的信息、false获取当前分类的信息
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $where     查询条件
 */
function getzlrow($table,$lm=0,$ty=true,$limit=0,$where=''){
	$key=base64_encode($table.','.$lm.','.$ty.','.$limit.','.$where);
	static $result=array();
	if (isset($result[$key])){
		return $result[$key];
	}
	if ($lm>0){
		if ($ty==true){
			$sq=' and locate(",'.$lm.',",list_lm)>0';
		}else{
			$sq=' and lm='.$lm.'';
		}
	}else{
		$sq='';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$sql='select * from '.table($table).' where pass=1 '.$sq.' '.$where.' order by ding desc,px desc,id asc'.$limit;
	$result[$key]=$GLOBALS['db']->getrss($sql,'id');
	//echo '执行';
	return $result[$key];
}

/**
 * 获取分类列表数组(分类id为键值),内存缓存
 *
 * @parame  $table     表名
 * @parame  $fid       父类id
 * @parame  $ty        true获取所有下级、false只获取下一级
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $where     查询条件
 */
function getlmrow($table,$fid=0,$ty=true,$limit=0,$where=''){
	$key=base64_encode($table.','.$fid.','.$ty.','.$limit.','.$where);
	static $result=array();
	if (isset($result[$key])){
		return $result[$key];
	}
	if ($ty==true){
		if ($fid>0){
			$sq=' and locate(",'.$fid.',",list_lm)>0';
		}else{
			$sq='';
		}
	}else{
		$sq=' and fid='.$fid.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$sql='select * from '.table($table).' where 1=1 '.$sq.' '.$where.' and pass=1 order by px desc,id_lm asc'.$limit;
	$result[$key]=$GLOBALS['db']->getrss($sql,'id_lm');
	//echo '执行';
	return $result[$key];
}

/**
 * 获取相关信息数组(id为键值),内存缓存
 *
 * @parame  $table1    信息表 例如：tol_co
 * @parame  $lm        当$table1为空时是批量的信息id，当$table1不为空时是$table1分类id_lm
 * @parame  $sy_id     系统id
 * @parame  $table2    相关信息表 例如：pl_info
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $where     查询条件
 */
function getplrow($table1='',$lm=0,$table2,$sy_id=0,$limit=0,$where=''){
	$key=base64_encode($table1.','.$lm.','.$table2.','.$sy_id.','.$limit.','.$where);
	static $result=array();
	if (isset($result[$key])){
		return $result[$key];
	}
	if ($lm>0){
		if ($table1!=''){
			$sq=' and pl_id in (select id from '.table($table1).' where lm='.$lm.' and pass=1)';
		}else{
			$sq=' and pl_id='.$lm.'';
		}
	}else{
		$sq='';
	}
	if ($sy_id>0){
		$sq.=' and sy_id='.$sy_id.'';
	}
	$limit=($limit>0)?' limit '.$limit:'';
	$sql='select * from '.table($table2).' where pass=1 '.$sq.' '.$where.' order by px desc,id asc'.$limit;
	$result[$key]=$GLOBALS['db']->getrss($sql,'id');
	return $result[$key];
}

/**
 * 获取分类列表数组(分类级别为键值),内存缓存
 *
 * @parame  $table     表名
 * @parame  $fid       父类id
 * @parame  $ty        true获取所有下级、false只获取下一级
 * @parame  $limit     获取多少条记录，为0时获取所有记录
 * @parame  $where     查询条件
 */
function getlmarr($table,$fid=0,$ty=true,$limit=0,$where=''){
	$key=base64_encode($table.','.$fid.','.$ty.','.$limit.','.$where);
	static $result=array();
	if (isset($result[$key])){
		return $result[$key];
	}
	$lmrow=getlmrow($table,$fid,$ty,$limit,$where);
	$temparr=array();
	if (!empty($lmrow)){
		$level=0;
		if ($fid>0){
			$level=$lmrow[$fid]['level_lm'];
		}
		foreach($lmrow as $k=>$v){
			$temparr[($v['level_lm']-$level)][$v['fid']][] = $v;
		}
		$result[$key]=$temparr;
	}
	return $temparr;
}

/**
 * 更新访问量
 *
 * @parame  $table     表名
 * @parame  $id        信息id
 */
function setread($table,$id){
	if ($table&&$id){
		$GLOBALS['db']->execute('update '.table($table).' set read_num=read_num+1 where id='.$id.'');
	}
}

/**
 * 记录好浏览历史记录
 *
 * @parame  $obj       cookies名，内容是以","隔开的id的字符串,例如：1,2,4
 * @parame  $id        信息id
 */
function setvisit($obj,$id){
	if ($obj){
		$obj=$obj.'_visit';
		if(!empty($_COOKIE[$obj])){
			$arr=explode(',',$_COOKIE[$obj]);
			if(in_array($id,$arr)){
				foreach($arr as $k=>$v){
					if ($arr[$k]==$id){
						unset($arr[$k]);
					}
				}
			}
			setcookie($obj,$id.(($arr)?','.implode(',',$arr):''),(time()+(60*60*24*30)));
		}else{
			setcookie($obj,$id,(time()+(60*60*24*30)));
		}
	}
}

/**
 * 获取浏览历史记录
 *
 * @parame  $obj       cookies名，内容是以","隔开的id的字符串,例如：1,2,4
 * @parame  $num       数量，0为所有，大于0为实际数量
 */
function getvisit($obj,$num=0){
	if ($obj){
		$obj=$obj.'_visit';
		if(!empty($_COOKIE[$obj])){
			$arr=explode(',',$_COOKIE[$obj]);
			if ($num>0){
				return implode(',',array_slice($arr,0,$num));
			}else{
				return $_COOKIE[$obj];
			}
		}
	}
}

/**
 * 记录看了这个产品同时还看了其他产品
 *
 * @parame  $obj       代表两个意思，cookies名和统计表中类型标志
 * @parame  $id        信息id
 */
function setreal($obj,$id){
	if ($obj){
		if (!empty($_COOKIE[$obj])&&$_COOKIE[$obj]!=$id){
			$rs=$GLOBALS['db']->getrs('select * from '.table('real_co').' where tab="'.$obj.'" and sid='.$_COOKIE[$obj].' and did='.$id.'');
			if ($rs){
				$GLOBALS['db']->execute('update '.table('real_co').' set num=num+1 where tab="'.$obj.'" and sid='.$_COOKIE[$obj].' and did='.$id.'');
			}else{
				$GLOBALS['db']->execute('insert into '.table('real_co').' (tab,sid,did,num)values("'.$obj.'",'.$_COOKIE[$obj].','.$id.',1)');
			}
			setcookie($obj,$id,(time()+(60*60*24*30)));
		}else{
			setcookie($obj,$id,(time()+(60*60*24*30)));
		}
	}
}

/**
 * 显示seo信息
 *
 * @parame  $sy_id  系统的id
 * @parame  $aparr  外部自定义的seo
 */
function showseo($sy_id='',$aparr=''){
	$zlarr=(!empty($GLOBALS['zlarr']))?$GLOBALS['zlarr']:'';//单页数组有没有
	$swarr=(!empty($GLOBALS['swarr']))?$GLOBALS['swarr']:'';//详细页数组有没有
	$ltarr=(!empty($GLOBALS['ltarr']))?$GLOBALS['ltarr']:'';//列表页数组有没有
	$cong=(!empty($GLOBALS['cong']))?$GLOBALS['cong']:'';
	$rs=array();
	$title='';
	$k=false;
	$show_html='';
	$ym_tit='';$ym_key='';$ym_des='';
	//有外部seo，并且是数组
	if (!empty($aparr)&&is_array($aparr)){
		if (!empty($aparr['ym_tit'])){
			$ym_tit=$aparr['ym_tit'];
		}
		if (!empty($aparr['ym_key'])){
			$ym_key=$aparr['ym_key'];
		}
		if (!empty($aparr['ym_des'])){
			$ym_des=$aparr['ym_des'];
		}
	//没有外部seo，按逻辑来
	}else{
		//单页
		if($zlarr!=''){
			$rs=$zlarr;
			//获取单页信息标题
			if (!empty($zlarr['title'.$cong['lang']])){
				$title=$zlarr['title'.$cong['lang']];
			}
			//获取单页分类标题
			if (!empty($zlarr['title_lm'.$cong['lang']])){
				$title=$zlarr['title_lm'.$cong['lang']];
			}
		//详细页
		}elseif($swarr!=''){
			$rs=$swarr;
			if (!empty($swarr['title'.$cong['lang']])){
				$title=$swarr['title'.$cong['lang']];
			}
			if (!empty($swarr['title_lm'.$cong['lang']])){
				$title=$swarr['title_lm'.$cong['lang']];
			}
		//列表页
		}elseif($ltarr!=''){
			$rs=$ltarr;
			if (!empty($ltarr['title'.$cong['lang']])){
				$title=$ltarr['title'.$cong['lang']];
			}
			if (!empty($ltarr['title_lm'.$cong['lang']])){
				$title=$ltarr['title_lm'.$cong['lang']];
			}
			//如果列表页的rs为空就读取本系统seo
			if($ltarr['ym_tit'.$cong['lang']]==''&&checknum($sy_id)){
				$rs=load_config($sy_id);
			}
		//其他页面
		}else{
			//读取本系统seo
			if(checknum($sy_id)){
				$rs=load_config($sy_id);
			}
		}
		//如果上面的为空就读取全局seo
		if(empty($rs)||($rs&&$rs['ym_tit'.$cong['lang']]=='')){
			$rs=$cong;
			$k=true;
		}
		if ($rs){
			$ym_tit=$rs['ym_tit'.$cong['lang']];
			$ym_key=$rs['ym_key'.$cong['lang']];
			$ym_des=$rs['ym_des'.$cong['lang']];
			//外部传入的字符串
			if (!empty($aparr)){
				$ym_tit=$aparr.(($ym_tit!='')?'--':'').$ym_tit;
			//如果调用全局的seo，那么就用 单页、详细页、列表页的“信息标题”+全局的标题
			}elseif (!empty($title)&&$k==true){
				$ym_tit=$title.(($ym_tit!='')?'--':'').$ym_tit;
			}
		}
	}

	$show_html .= '<title>'.$ym_tit.'</title>'."\n";
	$show_html .= '<meta name="keywords" content="'.$ym_key.'"/>'."\n";
	$show_html .= '<meta name="description" content="'.$ym_des.'"/>'."\n";
	echo $show_html;
}

/**
 * 获取面包屑
 * @parame  $lm        当前分类
 * @parame  $pname     链接的页面名称
 * @parame  $tag       面包屑隔开的标志
 * @parame  $lmrow     分类id为键值分类列表数组
 */
function getdao($lm,$pname,$tag=' &gt; ',$lmrow=array()){
	$dao='';
	//如果没有传入$lmrow,就调用外部的分类列表
	if (empty($lmrow)&&!empty($GLOBALS['lmrow'])){
		$lmrow=$GLOBALS['lmrow'];
	}
	//如果外部有设置$fid，就调用外部的$fid，否则$fid=0
	if (isset($GLOBALS['fid'])){
		$fid=$GLOBALS['fid'];
	}else{
		$fid=0;
	}
	if (!empty($lm)&&!empty($lmrow)){
		$list_lm=$lmrow[$lm]['list_lm'];
		$list_lm=substr($list_lm,1,(strlen($list_lm)-2));
		$arr=explode(',',$list_lm);
		$start=0;
		foreach($arr as $k=>$v){
			if ($fid>0){
				//记住开始位置
				if ($fid==$v){
					$start=$k;
				}
				//当当前位置大于开始位置，就开始输出导航
				if($k>$start){
					$dao.=$tag.'<a href="'.$pname.'?lm='.$lmrow[$v]['id_lm'].'">'.$lmrow[$v]['title_lm'.$GLOBALS['cong']['lang']].'</a>';
				}
			}else{
				$dao.=$tag.'<a href="'.$pname.'?lm='.$lmrow[$v]['id_lm'].'">'.$lmrow[$v]['title_lm'.$GLOBALS['cong']['lang']].'</a>';
			}
		}
	}
	return $dao;
}

/**
 * 获取左侧第1个分类下第几级分类
 *
 * @parame  $ty        第几级分类，$ty=0时最后一级，$ty=1时为一级
 * @parame  $lmarr     以级别为键值的分类数组
 */
function getflm($ty=0,$lmarr=array()){
	//如果没有传入$lmarr,就调用外部的分类列表
	if (empty($lmarr)&&!empty($GLOBALS['lmarr'])){
		$lmarr=$GLOBALS['lmarr'];
	}
	//如果外部有设置$fid，就调用外部的$fid，否则$fid=0
	if (isset($GLOBALS['fid'])){
		$fid=$GLOBALS['fid'];
	}else{
		$fid=0;
	}
	$flmstr=getflmstr($lmarr,0,$fid,$ty);
	if ($flmstr!=''){
		return substr(strrchr($flmstr,','),1);
	}
}

/**
 * 递归循环得到以","隔开的每级分类的第1个分类列表
 *
 * @parame  $arr       以级别为键值的分类数组
 * @parame  $i         第几级分类
 * @parame  $id_lm     父类
 * @parame  $ty        第几级分类，$ty=0时最后一级，$ty=1时为一级
 */
function getflmstr($arr,$i,$id_lm,$ty){
	$i=$i+1;
	static $flmstr='';
	if($ty>0){
		if (isset($arr[$i][$id_lm])&&$i<=$ty){
			$flmstr.=','.$arr[$i][$id_lm][0]['id_lm'];
			getflmstr($arr,$i,$arr[$i][$id_lm][0]['id_lm'],$ty);
		}
	}else{
		if (isset($arr[$i][$id_lm])){
			$flmstr.=','.$arr[$i][$id_lm][0]['id_lm'];
			getflmstr($arr,$i,$arr[$i][$id_lm][0]['id_lm'],$ty);
		}
	}
	return $flmstr;
}

/**
 * 详细内容分页
 *
 * @parame  $z_body    详细内容
 * @parame  $mark      分页符，为空时用后台编辑器的分页符
 */
function showbody($z_body,$mark=''){
	//分页标志
	$mark=($mark!='')?$mark:'<hr style="page-break-after:always;" class="ke-pagebreak" />';
	if (strpos($z_body,$mark)==false){
		$str=$z_body;
    }else{
		$arr=explode($mark,$z_body);
		$str ='<div class="showbody">'."\n";
			foreach($arr as $k=>$v){
			$str.='<div class="pagecon" '.($k!=0?'style="display:none;"':'').'>'.$v.'</div>'."\n";
			}
			$str.='<ul class="pagetit">'."\n";
			foreach($arr as $k=>$v){
				$str.='<li '.($k==0?'class="cur"':'').'><a>'.($k+1).'</a></li>'."\n";
			}
			$str.='</ul>'."\n";
		$str.='</div>'."\n";
		$str.='<script>
				$(".pagetit li").click(function(){
					$(this).siblings().removeClass("cur");
					$(this).addClass("cur");
					$(this).parent().siblings(".pagecon").css("display","none");
					$(this).parent().siblings(".pagecon").eq($(this).index()).css("display","");
				})
			   </script>'."\n";
	}
	echo $str;
}

/**
 * 传入客服信息得到html
 *
 * @parame  $v       单条客户信息的数组
 * @parame  $t       类型，电脑网站为pc，手机网站为wap
 * @parame  $q       语言，中英文相同客服$q='x',中英文不同客服$q='b'
 */
function listkf($v,$t='pc',$q='x'){
	$html='';
	static $a=1;
	$conf=load_config(16);//从缓存读取客服系统配置信息
	$lang=($q=='x')?$GLOBALS['cong']['lang']:'';
	//电脑版
	if ($t=='pc'){
		//QQ
		if ($v['lx']==1){
			$turl='http://wpa.qq.com/msgrd?v=3&uin='.$v['title'].'&site=qq&menu=yes';
			if($conf['sy']['tb_size']=='d'){
				$tsrc=($conf['sy']['tb_type']=='web')?'http://wpa.qq.com/pa?p=2:'.$v['title'].':51':'demo/images/qq_d.png';
			}elseif($conf['sy']['tb_size']=='x'){
				$tsrc=($conf['sy']['tb_type']=='web')?'http://wpa.qq.com/pa?p=2:'.$v['title'].':52':'demo/images/qq.png';
			}
			$title=($conf['sy']['rename_show']==true)?(($v['rename'.$lang]!='')?'<span>'.$v['rename'.$lang].'</span>':''):'';
			$html='<li class="qq'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img border="0" src="'.$tsrc.'" />'.$title.'</a></li>'."\n";
		//msn
		}elseif ($v['lx']==2){
			$turl='msnim:chat?contact='.$v['title'].'';
			if($conf['sy']['tb_size']=='d'){
				$tsrc='demo/images/msn_d.png';
			}elseif($conf['sy']['tb_size']=='x'){
				$tsrc='demo/images/msn.png';
			}
			$title=($conf['sy']['rename_show']==true)?(($v['rename'.$lang]!='')?'<span>'.$v['rename'.$lang].'</span>':''):'';
			$html='<li class="msn'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img border="0" src="'.$tsrc.'" />'.$title.'</a></li>'."\n";
		//skype
		}elseif ($v['lx']==3){
			$turl='skype:'.$v['title'].'?call';
			if($conf['sy']['tb_size']=='d'){
				$tsrc='demo/images/skype_d.png';
			}elseif($conf['sy']['tb_size']=='x'){
				$tsrc='demo/images/skype.png';
			}
			$title=($conf['sy']['rename_show']==true)?(($v['rename'.$lang]!='')?'<span>'.$v['rename'.$lang].'</span>':''):'';
			$html='<li class="skype'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img border="0" src="'.$tsrc.'" />'.$title.'</a></li>'."\n";
		//淘宝旺旺
		}elseif ($v['lx']==4){
			$turl='http://www.taobao.com/webww/ww.php?ver=3&touid='.$v['title'].'&siteid=cntaobao&status=2&charset=utf-8';
			if($conf['sy']['tb_size']=='d'){
				$tsrc=($conf['sy']['tb_type']=='web')?'http://amos.alicdn.com/online.aw?v=2&uid='.$v['title'].'&site=cntaobao&s=1&charset=utf-8':'demo/images/ww_d.png';
			}elseif($conf['sy']['tb_size']=='x'){
				$tsrc=($conf['sy']['tb_type']=='web')?'http://amos.alicdn.com/online.aw?v=2&uid='.$v['title'].'&site=cntaobao&s=2&charset=utf-8':'demo/images/ww.png';
			}
			$title=($conf['sy']['rename_show']==true)?(($v['rename'.$lang]!='')?'<span>'.$v['rename'.$lang].'</span>':''):'';
			$html='<li class="tbww'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img border="0" src="'.$tsrc.'" />'.$title.'</a></li>'."\n";
		//阿里旺旺(贸易通)
		}elseif ($v['lx']==5){
			$turl='http://amos.alicdn.com/msg.aw?v=2&uid='.$v['title'].'&site=cnalichn&s=11&charset=UTF-8';
			if($conf['sy']['tb_size']=='d'){
				$tsrc=($conf['sy']['tb_type']=='web')?'http://amos.alicdn.com/online.aw?v=2&uid='.$v['title'].'&site=cnalichn&s=10&charset=UTF-8':'demo/images/ww_d.png';
			}elseif($conf['sy']['tb_size']=='x'){
				$tsrc=($conf['sy']['tb_type']=='web')?'http://amos.alicdn.com/online.aw?v=2&uid='.$v['title'].'&site=cnalichn&s=11&charset=UTF-8':'demo/images/ww.png';
			}
			$title=($conf['sy']['rename_show']==true)?(($v['rename'.$lang]!='')?'<span>'.$v['rename'.$lang].'</span>':''):'';
			$html='<li class="alww'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img border="0" src="'.$tsrc.'" />'.$title.'</a></li>'."\n";
		//电话号码
		}elseif	($v['lx']==6){
			$html='<li class="phone'.($a==1?' ust':'').'"><a href="javascript:;"><img border="0" src="demo/images/tel.png" /><span>'.$v['title'].'</span></a></li>';
		}
	//手机版
	}elseif($t=='wap'){
		//QQ
		if ($v['lx']==1){
			$turl='mqqwpa://im/chat?chat_type=wpa&uin='.$v['title'].'&version=1&src_type=web&web_src=qq';
			if ($conf['sy']['tb_type']=='web'){
				$tsrc='http://wpa.qq.com/pa?p=2:'.$v['title'].':52';
			}else{
				$tsrc='demo/images/qq.png';
			}
			$title=($v['rename'.$cong['lang']]!='')?'<span>'.$v['rename'.$cong['lang']].'</span>':'';
			$html='<li class="qq'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img  border="0" src="'.$tsrc.'" /></a></li>'."\n";
		//msn
		}elseif($v['lx']==2){
			$turl='msnim:chat?contact='.$v['title'].'';
			$tsrc='demo/images/msn.png';
			$title=($v['rename'.$cong['lang']]!='')?'<span>'.$v['rename'.$cong['lang']].'</span>':'';
			$html='<li class="msn'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img  border="0" src="'.$tsrc.'" /></a></li>'."\n";
	    //skype
		}elseif($v['lx']==3){
			$turl='skype:'.$v['title'].'?call';
			$tsrc='demo/images/skype.png';
			$title=($v['rename'.$cong['lang']]!='')?'<span>'.$v['rename'.$cong['lang']].'</span>':'';
			$html='<li class="skype'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img  border="0" src="'.$tsrc.'"></a></li>'."\n";
		//淘宝旺旺
		}elseif($v['lx']==4){
			$turl='http://www.taobao.com/webww/ww.php?ver=3&touid='.$v['title'].'&siteid=cntaobao&status=2&charset=utf-8';
			if ($conf['sy']['tb_type']=='web'){
				$tsrc='http://amos.alicdn.com/online.aw?v=2&uid='.$v['title'].'&site=cntaobao&s=2&charset=utf-8';
			}else{
				$tsrc='demo/images/ww.png';
			}
			$title=($v['rename'.$cong['lang']]!='')?'<span>'.$v['rename'.$cong['lang']].'</span>':'';
			$html='<li class="tbww'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img  border="0" src="'.$tsrc.'"></a></li>'."\n";
		//阿里旺旺(贸易通)
		}elseif($v['lx']==5){
			$turl='http://amos.alicdn.com/msg.aw?v=2&uid='.$v['title'].'&site=cnalichn&s=4&charset=UTF-8';
			if ($conf['sy']['tb_type']=='web'){
				$tsrc='http://amos.alicdn.com/online.aw?v=2&uid='.$v['title'].'&site=cnalichn&s=11&charset=UTF-8';
			}else{
				$tsrc='demo/images/ww.png';
			}
			$title=($v['rename'.$cong['lang']]!='')?'<span>'.$v['rename'.$cong['lang']].'</span>':'';
			$html='<li class="alww'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'" ><img  border="0" src="'.$tsrc.'"></a></li>'."\n";
		}elseif($v['lx']==6){
			$turl='tel:'.$v['title'];
			$tsrc='demo/images/tel.png';
			$html='<li class="phone'.($a==1?' ust':'').'"><a target="_blank" href="'.$turl.'"><img  border="0" src="'.$tsrc.'"></a></li>'."\n";
		}
	}
	$a++;
	return $html;
}

/**
 * 格式化标签 例如：把空格转为&nbsp;
 *
 * @parame  $str     字符串
 */
function html($str){
	if(!is_array($str)){
		$str = str_replace('  ', '&nbsp;', $str);
		$str = str_replace('<', '&lt', $str);
		$str = str_replace('>', '&gt', $str);
		$str = str_replace("\"", '&quot;', $str);
		$str = str_replace("'", '&rsquo;', $str);
		$str = str_replace("\r\n", '<br />', $str);
		$str = str_replace("\r", '<br />', $str);
		$str = str_replace("\n", '<br />', $str);
		return $str;
	}else{
		return array_map("html",$str);
	}
}

/**
 * 还原格式化标签 例如:将实体<br>转换为\n
 *
 * @parame  $str     字符串
 */
function rehtml($str){
	if(!is_array($str)){
		$str = str_replace('<br />',"\n",$str);
		$str = str_replace('<br>',"\n",$str);
		$str = str_replace('<br/>',"\n",$str);
		$str = str_replace('&quot;', "\"", $str);
		$str = str_replace('&rsquo;', "'", $str);
		$str = str_replace('&nbsp;'," ",$str);
		$str = str_replace('&lt','<',$str);
		$str = str_replace('&gt','>',$str);
		$str = str_replace('<script>','&ltscript&gt',$str);
		$str = str_replace('</script>','&lt/script&gt',$str);
		return $str;
	}else{
		return array_map("rehtml",$str);
	}
}

/**
 * 去掉html标签
 *
 * @parame  $str     字符串
 */
function rmhtml($str){
	$str = strip_tags($str);
	$str = str_replace('&nbsp','',$str);
	$str = str_replace(' ','',$str);
	return $str;
}

/**
 * 字符串截取
 *
 * @parame  $string    要截取的字符串
 * @parame  $length    要截取的长度
 * @parame  $act       是否显示省略号
 */
function getstr($string,$length,$act=true) {
	if ($length<=0){
		return $string;
	}else{
		if (mb_strwidth($string,'UTF8')<=$length){
			return $string;
		}else{
			$i = 0;
			$len_word = 0;
			while ($len_word < $length){
				$stringtmp = substr($string, $i, 1);
				if (ord($stringtmp) >= 224) {
					$stringtmp = substr($string, $i, 3);
					$i = $i +3;
					$len_word = $len_word +2;
				}elseif (ord($stringtmp) >= 192){
					$stringtmp = substr($string, $i, 2);
					$i = $i +2;
					$len_word = $len_word +2;
				}else{
					$i = $i +1;
					$len_word = $len_word +1;
				}
				$stringlast[] = $stringtmp;
			}
			if (is_array($stringlast) && !empty ($stringlast)) {
				$stringlast = implode("", $stringlast);
				if($act){
					$stringlast .= "...";
				}
			}
			return $stringlast;
		}
	}
}

/**
 * 传入不带字母的图片地址，得到带字母的图片地址
 *
 * @parame  $str     图片地址
 * @parame  $zm      字母符号
 */
function getimgj($str,$zm){
	$strr='';
	if ($str!=''){
		$pos=strrpos($str,'/');
		$strr=substr($str,0,$pos+1).$zm.substr($str,$pos+1);
	}
	return $strr;
}

/**
 * 传入带字母的图片地址，得到带其他字母($zm为空时就是不带字母)的图片地址
 *
 * @parame  $str     图片地址
 * @parame  $zm      字母符号
 */
function getimgh($str,$zm){
	$strr='';
	if ($str!=''){
		$pos=strrpos($str,'/');
		$strr=substr($str,0,$pos+1).$zm.substr($str,$pos+2);
	}
	return $strr;
}

/**
 * 会员状态
 *
 * @parame  $zt     状态
 */
function person_z($zt){
	$arr=array('','未审核','未通过','已通过','已屏蔽');
	$str='';
	if($zt==1){
		$str='<font class="blue">'.$arr[1].'</font>';
	}elseif ($zt==2){
		$str='<font class="hui">'.$arr[2].'</font>';
	}elseif ($zt==3){
		$str='<font class="green">'.$arr[3].'</font>';
	}elseif ($zt==4){
		$str='<font class="red">'.$arr[4].'</font>';
	}
	return $str;
}

/**
 * 地址转换(用于伪静态)
 *
 * @parame  $pname     页面名称
 * @parame  $arr       参数数组
 * @parame  $apname    附加的页面名称
 * @parame  $page      当前页码
 */
function zurl($pname,$arr=array(),$apname='',$page=''){
	$pna='';
	$par='';
	$url='';
	//去掉扩展名获取页面名
	if ($pname!=''){
		$pna=substr($pname,0,strrpos($pname,'.'));
	}
	//组装参数
	$a=1;
	foreach($arr as $k=>$v){
		//普通url
		if ($GLOBALS['cong']['rewrite']==0){
			if ($a==1){
				$par.=$k.'='.$v;
			}else{
				$par.='&'.$k.'='.$v;
			}
		//伪静态
		}elseif($GLOBALS['cong']['rewrite']==1){
			if ($k=='id'||$k=='lm'){
				$par.='-'.$v;
			}else{
				$par.='-'.$k.$v;
			}
		//伪静态页面名称后台可控制
		}elseif($GLOBALS['cong']['rewrite']==2){
			if ($k=='id'||$k=='lm'){
				if ($apname!=''){
					$par.='';
				}else{
					$par.='-'.$v;
				}
			}else{
				$par.='-'.$k.$v;
			}
		}
	$a++;
	}
	//组装url
	//普通url
	if ($GLOBALS['cong']['rewrite']==0){
		if ($page!=''){
			$par.='&page='.$page;
		}
		$url.=($par!='')?$pname.'?'.$par:$pname;
	//伪静态
	}elseif($GLOBALS['cong']['rewrite']==1){
		if ($page!=''){
			$par.='_'.$page;
		}
		$url.=$pna.$par.'.html';
	//伪静态页面名称后台可控制
	}elseif($GLOBALS['cong']['rewrite']==2){
		if ($apname!=''){
			if ($pna==''){
				$par=$apname.$par;
			}else{
				$par='-'.$apname.$par;
			}
		}
		if ($page!=''){
			$par.='_'.$page;
		}
		$url.=$pna.$par.'.html';
	}
	return $url;
}

/**
 * 删除文件
 *
 * @parame  $path     文件地址
 */
function delfile($path){
	if($path!=''){
		$path=MO_ROOT.'/'.$path;
		if (is_utf8($path)){
			$path=iconv('utf-8','gb2312',$path);
		}
		if (file_exists($path)){
			unlink($path);
		}
	}
}

/**
 * 检查字母+数字-
 *
 * @parame  $pid     字符串
 */
function checkusername($pid){
	if(!is_array($pid)){
		return preg_match("/^(\w)+$/",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checkusername($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

/**
 * 检查非汉字
 *
 * @parame  $pid     字符串
 */
function checkpassword($pid){
	if (!is_array($pid)){
  		return preg_match("/^[\w~`!@#\$%\^&\\*\(\)\-\+=\[\]\{\}\|\\<,>\.\?\/]+$/",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checkpassword($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

/**
 * 检查邮箱
 *
 * @parame  $pid     邮箱
 */
function checkemail($pid){
	if (!is_array($pid)){
  		return preg_match("/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checkemail($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

/**
 * 检查数字
 *
 * @parame  $pid     数字
 */
function checknum($pid){
	if (!is_array($pid)){
  		return preg_match("/^[0-9]+$/",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checknum($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

/**
 * 检查浮点数
 *
 * @parame  $pid     浮点数
 */
function checkfloat($pid){
	if (!is_array($pid)){
  		return preg_match("/^[0-9]+(\.[0-9]{1,3})?$/",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checkfloat($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

/**
 * 检查日期
 *
 * @parame  $pid     日期
 */
function checkd($pid){
	if (!is_array($pid)){
  		return preg_match("/^[0-9]{4}(\-)[0-9]{1,2}(\-)[0-9]{1,2}$/",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checkd($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

/**
 * 检查日期时间
 *
 * @parame  $pid     日期时间
 */
function checkt($pid){
	if (!is_array($pid)){
  		return preg_match("/^[0-9]{4}(\-)[0-9]{1,2}(\-)[0-9]{1,2} [0-9]{1,2}(\:)[0-9]{1,2}(\:)[0-9]{1,2}$/",$pid);
	}else{
		$str=true;
		foreach ($pid as $v){
			if (!checkd($v)){
				$str=false;
				break;
			}
		}
		return $str;
	}
}

/**
 * 发送邮件
 *
 * @parame  $arr     发件箱设置参数、回复箱、收件箱
 */
function email($arr,$title,$body){
	require_once(MO_ROOT.'/include/phpmailer.class.php');
	$s_server   = !empty($arr['s_server'])?$arr['s_server']:'';
	$s_username = !empty($arr['s_username'])?$arr['s_username']:'';
	$s_password = !empty($arr['s_password'])?$arr['s_password']:'';
	$h_email    = !empty($arr['h_email'])?$arr['h_email']:'';
	$s_email    = !empty($arr['s_email'])?$arr['s_email']:'';
	$r_email    = !empty($arr['r_email'])?$arr['r_email']:'';
	$attach     = !empty($arr['attach'])?$arr['attach']:'';
	$mail             = new PHPMailer();
	$mail->IsSMTP();                                      //告诉类使用smtp发件
	$mail->SMTPDebug  = 0;                                //是否开启调试模式
	$mail->SMTPAuth   = true;                             //设定SMTP需要验证
	$mail->CharSet    = "utf-8";                          //设置邮件编码
	$mail->Host       = $s_server;                        //发件箱服务器
	$mail->Port       = 25;                               //发件箱端口
	$mail->Username   = $s_username;                      //发件箱账号
	$mail->Password   = $s_password;                      //发件箱密码
	if ($h_email!=''){
		$mail->AddReplyTo($h_email);                      //回复箱
	}
	if ($s_email!=''){
		$mail->SetFrom($s_email);                         //发件箱
	}
	$rows=explode('|',$r_email);
	foreach($rows as $k=>$v){
		$mail->AddAddress($v);                            //收件箱
	}
	$mail->Subject    = $title;                           //邮箱标题
	$mail->MsgHTML($body);							      //邮箱内容
	if ($attach!=''){
		$mail->AddAttachment($attach);                    //附件
	}
	if(!$mail->Send()){
		echo "发送邮件错误" . $mail->ErrorInfo;
	}
}
?>