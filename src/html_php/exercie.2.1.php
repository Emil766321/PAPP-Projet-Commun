<?php
require_once 'db.php';

if (isset($_POST['modifier'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM plante WHERE id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

if (isset($_POST['modifier'])) {
    $id = $_GET['edit'];

    
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $humidite = $_POST['humidite'];
    $arrosage = $_POST['arrosage'];
    $temp_min = $_POST['temp_min'];
    $temp_max = $_POST['temp_max'];
    $description = $_POST['description'];

    $sql2 = "UPDATE plante SET id=:id,Nom=:Nom,Type_plante=:Type_plante,Humidité=:Humidité,Arrosage=:Arrosage,Temperateur_min=:Temperateur_min,Temperateur_max=:Temperateur_max,Description=:Description WHERE id='$id'";
    $stmt2 = $conn->prepare($sql2);
    $stmt2-> bindParam("nom", $nom);
    $stmt2 -> bindParam("type", $type);
    $stmt2 -> bindParam("humidite", $humidite);
    $stmt2 -> bindParam("arrosage", $arrosage);
    $stmt2 -> bindParam("temp_min", $temp_min);
    $stmt2 -> bindParam("temp_max", $temp_max);
    $stmt2 -> bindParam("description", $description);
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
    <form action="" methode= "POST" class="form-group m-2">
        <label for="">Nom:</label>
        <input type="text" name="nom" id="" placeholder="nom">
        <label for="">Type:</label>
        <input type="text" name="Type"id="" placeholder="Type">
        <label for="">Humidité:</label>
        <input type="text" name="Humidité"id="" placeholder="Humidité">
        <label for="">Arrosage:</label>
        <input type="text" name="Arrosage"id="" placeholder="Arrosage">
        <label for="">Temperateur_min:</label>
        <input type="text" name="Temperateur_min"id="" placeholder="Temperateur_min">
        <label for="">Temperateur_max:</label>
        <input type="text" name="Temperateur_max"id="" placeholder="Temperateur_max">
        <label for="">Description:</label>
        <input type="text" name="Description"id="" placeholder="Description">
        <button class="boutton boutton-success" type="submit" name="ajouter">Ajouter user</button> 

        <a href="exercie2.php">Retour!</a>
</body>
</html>