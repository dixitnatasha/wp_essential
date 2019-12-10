<?php

/** 
 * @version 1.0
 */
/*
Plugin Name: WordPress Essential
Plugin URI: 
Description: 
Author: Natasha Dixit
Version: 1.0
Author URI: 
*/

define('WPE_DEBUG', true);

function wpe_log_data($msg) {
	if(defined('WPE_DEBUG')) {
		$original_log_errors = ini_get('log_errors');
		$original_error_log = ini_get('error_log');
		ini_set('log_errors', true);
		ini_set('error_log', dirname(__FILE__).DIRECTORY_SEPARATOR.'debug.log');
		
		global $processing_id;
		if(empty($processing_id))
		$processing_id	= time();
		
		error_log("[$processing_id] ".print_r($msg, true)); //Comment This line to stop logging debug messages.
		
		ini_set('log_errors', $original_log_errors);
		ini_set('error_log', $original_error_log);		
	}
}