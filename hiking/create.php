<?php

use Dotenv\Dotenv;

require './vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_POST["button"])) {
	$url = "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"];

	try {
		$database = new PDO($url, $_ENV["PASSWORD"], $_ENV["PASSWORD"]);
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$available = $_POST['available'] ?? 0;

		$statement = $database->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES (:name, :difficulty, :distance, :duration, :height_difference, :available);");
		$statement->bindParam(":name", $_POST["name"]);
		$statement->bindParam(":difficulty", $_POST["difficulty"]);
		$statement->bindParam(":distance", $_POST["distance"]);
		$statement->bindParam(":duration", $_POST["duration"]);
		$statement->bindParam(":height_difference", $_POST["height_difference"]);
		$statement->bindParam(":available", $available);
		$statement->execute();
		header("Location: index.php");
		echo 'Hike successfully added !';
	} catch (PDOException $error) {
		print_r($error->getMessage());
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add a hiking</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
	<a href="./read.php">Data list</a>
	<h1>Add</h1>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulty</label>
			<select name="difficulty">
				<option value="Very easy">Very easy</option>
				<option value="Easy">Easy</option>
				<option value="Medium">Medium</option>
				<option value="Hard">Hard</option>
				<option value="Very hard">Very Hard</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Duration</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Height Difference</label>
			<input type="text" name="height_difference" value="">
		</div>

		<div>
			<label for="available">Available</label>
			<input type="checkbox" name="available" value="1">	
		</div>
		<button type="submit" name="button">Submit</button>
	</form>
</body>

</html>