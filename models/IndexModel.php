<?php

class IndexModel extends Model {


	public function checkUser() {
		$login = $_POST['login'];
		$password = md5($_POST['password']);

		$result = mysqli_query($this->db,"SELECT * FROM `users` WHERE login = '".$login."' AND password = '".$password."'");
		for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$res[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
		//var_dump($res);
		//var_dump($_SESSION['login']);
		if(!empty($res)) {
		$_SESSION['User'] = $res;
		$_SESSION['login'] = $login;
		header("Location: /task");
	} else {
			return false;
		}
	}

	public function registerNewUser($regLogin, $regPassword){
		$result = mysqli_query($this->db,"INSERT INTO `users` (login, password) VALUES ('".$regLogin."','".$regPassword."')");
	}
}