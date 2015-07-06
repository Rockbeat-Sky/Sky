<?php
 /**
 * Sky Framework
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions ofComposer.Autoload.ClassLoaderComposer.Autoload.ClassLoaderComposer.Autoload.ClassLoaderComposer.Autoload.ClassLoaderComposer.Autoload.ClassLoader files must retain the above copyright notice.
 *
 * @package		Sky Framework
 * @author		Hansen Wong
 * @copyright	Copyright (c) 2015, Rockbeat.
 * @license		http://www.opensource.org/licenses/mit-license.php MIT License
 * @link		http://rockbeat.web.id
 * @since		Version 1.0
 */

/**
* Set up your folder file
*/
$application_folder = 'app';
$vendor_folder = 'vendor';
$public_folder = 'public';

// --------------------------------------------------------------------
/**
* WARRING THIS BELOW DONT CHANGES ANY VALUE IF YOU DONT KNOW WHAT YOU DO!
*/
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . DS);

define('APP_PATH', ROOT . $application_folder . DS);
define('VENDOR_PATH', ROOT . $vendor_folder . DS);
define('PUBLIC_PATH', ROOT . $public_folder . DS);

require VENDOR_PATH.'sky'.DS.'core'.DS.'Sky.php';