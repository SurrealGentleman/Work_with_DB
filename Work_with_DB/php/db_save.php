<form action="db.php">
	<input type="submit" name="button" value="На Главную">
</form>
<?php
	if (isset($_POST['save'])) {
		$conn = mysqli_connect("сервер", "логин", "пароль", "названиеБД");
		if (!$conn) {
			die("Ошибка: ".mysqli_connect_error());
		}
		$age = date('Ymd') - date('Ymd', strtotime($_POST['date']));
		$age = substr($age, 0, -4);
		$surname = $_POST["surname"];
		$name = $_POST['name'];
		$patronymic = $_POST['patronymic'];
		$sql = "INSERT INTO information_about_people (Фамилия, Имя, Отчество, Возраст) VALUES ('$surname', '$name', '$patronymic', $age)";
		if(mysqli_query($conn, $sql)){
		    echo "Данные успешно добавлены";
		} 
		else{
		    echo "Ошибка: ".mysqli_error($conn);
		}
	}
	mysqli_close($conn);
?>