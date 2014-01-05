<?php
	session_start();
	ob_start();
	require "../class/class.trangchu.php";
	$tc= new trangchu();
	$khachhang = $tc->LayIdKH_theo_Email($_SESSION['email']);
	$madh = $khachhang.($tc->SoDonHang()+1);
	$tc->ThemDonHang($madh, $khachhang, 0, date('Y-m-d H:i:s'), "");
	$i=0;
	foreach($_SESSION['cart'] as $dl)
	{		
		$tc->ThemCTDonHang($madh, $dl, $_SESSION['cart-soluong'][$i],"");
		$i++;
	}
	echo "Mã don hang : ".$madh."</br> idKhách hàng : ".$khachhang;
	unset($_SESSION['cart']);
	unset($_SESSION['cart-soluong']);
	unset($_SESSION['tongtien']);
	header("location:../index.php?p=thanhtoan");
?>