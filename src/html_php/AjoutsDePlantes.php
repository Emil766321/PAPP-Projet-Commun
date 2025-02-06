<?php
include("db.php");
session_start();
if(!isset($_SESSION["user"])){
    header("location:index.php");
    exit();
    }
    
    if (isset($_POST['submit'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : null; // Vérifier si on modifie une plante existante
        $nom = $_POST['nom'];
        $humidite = $_POST['humidite'];
        $arrosage = $_POST['arrosage'];
        $temp_min = $_POST['temp_min'];
        $temp_max = $_POST['temp_max'];
        $description = $_POST['description'];
    
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
        if (!empty($_FILES["file"]["tmp_name"])) {
            $file_basename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
            $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
            $target_path = $target_directory . $new_image_name; // Chemin complet
    
            // Supprimer l'ancienne image si elle existe et éviter la répétition
            if ($existing_image && file_exists($existing_image)) {
                unlink($existing_image);
            }
    
            // Enregistrer le nouveau chemin d'image dans la base de données
            $image_path_db = $target_path;
    
            // Déplacer la nouvelle image
            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
                header("Location:AjoutsDePlantes.php?message=er"); // Erreur d'upload
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
            header("Location:AjoutsDePlantes.php?message=ok");
            exit();
        } else {
            header("Location:AjoutsDePlantes.php?message=no");
            exit();
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouts de plantes</title>
    <link rel="stylesheet" href="../ressources/css/stylesheetAjoutsPlantes.css">
</head>

<body>
    <form action="menu_site_projet.php" method="POST" id="plant-form" enctype="multipart/form-data">
        <div class="bulle">
            <div class="hautdepage">
                <h1>Ajout de Plantes</h1>
                <input type="text" placeholder="Nom de la plante" name="nom" required>
            </div>
            
            <div class="description">
                <textarea placeholder="Description" name="description" required></textarea>
            </div>

            <div class="inser">
                <button type="button" id="insert-image-btn" name="buttonimg" onclick="triggerFileInput()">Insérer une image</button>
            </div>

            <input type="text" placeholder="Temperature minimum" name="temp_min" id="temp_min" type="text" required>
            <input type="text" placeholder="Temperature maximum" name="temp_max" id="temp_max" type="text" required>
            <input type="text" placeholder="Arrosage" name="arrosage" id="arrosage" type="text" required>
            <input type="text" placeholder="Humidité" name="humidite" id="humidite" type="text" required>

            <div class="accept">
                <a href="menu_site_projet.php">
                    <button type="submit" name="submit" id="accepter">Accepter</button>
                </a>
            </div>
            
                <a href="menu_site_projet.php">
                    <button class="retour">Retour</button>
                </a>
            </div>
            <input type="file" id="file-input" name="file" accept="image/*" style="display: none;" onchange="previewImage(event)" required>
        </div>
    </form>

    <script src="..\ressources\js\jsAjoutsPlantes.js"></script>
</body>

</html>
