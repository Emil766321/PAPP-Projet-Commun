<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link name="css"rel="stylesheet" href="..\ressources\css\css.css">
    <title name="Titre">Profil de l'utilisateur </title>

</head>


<body>
        <div name="tout"id ="tout">
            <div name="base" class="base">
                <div name ="title_fond"class="okaybien">
                    <h1 name="title"class = "Titre"> Profil de l'utilisateur</h1>   
                    <img name="fond"id ="img" src ="https://png.pngtree.com/png-vector/20240327/ourlarge/pngtree-the-elderly-chef-s-legacy-isolated-on-a-transparent-background-png-image_12243109.png">
                </div>
            </div>

            <div class="cofop" name="div_name">
                <div id="Déconnexione" name="name"><h1 id ="cofop">COFOP</h1></div>
            </div>
                <button class="Déconnexion" name="Déconnexion">Déconnexion</button>
        </div>    
</body>



</html

<?php
session_start();
session_destroy();
header("location:connect.html")
?>