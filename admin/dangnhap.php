<?php
ob_start();
session_start();
if(isset($_GET['dn']))
	if($_GET['dn']=='thoat')
		unset($_SESSION['dntc@!@#$%^']);
if(isset($_POST['un']) && isset($_POST['pass'])) 
	if($_POST['un']=='admin' && $_POST['pass']=='myphamdeal@123456')
	{
		$_SESSION['dntc@!@#$%^']=1;
		header('location:index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Quản lý website mỹ phẩm deal ::.</title>
<style>
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 16px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  width:150px;
  
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>
</head>

<body>

<div align=center>

</br><b>ĐĂNG NHẬP TRANG QUẢN TRỊ MYPHAMDEAL.VN</b></br></br>
<form method=post>
<table width=700px border=1 bordercolor=#326e87 cellspacing=0 style="color:#1c5d79;text-align:center;">
<tr style="background:url(col_bg.gif);height:30px">
<td><b>Username : </b></td>
<td><input id='un' name='un' type='text' autofocus></input></td>
</tr>
<tr bgcolor=#dfedf3>
<td><b>Password : </b></td>
<td><input id='pass' name='pass' type='password'></input></td>
</tr>
<tr bgcolor=#F0FFFF>
<td colspan="4"><input name='btnDangNhap' id='btnDangNhap' class='btn' type=submit value='Đăng nhập'></input></td>
</tr>
</table>
</form>
</div>

</body>
</html>