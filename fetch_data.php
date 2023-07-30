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

// Fetch data based on the type
if ($type === 'milkProduction') {
    // Fetch milk production data
    $query = "SELECT cow_name, milk_production FROM cattle_data";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $milkProductionData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the data as JSON
    echo json_encode($milkProductionData);
} elseif ($type === 'diet') {
    // Fetch diet data
    $query = "SELECT cow_name, diet FROM cattle_diet";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $dietData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the data as JSON
    echo json_encode($dietData);
} elseif ($type === 'medicalReport') {
    // Fetch medical report data
    $query = "SELECT cow_name, health_status FROM cattle_medical_report";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $medicalReportData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the data as JSON
    echo json_encode($medicalReportData);
}
$sql = "SELECT * FROM cattle";
$result = $conn->query($sql);
$cattleData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cattleData[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the cattle data as JSON response
header('Content-Type: application/json');
echo json_encode($cattleData);
?> else {
    // Invalid type parameter
    echo 'Invalid type parameter';
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
