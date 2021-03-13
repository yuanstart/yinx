<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_dy_daochu');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>批量导出</title>
<link href="../css/admin_style.css"  type="text/css" rel="stylesheet">
<script src="../scripts/function.js" language="javascript"></script>
<script src="../scripts/calendar.js"></script>
</head>

<body >
<table width="100%"  border="0" cellpadding="2" cellspacing="1" class="border">
  <tr align="center" class="topbg">
    <td >批量导入</td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
<form name="formn" method="POST" action="d_daochuu.php">
  <tr class="tdbgo">
    <td width="8%" align="right"></td>
    <td >
        <table border="0" cellspacing="0" cellpadding="1" style="float:left;">
          <tr>
            <td>
                <select name="zt_val" id="zt_val" onchange="gt('sform').submit()">
                    <option value="">所有状态</option>
                    <option value="pass2">退订</option>
                    <option value="pass1">订阅</option>
                </select>&nbsp;
            </td>
         </tr>
         <tr>
            <td>
            <input name="s_wtime" type="text" id="s_wtime" size="10" maxlength="50" onclick="return Calendar('s_wtime');"  placeholder="订阅时间" />
            到&nbsp;<input name="e_wtime" type="text" id="e_wtime" size="10" maxlength="50" onclick="return Calendar('e_wtime');"  placeholder="订阅时间"/>&nbsp;</td>
        </tr>
        <tr>
            <td><input name="keyword" type="text" id="keyword" size="30" maxlength="50"  value="" />&nbsp;</td>
        </tr>
        <tr>   
            <td>
            <input type="submit" name="button" id="button" value="导出为excel" class="btn "/>
            &nbsp;<input name="button1" type="button" value="返回" onclick="location='d_default.php'" class="btn" />
            </td>
        </tr>
    </table>
    </td>
  </tr>
</form>
</table>
</body>
</html>
