<?php
if(!defined('IN_MO')){
	exit('Access Denied');
}
/*
此分页类适用"普通php","伪静态","生成静态","ajax"这个4中页面程序适用
有两种使用方法
1.传入总记录数--总记录数是在外部计算出来的
普通php--可增加其他的参数，具体看看类的声明属性有哪些参数
$p=new page(array('method'=>'php','counter'=>$counter,'pagesize'=>12));
伪静态--$$符号代表的是分页码，系统自动会替换的
$p=new page(array('method'=>'html','linkname'=>'news-2_$$.html','counter'=>$counter,'pagesize'=>12));
生成静态
$p=new page(array('method'=>'html','linkname'=>'news-2_$$.html','page'=>$page,'counter'=>$counter,'pagesize'=>12));
ajax
$p=new page(array('method'=>'ajax','linkname'=>'getsite','parameter'=>'\'3\',\'4\'','counter'=>$counter,'pagesize'=>12));
2.不传记录总数，使用方法getrss()来计算出记录总数，同时返回记录集
普通php--可增加其他的参数，具体看看类的声明属性有哪些参数
$p=new page(array('method'=>'php','pagesize'=>12));
$p->getrss($sql);
伪静态--$$符号代表的是分页码，系统自动会替换的
$p=new page(array('method'=>'html','linkname'=>'news-2_$$.html','pagesize'=>12));
$p->getrss($sql);
生成静态
$p=new page(array('method'=>'html','linkname'=>'news-2_$$.html','page'=>$page,'pagesize'=>12));
$p->getrss($sql);
ajax
$p=new page(array('method'=>'ajax','linkname'=>'getsite','parameter'=>'\'3\',\'4\'','pagesize'=>12));
$p->getrss($sql);
//在调用ajax页面放入该函数
<script>
function getsite(page,lm,keyword){
	$.ajax({
		type:'get',
		url:'ajax_email.php?page='+page,
		cache:false,
		success:function(data){
			$('#sou_result').html(data);
		}
	});
}
</script>
*/



//总记录数，每页显示记录数，分页方式，页面名，传递参数，当前页码，数字分页显示页码数
class page{
	//分页方式--普通php、伪静态、纯静态、异步ajax
	protected $method;
	//总记录数--只有纯静态，实例化时才需要赋值
	public    $counter;
	//每页显示记录数
	protected $pagesize;
	//页面连接名--普通php时页面名系统自动获取，伪静态、纯静态实例化时传入页面名，异步ajax时这个代表函数名
	protected $linkname;
	//传递参数--普通php时页面名系统自动获取如果想传入额外实例化时传入，伪静态、纯静态不需要传入，异步ajax时这个代表函数名的参数
	protected $parameter;
	//当前页码--普通php、伪静态、异步ajax时也需要传入、时页面名系统自动获取，、纯静态实例化时传入页码因为系统无法获取，
	protected $page;
	//数字显示页码数
	protected $pagenum;
	//总页数
	protected $pagezong;
	//php页面url
	protected $phpurl;
	//html页面url
	protected $htmlurl;

	//设置各项参数
	public function __construct($data=array()){
		$rewrite=(isset($GLOBALS['cong']['rewrite'])&&($GLOBALS['cong']['rewrite']==1||$GLOBALS['cong']['rewrite']==2))?'html':'php';
		$this->method = isset($data['method'])?$data['method']:$rewrite;
		$this->counter = isset($data['counter'])?$data['counter']:0; 
		$this->pagesize = isset($data['pagesize'])?$data['pagesize']:12;
		$this->linkname = isset($data['linkname'])?$data['linkname']:'';
		$this->parameter = isset($data['parameter'])?$data['parameter']:'';
		$this->page = isset($data['page'])?$data['page']:'';
		$this->pagenum = isset($data['pagenum'])?$data['pagenum']:10;
		
		$this->setpagezong(); 
		$this->setpageno();
	}
	
	//设置总页数
	protected function setpagezong(){
		$this->pagezong = ceil($this->counter / $this->pagesize);
	}
	
	//设置当前页
	protected function setpageno(){
		//实例化时没传入当前页面码，系统自动获取。一般只有伪静态、纯静态、ajax才需要实例化传入
		if ($this->page==''){
			(isset($_GET['page'])) ? $page = (int)$_GET['page'] : $page = 1;
			$this->page = ($page<1) ? 1 : $page;
			$this->page = ($this->page>$this->pagezong) ? $this->pagezong : $this->page;
		}
	}
	
