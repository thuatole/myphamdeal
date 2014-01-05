<?
	require "class.db.php";
	class trangchu extends db
	{			
		function DanhSachDeal()
		{
			$qr="select * from deal";
			return mysql_query($qr);
		}
		function DanhSachDeal_trangchu($from,$sotin_1trang)
		{
			$qr="select *,SUBSTRING(MoTa, 1, 120) as 'MT',GiaGoc-GiaKhuyenMai as 'tietkiem', Round(((GiaGoc-GiaKhuyenMai)/GiaGoc)*100,0) as 'giam', Concat(year(ThoiDiemDang),'-',month(ThoiDiemDang),'-',day(ThoiDiemDang)) as 'ntn_Dang', Concat(year(ThoiDiemHetHan),'-',month(ThoiDiemHetHan),'-',day(ThoiDiemHetHan)) as 'ntn_HetHan' from deal ORDER BY ThoiDiemDang DESC limit $from,$sotin_1trang";
			return mysql_query($qr);
		}		
		function Sum_DealTrangChu()
		{
			$qr = mysql_query("select * from deal");
			$row = mysql_num_rows($qr);
			return $row;	 
		}
		function DanhSachLoaiDeal()
		{
			$qr="select * from loaideal";
			return mysql_query($qr);
		}
		function DealNoiBat()
		{
			$qr="select *,SUBSTRING(MoTa, 1, 120) as 'MT',GiaGoc-GiaKhuyenMai as 'tietkiem', Round(((GiaGoc-GiaKhuyenMai)/GiaGoc)*100,0) as 'giam', Concat(year(ThoiDiemDang),'-',month(ThoiDiemDang),'-',day(ThoiDiemDang)) as 'ntn_Dang', Concat(year(ThoiDiemHetHan),'-',month(ThoiDiemHetHan),'-',day(ThoiDiemHetHan)) as 'ntn_HetHan' from deal where GiaTot=-1 ORDER BY DATE(ThoiDiemDang) DESC";
			return mysql_query($qr);
		}
	function DSDealNoiBat($from,$sotin_1trang)
		{
			$qr="select *,SUBSTRING(MoTa, 1, 120) as 'MT',GiaGoc-GiaKhuyenMai as 'tietkiem', Round(((GiaGoc-GiaKhuyenMai)/GiaGoc)*100,0) as 'giam', Concat(year(ThoiDiemDang),'-',month(ThoiDiemDang),'-',day(ThoiDiemDang)) as 'ntn_Dang', Concat(year(ThoiDiemHetHan),'-',month(ThoiDiemHetHan),'-',day(ThoiDiemHetHan)) as 'ntn_HetHan' from deal where GiaTot=-1 ORDER BY DATE(ThoiDiemDang) DESC limit $from,$sotin_1trang";
			return mysql_query($qr);
		}
		function Sum_DealNoiBat()
		{
			$qr = mysql_query("select * from deal where GiaTot=-1");
			$row = mysql_num_rows($qr);
			return $row;	 
		}
		function DealGiaTot($from,$sotin_1trang)
		{
			$qr="select *,SUBSTRING(MoTa, 1, 120) as 'MT',GiaGoc-GiaKhuyenMai as 'tietkiem', Round(((GiaGoc-GiaKhuyenMai)/GiaGoc)*100,0) as 'giam', Concat(year(ThoiDiemDang),'-',month(ThoiDiemDang),'-',day(ThoiDiemDang)) as 'ntn_Dang', Concat(year(ThoiDiemHetHan),'-',month(ThoiDiemHetHan),'-',day(ThoiDiemHetHan)) as 'ntn_HetHan' from deal where GiaTot=-1 ORDER BY DATE(ThoiDiemDang) DESC limit $from,$sotin_1trang";
			return mysql_query($qr);
		}
		function TimKiemDeal($keyword,$from,$sotin_1trang)
		{
			$qr="select *,SUBSTRING(MoTa, 1, 120) as 'MT',GiaGoc-GiaKhuyenMai as 'tietkiem', Round(((GiaGoc-GiaKhuyenMai)/GiaGoc)*100,0) as 'giam', Concat(year(ThoiDiemDang),'-',month(ThoiDiemDang),'-',day(ThoiDiemDang)) as 'ntn_Dang', Concat(year(ThoiDiemHetHan),'-',month(ThoiDiemHetHan),'-',day(ThoiDiemHetHan)) as 'ntn_HetHan' from deal where 
			TenDeal like '%$keyword%' or MoTa like '%$keyword%'
ORDER BY DATE(ThoiDiemDang) DESC limit $from,$sotin_1trang";
			return mysql_query($qr);
		}
		function Sum_TimKiemDeal($keyword)
		{
			$qr=mysql_query("select * from deal where TenDeal like '%$keyword%' or MoTa like '%$keyword%'");
			$row = mysql_num_rows($qr);
			return $row;
		}		
		function LayHinhTheoDeal($idDeal)
		{
			$qr="select * from hinh where idDeal=$idDeal ORDER BY HinhDaiDien DESC, idHinh DESC";
			return mysql_query($qr);
		}
		function LayDeal_theo_LoaiDeal($idLoaiDeal,$from,$sotin_1trang)
		{
			$qr="select *,SUBSTRING(MoTa, 1, 120) as 'MT' from deal where LoaiDeal=$idLoaiDeal ORDER BY ThoiDiemDang DESC limit $from,$sotin_1trang";
			return mysql_query($qr);
		}
		function Sum_Deals_theo_LoaiDeal($idLoaiDeal)
		{
			$qr=mysql_query("select * from deal where LoaiDeal=$idLoaiDeal");
			$row = mysql_num_rows($qr);
			return $row;	
		}
		function LayDeal_theo_idDeal($idDeal)
		{
			$qr="select *,GiaGoc-GiaKhuyenMai as 'tietkiem', Round(((GiaGoc-GiaKhuyenMai)/GiaGoc)*100,0) as 'giam', Concat(year(ThoiDiemDang),'-',month(ThoiDiemDang),'-',day(ThoiDiemDang)) as 'ntn_Dang', Concat(year(ThoiDiemHetHan),'-',month(ThoiDiemHetHan),'-',day(ThoiDiemHetHan)) as 'ntn_HetHan' from deal where idDeal=$idDeal";
			return mysql_query($qr);
		}
		function LienKetWebsite()
		{//khong su dung
			$qr="select * from lienketweb";
			return mysql_query($qr);
		}
		function KetQuaTim($tim1,$tim2,$tim3,$chude,$from,$sotin_1trang)
		{ 
			if($chude == 1) //Chi tiet tin <- tin noi bo
				return mysql_query("select *,year(NgayDang) as nam,month(NgayDang) as thang,day(NgayDang) as ngay from chitiettin where LoaiTin=2 and TrangThai=1 and TieuDe like '%$tim1%' limit $from,$sotin_1trang");
			if($chude == 2) //Van ban den
				return mysql_query("select *,year(Ngay) as nam,month(Ngay) as thang,day(Ngay) as ngay from vanban where LoaiVB=0 and TrichYeu like '%$tim2%' limit $from,$sotin_1trang");
			if($chude == 3) //Van ban di
				return mysql_query("select *,year(Ngay) as nam,month(Ngay) as thang,day(Ngay) as ngay from vanban where LoaiVB=1 and TrichYeu like '%$tim3%' limit $from,$sotin_1trang");
		}	
		function Sum_TimKiem($tim1,$tim2,$tim3,$chude)
		{
			if($chude == 1)
			{
				$qr = mysql_query("select * from chitiettin where LoaiTin=2 and TrangThai=1 and TieuDe like '%$tim1%'");
				$row = mysql_num_rows($qr);
				return $row;	 
			}
			if($chude == 2)
			{
				$qr = mysql_query("select * from vanban where LoaiVB=0 and TrichYeu like '%$tim2%'");
				$row = mysql_num_rows($qr);
				return $row;
			}		
			if($chude == 3)
			{
				$qr = mysql_query("select * from vanban where LoaiVB=1 and TrichYeu like '%$tim3%'");
				$row = mysql_num_rows($qr);
				return $row;
			}	
		}
		function ChiTietTin($idTin,$chude)
		{
			if($chude == 1) //Chi tiet tin <- tin noi bo
				return mysql_query("select *,year(NgayDang) as nam,month(NgayDang) as thang,day(NgayDang) as ngay from chitiettin where LoaiTin=2 and TrangThai=1 and STT=$idTin");
			if($chude == 2) //Van ban den
				return mysql_query("select *,year(Ngay) as nam,month(Ngay) as thang,day(Ngay) as ngay from vanban where LoaiVB=0 and STT=$idTin");
			if($chude == 3) //Van ban di
				return mysql_query("select *,year(Ngay) as nam,month(Ngay) as thang,day(Ngay) as ngay from vanban where LoaiVB=1 and STT=$idTin");
		}			
		function DanhSachTin($chude,$from,$sotin_1trang)
		{//,year(Ngay)&' - '&month(Ngay)&' - '&day(Ngay) as ntn
			if($chude == 1) //Chi tiet tin <- tin noi bo
				return mysql_query("select *,Concat(day(NgayDang),' - ',month(NgayDang),' - ',year(NgayDang)) as ntn from chitiettin where LoaiTin=2 and TrangThai=1 limit $from,$sotin_1trang");
			if($chude == 2) //Van ban den
				return mysql_query("select *,Concat(day(Ngay),' - ',month(Ngay),' - ',year(Ngay)) as ntn from vanban where LoaiVB=0 limit $from,$sotin_1trang");
			if($chude == 3) //Van ban di
				return mysql_query("select *,Concat(day(Ngay),' - ',month(Ngay),' - ',year(Ngay)) as ntn from vanban where LoaiVB=1 limit $from,$sotin_1trang");			
		}		
		function LayThuMucAnh_theo_MaTM($MaTM)
		{
			$qr="select * from thumucanh where STT=$MaTM and TrangThai=1";
			return mysql_query($qr);
		}
		function LayThuMucAnh_theo_MaTV($MaTV)
		{
			$qr="select * from thuvienanh where STT=$MaTV and TrangThai=1";
			return mysql_query($qr);
		}
		function DanhSachAlbumTheoThuMucAnh($idTM)
		{
			$qr="select * from thuvienanh where idThuMuc=$idTM and TrangThai=1";
			return mysql_query($qr);
		}
		function DanhSachAnh_theo_ThuMuc_ThuVien($idTM,$idTV,$from,$sotin_1trang)
		{
			$qr="select * from chitietanh where MaTM=$idTM and MaTV=$idTV and TrangThai=1 limit $from,$sotin_1trang";
			return mysql_query($qr);
		}
		function Sum_DanhSachAnh_theo_ThuMuc_ThuVien($idTM,$idTV)
		{
			$qr=mysql_query("select * from chitietanh where MaTM=$idTM and MaTV=$idTV and TrangThai=1");
			$row = mysql_num_rows($qr);
			return $row;
		}
		function DanhSachVanBanDi_theo_NTN($nam, $thang, $ngay)
		{
			$qr="select STT,TrichYeu from vanban where LoaiVB=1 and year(Ngay)=$nam and month(Ngay)=$thang and day(Ngay)=$ngay ORDER BY DATE(Ngay) DESC";
			return mysql_query($qr);
		}
		function NguoiDung($u)	
		{
			$qr="select * from user where Username='$u'";
			return mysql_query($qr);
		}
		function LayMaTrangWeb_tu_TenTrangWeb($tentrangweb_php)
		{
			$qr=mysql_query("select * from trangweb where TenTrangWeb_php='$tentrangweb_php'");
			$row=mysql_fetch_array($qr);
			return $row['STT'];
		}
		function LayMaVaiTro_tu_Username($username)
		{
			$qr=mysql_query("select * from user where Username='$username'");
			$row=mysql_fetch_array($qr);
			return $row['Role'];
		}
		function Quyen_Xem($username,$tentrangweb)	
		{
			$trangweb=$this->LayMaTrangWeb_tu_TenTrangWeb($tentrangweb);
			$vaitro=$this->LayMaVaiTro_tu_Username($username);
			$qr=mysql_query("select * from quyen where TrangWeb=$trangweb and VaiTro=$vaitro and Xem=1");
			if(mysql_num_rows($qr)==0)
				return false;
			else 
				return true;
		}
		function Quyen_Them($username,$tentrangweb)	
		{
			$trangweb=$this->LayMaTrangWeb_tu_TenTrangWeb($tentrangweb);
			$vaitro=$this->LayMaVaiTro_tu_Username($username);
			$qr=mysql_query("select * from quyen where TrangWeb='$trangweb' and VaiTro='$vaitro' and Xem=1 and Them=1");
			if(mysql_num_rows($qr)==0)
				return false;
			else 
				return true;
		}
		function Quyen_Xoa($username,$tentrangweb)	
		{
			$trangweb=$this->LayMaTrangWeb_tu_TenTrangWeb($tentrangweb);
			$vaitro=$this->LayMaVaiTro_tu_Username($username);
			$qr=mysql_query("select * from quyen where TrangWeb='$trangweb'and VaiTro='$vaitro' and Xem=1 and Xoa=1");
			if(mysql_num_rows($qr)==0)
				return false;
			else 
				return true;
		}
		function Quyen_Sua($username,$tentrangweb)	
		{
			$trangweb=$this->LayMaTrangWeb_tu_TenTrangWeb($tentrangweb);
			$vaitro=$this->LayMaVaiTro_tu_Username($username);
			$qr=mysql_query("select * from quyen where TrangWeb='$trangweb' and VaiTro='$vaitro' and Xem=1 and Sua=1");
			if(mysql_num_rows($qr)==0)
				return false;
			else 
				return true;
		}
		function FullName($username)
		{
			$qr=mysql_query("select * from user where Username='$username'");
			$row=mysql_fetch_array($qr);
			return $row['Name'];
		}
		function DangNhap($username,$password)
		{
			$qr=mysql_query("select * from user where Username='$username' and Password='$password'");
			return mysql_num_rows($qr);
		}
		function DoiMatKhau($username, $pass)
		{
			$qr="UPDATE user SET Password='$pass' WHERE Username='$username'";
			mysql_query($qr);
		}
		//--- KHACH HANG DANG NHAP ----
		function KhachHang($idKH)	
		{
			$qr="select * from khachhang where idKH='$idKH'";
			return mysql_query($qr);
		}
		function LayIdKH_theo_Email($email)	
		{
			$qr=mysql_query("select * from khachhang where Email='$email'");
			$row=mysql_fetch_array($qr);
			return $row['idKH'];
		}
		function LayHoTenKH_theo_Email($email)	
		{
			$qr=mysql_query("select * from khachhang where Email='$email'");
			$row=mysql_fetch_array($qr);
			return $row['HoTen'];
		}
		function ThemNhanhKhachHang($HoTen, $Email, $MatKhau, $SoDienThoai, $NgaySinh, $DiaChi)	
		{
			$qr="Insert Into khachhang (HoTen,Email,MatKhau,SoDienThoai,NgaySinh,DiaChi) Values ('$HoTen', '$Email', '$MatKhau', '$SoDienThoai', '$NgaySinh', '$DiaChi')";
			return mysql_query($qr);
		}		
		function ThemKhachHang($idKH, $HoTen, $Email, $MatKhau, $SoDienThoai, $NgaySinh, $DiaChi, $GioiTinh, $TinhTrangHonNhan, $Facebook, $Yahoo, $Skype, $GhiChu)	
		{
			$qr="Insert Into khachhang(idKH,HoTen,Email,MatKhau,SoDienThoai, NgaySinh,DiaChi,GioiTinh,TinhTrangHonNhan,Facebook,Y!M,Skype,GhiChu) Values ($idKH, $HoTen, $Email, $MatKhau, $SoDienThoai, $NgaySinh, $DiaChi, $GioiTinh, $TinhTrangHonNhan, $Facebook, $Yahoo, $Skype, $GhiChu)";
			return mysql_query($qr);
		}
		function TrungEmail($email)	
		{
			$qr=mysql_query("select * from khachhang where Email='$email'");
			if(mysql_num_rows($qr)==0)
				return false;
			else 
				return true;
		}
		function DangNhapThanhCong($email,$pass)	
		{
			$qr=mysql_query("select * from khachhang where Email='$email' and MatKhau='$pass'");
			if(mysql_num_rows($qr)==0)
				return false;
			else 
				return true;
		}
		//Ðon hàng
		function SoDonHang()
		{
			$qr=mysql_query("select * from donhang");
			$row = mysql_num_rows($qr);
			return $row;
		}
		function ThemDonHang($madh, $khachhang, $trangthai, $ngaymua, $ghichu)	
		{
			$qr="Insert Into donhang (MaDH,KhachHang,TrangThai,NgayMua, GhiChu) Values ('$madh', $khachhang, $trangthai, '$ngaymua', '$ghichu')";
			return mysql_query($qr);
		}
		function ThemCTDonHang($donhang, $deal, $soluong, $ghichu)	
		{
			$qr="Insert Into ctdonhang(DonHang,Deal,SoLuong, GhiChu) Values ($donhang, $deal, $soluong, '$ghichu')";
			return mysql_query($qr);
		}
		function XemLaiDonHang($email)
		{
			$qr="select * from donhang dh, khachhang kh where dh.KhachHang=kh.idKH and kh.Email='$email'";
			return mysql_query($qr);
		}
		function XemLaiCTDonHang($madh)
		{
			$qr="select * from ctdonhang where DonHang=$madh";
			return mysql_query($qr);
		}
		function XuatExcel($from,$to)
		{
			$qr="SELECT dh.MaDH, d.TenDeal, d.GiaGoc, d.GiaKhuyenMai, ct.SoLuong, ct.SoLuong*d.GiaKhuyenMai as 'ThanhTien', k.HoTen, k.DiaChi, k.SoDienThoai, k.GhiChu FROM deal d, donhang dh, ctdonhang ct, khachhang k where dh.MaDH=ct.DonHang and d.idDeal=ct.Deal and k.idKH=dh.KhachHang and dh.NgayMua between '$from 00:00:00' and '$to 00:00:00'";
			return mysql_query($qr);
		}
		
		
		function idDeal_theo_tenkhongdau($ten_kd){
			$qr = mysql_query("select idDeal from deal where TenDeal_SL = '$ten_kd'");
			return $qr;
		}
	}
?>