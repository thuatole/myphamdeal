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
$tfi_listloaideal2 = new TFI_TableFilter($conn_myphamdeal, "tfi_listloaideal2");
$tfi_listloaideal2->addColumn("loaideal.TenLoai", "STRING_TYPE", "TenLoai", "%");
$tfi_listloaideal2->addColumn("loaideal.TenLoai_SL", "STRING_TYPE", "TenLoai_SL", "%");
$tfi_listloaideal2->addColumn("loaideal.GhiChu", "STRING_TYPE", "GhiChu", "%");
$tfi_listloaideal2->Execute();

// Sorter
$tso_listloaideal2 = new TSO_TableSorter("rsloaideal1", "tso_listloaideal2");
$tso_listloaideal2->addColumn("loaideal.TenLoai");
$tso_listloaideal2->addColumn("loaideal.TenLoai_SL");
$tso_listloaideal2->addColumn("loaideal.GhiChu");
$tso_listloaideal2->setDefault("loaideal.TenLoai");
$tso_listloaideal2->Execute();

// Navigation
$nav_listloaideal2 = new NAV_Regular("nav_listloaideal2", "rsloaideal1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsloaideal1 = $_SESSION['max_rows_nav_listloaideal2'];
$pageNum_rsloaideal1 = 0;
if (isset($_GET['pageNum_rsloaideal1'])) {
  $pageNum_rsloaideal1 = $_GET['pageNum_rsloaideal1'];
}
$startRow_rsloaideal1 = $pageNum_rsloaideal1 * $maxRows_rsloaideal1;

// Defining List Recordset variable
$NXTFilter_rsloaideal1 = "1=1";
if (isset($_SESSION['filter_tfi_listloaideal2'])) {
  $NXTFilter_rsloaideal1 = $_SESSION['filter_tfi_listloaideal2'];
}
// Defining List Recordset variable
$NXTSort_rsloaideal1 = "loaideal.TenLoai";
if (isset($_SESSION['sorter_tso_listloaideal2'])) {
  $NXTSort_rsloaideal1 = $_SESSION['sorter_tso_listloaideal2'];
}
mysql_select_db($database_myphamdeal, $myphamdeal);

$query_rsloaideal1 = "SELECT loaideal.TenLoai, loaideal.TenLoai_SL, loaideal.GhiChu, loaideal.idLoaiDeal FROM loaideal WHERE {$NXTFilter_rsloaideal1} ORDER BY {$NXTSort_rsloaideal1}";
$query_limit_rsloaideal1 = sprintf("%s LIMIT %d, %d", $query_rsloaideal1, $startRow_rsloaideal1, $maxRows_rsloaideal1);
$rsloaideal1 = mysql_query($query_limit_rsloaideal1, $myphamdeal) or die(mysql_error());
$row_rsloaideal1 = mysql_fetch_assoc($rsloaideal1);

if (isset($_GET['totalRows_rsloaideal1'])) {
  $totalRows_rsloaideal1 = $_GET['totalRows_rsloaideal1'];
} else {
  $all_rsloaideal1 = mysql_query($query_rsloaideal1);
  $totalRows_rsloaideal1 = mysql_num_rows($all_rsloaideal1);
}
$totalPages_rsloaideal1 = ceil($totalRows_rsloaideal1/$maxRows_rsloaideal1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listloaideal2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Quản lý website mỹ phẩm deal ::.</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_TenLoai {width:140px; overflow:hidden;}
  .KT_col_TenLoai_SL {width:140px; overflow:hidden;}
  .KT_col_GhiChu {width:140px; overflow:hidden;}
</style>
</head>

<body>
<a href="index.php"> <img src="../Icons/icon-home.gif" width="100px"  /> </a>
<div align="center" style="padding-top:100px;padding-left:25%;">

  <div class="KT_tng" id="listloaideal2">
    <h1> Loaideal
      <?php
  $nav_listloaideal2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
    </h1>
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listloaideal2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listloaideal2'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listloaideal2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listloaideal2'] == 1) {
?>
                  <a href="<?php echo $tfi_listloaideal2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listloaideal2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
        </div>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <thead>
            <tr class="KT_row_order">
              <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
              </th>
              <th id="TenLoai" class="KT_sorter KT_col_TenLoai <?php echo $tso_listloaideal2->getSortIcon('loaideal.TenLoai'); ?>"> <a href="<?php echo $tso_listloaideal2->getSortLink('loaideal.TenLoai'); ?>">Tên loại deal</a> </th>
              <th id="TenLoai_SL" class="KT_sorter KT_col_TenLoai_SL <?php echo $tso_listloaideal2->getSortIcon('loaideal.TenLoai_SL'); ?>"> <a href="<?php echo $tso_listloaideal2->getSortLink('loaideal.TenLoai_SL'); ?>">Tên loại (short link)</a> </th>
              <th id="GhiChu" class="KT_sorter KT_col_GhiChu <?php echo $tso_listloaideal2->getSortIcon('loaideal.GhiChu'); ?>"> <a href="<?php echo $tso_listloaideal2->getSortLink('loaideal.GhiChu'); ?>">Ghi chú</a> </th>
              <th>&nbsp;</th>
            </tr>
            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listloaideal2'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listloaideal2_TenLoai" id="tfi_listloaideal2_TenLoai" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listloaideal2_TenLoai']); ?>" size="20" maxlength="255" /></td>
                <td><input type="text" name="tfi_listloaideal2_TenLoai_SL" id="tfi_listloaideal2_TenLoai_SL" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listloaideal2_TenLoai_SL']); ?>" size="20" maxlength="255" /></td>
                <td><input type="text" name="tfi_listloaideal2_GhiChu" id="tfi_listloaideal2_GhiChu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listloaideal2_GhiChu']); ?>" size="20" maxlength="255" /></td>
                <td><input type="submit" name="tfi_listloaideal2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
          </thead>
          <tbody>
            <?php if ($totalRows_rsloaideal1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
            <?php if ($totalRows_rsloaideal1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_loaideal" class="id_checkbox" value="<?php echo $row_rsloaideal1['idLoaiDeal']; ?>" />
                      <input type="hidden" name="idLoaiDeal" class="id_field" value="<?php echo $row_rsloaideal1['idLoaiDeal']; ?>" />
                  </td>
                  <td><div class="KT_col_TenLoai"><?php echo KT_FormatForList($row_rsloaideal1['TenLoai'], 20); ?></div></td>
                  <td><div class="KT_col_TenLoai_SL"><?php echo KT_FormatForList($row_rsloaideal1['TenLoai_SL'], 20); ?></div></td>
                  <td><div class="KT_col_GhiChu"><?php echo KT_FormatForList($row_rsloaideal1['GhiChu'], 20); ?></div></td>
                  <td><a class="KT_edit_link" href="form_loai_deal.php?idLoaiDeal=<?php echo $row_rsloaideal1['idLoaiDeal']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
                </tr>
                <?php } while ($row_rsloaideal1 = mysql_fetch_assoc($rsloaideal1)); ?>
              <?php } // Show if recordset not empty ?>
          </tbody>
        </table>
        <div class="KT_bottomnav">
          <div>
            <?php
            $nav_listloaideal2->Prepare();
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
          <a class="KT_additem_op_link" href="form_loai_deal.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
      </form>
    </div>
    <br class="clearfixplain" />
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($rsloaideal1);
?>