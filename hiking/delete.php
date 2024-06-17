<?php
use Dotenv\Dotenv;

require './vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_POST["delete"])) {

	$url = "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"];

	try {
		$database = new PDO($url, $_ENV["PASSWORD"], $_ENV["PASSWORD"]);
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $database->prepare("DELETE FROM hiking WHERE hiking.id = :id;");
        $statement->bindParam(":id", $_POST['delete']);
        $statement->execute();
		header("Location: index.php");
	} catch (PDOException $error) {
		print_r($error->getMessage());
	}
}


?>
