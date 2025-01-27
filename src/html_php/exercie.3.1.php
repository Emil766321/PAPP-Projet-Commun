<?php
session_start();
include('db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Plantes</title>
</head>
<body>

    <a href="Login.php">
        <button>Login</button>
    </a>

    <h1>Gestion des Plantes</h1>
    <hr>

    <h2>Liste des plantes</h2>

    <!-- Liste des plantes -->
    <?php
    $query = "SELECT * FROM plante";
    $stmt = $conn->query($query);
    $plantes = $stmt->fetchAll();

    foreach ($plantes as $plante) {
        echo "<a href='details.php?id=" . $plante['id'] . "'>";
        echo "<button>" . htmlspecialchars($plante['Nom']) . "</button>";
        echo "</a><br><br>";
    }
    ?>

</body>
</html>