	//设置查询限制
	public function getlimit(){
		$limit = ($this->page - 1) * $this->pagesize; 
		$limit = ($limit < 0) ? 0 : $limit;
		$limit .= ', ' . $this->pagesize;
		$limit = ' limit '.$limit;
		return $limit;
	}
	
	//php分页重新组合url(去掉page)
	protected function setphpurl(){
		if (!isset($_SERVER['REQUEST_URI'])){
			$_SERVER['REQUEST_URI']=substr($_SERVER['PHP_SELF'],1);
			if (isset($_SERVER['QUERY_STRING'])){
				$_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING'];
			}
		}
		$url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
		$parse = parse_url($url);
		if(isset($parse['query'])){
			parse_str($parse['query'],$params);
			unset($params['page']);
			$url   =  $parse['path'].'?'.http_build_query($params);
		}
		//得到普通a标签的连接
		if(!empty($params)){
			$url .= '&';
		}
		$this->phpurl = $url; 
	}
	
	//得到页面url--只有普通php分页才需要执行此方法，其他都是传入
    protected function getphpurl(){
        if($this->phpurl === NULL)
        {
			$this->setphpurl(); 
        }
        return $this->phpurl;
    }
	
	//伪静态获取页面url
	protected function sethtmlurl(){
		if (!isset($_SERVER['REQUEST_URI'])){
			$_SERVER['REQUEST_URI']=substr($_SERVER['PHP_SELF'],1);
			if (isset($_SERVER['QUERY_STRING'])){
				$_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING'];
			}
		}
		$url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
		$parse = parse_url($url);
		if(isset($parse['path'])){
			$url=preg_replace('/(_\d+)?\./','_$$.',$parse['path']);
		}
		
		if(isset($parse['query'])){
			$url.='?'.$parse['query'];
		}
		$this->htmlurl = $url;
	}
	
	//得到页面url
    protected function gethtmlurl(){
        if($this->htmlurl === NULL)
        {
			$this->sethtmlurl(); 
        }
        return $this->htmlurl;
    }
	
    //得到普通a标签的连接
    protected function getlink($page,$word){
        switch ($this->method) {
            case 'ajax':
                $parameter = '';
                if($this->parameter){
                    $parameter = ','.$this->parameter;
                }
                return '<a onclick=' . $this->linkname . '(\'' . $page . '\''.$parameter.') href="javascript:void(0)">' . $word . '</a>';
            break;
             
            case 'html':
                $url = str_replace('$$',$page,$this->gethtmlurl());
                return '<a href="' .$url . '">' . $word . '</a>';
            break;
             
            case 'php':
				$url=$this->getphpurl().'page='.$page;
                return '<a href="'.$url.'">'.$word.'</a>';
            break;
        }
    }

    //得到普通a标签的连接
    protected function getlink1($page,$word){
        switch ($this->method) {
            case 'ajax':
                $parameter = '';
                if($this->parameter){
                    $parameter = ','.$this->parameter;
                }
                return '<a onclick=' . $this->linkname . '(\'' . $page . '\''.$parameter.') href="javascript:void(0)">' . $word . '</a>';
            break;
             
            case 'html':
                $url = str_replace('$$',$page,$this->gethtmlurl());
                return '<a href="' .$url . '">' . $word . '</a>';
            break;
             
            case 'php':
				$url=$this->getphpurl().'page='.$page;
                return '<a class="page pageSet" href="'.$url.'">'.$word.'</a>';
            break;
        }
    }
	
	//得到select的onchange的js
	protected function getscript(){
        switch ($this->method) {
            case 'ajax':
                $parameter = '';
                if($this->parameter){
                    $parameter = ','.$this->parameter;
                }
                return $this->linkname . '(this.value'.$parameter.')';
            break;
             
            case 'html':
				$url=$this->gethtmlurl();
				$url = substr($url,0,strpos($url,'$$')).'\'+this.value+\''.substr($url,(strpos($url,'$$')+2));
                return 'location=\'' .$url . '\'';
            break;
             
            case 'php':
                return 'location=\''.$this->getphpurl().'page=\'+this.value';
            break;
        }
    }
	
