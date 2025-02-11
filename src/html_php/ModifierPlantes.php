<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "plantes_db";

require("db.php");

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

$row = null; // Évite les erreurs si aucune plante n'est trouvée

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);  // Convertir en entier

    // Récupérer les infos de la plante
    $sql = "SELECT * FROM plante WHERE id=?";
    $stmt = mysqli_prepare($data, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        die("Erreur de requête : " . mysqli_error($data));
    }

    if (!$row) {
        die("Plante introuvable.");
    }
} else {
    die("ID de la plante non spécifié.");
}

if (isset($_POST["modifierPlante"])) {
    $nom = $_POST['nom'];
    $humidite = $_POST['humidite'];
    $arrosage = $_POST['arrosage'];
    $temp_min = $_POST['temp_min'];
    $temp_max = $_POST['temp_max'];
    $description = $_POST['description'];
    $id = intval($_POST['id']); // ID bien récupéré du formulaire

    // Récupérer l'ancienne image si aucune nouvelle n'est uploadée
    $sql = "SELECT libelle FROM plante WHERE id=?";
    $stmt = mysqli_prepare($data, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $image_path = $row['libelle']; // Garder l'ancienne image par défaut
        mysqli_stmt_close($stmt);
    } else {
        die("Erreur de requête : " . mysqli_error($data));
    }

    // Vérifier si une nouvelle image est envoyée
    if (!empty($_FILES['image_file']['name'])) {
        $upload_dir = "image/";

        // Créer le dossier s'il n'existe pas
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $image_name = basename($_FILES['image_file']['name']);
        $image_tmp = $_FILES['image_file']['tmp_name'];
        $image_path = $upload_dir . time() . "_" . $image_name; // Ajout timestamp pour éviter les doublons

        if (!move_uploaded_file($image_tmp, $image_path)) {
            die("Erreur lors de l'upload de l'image.");
        }
    }

    // Mise à jour des infos de la plante
    $sql = "UPDATE plante SET Nom=?, Humidité=?, Arrosage=?, Temperature_min=?, Temperature_max=?, Description=?, libelle=? WHERE id=?";
    $stmt2 = mysqli_prepare($data, $sql);
    
    if ($stmt2) {
        mysqli_stmt_bind_param($stmt2, "sssssssi", $nom, $humidite, $arrosage, $temp_min, $temp_max, $description, $image_path, $id);
        if (mysqli_stmt_execute($stmt2)) {
            header('Location: menu_site_projet.php'); // Redirection après succès
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . mysqli_error($data);
        }
        mysqli_stmt_close($stmt2);
    } else {
        die('Erreur de préparation de la requête : ' . mysqli_error($data));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la plante</title>
    <link rel="stylesheet" href="../ressources/css/stylesheetAjoutsPlantes.css">
</head>
<body>
    <div class="formm">
        <div class="bulle">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <div class="hautdepage">
                    <h1>Modifier la plante</h1>
                    <input type="text" name="nom" placeholder="Nom de la plante" required value="<?php echo htmlspecialchars($row["Nom"]); ?>">
                </div>

                <div class="description">
                    <textarea name="description" placeholder="Description" required><?php echo htmlspecialchars($row["Description"]); ?></textarea>
                </div>

                <div class="inser">
                    <button type="button" id="insert-image-btn" onclick="triggerFileInput()">Insérer une image</button>
                </div>

                <input type="text" name="temp_min" placeholder="Température min" required value="<?php echo htmlspecialchars($row["Temperature_min"]); ?>">
                <input type="text" name="temp_max" placeholder="Température max" required value="<?php echo htmlspecialchars($row["Temperature_max"]); ?>">
                <input type="text" name="arrosage" placeholder="Arrosage" required value="<?php echo htmlspecialchars($row["Arrosage"]); ?>">
                <input type="text" name="humidite" placeholder="Humidité" required value="<?php echo htmlspecialchars($row["Humidité"]); ?>">

                <div class="accept">
                    <button type="submit" name="modifierPlante" id="accepter">Modifier</button>
                </div>

                <input type="file" id="file-input" name="image_file" style="display: none;" onchange="previewImage(event)">
            </form>

            <div class="retour">
                <a href="menu_site_projet.php">
                    <button class="retour">Retour</button>
                </a>
            </div>
        </div>
    </div>

    <script src="../ressources/js/jsAjoutsPlantes.js"></script>
</body>
</html>
