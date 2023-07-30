<?php
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or any other desired page
    header('Location: login.php');
    exit();
}

// If the user clicks on the logout button
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page or any other desired page
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
    <!-- Add your CSS styling here -->
</head>

<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>

</html>
