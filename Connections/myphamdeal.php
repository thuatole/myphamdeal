<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"


$hostname_myphamdeal = "localhost";
$database_myphamdeal = "deal_db";//"myp44561_mypham";
$username_myphamdeal = "root";//"myp44561_admin";
$password_myphamdeal = "root";//"isecunet@#$01";
$myphamdeal = mysql_pconnect($hostname_myphamdeal, $username_myphamdeal, $password_myphamdeal) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");
?>