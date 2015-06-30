<?php
namespace Sky\core;

class Config extends BaseClass{
	public $requires = [
		'Sky.core.Common'
	];
	public $data = [];
	function __CONSTRUCT(){
		parent::__CONSTRUCT();
		
		$this->data = & get_config();
	}
	function load($name){
		return get_config($name);
	}
	function read($key = ''){
		if($key === ''){
			return $this->data;
		}
		
		$key = $this->_engineName($key);
		
		$file = implode($key->file,'.');


		if(!isset($this->data[$file])){
			return null;
		}
		
		if(!isset($this->data[$file][$key->key[0]])){
			return null;
		}
		
		return $this->data[$file][$key->key[0]];
	}
	function write($key,$value){
	
	}
	protected function _engineName($name){
		$segments = explode('.',$name);
		$index = 0;
		
		foreach($segments as $i => $name){
			if(ctype_upper(substr($name,0,1)) and $i != 0){
				$index = $i+1;
				break;
			}
		}
		
		if($index == 0){
			user_error('Unknown Config Key Name');
			exit;
		}
		
		return (object)[
			'file' => array_slice($segments,0,$index),
			'key' => array_slice($segments,$index)
		];
		
	}
}