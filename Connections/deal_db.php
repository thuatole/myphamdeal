<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_portal_db = "localhost";
$database_portal_db = "deal_db";//"myp44561_mypham";
$username_portal_db = "root";//"myp44561_admin";
$password_portal_db = "root"//"isecunet@#$01";
$portal_db = mysql_pconnect($hostname_portal_db, $username_portal_db, $password_portal_db) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");
?>