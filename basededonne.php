<?php
$host="localhost"; // Host name*
$user="root"; // Mysql username*
$pass=""; // Mysql password*
$db="gestionproduit"; // Database name*

// Connexion aux serveur et à la base de données
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}