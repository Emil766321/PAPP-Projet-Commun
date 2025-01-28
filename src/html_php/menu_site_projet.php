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
        $image_food = "../ressources/images/brocoli.png";

        $elements = [
            ['name' => 'crayon1', 'id' => 'crayon1', 'src' => $crayon, 'alt' => 'abc'],
            ['name' => 'crayon2', 'id' => 'crayon2', 'src' => $crayon, 'alt' => 'abc'],
            ['name' => 'brocoli1', 'id' => 'brocoli1', 'src' => $image_food, 'alt' => 'abc'],
            ['name' => 'brocoli2', 'id' => 'brocoli2', 'src' => $image_food, 'alt' => 'abc'],
            ['name' => 'croix1', 'id' => 'croix1', 'src' => $croix, 'alt' => 'abc'],
            ['name' => 'croix2', 'id' => 'croix2', 'src' => $croix, 'alt' => 'abc'],
        ];

        $plantes = [
            ['name' => 'Plante1', 'id' => 'carre1', 'content' => $Nom_Plante . ' 1'],
            ['name' => 'Plante2', 'id' => 'carre2', 'content' => $Nom_Plante . ' 2'],
            ['name' => 'Plante3', 'id' => 'carre3', 'content' => $Nom_Plante . ' 3'],
            ['name' => 'Plante4', 'id' => 'carre4', 'content' => $Nom_Plante . ' 4'],
            ['name' => 'Plante5', 'id' => 'carre5', 'content' => $Nom_Plante . ' 5'],
            ['name' => 'Plante6', 'id' => 'carre6', 'content' => $Nom_Plante . ' 6'],
        ];
        ?>

        <div name="grandVert" id="vert">
            <h1></h1>
        </div>

        <div name="carréBlanc1" id="blanc">
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

        
/*
        <!--
        <div name="grandVert"id ="vert"><h1></h1></div>
        <div name="carréBlanc1" id ="blanc">
            <img name="crayon1"id ="crayon1" src="<?= $crayon ?>" alt="abc">
            <img name="crayon2"id ="crayon2" src="<?= $crayon ?>" alt="abc">
            <img name="brocoli1"id ="brocoli1" src="<?= $image_food ?>" alt="abc">
            <img name="brocoli2" id ="brocoli2" src="<?= $image_food ?>" alt="abc">
            <img name="croix1"id ="croix1" src="<?= $croix ?>" alt="abc">
            <img name="croix2"id ="croix2" src="<?= $croix ?>" alt="abc">
            <div name="Plante1"id="carre"><h1 ><?= $Nom_Plante ?></h1></div>
            <div  name="Plante2"id="carre1"><h1><?= $Nom_Plante ?></h1></div>
        </div>

        <div name="carre2"id ="blanc1">
            <img  name="crayon3"id ="crayon1" src="<?= $crayon ?>" alt="abc">
            <img  name="crayon4"id ="crayon2" src="<?= $crayon ?>" alt="abc">
            <img name="brocoli3" id ="brocoli1" src="<?= $image_food ?>" alt="abc">
            <img name="brocoli4"id ="brocoli2" src="<?= $image_food ?>" alt="abc">
            <img name="croix3" id ="croix1" src="<?= $croix ?>" alt="abc">
            <img name="croix4" id ="croix2" src="<?= $croix ?>" alt="abc">
            <div name="Plante3" id="carre2"><h1><?= $Nom_Plante ?></h1></div>
            <div name="Plante4" id="carre3"><h1><?= $Nom_Plante ?></h1></div>
        </div>
        
        <div name="carre3" id ="blanc2">
            <img name="crayon5" id ="crayon1" src="<?= $crayon ?>" alt="abc">
            <img name="crayon6" id ="crayon2" src="<?= $crayon ?>" alt="abc">
            <img name="croix5" id ="croix1" src="<?= $croix ?>" alt="abc">
            <img name="croix6" id ="croix2" src="<?= $croix ?>" alt="abc">
            <img name="brocoli5" id ="brocoli1" src="<?= $image_food ?>" alt="abc">
            <img name="brocoli6" id ="brocoli2" src="<?= $image_food ?>" alt="abc">
            <div name="Plante5" id="carre4"><h1><?= $Nom_Plante ?></h1></div>
            <div name="Plante6" id="carre5"><h1><?= $Nom_Plante ?></h1></div>
        </div>
    -->
    </body>
</html>