<?php
session_start();
include ('db.php');
/*include('db.php'); // Connexion à la base de données
// Vérification que l'utilisateur est admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php'); // Redirige vers la page de login si ce n'est pas un admin
    exit();
}*/
//-----------------------------------------------------------------------------------------------------------------------
// Ajouter une plante
if (isset($_POST['add_plante'])) {
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $humidite = $_POST['humidite'];
    $arrosage = $_POST['arrosage'];
    $temp_min = $_POST['temp_min'];
    $temp_max = $_POST['temp_max'];
    $description = $_POST['description'];
//-----------------------------------------------------------------------------------------------------------------------
    // Requête pour insérer une plante
    $query = "INSERT INTO plante (Nom, Type_plante, Humidité, Arrosage, Temperateur_min, Temperateur_max, Description)
              VALUES (:nom, :type, :humidite, :arrosage, :temp_min, :temp_max, :description)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':humidite', $humidite);
    $stmt->bindParam(':arrosage', $arrosage);
    $stmt->bindParam(':temp_min', $temp_min);
    $stmt->bindParam(':temp_max', $temp_max);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
}
//-----------------------------------------------------------------------------------------------------------------------

// Supprimer une plante
if (isset($_POST['delete_plante']) && isset($_POST['id'])) {
    $id = $_POST['id'];  // Récupère l'ID de la plante à supprimer
    $query = "DELETE FROM plante WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Plantes</title>
</head>
<body>
    <h1>Gestion des Plantes</h1>

    <a href="exercie3.php">
        <button type="submit" name="add_plante">Ajouter une plante</button>
    </a>
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
        echo "<p><strong>Type :</strong> " . htmlspecialchars($plante['Type_plante']) . "</p>";
        echo "<p><strong>Humidité :</strong> " . htmlspecialchars($plante['Humidité']) . "</p>";
        echo "<p><strong>Arrosage :</strong> " . htmlspecialchars($plante['Arrosage']) . "</p>";
        echo "<p><strong>Température :</strong> " . htmlspecialchars($plante['Temperateur_min']) . " à " . htmlspecialchars($plante['Temperateur_max']) . "</p>";
        echo "<p><strong>Description :</strong> " . nl2br(htmlspecialchars($plante['Description'])) . "</p>";
        echo "<form method='POST' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $plante['id'] . "'>";
        echo "<button type='submit' name='delete_plante'>Supprimer</button>";
        echo "</form>";
        echo "<form action='exercie.2.1.php' method='POST' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $plante['id'] . "'>";
        echo "<button type='submit' name='edit_plante'>Modifier</button>";
        echo "</form>";
        echo "</div><hr>";
    }
    ?>
    <!-- <style>
        #buto{
            margin-left: 200px;
        }
    </style> 
    Pour deplacer le bouton -->

    <br>
    <br>
    <a href="logout.php">Logout</a>
    <br>
    <br>
    <br>
</body>
</html>

