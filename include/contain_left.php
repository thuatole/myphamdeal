<div id="content-left">
<?php
									switch($p)
									{
										default : require "block/deal_trangchu.php";
										break;
										case "dealtheoloai" : require "block/deal_theo_loai.php";
										break;
										case "gioithieu" : require "block/gioithieu.php";
										break;
										case "lienhe" : require "block/lienhe.php";
										break;
										case "trogiup" : require "block/trogiup.php";
										break;
										case "dealgiatot" : require "block/deal_giatot.php";
										break;
										case "chitietdeal" : require "block/chi-tiet-sp.php";
										break;
										case "timkiem" : require "block/timkiem.php";
										break;
										case "giohang" : require "block/giohang.php";
										break;
										case "thanhtoan" : require "block/thanhtoan.php";
										break;
										case "cdn" : require "block/chuadangnhap.php";
										break;
										case "xemlai" : require "block/xemlai.php";
										break;
										case "trangchu" : require "block/deal_trangchu.php";
										break;
									}
?>                
</div><!-- end #content-left-->