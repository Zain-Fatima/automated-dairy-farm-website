<?php
// Database connection configuration
$host = 'localhost';
$dbname = 'dairy';
$username = 'root';
$password = '';

// Create a PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Get the type parameter from the query string
$type = $_GET['type'] ?? '';

// Process form submissions based on the type
if ($type === 'milkProduction') {
    // Get the form data
    $cowName = $_POST['cowName'];
    $milkProduction = $_POST['milkProduction'];

    // Insert the data into the database
    $query = "INSERT INTO cattle_data (cow_name, milk_production) VALUES (:cow_name, :milk_production)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cow_name', $cowName);
    $stmt->bindParam(':milk_production', $milkProduction);
    $stmt->execute();
} elseif ($type === 'diet') {
    // Get the form data
    $cowName = $_POST['cowName'];
    $diet = $_POST['diet'];

    // Insert the data into the database
    $query = "INSERT INTO cattle_diet (cow_name, diet) VALUES (:cow_name, :diet)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cow_name', $cowName);
    $stmt->bindParam(':diet', $diet);
    $stmt->execute();
} elseif ($type === 'medicalReport') {
    // Get the form data
    $cowName = $_POST['cowName'];
    $healthStatus = $_POST['healthStatus'];

    // Insert the data into the database
    $query = "INSERT INTO cattle_medical_report (cow_name, health_status) VALUES (:cow_name, :health_status)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cow_name', $cowName);
    $stmt->bindParam(':health_status', $healthStatus);
    $stmt->execute();
} else {
    // Invalid type parameter
    echo 'Invalid type parameter';
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
