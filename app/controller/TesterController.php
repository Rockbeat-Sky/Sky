<?php

use Sky\core\Controller;
use Sky\core\Loader;

class TesterController extends Controller{
	function index(){
		echo 'halllo';
		
	}
	function foo($test){
		echo 'fooo '.$test;
	}
}