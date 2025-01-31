<!DOCTYPE html>
<html>
    <head>
        <link name="css" rel="stylesheet" href="..\ressources\css\menu_site_projet.css">
        <script name="js" src="..\ressources\js\menu_Projet-Commun.js"></script>
    </head>
    <body>
        <div name="petitVert_titre" id="titel">
            <h1 name="titre" id="titre">R&#233;pertoire de plantes</h1>
            <div name="petit_vert" id="mini"></div>
        </div>

        <?php
        $crayon = "../ressources/images/crayon.png";
        $croix = "../ressources/images/croix.png";
        $Nom_Plante = "Plant Name";
        $image_food = "../ressources/images/oip.png";

        $elements = [
            ['name' => 'crayon1', 'id' => 'crayon1', 'src' => $crayon, 'alt' => 'abc'],
            ['name' => 'brocoli1', 'id' => 'brocoli1', 'src' => $image_food, 'alt' => 'abc'],
            ['name' => 'croix1', 'id' => 'croix1', 'src' => $croix, 'alt' => 'abc'],
        ];

        // Modified to have unique IDs for each plant
        $plantes = [
            ['name' => 'Plante1', 'id' => 'carre1', 'content' => $Nom_Plante . ' 1'],
            ['name' => 'Plante2', 'id' => 'carre2', 'content' => $Nom_Plante . ' 2'],
            ['name' => 'Plante3', 'id' => 'carre3', 'content' => $Nom_Plante . ' 3'],
            ['name' => 'Plante4', 'id' => 'carre4', 'content' => $Nom_Plante . ' 4'],
        ];
        ?>

        <div name="grandVert" id="vert">
            <?php
            // Loop to generate image elements
            foreach ($elements as $element) {
                echo '<img name="' . $element['name'] . '" id="' . $element['id'] . '" src="' . $element['src'] . '" alt="' . $element['alt'] . '">';
            }

            // Loop to generate plant divs
            foreach ($plantes as $plant) {
                echo '<div name="' . $plant['name'] . '" id="' . $plant['id'] . '"><h1>' . $plant['content'] . '</h1></div>';
            }
            ?>
        </div>
            
    </body>
</html>
