<?php 
ob_start();
session_start();
if(!isset($_SESSION['dntc@!@#$%^']))
	header('location:dangnhap.php');
?>
<?php require_once('../Connections/myphamdeal.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

// Make unified connection variable
$conn_myphamdeal = new KT_connection($myphamdeal, $database_myphamdeal);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// Filter
$tfi_listdeal3 = new TFI_TableFilter($conn_myphamdeal, "tfi_listdeal3");
$tfi_listdeal3->addColumn("deal.TenDeal", "STRING_TYPE", "TenDeal", "%");
$tfi_listdeal3->addColumn("deal.TenDeal_SL", "STRING_TYPE", "TenDeal_SL", "%");
$tfi_listdeal3->addColumn("deal.MoTa", "STRING_TYPE", "MoTa", "%");
$tfi_listdeal3->addColumn("deal.NoiDung", "STRING_TYPE", "NoiDung", "%");
$tfi_listdeal3->addColumn("deal.SoNguoiMua", "NUMERIC_TYPE", "SoNguoiMua", "=");
$tfi_listdeal3->addColumn("deal.GiaGoc", "DOUBLE_TYPE", "GiaGoc", "=");
$tfi_listdeal3->addColumn("deal.GiaKhuyenMai", "DOUBLE_TYPE", "GiaKhuyenMai", "=");
$tfi_listdeal3->addColumn("deal.ThoiDiemDang", "DATE_TYPE", "ThoiDiemDang", "=");
$tfi_listdeal3->addColumn("deal.ThoiDiemHetHan", "DATE_TYPE", "ThoiDiemHetHan", "=");
$tfi_listdeal3->addColumn("deal.GiaTot", "CHECKBOX_-1_0_TYPE", "GiaTot", "%");
$tfi_listdeal3->addColumn("loaideal.idLoaiDeal", "NUMERIC_TYPE", "LoaiDeal", "=");
$tfi_listdeal3->addColumn("deal.GhiChu", "STRING_TYPE", "GhiChu", "%");
$tfi_listdeal3->Execute();

// Sorter
$tso_listdeal3 = new TSO_TableSorter("rsdeal1", "tso_listdeal3");
$tso_listdeal3->addColumn("deal.TenDeal");
$tso_listdeal3->addColumn("deal.TenDeal_SL");
$tso_listdeal3->addColumn("deal.MoTa");
$tso_listdeal3->addColumn("deal.NoiDung");
$tso_listdeal3->addColumn("deal.SoNguoiMua");
$tso_listdeal3->addColumn("deal.GiaGoc");
$tso_listdeal3->addColumn("deal.GiaKhuyenMai");
$tso_listdeal3->addColumn("deal.ThoiDiemDang");
$tso_listdeal3->addColumn("deal.ThoiDiemHetHan");
$tso_listdeal3->addColumn("deal.GiaTot");
$tso_listdeal3->addColumn("loaideal.TenLoai");
$tso_listdeal3->addColumn("deal.GhiChu");
$tso_listdeal3->setDefault("deal.TenDeal");
$tso_listdeal3->Execute();

// Navigation
$nav_listdeal3 = new NAV_Regular("nav_listdeal3", "rsdeal1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_myphamdeal, $myphamdeal);
$query_Recordset1 = "SELECT TenLoai, idLoaiDeal FROM loaideal ORDER BY TenLoai";
$Recordset1 = mysql_query($query_Recordset1, $myphamdeal) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//NeXTenesio3 Special List Recordset
$maxRows_rsdeal1 = $_SESSION['max_rows_nav_listdeal3'];
$pageNum_rsdeal1 = 0;
if (isset($_GET['pageNum_rsdeal1'])) {
  $pageNum_rsdeal1 = $_GET['pageNum_rsdeal1'];
}
$startRow_rsdeal1 = $pageNum_rsdeal1 * $maxRows_rsdeal1;

// Defining List Recordset variable
$NXTFilter_rsdeal1 = "1=1";
if (isset($_SESSION['filter_tfi_listdeal3'])) {
  $NXTFilter_rsdeal1 = $_SESSION['filter_tfi_listdeal3'];
}
// Defining List Recordset variable
$NXTSort_rsdeal1 = "deal.TenDeal";
if (isset($_SESSION['sorter_tso_listdeal3'])) {
  $NXTSort_rsdeal1 = $_SESSION['sorter_tso_listdeal3'];
}
mysql_select_db($database_myphamdeal, $myphamdeal);

$query_rsdeal1 = "SELECT deal.TenDeal, deal.TenDeal_SL, deal.MoTa, deal.NoiDung, deal.SoNguoiMua, deal.GiaGoc, deal.GiaKhuyenMai, deal.ThoiDiemDang, deal.ThoiDiemHetHan, deal.GiaTot, loaideal.TenLoai AS LoaiDeal, deal.GhiChu, deal.idDeal FROM deal LEFT JOIN loaideal ON deal.LoaiDeal = loaideal.idLoaiDeal WHERE {$NXTFilter_rsdeal1} ORDER BY {$NXTSort_rsdeal1}";
$query_limit_rsdeal1 = sprintf("%s LIMIT %d, %d", $query_rsdeal1, $startRow_rsdeal1, $maxRows_rsdeal1);
$rsdeal1 = mysql_query($query_limit_rsdeal1, $myphamdeal) or die(mysql_error());
$row_rsdeal1 = mysql_fetch_assoc($rsdeal1);

if (isset($_GET['totalRows_rsdeal1'])) {
  $totalRows_rsdeal1 = $_GET['totalRows_rsdeal1'];
} else {
  $all_rsdeal1 = mysql_query($query_rsdeal1);
  $totalRows_rsdeal1 = mysql_num_rows($all_rsdeal1);
}
$totalPages_rsdeal1 = ceil($totalRows_rsdeal1/$maxRows_rsdeal1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listdeal3->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Quản lý website mỹ phẩm deal ::.</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script><style type="text/css">
  /* Dynamic List row settings */
  .KT_col_TenDeal {width:100px; overflow:hidden;}
  .KT_col_TenDeal_SL {width:140px; overflow:hidden;}
  .KT_col_MoTa {width:140px; overflow:hidden;}
  .KT_col_NoiDung {width:240px; overflow:hidden;}
  .KT_col_SoNguoiMua {width:40px; overflow:hidden;}
  .KT_col_GiaGoc {width:50px; overflow:hidden;}
  .KT_col_GiaKhuyenMai {width:50px; overflow:hidden;}
  .KT_col_ThoiDiemDang {width:100px; overflow:hidden;}
  .KT_col_ThoiDiemHetHan {width:100px; overflow:hidden;}
  .KT_col_GiaTot {width:50px; overflow:hidden;}
  .KT_col_LoaiDeal {width:50px; overflow:hidden;}
  .KT_col_GhiChu {width:10px; overflow:hidden;}
</style>

</head>

<body>
<a href="index.php"> <img src="../Icons/icon-home.gif" width="100px"  /> </a>
<div align="center" style="padding-top:100px;">

<div class="KT_tng" id="listdeal3">
  <h1> Deal
    <?php
  $nav_listdeal3->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listdeal3->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listdeal3'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listdeal3']; ?>
            <?php 
  // else Conditional region1
  } else { ?>
            <?php echo NXT_getResource("all"); ?>
            <?php } 
  // endif Conditional region1
?>
            <?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
                            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listdeal3'] == 1) {
?>
                            <a href="<?php echo $tfi_listdeal3->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listdeal3->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TenDeal" class="KT_sorter KT_col_TenDeal <?php echo $tso_listdeal3->getSortIcon('deal.TenDeal'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.TenDeal'); ?>">Tên deal</a> </th>
            <th id="TenDeal_SL" class="KT_sorter KT_col_TenDeal_SL <?php echo $tso_listdeal3->getSortIcon('deal.TenDeal_SL'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.TenDeal_SL'); ?>">Tên deal (short link)</a> </th>
            <th id="MoTa" class="KT_sorter KT_col_MoTa <?php echo $tso_listdeal3->getSortIcon('deal.MoTa'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.MoTa'); ?>">Mô tả</a> </th>
            <th id="NoiDung" class="KT_sorter KT_col_NoiDung <?php echo $tso_listdeal3->getSortIcon('deal.NoiDung'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.NoiDung'); ?>">Nội dung</a> </th>
            <th id="SoNguoiMua" class="KT_sorter KT_col_SoNguoiMua <?php echo $tso_listdeal3->getSortIcon('deal.SoNguoiMua'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.SoNguoiMua'); ?>">Số người mua</a> </th>
            <th id="GiaGoc" class="KT_sorter KT_col_GiaGoc <?php echo $tso_listdeal3->getSortIcon('deal.GiaGoc'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.GiaGoc'); ?>">Giá gốc</a> </th>
            <th id="GiaKhuyenMai" class="KT_sorter KT_col_GiaKhuyenMai <?php echo $tso_listdeal3->getSortIcon('deal.GiaKhuyenMai'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.GiaKhuyenMai'); ?>">Giá KM</a> </th>
            <th id="ThoiDiemDang" class="KT_sorter KT_col_ThoiDiemDang <?php echo $tso_listdeal3->getSortIcon('deal.ThoiDiemDang'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.ThoiDiemDang'); ?>">Thời điểm đăng</a> </th>
            <th id="ThoiDiemHetHan" class="KT_sorter KT_col_ThoiDiemHetHan <?php echo $tso_listdeal3->getSortIcon('deal.ThoiDiemHetHan'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.ThoiDiemHetHan'); ?>">Thời điểm hết hạn</a> </th>
            <th id="GiaTot" class="KT_sorter KT_col_GiaTot <?php echo $tso_listdeal3->getSortIcon('deal.GiaTot'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.GiaTot'); ?>">Giá tốt</a> </th>
            <th id="LoaiDeal" class="KT_sorter KT_col_LoaiDeal <?php echo $tso_listdeal3->getSortIcon('loaideal.TenLoai'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('loaideal.TenLoai'); ?>">Loại deal</a> </th>
            <th id="GhiChu" class="KT_sorter KT_col_GhiChu <?php echo $tso_listdeal3->getSortIcon('deal.GhiChu'); ?>"> <a href="<?php echo $tso_listdeal3->getSortLink('deal.GhiChu'); ?>">Ghi chú</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listdeal3'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listdeal3_TenDeal" id="tfi_listdeal3_TenDeal" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_TenDeal']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listdeal3_TenDeal_SL" id="tfi_listdeal3_TenDeal_SL" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_TenDeal_SL']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listdeal3_MoTa" id="tfi_listdeal3_MoTa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_MoTa']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listdeal3_NoiDung" id="tfi_listdeal3_NoiDung" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_NoiDung']); ?>" size="20" maxlength="200" /></td>
            <td><input type="text" name="tfi_listdeal3_SoNguoiMua" id="tfi_listdeal3_SoNguoiMua" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_SoNguoiMua']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listdeal3_GiaGoc" id="tfi_listdeal3_GiaGoc" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_GiaGoc']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listdeal3_GiaKhuyenMai" id="tfi_listdeal3_GiaKhuyenMai" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_GiaKhuyenMai']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listdeal3_ThoiDiemDang" id="tfi_listdeal3_ThoiDiemDang" value="<?php echo @$_SESSION['tfi_listdeal3_ThoiDiemDang']; ?>" size="10" maxlength="22" /></td>
            <td><input type="text" name="tfi_listdeal3_ThoiDiemHetHan" id="tfi_listdeal3_ThoiDiemHetHan" value="<?php echo @$_SESSION['tfi_listdeal3_ThoiDiemHetHan']; ?>" size="10" maxlength="22" /></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listdeal3_GiaTot']),"-1"))) {echo "checked";} ?> type="checkbox" name="tfi_listdeal3_GiaTot" id="tfi_listdeal3_GiaTot" value="-1" /></td>
            <td><select name="tfi_listdeal3_LoaiDeal" id="tfi_listdeal3_LoaiDeal">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listdeal3_LoaiDeal']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['idLoaiDeal']?>"<?php if (!(strcmp($row_Recordset1['idLoaiDeal'], @$_SESSION['tfi_listdeal3_LoaiDeal']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenLoai']?></option>
              <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
            </select>
            </td>
            <td><input type="text" name="tfi_listdeal3_GhiChu" id="tfi_listdeal3_GhiChu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listdeal3_GhiChu']); ?>" size="20" maxlength="255" /></td>
            <td><input type="submit" name="tfi_listdeal3" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsdeal1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="14"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsdeal1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_deal" class="id_checkbox" value="<?php echo $row_rsdeal1['idDeal']; ?>" />
                <input type="hidden" name="idDeal" class="id_field" value="<?php echo $row_rsdeal1['idDeal']; ?>" />
            </td>
            <td><div class="KT_col_TenDeal"><?php echo KT_FormatForList($row_rsdeal1['TenDeal'], 40); ?></div></td>
            <td><div class="KT_col_TenDeal_SL"><?php echo KT_FormatForList($row_rsdeal1['TenDeal_SL'], 20); ?></div></td>
            <td><div class="KT_col_MoTa"><?php echo KT_FormatForList($row_rsdeal1['MoTa'], 40); ?></div></td>
            <td><div class="KT_col_NoiDung"><?php echo KT_FormatForList($row_rsdeal1['NoiDung'], 140); ?></div></td>
            <td><div class="KT_col_SoNguoiMua"><?php echo KT_FormatForList($row_rsdeal1['SoNguoiMua'], 20); ?></div></td>
            <td><div class="KT_col_GiaGoc"><?php echo KT_FormatForList($row_rsdeal1['GiaGoc'], 20); ?></div></td>
            <td><div class="KT_col_GiaKhuyenMai"><?php echo KT_FormatForList($row_rsdeal1['GiaKhuyenMai'], 20); ?></div></td>
            <td><div class="KT_col_ThoiDiemDang"><?php echo KT_formatDate($row_rsdeal1['ThoiDiemDang']); ?></div></td>
            <td><div class="KT_col_ThoiDiemHetHan"><?php echo KT_formatDate($row_rsdeal1['ThoiDiemHetHan']); ?></div></td>
            <td><div class="KT_col_GiaTot"><?php echo KT_FormatForList($row_rsdeal1['GiaTot']==-1?"Có":"Không", 20); ?></div></td>
            <td><div class="KT_col_LoaiDeal"><?php echo KT_FormatForList($row_rsdeal1['LoaiDeal'], 20); ?></div></td>
            <td><div class="KT_col_GhiChu"><?php echo KT_FormatForList($row_rsdeal1['GhiChu'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="form_deal.php?idDeal=<?php echo $row_rsdeal1['idDeal']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rsdeal1 = mysql_fetch_assoc($rsdeal1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listdeal3->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="form_deal.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>

</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($rsdeal1);
?>