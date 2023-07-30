<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy";

// Function to establish a database connection
function connectToDatabase($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Function to assign diet plan based on milk production
function assignDietPlanByMilkProduction($milkProduction)
{
    if ($milkProduction < 5) {
        return 'Low Milk Production';
    } elseif ($milkProduction >= 5 && $milkProduction <= 10) {
        return 'Medium Milk Production';
    } else {
        return 'High Milk Production';
    }
}

// Function to assign diet plan based on medical condition
function assignDietPlanByMedicalCondition($medicalCondition)
{
    switch ($medicalCondition) {
        case 'High Fever':
            return 'High Fever';
        case 'Low Appetite':
            return 'Low Appetite';
        default:
            return 'Normal Medical Condition';
    }
}

// Function to update cattle data with assigned diet plans
function updateCattleData($conn, $cattleId, $milkProductionDiet, $medicalConditionDiet)
{
    $sql = "UPDATE cattle SET milk_production_diet = ?, medical_condition_diet = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $milkProductionDiet, $medicalConditionDiet, $cattleId);
    if ($stmt->execute() === TRUE) {
        echo "Diet plans assigned successfully.<br>";
    } else {
        echo "Error assigning diet plans: " . $conn->error . "<br>";
    }
    $stmt->close();
}

// Establish a database connection
$conn = connectToDatabase($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cattleId = $_POST["cattleId"];
    $milkProductionDiet = $_POST["milkProductionDiet"];
    $medicalConditionDiet = $_POST["medicalConditionDiet"];

    // Update cattle data with assigned diet plans
    updateCattleData($conn, $cattleId, $milkProductionDiet, $medicalConditionDiet);
}

// Close the database connection
$conn->close();
header("Location: diet.php"); // Redirect back to the page
exit;
?>
