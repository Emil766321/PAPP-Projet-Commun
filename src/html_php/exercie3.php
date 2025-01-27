<?php
session_start();
include('db.php'); // Connexion à la base de données
// Vérification que l'utilisateur est admin
/*if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- Formulaire pour ajouter une plante -->
     <form method="POST">
        <input type="text" name="nom" placeholder="Nom de la plante" required>
        <input type="text" name="type" placeholder="Type de plante" required>
        <input type="text" name="humidite" placeholder="Humidité" required>
        <input type="text" name="arrosage" placeholder="Arrosage" required>
        <input type="text" name="temp_min" placeholder="Température min" required>
        <input type="text" name="temp_max" placeholder="Température max" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit" name="add_plante">Ajouter une plante</button>
        
    </form>


<a href="exercie2.php">Retour!</a>
</body>
</html>
