<?php

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
    $username=$_POST["username"];
    $password=$_POST["password"];

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
        echo"username or password incorrect!";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Login Form</h1>
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
                    <label>username</label>
                    <input type="text" name="username" required>
                </div>
                <br>
                <br>
                <div>
                    <label>password</label>
                    <input type="password" name="password" requiered>
                </div>
                <br>
                <br>
                <div>
                    <input type="submit" value="Login">
                </div>
            </form>

            <br>
            <br>
        </div>
    </center>
</body>
</html>