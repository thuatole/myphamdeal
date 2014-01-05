<?php 
ob_start();
session_start();
if(!isset($_SESSION['dntc@!@#$%^']))
	header('location:dangnhap.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CalendarView — JavaScript Calendar Widget</title>
    <link rel="stylesheet" href="stylesheets/calendarview.css">
    <style>
      body {
        font-family: Trebuchet MS;
      }
      div.calendar {
        max-width: 240px;
        margin-left: auto;
        margin-right: auto;
      }
      div.calendar table {
        width: 100%;
      }
      div.dateField {
        width: 140px;
        padding: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        color: #555;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
      }
      div#popupDateField:hover {
        background-color: #cde;
        cursor: pointer;
      }
    </style>
    <script src="javascripts/prototype.js"></script>
    <script src="javascripts/calendarview.js"></script>
    <script>
      function setupCalendars() {
        // Embedded Calendar
        Calendar.setup(
          {
            dateField: 'from',			
            parentElement: 'embeddedCalendar'			
          }		 
        )
		
		Calendar.setup(
          {
            dateField: 'to',
            parentElement: 'embeddedCalendar1'
          }		 
        )

      }

      Event.observe(window, 'load', function() { setupCalendars() })
    </script>
  </head>
  <body>
  <a href="index.php"> <img src="../Icons/icon-home.gif" width="100px"  /> </a>
<div align="center" style="padding-top:100px;">


	<form method='get' action='XuatExcel.php'>
    <div style="width: 62%">
      <div style="height: 320px; background-color: #efefef; padding: 10px; -webkit-border-radius: 12px; -moz-border-radius: 12px; margin-right: 10px">
        <h3 style="text-align: center; background-color: white; -webkit-border-radius: 10px; -moz-border-radius: 10px; margin-top: 0px; margin-bottom: 20px; padding: 8px">
          -- Chọn thời điểm muốn in đơn hàng --
        </h3>
        <div id="embeddedExample" style="">
          <div id="embeddedCalendar" style="float:left; margin-left:5px; margin-right:100px;">
          </div>
		  <div id="embeddedCalendar1" style="float:left;">
          </div>
          <div style="clear:both;"></div></br>
          <div class="dateField" style="float:left; margin-left:40px; margin-right:185px;">
            <input id="from" name="from" type=text value="Select Date" style="width:100px; text-align:center;"></input>
          </div>		  
		  <div class="dateField" style="float:left;">
            <input id="to" name="to" type=text value="Select Date" style="width:100px; text-align:center;"></input>
          </div>
        </div>
		<div style="clear:both;"></div></br>
		<p align=center><input type=submit id="btnXuatExcel" name="btnXuatExcel" value="Xuất Excel"></input></p>
      </div>
    </div>				
	</form>

</div>

  </body>
</html>