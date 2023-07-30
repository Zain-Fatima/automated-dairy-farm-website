<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattle Alerts</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F4F4F4;
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
        }

        .alert {
            background-color: #f7c35f;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            margin-bottom: 10px;
        }

        .alert-container {
            margin-top: 20px;
        }

        .alert-actions {
            display: flex;
            align-items: center;
        }

        .alert-actions button {
            margin-left: 10px;
        }

        .btn {
            background-color: #4CAF50;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
  </div>
    <div class="container">
        <h2>Cattle Alerts</h2>
        <div class="alert-container" id="alertContainer">
            <!-- Alerts will be dynamically added here -->
        </div>
        <table>
            <thead>
                <tr>
                    <th>Cattle ID</th>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Weight</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Daisy</td>
                    <td>Holstein</td>
                    <td>4 years</td>
                    <td>600 kg</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Max</td>
                    <td>Jersey</td>
                    <td>3 years</td>
                    <td>550 kg</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bella</td>
                    <td>Angus</td>
                    <td>5 years</td>
                    <td>700 kg</td>
                </tr>
                <!-- Add more rows for additional cattle information -->
            </tbody>
        </table>
        <button class="btn" onclick="generateAlerts()">Generate Alerts</button>
        <button class="btn btn-danger" onclick="clearAlerts()">Clear Alerts</button>
    </div>

    <script>
        // Function to generate a random alert message
        function generateAlert(type, cattleId) {
            var alertContainer = document.getElementById('alertContainer');
            var alertDiv = document.createElement('div');
            alertDiv.classList.add('alert');
            alertDiv.textContent = `Cattle ID: ${cattleId} - ${type} Alert`;
            alertContainer.appendChild(alertDiv);
        }

        // Function to generate alerts
        function generateAlerts() {
            // Simulate data retrieved from PHP code
            var alertsData = [
                { type: 'Diet', cattleId: 1 },
                { type: 'Feed', cattleId: 1 },
                { type: 'Milk Production', cattleId: 2 },
                { type: 'Medical Emergency', cattleId: 2 },
                { type: 'Diet', cattleId: 3 },
                { type: 'Medical Emergency', cattleId: 3 }
            ];

            alertsData.forEach(function (alertData) {
                generateAlert(alertData.type, alertData.cattleId);
            });
        }

        // Function to clear all alerts
        function clearAlerts() {
            var alertContainer = document.getElementById('alertContainer');
            alertContainer.innerHTML = '';
        }
    </script>
</body>

</html>
