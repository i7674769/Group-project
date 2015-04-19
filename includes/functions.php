<?php
/* Note: The following functions used for the "time ago" output were mostly taken from a turtorial (Reference: "DevelopPHP, unknown. Convert MySQL Timestamp to Ago Time Format OOP Tutorial. Available from: https://www.developphp.com/video/PHP/Convert-MySQL-Timestamp-to-Ago-Time-Format-OOP-Tutorial [Accessed 18th March 2015].") because we needed help coming up with solutions for changing the format and converting it. So we did some research online. I added comments though and made some small aditions like setting the timezone. */

class convertToAgo {
    function convert_datetime($str) {
        //sets the timezone
	   date_default_timezone_set('Europe/London');
   		list($date, $time) = explode(' ', $str); //Breaks string into an array.
    	list($year, $month, $day) = explode('-', $date); //Breaks a string into an array.
    	list($hour, $minute, $second) = explode(':', $time); //Breaks a string into an array.
    	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    	return $timestamp;
        //this function converts into a timestamp in the "2015-01-01 12:12:12" format
    }

    function makeAgo($timestamp){
        //sets the timezone
        date_default_timezone_set('Europe/London');
   		$difference = time() - $timestamp; //Difference between time and timestamp.
   		$periods = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
   		$lengths = array("60","60","24","7","4.35","12","10");
   		for($x = 0; $difference >= $lengths[$x]; $x++){
   			$difference /= $lengths[$x];  
   			$difference = round($difference); //Rounding the difference. 
        }
   		if($difference != 1) $periods[$x].= "s";
   			$text = "$difference $periods[$x] ago";
   			return $text;
        //this function gives out the differences between the time and the timestamp-time
    }
} 

?>
