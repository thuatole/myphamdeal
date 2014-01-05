<?php 
ob_start();
session_start();
if(!isset($_SESSION['dntc@!@#$%^']))
	header('location:dangnhap.php');
?>
<?php require_once('../Connections/myphamdeal.php'); ?>
<?php
include("xuly_upload_hinhanh.php");
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_myphamdeal = new KT_connection($myphamdeal, $database_myphamdeal);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("idDeal", true, "numeric", "", "", "", "Vui lòng chọn Deal.");
$formValidation->addField("URL", true, "text", "", "", "", "Vui lòng chọn File hình cho Deal.");
$tNGs->prepareValidation($formValidation);
// End trigger

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

mysql_select_db($database_myphamdeal, $myphamdeal);
$query_Recordset1 = "SELECT TenDeal, idDeal FROM deal ORDER BY TenDeal";
$Recordset1 = mysql_query($query_Recordset1, $myphamdeal) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Make an insert transaction instance
$ins_hinh = new tNG_multipleInsert($conn_myphamdeal);
$tNGs->addTransaction($ins_hinh);
// Register triggers
$ins_hinh->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_hinh->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_hinh->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_hinh->setTable("hinh");
$ins_hinh->addColumn("idDeal", "NUMERIC_TYPE", "POST", "idDeal");
$ins_hinh->addColumn("URL", "STRING_TYPE", "POST", "URL");
$ins_hinh->addColumn("HinhDaiDien", "CHECKBOX_1_0_TYPE", "POST", "HinhDaiDien", "0");
$ins_hinh->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$ins_hinh->setPrimaryKey("idHinh", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_hinh = new tNG_multipleUpdate($conn_myphamdeal);
$tNGs->addTransaction($upd_hinh);
// Register triggers
$upd_hinh->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_hinh->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_hinh->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_hinh->setTable("hinh");
$upd_hinh->addColumn("idDeal", "NUMERIC_TYPE", "POST", "idDeal");
$upd_hinh->addColumn("URL", "STRING_TYPE", "POST", "URL");
$upd_hinh->addColumn("HinhDaiDien", "CHECKBOX_1_0_TYPE", "POST", "HinhDaiDien");
$upd_hinh->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$upd_hinh->setPrimaryKey("idHinh", "NUMERIC_TYPE", "GET", "idHinh");

// Make an instance of the transaction object
$del_hinh = new tNG_multipleDelete($conn_myphamdeal);
$tNGs->addTransaction($del_hinh);
// Register triggers
$del_hinh->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_hinh->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_hinh->setTable("hinh");
$del_hinh->setPrimaryKey("idHinh", "NUMERIC_TYPE", "GET", "idHinh");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rshinh = $tNGs->getRecordset("hinh");
$row_rshinh = mysql_fetch_assoc($rshinh);
$totalRows_rshinh = mysql_num_rows($rshinh);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Quản lý website mỹ phẩm deal ::.</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?><script src="../includes/nxt/scripts/form.js" type="text/javascript"></script><script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<a href="index.php"> <img src="../Icons/icon-home.gif" width="100px"  /> </a>
<div align="center" style="padding-top:100px; padding-left:20%;">

<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['idHinh'] == "") {
?>
    <?php echo NXT_getResource("Insert_FH"); ?>
    <?php 
// else Conditional region1
} else { ?>
    <?php echo NXT_getResource("Update_FH"); ?>
    <?php } 
// endif Conditional region1
?>
    Hinh </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rshinh > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table width="452" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td width="87" class="KT_th"><label for="idDeal_<?php echo $cnt1; ?>">Deal:</label></td>
          <td width="281"><select name="idDeal_<?php echo $cnt1; ?>" id="idDeal_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset1['idDeal']?>"<?php if (!(strcmp($row_Recordset1['idDeal'], $row_rshinh['idDeal']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenDeal']?></option>
            <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("hinh", "idDeal", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="URL_<?php echo $cnt1; ?>">URL:</label></td>
          <td>
         <script>
			function chonfile(s)
			{
				var fileName = s.split('/').pop().split('\\').pop()
				document.getElementById("URL_<?php echo $cnt1; ?>").value=fileName;
			}
		</script>
          <input type="hidden" name="URL_<?php echo $cnt1; ?>" id="URL_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rshinh['URL']); ?>" size="32" maxlength="255" />
          <input type="file" name="file" id="file" size="40" accept="image/jpeg" onchange="chonfile(this.value)" <?php echo KT_escapeAttribute($row_rshinh['URL']); ?>>
              <?php echo $tNGs->displayFieldHint("URL");?> <?php echo $tNGs->displayFieldError("hinh", "URL", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="HinhDaiDien_<?php echo $cnt1; ?>">Hình đại diện ?:</label></td>
          <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rshinh['HinhDaiDien']),"1"))) {echo "checked";} ?> type="checkbox" name="HinhDaiDien_<?php echo $cnt1; ?>" id="HinhDaiDien_<?php echo $cnt1; ?>" value="1" />
              <?php echo $tNGs->displayFieldError("hinh", "HinhDaiDien", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="GhiChu_<?php echo $cnt1; ?>">Ghi chú:</label></td>
          <td><input type="text" name="GhiChu_<?php echo $cnt1; ?>" id="GhiChu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rshinh['GhiChu']); ?>" size="32" maxlength="255" />
              <?php echo $tNGs->displayFieldHint("GhiChu");?> <?php echo $tNGs->displayFieldError("hinh", "GhiChu", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_hinh_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rshinh['kt_pk_hinh']); ?>" />
      <?php } while ($row_rshinh = mysql_fetch_assoc($rshinh)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idHinh'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'idHinh')" />
          </div>
          <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
          <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
          <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
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
?>