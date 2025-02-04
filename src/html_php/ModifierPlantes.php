<?php
include("db.php");
session_start();
if(!isset($_SESSION["user"])){
    header("location:index.php");
    exit();
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
    <form action="menu_site_projet.php" method="post" id="plant-form">
        <div class="bulle">
            <div class="hautdepage">
                <h1>Ajout de Plantes</h1>
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
