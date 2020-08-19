<?php 
$login = htmlspecialchars($_SESSION['login']);
/* создаем подготавливаемый запрос */
if ($stmt = $mysqli->prepare("SELECT id FROM `users` WHERE login=?")) {
  /* связываем параметры с метками */
  $stmt->bind_param("s", $login);
  /* запускаем запрос */
  $stmt->execute();
  /* связываем переменные с результатами запроса */
  $stmt->bind_result($district);
  /* получаем значения */
  $stmt->fetch();
  /* закрываем запрос */
  $stmt->close();
}
$_SESSION["district"] = $district;
$result = mysqli_query($mysqli, "SELECT disc.* FROM `disc` INNER JOIN `users` ON users.id = disc.user_id WHERE users.id = $district");
while ($r1 = mysqli_fetch_assoc($result)) {
echo "<input type='radio' name='work' value='{$r1['id']}' id='{$r1['status']}'> <label for='{$r1['status']}' class='{$r1['status']}'>{$r1['description']}</label><br>";

}