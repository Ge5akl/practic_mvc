<?php

use function PHPSTORM_META\elementType;

require_once("config.php");

function my_autoloader($c) {
	if(file_exists('controller/' . $c . '.php')){
		include 'controller/' . $c . '.php';
	}
	elseif(file_exists('model/' . $c . '.php')){
		include 'model/' . $c . '.php';
	}
}

spl_autoload_register('my_autoloader');


if($_GET['option']) {
	$class = trim(strip_tags($_GET['option']));
}
else {
	$class = 'main';	
}


	if(class_exists($class)) {
		
		$obj = new $class;
		$obj->get_body($class);
	}
	else {
		exit("<p>Нет данные для входа</p>");
	}


?>