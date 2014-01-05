<?php

//if(isset($_POST['btn-sign-in']))
	//if($tc->DangNhapThanhCong($_POST['email'],md5($_POST['password'])))	
	//{
		//$mail = $_POST['email'];
			
	//}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> -- ĐĂNG NHẬP -- </title>
<link href="../css/index.css" rel="stylesheet" type="text/css" />
<link href="../images/logo-icon.ico" rel="shortcut icon" type="x-icon">
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script>
	$(document).ready(function(){			
		$("#btn-sign-in").click(function(){		
		var email = $('#email').val();
		var password = $('#password').val();
		$.get("ajax-dangnhap.php",{email:email,password:password},function(data){
		returnValue=data;window.close()
		});			
		});
	});
</script>
</head>

<body>
<div id="sign-up-in" style="width:90%; padding-left:10px;">
                	<p style="color:#FFFFFF; font-size:28px; font-weight:700; margin-left:15px;  text-shadow:1px 1px #000000;">Đăng nhập</p>
                    <div class="clear"></div>
                	<div id="sign-in" style="width:90%;">
                    	<p style="color:#FFFFFF; font-size:20px; font-weight:600; text-shadow:1px 1px #000000; margin-left:10px;">Đăng nhập</p>
                        <div class="clear"></div>
                        <form id="form-sign-in" style="margin-left:15px;" action="" method="get">
                        	<p>
                       	  		<p>Email</p>
                           		<p><input type="text" size="30" id="email" name="email" /></p>
                            </p>
                            <p>
                            	<p>Password</p>
                                <p><input type="password" size="30" id="password" name="password" /></p>
                            </p>
                            <p><input type="button" name="btn-sign-in" id="btn-sign-in" onclick=""  value="Đăng nhập" /></p>                     
						</form>
                    </div><!-- end #sign-in-->
</div> 
</body>
</html>
