<?php
 /**
 * Sky Framework
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @package		Sky Framework
 * @author		Hansen Wong
 * @copyright	Copyright (c) 2015, Rockbeat.
 * @license		http://www.opensource.org/licenses/mit-license.php MIT License
 * @link		http://rockbeat.web.id
 * @since		Version 1.0
 */
return [
	/*
	|--------------------------------------------------------------------------
	| Debug Settings
	|--------------------------------------------------------------------------
	*/
	'backtrace_print' => true, // option: 'print' | 'array' | 'false'
	/*
	|--------------------------------------------------------------------------
	| Default TimeZone
	|--------------------------------------------------------------------------
	|
	| This for global time zone
	|
	*/
	'default_timezone' => 'asia/jakarta',
	
	/*
	|--------------------------------------------------------------------------
	| Default Language
	|--------------------------------------------------------------------------
	|
	| This determines which set of language files should be used. Make sure
	| there is an available translation if you intend to use something other
	| than english.
	|
	*/
	'language' => 'en', // default language
	
	'public_folder' => 'public',
	/*
	|--------------------------------------------------------------------------
	| Default Character Set
	|--------------------------------------------------------------------------
	|
	| This determines which character set is used by default in various methods
	| that require a character set to be provided.
	|
	*/
	'charset' => 'UTF-8',
	
	/*
	|--------------------------------------------------------------------------
	| Allowed URL Characters
	|--------------------------------------------------------------------------
	|
	| This lets you specify with a regular expression which characters are permitted
	| within your URLs.  When someone tries to submit a URL with disallowed
	| characters they will get a warning message.
	|
	| As a security measure you are STRONGLY encouraged to restrict URLs to
	| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
	|
	| Leave blank to allow all characters -- but only if you are insane.
	|
	| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
	|
	*/
	'permitted_uri_chars' => 'a-z 0-9~%.:_\-',
	
	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| If you use the Encryption class or the Session class you
	| MUST set an encryption key.  See the user guide for info.
	|
	*/
	'encryption_key' => 'YOUR_KEY',
	
	/*
	|--------------------------------------------------------------------------
	| Cache Directory Path
	|--------------------------------------------------------------------------
	|
	| set true value to enable cache
	*/
	'enable_cache' => false,
	
	'cache_path' => APP_PATH . 'cache' . DS,
	
	/*
	|--------------------------------------------------------------------------
	| Log
	|--------------------------------------------------------------------------
	|
	| log configuration using monolog package
	|
	*/
	// enable log by level, to disable just set empty array []
	'enable_log' => [100,400,500,550],
	
	/*
	|--------------------------------------------------------------------------
	| Split file by time
	|--------------------------------------------------------------------------
	| ex:
	| 	'y' split file by year
	| 	'y-m' split file by month (default)
	| 	'y-m-d' split file by day 
	*/
	'log_split_time' => 'y-m',
	
	// path location log file will be save
	'log_path' => APP_PATH.'log'.DS,
	
	// log file name
	'log_filename' => [
		100	=> '100.debug.log',
		200 => '200.info.log',
		300	=> '300.warning.log',
		400	=> '400.error.log',
		500 => '500.critical.log',
        550 => '550.alert.log'
	]

];