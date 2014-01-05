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
$formValidation->addField("TenDeal", true, "text", "", "", "", "Vui lòng nhập tên deal.");
$formValidation->addField("TenDeal_SL", true, "text", "", "", "", "Vui lòng nhập tên deal (kiểu link trên thanh địa chỉ).");
$formValidation->addField("MoTa", true, "text", "", "", "", "Vui lòng nhập mô tả cho deal.");
$formValidation->addField("NoiDung", true, "text", "", "", "", "Vui lòng nhập nội dung cho deal.");
$formValidation->addField("SoNguoiMua", true, "numeric", "", "", "", "Nhập số người đã mua deal này (mặc định là 0).");
$formValidation->addField("GiaGoc", true, "double", "", "", "", "Vui lòng nhập giá gốc.");
$formValidation->addField("GiaKhuyenMai", true, "double", "", "", "", "Vui lòng nhập giá khuyến mãi.");
$formValidation->addField("ThoiDiemDang", true, "date", "", "", "", "Vui lòng chọn thời điểm đăng deal này.");
$formValidation->addField("ThoiDiemHetHan", true, "date", "", "", "", "Vui lòng nhập thời điểm hết hạn của deal này.");
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
$query_Recordset1 = "SELECT TenLoai, idLoaiDeal FROM loaideal ORDER BY TenLoai";
$Recordset1 = mysql_query($query_Recordset1, $myphamdeal) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Make an insert transaction instance
$ins_deal = new tNG_multipleInsert($conn_myphamdeal);
$tNGs->addTransaction($ins_deal);
// Register triggers
$ins_deal->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_deal->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_deal->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_deal->setTable("deal");
$ins_deal->addColumn("TenDeal", "STRING_TYPE", "POST", "TenDeal");
$ins_deal->addColumn("TenDeal_SL", "STRING_TYPE", "POST", "TenDeal_SL");
$ins_deal->addColumn("MoTa", "STRING_TYPE", "POST", "MoTa");
$ins_deal->addColumn("NoiDung", "STRING_TYPE", "POST", "NoiDung");
$ins_deal->addColumn("SoNguoiMua", "NUMERIC_TYPE", "POST", "SoNguoiMua");
$ins_deal->addColumn("GiaGoc", "DOUBLE_TYPE", "POST", "GiaGoc");
$ins_deal->addColumn("GiaKhuyenMai", "DOUBLE_TYPE", "POST", "GiaKhuyenMai");
$ins_deal->addColumn("ThoiDiemDang", "DATE_TYPE", "POST", "ThoiDiemDang");
$ins_deal->addColumn("ThoiDiemHetHan", "DATE_TYPE", "POST", "ThoiDiemHetHan");
$ins_deal->addColumn("GiaTot", "CHECKBOX_-1_0_TYPE", "POST", "GiaTot", "0");
$ins_deal->addColumn("LoaiDeal", "NUMERIC_TYPE", "POST", "LoaiDeal");
$ins_deal->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$ins_deal->setPrimaryKey("idDeal", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_deal = new tNG_multipleUpdate($conn_myphamdeal);
$tNGs->addTransaction($upd_deal);
// Register triggers
$upd_deal->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_deal->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_deal->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_deal->setTable("deal");
$upd_deal->addColumn("TenDeal", "STRING_TYPE", "POST", "TenDeal");
$upd_deal->addColumn("TenDeal_SL", "STRING_TYPE", "POST", "TenDeal_SL");
$upd_deal->addColumn("MoTa", "STRING_TYPE", "POST", "MoTa");
$upd_deal->addColumn("NoiDung", "STRING_TYPE", "POST", "NoiDung");
$upd_deal->addColumn("SoNguoiMua", "NUMERIC_TYPE", "POST", "SoNguoiMua");
$upd_deal->addColumn("GiaGoc", "DOUBLE_TYPE", "POST", "GiaGoc");
$upd_deal->addColumn("GiaKhuyenMai", "DOUBLE_TYPE", "POST", "GiaKhuyenMai");
$upd_deal->addColumn("ThoiDiemDang", "DATE_TYPE", "POST", "ThoiDiemDang");
$upd_deal->addColumn("ThoiDiemHetHan", "DATE_TYPE", "POST", "ThoiDiemHetHan");
$upd_deal->addColumn("GiaTot", "CHECKBOX_-1_0_TYPE", "POST", "GiaTot");
$upd_deal->addColumn("LoaiDeal", "NUMERIC_TYPE", "POST", "LoaiDeal");
$upd_deal->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$upd_deal->setPrimaryKey("idDeal", "NUMERIC_TYPE", "GET", "idDeal");

// Make an instance of the transaction object
$del_deal = new tNG_multipleDelete($conn_myphamdeal);
$tNGs->addTransaction($del_deal);
// Register triggers
$del_deal->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_deal->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_deal->setTable("deal");
$del_deal->setPrimaryKey("idDeal", "NUMERIC_TYPE", "GET", "idDeal");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsdeal = $tNGs->getRecordset("deal");
$row_rsdeal = mysql_fetch_assoc($rsdeal);
$totalRows_rsdeal = mysql_num_rows($rsdeal);
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
<script language=JavaScript src='../scripts/innovaeditor.js'></script>
</head>

<body>
<a href="index.php"> <img src="../Icons/icon-home.gif" width="100px"  /> </a>
<div align="left" style="padding-top:100px; padding-left:25%;">

<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['idDeal'] == "") {
?>
    <?php echo NXT_getResource("Insert_FH"); ?>
    <?php 
// else Conditional region1
} else { ?>
    <?php echo NXT_getResource("Update_FH"); ?>
    <?php } 
