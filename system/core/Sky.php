<?php
namespace Sky\core;
use Sky\App;

define('SKY_VERSION','1.0.0alpha');

$core = [
	'Common',
	'BaseClass'
];
// load core file
foreach($core as $file){
	require_once SYS_PATH.'core'.DS.$file.'.php';
}

load_file('Sky.App');
$APP = create_class('Sky.App');
/**
* initialize Benchmark
*/
$BM = $APP->loadCreate('Sky.core.Benchmark');
$BM->mark('start_system');

/**
Config
**/

$CONFIG = $APP->loadCreate('Sky.core.Config');
$CONFIG->load('App.Base');
/**
initialize prase URI and Router
*/

$RTR = $APP->loadCreate('Sky.core.Router',get_config('App.Routes'));

$class  = ucfirst($RTR->class).'Controller';
$method = $RTR->method;

/**
Start Running Controller
*/

$BM->mark('start_controller');

$APP->load('Sky.core.Controller');

if(!file_exists($RTR->getPath())){
	user_error('404 : '.$RTR->getPath());
	exit;
}
$ns = DS.(require_once $RTR->getPath()).DS;

// possibility name class
$nsclass = [
	$class,
	DS.'App'.DS.'controller'.DS.$class,
	$ns.$class
];

foreach($nsclass as $name){
	if(class_exists($name)){
		$class = $name;
		break;
	}
}

$SKY = new $class;
if(!method_exists($SKY,'__init')){
	user_error('Cant start controller');
}

$SKY->__init($method, array_slice($RTR->segments, 2));
$BM->mark('end_controller');