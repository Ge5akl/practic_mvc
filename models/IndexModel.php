<?php

class IndexModel extends Model {


	public function checkUser() {
		$login = $_POST['login'];
		$password = md5($_POST['password']);

		$result = mysqli_query($this->db,"SELECT * FROM `users` WHERE login = '".$login."'");
		for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$resLog[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
		if(!empty($resLog)) {
			return false;
		}
		if(empty($res)) {
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
	}
	} if(empty($res)){
		$result = mysqli_query($this->db,"INSERT INTO `users` (login, password) VALUES ('".$login."','".$password."')");
				for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
			if(!empty($row)) {
			$_SESSION['User'] = $row;
			$_SESSION['login'] = $login;
		header("Location: /task");
		}	else {
			return false;
		}
		}
	}
}