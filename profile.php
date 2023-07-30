<?php
// Database connection configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "dairy";

// Create a new MySQLi object
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add record to the database
if (isset($_POST['add'])) {
    $milkProduction = $_POST['cow_a_milk_production'];
    $dietPlans = $_POST['diet_plans'];
    $medicalHistory = $_POST['medical_history'];

    $sql = "INSERT INTO profile (id, milk, diet, medicalhistory) VALUES (NULL, '$milkProduction', '$dietPlans', '$medicalHistory')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $conn->error;
    }
}

// Update record in the database
if (isset($_POST['update'])) {
    $recordId = $_POST['record-id'];
    $milkProduction = $_POST['cow_a_milk_production'];
    $dietPlans = $_POST['diet_plans'];
    $medicalHistory = $_POST['medical_history'];

    $sql = "UPDATE profile SET milk='$milkProduction', diet='$dietPlans', medicalhistory='$medicalHistory' WHERE id='$recordId'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete record from the database
if (isset($_POST['delete'])) {
    $recordId = $_POST['record-id'];

    $sql = "DELETE FROM profile WHERE id='$recordId'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all records from the database
$sql = "SELECT * FROM profile";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of Cattle</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
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
        .logo {
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
        text-align: center;
        padding: 10px;
    }

    h2 {
        color: #f7c35f;
        font-size: 24px;
        margin-bottom: 10px;
    }

    form {
        margin-bottom: 30px;
        padding: 20px;
        background-color: #FFFFFF;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"] {
        padding: 8px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 250px;
        margin-bottom: 10px;
    }

    button {
        background-color: #E0D800;
        color: #FFFFFF;
        padding: 12px 22px;
        border: none;
        border-radius: 4px;
        margin-right: 10px;
        font-size: 14px;
        cursor: pointer;
    }

    button[type="submit"] {
        background-color: #007bff;
    }

    button[type="button"] {
        background-color: #dc3545;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    th {
        background-color: #E0D800;
        color: #000000;
        font-weight: bold;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
</head>
<body>
    <div class="header">
        <img src="assets/img/logo.png" class="logo" alt="LOGO">
        <h1 class="">DairyBot Farm</h1>
        <div class="profile">
            <img src="assets/img/Profile icon.avif" id="image" alt="Admin Profile Picture">
            <span>
                <a href="#" id="adminWord">Admin</a>
            </span>
        </div>
    </div>
    <div class="container mt-5">
        <h1>Profile of Cattle</h1>
        <h2>Records</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Record ID</th>
                <th>Milk Production</th>
                <th>Diet Plans</th>
                <th>Medical History</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['milk'] . "</td>";
                    echo "<td>" . $row['diet'] . "</td>";
                    echo "<td>" . $row['medicalhistory'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Add Record</h2>
    <form id="add-form" method="POST">
        <div class="form-group">
            <label for="cow_a_milk_production">Milk Production:</label>
            <input type="text" class="form-control" id="cow_a_milk_production" name="cow_a_milk_production"
                required>
        </div>

        <div class="form-group">
            <label for="diet_plans">Diet Plans:</label>
            <input type="text" class="form-control" id="diet_plans" name="diet_plans" required>
        </div>

        <div class="form-group">
            <label for="medical_history">Medical History:</label>
            <input type="text" class="form-control" id="medical_history" name="medical_history" required>
        </div>

        <button type="submit" class="btn btn-primary" name="add">Add</button>
    </form>

    <h2>Update Record</h2>
    <form id="update-form" method="POST">
        <div class="form-group">
            <label for="record-id">Record ID:</label>
            <input type="text" class="form-control" id="record-id" name="record-id" required>
        </div>

        <!-- Display existing record details here -->

        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <button type="button" class="btn btn-danger" onclick="clearUpdateForm()">Clear</button>
    </form>

    <h2>Delete Record</h2>
    <form id="delete-form" method="POST">
        <div class="form-group">
            <label for="record-id">Record ID:</label>
            <input type="text" class="form-control" id="record-id" name="record-id" required>
        </div>

        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <script>
        function clearUpdateForm() {
            document.getElementById("update-form").reset();
        }
    </script>
</body>

</html>
