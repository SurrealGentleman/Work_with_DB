<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Работа с БД</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="block">
		<form action="db_save.php" method="POST">
			<div>
				<label for="IDsurname">Фамилия</label>
			</div>
			<input type="text" id="IDsurname" name="surname" required pattern="[А-ЯЁа-яё]+"><br>
			<div>
				<label for="IDname">Имя</label>
			</div>
			<input type="text" id="IDname" name="name" required pattern="[А-ЯЁа-яё]+"><br>
			<div>
				<label for="IDpatronymic">Отчество</label>
			</div>
			<input type="text" id="IDpatronymic" name="patronymic" required pattern="[А-ЯЁа-яё]+"><br>
			<div>
				<label for="IDdate">Дата Рождения</label>
			</div>
			<input type="date" id="IDdate" name="date" required><br>
			<input class="button" type="submit" name="save" value="Сохранить данные">
		</form>
	</div>
	
	<div class="block">
		<form action="" method="POST">
			<label for="IDchoise">Опции вывода сведений</label>
			<select id="IDchoise" name="choise">
				<option value="surname">По Фамилии в алфавитном порядке</option>
				<option value="age">Сортировка по возрасту</option>
			</select>
			<br>
			<input class="button" type="submit" name="output" value="Вывести данные">
		</form>
	</div>
	
	<?php
		if (isset($_POST['output'])) {
			$conn = mysqli_connect("сервер", "логин", "пароль", "названиеБД");
			if (!$conn) {
				die("Ошибка: ".mysqli_connect_error());
			}
			if ($_POST['choise'] == "surname") {
				// information_about_people - название таблицы
				$sql = "SELECT * FROM information_about_people ORDER BY Фамилия";
				if($result = mysqli_query($conn, $sql)){
				    echo "<br><br><font color=green>Сведения о сотрудниках:</font><table>";
				    foreach($result as $row){
				        echo "<tr>";
				            echo "<td><font color=blue>".$row["Имя"]."</font></td>";
				            echo "<td><font color=blue>".$row["Отчество"]."</font></td>";
				            echo "<td><font color=red>".$row["Фамилия"]."</font></td>";
				            echo "<td><i><u>".$row["Возраст"]." лет</u></i></td>";
				        echo "</tr>";
				    }
				    echo "</table>";
				    mysqli_free_result($result);
				} 
				else{
				    echo "Ошибка: ".mysqli_error($conn);
				}
				mysqli_close($conn);
			}
			else if ($_POST['choise'] == "age") {
				$sql = "SELECT * FROM information_about_people ORDER BY Возраст";
				if($result = mysqli_query($conn, $sql)){
					echo "<br><br><font color=green>Сведения о сотрудниках:</font><table>";
				    foreach($result as $row){
				        echo "<tr>";
				            echo "<td><font color=blue>".$row["Имя"]."</font></td>";
				            echo "<td><font color=blue>".$row["Отчество"]."</font></td>";
				            echo "<td><font color=red>".$row["Фамилия"]."</font></td>";
				            echo "<td><i><u>".$row["Возраст"]." лет</u></i></td>";
				        echo "</tr>";
				    }
				    echo "</table>";
				    mysqli_free_result($result);
				}
				else{
				    echo "Ошибка: ".mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		}
	?>
</body>
</html>