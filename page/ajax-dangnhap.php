<?php
session_start();
require "../class/class.trangchu.php";
$tc= new trangchu();
if($tc->DangNhapThanhCong($_GET['email'],md5($_GET['password'])))
{
	echo $tc->LayHoTenKH_theo_Email($_GET['email']);
	$_SESSION['email']=$_GET['email'];
}
else
	echo "Try again";
?>