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
 
/**
This is CLI CONFIG for Doctrine 
**/
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Sky\doctrine\ORM;

require_once __DIR__. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR . 'autoload.php';
$orm = new ORM;

return ConsoleRunner::createHelperSet($orm->entity);