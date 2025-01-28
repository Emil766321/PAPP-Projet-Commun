<!DOCTYPE html>
<html>
    <head>
        <link name="css" rel="stylesheet" href="..\ressources\css\menu_site_projet.css">
        <script name="js" src="..\ressources\js\menu_Projet-Commun.js"></script>
    </head>
    <body>
        <div name="petitVert_titre" id="title">
            <h1 name="titre" id="titre">R&#233;pertoire de plantes</h1>
            <div name="petit_vert" id="mini"></div>
        </div>

        <?php
        $elements = [
            ['name' => 'Plante1', 'image' => '../ressources/images/brocoli.png'],
            ['name' => 'Plante2', 'image' => '../ressources/images/brocoli.png'],
            ['name' => 'Plante3', 'image' => '../ressources/images/brocoli.png'],
            ['name' => 'Plante4', 'image' => '../ressources/images/brocoli.png'],
        ]
        ?>

        <div name="grandVert" class="vert">

            <?php
            foreach ($elements as $item) {
                ?>
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