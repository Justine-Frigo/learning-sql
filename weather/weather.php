<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
</head>
<body>

<form action="index.php" method="post">
    <label for="city">Ville:</label>
    <input type="text" name="city" required><br>
    <label for="number">Haut:</label>
    <input type="number" name="haut" min="-20" required>
    <label for="bas">Bas:</label>
    <input type="number" name="bas" min="-20" required>
    <input type="submit" value="Envoyer" name="submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $city = $_POST['city'];
    $haut = $_POST['haut'];
    $bas = $_POST['bas'];
    try {
        $db = new PDO("mysql:host=localhost;dbname=weatherapp", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("INSERT INTO Météo (ville, haut, bas) VALUES (:city, :haut, :bas)");
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':haut', $haut);
        $stmt->bindParam(':bas', $bas);
        $stmt->execute();
        // Redirection après l'insertion pour éviter la resoumission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_GET['delete'])) {
    $city = $_GET['delete'];
    try {
        $db = new PDO("mysql:host=localhost;dbname=weatherapp", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("DELETE FROM Météo WHERE ville = :city");
        $stmt->bindParam(':city', $city);
        $stmt->execute();
        // Redirection après la suppression pour éviter la resoumission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<table>
    <thead>
    <tr>
        <th>Ville</th>
        <th>Bas</th>
        <th>Haut</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=weatherapp", "root", "root");
        $db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->query("SELECT * FROM Météo");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['ville']) . "</td>";
            echo "<td>" . htmlspecialchars($row['bas']) . "</td>";
            echo "<td>" . htmlspecialchars($row['haut']) . "</td>";
            echo "<td><form method='get'><input type='checkbox' name='delete' value='" . htmlspecialchars($row['ville']) . "' onclick='this.form.submit()'></form></td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>
    </tbody>
</table>
    
</body>
</html>
