<?php

    class Debugger{
        function __construct($to_debug) {
        	$output = $to_debug;
    		if (is_array($output))
        		$output = implode(',', $output);

    		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        }
    }
?>