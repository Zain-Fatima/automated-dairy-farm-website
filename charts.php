<?php
// Database connection configuration
$host = 'localhost';
$dbname = 'dairy';
$username = 'root';
$password = '';

// Create a PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Function to fetch milk production data from the database
function getMilkProductionData($pdo)
{
    $query = "SELECT cow_name, milk_production FROM cattle_data";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch diet data from the database
function getDietData($pdo)
{
    $query = "SELECT cow_name, diet FROM cattle_diet";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch medical report data from the database
function getMedicalReportData($pdo)
{
    $query = "SELECT cow_name, health_status FROM cattle_medical_report";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Insert data into the database based on form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['milkProduction'])) {
        $cowName = $_POST['cowName'];
        $milkProduction = $_POST['milkProduction'];

        $query = "INSERT INTO cattle_data (cow_name, milk_production) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$cowName, $milkProduction]);
    } elseif (isset($_POST['diet'])) {
        $cowName = $_POST['cowName'];
        $diet = $_POST['diet'];

        $query = "INSERT INTO cattle_diet (cow_name, diet) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$cowName, $diet]);
    } elseif (isset($_POST['healthStatus'])) {
        $cowName = $_POST['cowName'];
        $healthStatus = $_POST['healthStatus'];

        $query = "INSERT INTO cattle_medical_report (cow_name, health_status) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$cowName, $healthStatus]);
    }
}

// Fetch data from the database
$milkProductionData = getMilkProductionData($pdo);
$dietData = getDietData($pdo);
$medicalReportData = getMedicalReportData($pdo);

// Close the database connection
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cattle Reports</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .header {
      background-color: #FFFFFF;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
      margin: 0 10px;
      max-width: 200px;
      max-height: 100px;
    }

    @media (min-width: 600px) {
      .logo{
        margin: 0 calc(10px / (2 - 1));
    }
}
.profile {
      display: flex;
      align-items: center;
      margin-left: auto;
    }

    #image {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    #adminWord {
      color: #f7c35f;
      font-size: 18px;
      cursor: pointer;
    }
    h1 {
      color: #f7c35f;
      margin-bottom: 30px;
      font-size: 30px;
      font-weight: bold;
    }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            margin-top: 0;
            animation: slideInDown 0.5s ease-in-out;
        }

        @keyframes slideInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chart-container {
            margin-bottom: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .report {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            animation: slideInUp 0.5s ease-in-out;
        }

        @keyframes slideInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Styling for input forms */
        form {
            margin-bottom: 20px;
            animation: slideInUp 0.5s ease-in-out;
        }

        form label {
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        form button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        form button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener("DOMContentLoaded", function () {
            // Add animation for chart container
            var chartContainers = document.querySelectorAll(".chart-container");
            chartContainers.forEach(function (container) {
                container.style.opacity = 1;
            });

            // Add animation for reports and forms
            var reports = document.querySelectorAll(".report");
            var forms = document.querySelectorAll("form");
            var elements = Array.from(reports).concat(Array.from(forms));
            elements.forEach(function (element) {
                element.style.opacity = 1;
            });
        });
    </script>
</head>

<body>
<body class="<?php echo $themeClass; ?>">
  <div class="header">
  <img src="assets/img/logo.png" class="logo" alt="LOGO">
    <h1>DairyBot Farm</h1>
    <div class="profile">
      <img src="assets/img/Profile icon.avif" id="image" alt="Admin Profile Picture">
      <span>
        <a href="#" id="adminWord">Admin</a>
      </span>
    </div>
  </div><br><br><br>
<div class="container">
        <h1>Cattle Reports</h1>
        <br><br>

        <div class="chart-container">
            <canvas id="milkProductionChart"></canvas>
        </div><br>

        <div class="chart-container">
            <canvas id="dietChart"></canvas>
        </div><br>

        <div class="chart-container">
            <canvas id="medicalReportChart"></canvas>
        </div><br>

        <div class="report">
            <h2>Milk Production Report</h2>
            <?php foreach ($milkProductionData as $row) : ?>
                <p><?php echo "{$row['cow_name']}: {$row['milk_production']} liters"; ?></p>
            <?php endforeach; ?>
        </div>

        <div class="report">
            <h2>Diet Chart</h2>
            <?php foreach ($dietData as $row) : ?>
                <p><?php echo "{$row['cow_name']}: {$row['diet']}"; ?></p>
            <?php endforeach; ?>
        </div>

        <div class="report">
            <h2>Medical Report</h2>
            <?php foreach ($medicalReportData as $row) : ?>
                <p><?php echo "{$row['cow_name']}: {$row['health_status']}"; ?></p>
            <?php endforeach; ?>
        </div>

        <!-- Add input forms for entering cattle data -->
        <form id="milkProductionForm" method="POST">
            <div class="mb-3">
                <label for="milkCowName" class="form-label">Cow Name:</label>
                <input type="text" id="milkCowName" name="cowName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="milkProduction" class="form-label">Milk Production (liters):</label>
                <input type="number" id="milkProduction" name="milkProduction" step="0.01" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <form id="dietForm" method="POST">
            <div class="mb-3">
                <label for="dietCowName" class="form-label">Cow Name:</label>
                <input type="text" id="dietCowName" name="cowName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="diet" class="form-label">Diet:</label>
                <input type="text" id="diet" name="diet" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <form id="medicalReportForm" method="POST">
            <div class="mb-3">
                <label for="healthCowName" class="form-label">Cow Name:</label>
                <input type="text" id="healthCowName" name="cowName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="healthStatus" class="form-label">Health Status:</label>
                <input type="text" id="healthStatus" name="healthStatus" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        // Chart configuration for milk production
        var milkProductionData = <?php echo json_encode($milkProductionData); ?>;
        var milkProductionLabels = milkProductionData.map(function (item) {
            return item.cow_name;
        });
        var milkProductionValues = milkProductionData.map(function (item) {
            return item.milk_production;
        });

        var milkProductionChart = new Chart(document.getElementById('milkProductionChart'), {
            type: 'bar',
            data: {
                labels: milkProductionLabels,
                datasets: [{
                    label: 'Milk Production (liters)',
                    data: milkProductionValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Milk Production Report'
                    }
                }
            }
        });

        // Chart configuration for diet
        var dietData = <?php echo json_encode($dietData); ?>;
        var dietLabels = dietData.map(function (item) {
            return item.cow_name;
        });
        var dietValues = dietData.map(function (item) {
            return item.diet;
        });

        var dietChart = new Chart(document.getElementById('dietChart'), {
            type: 'pie',
            data: {
                labels: dietLabels,
                datasets: [{
                    label: 'Diet',
                    data: dietValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Diet Chart'
                    }
                }
            }
        });

        // Chart configuration for medical report
        var medicalReportData = <?php echo json_encode($medicalReportData); ?>;
        var medicalReportLabels = medicalReportData.map(function (item) {
            return item.cow_name;
        });
        var medicalReportValues = medicalReportData.map(function (item) {
            return item.health_status;
        });

        var medicalReportChart = new Chart(document.getElementById('medicalReportChart'), {
            type: 'doughnut',
            data: {
                labels: medicalReportLabels,
                datasets: [{
                    label: 'Health Status',
                    data: medicalReportValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Medical Report'
                    }
                }
            }
        });
    </script>
</body>

</html>

