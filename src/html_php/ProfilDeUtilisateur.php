<?php
include("db.php");

$host="localhost";
$user="root";
$password="";
$db="plantes_db";

session_start();

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username = mysqli_real_escape_string($data, $_POST['username']);
    $password= mysqli_real_escape_string($data, $_POST['password']);

    $sql="select * from user where username='".$username."' AND password='".$password."'";

    $result=mysqli_query($data, $sql);

    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="COFOP")
    {
        $_SESSION["username"]=$username;
        header("location:exercie2.php");
    }
    else
    {
        echo"Pseudo ou mot de passe incorrecte";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connection</title>
</head>
<body>
    <center>
        <h1>Connection</h1>
        <br>
        <br>
        <br>
        <br>
        <div id="BigDiv">
            <style>
                #BigDiv{
                    background-color: grey;
                    width: 500px;
                }
            </style>
            <br>
            <br>
            <form action="#" method="POST">
                <div>
                    <input type="text" name="username" placeholder="Entrez votre Pseudo"required>
                </div>
                <br>
                <br>
                <div>
                    <input type="password" name="password" placeholder="Entrez votre mot de passe"requiered>
                </div>
                <br>
                <br>
                <div>
                    <input type="submit" value="Se connecter">
                </div>
            </form>

            <br>
            <br>
        </div>
    </center>
</body>
</html>