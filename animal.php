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
    $e = $_POST['e'];
    $m = $_POST['m'];
    $d = $_POST['d'];
    $i = $_POST['i'];
    $b = $_POST['b'];
    $n = $_POST['n'];
    $a = $_POST['a'];
    $p = $_POST['p'];
    
    
  
    $sql = "INSERT INTO animalaccount (id,examination,medication,diseases,insemination,bull,normaldelivery,abortion,price) VALUES (NULL,'$e', '$m', '$d','$i', '$b', '$n','$a', '$p')";
    

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $conn->error;
    }
}

// Update record in the database
if (isset($_POST['update'])) {
    $recordId = $_POST['record_id'];
    $e = $_POST['e'];
    $m = $_POST['m'];
    $d = $_POST['d'];
    $i = $_POST['i'];
    $b = $_POST['b'];
    $n = $_POST['n'];
    $a = $_POST['a'];
    $p = $_POST['p'];
    
    $sql = "UPDATE animalaccount SET examination='$e',medication='$m', diseases='$d', insemination='$i', bull='$b', normaldelivery='$n', abortion='$a', price='$p' WHERE id='$recordId'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete record from the database
if (isset($_POST['delete'])) {
    $recordId = $_POST['record_id'];

    $sql = "DELETE FROM animalaccount WHERE id='$recordId'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of Cattle</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <style>
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
      padding: 10px;
      text-align: center;
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

        input[type="text"],
        select {
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 250px;
            margin-bottom: 10px;
        }

        button {
            background-color: #f7c35f;
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
            margin-bottom: 20px;
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

  </div>
  <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <h1>Profile of Cattle</h1>
    <h2>Records</h2>
    <table>
        <tr>
            <th>Record ID</th>
            <th>Examination</th>
            <th>Medication</th>
            <th>Diseases</th>
            <th>Insemination</th>
            <th>Bull Insemination</th>
            <th>Normal Delivery</th>
            <th>Abortion</th>
            <th>Price</th>
        </tr>
        <?php
        // Fetch all records from the database
        $sql = "SELECT * FROM animalaccount";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['examination'] . "</td>";
                echo "<td>" . $row['medication'] . "</td>";
                echo "<td>" . $row['diseases'] . "</td>";
                echo "<td>" . $row['insemination'] . "</td>";
                echo "<td>" . $row['bull'] . "</td>";
                echo "<td>" . $row['normaldelivery'] . "</td>";
                echo "<td>" . $row['abortion'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table>
    <h2>Add Record</h2>
    <form id="add-form" method="POST">
        <label for="e">Examination:</label>
        <select name="e" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="done">Done
<option value="not done">Not done

</select>
        <label for="m">Medication:</label>
        <input type="text" id="m" name="m" required><br>

        <label for="d">Diseases:</label>
        <input type="text" id="d" name="d" required><br>
        <label for="i">Insemination:</label>
        <select name="i" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="done">Done
<option value="not done">Not done

</select>
<label for="b">Bull Insemination:</label>
        <select name="b" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="done">Done
<option value="not done">Not done

</select>
<label for="n">Normal delivery:</label>
        <select name="n" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="yes">Yes
<option value="no">NO

</select>
<label for="a">Abortion:</label>
        <select name="a" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="yes">Yes
<option value="no">NO

</select>
<label for="p">Price:</label>
        <input type="text" id="p" name="p" required><br>

        <button type="submit" name="add">Add</button>
    </form>

    <h2>Update Record</h2>
    <form id="update-form" method="POST">
        <label for="record-id">Record ID:</label>
        <input type="text" id="record-id" name="record_id" required><br>
        <label for="e">Examination:</label>
        <select name="e" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="done">Done
<option value="not done">Not done

</select>
        <label for="m">Medication:</label>
        <input type="text" id="m" name="m" required><br>

        <label for="d">Diseases:</label>
        <input type="text" id="d" name="d" required><br>
        <label for="i">Insemination:</label>
        <select name="i" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="done">Done
<option value="not done">Not done

</select>
<label for="b">Bull Insemination:</label>
        <select name="b" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="done">Done
<option value="not done">Not done

</select>
<label for="n">Normal delivery:</label>
        <select name="n" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="yes">Yes
<option value="no">NO

</select>
<label for="a">Abortion:</label>
        <select name="a" style="width:230px;height:30px" required>
<option value="">Select</option>
<option value="yes">Yes
<option value="no">NO

</select>
<label for="p">Price:</label>
        <input type="text" id="p" name="p" required><br>

        <button type="submit" name="update">Update</button>
        <button type="button" onclick="clearUpdateForm()">Clear</button>
    </form>

    <h2>Delete Record</h2>
    <form id="delete-form" method="POST">
        <label for="record-id">Record ID:</label>
        <input type="text" id="record-id" name="record_id" required><br>

        <button type="submit" name="delete">Delete</button>
    </form>
</div>
    <script>
        function clearUpdateForm() {
            document.getElementById("update-form").reset();
        }
    </script>
</body>

</html>