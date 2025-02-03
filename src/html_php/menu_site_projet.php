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
            //image de brocoli
            ['name' => 'Plante1', 'image' => '../ressources/images/brocoli.png'],
        ]
        ?>
        <!-- div grandVert = fond vert -->
        <div name="grandVert" class="vert">

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