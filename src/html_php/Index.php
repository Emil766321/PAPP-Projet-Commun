<?php
session_start();
include ('db.php');
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
        echo "<div class='plante'>";
        echo "<h3>" . htmlspecialchars($plante['Nom']) . "</h3>";
        echo "<p><strong>Humidité :</strong> " . htmlspecialchars($plante['Humidité']) . "</p>";
        echo "<p><strong>Arrosage :</strong> " . htmlspecialchars($plante['Arrosage']) . "</p>";
        echo "<p><strong>Température :</strong> " . htmlspecialchars($plante['Temperature_min']) . " à " . htmlspecialchars($plante['Temperature_max']) . "</p>";
        echo "<p><strong>Description :</strong> " . nl2br(htmlspecialchars($plante['Description'])) . "</p>";
        echo "</div><hr>";
    }
    ?>
    <!-- <style>
        #buto{
            margin-left: 200px;
        }
    </style> 
    Pour deplacer le bouton -->

</body>
</html>

