<?php
	ob_start('ob_gzhandler');
	session_start();
	ob_start();
	require "class/class.trangchu.php";
	$tc= new trangchu();
	$p = $_GET["p"];
	$sosp_1trang = 18;
	if(isset($_GET["page"]))
		{
			$page = $_GET["page"];
		}
		else
		{$page=1;}
	$from = ($page-1)*$sosp_1trang;
	
	if(isset($_GET["lang"]))
	{
		$_SESSION["lang"]=$_GET["lang"];
		header("location:".$_SESSION["url"]);
	}
	if(!isset($_SESSION["lang"]))
	{
		$_SESSION["lang"]="vi";
	}	
	$lang=$_SESSION["lang"];
	$_SESSION["url"]=$_SERVER['REQUEST_URI'];	
	//require "lang/$lang.php";	
	
	if(isset($_POST["txtSearch"]))	{$p="timkiem";}
	//if(isset($_GET['command'])) if($_GET['command']=="add")header("location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://localhost/myphamdeal/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<Meta name="description" content="myphamdeal, mỹ phẩm deal, my pham deal, Chuyên cung cấp sỉ và lẻ mỹ phẩm trị nám tàn nhang, trắng da, trị mụn, thuốc giảm cân, tan mỡ, tắm trắng, kem nền, phấm son, nhận đặt hàng mẫu theo yêu cầu của các Spa">	
<Meta name="keywords" content="myphamdeal, mỹ phẩm deal, my pham deal, Sansiro, Rita, Vintage, Voan , Jean, Ribon, Rayon, Medicine, Mask, Snail, Hello Kitty, White Body, Cathy, Federal Bath, Bonjour, Jackelin, Mat ong, Giam can, nước hoa cao cấp Gucci, lancome, Calvin Clein, Elizabeth Arden,thoi trang, thoi trang han quoc, thoi trang cong so, my pham, qua tang">
<title>.:: MỸ PHẨM DEAL ::.</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />

<link href="images/logo-icon.ico" rel="shortcut icon" type="x-icon">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/countdown.js"></script>
<script type="text/javascript" src="js/url-text.js"></script>
<!-- <script type="text/javascript" src="js/jquery-menu.js"></script> -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46805752-1', 'myphamdeal.vn');
  ga('send', 'pageview');

</script>
<script>
function check() { 
		if(<?php echo isset($_SESSION['email']);?>)
		{
			document.getElementById("imgbox1").style.display="none";
			document.getElementById("uname").innerHTML="Xin chào : " + "<?php echo $tc->LayHoTenKH_theo_Email($_SESSION['email']);?>";
		}
		if(<?php echo isset($_GET['p']);?>)
		{
			location.href="#myanchor"
		}
	}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
$(window).scroll(function () {
if ($(this).scrollTop() > 100) $('.to_top').fadeIn();
else $('.to_top').fadeOut();
});
$('.to_top').click(function () {
$('body,html').animate({scrollTop: 0}, 'slow');
});
});
</script>

</head>
<body onload="check()">	

	<?php include("include/header.php"); ?>       
    <div class="clear"></div>
    <?php include("include/menu_ngang.php"); ?>
    <div class="clear"></div>
           
	<div id="wrapper">  
        <?php include("include/quangcao_top.php"); ?>
        <?php include("include/sp_noibat.php"); ?>            
        <div id="content">        
        <a id='myanchor' href='#'></a>	
        	<?php include("include/contain_left.php"); ?> 
            <?php include("include/contain_right.php"); ?>            
        </div><!--end #content-->
        <a href="#to_top" class="to_top" title="Lên trên" rel="nofollow">Lên trên</a>
	</div><!--end #wrapper-->
	
    <?php include("include/footer.php"); ?>
    
</body>
</html>