<?php

if (!session_start()) {
	echo "Unauthorized access! Please <a href='./login.php'>log in</a>!";
	return;
}

use Dotenv\Dotenv;

require './vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$url = "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"];

try {
  $database = new PDO($url, $_ENV["PASSWORD"], $_ENV["PASSWORD"]);
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $statement = $database->query("SELECT * FROM hiking");
  $hikings = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $hikings[] = $row;
  }
} catch (PDOException $error) {
  print_r($error->getMessage());
}

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Hikings</title>
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
  <a href="./create.php">Add a new hiking</a>
  <h1>Hikings list</h1>
  <table>
    <thead>
      <tr>
        <th>
          Name
        </th>
        <th>
          Difficulty
        </th>
        <th>
          Distance
        </th>
        <th>
          Duration
        </th>
        <th>
          Height Difference
        </th>
        <th>
          Available
        </th>
        <th>
          Update
        </th>
        <th>
          Delete
        </th>
      </tr>
    </thead>

    <tbody>
        <?php
        foreach ($hikings as $hiking) {
        ?>
        <form action="./update.php" method="POST">
          <tr>
            <td><?php echo $hiking['name'] ?></td>
            <td><?php echo $hiking['difficulty'] ?></td>
            <td><?php echo $hiking['distance'] ?></td>
            <td><?php echo $hiking['duration'] ?></td>
            <td><?php echo $hiking['height_difference'] ?></td>
            <td>
              <?php echo $hiking['available'] === 1 ? "Yes" : "No" ?>
            </td>
            <td> <input type="submit" name="update" value="Update">
              <input type="hidden" name="id" value="<?php echo $hiking['id'] ?>">
            </td>
      </form>
      <td>
        <form action="./delete.php" method="POST"><input type="checkbox" name="delete" value="<?php echo $hiking['id'] ?>" onclick="this.form.submit()"></form>
      </td>
      </tr>
    <?php }
    ?>

    </tbody>

  </table>
</body>

</html>