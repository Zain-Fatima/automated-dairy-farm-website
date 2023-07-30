<!DOCTYPE html>
<html>
<head>
    <title>Cattle Diet Plans</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            padding-top: 20px;
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
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .cattle-card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f8f8;
            padding: 10px;
        }

        .card-title {
            margin-bottom: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="header">
  <img src="assets/img/logo.png" class="logo" alt="LOGO">
    <h1>DairyBot Farm</h1>
    <div class="profile">
      <img src="assets/img/Profile icon.avif" id="image" alt="Admin Profile Picture">
      <span>
        <a href="#" id="adminWord">Admin</a>
      </span>
    </div>
  </div><br><br>

    <div class="container">
        <h1>Cattle Diet Plans</h1>
        <div id="cattleData"></div>
        <div id="milkProductionChart"></div>
        <div id="medicalConditionChart"></div>
        <form method="post" action="assign_diet_plan.php">
            <h2>Assign Diet Plan</h2>
            <div class="form-group">
                <label for="cattleId">Cattle ID:</label>
                <input type="text" class="form-control" id="cattleId" name="cattleId" required>
            </div>
            <div class="form-group">
                <label for="milkProductionDiet">Milk Production Diet Plan:</label>
                <select class="form-control" id="milkProductionDiet" name="milkProductionDiet" required>
                    <option value="Low Milk Production">Diet Plan for Low Milk Production</option>
                    <option value="Medium Milk Production">Diet Plan for Medium Milk Production</option>
                    <option value="High Milk Production">Diet Plan for High Milk Production</option>
                </select>
            </div>
            <div class="form-group">
                <label for="medicalConditionDiet">Medical Condition Diet Plan:</label>
                <select class="form-control" id="medicalConditionDiet" name="medicalConditionDiet" required>
                    <option value="Normal Medical Condition">Diet Plan for Normal Medical Condition</option>
                    <option value="High Fever">Diet Plan for High Fever</option>
                    <option value="Low Appetite">Diet Plan for Low Appetite</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign Diet Plan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch cattle data using AJAX
            $.ajax({
                url: 'fetch_data.php',
                type: 'GET',
                success: function(response) {
                    var cattleData = JSON.parse(response);

                    // Check if any cattle data is available
                    if (cattleData.length > 0) {
                        // Diet plans based on milk production
                        var milkProductionDietPlans = {
                            'Low Milk Production': 'Diet Plan for Low Milk Production',
                            'Medium Milk Production': 'Diet Plan for Medium Milk Production',
                            'High Milk Production': 'Diet Plan for High Milk Production'
                        };

                        // Diet plans based on medical conditions
                        var medicalConditionDietPlans = {
                            'Normal Medical Condition': 'Diet Plan for Normal Medical Condition',
                            'High Fever': 'Diet Plan for High Fever',
                            'Low Appetite': 'Diet Plan for Low Appetite'
                        };

                        // Loop through cattle data
                        $.each(cattleData, function(index, cattle) {
                            var cattleId = cattle.id;
                            var cattleName = cattle.name;
                            var milkProduction = cattle.milk_production;
                            var medicalCondition = cattle.medical_condition;
                            var milkProductionDietPlan = cattle.milk_production_diet;
                            var medicalConditionDietPlan = cattle.medical_condition_diet;

                            // Create cattle card HTML
                            var cattleCard = '<div class="card cattle-card">';
                            cattleCard += '<div class="card-header">';
                            cattleCard += '<h5 class="card-title">Cattle ID: ' + cattleId + '</h5>';
                            cattleCard += '</div>';
                            cattleCard += '<div class="card-body">';
                            cattleCard += '<p class="card-text">Cattle Name: ' + cattleName + '</p>';
                            cattleCard += '<p class="card-text">Milk Production: ' + milkProduction + '</p>';
                            cattleCard += '<p class="card-text">Assigned Diet Plan based on Milk Production: ' + milkProductionDietPlan + '</p>';
                            cattleCard += '<p class="card-text">Medical Condition: ' + medicalCondition + '</p>';
                            cattleCard += '<p class="card-text">Assigned Diet Plan based on Medical Condition: ' + medicalConditionDietPlan + '</p>';
                            cattleCard += '</div>';
                            cattleCard += '</div>';

                            // Append cattle card to the cattleData container
                            $('#cattleData').append(cattleCard);
                        });

                        // Generate milk production chart
                        var milkProductionData = cattleData.map(function(item) {
                            return {
                                x: item.name,
                                y: item.milk_production
                            };
                        });

                        var milkProductionChartOptions = {
                            chart: {
                                height: 350,
                                type: "bar"
                            },
                            series: [{
                                name: "Milk Production",
                                data: milkProductionData
                            }],
                            xaxis: {
                                type: "category"
                            },
                            yaxis: {
                                title: {
                                    text: "Milk Production"
                                }
                            }
                        };

                        var milkProductionChart = new ApexCharts(document.querySelector("#milkProductionChart"), milkProductionChartOptions);
                        milkProductionChart.render();

                        // Generate medical condition chart
                        var medicalConditionData = cattleData.map(function(item) {
                            return {
                                x: item.name,
                                y: 1
                            };
                        });

                        var medicalConditionChartOptions = {
                            chart: {
                                height: 350,
                                type: "pie"
                            },
                            series: medicalConditionData,
                            labels: cattleData.map(function(item) {
                                return item.name + ": " + item.medical_condition;
                            })
                        };

                        var medicalConditionChart = new ApexCharts(document.querySelector("#medicalConditionChart"), medicalConditionChartOptions);
                        medicalConditionChart.render();
                    } else {
                        $('#cattleData').html('No cattle data available.');
                    }
                },
                error: function() {
                    $('#cattleData').html('Error fetching cattle data.');
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

// Function to insert diet plans into the database
function insertDietPlans($conn)
{
    // Check if diet plans already exist
    $sql = "SELECT COUNT(*) FROM diet_plans";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $count = $row[0];
    if ($count > 0) {
        echo "Diet plans already exist.<br>";
        return;
    }

    // Insert diet plans
    $dietPlans = [
        ['Low Milk Production', 'Diet Plan for Low Milk Production'],
        ['Medium Milk Production', 'Diet Plan for Medium Milk Production'],
        ['High Milk Production', 'Diet Plan for High Milk Production'],
        ['Normal Medical Condition', 'Diet Plan for Normal Medical Condition'],
        ['High Fever', 'Diet Plan for High Fever'],
        ['Low Appetite', 'Diet Plan for Low Appetite']
    ];

    $sql = "INSERT INTO diet_plans (name, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    foreach ($dietPlans as $plan) {
        $stmt->bind_param("ss", $plan[0], $plan[1]);
        if ($stmt->execute() === FALSE) {
            echo "Error inserting diet plan: " . $conn->error . "<br>";
        }
    }
    echo "Diet plans inserted successfully.<br>";
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

// Function to insert cattle data into the database
function insertCattleData($conn, $table, $name, $milkProduction, $medicalCondition)
{
    $name = $conn->real_escape_string($name);
    $milkProduction = intval($milkProduction);
    $medicalCondition = $conn->real_escape_string($medicalCondition);

    // Assign diet plan based on milk production
    $milkProductionDietPlan = assignDietPlanByMilkProduction($milkProduction);

    // Assign diet plan based on medical condition
    $medicalConditionDietPlan = assignDietPlanByMedicalCondition($medicalCondition);

    $sql = "INSERT INTO $table (name, milk_production, medical_condition, milk_production_diet, medical_condition_diet)
            VALUES ('$name', $milkProduction, '$medicalCondition', '$milkProductionDietPlan', '$medicalConditionDietPlan')";
    if ($conn->query($sql) === TRUE) {
        echo "Cattle data inserted successfully.<br>";
    } else {
        echo "Error inserting cattle data: " . $conn->error . "<br>";
    }
}

// Function to generate milk production report
function generateMilkProductionReport($conn, $table)
{
    $sql = "SELECT name, milk_production FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Milk Production Report</h2>";
        echo "<table>";
        echo "<tr><th>Cattle Name</th><th>Milk Production</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $cattleName = $row['name'];
            $milkProduction = $row['milk_production'];
            echo "<tr><td>$cattleName</td><td>$milkProduction</td></tr>";
        }
        echo "</table>";

        // Generate milk production chart
        echo '<div id="milkProductionChart"></div>';
        echo '<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.0/dist/apexcharts.min.js"></script>';
        echo '<script>';
        echo 'var milkProductionData = ' . json_encode($result->fetch_all(MYSQLI_ASSOC)) . ';';
        echo 'var milkProductionChartOptions = {';
        echo 'chart: {';
        echo 'height: 350,';
        echo 'type: "bar"';
        echo '},';
        echo 'series: [{';
        echo 'name: "Milk Production",';
        echo 'data: milkProductionData.map(function(item) { return item.milk_production; })';
        echo '}],';
        echo 'xaxis: {';
        echo 'categories: milkProductionData.map(function(item) { return item.name; })';
        echo '}';
        echo '};';
        echo 'var milkProductionChart = new ApexCharts(document.querySelector("#milkProductionChart"), milkProductionChartOptions);';
        echo 'milkProductionChart.render();';
        echo '</script>';
    } else {
        echo "No cattle data available.<br>";
    }
}

// Function to generate medical report
function generateMedicalReport($conn, $table)
{
    $sql = "SELECT name, medical_condition FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Medical Report</h2>";
        echo "<table>";
        echo "<tr><th>Cattle Name</th><th>Medical Condition</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $cattleName = $row['name'];
            $medicalCondition = $row['medical_condition'];
            echo "<tr><td>$cattleName</td><td>$medicalCondition</td></tr>";
        }
        echo "</table>";

        // Generate medical condition chart
        echo '<div id="medicalConditionChart"></div>';
        echo '<script>';
        echo 'var medicalConditionData = ' . json_encode($result->fetch_all(MYSQLI_ASSOC)) . ';';
        echo 'var medicalConditionChartOptions = {';
        echo 'chart: {';
        echo 'height: 350,';
        echo 'type: "pie"';
        echo '},';
        echo 'series: medicalConditionData.map(function(item) { return item.medical_condition; }),';
        echo 'labels: medicalConditionData.map(function(item) { return item.name + ": " + item.medical_condition; })';
        echo '};';
        echo 'var medicalConditionChart = new ApexCharts(document.querySelector("#medicalConditionChart"),medicalConditionChartOptions);';
        echo 'medicalConditionChart.render();';
        echo '</script>';
    } else {
        echo "No cattle data available.<br>";
    }
}

