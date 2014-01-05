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
$formValidation->addField("TenLoai", true, "text", "", "", "", "Vui lòng nhập tên loại deal.");
$formValidation->addField("TenLoai_SL", true, "text", "", "", "", "Vui lòng nhập tên loại deal (dạng tên rút gọn).");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_loaideal = new tNG_multipleInsert($conn_myphamdeal);
$tNGs->addTransaction($ins_loaideal);
// Register triggers
$ins_loaideal->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_loaideal->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_loaideal->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_loaideal->setTable("loaideal");
$ins_loaideal->addColumn("TenLoai", "STRING_TYPE", "POST", "TenLoai");
$ins_loaideal->addColumn("TenLoai_SL", "STRING_TYPE", "POST", "TenLoai_SL");
$ins_loaideal->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$ins_loaideal->setPrimaryKey("idLoaiDeal", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_loaideal = new tNG_multipleUpdate($conn_myphamdeal);
$tNGs->addTransaction($upd_loaideal);
// Register triggers
$upd_loaideal->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_loaideal->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_loaideal->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_loaideal->setTable("loaideal");
$upd_loaideal->addColumn("TenLoai", "STRING_TYPE", "POST", "TenLoai");
$upd_loaideal->addColumn("TenLoai_SL", "STRING_TYPE", "POST", "TenLoai_SL");
$upd_loaideal->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$upd_loaideal->setPrimaryKey("idLoaiDeal", "NUMERIC_TYPE", "GET", "idLoaiDeal");

// Make an instance of the transaction object
$del_loaideal = new tNG_multipleDelete($conn_myphamdeal);
$tNGs->addTransaction($del_loaideal);
// Register triggers
$del_loaideal->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_loaideal->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_loaideal->setTable("loaideal");
$del_loaideal->setPrimaryKey("idLoaiDeal", "NUMERIC_TYPE", "GET", "idLoaiDeal");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsloaideal = $tNGs->getRecordset("loaideal");
$row_rsloaideal = mysql_fetch_assoc($rsloaideal);
$totalRows_rsloaideal = mysql_num_rows($rsloaideal);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Quản lý website mỹ phẩm deal ::.</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<a href="index.php"> <img src="../Icons/icon-home.gif" width="100px"  /> </a>
<div align="center" style="padding-top:100px;padding-left:25%;">

  <?php
	echo $tNGs->getErrorMsg();
?>
  <div class="KT_tng">
    <h1>
      <?php 
// Show IF Conditional region1 
if (@$_GET['idLoaiDeal'] == "") {
?>
        <?php echo NXT_getResource("Insert_FH"); ?>
        <?php 
// else Conditional region1
} else { ?>
        <?php echo NXT_getResource("Update_FH"); ?>
        <?php } 
// endif Conditional region1
?>
      Loaideal </h1>
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rsloaideal > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td width="113" class="KT_th"><label for="TenLoai_<?php echo $cnt1; ?>">Tên loại deal:</label></td>
              <td width="284"><input type="text" name="TenLoai_<?php echo $cnt1; ?>" id="TenLoai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsloaideal['TenLoai']); ?>" size="32" maxlength="255" />
                  <?php echo $tNGs->displayFieldHint("TenLoai");?> <?php echo $tNGs->displayFieldError("loaideal", "TenLoai", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="KT_th"><label for="TenLoai_SL_<?php echo $cnt1; ?>">Tên loại (short link):</label></td>
              <td><input type="text" name="TenLoai_SL_<?php echo $cnt1; ?>" id="TenLoai_SL_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsloaideal['TenLoai_SL']); ?>" size="32" maxlength="255" />
                  <?php echo $tNGs->displayFieldHint("TenLoai_SL");?> <?php echo $tNGs->displayFieldError("loaideal", "TenLoai_SL", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="KT_th"><label for="GhiChu_<?php echo $cnt1; ?>">Ghi chú:</label></td>
              <td><input type="text" name="GhiChu_<?php echo $cnt1; ?>" id="GhiChu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsloaideal['GhiChu']); ?>" size="32" maxlength="255" />
                  <?php echo $tNGs->displayFieldHint("GhiChu");?> <?php echo $tNGs->displayFieldError("loaideal", "GhiChu", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_loaideal_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsloaideal['kt_pk_loaideal']); ?>" />
          <?php } while ($row_rsloaideal = mysql_fetch_assoc($rsloaideal)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['idLoaiDeal'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'idLoaiDeal')" />
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