	//通过传入的数据库操作对象和sql语句，更新总记录数，设置当前页，获取记录集
	public function getrss($db,$sql){
		//转小写
		$sql=strtolower($sql);
		$from=strpos($sql,'from');
		$orderby=strpos($sql,'order by');
		$length=$orderby?($orderby-$from):(strlen($sql)-$from);
		//得到sql统计记录总数语句
		$sqlcount='select count(*) '.substr($sql,$from,$length);
		//得到记录总数后重新计算总页数和当前页
		$this->counter=$db->getvalue($sqlcount);
		$this->setpagezong();
		$this->setpageno();
		//得到当前页记录集
		return $db->getrss($sql.$this->getlimit());
	}
	
	//普通首页
	public function gethomelink($word='首页'){
		if($this->page <= 1){
			$home = $word;
		}else{
			$home = $this->getlink(1,$word);
		}
		return $home;
	}
	
	//普通上一页
	public function getprevlink($word='上一页'){
		if($this->page <= 1){
			$prev = $word;
		}else{
			$prev = $this->getlink(($this->page - 1),$word);
		}
		return $prev;
	}
	
	//普通下一页
	public function getnextlink($word='下一页'){
		if($this->page >= $this->pagezong){
			$next = $word;
		}else{
			$next = $this->getlink(($this->page + 1),$word);
		}
		return $next;
	}
	
	//普通尾页
	public function getlastlink($word='尾页'){
		if($this->page >= $this->pagezong){
			$last = $word;
		}else{
			$last = $this->getlink($this->pagezong,$word);
		}
		return $last;
	}
	
	//数字首页
	public function getsholink($word='首页'){
		if($this->page <= 1){
			$sho='<li class="nolink"><a>'.$word.'</a></li>';
		}else{
			$sho='<li>'.$this->getlink(1,$word).'</li>';
		}
		return $sho;
	}
	
	//数字上一页
	public function getshalink($word='上一页'){
		if ($this->page!=1){
			$sha = '<li>'.$this->getlink(($this->page - 1),$word).'</li>';
		}else{
			$sha = '<li class="nolink"><a>'.$word.'</a></li>';
		}
		return $sha;
	}

	//数字上一页
	public function getshalink1($word='上一页'){
		if ($this->page!=1){
			$sha = $this->getlink1(($this->page - 1),$word);
		}else{
			$sha = '';
		}
		return $sha;
	}
	
	//数字中间页
	public function getzholink(){
		if ($this->pagenum%2 == 0){
			$step2 = $this->pagenum / 2;
			$step1 = $step2 - 1;
		}else{
			$step1 = floor($this->pagenum / 2);
			$step2 = $step1;
		}
		$p_start = $this->page - $step1;
		$p_end = $this->page + $step2;
		$s_str = '<li>'.$this->getlink(1,'1...').'</li>';
		$e_str = '<li>'.$this->getlink($this->pagezong,'...'.$this->pagezong).'</li>';
		if($this->pagezong <= $this->pagenum || $this->pagezong <= $step2){
			$p_start = 1;
			$p_end = $this->pagezong;
			$s_str = '';
			$e_str = '';
		}else{
			if($p_start <= 1){
				$s_str = '';
				$p_start = 1;
				$p_end = $this->pagenum;
			}
			if ($p_end >= $this->pagezong){
				$p_end = $this->pagezong;
				$p_start = $this->pagezong - $this->pagenum + 1;
				$e_str = '';
			}
		}
		$zho = $s_str;
		for($i = $p_start;$i <= $p_end;$i++){
			if ($i == $this->page){
				$zho .= '<li class="current"><a>'.$i.'</a></li>';
			}else{
				$zho .= '<li>'.$this->getlink($i,$i).'</li>';
			}
		}
		$zho .= $e_str;
		
		return $zho;
	}

