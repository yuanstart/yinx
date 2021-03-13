<?php
require('../../include/common.inc.php');
checklogin();
$act=(!empty($_GET['act']))?$_GET['act']:'';

//显示订阅页面
if($act=='select_dy'){
?>
    <ul id="sel_tabs" class="sel_tabs">
        <li onclick="settab('sel_tabs','sel_con',1)" class="cur">条件选择</li>
        <li onclick="settab('sel_tabs','sel_con',2)" >列表选择</li>
        <div style="clear:both; height:0px; overflow:hidden;"></div>
    </ul>
    <div id="sel_con_1" class="sel_cons">
      <ul class="sel_tj_search">
        <li><input type="radio" class="radio" name="tj_sel" id="tj_sel_1" value="" checked="checked"/> <label for="tj_sel_1">不选择</label></li>
        <li><input type="radio" class="radio" name="tj_sel" id="tj_sel_2" value="2" /> <label for="tj_sel_2">选择全部订阅邮箱</label></li>
        <li><input type="radio" class="radio" name="tj_sel" id="tj_sel_3" value="3" /> <label for="tj_sel_3">选择订阅时间从 <input name="tj_sel_3_stime" type="text" id="tj_sel_3_stime" size="10" maxlength="50"  onclick="return Calendar('tj_sel_3_stime');"  /> 到 <input name="tj_sel_3_etime" type="text" id="tj_sel_3_etime" size="10" maxlength="50"  onclick="return Calendar('tj_sel_3_etime');" /> 的邮箱</label></li>
      </ul>
    </div>
    <div id="sel_con_2" class="sel_cons" style="display:none;">
    	<form  id="search_form" name="search_form">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>从 <input name="s_wtime" type="text" id="s_wtime" size="10" maxlength="50"  onclick="return Calendar('s_wtime');" placeholder="订阅时间"  /> 到 <input name="e_wtime" type="text" id="e_wtime" size="10" maxlength="50"  onclick="return Calendar('e_wtime');"  placeholder="订阅时间" />&nbsp;</td>
            <td><input name="keyword" type="text" id="keyword" size="20" maxlength="50" placeholder="输入关键字搜索" />&nbsp;</td>
            <td><input type="button" name="button" id="button" value="检索" class="btn " onclick="$('#lb_sel').val('');search_dy();"/>&nbsp;<textarea id="lb_sel" name="lb_sel" style="display:none;"></textarea></td>
            <td style="color:#999;">&nbsp;邮箱过多时，请用条件选择</td>
          </tr>
        </table>
        </form>
        <div id="sou_result"></div>
    </div>
<?php

//显示会员页面
}elseif($act=='select_hy'){

?>
    <ul id="sel_tabs" class="sel_tabs">
        <li onclick="settab('sel_tabs','sel_con',1)" class="cur">条件选择</li>
        <li onclick="settab('sel_tabs','sel_con',2)" >列表选择</li>
        <div style="clear:both;height:0px; overflow:hidden;"></div>
    </ul>
    <div id="sel_con_1" class="sel_cons">
      <ul class="sel_tj_search">
        <li><input type="radio" class="radio" name="tj_sel" id="tj_sel_6" value="" checked="checked"/> <label for="tj_sel_1">不选择</label></li>
        <li><input type="radio" class="radio" name="tj_sel" id="tj_sel_7" value="7" /> <label for="tj_sel_7">选择全部会员邮箱</label></li>
        <li><input type="radio" class="radio" name="tj_sel" id="tj_sel_8" value="8" /> <label for="tj_sel_8">选择注册时间从 <input name="tj_sel_8_stime" type="text" id="tj_sel_8_stime" size="10" maxlength="50"  onclick="return Calendar('tj_sel_8_stime');"  /> 到 <input name="tj_sel_8_etime" type="text" id="tj_sel_8_etime" size="10" maxlength="50"  onclick="return Calendar('tj_sel_8_etime');" /> 的邮箱</label></li>
      </ul>
    </div>
    <div id="sel_con_2" class="sel_cons" style="display:none;">
    	<form  id="search_form" name="search_form">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>从 <input name="s_wtime" type="text" id="s_wtime" size="10" maxlength="50"  onclick="return Calendar('s_wtime');" placeholder="注册时间"  /> 到 <input name="e_wtime" type="text" id="e_wtime" size="10" maxlength="50"  onclick="return Calendar('e_wtime');"  placeholder="注册时间" />&nbsp;</td>
            <td><input name="keyword" type="text" id="keyword" size="20" maxlength="50" placeholder="输入关键字搜索" />&nbsp;</td>
            <td><input type="button" name="button" id="button" value="检索" class="btn " onclick="$('#lb_sel').val('');search_hy();"/>&nbsp;<textarea id="lb_sel" name="lb_sel" style="display:none;"></textarea></td>
            <td style="color:#999;">&nbsp;邮箱过多时，请用条件选择</td>
          </tr>
        </table>
        </form>
        <div id="sou_result"></div>
    </div>
<?php

//订阅页面ajax搜索处理
}elseif($act=='select_dy_post'){

	$s_wtime=isset($_POST['s_wtime'])?html($_POST['s_wtime']):'';
	$e_wtime=isset($_POST['e_wtime'])?html($_POST['e_wtime']):'';
	$keyword=(!empty($_POST['keyword']))?$_POST['keyword']:'';
	$lb_sel=isset($_POST['lb_sel'])?html($_POST['lb_sel']):'';
	if ($s_wtime!=''){
		if(!checkd($s_wtime)){
			echo ('开始订阅日期错误');
			exit();
		}
	}
	if ($e_wtime!=''){
		if(!checkd($e_wtime)){
			echo ('结束订阅日期错误');
			exit();
		}
	}
	$sq='';
	if($s_wtime!=''&&$e_wtime!=''){
		$sq.=' and (wtime>='.strtotime($s_wtime).' and wtime<='.(strtotime($e_wtime)+60*60*24).')';
	}elseif($s_wtime!=''){
		$sq.=' and (wtime>='.strtotime($s_wtime).' )';
	}elseif($e_wtime!=''){
		$sq.=' and (wtime<='.(strtotime($e_wtime)+60*60*24).' )';
	}
	if ($keyword!=''){
		$sq.=' and `email` like "%'.$keyword.'%"';
	}
	$sql='select * from '.table('email_dy').' where `pass`=1 '.$sq.' order by `id` desc';
	$p=new page(array('method'=>'ajax','linkname'=>'search_dy','pagesize'=>36));
	$rows=$p->getrss($db,$sql);
	echo '<ul class="sou_list">';
	foreach($rows as $row){
		if (strpos(','.$lb_sel.',',','.$row['email'].',')!==false){
			$str=' checked="checked"';
		}else{
			$str='';
		}
		echo '<li title="'.$row['email'].'"><input name="sou_email[]" type="checkbox" class="checkbox si" value="'.$row['email'].'" '.$str.' />'.getstr($row['email'],22).'</li>';
	}
	echo '<div class="clear"></div>';
	echo '</ul>';
	echo '<div style="margin-top:10px;">';
	echo '<div style="float:left;">';
	if ($p->counter>0){
        $p->getpagenum();
	}
	echo '</div>';
	echo '<div style="float:left;padding-top:3px;"><input name="quanx" type="checkbox" class="checkbox sa">全选</div>';
	echo '</div>';
	
//会员页面ajax搜索处理
}elseif($act=='select_hy_post'){

	$s_wtime=isset($_POST['s_wtime'])?html($_POST['s_wtime']):'';
	$e_wtime=isset($_POST['e_wtime'])?html($_POST['e_wtime']):'';
	$keyword=(!empty($_POST['keyword']))?$_POST['keyword']:'';
	$lb_sel=isset($_POST['lb_sel'])?html($_POST['lb_sel']):'';
	if ($s_wtime!=''){
		if(!checkd($s_wtime)){
			echo ('开始注册日期错误');
			exit();
		}
	}
	if ($e_wtime!=''){
		if(!checkd($e_wtime)){
			echo ('结束注册日期错误');
			exit();
		}
	}
	$sq='';
	if($s_wtime!=''&&$e_wtime!=''){
		$sq.=' and (wtime>='.strtotime($s_wtime).' and wtime<='.(strtotime($e_wtime)+60*60*24).')';
	}elseif($s_wtime!=''){
		$sq.=' and (wtime>='.strtotime($s_wtime).' )';
	}elseif($e_wtime!=''){
		$sq.=' and (wtime<='.(strtotime($e_wtime)+60*60*24).' )';
	}
	if ($keyword!=''){
		$sq.=' and `email` like "%'.$keyword.'%"';
	}
	$sql='select * from '.table('person').' where `pass`=3 '.$sq.' order by `id` desc';
	$p=new page(array('method'=>'ajax','linkname'=>'search_dy','pagesize'=>36));
	$rows=$p->getrss($db,$sql);
	echo '<ul class="sou_list">';
	foreach($rows as $row){
		if (strpos(','.$lb_sel.',',','.$row['email'].',')!==false){
			$str=' checked="checked"';
		}else{
			$str='';
		}
		echo '<li title="'.$row['email'].'"><input name="sou_email[]" type="checkbox" class="checkbox si" value="'.$row['email'].'" '.$str.' />'.getstr($row['email'],22).'</li>';
	}
	echo '<div class="clear"></div>';
	echo '</ul>';
	echo '<div style="margin-top:10px;">';
	echo '<div style="float:left;">';
	if ($p->counter>0){
        $p->getpagenum();
	}
	echo '</div>';
	echo '<div style="float:left;padding-top:3px;"><input name="quanx" type="checkbox" class="checkbox sa">全选</div>';
	echo '</div>';
}
?>


