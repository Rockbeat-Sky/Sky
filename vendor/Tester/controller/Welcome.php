<?php
namespace Nodes\controller;
use Sky\core\Controller;

class WelcomeController extends Controller{
	public function index(){
		echo '<pre>';
		print_r($this);
		echo '<h1>Nodes Controller Loaded</h1>';
	}
	
}
return __NAMESPACE__;