<?php
class TaskModel extends Model {

	public function getTask(){
		$UserLogin = $_SESSION['login'];
		$five = $_SESSION['five'];
		//var_dump($_SESSION['login']);

		$query = mysqli_query($this->db, "SELECT id FROM `users` WHERE login = '".$UserLogin."'");
		for($i = 0; $i < mysqli_num_rows($query);$i++) {
			$res = mysqli_fetch_array($query, MYSQLI_ASSOC);
		}
		$UserId = $res["id"];
		$_SESSION['UserId'] = $UserId;
		$result = mysqli_query($this->db, "SELECT disc.* FROM `disc` INNER JOIN `users` ON users.id = disc.user_id WHERE users.id = '".$UserId."'");
		for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
		}
		//var_dump($row);
		return $row;
}		
		public function addTask($discript, $today,$UsrId){
			$val1 = $UsrId;
			$val2 = $discript;
			$val3 = $today;
			//var_dump($val3);
			$result = mysqli_query($this->db, "INSERT INTO `disc` (user_id, description, created_at) VALUES ('".$val1."', '".$val2."', '".$val3."') ");
			header("Refresh: 0");
			//$result_query_insert = $mysqli->query("INSERT INTO `disc` (user_id, description, created_at) VALUES ('".$val1."', '".$val2."', '".$val3."') ");
		}

		public function deleteTask($idWork){
		$val4 = $idWork;	
			$result = mysqli_query($this->db, "DELETE FROM `disc` WHERE `id` = '".$val4."'");
			header("Refresh: 0");
		}

			public function UdpdateTask($idWork){
		$val4 = $idWork;	
			$result = mysqli_query($this->db, "UPDATE `disc` set `status` = 'notActive' WHERE `id` = '".$val4."'");
			header("Refresh: 0");
		}
}