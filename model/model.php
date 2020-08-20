<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
class model {
	
	protected $db;
	
	public function __construct() {
		$this->db = new mysqli(HOST, USER, PASSWORD, DB);
		if (mysqli_connect_errno()) { 
            echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
            exit(); 	
        }
	}
	public function getTask(){
		$result = mysqli_query($this->db, "SELECT disc.* FROM `disc` INNER JOIN `users` ON users.id = disc.user_id WHERE users.id = 3");
		mysqli_num_rows($result);
		for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
		return $row;
	//$pdo = new PDO("msql:host=localhost;dbname=tasklist","root","");
	//$statement = $pdo->prepare("SELECT disc.* FROM `disc` INNER JOIN `users` ON users.id = disc.user_id WHERE users.id = 3");
	//$statement->execute();
	//$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($tasks);
	}

}
?>