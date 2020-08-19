<?php
// Стартуем ссесию
session_start();
// Задаем тип контента и кодирвку.
header("Content-Type:text/html;charset=UTF-8");
// подключаем config.php
require_once("config.php");

//функция автозрагрузки
function __autoload($c) {
	// Если имеется директория контроллер, подгрузить все файлы из дирректорий.
	if(file_exists("controller/".$c.".php")) {
		require_once "controller/".$c.".php";
	}
	// Если имеется директория контроллер, подгрузить все файлы из дирректорий.
	elseif(file_exists("model/".$c.".php")) {
		require_once "model/".$c.".php";
	}
	
}
// Если мы получили гет запрос "option"
if($_GET['option']) {
	$class = trim(strip_tags($_GET['option']));
}
// Инчае в переменную класс записывает main
else {
	$class = 'main';	
}

 // Если есть класс в файле
	if(class_exists($class)) {
		// Создаем новый объект класса
		$obj = new $class;
		// Получаем из класса информацию
		$obj->get_body($class);
	}
	// Инче вывод и ошибку
	else {
		exit("<p>Нет данные для входа</p>");
	}


?>