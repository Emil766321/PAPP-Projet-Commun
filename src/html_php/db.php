<?php
$host = 'localhost';
$dbname = 'plantes_db';
$username = 'root';  // Remplace par ton utilisateur si ce n'est pas 'root'
$password = '';      // Remplace par ton mot de passe si nécessaire

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>