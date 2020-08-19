<?php
    //Подключение шапки
    require_once("header.php");
    require_once("dbconnect.php");
?>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
<div id="content">
<form action="createmsg.php" method="post">
 <p>Введите дело <input type="text" name="name" required /></p>
 <p><input type="submit" /></p>
</form>
<form action="endwork.php" method="post">
<p><input type="submit" name="edit_work" value="Закончить дело" /></p>
<p><input type="submit" name="delete_work" value="Удалить дело" /></p>
        <?php
    require_once("showmsg.php");
?>
</form>
</div>
<?php
    //Подключение подвала
    require_once("footer.php");

?>