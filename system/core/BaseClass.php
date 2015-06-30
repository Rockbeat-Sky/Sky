<?php
namespace Sky\core;

class BaseClass{
	public $_config = [];
	public $requires = [];
	public function __CONSTRUCT($config = []){
		foreach($this->requires as $class){
			load_file($class);
		}
	}
	/**
	Set Config
	*/
	function __call($key,$param){
		return call_user_func_array([create_class('Sky.App'),$key],$param);
	}
	public function setConfig($config){
		$this->_config = array_merge($this->_config,$this->__init_config($config));
		return $this;
	}
	public function getConfig($index = ''){
		if($index === ''){
			return $this->_config;
		}
		if(isset($this->_config[$index])){
			return $this->_config[$index];
		}
		return null;
	}
	protected function __init_config($config){
		foreach($config as $name => $val){
			$method = '__Apply'.ucfirst($name);
			if(method_exists($this,$method)){
				$config[$name] = call_user_func(array($this,$method),$val);
			}
		}
		return $config;
	}
}