	//数字中间页
	public function getzholink1(){
		if ($this->pagenum%2 == 0){
			$step2 = $this->pagenum / 2;
			$step1 = $step2 - 1;
		}else{
			$step1 = floor($this->pagenum / 2);
			$step2 = $step1;
		}
		$p_start = $this->page - $step1;
		$p_end = $this->page + $step2;
		$s_str = '<li>'.$this->getlink(1,'1...').'</li>';
		$e_str = '<li>'.$this->getlink($this->pagezong,'...'.$this->pagezong).'</li>';
		if($this->pagezong <= $this->pagenum || $this->pagezong <= $step2){
			$p_start = 1;
			$p_end = $this->pagezong;
			$s_str = '';
			$e_str = '';
		}else{
			if($p_start <= 1){
				$s_str = '';
				$p_start = 1;
				$p_end = $this->pagenum;
			}
			if ($p_end >= $this->pagezong){
				$p_end = $this->pagezong;
				$p_start = $this->pagezong - $this->pagenum + 1;
				$e_str = '';
			}
		}
		$zho = $s_str;
		for($i = $p_start;$i <= $p_end;$i++){
			if ($i == $this->page){
				$zho .= '<a id="pagecurSet" class="page pageSet cur">'.$i.'</a>';
			}else{
				$zho .= $this->getlink1($i,$i);
			}
		}
		$zho .= $e_str;
		
		return $zho;
	}
	
	//数字下一页
	public function getxialink($word='下一页'){
		if ($this->page!=$this->pagezong){
			$xia = '<li style="margin:0;">'.$this->getlink(($this->page + 1),$word).'</li>';
		}else{
			$xia = '<li class="nolink" style="margin:0;"><a>'.$word.'</a></li>';
		}
		return $xia;
	}

	//数字下一页
	public function getxialink1($word='下一页'){
		if ($this->page!=$this->pagezong){
			$xia = $this->getlink1(($this->page + 1),$word);
		}else{
			$xia = '';
		}
		return $xia;
	}
	
	//数字尾页
	public function getweilink($word='尾页'){
		if($this->page >= $this->pagezong){
			$wei='<li class="nolink" style="margin:0;"><a>'.$word.'</a></li>';
		}else{
			$wei='<li style="margin:0;">'.$this->getlink(1,$word).'</li>';
		}
		return $wei;
	}
	
	//后台分页--请不要随便更改
	public function getpagehou($home = '首页', $prev = '上一页', $next = '下一页', $last = '尾页'){
		$home = $this->gethomelink($home); 
		$prev = $this->getprevlink($prev); 
		$next = $this->getnextlink($next);
		$last = $this->getlastlink($last);
		$menu = '第<font color="#ff0000">'.$this->page.'</font>页|共<font color="#ff0000">'.$this->pagezong.'</font>页|<font color="#ff0000">'.$this->pagesize.'</font>项/页|共<font color="#ff0000">'.$this->counter.'</font>项'.'　　　　　　['.$home.']['.$prev.']['.$next.']['.$last.']  ';
		$menu .= '<select onchange='.$this->getscript().' id="gotoPage">'."\n";
        for ($i=1;$i<=$this->pagezong;$i++){       
            if($i == $this->page){
                $menu .= '<option selected="true" value="'.$i.'">'.$i.'</option>'."\n";
            }else{
                $menu .= '<option value="' .$i. '">' .$i. '</option>'."\n";
            }           
        }
        $menu .= '</select>'."\n";
		echo $menu;
	}
	
	//普通分页
	public function getpagemenu($home = '首页', $prev = '上一页', $next = '下一页', $last = '尾页'){
		$home = $this->gethomelink($home); 
		$prev = $this->getprevlink($prev); 
		$next = $this->getnextlink($next);
		$last = $this->getlastlink($last);
		$menu = '第<font color="#ff0000">'.$this->page.'</font>页|共<font color="#ff0000">'.$this->pagezong.'</font>页|<font color="#ff0000">'.$this->pagesize.'</font>项/页|共<font color="#ff0000">'.$this->counter.'</font>项'.'　　　　　　['.$home.']['.$prev.']['.$next.']['.$last.']  ';
		$menu .= '<select onchange='.$this->getscript().' id="gotoPage">'."\n";
        for ($i=1;$i<=$this->pagezong;$i++){       
            if($i == $this->page){
                $menu .= '<option selected="true" value="'.$i.'">'.$i.'</option>'."\n";
            }else{
                $menu .= '<option value="' .$i. '">' .$i. '</option>'."\n";
            }           
        }
        $menu .= '</select>'."\n";
		echo $menu;
	}

