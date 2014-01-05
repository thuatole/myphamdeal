<?php
$host_name = 'localhost';
$user_name = 'myp44561_admin';
$pass_word = 'isecunet@#$01';
$database_name = 'myp44561_mypham';

$conn = mysql_connect($host_name, $user_name, $pass_word) or die ('Error connecting to mysql');
mysql_select_db($database_name);
mysql_query("set names 'utf8'");
?>