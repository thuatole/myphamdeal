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
$tfi_listhinh1 = new TFI_TableFilter($conn_myphamdeal, "tfi_listhinh1");
$tfi_listhinh1->addColumn("deal.idDeal", "NUMERIC_TYPE", "idDeal", "=");
$tfi_listhinh1->addColumn("hinh.URL", "STRING_TYPE", "URL", "%");
$tfi_listhinh1->addColumn("hinh.HinhDaiDien", "CHECKBOX_1_0_TYPE", "HinhDaiDien", "%");
$tfi_listhinh1->addColumn("hinh.GhiChu", "STRING_TYPE", "GhiChu", "%");
$tfi_listhinh1->Execute();

// Sorter
$tso_listhinh1 = new TSO_TableSorter("rshinh1", "tso_listhinh1");
$tso_listhinh1->addColumn("deal.TenDeal");
$tso_listhinh1->addColumn("hinh.URL");
$tso_listhinh1->addColumn("hinh.HinhDaiDien");
$tso_listhinh1->addColumn("hinh.GhiChu");
$tso_listhinh1->setDefault("hinh.idDeal");
$tso_listhinh1->Execute();

// Navigation
$nav_listhinh1 = new NAV_Regular("nav_listhinh1", "rshinh1", "../", $_SERVER['PHP_SELF'], 10);

mysql_select_db($database_myphamdeal, $myphamdeal);
$query_Recordset1 = "SELECT TenDeal, idDeal FROM deal ORDER BY TenDeal";
$Recordset1 = mysql_query($query_Recordset1, $myphamdeal) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//NeXTenesio3 Special List Recordset
$maxRows_rshinh1 = $_SESSION['max_rows_nav_listhinh1'];
$pageNum_rshinh1 = 0;
if (isset($_GET['pageNum_rshinh1'])) {
  $pageNum_rshinh1 = $_GET['pageNum_rshinh1'];
}
$startRow_rshinh1 = $pageNum_rshinh1 * $maxRows_rshinh1;

// Defining List Recordset variable
$NXTFilter_rshinh1 = "1=1";
if (isset($_SESSION['filter_tfi_listhinh1'])) {
  $NXTFilter_rshinh1 = $_SESSION['filter_tfi_listhinh1'];
}
// Defining List Recordset variable
$NXTSort_rshinh1 = "hinh.idDeal";
if (isset($_SESSION['sorter_tso_listhinh1'])) {
  $NXTSort_rshinh1 = $_SESSION['sorter_tso_listhinh1'];
}
mysql_select_db($database_myphamdeal, $myphamdeal);

$query_rshinh1 = "SELECT deal.TenDeal AS idDeal, hinh.URL, hinh.HinhDaiDien, hinh.GhiChu, hinh.idHinh FROM hinh LEFT JOIN deal ON hinh.idDeal = deal.idDeal WHERE {$NXTFilter_rshinh1} ORDER BY {$NXTSort_rshinh1}";
$query_limit_rshinh1 = sprintf("%s LIMIT %d, %d", $query_rshinh1, $startRow_rshinh1, $maxRows_rshinh1);
$rshinh1 = mysql_query($query_limit_rshinh1, $myphamdeal) or die(mysql_error());
$row_rshinh1 = mysql_fetch_assoc($rshinh1);

