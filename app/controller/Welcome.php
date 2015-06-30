<?php
use Sky\core\Controller;
use Sky\App;

class WelcomeController extends Controller{
	public $requires = [
		'Sky.core.Exceptions'
	];
	public function index(){
		
		$this->view('App.Welcome');
	}
}