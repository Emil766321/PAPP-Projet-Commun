<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "plantes_db";

require("db.php");

$data = mysqli_connect($host, $user, $password, $db);

session_start();
if(!isset($_SESSION["username"])){
    header("location:Login.php");
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Plante</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data" class="form-group m-2">
    <input type="text" name="nom" placeholder="Nom de la plante" required value="<?php echo $row["Nom"];?>"/>
        <input type="text" name="humidite" placeholder="Humidité" required value="<?php echo $row["Humidité"];?>"/>
        <input type="text" name="arrosage" placeholder="Arrosage" required value="<?php echo $row["Arrosage"];?>"/>
        <input type="text" name="temp_min" placeholder="Température min" required value="<?php echo $row["Temperature_min"];?>"/>
        <input type="text" name="temp_max" placeholder="Température max" required value="<?php echo $row["Temperature_max"];?>"/>
        <input type="text" name="description" placeholder="Description" required value="<?php echo $row["Description"];?>"/>
        <br>
        <br>
        <br>
        <label>Image actuelle :</label>
        <?php if (!empty($row["libelle"])) : ?>
            <img src="<?php echo htmlspecialchars($row["libelle"]); ?>" alt="Image actuelle" width="150">
        <?php endif; ?>

        <input type="file" name="image_file" accept="libelle"/>
        
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row["id"]); ?>"/>
        <input type="submit" name="modifierPlante" value="Modifier">
    </form>
    <br>
    <br>
    <a href="exercie2.php">
        <button>Retour</button>
    </a>
</body>
</html>