// endif Conditional region1
?>
    Deal </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsdeal > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td width="107" class="KT_th"><label for="TenDeal_<?php echo $cnt1; ?>">Tên deal:</label></td>
          <td width="509"><input type="text" name="TenDeal_<?php echo $cnt1; ?>" id="TenDeal_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsdeal['TenDeal']); ?>" size="32" onchange="change(this.value);" />
              <?php echo $tNGs->displayFieldHint("TenDeal");?> <?php echo $tNGs->displayFieldError("deal", "TenDeal", $cnt1); ?> 
              </br>
              <script>     
			  
			  	function change(Ten){	 
							
				import java.util.Arrays;

				public class AccentRemover {
					
					private static char[] SPECIAL_CHARACTERS = { ' ', '!', '"', '#', '$', '%',
							'*', '+', ',', ':', '<', '=', '>', '?', '@', '[', '\\', ']', '^',
							'`', '|', '~', 'À', 'Á', 'Â', 'Ã', 'È', 'É', 'Ê', 'Ì', 'Í', 'Ò',
							'Ó', 'Ô', 'Õ', 'Ù', 'Ú', 'Ý', 'à', 'á', 'â', 'ã', 'è', 'é', 'ê',
							'ì', 'í', 'ò', 'ó', 'ô', 'õ', 'ù', 'ú', 'ý', 'Ă', 'ă', 'Đ', 'đ',
							'Ĩ', 'ĩ', 'Ũ', 'ũ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ạ', 'ạ', 'Ả', 'ả', 'Ấ',
							'ấ', 'Ầ', 'ầ', 'Ẩ', 'ẩ', 'Ẫ', 'ẫ', 'Ậ', 'ậ', 'Ắ', 'ắ', 'Ằ', 'ằ',
							'Ẳ', 'ẳ', 'Ẵ', 'ẵ', 'Ặ', 'ặ', 'Ẹ', 'ẹ', 'Ẻ', 'ẻ', 'Ẽ', 'ẽ', 'Ế',
							'ế', 'Ề', 'ề', 'Ể', 'ể', 'Ễ', 'ễ', 'Ệ', 'ệ', 'Ỉ', 'ỉ', 'Ị', 'ị',
							'Ọ', 'ọ', 'Ỏ', 'ỏ', 'Ố', 'ố', 'Ồ', 'ồ', 'Ổ', 'ổ', 'Ỗ', 'ỗ', 'Ộ',
							'ộ', 'Ớ', 'ớ', 'Ờ', 'ờ', 'Ở', 'ở', 'Ỡ', 'ỡ', 'Ợ', 'ợ', 'Ụ', 'ụ',
							'Ủ', 'ủ', 'Ứ', 'ứ', 'Ừ', 'ừ', 'Ử', 'ử', 'Ữ', 'ữ', 'Ự', 'ự', };
				
					private static char[] REPLACEMENTS = { '-', '\0', '\0', '\0', '\0', '\0',
							'\0', '_', '\0', '_', '\0', '\0', '\0', '\0', '\0', '\0', '_',
							'\0', '\0', '\0', '\0', '\0', 'A', 'A', 'A', 'A', 'E', 'E', 'E',
							'I', 'I', 'O', 'O', 'O', 'O', 'U', 'U', 'Y', 'a', 'a', 'a', 'a',
							'e', 'e', 'e', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'y', 'A',
							'a', 'D', 'd', 'I', 'i', 'U', 'u', 'O', 'o', 'U', 'u', 'A', 'a',
							'A', 'a', 'A', 'a', 'A', 'a', 'A', 'a', 'A', 'a', 'A', 'a', 'A',
							'a', 'A', 'a', 'A', 'a', 'A', 'a', 'A', 'a', 'E', 'e', 'E', 'e',
							'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'I',
							'i', 'I', 'i', 'O', 'o', 'O', 'o', 'O', 'o', 'O', 'o', 'O', 'o',
							'O', 'o', 'O', 'o', 'O', 'o', 'O', 'o', 'O', 'o', 'O', 'o', 'O',
							'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u',
							'U', 'u', };
				
					public static String toUrlFriendly(String s) {
						int maxLength = Math.min(s.length(), 236);
						char[] buffer = new char[maxLength];
						int n = 0;
						for (int i = 0; i < maxLength; i++) {
							char ch = s.charAt(i);
							buffer[n] = removeAccent(ch);
							// skip not printable characters
							if (buffer[n] > 31) {
								n++;
							}
						}
						// skip trailing slashes
						while (n > 0 && buffer[n - 1] == '/') {
							n--;
						}
						return String.valueOf(buffer, 0, n);
					}
				
					public static char removeAccent(char ch) {
						int index = Arrays.binarySearch(SPECIAL_CHARACTERS, ch);
						if (index >= 0) {
							ch = REPLACEMENTS[index];
						}
						return ch;
					}
					
					public static String removeAccent(String s) {
						StringBuilder sb = new StringBuilder(s);
						for (int i = 0; i < sb.length(); i++) {
							sb.setCharAt(i, removeAccent(sb.charAt(i)));
						}
						return sb.toString();
					}
					
				}
					
					//var Ten = document.getElementById("TenDeal_<?php echo $cnt1; ?>");	
					$.get("ajax-short-link.php",{ten:Ten},function(data){
					$("#test").html(data);
					});
					//document.getElementById("test").innerHTML=Ten+"àd";
					};
								
              </script>
              <a name="test" id="test">dd</a>
              </td>
        </tr>
        
        
        
        <!-- ============================ RUT GON LINK ================================
        <tr>
          <td class="KT_th"><label for="TenDeal_SL_<?php //echo $cnt1; ?>">Tên deal (short link):</label></td>
          <td> --> <input type="hidden" name="TenDeal_SL_<?php //echo $cnt1; ?>" id="TenDeal_SL_<?php //echo $cnt1; ?>" value="<?php //echo KT_escapeAttribute($row_rsdeal['TenDeal_SL']); ?>" size="32" /><!--
              <?php //echo $tNGs->displayFieldHint("TenDeal_SL");?> <?php //echo $tNGs->displayFieldError("deal", "TenDeal_SL", $cnt1); ?> </td>
        </tr> -->
        
        
        
        
        
        <tr>
          <td class="KT_th"><label for="MoTa_<?php echo $cnt1; ?>">Mô tả:</label></td>
          <td><textarea name="MoTa_<?php echo $cnt1; ?>" id="MoTa_<?php echo $cnt1; ?>" cols="100" rows="4"><?php echo KT_escapeAttribute($row_rsdeal['MoTa']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("MoTa");?> <?php echo $tNGs->displayFieldError("deal", "MoTa", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="NoiDung_<?php echo $cnt1; ?>">Nội dung:</label></td>
          <td>
          
          
          <textarea name="NoiDung_<?php echo $cnt1; ?>" id="NoiDung_<?php echo $cnt1; ?>" cols="100" rows="4" ><?php echo KT_escapeAttribute($row_rsdeal['NoiDung']); ?>
          
          
          <?php
  function encodeHTML($sHTML)
    {
    $sHTML=ereg_replace("&","&amp;",$sHTML);
    $sHTML=ereg_replace("<","&lt;",$sHTML);
    $sHTML=ereg_replace(">","&gt;",$sHTML);
    return $sHTML;
    }

  if(isset($_POST["txtContent"]))
    {
    $sContent=stripslashes($_POST['txtContent']); /*** remove (/) slashes ***/
    echo encodeHTML($sContent);
    }
  ?>
          
          
          
          </textarea>
              <?php echo $tNGs->displayFieldHint("NoiDung");?> <?php echo $tNGs->displayFieldError("deal", "NoiDung", $cnt1); ?> 
          
          
          
                    
          
          
          <script> //STEP 2: Replace the textarea (txtContent)
    var oEdit1 = new InnovaEditor("oEdit1");
    oEdit1.REPLACE("NoiDung_<?php echo $cnt1; ?>");//Specify the id of the textarea here
  </script>
          
          
          
          
          
          
          
          
          </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="SoNguoiMua_<?php echo $cnt1; ?>">Số người mua:</label></td>
          <td><input type="text" name="SoNguoiMua_<?php echo $cnt1; ?>" id="SoNguoiMua_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsdeal['SoNguoiMua']); ?>" size="7" />
              <?php echo $tNGs->displayFieldHint("SoNguoiMua");?> <?php echo $tNGs->displayFieldError("deal", "SoNguoiMua", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="GiaGoc_<?php echo $cnt1; ?>">Giá gốc:</label></td>
          <td><input type="text" name="GiaGoc_<?php echo $cnt1; ?>" id="GiaGoc_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsdeal['GiaGoc']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("GiaGoc");?> <?php echo $tNGs->displayFieldError("deal", "GiaGoc", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="GiaKhuyenMai_<?php echo $cnt1; ?>">Giá khuyến mãi:</label></td>
          <td><input type="text" name="GiaKhuyenMai_<?php echo $cnt1; ?>" id="GiaKhuyenMai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsdeal['GiaKhuyenMai']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("GiaKhuyenMai");?> <?php echo $tNGs->displayFieldError("deal", "GiaKhuyenMai", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="ThoiDiemDang_<?php echo $cnt1; ?>">Thời điểm đăng:</label></td>
          <td><input type="text" name="ThoiDiemDang_<?php echo $cnt1; ?>" id="ThoiDiemDang_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsdeal['ThoiDiemDang']); ?>" size="10" maxlength="22" />
              <?php echo $tNGs->displayFieldHint("ThoiDiemDang");?> <?php echo $tNGs->displayFieldError("deal", "ThoiDiemDang", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="ThoiDiemHetHan_<?php echo $cnt1; ?>">Thời điểm hết hạn:</label></td>
          <td><input type="text" name="ThoiDiemHetHan_<?php echo $cnt1; ?>" id="ThoiDiemHetHan_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsdeal['ThoiDiemHetHan']); ?>" size="10" maxlength="22" />
              <?php echo $tNGs->displayFieldHint("ThoiDiemHetHan");?> <?php echo $tNGs->displayFieldError("deal", "ThoiDiemHetHan", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="GiaTot_<?php echo $cnt1; ?>">Giá tốt:</label></td>
          <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsdeal['GiaTot']),"-1"))) {echo "checked";} ?> type="checkbox" name="GiaTot_<?php echo $cnt1; ?>" id="GiaTot_<?php echo $cnt1; ?>" value="-1" />
              <?php echo $tNGs->displayFieldError("deal", "GiaTot", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="LoaiDeal_<?php echo $cnt1; ?>">Loại deal:</label></td>
          <td><select name="LoaiDeal_<?php echo $cnt1; ?>" id="LoaiDeal_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset1['idLoaiDeal']?>"<?php if (!(strcmp($row_Recordset1['idLoaiDeal'], $row_rsdeal['LoaiDeal']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenLoai']?></option>
            <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("deal", "LoaiDeal", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="GhiChu_<?php echo $cnt1; ?>">Ghi chú:</label></td>
          <td><input type="text" name="GhiChu_<?php echo $cnt1; ?>" id="GhiChu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsdeal['GhiChu']); ?>" size="32" maxlength="255" />
              <?php echo $tNGs->displayFieldHint("GhiChu");?> <?php echo $tNGs->displayFieldError("deal", "GhiChu", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_deal_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsdeal['kt_pk_deal']); ?>" />
      <?php } while ($row_rsdeal = mysql_fetch_assoc($rsdeal)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idDeal'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'idDeal')" />
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
