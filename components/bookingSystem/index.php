<?php
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
	include 'config.php';
    $conn = mysqli_connect($server, $user, $password,$database);
	$d = new DateTime(date("2022-06-01"));
	$month = $d->format('m');
	$year = $d->format('Y');

	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;

	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));

	$datesToBeHidden = ["2022-07-01", "2022-07-02"];

	for($list_day = 1; $list_day <= $days_in_month; $list_day++){
		$current_epoch = mktime(0,0,0,$month,$list_day,$year);

		$sql = "SELECT * FROM $tablename WHERE canceled = 0";
		$result = mysqli_query($conn, $sql);

		$result = mysqli_query($conn, $sql);
            
    	if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    		while($row = mysqli_fetch_assoc($result)) {
				array_push($datesToBeHidden, date('Y-m-d', $row["start_day"]));
			}
		}
	}

	$datesToBeHidden = json_encode($datesToBeHidden);

?>
<style>
html *
{
   font-family: Arial !important;
}
table.calendar {
	border-left: 1px solid #999;
}
tr.calendar-row {
}
td.calendar-day {
	min-height: 80px;
	font-size: 11px;
	position: relative;
	vertical-align: top;
}
* html div.calendar-day {
	height: 80px;
}
td.calendar-day:hover {
	background: #eceff5;
}
td.calendar-day-np {
	background: #eee;
	min-height: 80px;
}
* html div.calendar-day-np {
	height: 80px;
}
td.calendar-day-head {
	background: #ccc;
	font-weight: bold;
	text-align: center;
	width: 120px;
	padding: 5px;
	border-bottom: 1px solid #999;
	border-top: 1px solid #999;
	border-right: 1px solid #999;
}
div.day-number {
	background: #999;
	padding: 5px;
	color: #fff;
	font-weight: bold;
	float: right;
	margin: -5px -5px 0 0;
	width: 20px;
	text-align: center;
}
td.calendar-day, td.calendar-day-np {
	width: 120px;
	padding: 5px;
	border-bottom: 1px solid #999;
	border-right: 1px solid #999;
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
	background: #737373 !important;
    border: none !important;
    color: #fff !important;
}

td.ui-state-disabled{
	opacity: .1 !important;
}
</style>
<link href="/components/bookingSystem/jquery-ui.css" rel="stylesheet">
<script defer src="/components/bookingSystem/jquery-ui.js"></script>
<? if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "da-DK"){ ?>
<script defer src="/components/bookingSystem/lang/datepicker-da.js"></script>
<?}?>
<? if(isset($_COOKIE["region"]) && $_COOKIE["region"] == "de-DE" || $_SERVER["HTTP_HOST"] == "www.fahrradfaehre.info" && !isset($_COOKIE["region"])){ ?>
<script defer src="/components/bookingSystem/lang/datepicker-de.js"></script>
<?}?>
<script>
    $(function() {
		$.datepicker.setDefaults($.datepicker.regional['da']);
		$( "#from" ).datepicker({
			defaultDate: new Date(2022, 5, 25),
			changeMonth: false,
			beforeShowDay: disableSpecificWeekDays,
			numberOfMonths: 3,
			firstDay: 1,
			beforeShow: function() {
				$( "#from" ).datepicker( "option", "minDate", new Date(2022, 5, 25) );
				$( "#from" ).datepicker( "option", "maxDate", new Date(2022, 7, 28) );
			},
			onClose: function( selectedDate ) {
				let parts_of_date;
				let output = new Date(selectedDate);
				if(selectedDate.indexOf("-") > -1){
					parts_of_date = selectedDate.split("-");
					output = new Date(+parts_of_date[2], parts_of_date[1] - 1, +parts_of_date[0]);
				}else if(selectedDate.indexOf(".") > -1){
					parts_of_date = selectedDate.split(".");
					output = new Date(+parts_of_date[2], parts_of_date[1] - 1, +parts_of_date[0]);
				}

				$( "#from" ).datepicker( "option", "maxDate", selectedDate );

				/* if(output.getDay() == 5){
					document.querySelector("select[name=start_hour]").value = "18";
					document.querySelector("select[name=end_hour]").value = "20";
				}else{
					document.querySelector("select[name=start_hour]").value = "16";
					document.querySelector("select[name=end_hour]").value = "18";
				} */
			}
		});
	}); 
  	var daysToDisable = <? echo $datesToBeHidden;?>;
	var monthsToDisable = [0,1,2,3,4,8,9,10,11];

	function disableSpecificWeekDays(date) {
		var string = jQuery.datepicker.formatDate('yy-mm-dd', date);

		if (daysToDisable.indexOf(string) !== -1) {
			return [false];
		}

		var month = date.getMonth();
		if ($.inArray(month, monthsToDisable) != -1) {
			return [false];
		}
		return [true];
	}
</script>
<form method="post" id="bookingForm">
	<p><input checked="checked" name="item" type="hidden" value="Event sejlads" /></p>
	<table style="width: 100%">
		<tr>
			<td>Navn:</td>
			<td> <input maxlength="50" name="fullname" placeholder="Indtast her..." required="" type="text" /></td>
		</tr>
		<tr>
			<td>Mobil:</td>
			<td>
	<input maxlength="20" name="phone" required="" placeholder="Indtast her..." type="tel" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
	<input name="email" required="" placeholder="Indtast her..." type="email" /></td>
		</tr>
		<tr>
			<td>Antal personer (maks 12):</td>
			<td>
				<input type="tel" name="count" placeholder="Indtast her..." maxlength="12" required>
			</td>
		</tr>
		<tr>
			<td>Dato:</td>
			<td>
			<input id="from" name="start_day" required="" type="text" placeholder="Select date" /></td>
		</tr>
		<tr hidden>
			<td>Tid:</td>
			<td> <select name="start_hour">
	<option selected="selected">18</option>
	</select>:<select name="start_minute">
	<option selected="selected">00</option>
	</select> - <select name="end_hour">
	<option selected>20</option>
	</select>:<select name="end_minute">
	<option selected="selected">55</option>
	</select></td>
		</tr>
	</table>
	<section style="float: right;">
		<p style="text-align: right;">
		<!-- <img id="captchaimg" src="/components/bookingSystem/captcha_code_file.php?rand=<?php echo rand(); ?>" /><br>
		<input id="captcha" name="captcha" required="" placeholder="Indtast captcha..." type="text" /></p> -->
		<button name="book" class="btn banner-btn" type="submit">Reserver dit event sejlads</button>
	</section>
	<div style="clear: both;"></div>
</form>
<script src="/js/event.booking.js"></script>