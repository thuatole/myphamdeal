<?php 
ob_start();
session_start();
if(!isset($_SESSION['dntc@!@#$%^']))
	header('location:dangnhap.php');
?>
<?php
ob_start();
if(!isset($_GET['from'])) {echo "Chưa chọn tham số xuất."; return;}
$fn = $_GET['from']."-".$_GET['to'].".xls";
require_once "../class/PHPExcel.php";
require_once "../class/class.trangchu.php";
$tc= new trangchu();
$ds=$tc->XuatExcel($_GET['from'],$_GET['to']);
$objPHPExcel = new PHPExcel();

$i=1;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, "STT")
			->setCellValue('B'.$i, "MaDH")
			->setCellValue('C'.$i, "Tên Deal")
			->setCellValue('D'.$i, 'Giá gốc')
			->setCellValue('E'.$i, 'Giá khuyến mãi')
			->setCellValue('F'.$i, 'Số lượng')
			->setCellValue('G'.$i, 'Thành tiền')
			->setCellValue('H'.$i, 'Họ tên')
			->setCellValue('I'.$i, 'Địa chỉ')
			->setCellValue('J'.$i, 'Điện thoại')
			->setCellValue('K'.$i, 'Ghi chú');

$i=2;
while($row = mysql_fetch_array($ds))
{
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $i-1)
			->setCellValue('B'.$i, $row['MaDH'])
			->setCellValue('C'.$i, $row['TenDeal'])
			->setCellValue('D'.$i, $row['GiaGoc'])
			->setCellValue('E'.$i, $row['GiaKhuyenMai'])
			->setCellValue('F'.$i, $row['SoLuong'])
			->setCellValue('G'.$i, $row['ThanhTien'])
			->setCellValue('H'.$i, $row['HoTen'])
			->setCellValue('I'.$i, $row['DiaChi'])
			->setCellValue('J'.$i, $row['SoDienThoai'])
			->setCellValue('K'.$i, $row['GhiChu']);
$i++;
}

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('danh sach san pham');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$fn.'"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>