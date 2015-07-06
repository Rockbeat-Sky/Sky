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
 
use Sky\core\Controller;
use Sky\core\Loader;
use Sky\core\Config;
use Sky\core\Language;
use Sky\debug\ClassLoader;

class WelcomeController extends Controller{

	public function index(){
		
		$this->view('App.Welcome');
		
		echo '<pre>';
		
		Loader::getClass('App.libs.Test');
		
		$t =  new ClassLoader;
		$t->all();
	}
}