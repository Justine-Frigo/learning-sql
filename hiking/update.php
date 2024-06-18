<?php

use Dotenv\Dotenv;

require './vendor/autoload.php';

session_start();

if (!isset($_SESSION['user_id'])) {
	echo "Unauthorized access! Please <a href='./login.php'>log in</a>!";
	return;
}


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$url = "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"];

if (isset($_POST["update"])) {
	$id = $_POST["id"];

	try {
		$database = new PDO($url, $_ENV["PASSWORD"], $_ENV["PASSWORD"]);
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $database->query("SELECT * FROM hiking WHERE id = $id");
		$original_hiking = $statement->fetch(PDO::FETCH_ASSOC);
	} catch (PDOException $error) {
		print_r($error->getMessage());
	}
}

if (isset($_POST['button'])) {
	try {

		$available = $_POST['available'] ?? 0;

		$database = new PDO($url, $_ENV["PASSWORD"], $_ENV["PASSWORD"]);
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$statement = $database->prepare("UPDATE hiking SET hiking.name = :name, hiking.difficulty = :difficulty, hiking.distance = :distance, hiking.duration = :duration, hiking.height_difference = :height_difference, hiking.available = :available WHERE hiking.id = :id");
		$statement->bindParam(":name", $_POST["name"]);
		$statement->bindParam(":difficulty", $_POST["difficulty"]);
		$statement->bindParam(":distance", $_POST["distance"]);
		$statement->bindParam(":duration", $_POST["duration"]);
		$statement->bindParam(":height_difference", $_POST["height_difference"]);
		$statement->bindParam(":available", $available);
		$statement->bindParam(":id", $_POST['id']);
		$statement->execute();
		header("Location: index.php");
		echo 'Hike successfully updated !';

	} catch (PDOException $error) {
		print_r($error->getMessage());
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Update a hiking</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
<a href="logout.php">Se déconnecter</a>

	<h1>Update</h1>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<div>
			<label for="name">Name</label>
			<input type="hidden" value="<?php echo $id ?>" name="id">
			<input type="text" name="name" value="<?php echo $original_hiking['name'] ?>">
		</div>

		<div>
			<label for="difficulty">Difficulty</label>
			<select name="difficulty">
				<option value="<?php echo $original_hiking['difficulty'] ?>"><?php echo $original_hiking['difficulty'] ?></option>
				<option value="Very easy">Very easy</option>
				<option value="Easy">Easy</option>
				<option value="Medium">Medium</option>
				<option value="Hard">Hard</option>
				<option value="Very hard">Very Hard</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $original_hiking['distance'] ?>">
		</div>
		<div>
			<label for="duration">Duration</label>
			<input type="time" name="duration" value="<?php echo $original_hiking['duration'] ?>">
		</div>
		<div>
			<label for="height_difference">Height Difference</label>
			<input type="text" name="height_difference" value="<?php echo $original_hiking['height_difference'] ?>">
		</div>

		<div>
			<label for="available">Available</label>
			<input type="checkbox" name="available" <?php echo $original_hiking['available'] === 1 ? 'checked' : '' ?> value="1">
		</div>
		<button type="submit" name="button">Submit</button>
	</form>
</body>