<?php
class TaskModel extends Model {

	public function getTask(){
		$UserLogin = $_SESSION['login'];
		//var_dump($_SESSION['login']);
		$UserLogin = mysqli_real_escape_string($this->db, $UserLogin);
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
			$discript = mysqli_real_escape_string($this->db, $discript);
			$today = mysqli_real_escape_string($this->db, $today);
			$UsrId = mysqli_real_escape_string($this->db, $UsrId);
			$result = mysqli_query($this->db, "INSERT INTO `disc` (user_id, description, created_at) VALUES ('".$UsrId."', '".$discript."', '".$today."') ");
			return($result);
			//$result_query_insert = $mysqli->query("INSERT INTO `disc` (user_id, description, created_at) VALUES ('".$val1."', '".$val2."', '".$val3."') ");
		}

		public function deleteTask($idWork){
		$idWork = mysqli_real_escape_string($this->db, $idWork);
		$idCheck = $_SESSION['UserId'];
		$resultCheck = mysqli_query($this->db, "SELECT *  FROM `disc` WHERE `user_id` = '".$idCheck."' AND id = '".$idWork."'");
		$num = mysqli_num_rows($resultCheck);
		if($num == 0)
    	{	
    		 return(false);
     	}
     	if($num > 0){
    		 $idWork = mysqli_real_escape_string($this->db, $idWork);
			$result = mysqli_query($this->db, "DELETE FROM `disc` WHERE `id` = '".$idWork."'");
			return($idWork);
     	}
		}

		public function UdpdateTask($idWork){
		$idWork = mysqli_real_escape_string($this->db, $idWork);
		$idCheck = $_SESSION['UserId'];
		$resultCheck = mysqli_query($this->db, "SELECT *  FROM `disc` WHERE `user_id` = '".$idCheck."' AND id = '".$idWork."'");
		$num = mysqli_num_rows($resultCheck);
		if($num == 0)
    	{	
    		 return(false);
     	}
     	if($num > 0){
			$result = mysqli_query($this->db, "UPDATE `disc` set `status` = 'notActive' WHERE `id` = '".$idWork."'");
			return($idWork);
			}
		}
}