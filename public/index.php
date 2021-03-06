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
/*
|--------------------------------------------------------------------------
| Error Reporting
|--------------------------------------------------------------------------
*/
error_reporting( E_ALL );

ini_set( "display_errors", 1 ); 

require_once __DIR__ . DIRECTORY_SEPARATOR . 'define.php';

$_SKY_PATH = VENDOR_PATH. 'sky' . DS . 'framework' . DS . 'src' . DS . 'core'.DS. 'Sky.php';

if(!is_file($_SKY_PATH)){
	user_error('Sky Framework Not Found');
	exit;
}
require_once $_SKY_PATH;