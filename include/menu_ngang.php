<div id="menu">
            	<ul>
                	<li class="purple"><a <?php if($p==null||$p=="deal_trangchu") echo "id='onpage'" ?> class="active" href="my-pham-deal">Trang chủ</a></li>
                    <li class="blue"><a <?php if($p=="gioithieu") echo "id='onpage'" ?> class="active" href="gioi-thieu">Giới thiệu</a></li>
                    <li class="green"><a class="active" href="#">Sản phẩm</a>
                    	<div id="menu-sub">
                        <?php $loaideal=$tc->DanhSachLoaiDeal();
						while($row_loaideal=mysql_fetch_array($loaideal))
						 {?>
                        	<p><a href="index.php?p=dealtheoloai&idLoai=<?php echo $row_loaideal[idLoaiDeal]; ?>"><?php echo $row_loaideal[TenLoai]; ?></a></p>
                            <?php }?>
                        </div><!--end #menu-sub-->
                    </li>
                    <li class="purple"><a <?php if($p=="deal_giatot") echo "id='onpage'" ?> class="active" href="deal-gia-tot">Deal giá tốt</a></li>
                    <li class="blue"><a <?php if($p=="lienhe") echo "id='onpage'" ?> class="active" href="lien-he">Liên hệ</a></li>
                    <li class="green"><a <?php if($p=="trogiup") echo "id='onpage'" ?> class="active" href="tro-giup">Trợ giúp</a></li>
                   
                </ul>
                <form action="index.php" method="get" id="header-subscribe-form" class="validator">
                        <div class="bg-email-new">
                            <span class="bg-email-new"><span class="email-new-inner"><i>DEAL:</i>
							<input id="zipsearch" type="text" value="" class="inputmail ui-autocomplete-input" name="keyword" placeholder="Nhập tên sản phẩm cần tìm" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></span>
							<span class="email-new-border"></span></span>
                            <span class="shadow-email"></span>  
						<input type="hidden" name="p" value="timkiem">
							</div>
						</form>
            </div><!--end #menu-->