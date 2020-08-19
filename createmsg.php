<?php 
   header('Location: index.php');
   include("dbconnect.php");
   include("index.php");
$login =  htmlspecialchars((string)$_SESSION['login']);
$discript =  htmlspecialchars((string)$_POST["name"]);
$today = date("m.d.y");       
/* создаем подготавливаемый запрос */
if ($stmt = $mysqli->prepare("SELECT id FROM `users` WHERE login=?")) {
  /*связываем параметры с метками */
  $stmt->bind_param("s", $login);
  /* запускаем запрос */
  $stmt->execute();
  /* связываем переменные с результатами запроса */
$stmt->bind_result($district);
  /* получаем значения */
  $stmt->fetch();
  /* закрываем запрос */
  $stmt->close();
  echo($_SESSION["district"]);

 $result_query_insert = $mysqli->query("INSERT INTO `disc` (user_id, description, created_at) VALUES ('".$district."', '".$discript."', '".$today."')");

}


//$result = 'INSERT INTO disc (user_id, description, created_at, status) VALUES (3,"'.$discript.'","'.$today.'","Activee")';
/*$query = mysqli_prepare($mysqli , "INSERT INTO `disc` (`user_id`, `description`,`created_at`) VALUES (?, ?,?)");
mysqli_stmt_bind_param($query, 'sss', $district, $discript, $today);
mysqli_stmt_execute($query);
echo($result);
$mysqli->close();*/

	
