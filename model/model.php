<?php
class model {
	
	protected $db;
	
	public function __construct() {
		$this->db = new mysqli(HOST, USER, PASSWORD, DB);
		if (mysqli_connect_errno()) { 
            echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
            exit(); 
        }
	}
}
?>