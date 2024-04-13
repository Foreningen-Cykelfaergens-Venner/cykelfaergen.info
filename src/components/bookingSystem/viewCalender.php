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
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
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
					if($row["canceled"] == 1) $calendar .= "<font color=\"grey\"><s>";
    				$calendar .= "<b>" . $row["item"] . "</b><br>ID: " . $row["id"] . "<br>" . $row["name"] . "<br>" . $row["phone"] . "<br>" . $row["email"] . "<br> Antal personer: " . $row["item__count"] . "<br>";
    				if($current_epoch == $row["start_day"]) {
    					$calendar .= "Start tid: " . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) . "<br><hr>";
    				}
                    
					if($row["canceled"] == 1) $calendar .= "</s></font>";

                    if($row["canceled"] == 0) $calendar .= '<form action="/components/bookingSystem/cancel.php" method="post">
                    <input name="id" required="" value="'.$row["id"].'" type="hidden" /><br />
                    <p>
                    <img id="captchaimg2" src="/components/bookingSystem/captcha_code_file2.php?rand=<?php echo rand(); ?>" /><br>
                    <input id="captcha2" name="captcha2" required="" type="text" /></p>
                    <p><button name="cancel" type="submit">Cancel sejlads</button></p>
                </form>';
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

include 'config.php';
$conn = mysqli_connect($server, $user, $password,$database);

$sql = "SELECT * FROM $tablename WHERE canceled = 0";
$result = mysqli_query($conn, $sql);

echo "<p>I alt event bookinger: ".mysqli_num_rows($result)."</p>";

$d = new DateTime(date("2022-06-01"));
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';

echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));