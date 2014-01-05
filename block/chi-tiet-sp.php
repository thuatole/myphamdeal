<?php
	$ten_kd = $_GET['idDeal'];
	$idDeal = $tc->idDeal_theo_tenkhongdau($ten_kd);
	$idDeal =  mysql_fetch_array($idDeal);
	$idDeal = $idDeal[idDeal];
	$deal=$tc->LayDeal_theo_idDeal($idDeal);
	$row_deal=mysql_fetch_array($deal);
	$hinh=$tc->LayHinhTheoDeal($row_deal[idDeal]);
	$row_hinh=mysql_fetch_array($hinh);
?>

<div id="chi-tiet-sp">
					
                    <p class="ten-sp" style="padding-top:12px; padding-left:15px; font-size:28px;"><span><?php echo $row_deal[TenDeal]; ?> </span></p>
                    <div id="ct-table-gia">
                    	<div><p class="gia-deal"><?php echo number_format($row_deal[GiaKhuyenMai]); ?></p><p">Giá gốc: <span class="gia-goc"><?php echo number_format($row_deal[GiaGoc]); ?></span></p></div>
                        <div style="margin-left:50px;"><a class="ct-mua" id="btnMua" name="btnMua" href="page/xulygiohang.php?idDeal=<?php echo $row_deal[idDeal]; ?>&xuly=them">MUA</a></div>
                        
                        <!-- href="page/xulygiohang.php?productid=<?php //echo $row_deal[idDeal]; ?>&gia=<?php //echo $row_deal[GiaKhuyenMai]; ?>&command=add">MUA</a></div> -->
                        <div class="ct-table-deal">
                        <ul>
                        	<li><p>Giảm</p><p style="font-weight:600; font-size:14px; "><?php echo $row_deal[giam]; ?>%</p></li>
                        	<li><p>Tiết kiệm</p><p style="font-weight:600; font-size:14px; "><?php echo number_format($row_deal[tietkiem]); ?></p></li>
                        	<li><p>Ðã mua</p><p style="font-weight:600; font-size:14px; "><?php echo $row_deal[SoNguoiMua]; ?></p></li>
                        </ul>
                        </div><!--end .ct-table-deal-->
                       <p style="margin-top:20px;">Thời gian còn lại</p><p style="font-weight:600; font-size:18px;">
					   
                       <script type="application/javascript">
/*
1 hour = 3600 seconds
1 day = 86400 seconds
1 week = 604800 seconds
1 month = 2629744 seconds 
1 year = 31556926 seconds
*/
var myCountdown3 = new Countdown({
								 	time: <?php echo strtotime($row_deal[ntn_HetHan].' 00:00:00')-strtotime(date('Y-m-d h:i:s')).','; ?> //86400*4, 
									width:228, 
									height:45, 
									padding:0.9, 
									rangeHi:"day"
									});
</script></br>
					<span style="font-size:28px;color:#FF0000; font-weight:bold;"><?php if((strtotime($row_deal[ntn_HetHan].' 00:00:00')-strtotime(date('Y-m-d h:i:s'))) <= 0) echo 'Hết hạn'; ?></span>
                       </p>
                       <iframe src="http://www.facebook.com/plugins/like.php?href=http://www.myphamdeal.vn&amp;width=450&amp;action=like&amp;font=tahoma&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; margin-bottom:5px; overflow:hidden; width:100%; height:20px;"></iframe>
                    </div><!--end #ct-table-gia--> 
                    <div id="ct-galery">
                           <div class="imageBox">
                            <img src="data/<?php echo $row_hinh[URL]; ?>" alt="<?php echo $row_deal[TenDeal]; ?>" width="100%" />
                        </div><!-- end .imageBox-->
                               <ul id="featured" class="clearfix">
                            <?php $i=1;
							$hinh=$tc->LayHinhTheoDeal($row_deal[idDeal]);							
							while($row_hinh=mysql_fetch_array($hinh))
								{  ?>
                             <li>
                                <a href="data/<?php echo $row_hinh[URL]; ?>" <?php if($i==1) echo 'class="selected"'; ?>><?php echo $i; ?></a>
                            </li>                          
                            <?php $i++; } ?>                           
                        </ul>
                    </div><!--end #ct-galery-->
                    <div class="clear"></div>
<!-- class="ten-sp" style="padding:15px; margin-top:10px; float:left; font-size:18px; width:93%;" -->
                    <div id="ct-details"><?php echo $row_deal[MoTa]; ?></div>
                    <div id="ct-details"><?php echo $row_deal[NoiDung]; ?></div><!--end #ct-details-->
                    <div class="clear"></div>
                    <div id="map"><iframe width="725" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=25C%2F25+Ho%C3%A0i+Thanh,+ph%C6%B0%E1%BB%9Dng+14,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=25C%2F25+Ho%C3%A0i+Thanh+phu&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=25+Ho%C3%A0i+Thanh,+14,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;t=m&amp;z=14&amp;ll=10.739654,106.651325&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=vi&amp;geocode=&amp;q=25C%2F25+Ho%C3%A0i+Thanh,+ph%C6%B0%E1%BB%9Dng+14,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=25C%2F25+Ho%C3%A0i+Thanh+phu&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=25+Ho%C3%A0i+Thanh,+14,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam&amp;t=m&amp;z=14&amp;ll=10.739654,106.651325" style="color:#0000FF;text-align:left">Xem Bản đồ cỡ lớn hơn</a></small>
                    </div>
				</div><!-- end #chi-tiet-sp-->