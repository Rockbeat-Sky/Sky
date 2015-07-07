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
	| Default Language
	|--------------------------------------------------------------------------
	|
	| This determines which set of language files should be used. Make sure
	| there is an available translation if you intend to use something other
	| than english.
	|
	*/
	'language' => 'en', // default language
	
	
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
	
	'fmt_time' => 'h:i:s A',
	
	'fmt_date' => 'y/m/d',
	
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
	| Leave this BLANK unless you would like to set something other than the default
	| system/cache/ folder.  Use a full server path with trailing slash.
	|
	*/
	'cache_path' => APP_PATH.'cache'
];