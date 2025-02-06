<!DOCTYPE html>
<html>
    <head>
        <!-- css = fichier "menu_site_projet.css" et js = "menu_Projet-Commun.js"-->
        <link name="css" rel="stylesheet" href="..\ressources\css\menu_site_projet.css"/>
    </head>
    <body>  
        <div name="petitVert_titre" id="title">
            <div class="menuRight">
                <h1 name="titre" id="pageTitle">R&#233;pertoire de plantes</h1>
                <a href="AjoutsDePlantes.html" class="menuItemButton">
                    <img src="..\ressources\images\plus.png"  class="menuItemButtonImage">
                </a>
            </div>
            <div class="menuLeft">
                <a class="Deconnexion" href="connect.html "><h1 class ="decotxt"id ="decoTxt">D&#233;connexion</h1></a>
                <div name="petit_vert" class="mini">
                    <!-- petitVert = petit carré en haut à droite et titre = "Répertoire de plantes" -->
                    <div class="menuIcon">
                        <a href="credits.html" class="menuItem">
                            <img id="credits" src="..\ressources\images\Copyright.svg.png">
                        </a>
                        <a href="histoire.html" class="menuItem">
                            <img id="histoire"src="..\ressources\images\book.png" class="menuItemImage">
                        </a>
                    </div>
                    <a href="#" class="menuBarreIconContainer">
                        <img class="menuBarre" src="..\ressources\images\menuprojet.png">
                    </a>
                </div>
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
                            <div class="crayon">
                                <a href="..\ressources\images\crayon.png">
                                    <img class="img-crayon" src="../ressources/images/crayon.png" alt="image plante">
                                </a>
                            </div>
                            <div class="croix">
                                <a href="..\ressources\images\croix.png">
                                    <img class="img-croix" src="../ressources/images/croix.png" alt="image plante">
                                </a>
                            </div>
                        </a>
                    </div>
                <?php
            }
            ?>
        </div>
        <script src="..\ressources\js\menu.js"></script>
    </body>
</html>