if (isset($_GET['totalRows_rshinh1'])) {
  $totalRows_rshinh1 = $_GET['totalRows_rshinh1'];
} else {
  $all_rshinh1 = mysql_query($query_rshinh1);
  $totalRows_rshinh1 = mysql_num_rows($all_rshinh1);
}
$totalPages_rshinh1 = ceil($totalRows_rshinh1/$maxRows_rshinh1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listhinh1->checkBoundries();
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
  .KT_col_idDeal {width:140px; overflow:hidden;}
  .KT_col_URL {width:140px; overflow:hidden;}
  .KT_col_HinhDaiDien {width:140px; overflow:hidden;}
  .KT_col_GhiChu {width:140px; overflow:hidden;}
</style>

</head>

<body>
<a href="index.php"> <img src="../Icons/icon-home.gif" width="100px"  /> </a>
<div align="center" style="padding-top:100px;padding-left:20%;">

<div class="KT_tng" id="listhinh1">
  <h1> Hinh
    <?php
  $nav_listhinh1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listhinh1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listhinh1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listhinh1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listhinh1'] == 1) {
?>
                            <a href="<?php echo $tfi_listhinh1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listhinh1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="idDeal" class="KT_sorter KT_col_idDeal <?php echo $tso_listhinh1->getSortIcon('deal.TenDeal'); ?>"> <a href="<?php echo $tso_listhinh1->getSortLink('deal.TenDeal'); ?>">Deal</a> </th>
            <th id="URL" class="KT_sorter KT_col_URL <?php echo $tso_listhinh1->getSortIcon('hinh.URL'); ?>"> <a href="<?php echo $tso_listhinh1->getSortLink('hinh.URL'); ?>">URL</a> </th>
            <th id="HinhDaiDien" class="KT_sorter KT_col_HinhDaiDien <?php echo $tso_listhinh1->getSortIcon('hinh.HinhDaiDien'); ?>"> <a href="<?php echo $tso_listhinh1->getSortLink('hinh.HinhDaiDien'); ?>">Hình đại diện ?</a> </th>
            <th id="GhiChu" class="KT_sorter KT_col_GhiChu <?php echo $tso_listhinh1->getSortIcon('hinh.GhiChu'); ?>"> <a href="<?php echo $tso_listhinh1->getSortLink('hinh.GhiChu'); ?>">Ghi chú</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listhinh1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><select name="tfi_listhinh1_idDeal" id="tfi_listhinh1_idDeal">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listhinh1_idDeal']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['idDeal']?>"<?php if (!(strcmp($row_Recordset1['idDeal'], @$_SESSION['tfi_listhinh1_idDeal']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenDeal']?></option>
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
            <td><input type="text" name="tfi_listhinh1_URL" id="tfi_listhinh1_URL" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listhinh1_URL']); ?>" size="20" maxlength="255" /></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listhinh1_HinhDaiDien']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listhinh1_HinhDaiDien" id="tfi_listhinh1_HinhDaiDien" value="1" /></td>
            <td><input type="text" name="tfi_listhinh1_GhiChu" id="tfi_listhinh1_GhiChu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listhinh1_GhiChu']); ?>" size="20" maxlength="255" /></td>
            <td><input type="submit" name="tfi_listhinh1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rshinh1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rshinh1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_hinh" class="id_checkbox" value="<?php echo $row_rshinh1['idHinh']; ?>" />
                <input type="hidden" name="idHinh" class="id_field" value="<?php echo $row_rshinh1['idHinh']; ?>" />
            </td>
            <td><div class="KT_col_idDeal"><?php echo KT_FormatForList($row_rshinh1['idDeal'], 40); ?></div></td>
            <td><div class="KT_col_URL"><?php echo KT_FormatForList($row_rshinh1['URL'], 20); ?></div></td>
            <td><div class="KT_col_HinhDaiDien"><?php echo KT_FormatForList($row_rshinh1['HinhDaiDien'], 20); ?></div></td>
            <td><div class="KT_col_GhiChu"><?php echo KT_FormatForList($row_rshinh1['GhiChu'], 20); ?></div></td>
            <td><a class="KT_edit_link" href="form_hinhanh.php?idHinh=<?php echo $row_rshinh1['idHinh']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
          </tr>
          <?php } while ($row_rshinh1 = mysql_fetch_assoc($rshinh1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listhinh1->Prepare();
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
        <a class="KT_additem_op_link" href="form_hinhanh.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
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

mysql_free_result($rshinh1);
?>
