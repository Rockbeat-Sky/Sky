<?php
namespace Sky\core;

class Controller extends BaseClass{
	private static $instance;
	public $SKY;
	public $models = [];
	/**
	* Start initialize controller
	* 
	* @param string
	* @param array
	* @return void
	*/
	public function __init($method,$params){
		self::$instance =& $this;
		
		// load model
		foreach($this->models as $name){
			load_file($name,'model');
		}
		$this->SKY = (object)[
			'method' => $method,
			'params' => $params
		];
		
		
		// is method page have?
		if(!method_exists($this,$method)){
			user_error('page not found '.$method);
			exit;
		}
		// run before controller if have?
		if(method_exists($this,'__before')){
			$this->__before();
		}
		call_user_func_array([$this,$method],$params);
		// run after controller if have?
		if(method_exists($this,'__after')){
			$this->__after();
		}
	}
	public static function &get_instance(){
		return self::$instance;
	}
	/**
	* render view
	* 
	* @param string
	* @param array
	* @param boolean
	* @return mix
	*/
	public function view($name,$data = [],$return = false){
		$prop = get_name($name,'view');
		require_once $prop->path;
	}
}