// Function to assign diet plans based on reports
function assignDietPlans($conn, $table)
{
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Assigned Diet Plans</h2>";
        echo "<table>";
        echo "<tr><th>Cattle Name</th><th>Milk Production Diet</th><th>Medical Condition Diet</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $cattleId = $row['id'];
            $cattleName = $row['name'];
            $milkProductionDiet = $row['milk_production_diet'];
            $medicalConditionDiet = $row['medical_condition_diet'];
            echo "<tr><td>$cattleId - $cattleName</td><td>$milkProductionDiet</td><td>$medicalConditionDiet</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No cattle data available.<br>";
    }
}

// Function to close the database connection
function closeDatabaseConnection($conn)
{
    $conn->close();
}

// Establish a database connection
$conn = connectToDatabase($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cattleId = $_POST["cattleId"];
    $milkProductionDiet = $_POST["milkProductionDiet"];
    $medicalConditionDiet = $_POST["medicalConditionDiet"];

    // Update cattle data with assigned diet plans
    $sql = "UPDATE cattle SET milk_production_diet = '$milkProductionDiet', medical_condition_diet = '$medicalConditionDiet' WHERE id = $cattleId";
    if ($conn->query($sql) === TRUE) {
        echo "Diet plans assigned successfully.<br>";
    } else {
        echo "Error assigning diet plans: " . $conn->error . "<br>";
    }
}

