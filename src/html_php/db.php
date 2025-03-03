<?php
// Database connection using PDO
$host = '127.0.0.1';
$dbname = 'u715650454_cofop_plantes';
$username = 'u715650454_cofop_user';  // Replace with your actual database username if not 'root'
$password = 'L9v7qktjI';      // Replace with your actual password if necessary

try {
    // Create a PDO instance and set error mode to exceptions
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode
} catch (PDOException $e) {
    // Catch connection error and display the message
    echo "Error in connection: " . $e->getMessage();
    exit();
}
?>
