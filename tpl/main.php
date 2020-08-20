

<div id="main">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<div id="content">
<form action="createmsg.php" method="post">
 <p>Введите дело <input type="text" name="name" required /></p>
 <p><input type="submit" /></p>
</form>
<form action="endwork.php" method="post">
<p><input type="submit" name="edit_work" value="Закончить дело" /></p>
<p><input type="submit" name="delete_work" value="Удалить дело" /></p>
<?php foreach($content as $row) :?>
	<?php  echo "<input type='radio' name='work' value='{$row['id']}' id='{$row['status']}'> <label for='{$row['status']}' class='{$row['status']}'>{$row['description']}</label><br>"; ?>

<?php endforeach;?>	
	
					</div>
			</div>