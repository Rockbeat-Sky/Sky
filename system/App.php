<?php
namespace Sky;

class App extends core\BaseClass{
public $ns = '';
	/**
	* Load file
	* 
	* @param string
	* @return void
	*/
	function __CONSTRUCT(){
		$this->Config = $this->loadCreate('Sky.core.Config');
	}
	function __get($key){
		return $this->$key;
	}
	function load($namespace){
		if(is_array($namespace)){
			foreach($namespace as $class){
				$this->load($class);
			}
			return;
		}
		if($namespace !== ''){
			core\load_file($namespace);
			$this->ns = $namespace;
		}
		return $this;
	}
	/**
	* Get or Create object class
	* 
	* @param string
	* @param array
	* @param boolean
	* @return mix
	*/
	function get($namespace = '',$config = [], $new = false){
		if($namespace != ''){
			$this->ns = $namespace;
		}
		return core\create_class($this->ns,$config,$new);
	}
	/**
	* Load File and create object class
	* 
	* @param string
	* @param array
	* @return mix
	*/
	function loadCreate($namespace,$config = [])
	{
		return $this->load($namespace)->get('',$config);
	}
	function getName($name){
		return core\get_name($name);
	}
}