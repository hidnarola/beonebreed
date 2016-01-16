<?php 

/**
*	Print array/string.
*	@param - data  = data that you want to print
*	@param -is_die = if true. Excecution will stop after print. 
* @author = Virendra Patel - VPA
*	@modified = Sandip Gopani (SAG)
*/


function time_elapsed_string($ptime) {
	$etime = time() - $ptime;

	if ($etime < 1) {
	    return '0 seconds';
	}

	$a = array(365 * 24 * 60 * 60 => 'year',
	    30 * 24 * 60 * 60 => 'month',
	    24 * 60 * 60 => 'day',
	    60 * 60 => 'hour',
	    60 => 'minute',
	    1 => 'second'
	);
	$a_plural = array('year' => 'years',
	    'month' => 'months',
	    'day' => 'days',
	    'hour' => 'hours',
	    'minute' => 'minutes',
	    'second' => 'seconds'
	);

	foreach ($a as $secs => $str) {
	    $d = $etime / $secs;
	    if ($d >= 1) {
		$r = round($d);
		return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
	    }
	}
    }