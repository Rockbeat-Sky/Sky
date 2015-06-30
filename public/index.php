<?php
/**
Public File Index
*/

/**
* Set up your folder file
*/
$application_folder = 'app';
$system_folder = 'system';
$vendor_folder = 'vendor';
$public_folder = 'public';

// --------------------------------------------------------------------
/**
* WARRING THIS BELOW DONT CHANGES ANY VALUE IF YOU DONT KNOW WHAT YOU DO!
*/
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS.'..'.DS);

define('APP_PATH', ROOT . $application_folder . DS);
define('VENDOR_PATH', ROOT . $vendor_folder . DS);
define('PUBLIC_PATH', ROOT . $public_folder . DS);
define('SYS_PATH', ROOT . $system_folder . DS );

require SYS_PATH.'core'.DS.'Sky.php';