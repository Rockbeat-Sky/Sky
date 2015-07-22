<?php

use Sky\core\Controller;
use Sky\core\Loader;
use Sky\validate\Validate;
use Sky\core\Language;
class TesterController extends Controller{
	function index(){
		$v = new Validate();
		echo '<pre>';
		print_r(Language::$language);
	}
}