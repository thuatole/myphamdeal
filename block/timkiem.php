<?php
	$key = $_GET['keyword'];
	$timkiemdeal=$tc->TimKiemDeal($key,$from,$sosp_1trang);
	$soketquatim=$tc->Sum_TimKiemDeal($key);
	while($row_timkiem=mysql_fetch_array($timkiemdeal))
	{
	$hinh=$tc->LayHinhTheoDeal($row_timkiem[idDeal]);
	$row_hinhdaidien=mysql_fetch_array($hinh);
?>

<div class="mot-sp">
                	<p class="ten-sp"><span><?php echo $row_timkiem[TenDeal]; ?> </span></p><!--end #ten-sp-->
                    <div style="position:relative;">
                    	<img height="170px" src="data\\<?php echo $row_hinhdaidien[URL]; ?>" />
                    	<span style="position:absolute; top:135px; left:5px; background-color:#f36e06; color:#FFFFFF; text-decoration: line-through; padding:5px;"><?php echo number_format($row_timkiem[GiaGoc]); ?></span>
                        <span style="position:absolute; font-weight:bold; top:129px; left:75px; background-color:#3dadd9; color:#FFFFFF; padding:8px;"><?php echo number_format($row_timkiem[GiaKhuyenMai]); ?></span>
                    </div><!-- end #pic-sp-->
                    <p class="mota-sp"><?php echo $row_timkiem[MT]."..."; ?>.</p><!--end #mota-sp-->
                    <p class="time-btn" style="padding-left:5px; color:#FF0000;"><span style="font-weight:bold;">Ngày hết hạn : <?php echo date("d-m-Y", strtotime($row_timkiem[ntn_HetHan])); ?></span>
                    <a href="index.php?p=chitietdeal&idDeal=<?php echo $row_timkiem[idDeal]; ?>">Xem</a></p><!--end time-btn-->
</div><!--end #mot-sp-->
<?php } ?>

<div style="clear:both;"></div>
<p align=center>
			<div align="center" style="font-size:20px;color:white;">
			<?php
				$so_sp = $soketquatim;
				$sotrang = ceil($so_sp/$sosp_1trang);
				$maxPage = $sotrang;
				$nav='';			
				if($sotrang-6 <= $page) $trangcuoi= $sotrang; else $trangcuoi=$page+6;
				for($i=$page; $i<=$trangcuoi; $i++)
				{
					if($i==$page)
					{
						$n=$i+1;
						$p=$i-1;
						$nav.=$i;
						$next="<a style='color:pink;' href='index.php?p=timkiem&keyword=$key&page=$n'> >> </a>";
						$prev="<a style='color:pink;' href='index.php?p=timkiem&keyword=$key&page=$p'> << </a>";
						$first="<a style='color:pink;' href='index.php?p=timkiem&keyword=$key&page=1'> Trang đầu </a>";
						$last="<a style='color:pink;' href='index.php?p=timkiem&keyword=$key&page=$sotrang'> Trang cuối </a>";
						if($page==1)
						{
							$first='';
							$prev='';
						}            
					}else					
						$nav.="<a style='color:pink;' href='index.php?p=timkiem&keyword=$key&page=$i'> $i </a>";
					
					if($page==$maxPage)
					{
						$next='';
						$last='';        
					}        
				}
				echo $first;
				echo $prev; 
				echo $nav;
				echo $next;
				echo $last;				
			?>      
			</div>
			<span style="float:right; color:red;" ><?php echo $sotrang; ?> trang </span>
</p>