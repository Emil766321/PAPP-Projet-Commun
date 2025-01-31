<?php
session_start();

if(!isset($_SESSION["username"])){
    header("location:login.php");
    exit();
    }
include('db.php');
//-----------------------------------------------------------------------------------------------------------------------
// Ajouter une plante
if (isset($_POST['add_plante'])) {
    $nom = $_POST['nom'];
    $humidite = $_POST['humidite'];
    $arrosage = $_POST['arrosage'];
    $temp_min = $_POST['temp_min'];
    $temp_max = $_POST['temp_max'];
    $description = $_POST['description'];
    
//-----------------------------------------------------------------------------------------------------------------------
    
    // Vérifier si une image a été téléchargée
    if (!empty($_FILES["image_file"]["tmp_name"])) {
        $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);
        $file_extension = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);
        $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
        $target_directory = "images/";
        $target_path = $target_directory . $new_image_name;
    } else {
        $new_image_name = NULL;
    }
    
    // Requête pour insérer une plante avec l'image
    $query = "INSERT INTO plante (Nom, Humidité, Arrosage, Temperature_min, Temperature_max, Description, libelle) 
              VALUES (:nom, :humidite, :arrosage, :temp_min, :temp_max, :description, :image)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':humidite', $humidite);
    $stmt->bindParam(':arrosage', $arrosage);
    $stmt->bindParam(':temp_min', $temp_min);
    $stmt->bindParam(':temp_max', $temp_max);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $new_image_name);
    
    if ($stmt->execute()) {
        // Déplacer l'image vers le dossier "images" si elle existe
        if (!empty($new_image_name) && !move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path)) {
            header("Location:exercie3.php?message=er");
            exit();
        }
        header("Location:exercie3.php?message=ok");
        exit();
    } else {
        header("Location:exercie3.php?message=no");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une plante</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom de la plante" required>
        <input type="text" name="humidite" placeholder="Humidité" required>
        <input type="text" name="arrosage" placeholder="Arrosage" required>
        <input type="text" name="temp_min" placeholder="Température min" required>
        <input type="text" name="temp_max" placeholder="Température max" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="file" name="image_file" accept="image/*" required>
        <button type="submit" name="submit">Ajouter la plante avec l'image</button>
    </form>
    <a href="exercie2.php">Retour</a>
</body>
</html>