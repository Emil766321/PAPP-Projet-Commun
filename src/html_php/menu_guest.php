<!DOCTYPE html>
<html>
    <head>
        <!-- css = fichier "menu_site_projet.css" et js = "menu_Projet-Commun.js"-->
        <link name="css" rel="stylesheet" href="..\ressources\css\menu_site_projet.css"/>
    </head>
    <body>
        

            <!-- petitVert = petit carré en haut à droite et titre = "Répertoire de plantes" -->
            <div id="heade">
                <a id="Deconnexion" href="connect.html "><h1 class ="decoTxt"id ="decoTxt">D&#233;connexion</h1></a>
                <div name="petitVert_titre" id="title">
                    <h1 name="titre" id="titre">R&#233;pertoire de plantes</h1>
                    <div name="petit_vert" id="mini"></div>
                </div>
            </div>

            <?php
            
            //tableau php
            $elements = [
                [
                    'name' => 'Plante1', 
                    'image' => '../ressources/images/brocoli.png'
                ],
                [
                    'name' => 'Plante2', 
                    'image' => '../ressources/images/brocoli.png'
                ],
                [
                    'name' => 'Plante3', 
                    'image' => '../ressources/images/brocoli.png'
                ],[
                    'name' => 'Plante3', 
                    'image' => '../ressources/images/brocoli.png'
                ],[
                    'name' => 'Plante3', 
                    'image' => '../ressources/images/brocoli.png'
                ],[
                    'name' => 'Plante3', 
                    'image' => '../ressources/images/brocoli.png'
                ],[
                    'name' => 'Plante3', 
                    'image' => '../ressources/images/brocoli.png'
                ],[
                    'name' => 'Plante3', 
                    'image' => '../ressources/images/brocoli.png'
                ],
            ];
            ?>
            <!-- div grandVert = fond vert -->
            <div name="grandVert" class="vert">

                <?php
                foreach ($elements as $item) {
                    ?>
                        <!-- une dive = une carte de plante -->
                        <div class="card">
                            <a id="br"class="card" href="description.html">
                                <div class="title-card">
                                    <p><?php echo $item['name'];?></p>
                                </div>
                                <div class="img-card">
                                    <img class="img" src="<?php echo $item['image'];?>" alt="image plante">
                                </div>
                            </a>
                        </div>
                    <?php
                }
                ?>
            </div>
    </body>
</html>