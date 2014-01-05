<div id="chi-tiet-sp">					
   <p class="ten-sp" style="padding-top:12px; padding-left:15px; font-size:28px; color:#666600;"><span>GIỎ HÀNG</span></p>
   <p style="padding-left:16px;padding-right:18px;">   
	<?php if(!isset($_SESSION['email'])) header("location:index.php?p=cdn"); ?>
<table width="98%" height="186" border="1" cellpadding="1" cellspacing="0" style="padding-left:20px;">
    <tr valign="middle" style="background:url(images/col_bg.gif);">
      <td height="51" align="center"><span></br>STT</span></td>
            <td align="center" ><span></br>Mã đơn hàng</span></td>
            <td align="center" ><span></br>Ngày mua</span></td>
            <td align="center" ><span></br>Trạng thái</span></td>
            <td align="left" >&nbsp;</td>
    </tr>
          <?php $stt=1;$tongtien=0; $DSXemLaiDH=$tc->XemLaiDonHang($_SESSION['email']); while($row_donhang=mysql_fetch_array($DSXemLaiDH))
			{	?>			
          <tr valign="middle" bgcolor=<?php if($stt%2==0) echo "#dfedf3"; else echo "#F0FFFF";?>>
            <td align="center" valign="middle"><?php echo $stt; ?></td>
            <td align="center"><?php echo "ĐH - ".$row_donhang[MaDH]; ?></td>
            <td align="center"><?php echo date_format(date_create($row_donhang[NgayMua]), 'd-m-Y'); ?></td>
            <td align="center"><?php if($row_donhang[TrangThai]==0) echo "Đang xác nhận"; else "Đã xác nhận"; ?></td>
            <td align="left"><a href="index.php?p=xemlai&madh=<?php echo $row_donhang[MaDH]; ?>" >Xem chi tiết</a></td>
          </tr>
          <?php $stt++; } ?>
          <tr bgcolor="#dfedf3">
            <td align="center" valign="middle" colspan="7"></td>
          </tr>     
  </table>
   </p>
   <!-- CHI TIẾT ĐƠN HÀNG -->
	<?php if(!isset($_GET['madh'])) { echo "</div>"; return;} ?>
   <p style="padding-left:16px;padding-right:18px;">   
<table width="98%" height="186" border="1" cellpadding="1" cellspacing="0" style="padding-left:20px;">
    <tr valign="middle" style="background:url(images/col_bg.gif);">
      <td height="51" align="center"><span></br>STT</span></td>
            <td align="center" ><span></br>Mã đơn hàng</span></td>
            <td align="center" ><span></br>Tên Deal</span></td>
            <td align="center" ><span></br>Số lượng</span></td>
            <td align="left" >&nbsp;</td>
    </tr>
          <?php $stt=1;$tongtien=0; $DSXemLaiCTDH=$tc->XemLaiCTDonHang($_GET['madh']); while($row_ctdonhang=mysql_fetch_array($DSXemLaiCTDH))
			{	$deal=$tc->LayDeal_theo_idDeal($row_ctdonhang[Deal]); $row_deal=mysql_fetch_array($deal); ?>			
          <tr valign="middle" bgcolor=<?php if($stt%2==0) echo "#dfedf3"; else echo "#F0FFFF";?>>
            <td align="center" valign="middle"><?php echo $stt; ?></td>
            <td align="center"><?php echo "ĐH - ".$_GET[madh]; ?></td>
            <td align="center"><a href="index.php?p=chitietdeal&idDeal=<?php echo $row_ctdonhang[Deal]; ?>" ><?php echo $row_deal[TenDeal]; ?></a></td>
            <td align="center"><?php echo $row_ctdonhang[SoLuong]; ?></td>
            <td align="left"></td>
          </tr>
          <?php $stt++; } ?>
          <tr bgcolor="#dfedf3">
            <td align="center" valign="middle" colspan="7"></td>
          </tr>     
  </table>
   </p>
 </div> 
 <div style="clear:both;"></div>