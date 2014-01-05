<style type="text/css">
<!--
.style4 {
	font-size: 18px;
	color: #FF0000;
}
.style6 {font-size: 18px; font-weight: bold; color: #FF0000; margin-top:30px; }
-->
</style>

<div id="chi-tiet-sp">					
   <p class="ten-sp" style="padding-top:12px; padding-left:15px; font-size:28px; color:#666600;"><span>GIỎ HÀNG</span></p>
   <p style="padding-left:16px;padding-right:18px;">   
	<?php if(!isset($_SESSION['email'])) header("location:index.php?p=cdn"); ?>
  <table width="98%" height="186" border="1" cellpadding="1" cellspacing="0" style="padding-left:20px;">
    <tr valign="middle" style="background:url(images/col_bg.gif);">
      <td height="51" align="center"><span class="style6"></br>STT</span></td>
            <td align="center" ><span class="style6"></br>Sản phẩm</span></td>
            <td align="center" ><span class="style6"></br>Hình ảnh</span></td>
            <td align="center" ><span class="style6"></br>Đơn giá</span></td>
            <td align="center" ><span class="style6"></br>Số lượng</span></td>
            <td align="center" ><span class="style6"></br>Thành tiền</span></td>
            <td align="left" >&nbsp;</td>
    </tr>
          <?php $stt=1;$tongtien=0; if(isset($_SESSION['cart'])) foreach($_SESSION['cart'] as $id) {		  
			$deal=$tc->LayDeal_theo_idDeal($id);
			$row_deal=mysql_fetch_array($deal);
			$hinh=$tc->LayHinhTheoDeal($row_deal[idDeal]);
			$row_hinh=mysql_fetch_array($hinh);
			?>
          <tr valign="middle" bgcolor=<?php if($stt%2==0) echo "#dfedf3"; else echo "#F0FFFF";?>>
            <td align="center" valign="middle"><?php echo $stt; ?></td>
            <td valign="middle"><?php echo $row_deal[TenDeal]; ?></td>
            <td align="center"><img src="data\<?php echo $row_hinh[URL]; ?>" width="60px;" /></td>
            <td align="center"><?php echo number_format($row_deal[GiaKhuyenMai]); ?></td>
            <td align="center"><?php echo $_SESSION['cart-soluong'][$stt-1]; ?></td>
            <td align="center"><?php $thanhtien=$row_deal[GiaKhuyenMai]*$_SESSION['cart-soluong'][$stt-1];
			 						 $tongtien=$tongtien + $thanhtien; echo number_format($thanhtien); ?></td>
            <td align="left"><a href="page/xulygiohang.php?item=<?php echo $stt-1; ?>&xuly=xoa" >Xóa</a></td>
          </tr>
          <?php $stt++; } ?>
          <tr bgcolor="#dfedf3">
            <td align="center" valign="middle" colspan="7"><?php if(!isset($_SESSION['cart'])|count($_SESSION['cart'])==0) echo "<p align=center>Bạn chưa chọn sản phẩm nào.</p>"; else echo "</br>"; ?></td>
          </tr>
          <?php if($tongtien!=0)
		  {
		  	 $_SESSION['tongtien']=$tongtien;
			 echo '<tr bgcolor="#F0FFFF">		  	
            <td align="right" valign="middle" colspan="6" style="color:#0000FF; font-size:16px; font-weight:bold;">Tổng cộng : '.number_format($tongtien).'</td><td></td></tr>';
		  }
		  ?>
          <tr bgcolor="#dfedf3">
            <td align="center" valign="middle" colspan="7">&nbsp;</td>
          </tr>
  </table>
 </p>
<p align="center">
 <a href="page/xulythanhtoan.php"><img src="images/btn_12.gif" alt="Thanh toán" onmouseover="this.src='images/btn_12_.gif'" onmouseout="this.src='images/btn_12.gif'" /></a>
 </p>
 </div> 
