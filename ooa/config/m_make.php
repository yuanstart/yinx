<?php
require('../../include/common.inc.php');

checklogin();

$ac=isset($_GET['ac'])?$_GET['ac']:'';

//排序
if($ac=='px'){
	$px=isset($_POST['px'])?$_POST['px']:'';
	if ($px==''||!checknum($px)){
		msg('参数错误');
	}
	foreach($px as $k=>$v){
		$db->execute('update '.table('master_menu').' set `px`='.$v.' where `id`='.$k.'');
	}
//屏蔽
}elseif($ac=='pass1'){
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}	
	$db->execute('update '.table('master_menu').' set `pass`=1 where `id` in ('.$id.')');	
//取消屏蔽
}elseif($ac=='pass2'){
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}	
	$db->execute('update '.table('master_menu').' set `pass`=0 where `id` in ('.$id.')');	
//删除
}elseif($ac=='del'){
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}	
	//删除导航的记录
	$db->execute('delete from '.table('master_menu').' where `id` in ('.$id.')');
	$db->execute('delete from '.table('master_menu').' where `fid` in ('.$id.')');
}elseif($ac=='seod'){
	$db->execute('update '.table('master_menu').' set pass=1 where ty=3');
}elseif($ac=='seoh'){
	$db->execute('update '.table('master_menu').' set pass=0 where ty=3');
}elseif($ac=='cond'){
	$db->execute('update '.table('master_menu').' set pass=1 where ty=2');
}elseif($ac=='conh'){
	$db->execute('update '.table('master_menu').' set pass=0 where ty=2');
}
?>
<form id="form1" name="form1" >
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td width="40" align="center">排序</td>
    <td>导航名称</td>
    <td width="90" align="center">状态</td>
    <td width="180" align="center">管理操作</td>
  </tr>
  <?php
	//把所有导航放到$rss数组里
	$rss=$db->getrss('select * from '.table('master_menu').' order by `px` asc,`id` asc');
	foreach($rss as $rs){
		$rows[$rs['fid']][]=$rs;
	}
	if (!empty($rows[0])){
		foreach($rows[0] as $v){
			echo'<tr class="tdbg" >'."\n";
			echo'<td align="center"><input name="px['.$v["id"].']" id="px['.$v["id"].']" type="text" value="'.$v["px"].'" maxlength="11" class="num"></td>'."\n";
			echo'<td '.(($v['pass']==0)?'style="color:#999;"':'').'><b>'.$v["title"].'</b></td>'."\n";
			echo'<td><table align="center"><tr><td>'.(($v['pass']==1)?'<a class="icon k" onclick="ajax_make(\'pass2\','.$v["id"].')" title="点击成为停用"></a>':'<a class="icon kn" onclick="ajax_make(\'pass1\','.$v["id"].')" title="点击成为启用"></a>').'</td></tr></table></td>'."\n";
			echo'<td align="center"><A href="m_copy.php?id='.$v["id"].'&act=1">复制</A> | <A href="m_edit.php?id='.$v["id"].'">修改</A> | <A href="javascript:;" onclick="ajax_make(\'del\','.$v["id"].')" >删除</A></td>'."\n";
			echo'</tr>'."\n";
			if (!empty($rows[$v['id']])){
				foreach($rows[$v['id']] as $ev){
					echo'<tr class="tdbg" >'."\n";
					echo'<td align="center"><input name="px['.$ev["id"].']" id="px['.$ev["id"].']" type="text" value="'.$ev["px"].'" maxlength="11" class="num"></td>'."\n";
					echo'<td '.(($v['pass']==0||$ev['pass']==0)?'style="color:#999;"':'').'>'.$ev["title"].(($ev['title2'])?' | '.$ev['title2']:'').'</td>'."\n";
					echo'<td><table align="center"><tr><td>'.(($ev['pass']==1)?'<a class="icon k" onclick="ajax_make(\'pass2\','.$ev["id"].')" title="点击成为停用"></a>':'<a class="icon kn" onclick="ajax_make(\'pass1\','.$ev["id"].')" title="点击成为启用"></a>').'</td></tr></table></td>'."\n";
					echo'<td align="center"><A href="m_copy.php?id='.$ev["id"].'&act=2">复制</A> | <A href="m_edit.php?id='.$ev["id"].'">修改</A> | <A href="javascript:;" onClick="ajax_make(\'del\','.$ev["id"].')" >删除</A></td>'."\n";
					echo'</tr>'."\n";	
				}
			}
		}
	}
  ?> 
</table>
<p class="p">
<input name="" type="button" onclick="ajax_make('px')"  class="btn" value="排序"/>
</p>
</form>