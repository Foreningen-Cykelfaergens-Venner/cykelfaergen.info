<?php
/* draws a calendar */
function draw_calendar($month,$year){
    include 'config.php';
    $conn = mysqli_connect($server, $user, $password,$database);
	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,0,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,0,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			$current_epoch = mktime(0,0,0,$month,$list_day,$year);
			$sql = "SELECT * FROM $tablename WHERE $current_epoch = start_day";
						
			$result = mysqli_query($conn, $sql);
            
    		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {
    				$calendar .= "Booked";

    			}
			} else {
    			$calendar .= "";
			}
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8 AND $days_in_this_week > 1):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	mysqli_close($conn);
	
	/* all done, return result */
	return $calendar;
}
$d = new DateTime(date("2023-06-01"));
if(isset($_GET["month"]) && $_GET["month"] == "1"){
    $d->modify( 'first day of next month' );
    echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . ' <a href="?month=2">Next</a></h3>';
    echo draw_calendar($d->format('m'),$d->format('Y'));
}else if(isset($_GET["month"]) && $_GET["month"] == "2"){
    $d->modify( 'first day of next month' );
    echo '<h3><a href="?month=1">Prev</a> ' . $months[$d->format('n')-0] . ' ' . $d->format('Y') . '</h3>';
    echo draw_calendar($d->format('m') + 1 ,$d->format('Y'));
}else{
    echo '<h3>' . $months[$d->format('n') - 0] . ' ' . $d->format('Y') . ' <a href="?month=2">Next</a></h3>';
    echo draw_calendar($d->format('m') + 1,$d->format('Y'));
}