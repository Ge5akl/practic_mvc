<?php

class IndexModel extends Model {


	public function checkUser($login, $password) {
		$login = mysqli_real_escape_string($this->db, $login);
		$password = mysqli_real_escape_string($this->db, $password);
		$result = mysqli_query($this->db,"SELECT * FROM `users` WHERE login = '".$login."' AND password = '".$password."'");
		for($i = 0; $i < mysqli_fetch_row($result);$i++) {
			$res[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
		//var_dump($res);
		//var_dump($_SESSION['login']);
		if(!empty($res)) {
		return($res);
	}
	 if(empty($res)){
		$resultReg = mysqli_query($this->db,"INSERT INTO `users` (login, password) VALUES ('".$login."','".$password."')");	
		return($resultReg);
		}	
}
}