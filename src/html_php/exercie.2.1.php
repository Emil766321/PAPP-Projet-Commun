<?php
$host="localhost";
$user="root";
$password="";
$db="plantes_db";


session_start();
require("db.php");

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

if (isset($_POST["modifierPlante"])) {
    $nom = $_POST['nom'];
    $humidite = $_POST['humidite'];
    $arrosage = $_POST['arrosage'];
    $temp_min = $_POST['temp_min'];
    $temp_max = $_POST['temp_max'];
    $description = $_POST['description'];
    $libelle = $_POST['libelle'];
    $id = $_POST['id'];
    
    echo $id;
    $sql="SELECT * FROM plante WHERE id='$id'";
    
    $result=mysqli_query($data, $sql);

    $row=mysqli_fetch_array($result);

    //$query = ("UPDATE plante SET nom=':nom'AND type=':type'AND humidite=':humidite'AND arrosage=':arrosage'AND temp_min=':temp_min'AND temp_max=':temp_max'AND description=':description' WHERE id='$id'");
    function updatethis($nom, $humidite, $arrosage, $temp_min, $temp_max, $description, $id, $data){
            // SQL pour la mise à jour
            $sql = "UPDATE plante SET nom=?, humidité=?, arrosage=?, Temperature_min=?, Temperature_max=?, description=? WHERE id=?";
                
            // Préparation de la requête
            $stmt2 = mysqli_prepare($data, $sql);
            
            // Vérification de l'échec de préparation
            if ($stmt2 === false) {
                die('Erreur de préparation de la requête : ' . mysqli_error($data));  // Affiche l'erreur de préparation
            }

            // Liaison des paramètres
            $bind_result = mysqli_stmt_bind_param($stmt2, "ssssssi", $nom, $humidite, $arrosage, $temp_min, $temp_max, $description, $id);
            
            // Vérification de l'échec de la liaison
            if ($bind_result === false) {
                die('Erreur lors de la liaison des paramètres : ' . mysqli_error($data));
            }

            // Exécution de la requête
            $execute_result = mysqli_stmt_execute($stmt2);
            
            // Vérification de l'échec de l'exécution
            if ($execute_result) {
                header('Location: exercie2.php');
            } else {
                echo "Une erreur est survenue lors de la mise à jour : " . mysqli_error($data); // Affiche l'erreur d'exécution
            }
            
            // Fermeture de la requête préparée
            mysqli_stmt_close($stmt2);
        }
            updatethis($nom, $humidite, $arrosage, $temp_min, $temp_max, $description, $id, $data);
}
?>

<?php

    if(isset($_POST['edit_plante'])){
        $id = $_POST['id'];
        $sql="SELECT * FROM plante WHERE id='$id'";
        
        $result=mysqli_query($data, $sql);
        
        $row=mysqli_fetch_array($result);
    } 
    // else {
        //header("location:exercie2.php");
        //}
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method= "POST" class="form-group m-2">
        <input type="text" name="nom" placeholder="Nom de la plante" required value="<?php echo $row["Nom"];?>"/>
        <input type="text" name="humidite" placeholder="Humidité" required value="<?php echo $row["Humidité"];?>"/>
        <input type="text" name="arrosage" placeholder="Arrosage" required value="<?php echo $row["Arrosage"];?>"/>
        <input type="text" name="temp_min" placeholder="Température min" required value="<?php echo $row["Temperature_min"];?>"/>
        <input type="text" name="temp_max" placeholder="Température max" required value="<?php echo $row["Temperature_max"];?>"/>
        <input type="text" name="description" placeholder="Description" required value="<?php echo $row["Description"];?>"/>
        <input type="file" name="image_file" accept="image/*" required <?php echo $row["libelle"]?>>
        <input type="hidden" name="id" required value="<?php echo $row["id"];?>"/>
        <input type="submit" name="modifierPlante" placeholder="wdd">
    </form>
        <a href="exercie2.php">Retour!</a>
</body>
</html>