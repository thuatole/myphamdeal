<?php 
$dealnoibat=$tc->DealNoiBat();
$row_dealnoibat=mysql_fetch_array($dealnoibat);
$hinh=$tc->LayHinhTheoDeal($row_dealnoibat[idDeal]);
$row_hinhdaidien=mysql_fetch_array($hinh);
 ?>
<img src="data/<?php echo $row_hinhdaidien[URL]; ?>" />

<div id="noi-bat-nd">
    <p class="noi-bat-tieude"><span><?php echo $row_dealnoibat[TenDeal]; ?> </span></p>
    <p class="noi-bat-gia" style="overflow:hidden; width:100%;">
        <div style="float:left;"><p class="gia-deal"><?php echo number_format($row_dealnoibat[GiaKhuyenMai]); ?> VNĐ</p>
        <p>Giá gốc: <span class="gia-goc"><?php echo number_format($row_dealnoibat[GiaGoc]); ?> VNĐ</span></p></div>
        <div style="float:left;"><a class="xem" href="chi-tiet/<?php echo $row_dealnoibat[TenDeal_SL]; ?>">XEM</a></div>
    </p><!--end .noi-bat-gia-->
    <div class="clear"></div>
    <ul class="table-gia">
        <li><p>Giảm</p><p style="font-weight:600; font-size:18px; "><?php echo $row_dealnoibat[giam]; ?> %</p></li>
        <li><p>Tiết kiệm</p><p style="font-weight:600; font-size:18px; "><?php echo number_format($row_dealnoibat[tietkiem]); ?> VNĐ</p></li>
        <li><p>Đã mua</p><p style="font-weight:600; font-size:18px; "><?php echo $row_dealnoibat[SoNguoiMua]; ?></p></li>
        <li><p>Thời gian còn lại</p><p style="font-weight:600; font-size:18px; ">		
		        
<script type="application/javascript">
/*
1 hour = 3600 seconds
1 day = 86400 seconds
1 week = 604800 seconds
1 month = 2629744 seconds 
1 year = 31556926 seconds
*/
var myCountdown3 = new Countdown({
								 	time: <?php echo strtotime($row_dealnoibat[ntn_HetHan].' 00:00:00')-strtotime(date('Y-m-d h:i:s')).','; ?> //86400*4, 
									width:200, 
									height:30, 
									padding:0.9, 
									rangeHi:"day"
									});
</script>
        </p></li>
    </ul>
   
</div><!-- end#noi-bat-nd-->