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

define('MODE_USER','development');
/*
|--------------------------------------------------------------------------
| Set-up Application Name and Folder Name
|--------------------------------------------------------------------------
*/
define('APP_NAME','App');

$application_folder = 'app';

/*
|--------------------------------------------------------------------------
| WARRING THIS BELOW DONT CHANGES ANY VALUE IF YOU DONT KNOW WHAT YOU DO!
|--------------------------------------------------------------------------
*/
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . DS);

define('APP_PATH', ROOT . $application_folder . DS);
define('VENDOR_PATH', ROOT . 'vendor' . DS);
define('PUBLIC_PATH', __DIR__ . DS);