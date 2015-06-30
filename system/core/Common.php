<?php
namespace Sky\core;
/**
* Load File
* 
* @param string
*/
function &load_file($namespace,$folder = ''){
	static $loaded = [];
	if(!isset($loaded[$namespace])){
		$ns = get_name($namespace,$folder);
		if(!file_exists($ns->path)){
			user_error('File '.$ns->path.' Not Found');
			exit;
		}
		require_once $ns->path;
		$loaded[$namespace] = $ns;
	}
	return $loaded[$namespace];
}
function &create_class($namespace = '',$config = [],$new = false){
	static $class = [];
	if($namespace == ''){
		return $class;
	}
	if($new === false && isset($class[$namespace])){
		return $class[$namespace];
	}
	$ns = load_file($namespace);
	$class[$namespace] = new $ns->namespace();
	return $class[$namespace] ;
}
function get_name($namespace,$folder = ''){
	static $env;
	// is environtment empty?
	if($namespace == ''){
		user_error('No Namespace');
		exit;
	}
	if(!$env){
		$env = (require_once APP_PATH.'\config\Environment.php');
	}
	$segments = explode('.',$namespace);	
	$appname = $segments[0];
	
	if($folder !== ''){
		array_splice($segments,1,0,[$folder]);
	}
	
	$path = VENDOR_PATH;
	
	
	if(isset($env[$appname])){
		$path = $env[$appname];
		array_shift($segments);
	}

	$p = implode(DS,$segments);

	$name = (object)[
		'app' => $appname,
		'namespace' => DS.$appname.DS.$p,
		'class' => end($segments),
		'path' => $path . $p. '.php',
		'segments' => $segments
	];
	return $name;
}
/**
* get Config
*/
function &get_config($name = ''){

	static $_config = [];
	if($name == ''){
		return $_config;
	}
	$cf = get_name($name,'config');
	$key = $cf->app.'.'.$cf->class;
	
	// config  is already loaded?
	if(!isset($_config[$key])){
		// file config is exist?
		if(!file_exists($cf->path)){
			user_error('Config '.$cf->path.' Not Found');
			exit;
		}
		$_config[$key] = (require $cf->path);
	}
	return $_config[$key];
}

function remove_invisible_characters($str, $url_encoded = TRUE){
		$non_displayables = array();
		// every control character except newline (dec 10)
		// carriage return (dec 13), and horizontal tab (dec 09)
		
		if ($url_encoded){
			$non_displayables[] = '/%0[0-8bcef]/';	// url encoded 00-08, 11, 12, 14, 15
			$non_displayables[] = '/%1[0-9a-f]/';	// url encoded 16-31
		}
		
		$non_displayables[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';	// 00-08, 11, 12, 14-31, 127

		do{
			$str = preg_replace($non_displayables, '', $str, -1, $count);
		}
		while ($count);

		return $str;
	}