<?php
include("db.php");
session_start();

/*if(!isset($_SESSION["user"])){
    header("location:index.php");
    exit();
    }*/
 
    if (isset($_POST['add_plante'])) {
        $nom = trim($_POST['nom']);
        $humidite = trim($_POST['humidite']);
        $arrosage = trim($_POST['arrosage']);
        $temp_min = trim($_POST['temp_min']);
        $temp_max = trim($_POST['temp_max']);
        $description = trim($_POST['description']);
        
        
        // Validation simple
        if (empty($nom) || empty($type) || empty($humidite) || empty($arrosage)) {
            echo "Tous les champs sont obligatoires.";
        } else {
            // Requête d'insertion
            $query = "INSERT INTO plante (Nom, Humidité, Arrosage, Temperature_min, Temperature_max, Description)
                      VALUES (:nom, :type, :humidite, :arrosage, :temp_min, :temp_max, :description)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':humidite', $humidite);
            $stmt->bindParam(':arrosage', $arrosage);
            $stmt->bindParam(':temp_min', $temp_min);
            $stmt->bindParam(':temp_max', $temp_max);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
        }
    }

    // Supprimer une plante
if (isset($_POST['delete_plante']) && isset($_POST['id'])) {
    $id = $_POST['id'];  // Récupère l'ID de la plante à supprimer
    $query = "DELETE FROM plante WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- css = fichier "menu_site_projet.css" et js = "menu_Projet-Commun.js"-->
        <link name="css" rel="stylesheet" href="..\ressources\css\menu_site_projet.css"/>
    </head>
    <body>  
        <div name="petitVert_titre" id="title">
            <div class="menuRight">
                <h1 name="titre" id="pageTitle">Répertoire de plantes</h1>
            </div>
            <div class="menuLeft">
                <a class="Deconnexion" href="index.php"><h1 class ="decotxt"id ="decoTxt">Connexion</h1></a>
                <div name="petit_vert" class="mini">
                    <!-- petitVert = petit carré en haut à droite et titre = "Répertoire de plantes" -->
                    <div class="menuIcon">
                        <a href="creditVisiteur.php" class="menuItem">
                            <img id="credits" src="..\ressources\images\Copyright.svg.png">
                        </a>
                        <a href="histoireVisiteur.php" class="menuItem">
                            <img id="histoire"src="..\ressources\images\book.png" class="menuItemImage">
                        </a>
                    </div>
                    <a href="#" class="menuBarreIconContainer">
                        <img class="menuBarre" src="..\ressources\images\menuprojet.png">
                    </a>
                </div>
            </div>
        </div>
        <!-- div grandVert = fond vert -->
        <div name="grandVert" class="vert">

        <?php
                    $query = "SELECT * FROM plante";
                    $stmt = $conn->query($query);
                    $plantes = $stmt->fetchAll();

                    foreach ($plantes as $plante) {
                        ?>
                        <!-- une dive = une carte de plante -->
                        <?php 
                            echo "<div class='plante'>";
                                echo "<h3>" . htmlspecialchars($plante['Nom']) . "</h3>";
                                // Vérifier si une image existe et l'afficher
                            if (!empty($plante['libelle'])) {
                                echo '<img src="' . htmlspecialchars($plante['libelle']) . '" alt="Image de la plante" width=180px height=150px>';
                            } else {
                                echo '<p>Aucune image disponible.</p>';
                            }
                                ?>
                                
                                </a>
                            </div>
                        <?php
                    }
                ?>
        </div>
        <script src="..\ressources\js\menu.js"></script>
    </body>
</html>