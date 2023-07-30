<?php
$error = "";
$uname = "";

if(isset($_REQUEST["btnSubmit"]) == true)
{
  
  
  $uname = $_REQUEST["txtUserName"];
  
  $pswd = $_REQUEST["txtPassword"];
  
  if($uname == "admin" && $pswd == "zain")
  {
    header('Location:dashboard.php'); //To redirect to another page
  }
  else {
   echo "<script>alert('Invalid username or password. Please try again.');</script>";
  }
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('background.jpg') center/cover no-repeat;
    }

    .wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .inner {
      width: 400px;
      background-color: #fff;
      padding: 40px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      animation: slide-up 0.5s ease-in-out;
    }

    @keyframes slide-up {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .inner h3 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .form-wrapper {
      position: relative;
      margin-bottom: 20px;
    }

    .form-wrapper input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    .form-wrapper i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 10px;
      color: #999;
    }

    button[name="btnSubmit"] {
      background-color: #1f4e3d;
      color: #fff;
      padding: 10px;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 4px;
      font-size: 16px;
      transition: background-color 0.3s ease-in-out;
    }

    button[name="btnSubmit"]:hover {
      background-color: #f7c35f;
      color: black;
    }

    p.error {
      color: #f00;
      text-align: center;
      margin-top: 10px;
      animation: fade-in 0.5s ease-in-out;
    }

    @keyframes fade-in {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo img {
      width: 150px;
      height: auto;
    }
  </style>
</head>
<body>
 <div class="wrapper">
    <div class="inner">
      <div class="logo">
        <img src="assets/img/logo.png" alt="Logo">
      </div>
      <h3>Login Form</h3>
      <form action="login.php" method="POST">
        <div class="form-wrapper">
          <input type="text" placeholder="Username" name="txtUserName" required>
          <i class="zmdi zmdi-account"></i>
        </div>
        <div class="form-wrapper">
          <input type="password" placeholder="Password" name="txtPassword" required>
          <i class="zmdi zmdi-lock"></i>
        </div>
        <button type="submit" name="btnSubmit">Login</button>
        <p class="error"><?php echo $error; ?></p>
      </form>
    </div>
  </div>
</body>
</html>