<?php
$host="localhost";
$user="root";
$password="";
$db="plantes_db";

session_start();

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}


if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM plante WHERE id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

        $nom = $_POST['nom'];
        $type = $_POST['type'];
        $humidite = $_POST['humidite'];
        $arrosage = $_POST['arrosage'];
        $temp_min = $_POST['temp_min'];
        $temp_max = $_POST['temp_max'];
        $description = $_POST['description'];
        
        $query = mysqli_query  ("UPDATE plante SET nom = '.$nom', type = '.$type', humidite = '.$humidite', arrosage = '.$arrosage', temp_min = '.$temp_min', temp_max = '.$temp_max', description = '.$description' WHERE id = $id");
        $stmt2 = $conn->prepare($query);
        $stmt2->bindParam(':nom', $nom);
        $stmt2->bindParam(':type', $type);
        $stmt2->bindParam(':humidite', $humidite);
        $stmt2->bindParam(':arrosage', $arrosage);
        $stmt2->bindParam(':temp_min', $temp_min);
        $stmt2->bindParam(':temp_max', $temp_max);
        $stmt2->bindParam(':description', $description);
        $stmt2->execute();
}
?>

<?php
    if(isset($_POST['edit_plante'])){
        
    } else {
        header("location:exercie2.php");
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
    <?php
        echo $_POST['id'];
    ?>
    <form action="" methode= "POST" class="form-group m-2">
    <input type="text" name="nom" placeholder="Nom de la plante" required>
        <input type="text" name="type" placeholder="Type de plante" required>
        <input type="text" name="humidite" placeholder="Humidité" required>
        <input type="text" name="arrosage" placeholder="Arrosage" required>
        <input type="text" name="temp_min" placeholder="Température min" required>
        <input type="text" name="temp_max" placeholder="Température max" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button class="boutton boutton-success" type="submit" name="modifier">Modifier la plante</button> 

        <a href="exercie2.php">Retour!</a>
</body>
</html>