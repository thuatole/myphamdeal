

<div id="divBasket" style="display:block; float:left; margin-top:10px;" class="bg-cart">

<div class="amo-cart">
    <a href="index.php?p=giohang" class="cart">
    <sup><?php $items_count = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
			   if($items_count!=0) echo $items_count; ?></sup>
<span style="margin-left:16px;"> <?php if(isset($_SESSION['tongtien'])) echo number_format($_SESSION['tongtien']); else echo "0";?><sup>đ</sup></span></a>
    <span class="btn-thanhtoan" style="margin-top:0px; margin-right:10px; float:right;"><a style="margin:0" href="index.php?p=giohang"><img src="images/dai-ly-4.png" width="40px" /></a></span>
    <a class="icoppCart" id="aShowPopupLikeCart"></a>
</div>

</div>