<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "plantes_db";

require("db.php");

    $data = mysqli_connect($host, $user, $password, $db);

session_start();

if(!isset($_SESSION["user"])){
    header("location:index.php");
    exit();
    }
    
    if (isset($_POST["modifierPlante"])) {
        $nom = $_POST['nom'];
        $humidite = $_POST['humidite'];
        $arrosage = $_POST['arrosage'];
        $temp_min = $_POST['temp_min'];
        $temp_max = $_POST['temp_max'];
        $description = $_POST['description'];
        $id = $_POST['id'];
    
        // Récupérer l'ancienne image si aucune nouvelle image n'est uploadée
        $sql = "SELECT libelle FROM plante WHERE id=?";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $image_path = $row['libelle']; // On garde l'ancienne image par défaut
        mysqli_stmt_close($stmt);
    
        // Vérifier si une nouvelle image est envoyée
        if (!empty($_FILES['image_file']['name'])) {
            $image_name = basename($_FILES['image_file']['name']);
            $image_tmp = $_FILES['image_file']['tmp_name'];
            $image_path = "image/" . $image_name; // On ajoute un timestamp pour éviter les doublons
            
            // Déplacer l'image vers le dossier uploads/
            if (!move_uploaded_file($image_tmp, $image_path)) {
                $upload_dir = "image/";
    
                    // Vérifier si le dossier existe, sinon le créer
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
    
                    if (!empty($_FILES['image_file']['name'])) {
                        $image_name = basename($_FILES['image_file']['name']);
                        $image_tmp = $_FILES['image_file']['tmp_name'];
                        $image_path = $upload_dir . time() . "_" . $image_name; // Ajout d'un timestamp pour éviter les doublons
    
                        if (!move_uploaded_file($image_tmp, $image_path)) {
                            die("Erreur lors de l'upload de l'image.");
                        }
                }
            }
        }
    
        // Mise à jour des informations de la plante
        $sql = "UPDATE plante SET nom=?, humidité=?, arrosage=?, Temperature_min=?, Temperature_max=?, description=?, libelle=? WHERE id=?";
        $stmt2 = mysqli_prepare($data, $sql);
        
        if ($stmt2 === false) {
            die('Erreur de préparation de la requête : ' . mysqli_error($data));
        }
    
        mysqli_stmt_bind_param($stmt2, "sssssssi", $nom, $humidite, $arrosage, $temp_min, $temp_max, $description, $image_path, $id);
    
        if (mysqli_stmt_execute($stmt2)) {
            header('Location: exercie2.php'); // Redirection après mise à jour réussie
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . mysqli_error($data);
        }
        mysqli_stmt_close($stmt2);
    }
    ?>
    
    <?php
    if (isset($_POST['edit_plante'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM plante WHERE id=?";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une plante</title>
    <link rel="stylesheet" href="../ressources/css/stylesheetAjoutsPlantes.css">
</head>

<body>
    <form action="menu_site_projet.php" method="post" id="plant-form">
        <div class="bulle">
            <div class="hautdepage">
                <h1>Modifier la plante</h1>
                <input placeholder="Nom de la plante" name="NomDePlante">
            </div>
            
            <div class="description">
                <textarea placeholder="Description" name="description"></textarea>
            </div>

            <div class="inser">
                <button type="button" id="insert-image-btn" name="buttonimg" onclick="triggerFileInput()">Insérer une image</button>
            </div>

            <input placeholder="Temperature minimum" name="temp_min" id="temp_min" type="text">
            <input placeholder="Temperature maximum" name="temp_max" id="temp_max" type="text">
            <input placeholder="Arrosage" name="arrosage" id="arrosage" type="text">
            <input placeholder="Humidité" name="humidite" id="humidite" type="text">

            <div class="accept">
                <a href="menu_site_projet.php">
                    <button type="submit" name="accepter" id="accepter">Accepter</button>
                </a>
            </div>
            <div class="rretour">
                <a href="menu_site_projet.php">
                    <button class="retour">Retour</button>
                </a>
            </div>
            <input type="file" id="file-input" name="file" style="display: none;" onchange="previewImage(event)">
        </div>
    </form>

    <script src="..\ressources\js\jsAjoutsPlantes.js"></script>
</body>

</html>