	public function getpagenum1($home ='首页' , $prev = '上一页', $next = '下一页', $last = '尾页'){
		$home=($home!='首页')?$home:(!empty($GLOBALS['lang']['pages']['home'])?$GLOBALS['lang']['pages']['home']:'首页');
		$prev=($prev!='上一页')?$prev:(!empty($GLOBALS['lang']['pages']['prev'])?$GLOBALS['lang']['pages']['prev']:'上一页');
		$next=($next!='下一页')?$next:(!empty($GLOBALS['lang']['pages']['next'])?$GLOBALS['lang']['pages']['next']:'下一页');
		$last=($last!='尾页')?$last:(!empty($GLOBALS['lang']['pages']['last'])?$GLOBALS['lang']['pages']['last']:'尾页');
		$sha = $this->getshalink1($prev);
		$zho = $this->getzholink1();
		$xia = $this->getxialink1($next);
		
		$menu = $sha.$zho.$xia.'<div class="submit_div"><span class="all_page">共'.$this->pagezong.'页</span>到第';
		//$menu = '<div class="pages"><ul>'.$sha.$zho.$xia.'</ul></div>';
		echo $menu;
	}

	public function getpagenumONE($home ='首页' , $prev = '上一页', $next = '下一页', $last = '尾页'){
		$home=($home!='首页')?$home:(!empty($GLOBALS['lang']['pages']['home'])?$GLOBALS['lang']['pages']['home']:'首页');
		$prev=($prev!='上一页')?$prev:(!empty($GLOBALS['lang']['pages']['prev'])?$GLOBALS['lang']['pages']['prev']:'上一页');
		$next=($next!='下一页')?$next:(!empty($GLOBALS['lang']['pages']['next'])?$GLOBALS['lang']['pages']['next']:'下一页');
		$last=($last!='尾页')?$last:(!empty($GLOBALS['lang']['pages']['last'])?$GLOBALS['lang']['pages']['last']:'尾页');
		$sha = $this->getshalink1($prev);
		$zho = $this->getzholink1();
		$xia = $this->getxialink1($next);
		
		$menu = $sha.$zho.$xia.'<div class="submit_div"><span class="all_page">TOTAL '.$this->pagezong.' PAGE</span>TO';
		//$menu = '<div class="pages"><ul>'.$sha.$zho.$xia.'</ul></div>';
		echo $menu;
	}


