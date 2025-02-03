<?php
session_start();

<<<<<<< HEAD
if (isset($_POST['submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : null; // Vérifier si on modifie une plante existante
=======
if(!isset($_SESSION["username"])){
    header("location:login.php");
    exit();
    }
include('db.php');
//-----------------------------------------------------------------------------------------------------------------------
// Ajouter une plante
if (isset($_POST['add_plante'])) {
>>>>>>> 9cbbc31b23105f50733aa65f1f5cb4461ad75cbf
    $nom = $_POST['nom'];
    $humidite = $_POST['humidite'];
    $arrosage = $_POST['arrosage'];
    $temp_min = $_POST['temp_min'];
    $temp_max = $_POST['temp_max'];
    $description = $_POST['description'];
<<<<<<< HEAD

    $target_directory = "image/"; // Dossier où stocker les images

    // Vérifier et créer le dossier si nécessaire
    if (!is_dir($target_directory)) {
        mkdir($target_directory, 0777, true);
    }

    // Vérifier si on est en mode modification et récupérer l'image existante
    if ($id) {
        $stmt = $conn->prepare("SELECT libelle FROM plante WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $existing_image = $stmt->fetchColumn();
    } else {
        $existing_image = null;
    }

    // Vérifier si une nouvelle image est envoyée
=======
    
//-----------------------------------------------------------------------------------------------------------------------
    
    // Vérifier si une image a été téléchargée
>>>>>>> 9cbbc31b23105f50733aa65f1f5cb4461ad75cbf
    if (!empty($_FILES["image_file"]["tmp_name"])) {
        $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);
        $file_extension = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);
        $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
        $target_path = $target_directory . $new_image_name; // Chemin complet

        // Supprimer l'ancienne image si elle existe et éviter la répétition
        if ($existing_image && file_exists($existing_image)) {
            unlink($existing_image);
        }

        // Enregistrer le nouveau chemin d'image dans la base de données
        $image_path_db = $target_path;

        // Déplacer la nouvelle image
        if (!move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path)) {
            header("Location:exercie3.php?message=er"); // Erreur d'upload
            exit();
        }
    } else {
        // Si aucune nouvelle image n'est envoyée, conserver l'ancienne
        $image_path_db = $existing_image;
    }

    // Vérifier si on est en mode modification ou ajout
    if ($id) {
        // Mettre à jour la plante existante
        $query = "UPDATE plante SET Nom = :nom, Humidité = :humidite, Arrosage = :arrosage, 
                  Temperature_min = :temp_min, Temperature_max = :temp_max, 
                  Description = :description, libelle = :image WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
    } else {
        // Insérer une nouvelle plante
        $query = "INSERT INTO plante (Nom, Humidité, Arrosage, Temperature_min, Temperature_max, Description, libelle) 
                  VALUES (:nom, :humidite, :arrosage, :temp_min, :temp_max, :description, :image)";
        $stmt = $conn->prepare($query);
    }

    // Liaison des paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':humidite', $humidite);
    $stmt->bindParam(':arrosage', $arrosage);
    $stmt->bindParam(':temp_min', $temp_min);
    $stmt->bindParam(':temp_max', $temp_max);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image_path_db);

    if ($stmt->execute()) {
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