// Create diet plans table if it doesn't exist and insert diet plans
insertDietPlans($conn);

// Generate milk production report
generateMilkProductionReport($conn, 'cattle');

// Generate medical report
generateMedicalReport($conn, 'cattle');

// Assign diet plans based on reports
assignDietPlans($conn, 'cattle');

// Close the database connection
closeDatabaseConnection($conn);
?>
<script>
    $(document).ready(function() {
        // Fetch cattle data using AJAX
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            success: function(response) {
                var cattleData = JSON.parse(response);

                // Check if any cattle data is available
                if (cattleData.length > 0) {
                    // Diet plans based on milk production
                    var milkProductionDietPlans = {
                        'Low Milk Production': 'Diet Plan for Low Milk Production',
                        'Medium Milk Production': 'Diet Plan for Medium Milk Production',
                        'High Milk Production': 'Diet Plan for High Milk Production'
                    };

                    // Diet plans based on medical conditions
                    var medicalConditionDietPlans = {
                        'Normal Medical Condition': 'Diet Plan for Normal Medical Condition',
                        'High Fever': 'Diet Plan for High Fever',
                        'Low Appetite': 'Diet Plan for Low Appetite'
                    };

                    // Loop through cattle data
                    $.each(cattleData, function(index, cattle) {
                        var cattleId = cattle.id;
                        var cattleName = cattle.name;
                        var milkProduction = cattle.milk_production;
                        var medicalCondition = cattle.medical_condition;
                        var milkProductionDietPlan = cattle.milk_production_diet;
                        var medicalConditionDietPlan = cattle.medical_condition_diet;

                        // Create cattle card HTML
                        var cattleCard = '<div class="card cattle-card">';
                        cattleCard += '<div class="card-header">';
                        cattleCard += '<h5 class="card-title">Cattle ID: ' + cattleId + '</h5>';
                        cattleCard += '</div>';
                        cattleCard += '<div class="card-body">';
                        cattleCard += '<p class="card-text">Cattle Name: ' + cattleName + '</p>';
                        cattleCard += '<p class="card-text">Milk Production: ' + milkProduction + '</p>';
                        cattleCard += '<p class="card-text">Assigned Diet Plan based on Milk Production: ' + milkProductionDietPlan + '</p>';
                        cattleCard += '<p class="card-text">Medical Condition: ' + medicalCondition + '</p>';
                        cattleCard += '<p class="card-text">Assigned Diet Plan based on Medical Condition: ' + medicalConditionDietPlan + '</p>';
                        cattleCard += '</div>';
                        cattleCard += '</div>';

                        // Append cattle card to the cattleData container
                        $('#cattleData').append(cattleCard);
                    });

                    // Generate milk production chart
                    var milkProductionData = cattleData.map(function(item) {
                        return {
                            x: item.name,
                            y: item.milk_production
                        };
                    });

                    var milkProductionChartOptions = {
                        chart: {
                            height: 350,
                            type: "bar"
                        },
                        series: [{
                            name: "Milk Production",
                            data: milkProductionData
                        }],
                        xaxis: {
                            type: "category"
                        },
                        yaxis: {
                            title: {
                                text: "Milk Production"
                            }
                        }
                    };

                    var milkProductionChart = new ApexCharts(document.querySelector("#milkProductionChart"), milkProductionChartOptions);
                    milkProductionChart.render();

                    // Generate medical condition chart
                    var medicalConditionData = cattleData.map(function(item) {
                        return {
                            x: item.name,
                            y: 1
                        };
                    });

                    var medicalConditionChartOptions = {
                        chart: {
                            height: 350,
                            type: "pie"
                        },
                        series: medicalConditionData,
                        labels: cattleData.map(function(item) {
                            return item.name + ": " + item.medical_condition;
                        })
                    };

                    var medicalConditionChart = new ApexCharts(document.querySelector("#medicalConditionChart"), medicalConditionChartOptions);
                    medicalConditionChart.render();
                } else {
                    $('#cattleData').html('No cattle data available.');
                }
            },
            error(function() {
                $('#cattleData').html('Error fetching cattle data.');
            }
        });
    });
</script>
</body>
</html>