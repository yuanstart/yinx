<?php
require('../../include/common.inc.php');
checklogin();
checkaction('code_co_view');

$zt_val=isset($_GET['zt_val'])?$_GET['zt_val']:'';
$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';
$sq='';
//如果有状态
if($zt_val!=''){
	if($zt_val=='pass2'){
		$sq.=' and pass=2';
	}elseif($zt_val=='pass3'){
		$sq.=' and pass=3';
	}elseif($zt_val=='pass4'){
		$sq.=' and pass=4';
	}
}
//如果有关键字
if ($keyword!=''){
	$sq.=' and (fcode="'.$keyword.'" or pno="'.$keyword.'")';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>防伪码管理</title>
<link href="../css/admin_style.css"  type="text/css" rel="stylesheet">
<script src="../scripts/jquery.js"></script>
<script src="../scripts/function.js"></script>
<script>
function check(form,ac){
	if (ac=='del'){
		if (checkyes(form)){
			gt(form).action='make.php?ac=del'
			gt(form).submit();
		}
	}else{
		if(ac=='edit'){
			if(checkForm(form)){
				gt(form).action='make.php?ac=edit'
				gt(form).submit();
			}
		}
	}
}

$(document).ready(function(){
	//如果鼠标移到class为msgtable的表格的tr上时，执行函数
	$(".listtable tr").mouseover(function(){  
	//给这行添加class值为over，并且当鼠标移出该行时执行函数
	$(this).addClass("over");}).mouseout(function(){ 
	//移除该行的class
	$(this).removeClass("over");}).click(function(){ 
		$(".listtable tr").removeClass("click");
		$(this).addClass("click");
	})
});
</script>
</head>

<body>
<table width="100%"  border="0" cellpadding="2" cellspacing="1" class="border">
  <tr align="center" class="topbg">
    <td >防伪码管理</td>
  </tr>
</table>
<br />
<form action="default.php"  name="sform" id="sform" method="get">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="40" align="right"><strong>检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
                <select name="zt_val" id="zt_val" onchange="location='default.php?zt_val='+this.value+'&keyword=<?php echo $keyword?>'">
                    <option value="">所有状态</option>
                    <option value="pass2">未验证</option>
                    <option value="pass3">已验证</option>
                    <option value="pass4">已屏蔽</option>
                </select>&nbsp;
				 <script language="javascript">
					gt("zt_val").value="<?php echo $zt_val?>";
                 </script>
            </td>
            <td><input name="keyword" type="text" id="keyword" placeholder="输入批次号或防伪码" size="25" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
</form>

<br />
<form action="make.php"  name="form1" id="form1" method="post">
<table width="100%"  border="0" cellpadding="2" cellspacing="1" class="border listtable">
<tr align="center" class="title">
	<td width="40" align="center">选中</td>
    <td width="200" align="center">批次号</td>
    <td width="250" align="center">防伪码</td>
    <td width="100" align="center">状态</td>
    <td >&nbsp;</td>
</tr>
<?php
$sql='select * from '.table('code_co').' where 1=1 '.$sq.' order by `id` desc';
$p=new page(array('method'=>'php','pagesize'=>50));
$rss=$p->getrss($db,$sql);
$a=1;
foreach($rss as $row){
$selectbg='';
if ($row['pass']==3){
	$selectbg=' style="background-color:#999;"';
}elseif ($row['pass']==4){
	$selectbg=' style="background-color:#ff0000;"';
}
?>
    <tr class=tdbg >
        <td align="center">
        <input name="id[<?php echo $row['id']?>]" type="checkbox" value="<?php echo $row['id']?>"/>
        <input name="idd[<?php echo $row['id']?>]" type="hidden" value="<?php echo $row['id']?>"/>
        </td>
        <td align="center">
        <input name="pno[<?php echo $row['id']?>]" type="text" value="<?php echo $row['pno']?>" size="25" maxlength="50" canEmpty="N" checkType="string" checkStr="批次"/>
        </td>
        <td height="22" align="center">
        <input name="fcode[<?php echo $row['id']?>]" type="text" value="<?php echo $row['fcode']?>" size="25" maxlength="50" canEmpty="N" checkType="string" checkStr="防伪码"/>
        </td>
        <td align="center" >
        <select name="pass[<?php echo $row['id']?>]" id="pass_<?php echo $row['id']?>" <?php echo $selectbg;?>>
        	<option value="2" >未验证</option>
            <option value="3">已验证</option>
            <option value="4">已屏蔽</option> 
        </select>
		<script>document.getElementById('pass_<?php echo $row['id']?>').value='<?php echo $row['pass']?>';</script>
        </td>
        <td>
        <?php
        if ($row['pass']==3&&$row['ctime']>0){
			echo '时间：'.date('Y-m-d H:i:s',$row['ctime']);
			echo '&nbsp; ip：'.$row['cip'];
			echo '&nbsp; <a class="blue" style="text-decoration:underline;" href="default_cx.php?keyword='.$row['fcode'].'&p_url='.urlencode(getpageurl()).'">查看详情</a>';
		}
		?>
        </td>
    </tr>
<?php
$a++;
}
?>
</table>
<table border="0" cellspacing="0" cellpadding="0" style="margin:5px 0;">
  <tr>
    <td><a href="javascript:CheckAll('form1');">全选</a>/<a href="javascript:CheckOthers('form1');">反选</a>&nbsp;<input name="" type="button"  class="btn" value="删除选中" onclick="check('form1','del');"/>&nbsp;<input name="" type="button"  class="btn" value="全部修改" onclick="check('form1','edit');"/></td>
    <td style="padding-left:30px;">
	<?php
	if ($p->counter>0){
        $p->getpagehou();
	}
    ?>
    </td>
  </tr>
</table>
</form>

<table width="100%" border="0"  cellpadding="2" cellspacing="1" class="border" id="code_add" name="code_add" >
  <form action="make.php?ac=add" name="frm" method="post" onSubmit="return checkForm('frm')" >
    <tr class=tdbgo>
    <td align="center" width="40"></td>
    <td width="200" height="22" align="center"><input name="pno" type="text"  value="" size="25" maxlength="50" canEmpty="N" checkType="string,," checkStr="批次"/></td>
      <td width="250" height="22" align="center"><input name="fcode" type="text"  size="25" maxlength="50" canEmpty="N" checkType="string,," checkStr="序列号"/></td>
      <td width="100" align="center" ><select name="pass">
      <option value="2" >未验证</option>
      <option value="3" >已验证</option>
      <option value="4" >已屏蔽</option>
      </select></td>
      <td class="tdbgo" >&nbsp;&nbsp;&nbsp;
      <input name="submit" type="submit" class="btn" value="添加" /></td>
    </tr>
    </form>
</table>
</body>
</html>
