<?php
	class db
	{
		private $servername="localhost";
		private $password="root";//"isecunet@#$01";
		private $username="root";//"myp44561_admin";
		private $dbname="deal_db";//"myp44561_mypham";
		
		function __construct()
		{
			mysql_connect($this->servername,$this->username,$this->password);
			mysql_select_db($this->dbname);
			mysql_query("set names 'utf8'");
		}
	}
?>
