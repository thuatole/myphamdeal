<script language="JavaScript" type="text/javascript">	
	var retVal="" 
	var valReturned;
	
	function openModal() { 
		retVal=showModalDialog('page/dangnhap.php',null,'dialogHeight:350px;dialogWidth:500px;');
		
		valReturned=retVal.trim();
		if(valReturned != "Try again") 
		{
			document.getElementById("imgbox1").style.display="none";
			document.getElementById("uname").innerHTML="Xin chào : " + valReturned;
		}
		//alert('The following text has been returned: "'+valReturned+'"');	
		//return valReturned;
	}
</script>

<div id="wrap-header">
        	<div id="logo">
            	<a href="#">
                <img src="images/logo.png" width="700px;" />
                </a>
            </div><!--end #logo-->
			<ul id="nav" style="margin-left:730px; list-style:none;">
					<li class="show">
                    <a target="bc" id="uname" name="uname"></a>						
                    	<div id="menu-acc">
                        	<ul>
                            	<li><a href="index.php?p=xemlai">Xem đơn hàng</a></li>
                                <li><a href="#">Sửa tài khoản</a></li>
                                <li><a href="page/thoat.php">Thoát</a></li>
                            </ul>
                        </div>                        
                    </li>
			</ul>
			<div id="imgbox1" >
            <ul id="nav" style="margin-left:730px; list-style:none;">
					
                	<li class="show">
                    <a href="#" onClick="openModal()">Đăng nhập</a>
                  <!--  <a target="bc" onclick="open('page/dangnhap.php','bc','width=400px, height=500px, scrollbars=yes');">Đăng nhập</a>						--> <!--
                    	<div id="menu-acc">
                        	<ul>
                            	<li><a onclick="open('dangnhap.php','bc','width=300px, height=300px, scrollbars=yes');">Xem đơn hàng</a></li>
                                <li><a>Sửa tài khoản</a></li>
                                <li><a>Thoát</a></li>
                            </ul>
                        </div><!--end #menu-acc-->
                        
                    </li>
                    <li style="margin-left:20px;"><a target="bc" onclick="open('page/dangky.php','bc','width=500px, height=500px, left=250px, top=100px, scrollbars=yes');">Đăng ký nhanh</a> 
                    </li>
            </ul><!--end #nav-->
			</div>
            <?php include("include/giohang.php"); ?>
        </div><!--end #wrap-header-->
        