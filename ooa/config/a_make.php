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
		$db->execute('update '.table('master_action').' set `px`='.$v.' where `id`='.$k.'');
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
	$db->execute('update '.table('master_action').' set `pass`=1 where `id` in ('.$id.')');	
//取消屏蔽
}elseif($ac=='pass2'){
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}	
	$db->execute('update '.table('master_action').' set `pass`=0 where `id` in ('.$id.')');	
//删除
}elseif($ac=='del'){
	$id=isset($_GET['id'])?$_GET['id']:'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	if (is_array($id)){
		$id=implode(',',$id);
	}
	//删除权限的记录
	$db->execute('delete from '.table('master_action').' where `id` in ('.$id.')');
}
?>
<form id="form1" name="form1" >
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td width="40" align="center">排序</td>
    <td>权限名称</td>
    <td width="90" align="center">状态</td>
    <td width="180" align="center">管理操作</td>
  </tr>
  <?php
	//把所有权限放到$rss数组里
	$rss=$db->getrss('select * from '.table('master_menu').' where fid=0 and pass=1 order by `px` asc,`id` asc');
	$rowa=$db->getrss('select * from '.table('master_action').' order by `px` asc,`id` asc');
	foreach($rowa as $rs){
		$rows[$rs['fid']][]=$rs;
	}
	if (!empty($rss)){
		foreach($rss as $v){
			echo'<tr class="tdbg" >'."\n";
			echo'<td align="center"></td>'."\n";
			echo'<td '.(($v['pass']==0)?'style="color:#999;"':'').'><b>'.$v["title"].'</b></td>'."\n";
			echo'<td></td>'."\n";
			echo'<td align="center"><A href="a_copy.php?id='.$v["id"].'&act=1">复制</A>　　　　　 &nbsp;</td>'."\n";
			echo'</tr>'."\n";
			if (!empty($rows[$v['id']])){
				foreach($rows[$v['id']] as $ev){
					echo'<tr class="tdbg" >'."\n";
					echo'<td align="center"><input name="px['.$ev["id"].']" id="px['.$ev["id"].']" type="text" value="'.$ev["px"].'" maxlength="11" class="num"></td>'."\n";
					echo'<td '.(($v['pass']==0||$ev['pass']==0)?'style="color:#999;"':'').'>'.$ev["title"].'</td>'."\n";
					echo'<td><table align="center"><tr><td>'.(($ev['pass']==1)?'<a class="icon k" onclick="ajax_make(\'pass2\','.$ev["id"].')" title="点击成为停用"></a>':'<a class="icon kn" onclick="ajax_make(\'pass1\','.$ev["id"].')" title="点击成为启用"></a>').'</td></tr></table></td>'."\n";
					echo'<td align="center"><A href="a_copy.php?id='.$ev["id"].'&act=2">复制</A> | <A href="a_edit.php?id='.$ev["id"].'">修改</A> | <A href="javascript:;" onClick="ajax_make(\'del\','.$ev["id"].')" >删除</A></td>'."\n";
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