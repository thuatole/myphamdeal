trang chu

<script type="application/javascript">
/*
1 hour = 3600 seconds
1 day = 86400 seconds
1 week = 604800 seconds
1 month = 2629744 seconds 
1 year = 31556926 seconds
*/
var myCountdown3 = new Countdown({
								 	//time: <?php //echo strtotime('2013-4-9')-strtotime('2013-4-7').','; ?> //86400*4, 
									time : <?php echo strtotime('2013-10-24 00:00:00')-strtotime(date('Y-m-d h:i:s')).','; ?>
									width:300, 
									height:50, 
									padding:0.6, 
									rangeHi:"day"
									});
</script>

