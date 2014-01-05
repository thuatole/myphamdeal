<?php 
ob_start();
session_start();
if(!isset($_SESSION['dntc@!@#$%^']))
	header('location:dangnhap.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Quản lý website mỹ phẩm deal ::.</title>

</head>

<body>
<div align="center" style="padding-top:100px;">
	<table width="729" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="91">&nbsp;</td>
    <td width="466" height="40" bgcolor="#00FF00"><blockquote>
      <p><a href="loai_deal.php" style="text-decoration:none;"><strong>QUẢN LÝ LOẠI DEAL</strong></a></p>
    </blockquote></td>
    <td width="154">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#00FFFF"><blockquote>
      <p><a href="deal.php" style="text-decoration:none;"><strong>QUẢN LÝ DEAL</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#9966FF"><blockquote>
      <p><a href="hinhanh.php" style="text-decoration:none;"><strong>QUẢN LÝ HÌNH ẢNH</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  <!--
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#FFFF66"><blockquote>
      <p><a href="deal_ua_thich.php" style="text-decoration:none;"><strong>QUẢN LÝ DEAL ƯA THÍCH</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#66CC66"><blockquote>
      <p><a href="khach_hang.php" style="text-decoration:none;"><strong>QUẢN LÝ KHÁCH HÀNG</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  -->
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#CC6633"><blockquote>
      <p><a href="don_hang.php" style="text-decoration:none;"><strong>QUẢN LÝ ĐƠN HÀNG</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  <!--
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#6699CC"><blockquote>
      <p><a href="ct_donhang.php" style="text-decoration:none;"><strong>QUẢN LÝ CT ĐƠN HÀNG</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#999999"><blockquote>
      <p><a href="trangthai_donhang.php" style="text-decoration:none;"><strong>QUẢN LÝ TRẠNG THÁI ĐƠN HÀNG</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#FF9999"><blockquote>
      <p><a href="binhluan.php" style="text-decoration:none;"><strong>QUẢN LÝ BÌNH LUẬN</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  -->
  <tr>
    <td>&nbsp;</td>
    <td height="40" bgcolor="#FF9999"><blockquote>
      <p><a href="dangnhap.php?dn=thoat" style="text-decoration:none;"><strong>Thoát khỏi hệ thống</strong></a></p>
    </blockquote></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
</body>
</html>