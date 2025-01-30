<?php
session_start();
include('db.php');

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Requête pour récupérer les informations de la plante selon l'ID
    $query = "SELECT * FROM plante WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $plante = $stmt->fetch();

    // Si la plante n'est pas trouvée
    if (!$plante) {
        echo "Plante non trouvée.";
        exit;
    }
} else {
    echo "Aucune plante sélectionnée.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Plante</title>
</head>
<body>

    <h1>Détails de la Plante : <?php echo htmlspecialchars($plante['Nom']); ?></h1>

    <p><strong>Type :</strong> <?php echo htmlspecialchars($plante['Type_plante']); ?></p>
    <p><strong>Humidité :</strong> <?php echo htmlspecialchars($plante['Humidité']); ?></p>
    <p><strong>Arrosage :</strong> <?php echo htmlspecialchars($plante['Arrosage']); ?></p>
    <p><strong>Température :</strong> <?php echo htmlspecialchars($plante['Temperateur_min']); ?> à <?php echo htmlspecialchars($plante['Temperateur_max']); ?></p>
    <p><strong>Description :</strong> <?php echo nl2br(htmlspecialchars($plante['Description'])); ?></p>

    <br>
    <a href="index.php">Retour à l'accueil</a>

</body>
</html>
