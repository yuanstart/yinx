<?php
require('../../../include/common.inc.php');
checklogin();
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_dacu_add');//检查权限
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="renderer" content="webkit">
<title>批量导出</title>
<link href="../../css/admin_style.css"  type="text/css" rel="stylesheet">
<script src="../../scripts/function.js" language="javascript"></script>
<script src="../../scripts/jquery.js"></script>
<script src="../../scripts/calendar.js"></script>
</head>

<body >
<table width="100%"  border="0" cellpadding="2" cellspacing="1" class="border">
  <tr align="center" class="topbg">
    <td >批量导出</td>
  </tr>
</table>
<br />
<form name="formn" method="POST" action="addd.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2"></td>
  </tr>
  <?php
  if ($conf['sy']['need_lm']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">分类</td>
    <td>
    <select name="lm" id="lm">
      <option value="" selected="selected">请选择分类</option>
    	<?php
		//把所有分类放到$rss数组里
        $rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' order by `px` desc,`id_lm` desc');
		//无限级分类开始
		addlm($rss,0,'');
		?>
    </select>
    </td>
  </tr>
  <?php
  }
	//通过$fid来判读当前循环哪个级别，然后不断地递归循环
	function addlm($rss,$fid,$i){
		//通过判断$i为空设定一级分类的标志为"• "，同时为二级判断留下标志
		if ($i==''){
			$i='• ';
		//通过判断$i为"• "设定二级分类的标志为" 　|—"
		}elseif ($i=='• '){
			$i=' 　|—';
		//其他级别的标志全部都是" 　|"加上上一级的标志
		}else{
			$i=' 　|'.$i;
		}
		//遍历所有分类数组根据传入的$fid来显示哪个级别，同时继续执行自己
		foreach($rss as $rs){
			if($rs['fid']==$fid){
				if($rs['add_xx']=='yes'){
					echo'<option value="'.$rs["id_lm"].'">'.$i.$rs["title_lm"].'</option>'."\n";
				}else{
					echo'<option value="no">'.$i.$rs["title_lm"].'×</option>'."\n";
				}
				addlm($rss,$rs['id_lm'],$i);
			}
		}
	}
  ?>
  <tr class="tdbg">
    <td width="120" align="right">id段从</td>
    <td><input name="s_id" type="text" size="5" /> 到 <input name="e_id" type="text" size="5" /></td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">id列表</td>
    <td><input name="idlist" type="text" size="50" /> </td>
  </tr>
 <tr class="tdbg">
 	<td width="120" align="right">时间从</td>
    <td>
    <input name="s_wtime" type="text" id="s_wtime" size="10" maxlength="50" onclick="return Calendar('s_wtime');"  />
    到&nbsp;<input name="e_wtime" type="text" id="e_wtime" size="10" maxlength="50" onclick="return Calendar('e_wtime');" />&nbsp;</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit2" value="提交并导出" class="btn"></td>
  </tr>
</table>
</form>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="122">&nbsp;</td>
    <td>
    <strong> 备注：</strong><br />
    导出CSV文档列顺序：<?php echo $conf['sy']['fields'];?>
    </td>
  </tr>
</table>
</body>
</html>
