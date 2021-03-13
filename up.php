<?php
include 'conn.php';
if(!empty($_POST)){
$id = html($_POST['ii']);
$title = html($_POST['title']);
$rename = html($_POST['username']);
$phone = html($_POST['contact']);
$mssage = html($_POST['about']);
$time = time();
$ip =  getip();
$sql = "insert into book (`title`,`rename`,`phone`,`z_body`,`wtime`,`ip`) values ('$title','$rename','$phone','$mssage','$time','$ip')";
$db->execute($sql);
msg('添加成功','location="product.php"');
}
 ?>