<?php
namespace App\controller\test;
use Sky\core\Controller;

class HelloController extends Controller{
	public function index($param1 = null,$param2 = null){
		echo '<pre>';
		echo get_class($this);
		echo '<p>Hello World</p>';
		
		echo $param1.' - ';
		echo $param2;
	}
	public function __after(){
		print_r($this);
	}
}
return __NAMESPACE__;