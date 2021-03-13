<?php
require('../../include/common.inc.php');

checklogin();
$arr=$db->getrss('show tables');
foreach($arr as $v){
	echo $v['Tables_in_'.$db_name].'<br/>';
}
?>