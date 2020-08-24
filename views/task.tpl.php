
<form method="post">
 <p>Введите дело <input type="text" name="name" required /></p>
 <a href="/task.tpl.php"><input type="submit" name="addTask"/></a>
</form>
<form action="" method="post">
<p><input type="submit" name="edit_work" value="Закончить дело" /></p>
<p><input type="submit" name="delete_work" value="Удалить дело" /></p>

  <?php 
if (is_array($pageData['tasks']) || is_object($pageData['tasks']))
{
    foreach ($pageData['tasks'] as $key => $task) {
echo "<input type='radio' name='work' value='{$task['id']}' id='{$task['status']}'> <label for='{$task['status']}' class='{$task['status']}'>{$task['description']}</label><br>";
	}
}
?>
</form>
 <li><a href="/task/logout"><i class="fa fa-sign-out fa-fw"></i> Выйти</a>
