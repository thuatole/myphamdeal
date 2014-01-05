<?php
//ob_start();
require "../class/class.trangchu.php";
$tc= new trangchu();
if(isset($_POST['btn-sign-up']))//HoTen,Email,MatKhau,SoDienThoai,NgaySinh,DiaChi
{
	if(trim($_POST['email'])=="" || !isset($_POST['email'])) $khongnhapemail=true; 
	else if(trim($_POST['password'])=="" || !isset($_POST['password'])) $khongnhappass=true; 
	else if(trim($_POST['hoten'])=="" || !isset($_POST['hoten'])) $khongnhaphoten=true;
	else if(trim($_POST['phone'])=="" || !isset($_POST['phone'])) $khongnhapsodt=true; 
	else if(trim($_POST['add'])=="" || !isset($_POST['add'])) $khongnhapdiachi=true; 
	else if($tc->TrungEmail($_POST['email'])) $trungemail=true;
	else if($_POST['password']!=$_POST['re-password']) $saipassword=true; 
	else
	{
		$dangky=$tc->ThemNhanhKhachHang($_POST['hoten'],$_POST['email'],md5($_POST['password']),$_POST['phone'],$_POST['ngaysinh'],$_POST['add']);
		echo "<script type='text/javascript'>";
		echo "window.close();";
		echo "</script>";
	}
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> -- ĐĂNG KÝ -- </title>
<link href="../css/index.css" rel="stylesheet" type="text/css" />
<link href="../images/logo-icon.ico" rel="shortcut icon" type="x-icon">
<link rel="stylesheet" type="text/css" href="../css/kendo.common.min.css">
<link rel="stylesheet" type="text/css" href="../css/kendo.default.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/kendo.all.min.js"></script>
</head>

<body>
<div id="sign-up" style="width:90%; padding-left:10px;">
                    	<p style="color:#FFFFFF; font-size:20px; font-weight:600; text-shadow:1px 1px #000000; margin-left:10px;">Đăng ký</p>
                        <div class="clear"></div>
                        <form id="form-sign-up" style="margin-left:15px; width:90%;" method="post">
                        	<p>
                       	  		<p><span style="float:left;color:white;">Email :</span>
                           		<input style="float:right;" type="text" size="40" id="email" name="email" /></p>
                            </p>
                            <div class="clear"></div>
                            <p>
                            	<p><span style="float:left;color:white;">Mật khẩu : </span>
                                <input style="float:right" type="password" size="40" id="password" name="password" /></p>
                            </p>
                             <div class="clear"></div>
                             <p>
                            	<p><span style="float:left;color:white;">Xác nhận mật khẩu : </span>
                                <input style="float:right" type="password" size="40" id="re-password" name="re-password" /></p>
                            </p>
                             <div class="clear"></div>
                             <p>
                            	<p><span style="float:left;color:white;">Họ tên : </span>
                                <input style="float:right" type="text" size="40" id="hoten" name="hoten" /></p>
                            </p>
                             <div class="clear"></div>
							 
							 <script>
								$(document).ready(function () {
									// create DateTimePicker from input HTML element
									$("#ngaysinh").kendoDateTimePicker({
										format: "yyyy-MM-dd HH:mm:ss",
										value: new Date()
									});
								});
							</script>
							 
                             <p>
                            	<p><span style="float:left;color:white;">Ngày sinh :</span>
                                <input style="height:24px; font-size:14px; width:270px; float:right;" type="text" id="ngaysinh" name="ngaysinh" /></p>
                            </p>
                             <div class="clear"></div>
                             <p>
                            	<p><span style="float:left;color:white;">Số ĐT di động : </span>
                                <input style="float:right" type="text" size="40" id="phone" name="phone" /></p>
                            </p>
                             <div class="clear"></div>
                             <p>
                            	<p><span style="float:left;color:white;">Địa chỉ : </span>
                                <input style="float:right" type="text" size="40" id="add" name="add" /></p>
                            </p>
                             <div class="clear"></div>
                            <p align=center><input type="submit" name="btn-sign-up" id="btn-sign-up" value="Đăng ký" /></p>
							<?php 
								if(isset($saipassword)) 
									echo "<p align=center style='color:red;'>Xác nhận mật khẩu chưa chính xác, vui lòng nhập lại !!!</p>"; 
								else if(isset($trungemail))
									echo "<p align=center style='color:red;'>Email này đã tồn tại trong CSDL của chúng tôi !!!</p>"; 
								else if(isset($khongnhapemail))
									echo "<p align=center style='color:red;'>Vui lòng nhập email của bạn vào !!!</p>"; 
								else if(isset($khongnhaphoten))
									echo "<p align=center style='color:red;'>Vui lòng nhập họ tên của bạn vào !!!</p>"; 
								else if(isset($khongnhappass))
									echo "<p align=center style='color:red;'>Vui lòng nhập mật khẩu của bạn vào !!!</p>"; 
								else if(isset($khongnhapsodt))
									echo "<p align=center style='color:red;'>Vui lòng nhập số điện thoại liên lạc !!!</p>"; 
								else if(isset($khongnhapdiachi))
									echo "<p align=center style='color:red;'>Vui lòng nhập địa chỉ liên hệ của bạn !!!</p>"; 
								
							?>
                        </form>
                    </div><!--end sign-up-->
                    
                </div>
</body>
</html>