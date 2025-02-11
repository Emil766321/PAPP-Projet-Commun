<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "plantes_db";

require("db.php");

$data = mysqli_connect($host, $user, $password, $db);

session_start();

// Vérifier si l'utilisateur est connecté
/*if(!isset($_SESSION["user"])){
    header("location:index.php");
    exit();
}*/

// Modifier une plante
if (isset($_POST["modifierPlante"])) {
    $nom = $_POST['nom'];
    $humidite = $_POST['humidite'];
    $arrosage = $_POST['arrosage'];
    $temp_min = $_POST['temp_min'];
    $temp_max = $_POST['temp_max'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    // Récupérer l'ancienne image si aucune nouvelle n'est envoyée
    $sql = "SELECT libelle FROM plante WHERE id=?";
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $image_path = $row['libelle']; // Par défaut, garder l'ancienne image
    mysqli_stmt_close($stmt);

    // Vérifier si une nouvelle image est envoyée
    if (!empty($_FILES['image_file']['name'])) {
        $upload_dir = "image/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $image_name = time() . "_" . basename($_FILES['image_file']['name']); // Unique filename
        $image_tmp = $_FILES['image_file']['tmp_name'];
        $image_path = $upload_dir . $image_name;

        if (!move_uploaded_file($image_tmp, $image_path)) {
            die("Erreur lors de l'upload de l'image.");
        }
    }

    // Mettre à jour les informations de la plante
    $sql = "UPDATE plante SET nom=?, humidite=?, arrosage=?, Temperature_min=?, Temperature_max=?, description=?, libelle=? WHERE id=?";
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

// Récupérer les informations d'une plante pour modification
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une plante</title>
    <link rel="stylesheet" href="../ressources/css/stylesheetAjoutsPlantes.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" id="plant-form">
        <input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">

        <div class="bulle">
            <div class="hautdepage">
                <h1>Modifier la plante</h1>
                <input type="text" placeholder="Nom de la plante" name="nom" value="<?= $row['nom'] ?? '' ?>" required>
            </div>
            
            <div class="description">
                <textarea placeholder="Description" name="description"><?= $row['description'] ?? '' ?></textarea>
            </div>

            <div class="inser">
                <button type="button" id="insert-image-btn" onclick="triggerFileInput()">Insérer une image</button>
            </div>

            <input type="text" placeholder="Température minimum" name="temp_min" value="<?= $row['Temperature_min'] ?? '' ?>" required>
            <input type="text" placeholder="Température maximum" name="temp_max" value="<?= $row['Temperature_max'] ?? '' ?>" required>
            <input type="text" placeholder="Arrosage" name="arrosage" value="<?= $row['arrosage'] ?? '' ?>" required>
            <input type="text" placeholder="Humidité" name="humidite" value="<?= $row['humidite'] ?? '' ?>" required>

            <!-- Champ de fichier pour l'image -->
            <input type="file" id="file-input" name="image_file" style="display: none;" onchange="previewImage(event)">
            <br>
            <div id="image-preview">
                <?php if (!empty($row['libelle'])): ?>
                    <img src="<?= $row['libelle'] ?>" alt="Image actuelle" style="max-width: 200px;">
                <?php endif; ?>
            </div>

            <div class="accept">
                <button type="submit" name="modifierPlante" id="accepter">Accepter</button>
            </div>
            <div class="rretour">
                <a href="menu_site_projet.php">
                    <button type="button" class="retour">Retour</button>
                </a>
            </div>
        </div>
    </form>

    <script>
        function triggerFileInput() {
            document.getElementById('file-input').click();
        }

        function previewImage(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let output = document.getElementById('image-preview');
                output.innerHTML = `<img src="${reader.result}" style="max-width: 200px;">`;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
