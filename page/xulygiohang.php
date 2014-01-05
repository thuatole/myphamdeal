<?php
	session_start();
	ob_start();		
	require "../class/class.trangchu.php";
	$tc= new trangchu();	
	$i=0;$them=true;$tongtien=0;
	if($_GET['xuly']=="them")
	{
		$idDeal=$_GET['idDeal'];
		$items_count = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
		
		if(isset($_SESSION['cart'])|count($_SESSION['cart'])!=0)
			foreach($_SESSION['cart'] as $id)
			{
				/*Tinh so luong*/
				if($id==$idDeal)				
					{$_SESSION['cart-soluong'][$i]+=1;$them=false;}
				$i++;
			}		
		if($them)
		{				
			$_SESSION['cart'][$items_count]=$idDeal;
			$_SESSION['cart-soluong'][$items_count]=1;
		}		
	}
	else if($_GET['xuly']=="xoa")		
	{
		unset($_SESSION['cart'][$_GET['item']]);
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		unset($_SESSION['cart-soluong'][$_GET['item']]);
		$_SESSION['cart-soluong'] = array_values($_SESSION['cart-soluong']);
	}
	/*Tinh tong so tien*/
	$i=0;
	if(isset($_SESSION['cart']))
		foreach($_SESSION['cart'] as $id)
		{
			$deal=$tc->LayDeal_theo_idDeal($id);
			$row_deal=mysql_fetch_array($deal);
			$tongtien+=$row_deal[GiaKhuyenMai]*$_SESSION['cart-soluong'][$i];
			$i++;
		}
	$_SESSION['tongtien']=$tongtien;
		
	header("location:../index.php?p=giohang");
?>