	//数字页码
	public function getpagenum($home ='首页' , $prev = '上一页', $next = '下一页', $last = '尾页'){
		$home=($home!='首页')?$home:(!empty($GLOBALS['lang']['pages']['home'])?$GLOBALS['lang']['pages']['home']:'首页');
		$prev=($prev!='上一页')?$prev:(!empty($GLOBALS['lang']['pages']['prev'])?$GLOBALS['lang']['pages']['prev']:'上一页');
		$next=($next!='下一页')?$next:(!empty($GLOBALS['lang']['pages']['next'])?$GLOBALS['lang']['pages']['next']:'下一页');
		$last=($last!='尾页')?$last:(!empty($GLOBALS['lang']['pages']['last'])?$GLOBALS['lang']['pages']['last']:'尾页');
		$sha = $this->getshalink($prev);
		$zho = $this->getzholink();
		$xia = $this->getxialink($next);
		
		$menu = '<div class="pages"><ul>'.$sha.$zho.$xia.'</ul></div>';
		//蓝色
		/**/$menu .= '<style type="text/css">
					.pages {color: #aaa;padding:0;font-family:Verdana;font-size:12px;font-weight:bold;}
					.pages ul{list-style: none;margin:0px;padding:0px;text-align:left;}
					.pages li {display: inline-block;*display:inline;margin: 0 5px 0 0;}
					.pages li a {color:#0e5bb7;border: 1px solid #ddd;background-color:#ffffff;text-decoration: none;padding:1px 5px 2px 5px;}
					.pages li a:hover {color:#ffffff;border:1px solid #0e4f9d;background:#0e5bb7;}
					.pages li.current a{color:#ffffff;border:1px solid #063267;background:#0e4f9d;}
					.pages li.current a:hover{color:#ffffff;border:1px solid #063267;background:#0e4f9d;}
					.pages li.nolink  a{color:#CCCCCC;border:1px solid #F0F0F0;background:#ffffff;}
					.pages li.nolink  a:hover{color:#CCCCCC;border:1px solid #F0F0F0;background:#ffffff;}
				  </style>';
		
		//黑色
		/*$menu .= '<style type="text/css">
					.pages {color: #aaa;padding:0;font-family:Verdana;font-size:12px;font-weight:bold;}
					.pages ul{list-style: none;margin:0px;padding:0px;text-align:left;}
					.pages li {display: inline-block;*display:inline;margin: 0 5px 0 0;}
					.pages li a {color: #c0c0c0;padding:1px 5px 2px 5px;border: 1px solid #606060;text-decoration: none;background-color:#000;}
					.pages li a:hover {color: #ffffff;border:1px solid #e4e4e4;background:#606060;}
					.pages li.current a{color: #ffffff;border:1px solid #999999;background:#606060;}
					.pages li.current a:hover{color: #ffffff;border:1px solid #999999;background:#606060;}
					.pages li.nolink  a{color: #808081;border:1px solid #606060;background:#606060;}
					.pages li.nolink  a:hover{color: #808081;border:1px solid #606060;background:#606060;}
				  </style>';
		*/
		//红色
		/*$menu .= '<style type="text/css">
					.pages {color: #aaa;padding:0;font-family:Verdana;font-size:12px;font-weight:bold;}
					.pages ul{list-style: none;margin:0px;padding:0px;text-align:left;}
					.pages li {display: inline-block;*display:inline;margin: 0 5px 0 0;}
					.pages li a {color: #e20808;padding:1px 5px 2px 5px;border: 1px solid #ddd;text-decoration: none;background-color:#FFFFFF}
					.pages li a:hover {color: #fff;border:1px solid #e70d0d;background:#f44646;}
					.pages li.current a{color: #fff;border:1px solid #e70d0d;background:#f44646;}
					.pages li.current a:hover{color: #fff;border:1px solid #e70d0d;background:#f44646;}
					.pages li.nolink  a{color: #ccc;border:1px solid #F0F0F0;background:#FFFFFF}
					.pages li.nolink  a:hover{color: #ccc;border:1px solid #F0F0F0;background:#FFFFFF}
				  </style>';
		*/
		//灰色
		/*$menu .= '<style type="text/css">
					.pages {color: #aaa;padding:0;font-family:Verdana;font-size:12px;font-weight:bold;}
					.pages ul{list-style: none;margin:0px;padding:0px;text-align:left;}
					.pages li {display: inline-block;*display:inline;margin: 0 5px 0 0;}
					.pages li a {color: #aaa;padding:1px 5px 2px 5px;border: 1px solid #ddd;text-decoration: none;background-color:#FFFFFF}
					.pages li a:hover {color: #aaa;border:1px solid #a0a0a0;background:#f0f0f0;}
					.pages li.current a{color: #aaa;border:1px solid #e0e0e0;background:#f0f0f0;}
					.pages li.current a:hover{color: #aaa;border:1px solid #e0e0e0;background:#f0f0f0;}
					.pages li.nolink  a{color: #CCC;border:1px solid #F0F0F0;background:#FFFFFF;}
					.pages li.nolink  a:hover{color: #CCC;border:1px solid #F0F0F0;background:#FFFFFF;}
				  </style>';
	     */
		//绿色
		/*$menu .= '<style type="text/css">
					.pages {color: #333;padding:0;font-family:Verdana;font-size:12px;font-weight:bold;}
					.pages ul{list-style: none;margin:0px;padding:0px;text-align:left;}
					.pages li {display: inline-block;*display:inline;margin: 0 5px 0 0;}
					.pages li a {color: #88af3f;padding:1px 5px 2px 5px;border: 1px solid #ddd;text-decoration: none;background-color:#FFFFFF}
					.pages li a:hover {color: #638425;border: 1px solid #85bd1e;background: #f1ffd6;}
					.pages li.current a{color: #ffffff;border: 1px solid #b2e05d;background: #b2e05d;}
					.pages li.current a:hover{color: #ffffff;border: 1px solid #b2e05d;background: #b2e05d;}
					.pages li.nolink  a{color: #cccccc;border: 1px solid #F0F0F0;background: #FFFFFF;}
					.pages li.nolink  a:hover{color: #cccccc;border: 1px solid #F0F0F0;background: #FFFFFF;}
				  </style>';
	   */
				  
		echo $menu;
	}
}
?>