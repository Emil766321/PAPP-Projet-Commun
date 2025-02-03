<!DOCTYPE html>
<html>
    <head>
        <!-- css = fichier "menu_site_projet.css" et js = "menu_Projet-Commun.js"-->
        <link name="css" rel="stylesheet" href="..\ressources\css\menu_site_projet.css">
        <script name="js" src="..\ressources\js\menu_Projet-Commun.js"></script>
    </head>
    <body>
        <!-- petitVert = petit carré en haut à droite et titre = "Répertoire de plantes" -->
        <div name="petitVert_titre" id="title">
            <h1 name="titre" id="titre">R&#233;pertoire de plantes</h1>
            <div name="petit_vert" id="mini"></div>
        </div>

        <?php
        //tableau php
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
            //image de brocoli
            ['name' => 'Plante1', 'image' => '../ressources/images/brocoli.png'],
        ]
        ?>
        <!-- div grandVert = fond vert -->
        <div name="grandVert" class="vert">


        <div name="grandVert" id="vert">


            <?php
            foreach ($elements as $item) {
                ?>
                <!-- une dive = une carte de plante -->
                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                

                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                

                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                

                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                

                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                

                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                

                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                
                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div><div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div><div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div><div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>

                <div class="card">
                    <div class="title-card">
                        <p><?php echo $item['name'];?></p>
                    </div>
                    <div class="img-card">
                        <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                    </div>
                    <div class="crayon">
                        <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                    </div>
                    <div class="croix">
                        <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </body>
</html>
